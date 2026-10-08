<?php $__env->startSection('title', __('Complete')); ?>
<?php $__env->startSection('content'); ?>
    <div class="bg-surface-2 rounded-2xl border border-border/60 p-4 sm:p-6 shadow-sm">
        
        <div class="text-center py-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
            
            <div class="relative mx-auto w-24 h-24 mb-8"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 scale-50"
                 x-transition:enter-end="opacity-100 scale-100">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($completedCount === 5): ?>
                    <div class="absolute inset-0 bg-success/15 rounded-full animate-ping opacity-20"></div>
                    <div class="relative w-24 h-24 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-lg shadow-green-200">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                <?php else: ?>
                    <div class="absolute inset-0 bg-primary-100 rounded-full animate-ping opacity-20"></div>
                    <div class="relative w-24 h-24 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center shadow-lg shadow-primary-200">
                        <span class="text-2xl font-bold text-white"><?php echo e($completedCount); ?>/5</span>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <h1 class="text-3xl font-bold text-ink mb-3"
                x-show="show"
                x-transition:enter="transition ease-out duration-500 delay-200"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($completedCount === 5): ?>
                    <?php echo e(__("You're all set!")); ?>

                <?php else: ?>
                    <?php echo e(__('Almost there!')); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </h1>
            <p class="text-muted max-w-md mx-auto"
               x-show="show"
               x-transition:enter="transition ease-out duration-500 delay-300"
               x-transition:enter-start="opacity-0 translate-y-4"
               x-transition:enter-end="opacity-100 translate-y-0">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($completedCount === 5): ?>
                    <?php echo e(__('Your workspace is fully configured and ready to go.')); ?> <?php echo e(config('app.name')); ?> <?php echo e(__('will start learning from your communications right away.')); ?>

                <?php else: ?>
                    <?php echo e(__('You completed :count of 5 setup steps. You can finish the remaining steps anytime from your settings, or jump straight into your inbox.', ['count' => $completedCount])); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
            
            <a href="<?php echo e(route('dashboard')); ?>"
               class="group flex flex-col items-center justify-center p-6 bg-primary-600 text-white rounded-2xl hover:bg-primary-700 transition-all duration-200 shadow-lg shadow-primary-500/20 hover:shadow-xl hover:-translate-y-0.5">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-3 group-hover:bg-white/30 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold mb-1"><?php echo e(__('Go to Inbox')); ?></h3>
                <p class="text-xs text-white/70 text-center"><?php echo e(__('Start managing your emails with AI')); ?></p>
            </a>

            
            <a href="<?php echo e(route('dashboard')); ?>"
               class="group flex flex-col items-center justify-center p-6 bg-surface-2 border border-border rounded-2xl hover:border-primary-600 hover:bg-primary-900/20 transition-all duration-200 hover:-translate-y-0.5">
                <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-3 group-hover:bg-primary-200 transition-colors">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-ink mb-1"><?php echo e(__('Explore Dashboard')); ?></h3>
                <p class="text-xs text-muted text-center"><?php echo e(__('Discover all features at a glance')); ?></p>
            </a>

            
            <a href="<?php echo e(route('knowledge-base')); ?>"
               class="group flex flex-col items-center justify-center p-6 bg-surface-2 border border-border rounded-2xl hover:border-primary-600 hover:bg-primary-900/20 transition-all duration-200 hover:-translate-y-0.5">
                <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-3 group-hover:bg-primary-200 transition-colors">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-ink mb-1"><?php echo e(__('Read the Docs')); ?></h3>
                <p class="text-xs text-muted text-center"><?php echo e(__('Learn advanced features and tips')); ?></p>
            </a>
        </div>

        
        <div class="mt-6 p-4 bg-primary-900/20 border border-primary-800 rounded-xl text-center">
            <p class="text-sm text-primary-700 dark:text-primary-300">
                <?php echo e(__("We've added")); ?> <strong><?php echo e(__('5 sample contacts')); ?></strong> <?php echo e(__('and')); ?> <strong><?php echo e(__('3 quick reply templates')); ?></strong> <?php echo e(__('to help you explore. You can delete them anytime.')); ?>

            </p>
        </div>

        
        <div class="mt-8 p-5 bg-surface border border-border rounded-xl">
            <div class="flex items-center justify-between mb-3">
                <h4 class="text-sm font-semibold text-ink"><?php echo e(__('Setup Summary')); ?></h4>
                <span class="text-xs font-medium px-2 py-1 rounded-full <?php echo e($completedCount === 5 ? 'bg-success/15 text-success' : 'bg-warning/15 text-warning'); ?>">
                    <?php echo e($completedCount); ?>/5 <?php echo e(__('completed')); ?>

                </span>
            </div>
            <div class="space-y-2">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($steps['workspace']): ?>
                    <div class="flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-ink/80"><?php echo e(__('Workspace created')); ?></span>
                    </div>
                <?php else: ?>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded-full border-2 border-border flex-shrink-0"></div>
                            <span class="text-muted"><?php echo e(__('Workspace created')); ?></span>
                        </div>
                        <a href="<?php echo e(route('onboarding.step-1')); ?>" class="text-xs font-medium text-primary-600 hover:text-primary-700"><?php echo e(__('Complete now')); ?></a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($steps['email']): ?>
                    <div class="flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-ink/80"><?php echo e(__('Email account connected')); ?></span>
                    </div>
                <?php else: ?>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded-full border-2 border-border flex-shrink-0"></div>
                            <span class="text-muted"><?php echo e(__('Email account connected')); ?></span>
                        </div>
                        <a href="<?php echo e(route('onboarding.step-2')); ?>" class="text-xs font-medium text-primary-600 hover:text-primary-700"><?php echo e(__('Complete now')); ?></a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($steps['ai']): ?>
                    <div class="flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-ink/80"><?php echo e(__('AI assistant trained')); ?></span>
                    </div>
                <?php else: ?>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded-full border-2 border-border flex-shrink-0"></div>
                            <span class="text-muted"><?php echo e(__('AI assistant trained')); ?></span>
                        </div>
                        <a href="<?php echo e(route('onboarding.step-3')); ?>" class="text-xs font-medium text-primary-600 hover:text-primary-700"><?php echo e(__('Complete now')); ?></a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($steps['auto_reply']): ?>
                    <div class="flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-ink/80"><?php echo e(__('Auto-reply rules set')); ?></span>
                    </div>
                <?php else: ?>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded-full border-2 border-border flex-shrink-0"></div>
                            <span class="text-muted"><?php echo e(__('Auto-reply rules set')); ?></span>
                        </div>
                        <a href="<?php echo e(route('onboarding.step-4')); ?>" class="text-xs font-medium text-primary-600 hover:text-primary-700"><?php echo e(__('Complete now')); ?></a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($steps['team']): ?>
                    <div class="flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-ink/80"><?php echo e(__('Team members invited')); ?></span>
                    </div>
                <?php else: ?>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded-full border-2 border-border flex-shrink-0"></div>
                            <span class="text-muted"><?php echo e(__('Team members invited')); ?></span>
                        </div>
                        <a href="<?php echo e(route('onboarding.step-5')); ?>" class="text-xs font-medium text-primary-600 hover:text-primary-700"><?php echo e(__('Complete now')); ?></a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.onboarding', ['currentStep' => 6], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/dahimail.com/public_html/resources/views/onboarding/complete.blade.php ENDPATH**/ ?>