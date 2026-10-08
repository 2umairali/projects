<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'itemId',
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
    'itemId',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<div
    x-data="{ checked: false }"
    x-on:bulk-deselect-all.window="checked = false"
    class="flex items-center"
>
    <label class="relative flex items-center justify-center cursor-pointer">
        <input
            type="checkbox"
            x-model="checked"
            x-on:change="$dispatch('bulk-select-toggle', { id: <?php echo e(json_encode($itemId)); ?>, checked: checked })"
            class="peer h-[18px] w-[18px] shrink-0 appearance-none rounded-md border border-border bg-surface/80 transition
                   checked:border-brand checked:bg-brand
                   focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand/30 focus-visible:ring-offset-2 focus-visible:ring-offset-surface-2
                   hover:border-brand/50"
            aria-label="Select <?php echo e($modelName ?? 'item'); ?>"
        />
        
        <svg
            class="pointer-events-none absolute h-3 w-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
    </label>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/components/bulk-select-checkbox.blade.php ENDPATH**/ ?>