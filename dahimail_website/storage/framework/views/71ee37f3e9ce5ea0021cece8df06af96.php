<div class="space-y-6" x-data="{ dirty: false }" @change="dirty = true" @saved.window="dirty = false"
     x-on:livewire:navigating.window="if(dirty && !confirm('You have unsaved changes. Leave anyway?')) $event.preventDefault()"
     x-init="window.addEventListener('beforeunload', (e) => { if(dirty) { e.preventDefault(); e.returnValue = '' } })">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('message')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm"><?php echo e(session('message')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm"><?php echo e(session('error')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Email Accounts')); ?></h1>
            <p class="text-sm text-muted mt-1"><?php echo e(__('Connect and manage your email accounts.')); ?></p>
        </div>
        <button wire:click="openAddForm" class="btn-primary flex items-center gap-2 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <?php echo e(__('Add Account')); ?>

        </button>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
    <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'account-'.e($account->id).''; ?>wire:key="account-<?php echo e($account->id); ?>" class="bg-surface-2 rounded-2xl border border-border p-5">
        <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center <?php echo e($account->isConnected() ? 'bg-success/10' : 'bg-danger/10'); ?>">
                    <svg class="w-6 h-6 <?php echo e($account->isConnected() ? 'text-success' : 'text-danger'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm font-semibold text-ink"><?php echo e($account->email); ?></h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($account->is_default): ?>
                        <span class="px-2 py-0.5 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 text-xs font-medium rounded-full"><?php echo e(__('Default')); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <p class="text-xs text-muted mt-0.5">
                        <?php echo e($account->display_name ?? ucfirst($account->provider)); ?>

                        &middot;
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($account->isConnected()): ?>
                        <span class="text-success"><?php echo e(__('Connected')); ?></span>
                        <?php else: ?>
                        <span class="text-danger"><?php echo e(ucfirst($account->status)); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($account->last_synced_at): ?>
                        &middot; <?php echo e(__('Last sync')); ?> <span title="<?php echo e($account->last_synced_at->format('M j, Y g:i A')); ?>"><?php echo e($account->last_synced_at->diffForHumans()); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($account->error_message): ?>
                    <div class="mt-2 p-2 bg-danger/5 rounded-lg">
                        <p class="text-xs font-medium text-danger"><?php echo e(__('Connection issue')); ?></p>
                        <p class="text-xs text-muted mt-0.5">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(str_contains($account->error_message, 'OAuth') || str_contains($account->error_message, 'token')): ?>
                                Your email account needs to be reconnected. Click \"Reconnect\" to fix this.') }}
                            <?php elseif(str_contains($account->error_message, 'IMAP') || str_contains($account->error_message, 'connection')): ?>
                                <?php echo e(__('We couldn\'t reach your email server. Please check your email settings and try again.')); ?>

                            <?php else: ?>
                                <?php echo e(__('Something went wrong with your email connection. Try reconnecting your account.')); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <div class="flex items-center gap-3">
                
                <label class="flex items-center gap-2 cursor-pointer">
                    <span class="text-xs text-muted"><?php echo e(__('AI Auto-Reply')); ?></span>
                    <button wire:click="toggleAiReply(<?php echo e($account->id); ?>)"
                            class="relative inline-flex h-5 w-9 items-center rounded-full transition-colors <?php echo e($account->ai_auto_reply ? 'bg-brand' : 'bg-gray-200 dark:bg-gray-700'); ?>">
                        <span class="inline-block h-4 w-4 transform rounded-full bg-surface-2 shadow transition-transform <?php echo e($account->ai_auto_reply ? 'translate-x-4' : 'translate-x-0.5'); ?>"></span>
                    </button>
                </label>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$account->isConnected()): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($account->isOAuth()): ?>
                    <button x-data x-on:click="$wire.getReconnectOAuthUrl(<?php echo e($account->id); ?>).then(function(url) { url && (window.location.href = url); })"
                            class="px-3 py-1.5 text-xs font-medium text-white bg-success hover:bg-green-600 rounded-lg transition-colors flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        Reconnect
                    </button>
                    <?php else: ?>
                    <button wire:click="reconnect(<?php echo e($account->id); ?>)"
                            class="px-3 py-1.5 text-xs font-medium text-white bg-success hover:bg-green-600 rounded-lg transition-colors flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        Reconnect
                    </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <button wire:click="editAccount(<?php echo e($account->id); ?>)" class="px-3 py-1.5 text-xs font-medium text-muted bg-surface hover:bg-gray-200 dark:bg-gray-700 rounded-lg transition-colors flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit
                </button>

                
                <div x-data="{
                        open: false, menuTop: 0, menuLeft: 0,
                        reposition() { const r = this.$refs.trigger.getBoundingClientRect(); this.menuLeft = r.right - 176; this.menuTop = r.bottom + 4; },
                        toggle() { this.open = !this.open; if (this.open) this.$nextTick(() => this.reposition()); },
                     }"
                     @scroll.window="open && reposition()" @resize.window="open && reposition()" @keydown.escape.window="open = false">
                    <button type="button" x-ref="trigger" @click="toggle()" class="p-2 text-muted/60 hover:text-ink rounded-lg hover:bg-surface transition-colors" :aria-expanded="open">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
                    </button>
                    <template x-teleport="body">
                    <div x-show="open" @click.outside="open = false" x-transition
                         :style="`position: fixed; top: ${menuTop}px; left: ${menuLeft}px; z-index: 9999;`"
                         class="w-44 bg-surface-2 rounded-xl shadow-lg border border-border py-1" style="display: none;">
                        <button wire:click="editAccount(<?php echo e($account->id); ?>)" @click="open = false" class="w-full text-left px-4 py-2 text-sm text-ink/80 hover:bg-surface flex items-center gap-2">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit Settings
                        </button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$account->is_default): ?>
                        <button wire:click="makeDefault(<?php echo e($account->id); ?>)" @click="open = false" class="w-full text-left px-4 py-2 text-sm text-ink/80 hover:bg-surface flex items-center gap-2">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                            Set as Default
                        </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($account->isConnected()): ?>
                        <button wire:click="disconnect(<?php echo e($account->id); ?>)" @click="open = false" class="w-full text-left px-4 py-2 text-sm text-ink/80 hover:bg-surface flex items-center gap-2">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                            Disconnect
                        </button>
                        <?php else: ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($account->isOAuth()): ?>
                            <button x-data x-on:click="$wire.getReconnectOAuthUrl(<?php echo e($account->id); ?>).then(function(url) { url && (window.location.href = url); })" @click="open = false" class="w-full text-left px-4 py-2 text-sm text-success hover:bg-success/10 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                <?php echo e(__('Reconnect via')); ?> <?php echo e(ucfirst($account->provider)); ?>

                            </button>
                            <?php else: ?>
                            <button wire:click="reconnect(<?php echo e($account->id); ?>)" @click="open = false" class="w-full text-left px-4 py-2 text-sm text-success hover:bg-success/10 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                Reconnect
                            </button>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="border-t border-border my-1"></div>
                        <button wire:click="deleteAccount(<?php echo e($account->id); ?>)" wire:confirm="<?php echo e(__('Are you sure? This will remove this email account and all its data.')); ?>" @click="open = false" class="w-full text-left px-4 py-2 text-sm text-danger hover:bg-danger/10 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete Account
                        </button>
                    </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['type' => 'email','title' => __('No email accounts connected'),'description' => __('Connect your first email account to start receiving and sending emails through') . ' ' . config('app.name') . '.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('No email accounts connected')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Connect your first email account to start receiving and sending emails through') . ' ' . config('app.name') . '.')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <button wire:click="openAddForm" class="btn-primary mt-1 gap-2">
            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <?php echo e(__('Connect Email Account')); ?>

        </button>
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

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showProviderPicker): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="provider-picker-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-surface/50" wire:click="closeAddForm"></div>
            <div class="relative bg-surface-2 rounded-2xl shadow-xl max-w-2xl w-full p-6 max-h-[90vh] overflow-y-auto" x-trap="$wire.showProviderPicker">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 id="provider-picker-title" class="text-lg font-semibold text-ink"><?php echo e(__('Connect Email Account')); ?></h2>
                        <p class="text-sm text-muted mt-1"><?php echo e(__('Choose your email provider to get started.')); ?></p>
                    </div>
                    <button wire:click="closeAddForm" class="p-1.5 text-muted hover:text-muted rounded-lg hover:bg-surface">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <div class="mb-4 p-3 bg-red-500/10 border border-red-500/20 text-red-400 rounded-xl text-sm"><?php echo e(session('error')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div class="mb-4">
                    <h3 class="text-xs font-semibold text-muted uppercase tracking-wider mb-3"><?php echo e(__('Recommended (One-Click Sign In)')); ?></h3>
                    <div class="grid grid-cols-2 gap-3">
                        
                        <button x-data x-on:click="
                            $wire.connectOAuth('gmail').then(url => { if(url) window.location.href = url; })
                        " class="group flex items-center gap-3 p-4 bg-surface rounded-xl border border-border hover:border-primary-500/50 hover:bg-primary-50/5 transition-all cursor-pointer text-left w-full">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-red-500/10 shrink-0">
                                <svg class="w-5 h-5 text-red-500" viewBox="0 0 24 24" fill="currentColor"><path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-ink group-hover:text-primary-600 transition-colors flex items-center gap-1.5"><?php echo e(__('Sign in with Gmail')); ?> <span class="px-1.5 py-0.5 text-[9px] font-bold bg-green-500/15 text-green-400 rounded-full"><?php echo e(__('FAST')); ?></span> <span class="px-1.5 py-0.5 text-[9px] font-bold bg-blue-500/15 text-blue-400 rounded-full"><?php echo e(__('PREFERRED')); ?></span></p>
                                <p class="text-xs text-muted truncate"><?php echo e(__('One-click Google sign-in — OAuth, no app password needed')); ?></p>
                            </div>
                        </button>
                        
                        <button x-data x-on:click="
                            $wire.connectOAuth('outlook').then(url => { if(url) window.location.href = url; })
                        " class="group flex items-center gap-3 p-4 bg-surface rounded-xl border border-border hover:border-primary-500/50 hover:bg-primary-50/5 transition-all cursor-pointer text-left w-full">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-blue-500/10 shrink-0">
                                <svg class="w-5 h-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor"><path d="M11.4 24H0V12.6h11.4V24zM24 24H12.6V12.6H24V24zM11.4 11.4H0V0h11.4v11.4zM24 11.4H12.6V0H24v11.4z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-ink group-hover:text-primary-600 transition-colors flex items-center gap-1.5"><?php echo e(__('Sign in with Outlook')); ?> <span class="px-1.5 py-0.5 text-[9px] font-bold bg-green-500/15 text-green-400 rounded-full"><?php echo e(__('FAST')); ?></span> <span class="px-1.5 py-0.5 text-[9px] font-bold bg-blue-500/15 text-blue-400 rounded-full"><?php echo e(__('PREFERRED')); ?></span></p>
                                <p class="text-xs text-muted truncate"><?php echo e(__('Microsoft 365 sign-in — OAuth, instant connection')); ?></p>
                            </div>
                        </button>
                    </div>
                </div>

                
                <div>
                    <h3 class="text-xs font-semibold text-muted uppercase tracking-wider mb-3"><?php echo e(__('Other Email Providers')); ?></h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $providerPresets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $preset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <button wire:click="selectProvider('<?php echo e($key); ?>')"
                                class="group flex items-center gap-3 p-4 bg-surface rounded-xl border border-border hover:border-primary-500/50 hover:bg-primary-50/5 transition-all text-left">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center shrink-0
                                <?php if($key === 'custom'): ?> bg-gray-500/10
                                <?php elseif($key === 'gmail_imap'): ?> bg-red-500/10
                                <?php elseif($key === 'outlook_imap'): ?> bg-blue-500/10
                                <?php elseif($key === 'yahoo'): ?> bg-purple-500/10
                                <?php elseif($key === 'icloud'): ?> bg-gray-500/10
                                <?php elseif($key === 'protonmail'): ?> bg-violet-500/10
                                <?php else: ?> bg-primary-500/10
                                <?php endif; ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($key === 'custom'): ?>
                                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <?php else: ?>
                                <svg class="w-5 h-5
                                    <?php if($key === 'gmail_imap'): ?> text-red-500
                                    <?php elseif($key === 'outlook_imap'): ?> text-blue-500
                                    <?php elseif($key === 'yahoo'): ?> text-purple-500
                                    <?php elseif($key === 'icloud'): ?> text-muted
                                    <?php elseif($key === 'protonmail'): ?> text-violet-500
                                    <?php else: ?> text-primary-500
                                    <?php endif; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-ink group-hover:text-primary-600 transition-colors truncate flex items-center gap-1">
                                    <?php echo e($preset['label']); ?>

                                    <span class="px-1 py-0.5 text-[8px] font-bold bg-amber-500/15 text-amber-400 rounded shrink-0">IMAP</span>
                                </p>
                                <p class="text-xs text-muted truncate"><?php echo e($preset['description']); ?></p>
                            </div>
                        </button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <p class="text-[10px] text-muted mt-3 flex items-center gap-1.5">
                        <svg class="w-3 h-3 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <?php echo e(__('IMAP connections may take 10-15 seconds to sync. OAuth (Gmail/Outlook above) is faster and recommended.')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showAddForm): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="email-account-modal-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-surface/50" wire:click="closeAddForm"></div>
            <div class="relative bg-surface-2 rounded-2xl shadow-xl max-w-lg w-full p-6 max-h-[90vh] overflow-y-auto" x-trap="$wire.showAddForm">
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProvider && !$editingAccountId): ?>
                        <button wire:click="backToProviderPicker" class="p-1.5 text-muted hover:text-ink rounded-lg hover:bg-surface transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div>
                            <h2 id="email-account-modal-title" class="text-lg font-semibold text-ink">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingAccountId): ?>
                                    Edit Email Account
                                <?php elseif($selectedProvider && $selectedProvider !== 'custom'): ?>
                                    <?php echo e($providerPresets[$selectedProvider]['label'] ?? __('Connect Email Account')); ?>

                                <?php else: ?>
                                    Connect Email Account
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </h2>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProvider && !$editingAccountId && isset($providerPresets[$selectedProvider])): ?>
                            <p class="text-xs text-muted mt-0.5"><?php echo e($providerPresets[$selectedProvider]['description']); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    <button wire:click="closeAddForm" class="p-1.5 text-muted hover:text-muted rounded-lg hover:bg-surface">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProvider && !$editingAccountId && isset($providerPresets[$selectedProvider])): ?>
                    <?php $activePreset = $providerPresets[$selectedProvider]; ?>
                    <div class="p-3 bg-primary-500/5 border border-primary-500/10 rounded-xl text-sm text-ink/80 mb-4">
                        <div class="flex gap-2">
                            <svg class="w-4 h-4 text-primary-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <p><?php echo e($activePreset['help_text']); ?></p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($activePreset['help_url'])): ?>
                                <a href="<?php echo e($activePreset['help_url']); ?>" target="_blank" rel="noopener" class="text-primary-600 hover:text-primary-700 text-xs font-medium mt-1 inline-flex items-center gap-1">
                                    <?php echo e(__('Learn more')); ?>

                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form wire:submit="saveAccount" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Email Address')); ?> <span class="text-red-500">*</span></label>
                            <input type="email" wire:model="accountEmail" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 <?php echo e($editingAccountId ? 'opacity-60 cursor-not-allowed' : ''); ?>" placeholder="you@company.com" <?php echo e($editingAccountId ? 'readonly' : ''); ?>>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingAccountId): ?> <p class="text-xs text-muted mt-1"><?php echo e(__('Email address cannot be changed after creation.')); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['accountEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Display Name')); ?></label>
                            <input type="text" wire:model="displayName" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500" placeholder="<?php echo e(__('Support Team')); ?>">
                        </div>
                    </div>

                    <?php $isPreset = $selectedProvider && $selectedProvider !== 'custom' && !$editingAccountId; ?>

                    <h3 class="text-sm font-semibold text-ink pt-2"><?php echo e(__('Incoming Mail Server')); ?></h3>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Server Address')); ?> <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="imapHost" <?php if($isPreset): ?> readonly <?php endif; ?> class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 <?php echo e($isPreset ? 'opacity-60 cursor-not-allowed' : ''); ?>" placeholder="imap.gmail.com">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['imapHost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Port')); ?></label>
                            <input type="number" wire:model="imapPort" <?php if($isPreset): ?> readonly <?php endif; ?> class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 <?php echo e($isPreset ? 'opacity-60 cursor-not-allowed' : ''); ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Username')); ?> <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="imapUsername" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500" placeholder="your email address">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['imapUsername'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Password')); ?> <span class="text-red-500">*</span></label>
                            <input type="password" wire:model="imapPassword" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500" placeholder="<?php echo e($editingAccountId ? 'Leave blank to keep current' : ($isPreset ? 'App password' : '')); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingAccountId): ?> <p class="text-xs text-muted mt-1"><?php echo e(__('Leave blank to keep your current password.')); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['imapPassword'];
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
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Encryption')); ?></label>
                        <select wire:model="imapEncryption" <?php if($isPreset): ?> disabled <?php endif; ?> class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 <?php echo e($isPreset ? 'opacity-60 cursor-not-allowed' : ''); ?>">
                            <option value="ssl">SSL</option>
                            <option value="tls">TLS</option>
                            <option value="none">None</option>
                        </select>
                    </div>

                    <h3 class="text-sm font-semibold text-ink pt-2"><?php echo e(__('Outgoing Mail Server')); ?></h3>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1">Server Address</label>
                            <input type="text" wire:model="smtpHost" <?php if($isPreset): ?> readonly <?php endif; ?> class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 <?php echo e($isPreset ? 'opacity-60 cursor-not-allowed' : ''); ?>" placeholder="smtp.gmail.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Port')); ?></label>
                            <input type="number" wire:model="smtpPort" <?php if($isPreset): ?> readonly <?php endif; ?> class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 <?php echo e($isPreset ? 'opacity-60 cursor-not-allowed' : ''); ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Outgoing Username')); ?></label>
                            <input type="text" wire:model="smtpUsername" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500" placeholder="your email address">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Outgoing Password')); ?></label>
                            <input type="password" wire:model="smtpPassword" class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500" placeholder="<?php echo e($editingAccountId ? 'Leave blank to keep current' : ($isPreset ? 'App password' : '')); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingAccountId): ?> <p class="text-xs text-muted mt-1"><?php echo e(__('Leave blank to keep your current password.')); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Encryption')); ?></label>
                        <select wire:model="smtpEncryption" <?php if($isPreset): ?> disabled <?php endif; ?> class="w-full px-3 py-2 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 <?php echo e($isPreset ? 'opacity-60 cursor-not-allowed' : ''); ?>">
                            <option value="ssl">SSL</option>
                            <option value="tls">TLS</option>
                            <option value="starttls">STARTTLS</option>
                            <option value="none">None</option>
                        </select>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testStatus): ?>
                    <div class="p-3 rounded-xl text-sm <?php echo e(str_starts_with($testStatus, 'success') ? 'bg-success/10 text-success border border-success/20' : 'bg-danger/10 text-danger border border-danger/20'); ?>">
                        <?php echo e($testStatus === 'success' ? __('Connection successful!') : $testStatus); ?>

                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="flex items-center justify-between pt-2">
                        <button type="button" wire:click="testConnection" class="px-4 py-2 text-sm font-medium text-muted  bg-surface  rounded-xl hover:bg-gray-200 dark:bg-gray-700 transition-colors">
                            <span wire:loading.remove wire:target="testConnection"><?php echo e(__('Test Connection')); ?></span>
                            <span wire:loading wire:target="testConnection" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Testing...
                            </span>
                        </button>
                        <div class="flex items-center gap-3">
                            <button type="button" wire:click="closeAddForm" class="btn-secondary text-sm"><?php echo e(__('Cancel')); ?></button>
                            <button type="submit" class="btn-primary px-4 py-2 text-sm">
                                <span wire:loading.remove wire:target="saveAccount"><?php echo e($editingAccountId ? 'Save Changes' : 'Connect Account'); ?></span>
                                <span wire:loading wire:target="saveAccount" class="inline-flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                    <?php echo e($editingAccountId ? 'Saving...' : 'Connecting...'); ?>

                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/email-account-manager.blade.php ENDPATH**/ ?>