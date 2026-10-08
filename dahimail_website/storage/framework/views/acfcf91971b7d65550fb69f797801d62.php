<?php $__env->startSection('content'); ?>
<h2 class="text-xl font-bold text-gray-900 mb-1"><?php echo e(__('Application Settings')); ?></h2>
<p class="text-sm text-gray-500 mb-6"><?php echo e(__('Configure your')); ?> <?php echo e(config('app.name')); ?> <?php echo e(__('instance.')); ?></p>

<form method="POST" action="<?php echo e(route('install.application.save')); ?>">
    <?php echo csrf_field(); ?>
    <div class="space-y-4">
        <div>
            <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Application Name')); ?></label>
            <input type="text" name="name" value="<?php echo e(session('app.name', config('app.name', 'MailTrixy'))); ?>" required maxlength="100" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="MailTrixy">
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Application URL')); ?></label>
            <input type="url" name="url" value="<?php echo e(session('app.url', request()->root())); ?>" required maxlength="255" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="https://yourdomain.com">
            <p class="text-xs text-gray-400 mt-1"><?php echo e(__('The full URL where')); ?> <?php echo e(config('app.name')); ?> <?php echo e(__('will be accessible. No trailing slash.')); ?></p>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Timezone')); ?></label>
            <select name="timezone" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = timezone_identifiers_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <option value="<?php echo e($tz); ?>" <?php echo e(session('app.timezone', 'UTC') === $tz ? 'selected' : ''); ?>><?php echo e($tz); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
        </div>
    </div>

    <div class="mt-8 flex items-center justify-between">
        <a href="<?php echo e(route('install.database')); ?>" class="text-sm text-gray-500 hover:text-gray-700">&larr; <?php echo e(__('Back')); ?></a>
        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700"><?php echo e(__('Save & Continue')); ?></button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/dahimail.com/public_html/resources/views/install/application.blade.php ENDPATH**/ ?>