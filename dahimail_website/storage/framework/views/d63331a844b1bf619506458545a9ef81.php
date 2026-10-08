<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => __('Payment Successful')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Payment Successful'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<div class="max-w-lg mx-auto py-16 px-4 text-center">
    <div class="bg-surface-2 rounded-2xl border border-border p-8 space-y-5">
        <div class="w-16 h-16 bg-success/10 rounded-full flex items-center justify-center mx-auto">
            <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>

        <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Payment Successful!')); ?></h1>
        <p class="text-sm text-muted"><?php echo e(__('Your subscription has been activated. You now have access to all plan features.')); ?></p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment): ?>
        <div class="bg-surface rounded-xl p-4 text-sm text-left space-y-1">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->coupon_code): ?>
            <div class="flex justify-between"><span class="text-muted"><?php echo e(__('Original Amount')); ?></span><span class="font-medium text-ink"><?php echo e(strtoupper($payment->currency)); ?> <?php echo e(number_format($payment->original_amount, 2)); ?></span></div>
            <div class="flex justify-between"><span class="text-muted"><?php echo e(__('Coupon')); ?></span><span class="font-medium text-success"><?php echo e($payment->coupon_code); ?></span></div>
            <div class="flex justify-between"><span class="text-muted"><?php echo e(__('Discount')); ?></span><span class="font-medium text-success">-<?php echo e(strtoupper($payment->currency)); ?> <?php echo e(number_format($payment->discount_amount, 2)); ?></span></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="flex justify-between"><span class="text-muted"><?php echo e(__('Amount Paid')); ?></span><span class="font-medium text-ink"><?php echo e(strtoupper($payment->currency)); ?> <?php echo e(number_format($payment->amount, 2)); ?></span></div>
            <div class="flex justify-between"><span class="text-muted"><?php echo e(__('Status')); ?></span><span class="font-medium text-success"><?php echo e(__('Completed')); ?></span></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->gateway_transaction_id): ?>
            <div class="flex justify-between"><span class="text-muted"><?php echo e(__('Transaction ID')); ?></span><span class="font-mono text-xs text-ink"><?php echo e($payment->gateway_transaction_id); ?></span></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->coupon_code && $payment->discount_amount > 0): ?>
        <div class="bg-success/10 border border-success/20 rounded-xl p-3 text-sm text-success font-medium">
            <?php echo e(__('You saved')); ?> <?php echo e(strtoupper($payment->currency)); ?> <?php echo e(number_format($payment->discount_amount, 2)); ?> <?php echo e(__('with coupon')); ?> <?php echo e($payment->coupon_code); ?>!
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <a href="<?php echo e(route('dashboard')); ?>" class="inline-block px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition-colors">
            <?php echo e(__('Go to Dashboard')); ?>

        </a>
    </div>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/checkout/success.blade.php ENDPATH**/ ?>