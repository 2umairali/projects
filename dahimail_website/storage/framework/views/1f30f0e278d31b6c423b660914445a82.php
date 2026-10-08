<?php $__env->startSection('content'); ?>
<h2 class="text-xl font-bold text-gray-900 mb-1"><?php echo e(__('Create Admin Account')); ?></h2>
<p class="text-sm text-gray-500 mb-6"><?php echo e(__('This will be the super admin account for managing')); ?> <?php echo e(config('app.name')); ?>.</p>

<form method="POST" action="<?php echo e(route('install.admin.save')); ?>">
    <?php echo csrf_field(); ?>
    <div class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Full Name')); ?></label>
                <input type="text" name="name" value="<?php echo e(session('admin_data.name', '')); ?>" required maxlength="40" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="John Doe">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Email Address')); ?></label>
                <input type="email" name="email" value="<?php echo e(session('admin_data.email', '')); ?>" required maxlength="255" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="admin@example.com">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Password')); ?></label>
                <input type="password" name="password" required minlength="8" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="<?php echo e(__('Min. 8 characters')); ?>">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Confirm Password')); ?></label>
                <input type="password" name="password_confirmation" required minlength="8" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="<?php echo e(__('Repeat password')); ?>">
            </div>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
    <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?><p><?php echo e($error); ?></p><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="mt-8 flex items-center justify-between">
        <a href="<?php echo e(route('install.application')); ?>" class="text-sm text-gray-500 hover:text-gray-700">&larr; <?php echo e(__('Back')); ?></a>
        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700"><?php echo e(__('Create Admin & Install')); ?></button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/dahimail.com/public_html/resources/views/install/admin.blade.php ENDPATH**/ ?>