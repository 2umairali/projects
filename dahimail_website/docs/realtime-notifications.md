# Realtime updates and device notifications

## Web deployment

Install the committed Composer/npm dependencies and build frontend assets:

```sh
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan optimize:clear
```

For instant broadcasts, configure a Pusher Channels app or a compatible server:

```dotenv
BROADCAST_CONNECTION=pusher
PUSHER_APP_ID=<app id>
PUSHER_APP_KEY=<public key>
PUSHER_APP_SECRET=<server secret>
PUSHER_APP_CLUSTER=mt1
```

For a custom compatible server, set `PUSHER_HOST`, `PUSHER_PORT`, `PUSHER_SCHEME` for Laravel's publishing endpoint, and `PUSHER_WS_HOST`, `PUSHER_WS_PORT`, `PUSHER_WS_SCHEME` for the browser's reachable WebSocket endpoint. Use HTTPS/WSS in production. The browser reads only the public configuration from page metadata. The secret remains on the server.

`POST /broadcasting/auth` uses the authenticated web session and CSRF protection. Private `user.{id}` channels require that exact user; private `workspace.{id}` channels require membership. `state.changed` is an invalidation signal: components fetch current data through their authorized endpoints. Events publish after the database commit; a failed broadcast does not roll back the business operation.

Without a configured broadcaster (`BROADCAST_CONNECTION=null`), Friends and inbox views still refresh every five seconds and the notification center every ten seconds. Foreground FCM events, reconnect and resume also refresh those views. Inbox refresh retains filters, selection and loaded pages (up to 200 rows). Friend previews respect per-user chat clears and recording visibility.

## Email and social alerts

New incremental email sync creates a database notification for the mailbox owner, then sends a visible mobile push. Initial imports and mail older than the previous sync anchor do not flood the notification center. Outbound persisted `sent`, `delivered`, `failed` and `bounced` transitions notify the sending user, falling back to the mailbox owner. A recognized incoming mailer-daemon/postmaster delivery-failure message also generates a delivery-failure alert.

SMTP acceptance means the message was accepted for sending; it does not prove recipient delivery. Delivery/bounce transitions require the mail provider or existing delivery integration to persist those results. The app cannot infer a successful delivery receipt from SMTP acceptance alone. A received bounce email is still surfaced when there is no structured provider callback. Repeated unchanged saves and body hydration do not repeat notifications. Account notification preferences remain respected.

Friend requests/acceptance and meeting invitations continue through the shared database-notification push listener. Friend rejection/cancellation/removal also invalidate both users' live directory views. Live meeting call invitations use the existing call push path; scheduled meeting invitations use ordinary alerts.

Keep the repository scheduler and queue worker running. Email sync and scheduled sends must execute while every client is closed. Use the repository's configured scheduler/worker deployment, including `mailtrixy:sync-emails` and `emails:send-scheduled`; browser polling is not a substitute for these server processes.

## Android and iOS

Build the Flutter app from the committed lockfile (Flutter 3.44+/Dart 3.12+).

- Firebase service-account JSON must be outside the web root and configured as `FIREBASE_CREDENTIALS`. Enable FCM HTTP v1. Android/iOS Firebase application identifiers must match the signed app.
- Android incoming calls use high-priority **data-only** pushes and `flutter_callkit_incoming` ConnectionService. A `notification` block must not be added to Android call messages. Accept/Decline actions and cold-start replay retain the call identity and expiry.
- Non-call pushes use an OS-visible notification payload plus data; this gives system-tray alerts in background/terminated states without depending on a Dart timer. Foreground and data-only general alerts use the local notification path, with category preferences and duplicate suppression.
- Push registration retries after transient errors, after app resume, and when FCM/VoIP tokens change. A VoIP token arriving during a registration causes a follow-up registration.
- Android 13+ notification permission and Android 14+ full-screen intent access must be granted. Unlocked phones may show a heads-up call notification instead of taking over the whole screen. Explicit Android **Force stop** prevents delivery until reopening; OEM restrictions and user settings can also affect delivery.
- iOS needs the APNs key in Firebase for ordinary alerts, plus `APNS_KEY_PATH`, `APNS_KEY_ID`, `APNS_TEAM_ID`, and `APNS_BUNDLE_ID` for PushKit calls. Enable Push Notifications and the existing VoIP/remote-notification background modes in the signed provisioning profile. CallKit audio activation is forwarded to WebRTC.

## Acceptance

Use two real accounts and signed Android/iOS devices. Check foreground/background/locked/swipe-away calls, native accept/decline, expired calls, calls while another app is open, fresh login while offline followed by reconnect, and token rotation. Check incoming mail, failed sends, a provider bounce, friend request/accept/reject, meeting invitation and chat alerts in every app state. With two web sessions, verify list previews, unread decreases, request badges, open notification-center contents, and updates after reconnect without reloading. Confirm that a non-member cannot authorize a workspace channel.

The sandbox tests simulate providers and native method channels. They do not certify production FCM/APNs transport, device notification permissions, iOS compilation, or physical audio routing.
