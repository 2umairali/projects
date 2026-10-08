
<div wire:poll.60s class="space-y-6">

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('activity')): ?>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
        <?php $s = $this->stats; ?>
        <div class="rounded-2xl border border-border bg-surface-2 p-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand/10 text-brand">
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h4l3 8 4-16 3 8h4"/></svg>
            </div>
            <div>
                <div class="text-[11px] font-medium uppercase tracking-wider text-muted"><?php echo e(__('Total events')); ?></div>
                <div class="text-xl font-bold text-ink tabular-nums"><?php echo e(number_format($s['total'])); ?></div>
            </div>
        </div>
        <div class="rounded-2xl border border-border bg-surface-2 p-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-success/10 text-success">
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
                <div class="text-[11px] font-medium uppercase tracking-wider text-muted"><?php echo e(__('Today')); ?></div>
                <div class="text-xl font-bold text-ink tabular-nums"><?php echo e(number_format($s['today'])); ?></div>
            </div>
        </div>
        <div class="rounded-2xl border border-border bg-surface-2 p-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-info/10 text-info">
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
            </div>
            <div>
                <div class="text-[11px] font-medium uppercase tracking-wider text-muted"><?php echo e(__('Last 7 days')); ?></div>
                <div class="text-xl font-bold text-ink tabular-nums"><?php echo e(number_format($s['week'])); ?></div>
            </div>
        </div>
        <div class="rounded-2xl border border-border bg-surface-2 p-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-accent/15 text-accent">
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
                <div class="text-[11px] font-medium uppercase tracking-wider text-muted"><?php echo e(__('Active people')); ?></div>
                <div class="text-xl font-bold text-ink tabular-nums"><?php echo e(number_format($s['actors'])); ?></div>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('activity')): ?>
    <div class="rounded-2xl border border-border bg-surface-2 p-4">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.35-4.35"/></svg>
                <input
                    type="text"
                    wire:model.live.debounce.400ms="search"
                    placeholder="<?php echo e(__('Search activities by description or actor…')); ?>"
                    aria-label="<?php echo e(__('Search activities')); ?>"
                    class="input pl-9 w-full"
                >
            </div>
            <select wire:model.live="typeFilter" aria-label="<?php echo e(__('Filter by activity type')); ?>" class="select w-full sm:w-64">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->filterOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <option value="<?php echo e($value); ?>"><?php echo e($label); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search || $typeFilter): ?>
            <button wire:click="$set('search', ''); $set('typeFilter', '')"
                    class="btn-secondary whitespace-nowrap">
                <svg viewBox="0 0 24 24" class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                <?php echo e(__('Clear')); ?>

            </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="rounded-2xl border border-border bg-surface-2 p-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($this->groupedActivities) > 0): ?>
            <div class="space-y-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->groupedActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateLabel => $activities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div>
                        
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-muted"><?php echo e($dateLabel); ?></span>
                            <span class="text-[11px] text-muted/60">·  <?php echo e(count($activities)); ?> <?php echo e(__('events')); ?></span>
                            <div class="flex-1 border-t border-border/60"></div>
                        </div>

                        
                        <div class="relative pl-8">
                            <div class="absolute left-[15px] top-2 bottom-2 w-px bg-border/60" aria-hidden="true"></div>

                            <div class="space-y-1">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <?php
                                        $meta = \App\Livewire\ActivityFeed::getMeta($activity);
                                        $iconSvg = \App\Livewire\ActivityFeed::getIconSvg($meta['icon']);
                                        $description = \App\Livewire\ActivityFeed::humanDescription($activity);
                                        $url = \App\Livewire\ActivityFeed::resourceUrl($activity);
                                        $colorMap = [
                                            'brand' => 'bg-brand/10 text-brand',
                                            'success' => 'bg-success/10 text-success',
                                            'danger' => 'bg-danger/10 text-danger',
                                            'info' => 'bg-info/10 text-info',
                                            'warning' => 'bg-warning/10 text-warning',
                                            'accent' => 'bg-accent/15 text-accent',
                                            'muted' => 'bg-surface text-muted',
                                        ];
                                        $dotColor = [
                                            'brand' => 'bg-brand',
                                            'success' => 'bg-success',
                                            'danger' => 'bg-danger',
                                            'info' => 'bg-info',
                                            'warning' => 'bg-warning',
                                            'accent' => 'bg-accent',
                                            'muted' => 'bg-muted/60',
                                        ];
                                        $iconClasses = $colorMap[$meta['color']] ?? $colorMap['muted'];
                                        $dotClass = $dotColor[$meta['color']] ?? $dotColor['muted'];
                                    ?>

                                    <div class="relative group">
                                        <div class="absolute -left-8 top-3 flex items-center justify-center" aria-hidden="true">
                                            <div class="w-[9px] h-[9px] rounded-full <?php echo e($dotClass); ?> ring-[3px] ring-surface-2"></div>
                                        </div>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($url): ?>
                                        <a href="<?php echo e($url); ?>" wire:navigate
                                           class="flex items-start gap-3 rounded-xl px-3 py-2.5 transition-colors hover:bg-surface group-hover:bg-surface">
                                        <?php else: ?>
                                        <div class="flex items-start gap-3 rounded-xl px-3 py-2.5">
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg <?php echo e($iconClasses); ?>">
                                                <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $iconSvg; ?></svg>
                                            </div>

                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm text-ink leading-snug"><?php echo e($description); ?></p>
                                                <div class="flex items-center gap-2 mt-0.5">
                                                    <time
                                                        datetime="<?php echo e($activity->created_at->toIso8601String()); ?>"
                                                        class="text-xs text-muted"
                                                        title="<?php echo e($activity->created_at->format('M j, Y g:i A')); ?>"
                                                    >
                                                        <?php echo e($activity->created_at->diffForHumans()); ?>

                                                    </time>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activity->causer): ?>
                                                    <span class="text-xs text-muted/60">·</span>
                                                    <span class="text-xs text-muted"><?php echo e($activity->causer->name); ?></span>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($url): ?>
                                                        <svg viewBox="0 0 24 24" class="h-3 w-3 text-muted/50 opacity-0 group-hover:opacity-100 transition-opacity ml-auto" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17l9.2-9.2M17 17V7H7"/></svg>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            </div>

                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activity->causer): ?>
                                            <div class="hidden sm:flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-brand/15 text-brand text-[11px] font-bold" title="<?php echo e($activity->causer->name); ?>">
                                                <?php echo e(strtoupper(substr($activity->causer->name, 0, 1))); ?>

                                            </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($url): ?>
                                        </a>
                                        <?php else: ?>
                                        </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            
            <div class="mt-6 pt-6 border-t border-border/60 text-center">
                <button
                    wire:click="loadMore"
                    wire:loading.attr="disabled"
                    class="btn-secondary"
                >
                    <span wire:loading.remove wire:target="loadMore"><?php echo e(__('Load older activity')); ?></span>
                    <span wire:loading wire:target="loadMore" class="inline-flex items-center gap-2">
                        <span class="loading-spinner loading-sm"></span>
                        <?php echo e(__('Loading…')); ?>

                    </span>
                </button>
            </div>

        <?php else: ?>
            
            <div class="flex flex-col items-center justify-center py-16 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-brand/10 text-brand mb-4">
                    <svg viewBox="0 0 24 24" class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-ink mb-1"><?php echo e(__('No activity yet')); ?></h3>
                <p class="text-sm text-muted max-w-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search || $typeFilter): ?>
                        <?php echo e(__('No activities match your current filters. Try adjusting your search or filter.')); ?>

                    <?php else: ?>
                        <?php echo e(__('Connect an email account or send your first campaign — events will start streaming in here.')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search || $typeFilter): ?>
                    <button wire:click="$set('search', ''); $set('typeFilter', '')" class="btn-secondary mt-4">
                        <?php echo e(__('Clear filters')); ?>

                    </button>
                <?php else: ?>
                    <a href="<?php echo e(url('/settings/email')); ?>" wire:navigate class="btn-primary mt-4">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 mr-1" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        <?php echo e(__('Connect Email')); ?>

                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/activity-feed.blade.php ENDPATH**/ ?>