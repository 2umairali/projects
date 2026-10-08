<div>
    <h3 class="text-sm font-semibold text-ink mb-4"><?php echo e(__('Activity Timeline')); ?></h3>

    
    <div class="flex items-center gap-1.5 mb-4 flex-wrap">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['all' => __('All'), 'email' => __('Email'), 'whatsapp' => __('WhatsApp'), 'sms' => __('SMS'), 'telegram' => __('Telegram'), 'slack' => __('Slack'), 'chat' => __('Live Chat')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <button type="button" wire:click="$set('channelFilter', '<?php echo e($key); ?>')"
                class="px-2.5 py-1 text-xs font-medium rounded-full transition-colors
                       <?php echo e($channelFilter === $key ? 'bg-brand text-white' : 'bg-surface text-muted hover:text-ink hover:bg-surface-2'); ?>">
            <?php echo e($label); ?>

        </button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($events) > 0): ?>
    <div class="flex items-center gap-3 mb-3 text-xs text-muted">
        <?php
            $channelCounts = collect($events)->groupBy('channel')->map->count();
        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $channelCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <span class="inline-flex items-center gap-1">
            <span class="w-2 h-2 rounded-full <?php echo e(match($ch) { 'email' => 'bg-brand', 'whatsapp' => 'bg-green-500', 'sms' => 'bg-blue-500', 'telegram' => 'bg-sky-500', 'slack' => 'bg-purple-500', 'chat' => 'bg-orange-500', default => 'bg-muted' }); ?>"></span>
            <?php echo e($count); ?> <?php echo e(ucfirst($ch ?? 'email')); ?>

        </span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($timeline->count() > 0): ?>
    <div class="relative">
        
        <div class="absolute left-4 top-0 bottom-0 w-px bg-border"></div>

        <div class="space-y-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="relative flex gap-4 pl-2" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'event-'.e($loop->index).''; ?>wire:key="event-<?php echo e($loop->index); ?>">
                
                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'relative z-10 flex-shrink-0 w-8 h-8 rounded-full border-2 flex items-center justify-center',
                    'bg-primary-500/10 border-primary-500/30' => $event['color'] === 'brand',
                    'bg-blue-500/10 border-blue-500/30' => $event['color'] === 'info',
                    'bg-green-500/10 border-green-500/30' => $event['color'] === 'success',
                    'bg-amber-500/10 border-amber-500/30' => $event['color'] === 'warning',
                    'bg-gray-500/10 border-gray-500/30' => $event['color'] === 'muted',
                ]); ?>">
                    <svg class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'w-3.5 h-3.5',
                        'text-primary-500' => $event['color'] === 'brand',
                        'text-blue-500' => $event['color'] === 'info',
                        'text-green-500' => $event['color'] === 'success',
                        'text-amber-500' => $event['color'] === 'warning',
                        'text-gray-500' => $event['color'] === 'muted',
                    ]); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($event['icon']):
                            case ('mail'): ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                <?php break; ?>
                            <?php case ('send'): ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                <?php break; ?>
                            <?php case ('user-plus'): ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M8.5 3a4 4 0 110 8 4 4 0 010-8zM20 8v6M23 11h-6"/>
                                <?php break; ?>
                            <?php case ('briefcase'): ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2zM16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>
                                <?php break; ?>
                            <?php case ('message-square'): ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                                <?php break; ?>
                            <?php default: ?>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </svg>
                </div>

                
                <div class="flex-1 min-w-0 pb-4">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-ink"><?php echo e($event['title']); ?></p>
                        <time class="text-xs text-muted shrink-0 ml-2" title="<?php echo e(\Carbon\Carbon::parse($event['date'])->format('M j, Y g:i A')); ?>"><?php echo e(\Carbon\Carbon::parse($event['date'])->diffForHumans()); ?></time>
                    </div>
                    <p class="text-xs text-muted mt-0.5 truncate"><?php echo e($event['description']); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($event['channel'])): ?>
                    <span class="inline-flex items-center gap-1 text-[10px] text-muted bg-surface px-1.5 py-0.5 rounded-full mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full <?php echo e(match($event['channel']) { 'email' => 'bg-brand', 'whatsapp' => 'bg-green-500', 'sms' => 'bg-blue-500', 'telegram' => 'bg-sky-500', 'slack' => 'bg-purple-500', 'chat' => 'bg-orange-500', default => 'bg-muted' }); ?>"></span>
                        <?php echo e(ucfirst($event['channel'])); ?>

                    </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasMore): ?>
        <div class="text-center mt-4">
            <button wire:click="loadMore" class="text-sm text-brand hover:text-brand/80 font-medium transition-colors"><?php echo e(__('Load more')); ?></button>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-8">
        <p class="text-sm text-muted"><?php echo e(__('No activity yet')); ?></p>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/contacts/contact-timeline.blade.php ENDPATH**/ ?>