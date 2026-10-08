<?php if (isset($component)) { $__componentOriginala9d35bca55314290701d0fd9db1a187a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala9d35bca55314290701d0fd9db1a187a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.settings','data' => ['title' => __('Email Accounts')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.settings'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Email Accounts'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div x-data="{ tab: new URLSearchParams(window.location.search).get('tab') || 'accounts' }"
         x-init="$watch('tab', v => { const u = new URL(window.location); u.searchParams.set('tab', v); window.history.replaceState({}, '', u); })"
         class="space-y-6">
        
        <div class="flex items-center gap-1 bg-surface-2 dark:bg-[#1a1d27] rounded-xl border border-border dark:border-gray-700 p-1 w-fit flex-wrap">
            <button @click="tab = 'accounts'"
                    :class="tab === 'accounts' ? 'bg-primary-50 text-primary-700 shadow-sm' : 'text-muted  hover:text-ink dark:hover:text-gray-200'"
                    class="px-4 py-2 text-sm font-medium rounded-lg transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <?php echo e(__('Accounts')); ?>

            </button>
            <button @click="tab = 'signatures'"
                    :class="tab === 'signatures' ? 'bg-primary-50 text-primary-700 shadow-sm' : 'text-muted  hover:text-ink dark:hover:text-gray-200'"
                    class="px-4 py-2 text-sm font-medium rounded-lg transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                <?php echo e(__('Signatures')); ?>

            </button>
            <button @click="tab = 'deliverability'"
                    :class="tab === 'deliverability' ? 'bg-primary-50 text-primary-700 shadow-sm' : 'text-muted  hover:text-ink dark:hover:text-gray-200'"
                    class="px-4 py-2 text-sm font-medium rounded-lg transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <?php echo e(__('Deliverability')); ?>

            </button>
        </div>

        
        <div x-show="tab === 'accounts'" x-cloak>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.email-account-manager', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2805745158-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
        </div>

        <div x-show="tab === 'signatures'" x-cloak>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.email-signature-manager', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2805745158-1', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
        </div>

        <div x-show="tab === 'deliverability'" x-cloak>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.deliverability-check', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2805745158-2', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
        </div>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/settings/email.blade.php ENDPATH**/ ?>