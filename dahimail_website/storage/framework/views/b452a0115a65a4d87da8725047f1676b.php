<div class="space-y-6">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('success')); ?></span>
        <button @click="show = false" class="text-green-500 hover:text-success" aria-label="Dismiss">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm"><?php echo e(session('error')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="flex flex-col gap-4">
        
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3 flex-wrap">
                <div>
                    <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Deals')); ?></h1>
                    <p class="text-sm text-muted mt-0.5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($totalValue > 0): ?>
                            <?php echo \App\Helpers\CurrencyHelper::display($totalValue); ?> <?php echo e(__('total pipeline value')); ?>

                        <?php else: ?>
                            <?php echo e(__('Manage your sales pipeline')); ?>

                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </p>
                </div>

                
                <div x-data="{ open: false }" class="relative ml-2">
                    <button @click="open = !open"
                            class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-ink bg-surface-2 border border-border rounded-xl hover:bg-surface transition-colors">
                        <span class="w-2 h-2 rounded-full bg-brand"></span>
                        <?php echo e($pipeline?->name ?? __('Select Pipeline')); ?>

                        <svg class="w-4 h-4 text-muted transition-transform" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition
                         class="absolute right-0 mt-1 w-64 bg-surface-2 rounded-xl shadow-lg border border-border py-1 z-30 max-h-80 overflow-y-auto"
                         style="display: none;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $pipelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <button wire:click="switchPipeline(<?php echo e($p->id); ?>)" @click="open = false"
                                class="w-full text-left px-4 py-2.5 text-sm flex items-center justify-between gap-2 hover:bg-surface transition-colors <?php echo e($p->id === $pipelineId ? 'text-brand font-semibold bg-brand/5' : 'text-ink/80'); ?>">
                            <div class="flex items-center gap-2 min-w-0">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->id === $pipelineId): ?>
                                <svg class="w-4 h-4 shrink-0 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <?php else: ?>
                                <span class="w-4"></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <span class="truncate"><?php echo e($p->name); ?></span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->is_default): ?>
                                <span class="text-[10px] font-medium text-muted bg-surface px-1.5 py-0.5 rounded-full shrink-0"><?php echo e(__('Default')); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <span class="text-xs text-muted shrink-0"><?php echo e($p->deals_count); ?> <?php echo e(__('deals')); ?></span>
                        </button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                        <div class="border-t border-border my-1"></div>

                        
                        <button @click="open = false; $wire.set('showPipelineForm', true)"
                                class="w-full text-left px-4 py-2.5 text-sm text-brand hover:bg-brand/5 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            <?php echo e(__('New Pipeline')); ?>

                        </button>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pipelines->count() > 1 && $pipeline): ?>
                        <button wire:click="deletePipeline(<?php echo e($pipelineId); ?>)"
                                wire:confirm="Delete pipeline '<?php echo e($pipeline->name); ?>' and all its deals? This cannot be undone."
                                @click="open = false"
                                class="w-full text-left px-4 py-2.5 text-sm text-danger hover:bg-danger/10 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <?php echo e(__('Delete This Pipeline')); ?>

                        </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>

            <button wire:click="openDealForm" wire:loading.attr="disabled" class="btn-primary flex items-center gap-2 text-sm disabled:opacity-50 disabled:cursor-not-allowed self-start">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <?php echo e(__('Add Deal')); ?>

            </button>
        </div>

        
        <div class="flex items-center gap-1 bg-surface-2 border border-border rounded-xl p-1 self-start">
            <?php
                $filters = [
                    'open' => ['label' => __('Open'), 'count' => $statusCounts->open_count ?? 0],
                    'won' => ['label' => __('Won'), 'count' => $statusCounts->won_count ?? 0],
                    'lost' => ['label' => __('Lost'), 'count' => $statusCounts->lost_count ?? 0],
                    'all' => ['label' => __('All'), 'count' => $statusCounts->total ?? 0],
                ];
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filterKey => $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button wire:click="$set('statusFilter', '<?php echo e($filterKey); ?>')"
                    class="px-3 py-1.5 text-sm font-medium rounded-lg transition-colors flex items-center gap-1.5
                    <?php echo e($statusFilter === $filterKey
                        ? 'bg-surface text-ink shadow-sm'
                        : 'text-muted hover:text-ink'); ?>">
                <?php echo e($filter['label']); ?>

                <span class="text-xs font-semibold px-1.5 py-0.5 rounded-full
                    <?php echo e($statusFilter === $filterKey ? 'bg-brand/10 text-brand' : 'bg-surface text-muted'); ?>"><?php echo e($filter['count']); ?></span>
            </button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stages->isNotEmpty()): ?>
    <div class="flex items-center gap-6 px-4 py-2 border-b border-border bg-surface-2/50 rounded-xl">
        <div>
            <span class="text-xs text-muted"><?php echo e(__('Pipeline Value')); ?></span>
            <p class="text-sm font-semibold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($pipelineForecast['total']); ?></p>
        </div>
        <div>
            <span class="text-xs text-muted"><?php echo e(__('Weighted Forecast')); ?></span>
            <p class="text-sm font-semibold text-success"><?php echo \App\Helpers\CurrencyHelper::display($pipelineForecast['weighted']); ?></p>
        </div>
        <div>
            <span class="text-xs text-muted"><?php echo e(__('Open Deals')); ?></span>
            <p class="text-sm font-semibold text-ink"><?php echo e($pipelineForecast['open_deals']); ?></p>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <?php
            $stageDeals = $deals->get($stage->id, collect());
            $stageTotal = $stageDeals->sum('value');
            $stageCount = $stageDeals->count();
        ?>
        <div class="bg-surface-2 rounded-xl border border-border p-3 text-center">
            <div class="flex items-center justify-center gap-1.5 mb-1">
                <span class="w-2 h-2 rounded-full" style="background-color: <?php echo e($stage->color); ?>"></span>
                <span class="text-xs font-semibold text-muted uppercase"><?php echo e($stage->name); ?></span>
            </div>
            <p class="text-lg font-bold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($stageTotal); ?></p>
            <p class="text-xs text-muted"><?php echo e($stageCount); ?> <?php echo e($stageCount === 1 ? __('deal') : __('deals')); ?></p>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <div class="lg:hidden space-y-4">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <?php $stageDeals = $deals->get($stage->id, collect()); ?>
        <div class="bg-surface-2 rounded-xl border border-border overflow-hidden">
            <div class="px-4 py-3 border-b border-border/50 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full" style="background-color: <?php echo e($stage->color); ?>"></span>
                    <h3 class="text-sm font-semibold text-ink"><?php echo e($stage->name); ?></h3>
                    <span class="text-xs font-medium text-muted bg-surface px-1.5 py-0.5 rounded-full"><?php echo e($stageDeals->count()); ?></span>
                </div>
                <span class="text-xs font-medium text-muted"><?php echo \App\Helpers\CurrencyHelper::display($stageDeals->sum('value')); ?></span>
            </div>
            <div class="divide-y divide-border/50">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $stageDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="px-4 py-3 flex items-center justify-between gap-3 cursor-pointer hover:bg-surface transition-colors
                    <?php echo e($deal->status === 'won' ? 'border-l-3 border-l-green-500' : ''); ?>

                    <?php echo e($deal->status === 'lost' ? 'border-l-3 border-l-red-500 opacity-70' : ''); ?>"
                     wire:click="openDealForm(<?php echo e($deal->id); ?>)">
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-1.5">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deal->status === 'won'): ?>
                            <svg class="w-3.5 h-3.5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <?php elseif($deal->status === 'lost'): ?>
                            <svg class="w-3.5 h-3.5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <p class="text-sm font-semibold text-ink truncate"><?php echo e($deal->title); ?></p>
                        </div>
                        <p class="text-xs text-muted mt-0.5"><?php echo e($deal->contact?->company ?? $deal->contact?->full_name ?? __('No contact')); ?></p>
                    </div>
                    <div class="text-right shrink-0">
                        <p class="text-sm font-bold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($deal->value); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deal->expected_close_date): ?>
                        <?php $dl = intval(now()->diffInDays($deal->expected_close_date, false)); ?>
                        <p class="text-[10px] <?php echo e($dl < 0 ? 'text-red-400' : 'text-muted'); ?>">
                            <?php echo e($dl < 0 ? abs($dl).'d overdue' : ($dl === 0 ? 'Today' : $dl.'d left')); ?>

                        </p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="px-4 py-6 text-center">
                    <p class="text-xs text-muted"><?php echo e(__('No deals in this stage')); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            
            <button wire:click="openDealForm(null, <?php echo e($stage->id); ?>)"
                    class="w-full px-4 py-2.5 border-t border-border/50 text-sm text-muted hover:text-ink hover:bg-surface transition-colors flex items-center justify-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <?php echo e(__('Add deal')); ?>

            </button>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <div wire:loading wire:target="updateDealPosition, moveDeal" class="text-center py-2">
        <div class="inline-flex items-center gap-2 text-sm text-muted bg-surface-2 border border-border rounded-xl px-4 py-2">
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
            <?php echo e(__('Moving deal...')); ?>

        </div>
    </div>

    
    <div class="hidden lg:block">
        <div class="overflow-x-auto -mx-6 px-6 pb-4">
            <div class="flex gap-4 min-w-max">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php $stageDeals = $deals->get($stage->id, collect()); ?>
                <div class="w-72 flex-shrink-0" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'stage-'.e($stage->id).''; ?>wire:key="stage-<?php echo e($stage->id); ?>"
                     x-data="{ dragOver: false, dragCounter: 0 }"
                     x-on:dragenter.prevent="dragCounter++; dragOver = true"
                     x-on:dragover.prevent
                     x-on:dragleave.prevent="dragCounter--; if (dragCounter <= 0) { dragOver = false; dragCounter = 0; }"
                     x-on:drop.prevent="
                         dragOver = false; dragCounter = 0;
                         const dealId = parseInt($event.dataTransfer.getData('text/plain'));
                         if (dealId) {
                             $dispatch('deal-moving');
                             $wire.updateDealPosition(dealId, <?php echo e($stage->id); ?>);
                         }
                     ">

                    
                    <div class="mb-3">
                        <div class="h-[3px] rounded-full mb-3" style="background-color: <?php echo e($stage->color); ?>"></div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full" style="background-color: <?php echo e($stage->color); ?>"></span>
                                <h3 class="text-sm font-semibold text-ink/80"><?php echo e($stage->name); ?></h3>
                                <span class="text-xs font-medium text-muted bg-surface px-1.5 py-0.5 rounded-full"><?php echo e($stageDeals->count()); ?></span>
                            </div>
                            <span class="text-xs font-medium text-muted"><?php echo \App\Helpers\CurrencyHelper::display($stageDeals->sum('value')); ?></span>
                        </div>
                    </div>

                    
                    <div class="space-y-3 min-h-[120px] rounded-xl transition-colors duration-150 p-1 -m-1"
                         :class="dragOver ? 'bg-brand/5 ring-2 ring-dashed ring-brand/30' : ''">

                        
                        <div x-show="dragOver" x-transition class="flex items-center justify-center py-4 text-brand text-sm font-medium">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                            <?php echo e(__('Drop here')); ?>

                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stageDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'deal-'.e($deal->id).''; ?>wire:key="deal-<?php echo e($deal->id); ?>"
                             x-data="{ dragging: false }"
                             draggable="true"
                             x-on:dragstart="dragging = true; $event.dataTransfer.setData('text/plain', '<?php echo e($deal->id); ?>'); $event.dataTransfer.effectAllowed = 'move'"
                             x-on:dragend="dragging = false"
                             :class="dragging && 'opacity-50 scale-[0.98]'"
                             class="bg-surface-2 rounded-xl border border-border p-4 hover:shadow-md transition-all duration-150 cursor-grab active:cursor-grabbing group relative
                                <?php echo e($deal->status === 'won' ? 'border-l-3 border-l-green-500' : ''); ?>

                                <?php echo e($deal->status === 'lost' ? 'border-l-3 border-l-red-500 opacity-70' : ''); ?>">

                            
                            <div class="absolute left-1.5 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-40 transition-opacity pointer-events-none">
                                <svg class="w-3 h-5 text-muted" viewBox="0 0 6 16" fill="currentColor">
                                    <circle cx="1.5" cy="2" r="1.2"/>
                                    <circle cx="4.5" cy="2" r="1.2"/>
                                    <circle cx="1.5" cy="6" r="1.2"/>
                                    <circle cx="4.5" cy="6" r="1.2"/>
                                    <circle cx="1.5" cy="10" r="1.2"/>
                                    <circle cx="4.5" cy="10" r="1.2"/>
                                    <circle cx="1.5" cy="14" r="1.2"/>
                                    <circle cx="4.5" cy="14" r="1.2"/>
                                </svg>
                            </div>

                            <div class="flex items-start justify-between mb-2">
                                <div class="flex items-center gap-1.5 min-w-0 flex-1">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deal->status === 'won'): ?>
                                    <svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <?php elseif($deal->status === 'lost'): ?>
                                    <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <h4 wire:click="openDealForm(<?php echo e($deal->id); ?>)"
                                        class="text-sm font-semibold text-ink group-hover:text-primary-700 dark:group-hover:text-primary-300 transition-colors cursor-pointer truncate"><?php echo e($deal->title); ?></h4>
                                </div>

                                
                                <div x-data="{ open: false, menuStyle: '', toggleMenu(el) { if (!this.open) { var r = el.getBoundingClientRect(); var t = r.bottom + 4; var l = r.right - 192; if (t + 320 > window.innerHeight) t = Math.max(8, r.top - 320); if (l < 8) l = 8; this.menuStyle = 'top:'+t+'px;left:'+l+'px;max-height:'+(window.innerHeight-t-8)+'px;'; } this.open = !this.open; } }" class="relative shrink-0">
                                    <button @click="toggleMenu($el)" class="action-dots opacity-0 group-hover:opacity-100" aria-label="More actions" :aria-expanded="open">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
                                    </button>
                                    
                                    <template x-teleport="body">
                                    <div x-show="open" @click.outside="open = false" @scroll.window="open = false" x-transition
                                         role="menu"
                                         class="w-48 bg-surface-2 rounded-xl shadow-2xl border border-border py-1 z-[9999] overflow-y-auto"
                                         :style="'position: fixed;' + menuStyle"
                                         style="display: none;">
                                        <button role="menuitem" wire:click="openDealForm(<?php echo e($deal->id); ?>)" @click="open = false" class="w-full text-left px-4 py-2 text-sm text-ink/80 hover:bg-surface flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            <?php echo e(__('Edit')); ?>

                                        </button>
                                        <div class="border-t border-border my-1"></div>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $targetStage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($targetStage->id !== $stage->id): ?>
                                            <button role="menuitem" wire:click="moveDeal(<?php echo e($deal->id); ?>, <?php echo e($targetStage->id); ?>)" @click="open = false" class="w-full text-left px-3 py-1.5 text-sm text-ink/80 hover:bg-surface flex items-center gap-2">
                                                <span class="w-2.5 h-2.5 rounded-full shrink-0" style="background-color: <?php echo e($targetStage->color); ?>"></span>
                                                <?php echo e($targetStage->name); ?>

                                            </button>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                        <div class="border-t border-border my-1"></div>
                                        <button role="menuitem" wire:click="deleteDeal(<?php echo e($deal->id); ?>)" wire:confirm="Delete this deal?" @click="open = false" class="w-full text-left px-4 py-2 text-sm text-danger hover:bg-danger/10 flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            <?php echo e(__('Delete')); ?>

                                        </button>
                                    </div>
                                    </template>
                                </div>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deal->contact): ?>
                            <p class="text-xs text-muted mb-3"><?php echo e($deal->contact->company ?? $deal->contact->full_name); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($deal->value); ?></span>
                                <div class="flex items-center gap-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deal->expected_close_date): ?>
                                    <?php $daysLeft = intval(now()->diffInDays($deal->expected_close_date, false)); ?>
                                    <span class="text-xs <?php echo e($daysLeft < 0 ? 'text-red-400' : 'text-muted'); ?> flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <?php echo e(abs($daysLeft)); ?>d <?php echo e($daysLeft < 0 ? __('overdue') : ''); ?>

                                    </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deal->assignedTo): ?>
                                    <div class="w-6 h-6 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center text-xs font-semibold text-muted" title="<?php echo e($deal->assignedTo->name); ?>">
                                        <?php echo e($deal->assignedTo->initials); ?>

                                    </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stageDeals->isEmpty()): ?>
                        <div class="flex flex-col items-center justify-center py-8 text-center"
                             :class="dragOver ? 'opacity-0' : 'opacity-100'">
                            <p class="text-xs text-muted"><?php echo e(__('No deals in this stage.')); ?></p>
                            <p class="text-xs text-muted mt-0.5"><?php echo e(__('Drag a deal here or click + to add one.')); ?></p>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        
                        <div x-show="dragOver" x-transition
                             class="border-2 border-dashed border-brand/40 rounded-xl py-6 text-center"
                             style="display: none;">
                            <svg class="w-6 h-6 text-brand/50 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                            <p class="text-xs text-brand/60 font-medium"><?php echo e(__('Drop deal here')); ?></p>
                        </div>
                    </div>

                    
                    <button wire:click="openDealForm(null, <?php echo e($stage->id); ?>)" class="w-full mt-3 py-2.5 border-2 border-dashed border-border rounded-xl text-sm text-muted hover:text-ink hover:border-border transition-colors flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <?php echo e(__('Add deal')); ?>

                    </button>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stages->isEmpty()): ?>
    <?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['type' => 'deals','title' => __('No pipeline configured'),'description' => __('A default pipeline will be created automatically.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'deals','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('No pipeline configured')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('A default pipeline will be created automatically.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $attributes = $__attributesOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__attributesOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $component = $__componentOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__componentOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showPipelineForm): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="pipeline-form-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-surface/50 backdrop-blur-sm" wire:click="closePipelineForm"></div>
            <div class="relative bg-surface-2 rounded-2xl shadow-xl max-w-md w-full p-6" x-trap="$wire.showPipelineForm">
                <div class="flex items-center justify-between mb-5">
                    <h2 id="pipeline-form-title" class="text-lg font-semibold text-ink"><?php echo e(__('New Pipeline')); ?></h2>
                    <button wire:click="closePipelineForm" class="p-1.5 text-muted/60 hover:text-ink rounded-lg hover:bg-surface">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form wire:submit="createPipeline" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Pipeline Name')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="newPipelineName" autofocus
                               class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                               placeholder="<?php echo e(__('e.g. Enterprise Sales, Partnerships...')); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['newPipelineName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <p class="text-xs text-muted">
                        <?php echo e(__('Default stages will be created: Lead, Qualified, Proposal, Negotiation, Won, Lost. You can customize them later.')); ?>

                    </p>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button type="button" wire:click="closePipelineForm" class="btn-secondary text-sm"><?php echo e(__('Cancel')); ?></button>
                        <button type="submit" wire:loading.attr="disabled" class="btn-primary px-5 py-2 text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                            <span wire:loading.remove wire:target="createPipeline"><?php echo e(__('Create Pipeline')); ?></span>
                            <span wire:loading wire:target="createPipeline" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                <?php echo e(__('Creating...')); ?>

                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showDealForm): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="deal-form-modal-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-surface/50 backdrop-blur-sm" wire:click="closeDealForm"></div>
            <div class="relative bg-surface-2 rounded-2xl shadow-xl max-w-lg w-full p-6" x-trap="$wire.showDealForm">
                <div class="flex items-center justify-between mb-5">
                    <h2 id="deal-form-modal-title" class="text-lg font-semibold text-ink"><?php echo e($editingDealId ? __('Edit Deal') : __('New Deal')); ?></h2>
                    <button wire:click="closeDealForm" class="p-1.5 text-muted/60 hover:text-ink rounded-lg hover:bg-surface">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form wire:submit="saveDeal" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Deal Title')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="dealTitle" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="<?php echo e(__('Enterprise License')); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['dealTitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Value')); ?> ($)</label>
                            <input type="number" wire:model="dealValue" step="0.01" min="0" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="10000">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['dealValue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Expected Close')); ?></label>
                            <input type="date" wire:model="dealExpectedClose" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['dealExpectedClose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Stage')); ?> <span class="text-red-500">*</span></label>
                        <select wire:model="dealStageId" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <option value=""><?php echo e(__('Select stage...')); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($stage->id); ?>"><?php echo e($stage->name); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </select>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['dealStageId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Contact')); ?></label>
                        <select wire:model="dealContactId" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <option value=""><?php echo e(__('No contact')); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($contact->id); ?>"><?php echo e($contact->full_name); ?> <?php echo e($contact->company ? '(' . $contact->company . ')' : ''); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </select>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['dealContactId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button type="button" wire:click="closeDealForm" class="btn-secondary text-sm"><?php echo e(__('Cancel')); ?></button>
                        <button type="submit" wire:loading.attr="disabled" class="btn-primary px-5 py-2 text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                            <span wire:loading.remove wire:target="saveDeal"><?php echo e($editingDealId ? __('Update') : __('Create')); ?> <?php echo e(__('Deal')); ?></span>
                            <span wire:loading wire:target="saveDeal" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                <?php echo e(__('Saving...')); ?>

                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/deals/deal-board.blade.php ENDPATH**/ ?>