<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
    'label' => null,
    'required' => false,
    'options' => [],
    'placeholder' => 'Select an option',
    'value' => '',
    'help' => null,
    'error' => null,
    'disabled' => false,
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
    'options' => [],
    'placeholder' => 'Select an option',
    'value' => '',
    'help' => null,
    'error' => null,
    'disabled' => false,
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
    x-data="formSelect({
        name: '<?php echo e($name); ?>',
        required: <?php echo e($required ? 'true' : 'false'); ?>,
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
        <select
            id="<?php echo e($inputId); ?>"
            name="<?php echo e($name); ?>"
            <?php if($required): ?> required aria-required="true" <?php endif; ?>
            <?php if($disabled): ?> disabled <?php endif; ?>
            <?php if($wireModel): ?> wire:model="<?php echo e($wireModel); ?>" <?php endif; ?>
            x-ref="select"
            x-on:change="validate()"
            x-on:blur="validate()"
            :aria-invalid="state === 'invalid' ? 'true' : undefined"
            :aria-describedby="(help || errorMessage) ? '<?php echo e($inputId); ?>-desc' : undefined"
            <?php echo e($attributes->class(['select w-full'])); ?>

            :class="{
                '!border-success/50 focus:!ring-success/30': state === 'valid',
                '!border-danger/50 focus:!ring-danger/30': state === 'invalid',
            }"
        >
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($placeholder): ?>
                <option value="" disabled <?php echo e(!$value ? 'selected' : ''); ?>><?php echo e($placeholder); ?></option>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue => $optionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($optionLabel)): ?>
                    
                    <optgroup label="<?php echo e($optionValue); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $optionLabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupValue => $groupLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($groupValue); ?>" <?php echo e((string)$value === (string)$groupValue ? 'selected' : ''); ?>>
                                <?php echo e($groupLabel); ?>

                            </option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </optgroup>
                <?php else: ?>
                    <option value="<?php echo e($optionValue); ?>" <?php echo e((string)$value === (string)$optionValue ? 'selected' : ''); ?>>
                        <?php echo e($optionLabel); ?>

                    </option>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

            <?php echo e($slot); ?>

        </select>

        
        <div class="pointer-events-none absolute inset-y-0 right-8 flex items-center" x-cloak>
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
        if (Alpine.data.__form_select_registered) return;
        Alpine.data.__form_select_registered = true;

        Alpine.data('formSelect', (config) => ({
            state: 'neutral',
            errorMessage: '',

            init() {
                if (config.serverError) {
                    this.state = 'invalid';
                    this.errorMessage = config.serverError;
                }
            },

            validate() {
                const el = this.$refs.select;
                if (!el) return;
                const value = el.value;

                if (!value && !config.required) {
                    this.state = 'neutral';
                    this.errorMessage = '';
                    return;
                }

                if (config.required && !value) {
                    this.state = 'invalid';
                    this.errorMessage = 'Please select an option';
                    return;
                }

                this.state = 'valid';
                this.errorMessage = '';
            },
        }));
    });
</script>
<?php /**PATH /home/dahimail.com/public_html/resources/views/components/form-select.blade.php ENDPATH**/ ?>