<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Coupon') . ' ' . $coupon->code,'subtitle' => $coupon->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Coupon') . ' ' . $coupon->code),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($coupon->name)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <code class="text-sm font-bold text-brand"><?php echo e($coupon->code); ?></code>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->expires_at && \Carbon\Carbon::parse($coupon->expires_at)->isPast()): ?>
                        <span class="badge badge-error"><?php echo e(__('Expired')); ?></span>
                    <?php elseif($coupon->is_active): ?>
                        <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                    <?php else: ?>
                        <span class="badge badge-ghost"><?php echo e(__('Inactive')); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <a href="<?php echo e(route('admin.coupons.edit', $coupon->id)); ?>" class="btn-secondary"><?php echo e(__('Edit Coupon')); ?></a>
            </div>
        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Discount Information')); ?></h2>
                </div>
                <div class="divide-y divide-border">
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Type')); ?></span>
                        <span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->type === 'percent_off'): ?>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-brand/15 text-brand"><?php echo e(__('Percentage')); ?></span>
                            <?php else: ?>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-info/15 text-info"><?php echo e(__('Fixed Amount')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Value')); ?></span>
                        <span class="text-lg font-extrabold text-ink">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->type === 'percent_off'): ?>
                                <?php echo e($coupon->percent_off); ?>% <?php echo e(__('off')); ?>

                            <?php else: ?>
                                <?php echo \App\Helpers\CurrencyHelper::display($coupon->amount_off); ?> <?php echo e(__('off')); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Duration')); ?></span>
                        <span class="text-sm font-medium text-ink capitalize">
                            <?php echo e($coupon->duration); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->duration === 'repeating' && $coupon->duration_in_months): ?>
                                <span class="text-muted font-normal">(<?php echo e($coupon->duration_in_months); ?> <?php echo e(__('months')); ?>)</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Status')); ?></span>
                        <span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->is_active): ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-success/15 text-success"><?php echo e(__('Active')); ?></span>
                            <?php else: ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-surface text-ink/80"><?php echo e(__('Inactive')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Usage & Dates')); ?></h2>
                </div>
                <div class="divide-y divide-border">
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Redemptions')); ?></span>
                        <div class="text-right">
                            <span class="text-sm font-bold text-ink"><?php echo e($coupon->times_redeemed ?? 0); ?></span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->max_redemptions): ?>
                                <span class="text-muted"> / <?php echo e($coupon->max_redemptions); ?></span>
                                <div class="w-24 h-1.5 bg-gray-200 rounded-full mt-1 ml-auto">
                                    <div class="h-1.5 bg-brand/100 rounded-full" style="width: <?php echo e(min(100, (($coupon->times_redeemed ?? 0) / $coupon->max_redemptions) * 100)); ?>%"></div>
                                </div>
                            <?php else: ?>
                                <span class="text-muted"> / <?php echo e(__('unlimited')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Expires At')); ?></span>
                        <span class="text-sm font-medium text-ink">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->expires_at): ?>
                                <?php echo e(\Carbon\Carbon::parse($coupon->expires_at)->format('M j, Y g:i A')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(\Carbon\Carbon::parse($coupon->expires_at)->isPast()): ?>
                                    <span class="block text-xs text-danger font-medium text-right"><?php echo e(__('Already expired')); ?></span>
                                <?php else: ?>
                                    <span class="block text-xs text-muted text-right" title="<?php echo e(\Carbon\Carbon::parse($coupon->expires_at)->format('M j, Y g:i A')); ?>"><?php echo e(\Carbon\Carbon::parse($coupon->expires_at)->diffForHumans()); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php else: ?>
                                <span class="text-muted"><?php echo e(__('No expiration')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Stripe Coupon ID')); ?></span>
                        <span class="text-sm font-medium text-ink">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($coupon->stripe_coupon_id): ?>
                                <code class="text-xs bg-surface text-ink/80 px-2 py-0.5 rounded-lg border border-border"><?php echo e($coupon->stripe_coupon_id); ?></code>
                            <?php else: ?>
                                <span class="text-muted"><?php echo e(__('Not linked')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Created At')); ?></span>
                        <span class="text-sm font-medium text-ink">
                            <?php echo e(\Carbon\Carbon::parse($coupon->created_at)->format('M j, Y g:i A')); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="flex items-center justify-between">
            <a href="<?php echo e(route('admin.coupons.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <?php echo e(__('Back to Coupons')); ?>

            </a>
            <div class="flex items-center gap-2">
                <a href="<?php echo e(route('admin.coupons.edit', $coupon->id)); ?>"
                   class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-brand border border-brand/20 rounded-xl hover:bg-brand/10 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <?php echo e(__('Edit Coupon')); ?>

                </a>
                <form method="POST" action="<?php echo e(route('admin.coupons.destroy', $coupon->id)); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit"
                            onclick="if(!confirm('<?php echo e(__('Are you sure you want to delete this coupon? This will also deactivate it in Stripe.')); ?>')){event.preventDefault();return;} this.disabled=true; this.closest('form').submit();"
                            class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-danger border border-danger/20 rounded-xl hover:bg-danger/10 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        <?php echo e(__('Delete')); ?>

                    </button>
                </form>
            </div>
        </div>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/coupons/show.blade.php ENDPATH**/ ?>