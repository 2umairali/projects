<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Edit Coupon'),'subtitle' => __('Update coupon') . ' ' . $coupon->code . ' ' . __('settings.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Edit Coupon')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Update coupon') . ' ' . $coupon->code . ' ' . __('settings.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        <form method="POST" action="<?php echo e(route('admin.coupons.update', $coupon->id)); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Edit Coupon')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Only name, status, maximum uses, and expiration can be modified. Stripe coupons are mostly immutable once created.')); ?></p>
                </div>
                <div class="p-6 space-y-5">
                    
                    <div class="p-4 bg-surface/50 rounded-xl border border-border dark:border-gray-700/50 space-y-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted"><?php echo e(__('Immutable Fields (set at creation)')); ?></p>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <div>
                                <p class="text-xs text-muted"><?php echo e(__('Code')); ?></p>
                                <code class="text-sm font-bold text-brand"><?php echo e($coupon->code); ?></code>
                            </div>
                            <div>
                                <p class="text-xs text-muted"><?php echo e(__('Type')); ?></p>
                                <p class="text-sm font-medium text-ink">
                                    <?php echo e($coupon->type === 'percent_off' ? __('Percentage') : __('Fixed Amount')); ?>

                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-muted"><?php echo e(__('Value')); ?></p>
                                <p class="text-sm font-bold text-ink">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->type === 'percent_off'): ?>
                                        <?php echo e($coupon->percent_off); ?>%
                                    <?php else: ?>
                                        <?php echo \App\Helpers\CurrencyHelper::display($coupon->amount_off); ?>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-muted"><?php echo e(__('Duration')); ?></p>
                                <p class="text-sm font-medium text-ink capitalize">
                                    <?php echo e($coupon->duration); ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->duration === 'repeating' && $coupon->duration_in_months): ?>
                                        (<?php echo e($coupon->duration_in_months); ?> <?php echo e(__('months')); ?>)
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Name')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                        <input type="text" name="name" id="name" value="<?php echo e(old('name', $coupon->name)); ?>" required aria-required="true"
                               placeholder="<?php echo e(__('e.g. Summer Sale 20% Off')); ?>"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        
                        <div class="flex items-center gap-3 sm:pt-5">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $coupon->is_active) ? 'checked' : ''); ?>

                                       class="sr-only peer">
                                <div class="w-10 h-5 bg-gray-200 peer-focus:ring-2 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-surface-2 after:border-border after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand"></div>
                            </label>
                            <span class="text-sm font-medium text-ink"><?php echo e(__('Active')); ?></span>
                        </div>

                        
                        <div>
                            <label for="max_redemptions" class="block text-sm font-medium text-ink mb-1.5">
                                <?php echo e(__('Maximum Uses')); ?>

                                <span class="relative inline-block ml-1" x-data="{ show: false }">
                                    <svg @mouseenter="show = true" @mouseleave="show = false" class="w-4 h-4 inline text-muted/60 cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div x-show="show" x-transition class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-ink rounded-lg shadow-lg whitespace-nowrap z-50">
                                        <?php echo e(__('Total number of times this coupon can be applied across all customers.')); ?>

                                        <div class="absolute top-full left-1/2 -translate-x-1/2 -mt-1 w-2 h-2 bg-ink rotate-45"></div>
                                    </div>
                                </span>
                            </label>
                            <input type="number" name="max_redemptions" id="max_redemptions" value="<?php echo e(old('max_redemptions', $coupon->max_redemptions)); ?>"
                                   min="1"
                                   placeholder="<?php echo e(__('Unlimited')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['max_redemptions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->times_redeemed): ?>
                                <p class="text-xs text-muted mt-1"><?php echo e(__('Already used')); ?> <?php echo e($coupon->times_redeemed); ?> <?php echo e(__('time(s).')); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['max_redemptions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="expires_at" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Expiration Date')); ?></label>
                            <input type="date" name="expires_at" id="expires_at"
                                   value="<?php echo e(old('expires_at', $coupon->expires_at ? \Carbon\Carbon::parse($coupon->expires_at)->format('Y-m-d') : '')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['expires_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['expires_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="flex items-center justify-between">
                <a href="<?php echo e(route('admin.coupons.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <?php echo e(__('Back to Coupons')); ?>

                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand text-white text-sm font-semibold rounded-xl hover:bg-brand-strong shadow-lg shadow-soft transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php echo e(__('Update Coupon')); ?>

                </button>
            </div>
        </form>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/coupons/edit.blade.php ENDPATH**/ ?>