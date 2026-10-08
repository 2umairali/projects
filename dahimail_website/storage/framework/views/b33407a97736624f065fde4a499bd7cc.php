<div class="space-y-6">
    
    <div>
        <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Integrations')); ?></h1>
        <p class="text-sm text-muted mt-1"><?php echo e(__('Connect third-party tools and services to extend')); ?> <?php echo e(config('app.name')); ?>.</p>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm flex items-center gap-2">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm flex items-center gap-2">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($statusMessage && !$configuringService): ?>
    <div class="p-3 rounded-xl text-sm flex items-center gap-2
        <?php echo e($statusType === 'success' ? 'bg-success/10 border border-success/20 text-success' : ''); ?>

        <?php echo e($statusType === 'error' ? 'bg-danger/10 border border-danger/20 text-danger' : ''); ?>

        <?php echo e($statusType === 'info' ? 'bg-info/10 border border-info/20 text-info' : ''); ?>">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($statusType === 'success'): ?>
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <?php elseif($statusType === 'error'): ?>
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        <?php else: ?>
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php echo e($statusMessage); ?>

    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $integrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $int): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <div class="bg-surface-2 rounded-2xl border border-border p-6 hover:shadow-sm transition-shadow" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'int-'.e($key).''; ?>wire:key="int-<?php echo e($key); ?>">
            <div class="flex items-start gap-4">
                
                <div class="w-12 h-12 <?php echo e($int['bg']); ?> rounded-xl flex items-center justify-center flex-shrink-0">
                    <span class="text-sm font-bold <?php echo e($int['text']); ?>"><?php echo e(substr($int['name'], 0, 2)); ?></span>
                </div>
                
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm font-semibold text-ink"><?php echo e($int['name']); ?></h3>
                        <span class="px-2 py-0.5 text-xs bg-surface  text-muted rounded-full"><?php echo e($int['category']); ?></span>
                    </div>
                    <p class="text-xs text-muted mt-1"><?php echo e($int['description']); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($int['status'] === 'active' && $int['account_name']): ?>
                    <p class="text-xs text-success mt-1 font-medium"><?php echo e($int['account_name']); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($int['status'] === 'error' && $int['error_message']): ?>
                    <p class="text-xs text-red-500 mt-1"><?php echo e($int['error_message']); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <?php
                // Demo-only integrations: we hide the per-service action
                // buttons (Sync Contacts, Sync Deals, Sync Contacts Now,
                // View Calendar) AND the generic Test button, so the card
                // only exposes a single Disconnect control while we're
                // running in UI-preview mode.
                $demoOnly = in_array($key, ['zapier', 'salesforce', 'hubspot', 'google_calendar'], true);
            ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($int['status'] === 'active' && ! $demoOnly): ?>
            <div class="mt-3 pt-3 border-t border-border">
                <div class="flex flex-wrap items-center gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($key):
                        case ('slack'): ?>
                            <button wire:click="loadSlackChannels"
                                    class="px-2.5 py-1 text-[11px] font-medium text-purple-600 border border-purple-200 rounded-lg hover:bg-brand/10 transition-colors">
                                Select Channel
                            </button>
                            <button wire:click="sendSlackTestNotification"
                                    wire:loading.attr="disabled"
                                    wire:target="sendSlackTestNotification"
                                    class="px-2.5 py-1 text-[11px] font-medium text-purple-600 border border-purple-200 rounded-lg hover:bg-brand/10 transition-colors disabled:opacity-50">
                                <span wire:loading.remove wire:target="sendSlackTestNotification"><?php echo e(__('Test Notification')); ?></span>
                                <span wire:loading wire:target="sendSlackTestNotification" class="inline-flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                    Sending...
                                </span>
                            </button>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($int['slack_channel_id']): ?>
                            <span class="text-[11px] text-muted"><?php echo e(__('Channel:')); ?> <?php echo e($int['slack_channel_id']); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <label class="inline-flex items-center gap-1.5 text-[11px] text-muted cursor-pointer select-none">
                                <input type="checkbox"
                                       wire:click="toggleSlackForward"
                                       <?php if($int['forward_new_messages'] ?? false): echo 'checked'; endif; ?>
                                       class="rounded border-border bg-surface text-brand focus:ring-brand/30">
                                <span><?php echo e(__('Forward new messages to Slack')); ?></span>
                            </label>
                            <?php break; ?>

                        <?php case ('stripe'): ?>
                            <a href="https://dashboard.stripe.com" target="_blank"
                               class="px-2.5 py-1 text-[11px] font-medium text-brand border border-brand/20 rounded-lg hover:bg-brand/10 transition-colors inline-flex items-center gap-1">
                                Payment Dashboard
                                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                            <?php break; ?>

                        <?php case ('hubspot'): ?>
                            <button wire:click="syncHubSpotContacts"
                                    wire:loading.attr="disabled"
                                    wire:target="syncHubSpotContacts"
                                    class="px-2.5 py-1 text-[11px] font-medium text-orange-600 border border-orange-200 rounded-lg hover:bg-orange-50 transition-colors disabled:opacity-50">
                                <span wire:loading.remove wire:target="syncHubSpotContacts"><?php echo e(__('Sync Contacts Now')); ?></span>
                                <span wire:loading wire:target="syncHubSpotContacts" class="inline-flex items-center gap-2">
                                    <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                    Syncing...
                                </span>
                            </button>
                            <?php break; ?>

                        <?php case ('salesforce'): ?>
                            <button wire:click="syncSalesforceContacts"
                                    wire:loading.attr="disabled"
                                    wire:target="syncSalesforceContacts"
                                    class="px-2.5 py-1 text-[11px] font-medium text-blue-600 border border-info/20 rounded-lg hover:bg-info/10 transition-colors disabled:opacity-50">
                                <span wire:loading.remove wire:target="syncSalesforceContacts"><?php echo e(__('Sync Contacts')); ?></span>
                                <span wire:loading wire:target="syncSalesforceContacts" class="inline-flex items-center gap-2">
                                    <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                    Syncing...
                                </span>
                            </button>
                            <button wire:click="syncSalesforceDeals"
                                    wire:loading.attr="disabled"
                                    wire:target="syncSalesforceDeals"
                                    class="px-2.5 py-1 text-[11px] font-medium text-blue-600 border border-info/20 rounded-lg hover:bg-info/10 transition-colors disabled:opacity-50">
                                <span wire:loading.remove wire:target="syncSalesforceDeals"><?php echo e(__('Sync Deals')); ?></span>
                                <span wire:loading wire:target="syncSalesforceDeals" class="inline-flex items-center gap-2">
                                    <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                    Syncing...
                                </span>
                            </button>
                            <?php break; ?>

                        <?php case ('google_calendar'): ?>
                            <a href="https://calendar.google.com" target="_blank"
                               class="px-2.5 py-1 text-[11px] font-medium text-blue-600 border border-info/20 rounded-lg hover:bg-info/10 transition-colors inline-flex items-center gap-1">
                                View Calendar
                                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                            <?php break; ?>
                    <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($int['last_sync_at']): ?>
                <p class="text-[11px] text-muted mt-2">
                    <?php echo e(__('Last sync:')); ?> <?php echo e($int['last_sync_at']); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($int['last_sync_stats']): ?>
                    &middot; <?php echo e($int['last_sync_stats']['synced'] ?? 0); ?> <?php echo e(__('synced')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($int['last_sync_stats']['failed'] ?? 0) > 0): ?>
                    , <?php echo e($int['last_sync_stats']['failed']); ?> <?php echo e(__('failed')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-border">
                
                <span class="flex items-center gap-1.5 text-xs font-medium
                    <?php echo e($int['status'] === 'active' ? 'text-success' : ($int['status'] === 'error' ? 'text-danger' : 'text-muted')); ?>">
                    <span class="w-2 h-2 rounded-full
                        <?php echo e($int['status'] === 'active' ? 'bg-success/100' : ($int['status'] === 'error' ? 'bg-danger/100' : 'bg-gray-300')); ?>"></span>
                    <?php echo e($int['status'] === 'active' ? 'Connected' : ($int['status'] === 'error' ? 'Error' : 'Not connected')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($int['status'] === 'active' && $int['connected_at']): ?>
                    <span class="text-muted font-normal">&middot; <?php echo e($int['connected_at']); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>

                
                <div class="flex items-center gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($int['status'] === 'active'): ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! ($demoOnly)): ?>
                        <button wire:click="testConnection('<?php echo e($key); ?>')"
                                wire:loading.attr="disabled"
                                wire:target="testConnection('<?php echo e($key); ?>')"
                                class="px-3 py-1.5 text-xs font-medium text-brand border border-brand/20 rounded-lg hover:bg-brand/10 transition-colors disabled:opacity-50">
                            <span wire:loading.remove wire:target="testConnection('<?php echo e($key); ?>')"><?php echo e(__('Test')); ?></span>
                            <span wire:loading wire:target="testConnection('<?php echo e($key); ?>')" class="inline-flex items-center gap-2">
                                <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Testing...
                            </span>
                        </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <button wire:click="disconnect('<?php echo e($key); ?>')"
                                wire:confirm="Disconnect <?php echo e($int['name']); ?>? This will remove all stored credentials."
                                class="px-3 py-1.5 text-xs font-medium text-danger border border-danger/20 rounded-lg hover:bg-danger/10 transition-colors">
                            Disconnect
                        </button>
                    <?php elseif($int['status'] === 'error'): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demoOnly): ?>
                            
                            <button wire:click="disconnect('<?php echo e($key); ?>')"
                                    wire:confirm="Disconnect <?php echo e($int['name']); ?>?"
                                    class="px-3 py-1.5 text-xs font-medium text-danger border border-danger/20 rounded-lg hover:bg-danger/10 transition-colors">
                                Disconnect
                            </button>
                        <?php else: ?>
                            
                            <button wire:click="connect('<?php echo e($key); ?>')"
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-xl hover:bg-red-700 transition-colors">
                                Reconnect
                            </button>
                            
                            <button wire:click="disconnect('<?php echo e($key); ?>')"
                                    wire:confirm="Disconnect <?php echo e($int['name']); ?>?"
                                    class="px-3 py-1.5 text-xs font-medium text-danger border border-danger/20 rounded-lg hover:bg-danger/10 transition-colors">
                                Remove
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                        
                        <button wire:click="connect('<?php echo e($key); ?>')"
                                class="px-4 py-2 text-sm font-medium text-primary-600 dark:text-primary-400 border border-primary-200 dark:border-primary-800 rounded-xl hover:bg-primary-50 dark:hover:bg-primary-900/20 transition-colors">
                            Connect
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringService): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="integration-config-modal-title" x-data x-trap.noscroll="true">
        <div class="flex items-center justify-center min-h-screen px-4">
            
            <div class="fixed inset-0 bg-surface/50 backdrop-blur-sm" wire:click="closeConfigForm"></div>

            
            <div class="relative bg-surface-2 rounded-2xl shadow-xl max-w-lg w-full p-6 max-h-[90vh] overflow-y-auto">
                
                <div class="flex items-center justify-between mb-5">
                    <h2 id="integration-config-modal-title" class="text-lg font-semibold text-ink">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($configuringService):
                            case ('stripe'): ?> <?php echo e(__('Configure Stripe')); ?> <?php break; ?>
                            <?php case ('hubspot'): ?> <?php echo e(__('Configure HubSpot')); ?> <?php break; ?>
                            <?php case ('salesforce'): ?> <?php echo e(__('Configure Salesforce')); ?> <?php break; ?>
                            <?php case ('zapier'): ?> <?php echo e(__('Zapier Integration')); ?> <?php break; ?>
                            <?php case ('slack_channels'): ?> <?php echo e(__('Slack Notification Channel')); ?> <?php break; ?>
                            <?php default: ?> Configure <?php echo e(ucfirst($configuringService)); ?>

                        <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </h2>
                    <button wire:click="closeConfigForm" class="p-2 text-muted/60 hover:text-ink rounded-lg hover:bg-surface">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($statusMessage): ?>
                <div class="mb-4 p-3 rounded-xl text-sm flex items-center gap-2
                    <?php echo e($statusType === 'success' ? 'bg-success/10 border border-success/20 text-success' : ''); ?>

                    <?php echo e($statusType === 'error' ? 'bg-danger/10 border border-danger/20 text-danger' : ''); ?>

                    <?php echo e($statusType === 'info' ? 'bg-info/10 border border-info/20 text-info' : ''); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($statusType === 'success'): ?>
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php elseif($statusType === 'error'): ?>
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <?php else: ?>
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php echo e($statusMessage); ?>

                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="space-y-4">
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringService === 'stripe'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Secret Key')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="configForm.secret_key"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="sk_test_... or sk_live_...">
                        <p class="text-xs text-muted mt-1">
                            <?php echo e(__('From')); ?> <a href="https://dashboard.stripe.com/apikeys" target="_blank" class="text-brand hover:underline"><?php echo e(__('Stripe Dashboard')); ?></a> &rarr; <?php echo e(__('API Keys')); ?> &rarr; <?php echo e(__('Secret key')); ?>

                        </p>
                    </div>
                    <div class="bg-warning/10 border border-warning/20 rounded-xl p-3">
                        <p class="text-xs text-warning">
                            <strong><?php echo e(__('Security:')); ?></strong> <?php echo e(__('Your secret key is encrypted at rest and never exposed in logs or API responses.')); ?>

                            <?php echo e(__('Use')); ?> <code class="bg-warning/15 px-1 rounded">sk_test_</code> <?php echo e(__('keys for development.')); ?>

                        </p>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-border">
                        <button wire:click="closeConfigForm" class="px-4 py-2.5 text-sm font-medium text-muted  hover:text-ink dark:text-gray-200"><?php echo e(__('Cancel')); ?></button>
                        <button wire:click="saveApiKey('stripe')" class="px-6 py-2.5 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors">
                            <span wire:loading.remove wire:target="saveApiKey('stripe')"><?php echo e(__('Save & Connect')); ?></span>
                            <span wire:loading wire:target="saveApiKey('stripe')" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Saving...
                            </span>
                        </button>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringService === 'hubspot'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Private App Token')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="configForm.api_key"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="pat-na1-...">
                        <p class="text-xs text-muted mt-1">
                            <?php echo e(__('From')); ?> <a href="https://app.hubspot.com/private-apps/" target="_blank" class="text-brand hover:underline">HubSpot</a> &rarr; <?php echo e(__('Settings')); ?> &rarr; <?php echo e(__('Integrations')); ?> &rarr; <?php echo e(__('Private Apps')); ?>

                        </p>
                    </div>
                    <div class="bg-surface rounded-xl p-3">
                        <p class="text-xs text-muted ">
                            <strong><?php echo e(__('Required scopes:')); ?></strong> <code class="bg-surface  px-1 rounded">crm.objects.contacts.read</code>,
                            <code class="bg-surface  px-1 rounded">crm.objects.companies.read</code>,
                            <code class="bg-surface  px-1 rounded">crm.objects.deals.read</code>
                        </p>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-border">
                        <button wire:click="closeConfigForm" class="px-4 py-2.5 text-sm font-medium text-muted  hover:text-ink dark:text-gray-200"><?php echo e(__('Cancel')); ?></button>
                        <button wire:click="saveApiKey('hubspot')" class="px-6 py-2.5 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors">
                            <span wire:loading.remove wire:target="saveApiKey('hubspot')"><?php echo e(__('Save & Connect')); ?></span>
                            <span wire:loading wire:target="saveApiKey('hubspot')" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Saving...
                            </span>
                        </button>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringService === 'salesforce'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Client ID')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="configForm.client_id"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="<?php echo e(__('Connected App Consumer Key')); ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Client Secret')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="configForm.client_secret"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="<?php echo e(__('Connected App Consumer Secret')); ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Instance URL')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="configForm.instance_url"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="https://yourorg.my.salesforce.com">
                        <p class="text-xs text-muted mt-1"><?php echo e(__('Your Salesforce org URL. Use')); ?> <code class="bg-surface  px-1 rounded">login.salesforce.com</code> <?php echo e(__('for production.')); ?></p>
                    </div>
                    <div class="bg-surface rounded-xl p-3">
                        <p class="text-xs text-muted ">
                            <strong><?php echo e(__('Callback URL:')); ?></strong> <?php echo e(__('Set this in your Salesforce Connected App:')); ?>

                        </p>
                        <div class="flex items-center gap-2 mt-2" x-data="{ copied: false }">
                            <code class="flex-1 text-xs bg-surface-2 border border-border rounded-lg px-3 py-2 text-muted  truncate"><?php echo e(url('/integrations/salesforce/callback')); ?></code>
                            <button @click="navigator.clipboard.writeText('<?php echo e(url('/integrations/salesforce/callback')); ?>'); copied = true; setTimeout(() => copied = false, 2000)"
                                    class="px-3 py-2 text-xs font-medium text-brand bg-brand/10 rounded-lg hover:bg-brand/15 flex-shrink-0">
                                <span x-show="!copied"><?php echo e(__('Copy')); ?></span>
                                <span x-show="copied" x-cloak class="text-success"><?php echo e(__('Copied!')); ?></span>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-border">
                        <button wire:click="closeConfigForm" class="px-4 py-2.5 text-sm font-medium text-muted  hover:text-ink dark:text-gray-200"><?php echo e(__('Cancel')); ?></button>
                        <button wire:click="saveSalesforceCredentials" class="px-6 py-2.5 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors">
                            <span wire:loading.remove wire:target="saveSalesforceCredentials"><?php echo e(__('Save & Authorize')); ?></span>
                            <span wire:loading wire:target="saveSalesforceCredentials" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Redirecting...
                            </span>
                        </button>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringService === 'slack_channels'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Notification Channel')); ?></label>
                        <p class="text-xs text-muted mb-3"><?php echo e(__('Choose which Slack channel receives')); ?> <?php echo e(config('app.name')); ?> <?php echo e(__('notifications (new conversations, AI replies, deal updates).')); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($slackChannels)): ?>
                        
                        <select wire:model.live="selectedSlackChannel"
                                class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface">
                            <option value=""><?php echo e(__('Select a channel...')); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $slackChannels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($ch['id']); ?>">
                                <?php echo e($ch['is_private'] ? '🔒' : '#'); ?> <?php echo e($ch['name']); ?> (<?php echo e($ch['num_members']); ?> <?php echo e(__('members')); ?>)
                            </option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </select>
                        <?php else: ?>
                        <p class="text-sm text-muted py-4 text-center"><?php echo e(__('No channels found. Make sure the')); ?> <?php echo e(config('app.name')); ?> <?php echo e(__('bot is added to at least one channel.')); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-border">
                        <button wire:click="closeConfigForm" class="px-4 py-2.5 text-sm font-medium text-muted  hover:text-ink dark:text-gray-200"><?php echo e(__('Cancel')); ?></button>
                        <button wire:click="saveSlackChannel"
                                class="px-6 py-2.5 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors"
                                <?php echo e(empty($selectedSlackChannel) ? 'disabled' : ''); ?>>
                            <span wire:loading.remove wire:target="saveSlackChannel"><?php echo e(__('Save Channel')); ?></span>
                            <span wire:loading wire:target="saveSlackChannel" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Saving...
                            </span>
                        </button>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringService === 'zapier'): ?>
                    <div class="bg-surface rounded-xl p-4 space-y-4">
                        <div>
                            <p class="text-xs font-medium text-ink/80 mb-2"><?php echo e(__('Webhook URL')); ?></p>
                            <p class="text-xs text-muted mb-2"><?php echo e(__('Use this URL in your Zapier webhook triggers to send data to')); ?> <?php echo e(config('app.name')); ?>.</p>
                            <div class="flex items-center gap-2" x-data="{ copied: false }">
                                <code class="flex-1 text-xs bg-surface-2 border border-border rounded-lg px-3 py-2 text-muted  truncate"><?php echo e($zapierWebhookUrl); ?></code>
                                <button @click="navigator.clipboard.writeText(<?php echo \Illuminate\Support\Js::from($zapierWebhookUrl)->toHtml() ?>); copied = true; setTimeout(() => copied = false, 2000)"
                                        class="px-3 py-2 text-xs font-medium text-brand bg-brand/10 rounded-lg hover:bg-brand/15 flex-shrink-0">
                                    <span x-show="!copied"><?php echo e(__('Copy')); ?></span>
                                    <span x-show="copied" x-cloak class="text-success"><?php echo e(__('Copied!')); ?></span>
                                </button>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-ink/80 mb-2"><?php echo e(__('API Token')); ?></p>
                            <p class="text-xs text-muted mb-2"><?php echo e(__('Include this token as a Bearer token in the Authorization header.')); ?></p>
                            <div class="flex items-center gap-2" x-data="{ copied: false, show: false }">
                                <code class="flex-1 text-xs bg-surface-2 border border-border rounded-lg px-3 py-2 text-muted  truncate"
                                      x-text="show ? <?php echo \Illuminate\Support\Js::from($zapierApiToken)->toHtml() ?> : '<?php echo e(str_repeat('*', 20)); ?>...<?php echo e(substr($zapierApiToken, -8)); ?>'"></code>
                                <button @click="show = !show"
                                        class="px-3 py-2 text-xs font-medium text-muted  bg-surface  rounded-lg hover:bg-gray-200 dark:bg-gray-700 flex-shrink-0"
                                        x-text="show ? '<?php echo e(__('Hide')); ?>' : '<?php echo e(__('Show')); ?>'"></button>
                                <button @click="navigator.clipboard.writeText(<?php echo \Illuminate\Support\Js::from($zapierApiToken)->toHtml() ?>); copied = true; setTimeout(() => copied = false, 2000)"
                                        class="px-3 py-2 text-xs font-medium text-brand bg-brand/10 rounded-lg hover:bg-brand/15 flex-shrink-0">
                                    <span x-show="!copied"><?php echo e(__('Copy')); ?></span>
                                    <span x-show="copied" x-cloak class="text-success"><?php echo e(__('Copied!')); ?></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-warning/10 border border-warning/20 rounded-xl p-3">
                        <p class="text-xs text-warning">
                            <strong><?php echo e(__('Important:')); ?></strong> <?php echo e(__('Copy these credentials now. The API token is shown only once for security.')); ?>

                            <?php echo e(__('If you regenerate tokens, all existing Zapier zaps using the old credentials will stop working.')); ?>

                        </p>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-border">
                        <button wire:click="regenerateZapierTokens"
                                wire:confirm="Regenerate tokens? This will invalidate all existing Zapier connections for this workspace."
                                class="px-4 py-2.5 text-sm font-medium text-amber-600 border border-warning/20 rounded-xl hover:bg-warning/10 transition-colors">
                            <span wire:loading.remove wire:target="regenerateZapierTokens"><?php echo e(__('Regenerate Tokens')); ?></span>
                            <span wire:loading wire:target="regenerateZapierTokens" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Regenerating...
                            </span>
                        </button>
                        <button wire:click="closeConfigForm" class="px-4 py-2.5 text-sm font-medium text-muted  hover:text-ink dark:text-gray-200"><?php echo e(__('Close')); ?></button>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/integration-manager.blade.php ENDPATH**/ ?>