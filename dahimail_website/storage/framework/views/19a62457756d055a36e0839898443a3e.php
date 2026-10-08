

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'id',
    'title' => 'Are you sure?',
    'message' => 'This action cannot be undone.',
    'confirmText' => 'Confirm',
    'cancelText' => 'Cancel',
    'type' => 'danger',
    'icon' => null,
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
    'id',
    'title' => 'Are you sure?',
    'message' => 'This action cannot be undone.',
    'confirmText' => 'Confirm',
    'cancelText' => 'Cancel',
    'type' => 'danger',
    'icon' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $typeConfig = match($type) {
        'danger' => [
            'iconBg'    => 'bg-danger/10',
            'iconColor' => 'text-danger',
            'btnClass'  => 'btn-danger',
            'ringColor' => 'ring-danger/20',
        ],
        'warning' => [
            'iconBg'    => 'bg-warning/10',
            'iconColor' => 'text-warning',
            'btnClass'  => 'inline-flex items-center justify-center gap-2 rounded-xl bg-warning px-5 py-2.5 text-sm font-semibold text-warning-content transition hover:bg-warning/90 disabled:opacity-60 disabled:cursor-not-allowed',
            'ringColor' => 'ring-warning/20',
        ],
        'info' => [
            'iconBg'    => 'bg-info/10',
            'iconColor' => 'text-info',
            'btnClass'  => 'inline-flex items-center justify-center gap-2 rounded-xl bg-info px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-info/90 disabled:opacity-60 disabled:cursor-not-allowed',
            'ringColor' => 'ring-info/20',
        ],
        default => [
            'iconBg'    => 'bg-danger/10',
            'iconColor' => 'text-danger',
            'btnClass'  => 'btn-danger',
            'ringColor' => 'ring-danger/20',
        ],
    };

    $defaultIcon = match($type) {
        'danger'  => 'trash',
        'warning' => 'alert-triangle',
        'info'    => 'check-circle',
        default   => 'alert-triangle',
    };
    $resolvedIcon = $icon ?? $defaultIcon;
?>

<div
    x-data="{
        open: false,
        processing: false,
        _onConfirm: null,
        _onCancel: null,
        _title: <?php echo \Illuminate\Support\Js::from($title)->toHtml() ?>,
        _message: <?php echo \Illuminate\Support\Js::from($message)->toHtml() ?>,
        _previousFocus: null,
        _focusableEls: [],

        show(detail) {
            if (detail.title) this._title = detail.title;
            if (detail.message) this._message = detail.message;
            this._onConfirm = detail.onConfirm || null;
            this._onCancel = detail.onCancel || null;
            this._previousFocus = document.activeElement;
            this.open = true;
            this.processing = false;
            this.$nextTick(() => this._trapFocus());
        },

        confirm() {
            if (this.processing) return;
            this.processing = true;
            if (this._onConfirm) {
                try { this._onConfirm(); } catch(e) { console.error(e); }
            }
            this.$dispatch('confirmed-<?php echo e($id); ?>');
            this.close();
        },

        cancel() {
            if (this._onCancel) {
                try { this._onCancel(); } catch(e) { console.error(e); }
            }
            this.$dispatch('cancelled-<?php echo e($id); ?>');
            this.close();
        },

        close() {
            this.open = false;
            this.processing = false;
            this.$nextTick(() => {
                if (this._previousFocus) this._previousFocus.focus();
            });
        },

        _trapFocus() {
            const modal = this.$refs.modalPanel;
            if (!modal) return;
            this._focusableEls = [...modal.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex=\"-1\"])'
            )].filter(el => !el.disabled && el.offsetParent !== null);
            if (this._focusableEls.length) this._focusableEls[this._focusableEls.length - 1].focus();
        },

        _handleTab(e) {
            if (!this.open || !this._focusableEls.length) return;
            const first = this._focusableEls[0];
            const last = this._focusableEls[this._focusableEls.length - 1];
            if (e.shiftKey) {
                if (document.activeElement === first) { e.preventDefault(); last.focus(); }
            } else {
                if (document.activeElement === last) { e.preventDefault(); first.focus(); }
            }
        }
    }"
    x-on:confirm-modal.window="if ($event.detail.id === '<?php echo e($id); ?>') show($event.detail)"
    x-on:keydown.escape.window="if (open) cancel()"
    x-on:keydown.enter.window="if (open && !processing) confirm()"
    x-on:keydown.tab.window="if (open) _handleTab($event)"
    x-cloak
>
    
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm"
        @click="cancel()"
        aria-hidden="true"
    ></div>

    
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 translate-y-2"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-2"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        role="alertdialog"
        aria-modal="true"
        :aria-labelledby="'confirm-title-<?php echo e($id); ?>'"
        :aria-describedby="'confirm-desc-<?php echo e($id); ?>'"
    >
        <div
            x-ref="modalPanel"
            @click.stop
            class="w-full max-w-md rounded-2xl border border-border bg-surface-2 p-6 shadow-soft"
        >
            
            <div class="flex items-start gap-4">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl <?php echo e($typeConfig['iconBg']); ?>">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => $resolvedIcon,'class' => 'h-5 w-5 '.e($typeConfig['iconColor']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($resolvedIcon),'class' => 'h-5 w-5 '.e($typeConfig['iconColor']).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 id="confirm-title-<?php echo e($id); ?>" class="text-base font-semibold text-ink" x-text="_title"></h3>
                    <p id="confirm-desc-<?php echo e($id); ?>" class="mt-1.5 text-sm text-muted leading-relaxed" x-text="_message"></p>
                </div>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slot->isNotEmpty()): ?>
            <div class="mt-4">
                <?php echo e($slot); ?>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div class="mt-6 flex items-center justify-end gap-3">
                <button
                    type="button"
                    @click="cancel()"
                    :disabled="processing"
                    class="btn-secondary"
                >
                    <?php echo e($cancelText); ?>

                </button>
                <button
                    type="button"
                    @click="confirm()"
                    :disabled="processing"
                    class="<?php echo e($typeConfig['btnClass']); ?>"
                >
                    <svg x-show="processing" class="h-4 w-4 loading-spinner" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" class="opacity-25"/><path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                    <span x-text="processing ? 'Please wait...' : <?php echo \Illuminate\Support\Js::from($confirmText)->toHtml() ?>"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/components/confirm-modal.blade.php ENDPATH**/ ?>