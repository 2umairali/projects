<div wire:poll.30s.visible class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('campaigns')); ?>" class="p-2 text-muted hover:text-ink rounded-xl hover:bg-surface transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <div class="flex items-center gap-2.5">
                    <h1 class="text-xl font-bold text-ink"><?php echo e($campaign->name); ?></h1>
                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full <?php echo e(match($campaign->status) {
                        'sent' => 'bg-success/15 text-success',
                        'sending' => 'bg-warning/15 text-warning',
                        'scheduled' => 'bg-info/15 text-info',
                        'draft' => 'bg-surface text-muted',
                        'paused' => 'bg-orange-100 text-orange-700',
                        default => 'bg-surface text-muted'
                    }); ?>"><?php echo e(ucfirst($campaign->status)); ?></span>
                </div>
                <p class="text-sm text-muted mt-0.5"><?php echo e($campaign->subject); ?></p>
            </div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($campaign->status === 'sending'): ?>
        <span class="flex items-center gap-2 px-3 py-1.5 bg-warning/15 text-warning text-sm font-medium rounded-full">
            <span class="w-2 h-2 bg-warning rounded-full animate-pulse"></span>
            <?php echo e(__('Sending in progress...')); ?>

        </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div class="flex items-center gap-1 border-b border-border">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['overview' => __('Overview'), 'recipients' => __('Messages'), 'opens' => __('Opens'), 'clicks' => __('Clicks'), 'bounces' => __('Bounces')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabKey => $tabLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <button wire:click="$set('activeTab', '<?php echo e($tabKey); ?>')"
                class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors <?php echo e($activeTab === $tabKey ? 'border-brand text-brand' : 'border-transparent text-muted hover:text-ink hover:border-border'); ?>">
            <?php echo e($tabLabel); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tabKey === 'recipients'): ?>
                <span class="ml-1 text-xs text-muted"><?php echo e(number_format($stats['recipients'])); ?></span>
            <?php elseif($tabKey === 'opens'): ?>
                <span class="ml-1 text-xs text-muted"><?php echo e(number_format($stats['opened'])); ?></span>
            <?php elseif($tabKey === 'clicks'): ?>
                <span class="ml-1 text-xs text-muted"><?php echo e(number_format($stats['clicked'])); ?></span>
            <?php elseif($tabKey === 'bounces'): ?>
                <span class="ml-1 text-xs text-muted"><?php echo e(number_format($stats['bounced'])); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'overview'): ?>

    
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border">
            <h3 class="text-base font-semibold text-ink"><?php echo e(__('Delivery')); ?></h3>
            <p class="text-sm text-muted mt-0.5">
                <?php echo e(number_format($stats['delivered'])); ?> emails were successfully delivered<?php echo e($stats['bounced'] > 0 ? ', with ' . $stats['bounce_rate'] . '% bounced' : ''); ?>.
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-border">
            <div class="p-5">
                <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Total recipients')); ?></p>
                <div class="flex items-baseline gap-2 mt-2">
                    <span class="text-3xl font-bold text-ink"><?php echo e(number_format($stats['recipients'])); ?></span>
                    <span class="text-sm font-semibold text-success">100%</span>
                </div>
            </div>
            <div class="p-5">
                <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Delivered')); ?></p>
                <div class="flex items-baseline gap-2 mt-2">
                    <span class="text-3xl font-bold text-ink"><?php echo e(number_format($stats['delivered'])); ?></span>
                    <span class="text-sm font-semibold text-success"><?php echo e($stats['recipients'] > 0 ? round(($stats['delivered'] / $stats['recipients']) * 100, 1) : 0); ?>%</span>
                </div>
            </div>
            <div class="p-5">
                <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Rejected')); ?></p>
                <div class="flex items-baseline gap-2 mt-2">
                    <span class="text-3xl font-bold text-ink"><?php echo e(number_format($stats['failed'] ?? 0)); ?></span>
                    <span class="text-sm font-semibold text-danger"><?php echo e($stats['recipients'] > 0 ? round((($stats['failed'] ?? 0) / $stats['recipients']) * 100, 1) : 0); ?>%</span>
                </div>
            </div>
            <div class="p-5">
                <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Bounced')); ?></p>
                <div class="flex items-baseline gap-2 mt-2">
                    <span class="text-3xl font-bold text-ink"><?php echo e(number_format($stats['bounced'])); ?></span>
                    <span class="text-sm font-semibold text-danger"><?php echo e($stats['bounce_rate']); ?>%</span>
                </div>
            </div>
        </div>
    </div>

    
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border">
            <h3 class="text-base font-semibold text-ink"><?php echo e(__('Engagement')); ?></h3>
            <p class="text-sm text-muted mt-0.5">
                Your email was delivered to <?php echo e(number_format($stats['delivered'])); ?> recipients, opened by <?php echo e($stats['open_rate']); ?>% and clicked by <?php echo e($stats['click_rate']); ?>%.
            </p>
        </div>

        
        <?php
            $funnelMax = max($stats['delivered'], 1);
            $openPct = round(($stats['opened'] / $funnelMax) * 100);
            $clickPct = round(($stats['clicked'] / $funnelMax) * 100);
            $unsubPct = round(($stats['unsubscribed'] / $funnelMax) * 100);
        ?>
        <div class="px-6 py-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="flex items-center justify-center">
                    <?php
                        $openDeg = round(($stats['open_rate'] / 100) * 360);
                        $clickDeg = round(($stats['click_rate'] / 100) * 360);
                    ?>
                    <div class="relative w-48 h-48">
                        <svg viewBox="0 0 36 36" class="w-full h-full -rotate-90">
                            <circle cx="18" cy="18" r="15.9" fill="none" stroke-width="3" class="stroke-border"/>
                            <circle cx="18" cy="18" r="15.9" fill="none" stroke-width="3" class="stroke-brand"
                                    stroke-dasharray="<?php echo e($stats['open_rate']); ?> <?php echo e(100 - $stats['open_rate']); ?>"
                                    stroke-linecap="round"/>
                            <circle cx="18" cy="18" r="12" fill="none" stroke-width="3" class="stroke-border"/>
                            <circle cx="18" cy="18" r="12" fill="none" stroke-width="3" class="stroke-success"
                                    stroke-dasharray="<?php echo e($stats['click_rate']); ?> <?php echo e(100 - $stats['click_rate']); ?>"
                                    stroke-linecap="round"/>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-2xl font-bold text-ink"><?php echo e($stats['open_rate']); ?>%</span>
                            <span class="text-xs text-muted"><?php echo e(__('opened')); ?></span>
                        </div>
                    </div>
                </div>

                
                <div class="space-y-4 flex flex-col justify-center">
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-ink"><?php echo e(__('Delivered')); ?></span>
                            <span class="text-sm font-semibold text-ink"><?php echo e(number_format($stats['delivered'])); ?></span>
                        </div>
                        <div class="w-full h-3 bg-surface rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-ink"><?php echo e(__('Opened')); ?></span>
                            <span class="text-sm font-semibold text-brand"><?php echo e(number_format($stats['opened'])); ?> (<?php echo e($stats['open_rate']); ?>%)</span>
                        </div>
                        <div class="w-full h-3 bg-surface rounded-full overflow-hidden">
                            <div class="h-full bg-brand rounded-full transition-all duration-700" style="width: <?php echo e($openPct); ?>%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-ink"><?php echo e(__('Clicked')); ?></span>
                            <span class="text-sm font-semibold text-success"><?php echo e(number_format($stats['clicked'])); ?> (<?php echo e($stats['click_rate']); ?>%)</span>
                        </div>
                        <div class="w-full h-3 bg-surface rounded-full overflow-hidden">
                            <div class="h-full bg-success rounded-full transition-all duration-700" style="width: <?php echo e($clickPct); ?>%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-ink"><?php echo e(__('Unsubscribed')); ?></span>
                            <span class="text-sm font-semibold text-orange-500"><?php echo e(number_format($stats['unsubscribed'])); ?> (<?php echo e($stats['unsub_rate']); ?>%)</span>
                        </div>
                        <div class="w-full h-3 bg-surface rounded-full overflow-hidden">
                            <div class="h-full bg-orange-500 rounded-full transition-all duration-700" style="width: <?php echo e(max($unsubPct, $stats['unsubscribed'] > 0 ? 2 : 0)); ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-border border-t border-border">
            <div class="p-5">
                <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Opened')); ?></p>
                <div class="flex items-baseline gap-2 mt-2">
                    <span class="text-3xl font-bold text-ink"><?php echo e($stats['open_rate']); ?>%</span>
                    <span class="text-sm font-semibold text-success"><?php echo e(number_format($stats['opened'])); ?></span>
                </div>
            </div>
            <div class="p-5">
                <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Clicked')); ?></p>
                <div class="flex items-baseline gap-2 mt-2">
                    <span class="text-3xl font-bold text-ink"><?php echo e($stats['click_rate']); ?>%</span>
                    <span class="text-sm font-semibold text-success"><?php echo e(number_format($stats['clicked'])); ?></span>
                </div>
            </div>
            <div class="p-5">
                <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Unsubscribed')); ?></p>
                <div class="flex items-baseline gap-2 mt-2">
                    <span class="text-3xl font-bold text-ink"><?php echo e($stats['unsub_rate']); ?>%</span>
                    <span class="text-sm font-semibold text-orange-600"><?php echo e(number_format($stats['unsubscribed'])); ?></span>
                </div>
            </div>
            <div class="p-5">
                <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Spam reports')); ?></p>
                <div class="flex items-baseline gap-2 mt-2">
                    <span class="text-3xl font-bold text-ink">0%</span>
                    <span class="text-sm font-semibold text-muted">0</span>
                </div>
            </div>
        </div>
    </div>

    
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border">
            <h3 class="text-base font-semibold text-ink"><?php echo e(__('Details')); ?></h3>
            <p class="text-sm text-muted mt-0.5"><?php echo e(__('An overview of this campaign\'s details, message and settings.')); ?></p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-border">
            <div class="p-6 space-y-4">
                <div>
                    <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('From')); ?></p>
                    <p class="text-sm font-semibold text-ink mt-1"><?php echo e($campaign->emailAccount?->display_name ?? $campaign->emailAccount?->email ?? __('N/A')); ?></p>
                </div>
                <div>
                    <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('"Reply to" email')); ?></p>
                    <p class="text-sm font-semibold text-ink mt-1"><?php echo e($campaign->emailAccount?->email ?? __('N/A')); ?></p>
                </div>
                <div>
                    <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Send time')); ?></p>
                    <p class="text-sm font-semibold text-ink mt-1"><?php echo e($campaign->sent_at?->format('M j, Y \a\t g:i A') ?? ($campaign->scheduled_at?->format('M j, Y \a\t g:i A') ?? __('Not sent yet'))); ?></p>
                </div>
                <div>
                    <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Campaign type')); ?></p>
                    <p class="text-sm font-semibold text-ink mt-1"><?php echo e(ucfirst(str_replace('_', ' ', $campaign->type ?? 'regular'))); ?></p>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Subject')); ?></p>
                    <p class="text-sm font-semibold text-ink mt-1"><?php echo e($campaign->subject); ?></p>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($campaign->preview_text): ?>
                <div>
                    <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Preview text')); ?></p>
                    <p class="text-sm text-muted mt-1"><?php echo e($campaign->preview_text); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <div>
                    <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Audience')); ?></p>
                    <p class="text-sm font-semibold text-ink mt-1"><?php echo e(ucfirst($campaign->audience_type ?? 'all')); ?> &mdash; <?php echo e(number_format($stats['recipients'])); ?> <?php echo e(__('recipients')); ?></p>
                </div>
                <div>
                    <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Created by')); ?></p>
                    <p class="text-sm font-semibold text-ink mt-1"><?php echo e($campaign->createdBy?->name ?? __('Unknown')); ?></p>
                </div>
            </div>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($links->isNotEmpty()): ?>
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border">
            <h3 class="text-base font-semibold text-ink"><?php echo e(__('Link Performance')); ?></h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface border-b border-border">
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-5 py-3"><?php echo e(__('URL')); ?></th>
                        <th class="text-right text-xs font-semibold text-muted uppercase tracking-wider px-5 py-3 w-32"><?php echo e(__('Clicks')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-surface transition-colors">
                        <td class="px-5 py-3">
                            <p class="text-sm text-brand truncate max-w-lg" title="<?php echo e($link->original_url); ?>"><?php echo e($link->original_url); ?></p>
                        </td>
                        <td class="px-5 py-3 text-right">
                            <span class="text-sm font-semibold text-ink"><?php echo e(number_format($link->clicks_count)); ?></span>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'recipients'): ?>
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-5 py-4 border-b border-border flex items-center justify-between">
            <h3 class="text-sm font-semibold text-ink"><?php echo e(__('All Recipients')); ?></h3>
            <select wire:model.live="recipientFilter" class="text-sm border border-border rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface-2">
                <option value="all"><?php echo e(__('All statuses')); ?></option>
                <option value="sent"><?php echo e(__('Sent')); ?></option>
                <option value="delivered"><?php echo e(__('Delivered')); ?></option>
                <option value="opened"><?php echo e(__('Opened')); ?></option>
                <option value="clicked"><?php echo e(__('Clicked')); ?></option>
                <option value="bounced"><?php echo e(__('Bounced')); ?></option>
                <option value="unsubscribed"><?php echo e(__('Unsubscribed')); ?></option>
                <option value="failed"><?php echo e(__('Failed')); ?></option>
            </select>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface border-b border-border">
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Contact')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Email')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Status')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden md:table-cell"><?php echo e(__('Sent')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden md:table-cell"><?php echo e(__('Opened')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden lg:table-cell"><?php echo e(__('Clicked')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recipients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-surface transition-colors">
                        <td class="px-4 py-3">
                            <p class="text-sm font-medium text-ink"><?php echo e($recipient->contact?->full_name ?? __('Unknown')); ?></p>
                        </td>
                        <td class="px-4 py-3">
                            <p class="text-sm text-muted"><?php echo e($recipient->email ?? $recipient->contact?->email ?? '--'); ?></p>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $statusColors = [
                                    'pending' => 'bg-surface text-muted',
                                    'sent' => 'bg-info/15 text-info',
                                    'delivered' => 'bg-success/15 text-success',
                                    'opened' => 'bg-emerald-100 text-emerald-700',
                                    'clicked' => 'bg-teal-100 text-teal-700',
                                    'bounced' => 'bg-danger/15 text-danger',
                                    'unsubscribed' => 'bg-orange-100 text-orange-700',
                                    'failed' => 'bg-danger/15 text-danger',
                                ];
                            ?>
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold <?php echo e($statusColors[$recipient->status] ?? 'bg-surface text-muted'); ?>">
                                <?php echo e(ucfirst($recipient->status)); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs text-muted hidden md:table-cell"><?php echo e($recipient->sent_at?->format('M j, g:i A') ?? '--'); ?></td>
                        <td class="px-4 py-3 text-xs text-muted hidden md:table-cell"><?php echo e($recipient->opened_at?->format('M j, g:i A') ?? '--'); ?></td>
                        <td class="px-4 py-3 text-xs text-muted hidden lg:table-cell"><?php echo e($recipient->clicked_at?->format('M j, g:i A') ?? '--'); ?></td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-sm text-muted"><?php echo e(__('No recipients found.')); ?></td>
                    </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recipients->hasPages()): ?>
        <div class="px-4 py-3 border-t border-border">
            <?php echo e($recipients->links()); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'opens'): ?>
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-5 py-4 border-b border-border">
            <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Who opened this campaign')); ?></h3>
            <p class="text-xs text-muted mt-0.5"><?php echo e(number_format($stats['opened'])); ?> recipients opened your email (<?php echo e($stats['open_rate']); ?>% open rate)</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface border-b border-border">
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Contact')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Email')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Opened at')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $openedRecipients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-surface transition-colors">
                        <td class="px-4 py-3 text-sm font-medium text-ink"><?php echo e($recipient->contact?->full_name ?? __('Unknown')); ?></td>
                        <td class="px-4 py-3 text-sm text-muted"><?php echo e($recipient->email ?? $recipient->contact?->email ?? '--'); ?></td>
                        <td class="px-4 py-3 text-sm text-muted"><?php echo e($recipient->opened_at?->format('M j, Y \a\t g:i A') ?? '--'); ?></td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr><td colspan="3" class="px-4 py-8 text-center text-sm text-muted"><?php echo e(__('No opens recorded yet.')); ?></td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openedRecipients->hasPages()): ?>
        <div class="px-4 py-3 border-t border-border"><?php echo e($openedRecipients->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'clicks'): ?>
    <div class="space-y-6">
        
        <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
            <div class="px-5 py-4 border-b border-border">
                <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Link clicks')); ?></h3>
                <p class="text-xs text-muted mt-0.5"><?php echo e(number_format($stats['clicked'])); ?> recipients clicked a link (<?php echo e($stats['click_rate']); ?>% click rate)</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-surface border-b border-border">
                            <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('URL')); ?></th>
                            <th class="text-right text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 w-32"><?php echo e(__('Clicks')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/60">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr class="hover:bg-surface transition-colors">
                            <td class="px-4 py-3"><p class="text-sm text-brand truncate max-w-lg" title="<?php echo e($link->original_url); ?>"><?php echo e($link->original_url); ?></p></td>
                            <td class="px-4 py-3 text-right"><span class="text-sm font-semibold text-ink"><?php echo e(number_format($link->clicks_count)); ?></span></td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr><td colspan="2" class="px-4 py-8 text-center text-sm text-muted"><?php echo e(__('No link clicks yet.')); ?></td></tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
            <div class="px-5 py-4 border-b border-border">
                <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Who clicked')); ?></h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-surface border-b border-border">
                            <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Contact')); ?></th>
                            <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Email')); ?></th>
                            <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Clicked at')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/60">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $clickedRecipients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr class="hover:bg-surface transition-colors">
                            <td class="px-4 py-3 text-sm font-medium text-ink"><?php echo e($recipient->contact?->full_name ?? __('Unknown')); ?></td>
                            <td class="px-4 py-3 text-sm text-muted"><?php echo e($recipient->email ?? $recipient->contact?->email ?? '--'); ?></td>
                            <td class="px-4 py-3 text-sm text-muted"><?php echo e($recipient->clicked_at?->format('M j, Y \a\t g:i A') ?? '--'); ?></td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr><td colspan="3" class="px-4 py-8 text-center text-sm text-muted"><?php echo e(__('No clicks recorded yet.')); ?></td></tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($clickedRecipients->hasPages()): ?>
            <div class="px-4 py-3 border-t border-border"><?php echo e($clickedRecipients->links()); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'bounces'): ?>
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-5 py-4 border-b border-border">
            <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Bounced & Failed')); ?></h3>
            <p class="text-xs text-muted mt-0.5"><?php echo e(number_format($stats['bounced'] + ($stats['failed'] ?? 0))); ?> emails bounced or failed to deliver</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface border-b border-border">
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Contact')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Email')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Status')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden md:table-cell"><?php echo e(__('Error')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $bouncedRecipients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-surface transition-colors">
                        <td class="px-4 py-3 text-sm font-medium text-ink"><?php echo e($recipient->contact?->full_name ?? __('Unknown')); ?></td>
                        <td class="px-4 py-3 text-sm text-muted"><?php echo e($recipient->email ?? $recipient->contact?->email ?? '--'); ?></td>
                        <td class="px-4 py-3">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-danger/15 text-danger"><?php echo e(ucfirst($recipient->status)); ?></span>
                        </td>
                        <td class="px-4 py-3 text-xs text-muted hidden md:table-cell max-w-xs truncate"><?php echo e($recipient->error_message ?? '--'); ?></td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr><td colspan="4" class="px-4 py-8 text-center text-sm text-muted"><?php echo e(__('No bounces or failures.')); ?></td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bouncedRecipients->hasPages()): ?>
        <div class="px-4 py-3 border-t border-border"><?php echo e($bouncedRecipients->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/campaigns/campaign-report.blade.php ENDPATH**/ ?>