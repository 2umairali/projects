<?php if (isset($component)) { $__componentOriginala9d35bca55314290701d0fd9db1a187a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala9d35bca55314290701d0fd9db1a187a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.settings','data' => ['title' => __('Privacy')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.settings'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Privacy'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php ($pv = app(\App\Services\Friends\PresenceService::class)); ?>
    <div class="max-w-2xl space-y-4" x-data="{ seen: <?php echo \Illuminate\Support\Js::from($pv->enabled(auth()->id()))->toHtml() ?>, receipts: <?php echo \Illuminate\Support\Js::from($pv->receiptsEnabled(auth()->id()))->toHtml() ?>, findable: <?php echo \Illuminate\Support\Js::from($pv->findable(auth()->id()))->toHtml() ?>, busy: false, msg: '',
        save(k) { this.busy = true; this.msg = ''; var body = {}; body[k] = this[k === 'last_seen' ? 'seen' : (k === 'findable' ? 'findable' : 'receipts')]; fetch('/friends/api/presence', { method: 'POST', credentials: 'same-origin', headers: { 'Accept': 'application/json', 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content }, body: JSON.stringify(body) }).then(r => r.json()).then(j => { if (j.data) { this.seen = !!j.data.last_seen; this.receipts = !!j.data.read_receipts; this.findable = j.data.findable !== false; this.msg = <?php echo \Illuminate\Support\Js::from(__('Saved.'))->toHtml() ?>; } }).catch(() => { this.msg = <?php echo \Illuminate\Support\Js::from(__('Could not save. Try again.'))->toHtml() ?>; }).finally(() => this.busy = false); } }">
        <div>
            <h1 class="text-xl font-semibold text-ink"><?php echo e(__('Privacy')); ?></h1>
            <p class="text-sm text-muted mt-1"><?php echo e(__('Choose what your friends can see in chats and calls.')); ?></p>
        </div>
        <div class="bg-surface-2 rounded-2xl border border-border divide-y divide-border">
            <div class="p-4 flex items-center gap-4">
                <div class="flex-1 min-w-0"><div class="font-medium text-ink"><?php echo e(__('Last seen and online')); ?></div>
                    <div class="text-sm text-muted"><?php echo e(__('If you turn this off, you will not see other people’s last seen and online status either.')); ?></div></div>
                <button type="button" role="switch" :aria-checked="seen" :disabled="busy" @click="seen = !seen; save('last_seen')" class="relative inline-flex h-6 w-11 flex-shrink-0 rounded-full transition-colors" :class="seen ? 'bg-brand' : 'bg-gray-300'">
                    <span class="inline-block h-5 w-5 mt-0.5 rounded-full bg-white shadow transition-transform" :class="seen ? 'translate-x-5 ml-0.5' : 'translate-x-0.5'"></span></button>
            </div>
            <div class="p-4 flex items-center gap-4">
                <div class="flex-1 min-w-0"><div class="font-medium text-ink"><?php echo e(__('Read receipts')); ?></div>
                    <div class="text-sm text-muted"><?php echo e(__('If you turn this off, you will not send or receive read receipts (blue ticks). Delivered ticks are always shown.')); ?></div></div>
                <button type="button" role="switch" :aria-checked="receipts" :disabled="busy" @click="receipts = !receipts; save('read_receipts')" class="relative inline-flex h-6 w-11 flex-shrink-0 rounded-full transition-colors" :class="receipts ? 'bg-brand' : 'bg-gray-300'">
                    <span class="inline-block h-5 w-5 mt-0.5 rounded-full bg-white shadow transition-transform" :class="receipts ? 'translate-x-5 ml-0.5' : 'translate-x-0.5'"></span></button>
            </div>
            <div class="p-4 flex items-center gap-4">
                <div class="flex-1 min-w-0"><div class="font-medium text-ink"><?php echo e(__('Let people find me by name or username')); ?></div>
                    <div class="text-sm text-muted"><?php echo e(__('If you turn this off, people can still add you by typing your full e-mail address or your verified phone number.')); ?></div></div>
                <button type="button" role="switch" :aria-checked="findable" :disabled="busy" @click="findable = !findable; save('findable')" class="relative inline-flex h-6 w-11 flex-shrink-0 rounded-full transition-colors" :class="findable ? 'bg-brand' : 'bg-gray-300'">
                    <span class="inline-block h-5 w-5 mt-0.5 rounded-full bg-white shadow transition-transform" :class="findable ? 'translate-x-5 ml-0.5' : 'translate-x-0.5'"></span></button>
            </div>
        </div>
        <p class="text-sm text-brand" x-text="msg" x-show="msg"></p>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala9d35bca55314290701d0fd9db1a187a)): ?>
<?php $attributes = $__attributesOriginala9d35bca55314290701d0fd9db1a187a; ?>
<?php unset($__attributesOriginala9d35bca55314290701d0fd9db1a187a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d35bca55314290701d0fd9db1a187a)): ?>
<?php $component = $__componentOriginala9d35bca55314290701d0fd9db1a187a; ?>
<?php unset($__componentOriginala9d35bca55314290701d0fd9db1a187a); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/settings/privacy.blade.php ENDPATH**/ ?>