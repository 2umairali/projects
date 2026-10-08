<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => $p['name']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($p['name'])]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="max-w-3xl mx-auto space-y-6" data-person data-user-id="<?php echo e($p['id']); ?>" data-name="<?php echo e($p['name']); ?>">
        <a href="<?php echo e(url('/people')); ?>" class="text-sm text-muted hover:text-ink">&larr; <?php echo e(__('Friends')); ?></a>

        
        <div class="bg-surface-2 rounded-2xl border border-border p-6 flex flex-wrap items-center gap-5">
            <div class="w-24 h-24 rounded-full bg-brand/10 text-brand flex items-center justify-center text-3xl font-semibold overflow-hidden flex-shrink-0">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p['avatar_url']): ?><img src="<?php echo e($p['avatar_url']); ?>" alt="<?php echo e($p['name']); ?>" class="w-full h-full object-cover"><?php else: ?><?php echo e(strtoupper(mb_substr($p['name'], 0, 1))); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="min-w-0 flex-1">
                <h1 class="text-2xl font-semibold text-ink truncate"><?php echo e($p['name']); ?></h1>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p['username']): ?><div class="text-sm text-muted">&#64;<?php echo e($p['username']); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <div class="flex flex-wrap gap-2 mt-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p['is_friend']): ?><span class="text-xs rounded-full bg-green-100 text-green-800 px-2.5 py-0.5"><?php echo e(__('Friend')); ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($p['is_former'])): ?><span class="text-xs rounded-full bg-gray-200 text-gray-700 px-2.5 py-0.5"><?php echo e(__('Unfriended')); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p['unfriended_on']): ?> · <?php echo e($p['unfriended_on']); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p['is_team']): ?><span class="text-xs rounded-full bg-blue-100 text-blue-800 px-2.5 py-0.5"><?php echo e(__('Team')); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($p['team']['role'])): ?> · <?php echo e($p['team']['role']); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p['is_friend'] || $p['is_team']): ?>
            <div class="flex flex-wrap gap-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(\App\Support\FriendSettings::chatEnabled()): ?>
                    <a href="<?php echo e(url('/friends/chat/' . $p['id'])); ?>" class="btn-primary"><?php echo e(__('Chat')); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($p['unread'] ?? 0) > 0): ?><span class="ml-1 text-xs rounded-full bg-white/25 px-1.5 py-0.5"><?php echo e($p['unread']); ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(\App\Support\FriendSettings::callsEnabled()): ?>
                    <button type="button" onclick="window.FriendCall && window.FriendCall.start(<?php echo e($p['id']); ?>, <?php echo \Illuminate\Support\Js::from($p['name'])->toHtml() ?>)" class="btn-secondary"><?php echo e(__('Audio call')); ?></button>
                    <button type="button" onclick="window.FriendCall && window.FriendCall.startVideo(<?php echo e($p['id']); ?>, <?php echo \Illuminate\Support\Js::from($p['name'])->toHtml() ?>)" class="btn-secondary"><?php echo e(__('Video call')); ?></button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <a href="mailto:<?php echo e($p['email']); ?>" class="btn-secondary"><?php echo e(__('Email')); ?></a>
            </div>
        <?php else: ?>
            <div class="flex flex-wrap gap-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($p['is_former']) && \App\Support\FriendSettings::chatEnabled()): ?><a href="<?php echo e(url('/friends/chat/' . $p['id'])); ?>" class="btn-primary"><?php echo e(__('Open chat history')); ?></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <a href="mailto:<?php echo e($p['email']); ?>" class="btn-secondary"><?php echo e(__('Email')); ?></a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="bg-surface-2 rounded-2xl border border-border p-6">
            <h2 class="text-base font-semibold text-ink mb-3"><?php echo e(__('Details')); ?></h2>
            <?php
            $rows = array_filter([
                [__('Email'), $p['email']],
                [__('Username'), $p['username'] ? '@' . $p['username'] : null],
                [__('Member since'), $p['member_since']],
                [__('Friends since'), $p['friend_since']],
                [__('Role in your workspace'), $p['team']['role'] ?? null],
                [__('Last active'), $p['team']['last_active'] ?? null],
                [__('Local time'), $p['local_time'] ? $p['local_time'] . ($p['timezone'] ? ' (' . $p['timezone'] . ')' : '') : null],
                [__('Language'), $p['language']],
            ], fn ($r) => !empty($r[1]));
            ?>
            <dl class="divide-y divide-border">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="py-2.5 flex items-center justify-between gap-4" x-data="{ copied: false }">
                        <dt class="text-sm text-muted"><?php echo e($label); ?></dt>
                        <dd class="text-sm font-medium text-ink text-right break-all">
                            <?php echo e($value); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($label === __('Email')): ?><button type="button" class="ml-2 text-xs text-brand hover:underline" @click="navigator.clipboard.writeText(<?php echo \Illuminate\Support\Js::from($value)->toHtml() ?>); copied = true; setTimeout(() => copied = false, 1500)"><span x-show="!copied"><?php echo e(__('Copy')); ?></span><span x-show="copied" x-cloak><?php echo e(__('Copied')); ?></span></button><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </dd>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </dl>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($p['history'])): ?>
            <div class="bg-surface-2 rounded-2xl border border-border p-6">
                <h2 class="text-base font-semibold text-ink mb-3"><?php echo e(__('Friendship history')); ?></h2>
                <ol class="relative border-l border-border ml-2 space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $p['history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <li class="ml-4">
                            <span class="absolute -left-[5px] mt-1.5 w-2.5 h-2.5 rounded-full <?php echo e($h['event'] === 'became_friends' ? 'bg-green-500' : ($h['event'] === 'unfriended' || $h['event'] === 'blocked' ? 'bg-red-500' : 'bg-gray-400')); ?>"></span>
                            <div class="text-sm font-medium text-ink"><?php echo e(__($h['label'])); ?></div>
                            <div class="text-xs text-muted"><?php echo e($h['date']); ?></div>
                        </li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ol>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p['is_friend'] || $p['is_team'] || !empty($p['is_former'])): ?>
            
            <div class="bg-surface-2 rounded-2xl border border-border p-6 space-y-4">
                <h2 class="text-base font-semibold text-ink"><?php echo e(__('Chat history')); ?></h2>
                <p class="text-sm text-muted"><?php echo e(__('Clearing the chat removes all messages and files from YOUR side only. The other person keeps their copy. They stay in your People list.')); ?></p>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="pp-clear-me" class="btn-secondary"><?php echo e(__('Clear chat (only for me)')); ?></button>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p['is_friend']): ?>
            <div class="bg-surface-2 rounded-2xl border border-red-300 p-6 space-y-3">
                <h2 class="text-base font-semibold text-red-700"><?php echo e(__('Remove friend')); ?></h2>
                <p class="text-sm text-muted"><?php echo e(__('You will no longer be able to chat or call each other. Your chat history is kept (read-only) and the dates are saved in your friendship history. They will not be told. You can become friends again later.')); ?></p>
                <form method="POST" action="<?php echo e(url('/people/' . $p['id'] . '/unfriend')); ?>" onsubmit="return confirm(<?php echo \Illuminate\Support\Js::from(__('Remove :n from your friends? You will no longer be able to chat or call each other.', ['n' => $p['name']]))->toHtml() ?>)">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-secondary text-red-600"><?php echo e(__('Remove :n', ['n' => $p['name']])); ?></button>
                </form>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <script>
        (function () {
            var root = document.querySelector('[data-person]'); if (!root) return;
            var uid = root.getAttribute('data-user-id'), name = root.getAttribute('data-name');
            function csrf() { var m = document.querySelector('meta[name="csrf-token"]'); return m ? m.content : ''; }
            function clear(scope, text) {
                if (!confirm(text)) return;
                fetch('/friends/api/messages/' + uid + '?scope=' + scope, { method: 'DELETE', credentials: 'same-origin', headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf(), 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(function (r) { return r.json(); }).then(function (j) { alert(j.message || 'Done.'); })
                    .catch(function () { alert('Could not clear the chat. Try again.'); });
            }
            var a = document.getElementById('pp-clear-me');
            if (a) a.onclick = function () { clear('me', 'Clear the chat with ' + name + '?\n\nAll messages, voice messages and files disappear for YOU. ' + name + ' keeps their own copy. You stay friends.'); };
        })();
    </script>
    <script src="<?php echo e(asset('js/friend-call.js')); ?>?v=20261007" defer></script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/friends/person.blade.php ENDPATH**/ ?>