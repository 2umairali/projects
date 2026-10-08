<div class="space-y-6">
    
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('workflows')); ?>" class="p-1.5 text-muted/60 hover:text-ink rounded-lg hover:bg-surface">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Execution Log')); ?></h1>
                <p class="text-sm text-muted mt-0.5"><?php echo e($workflowName); ?></p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Total')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e(number_format($totalExecutions)); ?></p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Completed')); ?></p>
            <p class="text-2xl font-bold text-success mt-1"><?php echo e(number_format($completedCount)); ?></p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Failed')); ?></p>
            <p class="text-2xl font-bold text-danger mt-1"><?php echo e(number_format($failedCount)); ?></p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Running')); ?></p>
            <p class="text-2xl font-bold text-blue-600 mt-1"><?php echo e(number_format($runningCount)); ?></p>
        </div>
    </div>

    
    <div class="flex items-center gap-2">
        <span class="text-sm text-muted"><?php echo e(__('Filter:')); ?></span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['all' => __('All'), 'completed' => __('Completed'), 'failed' => __('Failed'), 'running' => __('Running'), 'waiting' => __('Waiting')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <button wire:click="$set('statusFilter', '<?php echo e($key); ?>')"
                class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors <?php echo e($statusFilter === $key ? 'bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300' : 'bg-surface-2 text-muted  border border-border hover:bg-surface'); ?>">
            <?php echo e($label); ?>

        </button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-surface border-b border-border">
                    <th class="w-8 px-4 py-3"></th>
                    <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Contact')); ?></th>
                    <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Status')); ?></th>
                    <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden md:table-cell"><?php echo e(__('Started')); ?></th>
                    <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden md:table-cell"><?php echo e(__('Completed')); ?></th>
                    <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden lg:table-cell"><?php echo e(__('Duration')); ?></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border/60">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $executions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $execution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr class="hover:bg-surface transition-colors cursor-pointer" wire:click="toggleExpand(<?php echo e($execution->id); ?>)" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'exec-'.e($execution->id).''; ?>wire:key="exec-<?php echo e($execution->id); ?>">
                    <td class="px-4 py-3">
                        <svg class="w-4 h-4 text-muted transition-transform <?php echo e($expandedExecutionId === $execution->id ? 'rotate-90' : ''); ?>"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </td>
                    <td class="px-4 py-3">
                        <div>
                            <p class="text-sm font-medium text-ink"><?php echo e($execution->contact?->full_name ?? __('System')); ?></p>
                            <p class="text-xs text-muted"><?php echo e($execution->contact?->email ?? '--'); ?></p>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <?php
                            $statusColors = [
                                'running' => 'bg-info/15 text-info',
                                'completed' => 'bg-success/15 text-success',
                                'failed' => 'bg-danger/15 text-danger',
                                'waiting' => 'bg-warning/15 text-warning',
                                'canceled' => 'bg-surface  text-muted ',
                            ];
                        ?>
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium <?php echo e($statusColors[$execution->status] ?? 'bg-surface  text-muted '); ?>">
                            <?php echo e(ucfirst($execution->status)); ?>

                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm text-muted  hidden md:table-cell">
                        <?php echo e($execution->started_at?->format('M j, g:i A') ?? '--'); ?>

                    </td>
                    <td class="px-4 py-3 text-sm text-muted  hidden md:table-cell">
                        <?php echo e($execution->completed_at?->format('M j, g:i A') ?? '--'); ?>

                    </td>
                    <td class="px-4 py-3 text-sm text-muted  hidden lg:table-cell">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($execution->started_at && $execution->completed_at): ?>
                            <?php echo e($execution->started_at->diffForHumans($execution->completed_at, true)); ?>

                        <?php elseif($execution->started_at): ?>
                            <?php echo e($execution->started_at->diffForHumans(now(), true)); ?> (<?php echo e(__('ongoing')); ?>)
                        <?php else: ?>
                            --
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                </tr>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($expandedExecutionId === $execution->id): ?>
                <tr <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'exec-detail-'.e($execution->id).''; ?>wire:key="exec-detail-<?php echo e($execution->id); ?>">
                    <td colspan="6" class="px-4 py-4 bg-surface">
                        <div class="ml-8 space-y-2">
                            <p class="text-xs font-semibold text-muted uppercase tracking-wider mb-3"><?php echo e(__('Step-by-Step Log')); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_2 = true; $__currentLoopData = $stepLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <div class="flex items-start gap-3 bg-surface-2 rounded-lg p-3 border border-border">
                                
                                <div class="mt-0.5 flex-shrink-0">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->status === 'success'): ?>
                                    <span class="w-6 h-6 bg-success/15 rounded-full flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <?php elseif($log->status === 'failed'): ?>
                                    <span class="w-6 h-6 bg-danger/15 rounded-full flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </span>
                                    <?php elseif($log->status === 'waiting'): ?>
                                    <span class="w-6 h-6 bg-warning/15 rounded-full flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </span>
                                    <?php else: ?>
                                    <span class="w-6 h-6 bg-surface  rounded-full flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-ink">
                                            <?php echo e(ucfirst($log->node?->type ?? 'unknown')); ?>: <?php echo e(str_replace('_', ' ', ucfirst($log->node?->subtype ?? 'unknown'))); ?>

                                        </p>
                                        <span class="text-xs text-muted">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->duration_ms): ?><?php echo e($log->duration_ms); ?>ms <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </span>
                                    </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->error_message): ?>
                                    <p class="text-xs text-danger mt-0.5"><?php echo e($log->error_message); ?></p>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <p class="text-xs text-muted mt-0.5">
                                        <?php echo e($log->executed_at?->format('M j, g:i:s A') ?? __('Pending')); ?>

                                    </p>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <p class="text-sm text-muted"><?php echo e(__('No step logs recorded yet.')); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <tr>
                    <td colspan="6" class="px-4 py-12 text-center text-sm text-muted"><?php echo e(__('No executions found.')); ?></td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($executions->hasPages()): ?>
        <div class="px-4 py-3 border-t border-border">
            <?php echo e($executions->links()); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/workflows/workflow-execution-log.blade.php ENDPATH**/ ?>