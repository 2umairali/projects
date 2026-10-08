<div>
    
    <div class="flex flex-wrap items-center gap-2 mb-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['' => __('All'), 'success' => __('Success'), 'failed' => __('Failed'), 'retrying' => __('Retrying'), 'pending' => __('Pending')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button wire:click="$set('statusFilter', '<?php echo e($value); ?>')"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium rounded-lg transition-colors
                        <?php echo e($statusFilter === $value
                            ? 'bg-brand/10 text-brand dark:bg-brand/20'
                            : 'text-muted hover:text-ink hover:bg-surface-3'); ?>">
                <?php echo e($label); ?>

                <span class="text-xs text-muted">(<?php echo e($counts[$value ?: 'all']); ?>)</span>
            </button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <div class="mb-4">
        <div class="relative max-w-sm">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg>
            <input wire:model.live.debounce.300ms="search"
                   type="text"
                   placeholder="<?php echo e(__('Search by URL...')); ?>"
                   class="input pl-10 w-full">
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="mb-4 p-3 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-300 text-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
        <div class="mb-4 p-3 rounded-lg bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-300 text-sm">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="panel overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-border text-left">
                        <th class="px-4 py-3 font-medium text-muted">
                            <button wire:click="sortBy('url')" class="inline-flex items-center gap-1 hover:text-ink">
                                <?php echo e(__('URL')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'url'): ?>
                                    <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 15-6-6-6 6"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="px-4 py-3 font-medium text-muted w-20"><?php echo e(__('Method')); ?></th>
                        <th class="px-4 py-3 font-medium text-muted w-24">
                            <button wire:click="sortBy('status')" class="inline-flex items-center gap-1 hover:text-ink">
                                <?php echo e(__('Status')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'status'): ?>
                                    <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 15-6-6-6 6"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="px-4 py-3 font-medium text-muted w-20">
                            <button wire:click="sortBy('response_status')" class="inline-flex items-center gap-1 hover:text-ink">
                                <?php echo e(__('Code')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'response_status'): ?>
                                    <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 15-6-6-6 6"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="px-4 py-3 font-medium text-muted w-24">
                            <button wire:click="sortBy('duration_ms')" class="inline-flex items-center gap-1 hover:text-ink">
                                <?php echo e(__('Duration')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'duration_ms'): ?>
                                    <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 15-6-6-6 6"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="px-4 py-3 font-medium text-muted w-20">
                            <button wire:click="sortBy('attempts')" class="inline-flex items-center gap-1 hover:text-ink">
                                <?php echo e(__('Tries')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'attempts'): ?>
                                    <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 15-6-6-6 6"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="px-4 py-3 font-medium text-muted w-36">
                            <button wire:click="sortBy('created_at')" class="inline-flex items-center gap-1 hover:text-ink">
                                <?php echo e(__('Time')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'created_at'): ?>
                                    <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 15-6-6-6 6"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="px-4 py-3 font-medium text-muted w-28 text-right"><?php echo e(__('Actions')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr class="hover:bg-surface-3/50 transition-colors">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2 max-w-xs">
                                    <span class="truncate text-ink font-mono text-xs" title="<?php echo e($log->url); ?>"><?php echo e($log->url); ?></span>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold
                                    <?php echo e(match($log->method) {
                                        'GET' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
                                        'POST' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                        'PUT', 'PATCH' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                                        'DELETE' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                        default => 'bg-gray-100 text-gray-700 dark:bg-gray-900/30 dark:text-gray-400',
                                    }); ?>">
                                    <?php echo e($log->method); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium
                                    <?php echo e(match($log->status) {
                                        'success' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
                                        'failed' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                        'retrying' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                                        'pending' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                        default => 'bg-gray-100 text-gray-600',
                                    }); ?>">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->status === 'retrying'): ?>
                                        <svg class="w-3 h-3 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php echo e(ucfirst($log->status)); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3 font-mono text-xs text-muted">
                                <?php echo e($log->response_status ?? '---'); ?>

                            </td>
                            <td class="px-4 py-3 text-xs text-muted">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->duration_ms !== null): ?>
                                    <?php echo e($log->duration_ms >= 1000 ? number_format($log->duration_ms / 1000, 1) . 's' : $log->duration_ms . 'ms'); ?>

                                <?php else: ?>
                                    ---
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="px-4 py-3 text-xs text-muted">
                                <?php echo e($log->attempts); ?>/<?php echo e($log->max_attempts); ?>

                            </td>
                            <td class="px-4 py-3 text-xs text-muted" title="<?php echo e($log->created_at?->toDateTimeString()); ?>">
                                <?php echo e($log->created_at?->diffForHumans()); ?>

                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button wire:click="viewLog(<?php echo e($log->id); ?>)"
                                            class="p-1.5 rounded-md text-muted hover:text-ink hover:bg-surface-3 transition-colors"
                                            :title="__('View details')">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($log->status, ['failed', 'retrying'])): ?>
                                        <button wire:click="retryWebhook(<?php echo e($log->id); ?>)"
                                                wire:confirm="<?php echo e(__('Are you sure you want to retry this webhook?')); ?>"
                                                class="p-1.5 rounded-md text-muted hover:text-brand hover:bg-brand/10 transition-colors"
                                                :title="__('Retry')">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="23 4 23 10 17 10"></polyline>
                                                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                                            </svg>
                                        </button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr>
                            <td colspan="8" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-10 h-10 text-muted/40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                    </svg>
                                    <p class="text-sm text-muted"><?php echo e(__('No webhook logs found.')); ?></p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($logs->hasPages()): ?>
            <div class="px-4 py-3 border-t border-border">
                <?php echo e($logs->links()); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($viewingLog): ?>
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" x-data x-trap.noscroll="true">
            
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" wire:click="closeModal"></div>

            
            <div class="relative bg-surface-2 rounded-2xl border border-border shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto">
                
                <div class="sticky top-0 bg-surface-2 border-b border-border px-6 py-4 flex items-center justify-between z-10">
                    <h3 class="text-lg font-semibold text-ink"><?php echo e(__('Webhook Details')); ?></h3>
                    <button wire:click="closeModal" class="p-1.5 rounded-lg text-muted hover:text-ink hover:bg-surface-3 transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="px-6 py-4 space-y-5">
                    
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('URL')); ?></span>
                            <span class="text-ink font-mono text-xs break-all"><?php echo e($viewingLog->url); ?></span>
                        </div>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Method')); ?></span>
                            <span class="text-ink font-semibold"><?php echo e($viewingLog->method); ?></span>
                        </div>
                        <div>
                            <span class="text-muted block text-xs mb-1">Status</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                <?php echo e(match($viewingLog->status) {
                                    'success' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
                                    'failed' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                    'retrying' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                                    'pending' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                    default => 'bg-gray-100 text-gray-600',
                                }); ?>"><?php echo e(ucfirst($viewingLog->status)); ?></span>
                        </div>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Response Code')); ?></span>
                            <span class="text-ink font-mono"><?php echo e($viewingLog->response_status ?? 'N/A'); ?></span>
                        </div>
                        <div>
                            <span class="text-muted block text-xs mb-1">Duration</span>
                            <span class="text-ink"><?php echo e($viewingLog->duration_ms ? $viewingLog->duration_ms . 'ms' : 'N/A'); ?></span>
                        </div>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Attempts')); ?></span>
                            <span class="text-ink"><?php echo e($viewingLog->attempts); ?>/<?php echo e($viewingLog->max_attempts); ?></span>
                        </div>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Direction')); ?></span>
                            <span class="text-ink"><?php echo e(ucfirst($viewingLog->direction)); ?></span>
                        </div>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Timestamp')); ?></span>
                            <span class="text-ink"><?php echo e($viewingLog->created_at?->format('M j, Y H:i:s')); ?></span>
                        </div>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($viewingLog->error_message): ?>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Error')); ?></span>
                            <div class="p-3 rounded-lg bg-red-50 dark:bg-red-900/10 text-red-700 dark:text-red-400 text-xs font-mono break-all">
                                <?php echo e($viewingLog->error_message); ?>

                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($viewingLog->headers): ?>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Request Headers')); ?></span>
                            <pre class="p-3 rounded-lg bg-surface-3 text-xs font-mono text-ink overflow-x-auto max-h-40"><?php echo e(json_encode($viewingLog->headers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)); ?></pre>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($viewingLog->payload): ?>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Request Payload')); ?></span>
                            <pre class="p-3 rounded-lg bg-surface-3 text-xs font-mono text-ink overflow-x-auto max-h-60"><?php echo e(json_encode($viewingLog->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)); ?></pre>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($viewingLog->response_body): ?>
                        <div>
                            <span class="text-muted block text-xs mb-1"><?php echo e(__('Response Body')); ?></span>
                            <pre class="p-3 rounded-lg bg-surface-3 text-xs font-mono text-ink overflow-x-auto max-h-60"><?php echo e($viewingLog->response_body); ?></pre>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="sticky bottom-0 bg-surface-2 border-t border-border px-6 py-3 flex justify-end gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($viewingLog->status, ['failed', 'retrying'])): ?>
                        <button wire:click="retryWebhook(<?php echo e($viewingLog->id); ?>)"
                                wire:confirm="<?php echo e(__('Retry this webhook delivery?')); ?>"
                                class="btn btn-primary text-sm">
                            <svg class="w-4 h-4 mr-1.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                            </svg>
                            Retry
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <button wire:click="closeModal" class="btn btn-secondary text-sm"><?php echo e(__('Close')); ?></button>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/webhook-logs.blade.php ENDPATH**/ ?>