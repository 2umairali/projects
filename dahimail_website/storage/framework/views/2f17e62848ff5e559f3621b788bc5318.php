<?php $__env->startSection('title', __('Complete')); ?>
<?php $__env->startSection('step-name', __('Complete')); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 text-center">
    <div class="w-20 h-20 bg-emerald-500/10 rounded-full flex items-center justify-center mx-auto">
        <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>

    <div class="space-y-2">
        <h1 class="text-2xl font-bold tracking-tight"><?php echo e(__('Installation')); ?> <span class="text-primary italic"><?php echo e(__('Complete!')); ?></span></h1>
        <p class="text-gray-500 text-sm"><?php echo e(config('app.name')); ?> <?php echo e(__('has been successfully installed and is ready to use.')); ?></p>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('install_complete')): ?>
    <div class="bg-[#15171e] rounded-xl border border-[#2d3039] p-5 text-left max-w-sm mx-auto space-y-2">
        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-400"><?php echo e(__('Admin Credentials')); ?></label>
        <div class="flex justify-between text-sm"><span class="text-gray-500"><?php echo e(__('Email')); ?></span><span class="font-semibold text-gray-900"><?php echo e(session('install_complete.email')); ?></span></div>
        <div class="flex justify-between text-sm"><span class="text-gray-500"><?php echo e(__('URL')); ?></span><span class="font-semibold text-gray-900"><?php echo e(session('install_complete.url')); ?></span></div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="flex items-center justify-center gap-3">
        <a href="<?php echo e(url('/login')); ?>" class="h-11 px-6 rounded-xl bg-primary hover:bg-primary/90 text-sm font-bold shadow-lg shadow-primary/20 transition-all text-white flex items-center justify-center"><?php echo e(__('Open Admin Panel')); ?></a>
        <a href="<?php echo e(url('/')); ?>" class="h-11 px-6 rounded-xl bg-gray-100 border border-gray-200 hover:bg-[#1a1d27] text-sm font-bold transition-all text-gray-700 flex items-center justify-center"><?php echo e(__('Visit Homepage')); ?></a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/dahimail.com/public_html/resources/views/install/complete.blade.php ENDPATH**/ ?>