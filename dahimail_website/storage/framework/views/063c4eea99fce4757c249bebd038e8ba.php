<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $user->name,'subtitle' => __('User account details and activity.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->name),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('User account details and activity.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-brand/10 text-brand text-lg font-bold">
                        <?php echo e($user->initials); ?>

                    </span>
                    <div>
                        <div class="flex items-center gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->suspended_at): ?>
                                <span class="badge badge-error"><?php echo e(__('Suspended')); ?></span>
                            <?php elseif($user->status === 'active'): ?>
                                <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                            <?php elseif($user->status === 'pending_deletion'): ?>
                                <span class="badge badge-warning"><?php echo e(__('Pending Deletion')); ?></span>
                            <?php elseif($user->status === 'banned'): ?>
                                <span class="badge badge-error"><?php echo e(__('Banned')); ?></span>
                            <?php else: ?>
                                <span class="badge badge-ghost"><?php echo e(ucfirst($user->status)); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->is_admin): ?>
                                <span class="badge"><?php echo e(__('Admin')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <p class="text-sm text-muted mt-1"><?php echo e($user->email); ?></p>
                        <p class="text-xs text-muted mt-0.5">
                            <?php echo e(__('Joined')); ?> <?php echo e($user->created_at->format('M j, Y')); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->email_verified_at): ?>
                                &middot; <?php echo e(__('Email verified')); ?> <?php echo e($user->email_verified_at->format('M j, Y')); ?>

                            <?php else: ?>
                                &middot; <span class="text-warning"><?php echo e(__('Email not verified')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <form method="POST" action="<?php echo e(route('admin.users.impersonate', $user->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn-secondary"><?php echo e(__('Impersonate')); ?></button>
                    </form>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->suspended_at): ?>
                        <form method="POST" action="<?php echo e(route('admin.users.unsuspend', $user->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn-secondary"><?php echo e(__('Unsuspend')); ?></button>
                        </form>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('admin.users.suspend', $user->id)); ?>" x-data @submit.prevent="if(confirm('<?php echo e(__('Are you sure you want to suspend this user? They will lose access until unsuspended.')); ?>')) $el.submit()">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn-secondary"><?php echo e(__('Suspend')); ?></button>
                        </form>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Subscription')); ?></h2>
                </div>
                <div class="p-6 space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->activeWorkspace?->subscription?->plan): ?>
                        <?php $subscription = $user->activeWorkspace->subscription; $plan = $subscription->plan; ?>
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-indigo-50 to-purple-50 border border-brand/20 rounded-xl">
                            <div>
                                <p class="text-sm font-bold text-ink"><?php echo e($plan->name); ?> <?php echo e(__('Plan')); ?></p>
                                <p class="text-xs text-muted"><?php echo \App\Helpers\CurrencyHelper::display($plan->monthly_price); ?><?php echo e(__('/month')); ?></p>
                            </div>
                            <span class="px-2.5 py-1 text-xs font-bold <?php echo e($subscription->status === 'active' ? 'bg-success/15 text-success' : 'bg-warning/15 text-warning'); ?> rounded-full"><?php echo e(ucfirst($subscription->status)); ?></span>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center justify-between p-4 bg-surface border border-border rounded-xl">
                            <div>
                                <p class="text-sm font-bold text-ink"><?php echo e(__('No Active Subscription')); ?></p>
                                <p class="text-xs text-muted"><?php echo e(__('This user does not have an active plan.')); ?></p>
                            </div>
                            <span class="px-2.5 py-1 text-xs font-bold bg-surface text-ink/80 rounded-full"><?php echo e(__('None')); ?></span>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Workspaces')); ?></h2>
                </div>
                <div class="p-6 space-y-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $workspaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ws): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="flex items-center justify-between p-4 bg-surface rounded-xl hover:bg-surface transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-brand/15 rounded-xl flex items-center justify-center text-xs font-bold text-brand">
                                <?php echo e(strtoupper(substr($ws->name, 0, 2))); ?>

                            </div>
                            <div>
                                <p class="text-sm font-semibold text-ink"><?php echo e($ws->name); ?></p>
                                <p class="text-[10px] text-muted">
                                    <?php echo e($ws->contacts_count ?? 0); ?> <?php echo e(__('contacts')); ?> &middot;
                                    <?php echo e($ws->conversations_count ?? 0); ?> <?php echo e(__('conversations')); ?>

                                </p>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full
                            <?php echo e($ws->pivot->role === 'owner' ? 'bg-brand/15 text-brand' : ($ws->pivot->role === 'admin' ? 'bg-info/15 text-info' : 'bg-surface text-ink/80')); ?>">
                            <?php echo e(ucfirst($ws->pivot->role)); ?>

                        </span>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <div class="text-center py-6">
                        <p class="text-sm text-muted"><?php echo e(__('No workspaces found.')); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Recent Login Activity')); ?></h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-surface border-b border-border/50">
                            <tr>
                                <th class="px-4 py-2.5 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('IP Address')); ?></th>
                                <th class="px-4 py-2.5 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('User Agent')); ?></th>
                                <th class="px-4 py-2.5 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Date')); ?></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border/60">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $loginHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <tr class="hover:bg-surface transition-colors">
                                <td class="px-4 py-2.5 text-xs font-mono text-ink/80">
                                    <?php echo e($log->ip_address ?? __('N/A')); ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index === 0): ?>
                                    <span class="ml-1 px-1.5 py-0.5 text-[9px] font-bold bg-success/15 text-success rounded"><?php echo e(__('Latest')); ?></span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </td>
                                <td class="px-4 py-2.5 text-xs text-muted max-w-[200px] truncate"><?php echo e(Str::limit($log->user_agent ?? __('N/A'), 40)); ?></td>
                                <td class="px-4 py-2.5 text-xs text-muted"><?php echo e(\Carbon\Carbon::parse($log->created_at)->format('M j, Y g:i A')); ?></td>
                            </tr>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-xs text-muted"><?php echo e(__('No login activity recorded.')); ?></td>
                            </tr>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Recent Payments')); ?></h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-surface border-b border-border/50">
                            <tr>
                                <th class="px-4 py-2.5 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Amount')); ?></th>
                                <th class="px-4 py-2.5 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Status')); ?></th>
                                <th class="px-4 py-2.5 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Date')); ?></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border/60">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <tr class="hover:bg-surface transition-colors">
                                <td class="px-4 py-2.5 text-sm font-bold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($payment->amount); ?></td>
                                <td class="px-4 py-2.5">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'succeeded'): ?>
                                        <span class="px-2 py-0.5 text-[10px] font-bold bg-success/15 text-success rounded-full"><?php echo e(__('Succeeded')); ?></span>
                                    <?php elseif($payment->status === 'failed'): ?>
                                        <span class="px-2 py-0.5 text-[10px] font-bold bg-danger/15 text-danger rounded-full"><?php echo e(__('Failed')); ?></span>
                                    <?php elseif($payment->status === 'refunded'): ?>
                                        <span class="px-2 py-0.5 text-[10px] font-bold bg-surface text-ink/80 rounded-full"><?php echo e(__('Refunded')); ?></span>
                                    <?php elseif($payment->status === 'pending'): ?>
                                        <span class="px-2 py-0.5 text-[10px] font-bold bg-warning/15 text-warning rounded-full"><?php echo e(__('Pending')); ?></span>
                                    <?php else: ?>
                                        <span class="px-2 py-0.5 text-[10px] font-bold bg-surface text-ink/80 rounded-full"><?php echo e(ucfirst($payment->status)); ?></span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </td>
                                <td class="px-4 py-2.5 text-xs text-muted"><?php echo e(\Carbon\Carbon::parse($payment->created_at)->format('M j, Y')); ?></td>
                            </tr>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-xs text-muted"><?php echo e(__('No payments recorded.')); ?></td>
                            </tr>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>
                </div>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/users/show.blade.php ENDPATH**/ ?>