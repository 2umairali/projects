<?php
    $steps = [
        ['num' => 1, 'label' => __('Welcome')],
        ['num' => 2, 'label' => __('Requirements')],
        ['num' => 3, 'label' => __('Database')],
        ['num' => 4, 'label' => __('Application')],
        ['num' => 5, 'label' => __('Admin Account')],
        ['num' => 6, 'label' => __('Install')],
    ];
?>

<div class="space-y-1 mt-8">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <?php
            $isCompleted = $currentStep > $step['num'];
            $isActive = $currentStep === $step['num'];
            $isPending = $currentStep < $step['num'];
        ?>
        <div class="flex items-center gap-4 py-2.5 px-3 rounded-xl transition-all <?php echo e($isActive ? 'bg-primary/10' : ''); ?>">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isCompleted): ?>
                <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            <?php elseif($isActive): ?>
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center shrink-0 shadow-lg shadow-primary/30">
                    <span class="text-xs font-bold text-white"><?php echo e($step['num']); ?></span>
                </div>
            <?php else: ?>
                <div class="w-8 h-8 rounded-full bg-[#1a1d27] border border-[#2d3039] flex items-center justify-center shrink-0">
                    <span class="text-xs font-medium text-gray-500"><?php echo e($step['num']); ?></span>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <span class="text-[11px] font-bold uppercase tracking-widest <?php echo e($isActive ? 'text-primary' : ($isCompleted ? 'text-gray-200' : 'text-gray-500')); ?>">
                <?php echo e($step['label']); ?>

            </span>
        </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/install/partials/steps.blade.php ENDPATH**/ ?>