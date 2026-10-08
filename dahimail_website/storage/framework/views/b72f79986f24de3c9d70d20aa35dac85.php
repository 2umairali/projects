<div class="w-[210px] flex flex-col border-r border-[#2d3039] bg-[#15171e]/50 select-none pb-2 shrink-0"
     wire:poll.30s.visible>

    
    <details class="relative px-4 mt-4 mb-2 group">
        <summary class="py-2 flex items-center gap-2.5 cursor-pointer list-none rounded-lg hover:bg-white/5 transition px-2 -mx-2 [&::-webkit-details-marker]:hidden">
            <?php $activeAccount = $activeAccountId ? $emailAccounts->firstWhere('id', $activeAccountId) : null; $displayAccount = $activeAccount ?? $emailAccounts->first(); ?>
            <div class="w-[26px] h-[26px] rounded-full overflow-hidden relative border border-white/10 shrink-0">
                <svg class="w-full h-full" viewBox="0 0 100 100" fill="none">
                    <circle cx="50" cy="50" r="50" fill="url(#sideGrad)"/>
                    <path d="M50 20C40 20 30 28 30 40C30 50 40 55 50 65C60 55 70 50 70 40C70 28 60 20 50 20Z" fill="white" opacity="0.8"/>
                    <defs><linearGradient id="sideGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#f43f5e;stop-opacity:1" />
                        <stop offset="50%" style="stop-color:#a855f7;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                    </linearGradient></defs>
                </svg>
            </div>
            <div class="flex-1 overflow-hidden flex items-center justify-between">
                <span class="font-semibold text-[13px] text-gray-200 truncate pr-2"><?php echo e($activeAccountId ? ($displayAccount->email ?? auth()->user()->email) : __('All Accounts')); ?></span>
                <svg class="w-3 h-3 text-gray-500 group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg>
            </div>
        </summary>
        
        <div class="absolute top-full left-4 w-48 mt-1 bg-[#1a1d27] border border-white/10 rounded-xl shadow-[0_10px_30px_rgba(0,0,0,0.5)] z-50 py-1.5 font-sans">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $emailAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button wire:click="setAccount(<?php echo e($acct->id); ?>)"
                    onclick="this.closest('details').removeAttribute('open')"
                    class="w-full text-left px-3 py-2 text-[12px] text-gray-300 hover:bg-white/5 hover:text-white transition flex items-center gap-2.5 <?php echo e($activeAccountId === $acct->id ? 'bg-white/5' : ''); ?>">
                <div class="w-[18px] h-[18px] rounded-full flex items-center justify-center font-bold text-[9px] shrink-0 border
                    <?php if($acct->provider === 'gmail'): ?> bg-red-500/20 text-red-400 border-red-500/20
                    <?php elseif($acct->provider === 'outlook'): ?> bg-blue-500/20 text-blue-400 border-blue-500/20
                    <?php else: ?> bg-purple-500/20 text-purple-400 border-purple-500/20
                    <?php endif; ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($acct->provider === 'gmail'): ?> G
                    <?php elseif($acct->provider === 'outlook'): ?> O
                    <?php else: ?> <?php echo e(strtoupper(substr($acct->email, 0, 1))); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <span class="truncate"><?php echo e($acct->email); ?></span>
            </button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeAccountId): ?>
            <div class="h-px bg-white/5 my-1.5 w-full"></div>
            <button wire:click="setAccount(null)"
                    onclick="this.closest('details').removeAttribute('open')"
                    class="w-full text-left px-3 py-2 text-[12px] text-gray-400 hover:bg-white/5 hover:text-white transition flex items-center gap-2.5">
                <svg class="w-4 h-4 opacity-70 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                <?php echo e(__('All Accounts')); ?>

            </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </details>

    
    <div class="px-3 mb-3">
        <button @click="$dispatch('start-compose')"
                class="w-full flex items-center justify-center gap-2 px-3 py-2 bg-[#3b82f6] text-white text-[13px] font-semibold rounded-[7px] hover:bg-[#2563eb] transition-colors shadow-sm">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'plus','class' => 'w-4 h-4 stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'plus','class' => 'w-4 h-4 stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Compose')); ?>

        </button>
    </div>

    
    <div class="flex-1 overflow-y-auto hide-scroll px-3 space-y-0.5">

        
        <button wire:click="setChannel('all')" wire:click.prevent="setFolder('inbox')"
                class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition
                <?php echo e($activeFolder === 'inbox' && $activeChannel === 'all' ? 'bg-[#3b82f6] text-white shadow' : 'hover:bg-white/5 text-gray-400 hover:text-gray-200'); ?>">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'inbox','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'inbox','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Inbox')); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($channelCounts['all'] ?? 0) > 0): ?>
            <span class="ml-auto text-[11px] font-semibold <?php echo e($activeFolder === 'inbox' && $activeChannel === 'all' ? 'text-white/80' : 'text-gray-500'); ?>"><?php echo e($channelCounts['all']); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </button>

        
        <button wire:click="setFolder('sent')"
                class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition
                <?php echo e($activeFolder === 'sent' ? 'bg-[#3b82f6] text-white shadow' : 'hover:bg-white/5 text-gray-400 hover:text-gray-200'); ?>">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'send','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'send','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Sent')); ?>

        </button>

        
        <button wire:click="setFolder('starred')"
                class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition
                <?php echo e($activeFolder === 'starred' ? 'bg-[#3b82f6] text-white shadow' : 'hover:bg-white/5 text-gray-400 hover:text-gray-200'); ?>">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'star','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Starred')); ?>

        </button>

        
        <button wire:click="setFolder('snoozed')"
                class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition
                <?php echo e($activeFolder === 'snoozed' ? 'bg-[#3b82f6] text-white shadow' : 'hover:bg-white/5 text-gray-400 hover:text-gray-200'); ?>">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'clock','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'clock','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Snoozed')); ?>

        </button>

        <div class="h-2"></div>

        
        <?php
            $channelItems = [
                ['key' => 'email', 'label' => __('Email'), 'icon' => 'mail'],
                ['key' => 'whatsapp', 'label' => __('WhatsApp'), 'icon' => 'message-circle'],
                ['key' => 'sms', 'label' => __('SMS'), 'icon' => 'message-circle'],
                ['key' => 'telegram', 'label' => __('Telegram'), 'icon' => 'send'],
                ['key' => 'slack', 'label' => __('Slack'), 'icon' => 'hash'],
                ['key' => 'chat', 'label' => __('Live Chat'), 'icon' => 'message-square'],
            ];
        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $channelItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <button wire:click="setChannel('<?php echo e($ch['key']); ?>')"
                class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition
                <?php echo e($activeChannel === $ch['key'] ? 'bg-[#3b82f6] text-white shadow' : 'hover:bg-white/5 text-gray-400 hover:text-gray-200'); ?>">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => ''.e($ch['icon']).'','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($ch['icon']).'','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e($ch['label']); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($channelCounts[$ch['key']] ?? 0) > 0): ?>
            <span class="ml-auto text-[11px] font-semibold <?php echo e($activeChannel === $ch['key'] ? 'text-white/80' : 'text-gray-500'); ?>"><?php echo e($channelCounts[$ch['key']]); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

    </div>

    
    <div class="px-3 space-y-0.5 mt-auto pt-4">
        <button wire:click="setFolder('archive')"
                class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition
                <?php echo e($activeFolder === 'archive' ? 'bg-[#3b82f6] text-white shadow' : 'hover:bg-white/5 text-gray-400 hover:text-gray-200'); ?>">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'archive','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'archive','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Archive')); ?>

        </button>
        <button wire:click="setFolder('trash')"
                class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition
                <?php echo e($activeFolder === 'trash' ? 'bg-[#3b82f6] text-white shadow' : 'hover:bg-white/5 text-gray-400 hover:text-gray-200'); ?>">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'trash','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'trash','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Bin')); ?>

        </button>

        <div class="h-px bg-white/5 my-2"></div>

        <a href="<?php echo e(route('inbox.canned-responses')); ?>" wire:navigate
           class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition hover:bg-white/5 text-gray-400 hover:text-gray-200">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'zap','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'zap','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Quick Replies')); ?>

        </a>
        <a href="<?php echo e(url('/settings')); ?>" wire:navigate
           class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition hover:bg-white/5 text-gray-400 hover:text-gray-200">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'settings','class' => 'w-[15px] h-[15px] stroke-[2.5]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'settings','class' => 'w-[15px] h-[15px] stroke-[2.5]']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e(__('Settings')); ?>

        </a>
        <a href="<?php echo e(url('/dashboard')); ?>" wire:navigate
           class="w-full px-3 py-1.5 flex items-center gap-3 rounded-[7px] font-medium text-[13px] tracking-wide transition hover:bg-white/5 text-gray-500 hover:text-gray-200">
            <svg class="w-[15px] h-[15px] stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            <?php echo e(__('Exit Inbox')); ?>

        </a>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/inbox/inbox-sidebar.blade.php ENDPATH**/ ?>