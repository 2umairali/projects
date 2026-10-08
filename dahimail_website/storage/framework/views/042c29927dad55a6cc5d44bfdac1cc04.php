<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(__('Admin Login')); ?> — <?php echo e(config('app.name')); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-surface antialiased">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            
            <div class="text-center mb-8">
                <div class="w-14 h-14 bg-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-primary-500/30">
                    <span class="text-2xl font-bold text-white">M</span>
                </div>
                <h1 class="text-2xl font-bold text-white"><?php echo e(__('Admin Panel')); ?></h1>
                <p class="text-sm text-muted mt-1"><?php echo e(config('app.name')); ?> <?php echo e(__('Administration Console')); ?></p>
            </div>

            
            <div class="bg-surface rounded-2xl border border-gray-700 p-8">
                <form method="POST" action="<?php echo e(route('admin.login')); ?>" class="space-y-5">
                    <?php echo csrf_field(); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="p-3 bg-red-900/50 border border-red-700 text-red-300 text-sm rounded-xl">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <p><?php echo e($error); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div>
                        <label class="block text-sm font-medium text-muted/50 mb-1.5"><?php echo e(__('Email Address')); ?></label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                               placeholder="<?php echo e(__('admin@mailtrixy.com')); ?>"
                               class="w-full px-4 py-2.5 text-sm bg-gray-700 border border-gray-600 text-white placeholder-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-muted/50 mb-1.5"><?php echo e(__('Password')); ?></label>
                        <input type="password" name="password" required
                               placeholder="<?php echo e(__('Enter your password')); ?>"
                               class="w-full px-4 py-2.5 text-sm bg-gray-700 border border-gray-600 text-white placeholder-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-muted/50 mb-1.5"><?php echo e(__('2FA Code')); ?> <span class="text-muted"><?php echo e(__('(if enabled)')); ?></span></label>
                        <input type="text" name="two_factor_code" maxlength="6"
                               placeholder="000000"
                               class="w-full px-4 py-2.5 text-sm bg-gray-700 border border-gray-600 text-white placeholder-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-mono tracking-widest text-center">
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                    <div class="p-3 bg-red-900/50 border border-red-700 text-red-300 text-sm rounded-xl">
                        <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <button type="submit"
                            class="w-full px-4 py-3 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition-colors shadow-lg shadow-primary-500/30">
                        <?php echo e(__('Sign in to Admin Panel')); ?>

                    </button>
                </form>
            </div>

            <p class="text-center text-xs text-muted mt-6">
                <a href="<?php echo e(url('/')); ?>" class="hover:text-muted/50 transition-colors">&larr; <?php echo e(__('Back to')); ?> <?php echo e(config('app.name')); ?></a>
            </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/login.blade.php ENDPATH**/ ?>