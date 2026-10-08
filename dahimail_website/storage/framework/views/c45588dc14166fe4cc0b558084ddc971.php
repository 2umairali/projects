<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => __('Call history')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Call history'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php ($calls = app(\App\Services\Friends\FriendCallService::class)->history(auth()->user())); ?>
    <div class="max-w-3xl mx-auto space-y-4">
        <a href="<?php echo e(url('/people')); ?>" class="text-sm text-muted hover:text-ink">&larr; <?php echo e(__('Friends')); ?></a>
        <div class="flex items-center justify-between"><h1 class="text-xl font-semibold text-ink"><?php echo e(__('Call history')); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($calls)): ?><button type="button" class="text-sm text-red-600 hover:underline" onclick="if (confirm(<?php echo \Illuminate\Support\Js::from(__('Clear your call history?'))->toHtml() ?>)) fetch('/friends/api/calls/history', { method: 'DELETE', credentials: 'same-origin', headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content } }).then(function () { location.reload(); })"><?php echo e(__('Clear')); ?></button><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
        <div class="bg-surface-2 rounded-2xl border border-border divide-y divide-border">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $calls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="flex items-center gap-3 p-4">
                    <div class="w-10 h-10 rounded-full bg-brand/10 text-brand flex items-center justify-center font-semibold overflow-hidden flex-shrink-0">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($c['peer']['avatar_url']): ?><img src="<?php echo e($c['peer']['avatar_url']); ?>" alt="" class="w-full h-full object-cover"><?php else: ?><?php echo e(strtoupper(mb_substr($c['peer']['name'], 0, 1))); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="font-medium text-ink truncate <?php echo e($c['outcome'] === 'missed' && !$c['outgoing'] ? 'text-red-600' : ''); ?>"><?php echo e($c['peer']['name']); ?></div>
                        <div class="text-xs text-muted">
                            <?php echo e($c['outgoing'] ? '↗ ' . __('Outgoing') : '↙ ' . __('Incoming')); ?> · <?php echo e($c['video'] ? __('Video') : __('Audio')); ?> ·
                            <?php echo e($c['outcome'] === 'answered' ? ($c['duration_text'] ?: __('Answered')) : ($c['outcome'] === 'declined' ? __('Declined') : ($c['outgoing'] ? __('No answer') : __('Missed')))); ?> · <?php echo e($c['when']); ?>

                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($c['recording_message_id'])): ?><a href="<?php echo e(url('/friends/chat/' . $c['peer']['id'])); ?>" class="text-xs text-brand hover:underline" title="<?php echo e(__('Open the chat to play the recording')); ?>">&#127897; <?php echo e(__('Recording')); ?></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <button type="button" class="btn-secondary" onclick="window.FriendCall && window.FriendCall.start(<?php echo e($c['peer']['id']); ?>, <?php echo \Illuminate\Support\Js::from($c['peer']['name'])->toHtml() ?>)"><?php echo e(__('Call')); ?></button>
                    <button type="button" class="btn-secondary" onclick="window.FriendCall && window.FriendCall.startVideo(<?php echo e($c['peer']['id']); ?>, <?php echo \Illuminate\Support\Js::from($c['peer']['name'])->toHtml() ?>)"><?php echo e(__('Video')); ?></button>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="p-8 text-center text-sm text-muted"><?php echo e(__('No calls yet.')); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/friends/calls.blade.php ENDPATH**/ ?>