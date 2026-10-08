

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'loading' => false,
    'disabled' => false,
    'loadingText' => null,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'loading' => false,
    'disabled' => false,
    'loadingText' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $variantClass = match($variant) {
        'primary'   => 'btn-primary',
        'secondary' => 'btn-secondary',
        'danger'    => 'btn-danger',
        default     => 'btn-primary',
    };

    $sizeClass = match($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };

    // Detect wire:target for automatic Livewire loading state
    $wireTarget = $attributes->get('wire:target') ?? $attributes->get('wire:click');
?>

<button
    <?php echo e($attributes->merge([
        'type' => $type,
        'class' => "$variantClass $sizeClass",
    ])->except(['loading', 'loadingText'])); ?>

    <?php if($wireTarget): ?>
        x-data="{ get isLoading() { return <?php echo e($loading ? 'true' : 'false'); ?> || $wire.__instance?.snapshot === undefined ? false : $wire.__instance?.effects?.dispatches?.length > 0; } }"
        wire:loading.attr="disabled"
        wire:target="<?php echo e($wireTarget); ?>"
    <?php else: ?>
        x-data="{ isLoading: <?php echo e($loading ? 'true' : 'false'); ?> }"
    <?php endif; ?>
    :disabled="isLoading || <?php echo e($disabled ? 'true' : 'false'); ?>"
    :aria-busy="isLoading"
    style="min-width: var(--btn-min-w, auto);"
    x-init="$nextTick(() => $el.style.setProperty('--btn-min-w', $el.offsetWidth + 'px'))"
>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wireTarget): ?>
        <svg wire:loading wire:target="<?php echo e($wireTarget); ?>" class="h-4 w-4 loading-spinner" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" class="opacity-25"/>
            <path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
        </svg>
    <?php else: ?>
        <svg x-show="isLoading" x-cloak class="h-4 w-4 loading-spinner" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" class="opacity-25"/>
            <path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
        </svg>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($loadingText): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wireTarget): ?>
            <span wire:loading.remove wire:target="<?php echo e($wireTarget); ?>"><?php echo e($slot); ?></span>
            <span wire:loading wire:target="<?php echo e($wireTarget); ?>"><?php echo e($loadingText); ?></span>
        <?php else: ?>
            <span x-show="!isLoading"><?php echo e($slot); ?></span>
            <span x-show="isLoading" x-cloak><?php echo e($loadingText); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>
        <span><?php echo e($slot); ?></span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</button>
<?php /**PATH /home/dahimail.com/public_html/resources/views/components/loading-button.blade.php ENDPATH**/ ?>