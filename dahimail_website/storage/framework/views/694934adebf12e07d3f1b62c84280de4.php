<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Security Log Details'),'subtitle' => __('Full details for security event') . ' #' . $log->id . '.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Security Log Details')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Full details for security event') . ' #' . $log->id . '.')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl <?php echo e($log->status === 'success' ? 'bg-success/10 text-success' : ($log->status === 'blocked' ? 'bg-warning/10 text-warning' : 'bg-danger/10 text-danger')); ?> text-lg font-bold">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->status === 'success'): ?>
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <?php elseif($log->status === 'blocked'): ?>
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                        <?php else: ?>
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-lg font-bold text-ink"><?php echo e(str_replace('_', ' ', ucfirst($log->event_type))); ?></span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->status === 'success'): ?>
                                <span class="px-2 py-0.5 text-[10px] font-bold bg-success/15 text-success rounded-full"><?php echo e(__('Success')); ?></span>
                            <?php elseif($log->status === 'failed'): ?>
                                <span class="px-2 py-0.5 text-[10px] font-bold bg-danger/15 text-danger rounded-full"><?php echo e(__('Failed')); ?></span>
                            <?php elseif($log->status === 'blocked'): ?>
                                <span class="px-2 py-0.5 text-[10px] font-bold bg-warning/15 text-warning rounded-full"><?php echo e(__('Blocked')); ?></span>
                            <?php else: ?>
                                <span class="px-2 py-0.5 text-[10px] font-bold bg-surface text-ink/80 rounded-full"><?php echo e(ucfirst($log->status)); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <p class="text-sm text-muted mt-1">
                            <?php echo e(\Carbon\Carbon::parse($log->created_at)->format('M j, Y g:i:s A')); ?>

                            &middot; Log #<?php echo e($log->id); ?>

                        </p>
                    </div>
                </div>
                <a href="<?php echo e(route('admin.security-audit-logs.index')); ?>" class="btn-secondary"><?php echo e(__('Back to Logs')); ?></a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('User Information')); ?></h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-muted"><?php echo e(__('User')); ?></p>
                            <p class="mt-0.5 font-semibold text-ink"><?php echo e($log->user->name ?? __('Unknown')); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-muted"><?php echo e(__('Email')); ?></p>
                            <p class="mt-0.5 text-ink"><?php echo e($log->user->email ?? $log->email ?? '--'); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-muted"><?php echo e(__('User ID')); ?></p>
                            <p class="mt-0.5 text-ink font-mono text-sm"><?php echo e($log->user_id ?? '--'); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-muted"><?php echo e(__('User Type')); ?></p>
                            <p class="mt-0.5 text-ink"><?php echo e($log->user_type ?? '--'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Network Information')); ?></h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-muted"><?php echo e(__('IP Address')); ?></p>
                            <p class="mt-0.5 font-mono text-sm font-semibold text-ink"><?php echo e($log->ip_address ?? '--'); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-muted"><?php echo e(__('Country')); ?></p>
                            <p class="mt-0.5 text-ink"><?php echo e($log->country ?? '--'); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-muted"><?php echo e(__('City')); ?></p>
                            <p class="mt-0.5 text-ink"><?php echo e($log->city ?? '--'); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-muted"><?php echo e(__('Timestamp')); ?></p>
                            <p class="mt-0.5 text-ink"><?php echo e(\Carbon\Carbon::parse($log->created_at)->format('M j, Y g:i:s A')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="panel overflow-hidden">
            <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                <h2 class="text-lg font-bold text-ink"><?php echo e(__('User Agent')); ?></h2>
            </div>
            <div class="p-6">
                <code class="block text-xs font-mono text-muted bg-surface p-4 rounded-xl break-all"><?php echo e($log->user_agent ?? __('No user agent recorded')); ?></code>
            </div>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->metadata): ?>
        <div class="panel overflow-hidden">
            <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                <h2 class="text-lg font-bold text-ink"><?php echo e(__('Metadata')); ?></h2>
                <p class="text-sm text-muted mt-0.5"><?php echo e(__('Additional event details stored as JSON.')); ?></p>
            </div>
            <div class="p-6">
                <pre class="text-xs font-mono text-muted bg-surface p-4 rounded-xl overflow-x-auto"><?php echo e(json_encode(is_string($log->metadata) ? json_decode($log->metadata, true) : $log->metadata, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)); ?></pre>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="flex items-center">
            <a href="<?php echo e(route('admin.security-audit-logs.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <?php echo e(__('Back to Security Logs')); ?>

            </a>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/security-audit-logs/show.blade.php ENDPATH**/ ?>