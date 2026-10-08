<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $plan->name,'subtitle' => __('Plan details, features, and subscribers.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($plan->name),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Plan details, features, and subscribers.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->is_active): ?>
                        <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                    <?php else: ?>
                        <span class="badge badge-ghost"><?php echo e(__('Inactive')); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->is_popular): ?>
                        <span class="badge badge-warning"><?php echo e(__('Popular')); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <code class="text-xs bg-surface text-muted px-2 py-1 rounded-lg font-mono border border-border"><?php echo e($plan->slug); ?></code>
                </div>
                <div class="flex gap-2">
                    <a href="<?php echo e(route('admin.plans.edit', $plan->id)); ?>" class="btn-secondary"><?php echo e(__('Edit Plan')); ?></a>
                </div>
            </div>
            <p class="text-xs text-muted mt-3">
                <?php echo e(__('Created')); ?> <?php echo e($plan->created_at->format('M j, Y')); ?>

                &middot; <?php echo e(__('Sort order:')); ?> <?php echo e($plan->sort_order); ?>

                &middot; <?php echo e(number_format($plan->active_subscriptions_count)); ?> <?php echo e(__('active subscriber(s)')); ?>

            </p>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
            <div class="p-4 bg-danger/10 border border-danger/20 rounded-xl text-sm text-danger font-medium">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="p-4 bg-success/10 border border-success/20 rounded-xl text-sm text-success font-medium">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Pricing & Info')); ?></h2>
                </div>
                <div class="divide-y divide-border">
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Monthly Price')); ?></span>
                        <span class="text-lg font-extrabold text-ink">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->isFree()): ?>
                                <?php echo e(__('Free')); ?>

                            <?php else: ?>
                                <?php echo \App\Helpers\CurrencyHelper::display($plan->monthly_price); ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Yearly Price')); ?></span>
                        <span class="text-lg font-extrabold text-ink">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->isFree()): ?>
                                <?php echo e(__('Free')); ?>

                            <?php else: ?>
                                <?php echo \App\Helpers\CurrencyHelper::display($plan->yearly_price); ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$plan->isFree()): ?>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Yearly Savings')); ?></span>
                        <span class="text-sm font-medium text-success">
                            <?php $savings = ($plan->monthly_price * 12) - $plan->yearly_price; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($savings > 0): ?>
                                <?php echo \App\Helpers\CurrencyHelper::display($savings); ?> <?php echo e(__('saved/yr')); ?> (<?php echo e(round(($savings / ($plan->monthly_price * 12)) * 100)); ?>% <?php echo e(__('off')); ?>)
                            <?php else: ?>
                                <?php echo e(__('No savings')); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Status')); ?></span>
                        <span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->is_active): ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-success/15 text-success"><?php echo e(__('Active')); ?></span>
                            <?php else: ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-surface text-ink/80"><?php echo e(__('Inactive')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Popular Badge')); ?></span>
                        <span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->is_popular): ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-warning/15 text-warning"><?php echo e(__('Yes')); ?></span>
                            <?php else: ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-surface text-ink/80"><?php echo e(__('No')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-muted"><?php echo e(__('Sort Order')); ?></span>
                        <span class="text-sm font-medium text-ink"><?php echo e($plan->sort_order); ?></span>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->stripe_monthly_price_id || $plan->stripe_yearly_price_id): ?>
                    <div class="px-6 py-4 space-y-2">
                        <span class="text-sm text-muted"><?php echo e(__('Stripe Price IDs')); ?></span>
                        <div class="space-y-1 mt-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->stripe_monthly_price_id): ?>
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] text-muted uppercase"><?php echo e(__('Monthly:')); ?></span>
                                    <code class="text-xs bg-surface text-ink/80 px-2 py-0.5 rounded-lg border border-border"><?php echo e($plan->stripe_monthly_price_id); ?></code>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->stripe_yearly_price_id): ?>
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] text-muted uppercase"><?php echo e(__('Yearly:')); ?></span>
                                    <code class="text-xs bg-surface text-ink/80 px-2 py-0.5 rounded-lg border border-border"><?php echo e($plan->stripe_yearly_price_id); ?></code>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="space-y-6">
                
                <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                    <div class="px-6 py-4 border-b border-border">
                        <h2 class="text-lg font-bold text-ink"><?php echo e(__('Description')); ?></h2>
                    </div>
                    <div class="px-6 py-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->description): ?>
                            <p class="text-sm text-ink leading-relaxed"><?php echo e($plan->description); ?></p>
                        <?php else: ?>
                            <p class="text-sm text-muted italic"><?php echo e(__('No description provided.')); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                    <div class="px-6 py-4 border-b border-border">
                        <h2 class="text-lg font-bold text-ink"><?php echo e(__('Subscribers')); ?></h2>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-indigo-50 to-purple-50 border border-brand/20 rounded-xl">
                            <div>
                                <p class="text-2xl font-extrabold text-ink"><?php echo e(number_format($plan->active_subscriptions_count)); ?></p>
                                <p class="text-xs text-muted mt-0.5"><?php echo e(__('Active subscriptions')); ?></p>
                            </div>
                            <div class="w-12 h-12 bg-brand/15 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
            <div class="px-6 py-4 border-b border-border">
                <h2 class="text-lg font-bold text-ink"><?php echo e(__('Feature Limits')); ?></h2>
                <p class="text-sm text-muted mt-1"><?php echo e(__('Configured feature keys and their limits for this plan.')); ?></p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-surface border-b border-border">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Feature Key')); ?></th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Status')); ?></th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Limit')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $plan->planFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr class="hover:bg-surface transition-colors">
                            <td class="px-6 py-3 font-medium text-ink">
                                <code class="text-xs bg-surface text-ink/80 px-2 py-0.5 rounded-lg border border-border"><?php echo e($feature->feature_key); ?></code>
                            </td>
                            <td class="px-6 py-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($feature->enabled): ?>
                                    <span class="px-2.5 py-1 text-xs font-medium bg-success/15 text-success rounded-full"><?php echo e(__('Enabled')); ?></span>
                                <?php else: ?>
                                    <span class="px-2.5 py-1 text-xs font-medium bg-surface text-ink/80 rounded-full"><?php echo e(__('Disabled')); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="px-6 py-3 text-ink">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($feature->enabled && $feature->limit !== null): ?>
                                    <span class="font-semibold"><?php echo e(number_format($feature->limit)); ?></span>
                                <?php elseif($feature->enabled): ?>
                                    <span class="text-success font-medium"><?php echo e(__('Unlimited')); ?></span>
                                <?php else: ?>
                                    <span class="text-muted">--</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center">
                                <p class="text-sm text-muted"><?php echo e(__('No feature limits configured for this plan.')); ?></p>
                            </td>
                        </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
            <div class="px-6 py-4 border-b border-border">
                <h2 class="text-lg font-bold text-ink"><?php echo e(__('Recent Subscribers')); ?></h2>
                <p class="text-sm text-muted mt-1"><?php echo e(__('Latest active subscriptions on this plan (up to 10).')); ?></p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-surface border-b border-border">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Workspace')); ?></th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Owner')); ?></th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Billing Cycle')); ?></th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Status')); ?></th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Subscribed')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $plan->subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <?php $owner = $sub->workspace?->members?->firstWhere('pivot.role', 'owner'); ?>
                        <tr class="hover:bg-surface transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-brand/15 rounded-lg flex items-center justify-center text-xs font-bold text-brand">
                                        <?php echo e(strtoupper(substr($sub->workspace->name ?? '??', 0, 2))); ?>

                                    </div>
                                    <span class="font-medium text-ink"><?php echo e($sub->workspace->name ?? __('Deleted workspace')); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($owner): ?>
                                    <div>
                                        <p class="font-medium text-ink text-xs"><?php echo e($owner->name); ?></p>
                                        <p class="text-[10px] text-muted"><?php echo e($owner->email); ?></p>
                                    </div>
                                <?php else: ?>
                                    <span class="text-muted text-xs">--</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="px-6 py-3">
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full <?php echo e($sub->billing_cycle === 'yearly' ? 'bg-brand/15 text-brand' : 'bg-info/15 text-info'); ?>">
                                    <?php echo e(ucfirst($sub->billing_cycle ?? 'monthly')); ?>

                                </span>
                            </td>
                            <td class="px-6 py-3">
                                <span class="px-2.5 py-1 text-xs font-medium bg-success/15 text-success rounded-full"><?php echo e(__('Active')); ?></span>
                            </td>
                            <td class="px-6 py-3 text-xs text-muted">
                                <?php echo e($sub->created_at->format('M j, Y')); ?>

                            </td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center">
                                <p class="text-sm text-muted"><?php echo e(__('No active subscribers on this plan.')); ?></p>
                            </td>
                        </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="flex items-center justify-between">
            <a href="<?php echo e(route('admin.plans.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <?php echo e(__('Back to Plans')); ?>

            </a>
            <div class="flex items-center gap-2">
                <a href="<?php echo e(route('admin.plans.edit', $plan->id)); ?>"
                   class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-brand border border-brand/20 rounded-xl hover:bg-brand/10 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <?php echo e(__('Edit Plan')); ?>

                </a>
                <form method="POST" action="<?php echo e(route('admin.plans.destroy', $plan->id)); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit"
                            onclick="if(!confirm('<?php echo e(__('Are you sure you want to delete this plan? This action cannot be undone.')); ?>')){event.preventDefault();return;} this.disabled=true; this.closest('form').submit();"
                            class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-danger border border-danger/20 rounded-xl hover:bg-danger/10 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        <?php echo e(__('Delete Plan')); ?>

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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/plans/show.blade.php ENDPATH**/ ?>