import test from 'node:test';
import assert from 'node:assert/strict';
import { readFileSync } from 'node:fs';
import vm from 'node:vm';
const source = readFileSync(new URL('../../public/js/meeting.js', import.meta.url), 'utf8')
  .replace('  bind();\n  initPre();', '  window.mediaTest = { acquire: acquire, showEnd: showEnd };');
const flush = () => new Promise(resolve => setImmediate(resolve));
function room(search, recordingDone = Promise.resolve(), mediaDevices) {
  const elements = new Map(), redirects = [];
  const element = id => {
    if (!elements.has(id)) elements.set(id, { classList: { toggle() {} }, appendChild() {}, style: {},
      getAttribute: key => ({ 'data-code': 'test', 'data-kind': 'call', 'data-user': 'null' })[key] });
    return elements.get(id);
  };
  class Stream { getTracks() { return []; } addTrack() {} }
  const window = { addEventListener() {}, DahiRec: { init() {}, stop: () => recordingDone } };
  const document = { getElementById: element, addEventListener() {}, querySelector: element, createElement: element };
  const location = { origin: 'https://mail.example', search, assign: url => redirects.push(url) };
  vm.runInNewContext(source, { window, document, navigator: { mediaDevices }, location, MediaStream: Stream,
    URL, URLSearchParams, Promise, Date, setInterval() {}, clearInterval() {}, setTimeout() {} });
  return { api: window.mediaTest, redirects, elements };
}
test('ending a call waits for recording delivery and returns to the exact source thread', async () => {
  let deliver;
  const done = new Promise(resolve => { deliver = resolve; });
  const r = room('?return_to=' + encodeURIComponent('/friends/chat/42?tab=media#latest'), done);
  r.api.showEnd('Ended', false);
  await flush();
  assert.equal(r.redirects.length, 0);
  deliver();
  await flush();
  assert.deepEqual(r.redirects, ['/friends/chat/42?tab=media#latest']);
});
test('return destination cannot redirect to an external origin', async () => {
  const r = room('?return_to=' + encodeURIComponent('https://untrusted.example/friends/chat/42'));
  r.api.showEnd('Ended', false);
  await flush();
  assert.deepEqual(r.redirects, ['/friends']);
});
test('audio calls never ask for a camera, including microphone failure fallback', async () => {
  const constraints = [];
  const r = room('?audio=1', Promise.resolve(), {
    getUserMedia: async c => { constraints.push(c); throw new Error('Microphone denied'); },
    enumerateDevices: async () => [],
  });
  await r.api.acquire();
  assert.equal(constraints.some(c => c.video && c.video !== false), false);
  assert.match(r.elements.get('mt-pre-msg').textContent, /permissions/);
});
