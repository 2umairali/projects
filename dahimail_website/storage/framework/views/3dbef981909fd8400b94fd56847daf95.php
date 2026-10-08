<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
    'label' => null,
    'required' => false,
    'minlength' => null,
    'maxlength' => null,
    'placeholder' => '',
    'value' => '',
    'help' => null,
    'error' => null,
    'disabled' => false,
    'rows' => 3,
    'autoResize' => true,
    'wireModel' => null,
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
    'name',
    'label' => null,
    'required' => false,
    'minlength' => null,
    'maxlength' => null,
    'placeholder' => '',
    'value' => '',
    'help' => null,
    'error' => null,
    'disabled' => false,
    'rows' => 3,
    'autoResize' => true,
    'wireModel' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $inputId = $name . '-' . uniqid();
?>

<div
    x-data="formTextarea({
        name: '<?php echo e($name); ?>',
        required: <?php echo e($required ? 'true' : 'false'); ?>,
        minlength: <?php echo e($minlength ?? 'null'); ?>,
        maxlength: <?php echo e($maxlength ?? 'null'); ?>,
        autoResize: <?php echo e($autoResize ? 'true' : 'false'); ?>,
        serverError: <?php echo e($error ? \"'\" . addslashes($error) . \"'\" : 'null'); ?>,
    })"
    class="w-full"
>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($label): ?>
        <label for="<?php echo e($inputId); ?>" class="mb-1.5 block text-sm font-medium text-ink">
            <?php echo e($label); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($required): ?>
                <span class="text-danger ml-0.5" aria-hidden="true">*</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </label>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="relative">
        <textarea
            id="<?php echo e($inputId); ?>"
            name="<?php echo e($name); ?>"
            rows="<?php echo e($rows); ?>"
            placeholder="<?php echo e($placeholder); ?>"
            <?php if($required): ?> required aria-required="true" <?php endif; ?>
            <?php if($minlength): ?> minlength="<?php echo e($minlength); ?>" <?php endif; ?>
            <?php if($maxlength): ?> maxlength="<?php echo e($maxlength); ?>" <?php endif; ?>
            <?php if($disabled): ?> disabled <?php endif; ?>
            <?php if($wireModel): ?> wire:model="<?php echo e($wireModel); ?>" <?php endif; ?>
            x-ref="textarea"
            x-on:blur="validate()"
            x-on:input="onInput($event)"
            :aria-invalid="state === 'invalid' ? 'true' : undefined"
            :aria-describedby="(help || errorMessage) ? '<?php echo e($inputId); ?>-desc' : undefined"
            <?php echo e($attributes->class(['textarea w-full'])); ?>

            :class="{
                '!border-success/50 focus:!ring-success/30': state === 'valid',
                '!border-danger/50 focus:!ring-danger/30': state === 'invalid',
            }"
            <?php if($autoResize): ?> style="overflow: hidden; resize: none;" <?php endif; ?>
        ><?php echo e($value); ?></textarea>

        
        <div class="pointer-events-none absolute top-3 right-3" x-cloak>
            <template x-if="state === 'valid'">
                <svg class="h-4 w-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </template>
            <template x-if="state === 'invalid'">
                <svg class="h-4 w-4 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </template>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($maxlength): ?>
        <div class="mt-1 flex justify-end">
            <span
                class="text-xs tabular-nums"
                :class="charCount > <?php echo e($maxlength); ?> ? 'text-danger font-medium' : 'text-muted'"
                x-text="charCount + ' / <?php echo e($maxlength); ?>'"
                aria-live="polite"
            ></span>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div id="<?php echo e($inputId); ?>-desc">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="mt-1.5 text-xs text-danger" role="alert"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <p
            x-show="state === 'invalid' && errorMessage"
            x-text="errorMessage"
            x-cloak
            class="mt-1.5 text-xs text-danger"
            role="alert"
        ></p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($help): ?>
            <p class="mt-1.5 text-xs text-muted"><?php echo e($help); ?></p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        if (Alpine.data.__form_textarea_registered) return;
        Alpine.data.__form_textarea_registered = true;

        Alpine.data('formTextarea', (config) => ({
            state: 'neutral',
            errorMessage: '',
            charCount: 0,

            init() {
                const el = this.$refs.textarea;
                if (!el) return;

                this.charCount = el.value.length;

                if (config.serverError) {
                    this.state = 'invalid';
                    this.errorMessage = config.serverError;
                }

                if (config.autoResize) {
                    this.$nextTick(() => this.resize());
                }
            },

            onInput(e) {
                this.charCount = e.target.value.length;

                if (config.autoResize) {
                    this.resize();
                }

                if (this.state === 'invalid') {
                    this.validate();
                }
            },

            resize() {
                const el = this.$refs.textarea;
                if (!el) return;
                el.style.height = 'auto';
                el.style.height = el.scrollHeight + 'px';
            },

            validate() {
                const el = this.$refs.textarea;
                if (!el) return;
                const value = el.value.trim();

                if (!value && !config.required) {
                    this.state = 'neutral';
                    this.errorMessage = '';
                    return;
                }

                if (config.required && !value) {
                    this.state = 'invalid';
                    this.errorMessage = 'This field is required';
                    return;
                }

                if (config.minlength && value.length < config.minlength) {
                    this.state = 'invalid';
                    this.errorMessage = `Must be at least ${config.minlength} characters`;
                    return;
                }

                if (config.maxlength && value.length > config.maxlength) {
                    this.state = 'invalid';
                    this.errorMessage = `Must be no more than ${config.maxlength} characters`;
                    return;
                }

                this.state = 'valid';
                this.errorMessage = '';
            },
        }));
    });
</script>
<?php /**PATH /home/dahimail.com/public_html/resources/views/components/form-textarea.blade.php ENDPATH**/ ?>