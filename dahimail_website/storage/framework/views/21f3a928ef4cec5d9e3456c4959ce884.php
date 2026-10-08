<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['currentStep' => 1]));

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

foreach (array_filter((['currentStep' => 1]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$steps = [
    1 => 'Workspace',
    2 => 'Email',
    3 => 'AI Training',
    4 => 'Auto-Reply',
    5 => 'Team',
];
?>

<div class="w-full max-w-3xl mx-auto mb-10">
    <div class="flex items-center justify-between">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <?php
                $isCompleted = $number < $currentStep;
                $isCurrent = $number === $currentStep;
                $isFuture = $number > $currentStep;
            ?>

            
            <div class="flex flex-col items-center relative z-10">
                <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 transition-all duration-300
                    <?php if($isCompleted): ?> bg-success/100 border-green-500 text-white
                    <?php elseif($isCurrent): ?> bg-primary-600 border-primary-600 text-white ring-4 ring-primary-100
                    <?php else: ?> bg-surface-2 border-border text-muted
                    <?php endif; ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isCompleted): ?>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    <?php else: ?>
                        <span class="text-sm font-semibold"><?php echo e($number); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <span class="mt-2 text-xs font-medium
                    <?php if($isCompleted): ?> text-success
                    <?php elseif($isCurrent): ?> text-primary-700
                    <?php else: ?> text-muted
                    <?php endif; ?>"><?php echo e($label); ?></span>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($number < count($steps)): ?>
                <div class="flex-1 h-0.5 mx-2 -mt-5
                    <?php if($number < $currentStep): ?> bg-success/100
                    <?php else: ?> bg-gray-200
                    <?php endif; ?>"></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/components/onboarding-progress.blade.php ENDPATH**/ ?>