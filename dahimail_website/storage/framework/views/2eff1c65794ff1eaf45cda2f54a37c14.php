<?php if (isset($component)) { $__componentOriginala9d35bca55314290701d0fd9db1a187a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala9d35bca55314290701d0fd9db1a187a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.settings','data' => ['title' => __('Security')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.settings'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Security'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">
        
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Security')); ?></h1>
            <p class="text-sm text-muted mt-1"><?php echo e(__('Manage your password, two-factor authentication, and active sessions.')); ?></p>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
            <div class="flex items-center gap-3 p-4 bg-success/10 border border-success/20 rounded-xl">
                <svg class="w-5 h-5 text-success flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-success"><?php echo e(session('status')); ?></p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <form method="POST" action="<?php echo e(url('/user/password')); ?>" class="bg-surface-2 rounded-2xl border border-border p-6 space-y-5">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Change Password')); ?></h2>
                <p class="text-sm text-muted mt-1"><?php echo e(__('Ensure your account is using a strong, unique password.')); ?></p>
            </div>

            
            <div>
                <label for="current_password" class="block text-sm font-medium text-ink/80 mb-1.5"><?php echo e(__('Current Password')); ?></label>
                <input id="current_password"
                       type="password"
                       name="current_password"
                       required
                       autocomplete="current-password"
                       placeholder="<?php echo e(__('Enter current password')); ?>"
                       class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent placeholder-gray-400 <?php $__errorArgs = ['current_password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['current_password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="password" class="block text-sm font-medium text-ink/80 mb-1.5"><?php echo e(__('New Password')); ?></label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="new-password"
                           placeholder="<?php echo e(__('Enter new password')); ?>"
                           class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent placeholder-gray-400 <?php $__errorArgs = ['password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-ink/80 mb-1.5"><?php echo e(__('Confirm New Password')); ?></label>
                    <input id="password_confirmation"
                           type="password"
                           name="password_confirmation"
                           required
                           autocomplete="new-password"
                           placeholder="<?php echo e(__('Confirm new password')); ?>"
                           class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent placeholder-gray-400">
                </div>
            </div>

            
            <div class="bg-surface rounded-xl p-4">
                <p class="text-xs font-medium text-muted mb-2"><?php echo e(__('Password requirements:')); ?></p>
                <ul class="text-xs text-muted space-y-1">
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-muted flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/></svg>
                        <?php echo e(__('At least 8 characters')); ?>

                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-muted flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/></svg>
                        <?php echo e(__('One uppercase letter')); ?>

                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-muted flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/></svg>
                        <?php echo e(__('One number and one special character')); ?>

                    </li>
                </ul>
            </div>

            
            <div class="flex items-center justify-end">
                <button type="submit"
                        class="px-6 py-2.5 bg-primary-600 text-white text-sm font-medium rounded-xl hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors">
                    <?php echo e(__('Update Password')); ?>

                </button>
            </div>
        </form>

        
        <?php
            $user = auth()->user();
            $twoFactorEnabled = $user->hasTwoFactorEnabled();
            $rawCodes = $user->two_factor_recovery_codes ?? null;
            $recoveryCodes = null;

            if ($twoFactorEnabled && $rawCodes) {
                try {
                    $recoveryCodes = json_decode(\Illuminate\Support\Facades\Crypt::decryptString($rawCodes), true);
                } catch (\Exception $e) {
                    $recoveryCodes = null;
                }
            }
        ?>

        <div class="bg-surface-2 rounded-2xl border border-border p-6 space-y-5">
            <div>
                <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Two-Factor Authentication')); ?></h2>
                <p class="text-sm text-muted mt-1"><?php echo e(__('Add an extra layer of security to your account using an authenticator app.')); ?></p>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($twoFactorEnabled): ?>
                
                <div class="flex items-center gap-3 p-4 bg-success/10 border border-success/20 rounded-xl">
                    <svg class="w-5 h-5 text-success flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <div>
                        <p class="text-sm text-success"><?php echo e(__('Two-factor authentication is')); ?> <strong><?php echo e(__('enabled')); ?></strong>. <?php echo e(__('Your account is secured with an authenticator app.')); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->two_factor_confirmed_at): ?>
                            <p class="text-xs text-success mt-0.5"><?php echo e(__('Enabled on')); ?> <?php echo e($user->two_factor_confirmed_at->format('M j, Y \a\t g:i A')); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($recoveryCodes) && count($recoveryCodes) > 0): ?>
                    <div class="space-y-3" x-data="{ showCodes: false }">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-medium text-ink"><?php echo e(__('Recovery Codes')); ?></h3>
                                <p class="text-xs text-muted mt-0.5"><?php echo e(__('Store these in a secure location. Each code can only be used once.')); ?></p>
                            </div>
                            <button type="button" @click="showCodes = !showCodes"
                                    class="text-xs font-medium text-primary-600 hover:text-primary-700 transition-colors">
                                <span x-show="!showCodes"><?php echo e(__('Show codes')); ?></span>
                                <span x-show="showCodes" x-cloak><?php echo e(__('Hide codes')); ?></span>
                            </button>
                        </div>

                        <div x-show="showCodes" x-cloak x-transition class="bg-surface rounded-xl p-4 border border-border">
                            <div class="grid grid-cols-2 gap-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $recoveryCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <code class="block text-sm font-mono text-ink/80 bg-surface-2 px-3 py-2 rounded-lg border border-border text-center"><?php echo e($code); ?></code>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                            <p class="mt-3 text-xs text-muted"><?php echo e(count($recoveryCodes)); ?> <?php echo e(__('recovery code(s) remaining')); ?></p>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div x-data="{ showDisable: false }">
                    <button type="button" @click="showDisable = !showDisable"
                            class="px-5 py-2.5 text-sm font-medium text-danger border border-danger/20 rounded-xl hover:bg-danger/10 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                        <?php echo e(__('Disable Two-Factor Authentication')); ?>

                    </button>

                    <form method="POST" action="<?php echo e(route('two-factor.deactivate')); ?>"
                          x-show="showDisable" x-cloak x-transition
                          class="mt-4 p-4 bg-danger/10 border border-danger/20 rounded-xl space-y-4">
                        <?php echo csrf_field(); ?>

                        <p class="text-sm text-danger"><?php echo e(__('Enter your password to confirm disabling two-factor authentication.')); ?></p>

                        <div>
                            <label for="disable_password" class="block text-sm font-medium text-ink/80 mb-1.5"><?php echo e(__('Password')); ?></label>
                            <input id="disable_password"
                                   type="password"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   placeholder="<?php echo e(__('Enter your password')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="submit"
                                    class="px-5 py-2.5 bg-red-600 text-white text-sm font-medium rounded-xl hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                                <?php echo e(__('Confirm Disable')); ?>

                            </button>
                            <button type="button" @click="showDisable = false"
                                    class="px-5 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                                <?php echo e(__('Cancel')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                
                <div class="flex items-center gap-3 p-4 bg-warning/10 border border-warning/20 rounded-xl">
                    <svg class="w-5 h-5 text-yellow-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-yellow-800"><?php echo e(__('Two-factor authentication is not enabled.')); ?></p>
                        <p class="text-xs text-warning mt-0.5"><?php echo e(__('Enable it to add an extra layer of security to your account. You will need an authenticator app like Google Authenticator or Authy.')); ?></p>
                    </div>
                </div>

                
                <a href="<?php echo e(route('two-factor.setup')); ?>"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white text-sm font-medium rounded-xl hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <?php echo e(__('Set Up Two-Factor Authentication')); ?>

                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="bg-surface-2 rounded-2xl border border-border p-6 space-y-4">
            <div>
                <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Active Sessions')); ?></h2>
                <p class="text-sm text-muted mt-1"><?php echo e(__('Manage your logged-in devices and sessions.')); ?></p>
            </div>

            <div class="flex items-start gap-3 p-4 bg-info/10 border border-info/20 rounded-xl">
                <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-sm font-medium text-blue-800"><?php echo e(__('Session management shows your active login sessions across devices.')); ?></p>
                    <p class="text-xs text-info mt-1">
                        <?php echo e(__('Once')); ?> <code class="bg-info/15 px-1.5 py-0.5 rounded text-blue-800 font-mono">SESSION_DRIVER=database</code> <?php echo e(__('is set in your environment, you will be able to view and revoke active sessions from all your devices here.')); ?>

                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 text-sm">
                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                </svg>
                <a href="<?php echo e(url('/settings/profile')); ?>" class="text-primary-600 font-medium hover:text-primary-700 transition-colors">
                    <?php echo e(__('Go to Profile Settings')); ?>

                </a>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala9d35bca55314290701d0fd9db1a187a)): ?>
<?php $attributes = $__attributesOriginala9d35bca55314290701d0fd9db1a187a; ?>
<?php unset($__attributesOriginala9d35bca55314290701d0fd9db1a187a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d35bca55314290701d0fd9db1a187a)): ?>
<?php $component = $__componentOriginala9d35bca55314290701d0fd9db1a187a; ?>
<?php unset($__componentOriginala9d35bca55314290701d0fd9db1a187a); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/settings/security.blade.php ENDPATH**/ ?>