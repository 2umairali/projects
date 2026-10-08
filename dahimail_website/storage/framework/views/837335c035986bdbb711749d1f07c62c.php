<div class="space-y-6">

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('success')); ?></span>
        <button @click="show = false" class="opacity-60 hover:opacity-100">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)"
         class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('error')); ?></span>
        <button @click="show = false" class="opacity-60 hover:opacity-100">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($accounts->isEmpty()): ?>
        <div class="bg-surface-2 border border-border rounded-2xl p-8 text-center">
            <div class="mx-auto w-12 h-12 rounded-xl bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 flex items-center justify-center mb-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-base font-semibold text-ink mb-1"><?php echo e(__('No email accounts connected')); ?></h3>
            <p class="text-sm text-muted mb-4"><?php echo e(__('Connect a Gmail, Outlook, or IMAP account to start using signatures.')); ?></p>
            <a href="<?php echo e(url('/settings/email')); ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <?php echo e(__('Connect email account')); ?>

            </a>
        </div>
    <?php else: ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($accounts->count() > 1): ?>
        <div class="bg-surface-2 border border-border rounded-2xl p-4">
            <label class="block text-xs font-bold uppercase tracking-wider text-muted mb-2"><?php echo e(__('Email account')); ?></label>
            <div class="flex flex-wrap gap-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <button wire:click="selectAccount(<?php echo e($acc->id); ?>)"
                        type="button"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'inline-flex items-center gap-2 px-3 py-2 rounded-xl text-sm font-medium border transition',
                            'bg-primary-50 text-primary-700 border-primary-300 dark:bg-primary-900/20 dark:text-primary-300 dark:border-primary-800' => $selectedAccountId === $acc->id,
                            'bg-surface text-ink border-border hover:bg-surface-2' => $selectedAccountId !== $acc->id,
                        ]); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($acc->provider === 'gmail'): ?>
                        <span class="w-5 h-5 rounded-full bg-red-500 text-white text-[10px] font-bold flex items-center justify-center">G</span>
                    <?php elseif($acc->provider === 'outlook'): ?>
                        <span class="w-5 h-5 rounded-full bg-blue-500 text-white text-[10px] font-bold flex items-center justify-center">O</span>
                    <?php else: ?>
                        <span class="w-5 h-5 rounded-full bg-gray-500 text-white text-[10px] font-bold flex items-center justify-center">@</span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <span><?php echo e($acc->display_name ?: $acc->email); ?></span>
                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <h2 class="text-lg font-bold text-ink"><?php echo e(__('Email Signatures')); ?></h2>
                <p class="text-sm text-muted mt-0.5">
                    <?php echo e(__('Auto-append a signature to emails sent from')); ?>

                    <span class="font-mono text-xs text-ink"><?php echo e($accounts->firstWhere('id', $selectedAccountId)?->email ?? '—'); ?></span>
                </p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$showForm): ?>
            <button wire:click="newSignature" type="button"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <?php echo e(__('New signature')); ?>

            </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showForm): ?>
        <div class="bg-surface-2 border border-border rounded-2xl p-6 space-y-5">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-bold text-ink"><?php echo e($editingId ? __('Edit signature') : __('New signature')); ?></h3>
                <button wire:click="cancelForm" type="button" class="text-muted hover:text-ink transition" aria-label="Close">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-muted mb-1.5"><?php echo e(__('Signature name')); ?></label>
                <input type="text" wire:model="signatureName" placeholder="<?php echo e(__('e.g. Default, Sales, Support…')); ?>"
                       class="w-full px-4 py-2.5 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['signatureName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div x-data="{
                exec(cmd, val=null) { document.execCommand(cmd, false, val); this.sync(); },
                sync() {
                    const el = this.$refs.editor;
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('contentHtml', el.innerHTML, false);
                },
                seedOnce() {
                    if (!this.$refs.editor.dataset.seeded) {
                        this.$refs.editor.innerHTML = <?php echo \Illuminate\Support\Js::from($contentHtml)->toHtml() ?>;
                        this.$refs.editor.dataset.seeded = '1';
                    }
                }
            }" x-init="seedOnce()">
                <label class="block text-xs font-bold uppercase tracking-wider text-muted mb-1.5"><?php echo e(__('Signature content')); ?></label>

                
                <div class="flex flex-wrap items-center gap-1 px-2 py-1.5 bg-surface border border-border rounded-t-xl border-b-0">
                    <button @click.prevent="exec('bold')" type="button" title="Bold" class="w-8 h-8 rounded-lg hover:bg-surface-2 text-ink font-bold">B</button>
                    <button @click.prevent="exec('italic')" type="button" title="Italic" class="w-8 h-8 rounded-lg hover:bg-surface-2 text-ink italic">I</button>
                    <button @click.prevent="exec('underline')" type="button" title="Underline" class="w-8 h-8 rounded-lg hover:bg-surface-2 text-ink underline">U</button>
                    <span class="w-px h-5 bg-border mx-1"></span>
                    <button @click.prevent="exec('insertUnorderedList')" type="button" title="Bulleted list" class="w-8 h-8 rounded-lg hover:bg-surface-2 text-ink flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <button @click.prevent="exec('createLink', prompt('<?php echo e(__('Link URL:')); ?>', 'https://'))" type="button" title="Link" class="w-8 h-8 rounded-lg hover:bg-surface-2 text-ink flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    </button>
                    <button @click.prevent="exec('insertImage', prompt('<?php echo e(__('Image URL:')); ?>', 'https://'))" type="button" title="Image" class="w-8 h-8 rounded-lg hover:bg-surface-2 text-ink flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4-4 4 4 4-4 4 4M4 4h16v16H4V4z"/></svg>
                    </button>
                    <span class="w-px h-5 bg-border mx-1"></span>
                    <button @click.prevent="exec('removeFormat')" type="button" title="Clear formatting" class="px-2 h-8 rounded-lg hover:bg-surface-2 text-xs font-medium text-muted"><?php echo e(__('Clear')); ?></button>
                </div>

                
                <div x-ref="editor"
                     contenteditable="true"
                     @input="sync"
                     @blur="sync"
                     class="w-full min-h-[180px] p-4 bg-surface border border-border rounded-b-xl text-sm text-ink focus:outline-none focus:ring-2 focus:ring-primary-500 prose prose-sm max-w-none dark:prose-invert"
                     style="word-break: break-word;"></div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['contentHtml'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <p class="text-xs text-muted mt-1.5"><?php echo e(__('Tip: paste an HTML signature from your existing email client and it will render exactly as it does today.')); ?></p>
            </div>

            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <label class="flex items-start gap-3 p-3 bg-surface border border-border rounded-xl cursor-pointer hover:border-primary-300 transition">
                    <input type="checkbox" wire:model="isDefault"
                           class="mt-0.5 h-4 w-4 rounded border-border text-primary-600 focus:ring-primary-500">
                    <span class="flex-1">
                        <span class="block text-sm font-semibold text-ink"><?php echo e(__('Default signature')); ?></span>
                        <span class="block text-xs text-muted mt-0.5"><?php echo e(__('Use this signature on outgoing email by default.')); ?></span>
                    </span>
                </label>
                <label class="flex items-start gap-3 p-3 bg-surface border border-border rounded-xl cursor-pointer hover:border-primary-300 transition">
                    <input type="checkbox" wire:model="appendToNew"
                           class="mt-0.5 h-4 w-4 rounded border-border text-primary-600 focus:ring-primary-500">
                    <span class="flex-1">
                        <span class="block text-sm font-semibold text-ink"><?php echo e(__('Append on new emails')); ?></span>
                        <span class="block text-xs text-muted mt-0.5"><?php echo e(__('Auto-add when sending a brand-new email.')); ?></span>
                    </span>
                </label>
                <label class="flex items-start gap-3 p-3 bg-surface border border-border rounded-xl cursor-pointer hover:border-primary-300 transition">
                    <input type="checkbox" wire:model="appendToReplies"
                           class="mt-0.5 h-4 w-4 rounded border-border text-primary-600 focus:ring-primary-500">
                    <span class="flex-1">
                        <span class="block text-sm font-semibold text-ink"><?php echo e(__('Append on replies')); ?></span>
                        <span class="block text-xs text-muted mt-0.5"><?php echo e(__('Auto-add when replying to a thread.')); ?></span>
                    </span>
                </label>
            </div>

            
            <div class="flex items-center justify-end gap-2 pt-2">
                <button wire:click="cancelForm" type="button"
                        class="px-4 py-2 text-sm font-semibold text-muted hover:text-ink transition">
                    <?php echo e(__('Cancel')); ?>

                </button>
                <button wire:click="save" type="button"
                        wire:loading.attr="disabled"
                        wire:target="save"
                        class="inline-flex items-center gap-2 px-5 py-2 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition disabled:opacity-60 disabled:cursor-wait">
                    <svg wire:loading.remove wire:target="save" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <svg wire:loading wire:target="save" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" opacity="0.25"/><path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    <?php echo e($editingId ? __('Save changes') : __('Create signature')); ?>

                </button>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$showForm): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($signatures->isEmpty()): ?>
                <div class="bg-surface-2 border border-border border-dashed rounded-2xl p-8 text-center">
                    <div class="mx-auto w-12 h-12 rounded-xl bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <h3 class="text-base font-semibold text-ink mb-1"><?php echo e(__('No signatures yet')); ?></h3>
                    <p class="text-sm text-muted mb-4"><?php echo e(__('Create one to auto-append it to every email this account sends.')); ?></p>
                    <button wire:click="newSignature" type="button"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        <?php echo e(__('Create your first signature')); ?>

                    </button>
                </div>
            <?php else: ?>
                <div class="space-y-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $signatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="bg-surface-2 border <?php if($sig->is_default): ?> border-primary-300 dark:border-primary-700 ring-1 ring-primary-200 dark:ring-primary-900 <?php else: ?> border-border <?php endif; ?> rounded-2xl p-5">
                        <div class="flex items-start justify-between gap-4">
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <h3 class="text-sm font-bold text-ink truncate"><?php echo e($sig->name); ?></h3>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sig->is_default): ?>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 1l2.6 5.5 6 .9-4.3 4.4 1 6.2L10 15.3l-5.3 2.7 1-6.2-4.3-4.4 6-.9z" clip-rule="evenodd"/></svg>
                                        <?php echo e(__('Default')); ?>

                                    </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <div class="flex items-center gap-3 text-xs text-muted">
                                    <span class="inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full <?php echo e($sig->append_to_new ? 'bg-emerald-500' : 'bg-gray-400'); ?>"></span>
                                        <?php echo e(__('New emails')); ?>: <?php echo e($sig->append_to_new ? __('On') : __('Off')); ?>

                                    </span>
                                    <span class="text-border">|</span>
                                    <span class="inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full <?php echo e($sig->append_to_replies ? 'bg-emerald-500' : 'bg-gray-400'); ?>"></span>
                                        <?php echo e(__('Replies')); ?>: <?php echo e($sig->append_to_replies ? __('On') : __('Off')); ?>

                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-1 flex-shrink-0">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$sig->is_default): ?>
                                <button wire:click="setDefault(<?php echo e($sig->id); ?>)" type="button"
                                        class="p-2 text-muted hover:text-ink hover:bg-surface rounded-lg transition" title="<?php echo e(__('Set as default')); ?>">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                </button>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <button wire:click="editSignature(<?php echo e($sig->id); ?>)" type="button"
                                        class="p-2 text-muted hover:text-primary-600 hover:bg-surface rounded-lg transition" title="<?php echo e(__('Edit')); ?>">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </button>
                                <button wire:click="deleteSignature(<?php echo e($sig->id); ?>)" type="button"
                                        wire:confirm="<?php echo e(__('Delete this signature? This cannot be undone.')); ?>"
                                        class="p-2 text-muted hover:text-red-600 hover:bg-surface rounded-lg transition" title="<?php echo e(__('Delete')); ?>">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/></svg>
                                </button>
                            </div>
                        </div>

                        
                        <div class="mt-4 p-3 bg-surface border border-border rounded-xl">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-muted mb-2"><?php echo e(__('Preview')); ?></div>
                            <div class="prose prose-sm max-w-none dark:prose-invert text-sm">
                                <?php echo $sig->content_html; ?>

                            </div>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/email-signature-manager.blade.php ENDPATH**/ ?>