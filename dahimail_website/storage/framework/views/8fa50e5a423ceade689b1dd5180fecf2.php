<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'totalItems' => 0,
    'modelName' => 'item',
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
    'totalItems' => 0,
    'modelName' => 'item',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<div
    x-data="selectAllCheckbox(<?php echo e(json_encode((int)$totalItems)); ?>)"
    x-on:bulk-select-toggle.window="onItemToggle($event.detail)"
    x-on:bulk-deselect-all.window="reset()"
    x-on:bulk-items-loaded.window="setVisibleIds($event.detail)"
    class="flex items-center"
>
    <label class="relative flex items-center justify-center cursor-pointer">
        <input
            type="checkbox"
            x-ref="selectAll"
            x-on:change="toggle()"
            :checked="state === 'all'"
            class="peer h-[18px] w-[18px] shrink-0 appearance-none rounded-md border border-border bg-surface/80 transition
                   checked:border-brand checked:bg-brand
                   focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand/30 focus-visible:ring-offset-2 focus-visible:ring-offset-surface-2
                   hover:border-brand/50"
            :class="state === 'partial' && 'border-brand bg-brand'"
            aria-label="Select all <?php echo e($modelName); ?>s"
        />
        
        <svg
            x-show="state === 'all'"
            class="pointer-events-none absolute h-3 w-3 text-white transition-opacity"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        
        <svg
            x-show="state === 'partial'"
            class="pointer-events-none absolute h-3 w-3 text-white transition-opacity"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
        </svg>
    </label>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('selectAllCheckbox', (totalItems) => ({
        // 'none' | 'partial' | 'all'
        state: 'none',
        visibleIds: [],
        checkedIds: new Set(),
        totalItems: totalItems,

        setVisibleIds(detail) {
            this.visibleIds = detail.ids || [];
            this.totalItems = detail.total || totalItems;
            this.recomputeState();
        },

        toggle() {
            if (this.state === 'all') {
                // Uncheck all
                this.state = 'none';
                this.checkedIds.clear();
                this.$dispatch('bulk-select-all', { checked: false });
            } else {
                // Check all visible
                this.state = 'all';
                this.visibleIds.forEach(id => this.checkedIds.add(id));
                this.$dispatch('bulk-select-all', { checked: true });
            }
        },

        onItemToggle(detail) {
            const { id, checked } = detail;
            if (checked) {
                this.checkedIds.add(id);
            } else {
                this.checkedIds.delete(id);
            }
            this.recomputeState();
        },

        recomputeState() {
            if (this.visibleIds.length === 0) {
                this.state = 'none';
                return;
            }
            const checkedVisible = this.visibleIds.filter(id => this.checkedIds.has(id)).length;
            if (checkedVisible === 0) {
                this.state = 'none';
            } else if (checkedVisible === this.visibleIds.length) {
                this.state = 'all';
            } else {
                this.state = 'partial';
            }

            // Sync the indeterminate property on the native input
            this.$nextTick(() => {
                if (this.$refs.selectAll) {
                    this.$refs.selectAll.indeterminate = this.state === 'partial';
                }
            });
        },

        reset() {
            this.state = 'none';
            this.checkedIds.clear();
            if (this.$refs.selectAll) {
                this.$refs.selectAll.indeterminate = false;
            }
        },
    }));
});
</script>
<?php /**PATH /home/dahimail.com/public_html/resources/views/components/select-all-checkbox.blade.php ENDPATH**/ ?>