<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Auto-Reply Rules')); ?></h1>
            <p class="text-sm text-muted mt-1"><?php echo e(__('Set up keyword-based auto-replies for incoming messages. Rules are checked before AI auto-reply.')); ?></p>
        </div>
        <button wire:click="openForm"
                class="px-4 py-2.5 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
            <?php echo e(__('New Rule')); ?>

        </button>
    </div>

    
    <div class="bg-surface-2 rounded-2xl border border-border p-5">
        <h3 class="text-sm font-semibold text-ink mb-2"><?php echo e(__('Test Your Rules')); ?></h3>
        <p class="text-xs text-muted mb-3"><?php echo e(__('Enter a sample message to see which rule would match.')); ?></p>
        <div class="flex gap-3">
            <input type="text" wire:model="testInput" wire:keydown.enter="testRules"
                   class="flex-1 px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 bg-surface"
                   placeholder="<?php echo e(__("Type a test message, e.g. 'I need help with pricing'")); ?>">
            <button wire:click="testRules" class="px-4 py-2.5 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors shrink-0">
                Test
            </button>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testResult): ?>
        <?php
            $isMatched = str_contains($testResult, 'Matched');
            $resultClass = $isMatched ? 'text-success border border-success/20' : 'text-muted border border-border';
        ?>
        <div class="mt-3 p-3 bg-surface rounded-xl text-sm <?php echo e($resultClass); ?>">
            <?php echo e($testResult); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rules->isEmpty()): ?>
    <div class="bg-surface-2 rounded-2xl border border-border p-10 text-center">
        <div class="w-14 h-14 bg-brand/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-7 h-7 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                <path d="M13 8H7M17 12H7"/>
            </svg>
        </div>
        <h3 class="text-sm font-semibold text-ink"><?php echo e(__('No auto-reply rules yet')); ?></h3>
        <p class="text-xs text-muted mt-1 max-w-sm mx-auto"><?php echo e(__('Create your first rule to automatically reply to messages that contain specific keywords.')); ?></p>
        <button wire:click="openForm"
                class="mt-4 px-4 py-2 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors">
            <?php echo e(__('Create First Rule')); ?>

        </button>
    </div>
    <?php else: ?>
    <div class="space-y-3">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <div class="bg-surface-2 rounded-2xl border border-border p-5 hover:shadow-md transition-all duration-200">
            <div class="flex items-start justify-between gap-4">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="text-sm font-semibold text-ink truncate"><?php echo e($rule->name); ?></h3>
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium <?php echo e($rule->is_active ? 'text-success' : 'text-muted'); ?>">
                            <span class="w-2 h-2 rounded-full <?php echo e($rule->is_active ? 'bg-success' : 'bg-gray-300'); ?>"></span>
                            <?php echo e($rule->is_active ? 'Active' : 'Inactive'); ?>

                        </span>
                    </div>

                    <div class="flex flex-wrap gap-1.5 mt-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $rule->keywords ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium bg-brand/10 text-brand rounded-lg"><?php echo e($kw); ?></span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>

                    <div class="flex items-center gap-4 mt-3 text-xs text-muted">
                        <span class="capitalize"><?php echo e(__('Match:')); ?> <?php echo e($rule->match_type); ?></span>
                        <span class="capitalize"><?php echo e(__('Channel:')); ?> <?php echo e($rule->channel); ?></span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rule->first_message_only): ?>
                        <span><?php echo e(__('First message only')); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span><?php echo e(__('Priority:')); ?> <?php echo e($rule->priority); ?></span>
                        <span><?php echo e(__('Used')); ?> <?php echo e(number_format($rule->usage_count)); ?> <?php echo e(Str::plural('time', $rule->usage_count)); ?></span>
                    </div>
                </div>

                <div class="flex items-center gap-2 flex-shrink-0">
                    
                    <button wire:click="toggleActive(<?php echo e($rule->id); ?>)" type="button"
                            class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors <?php echo e($rule->is_active ? 'bg-brand' : 'bg-gray-200 dark:bg-gray-700'); ?>"
                            title="<?php echo e($rule->is_active ? 'Deactivate' : 'Activate'); ?>">
                        <span class="inline-block h-4 w-4 rounded-full bg-surface-2 shadow transition-transform <?php echo e($rule->is_active ? 'translate-x-6' : 'translate-x-1'); ?>"></span>
                    </button>

                    
                    <button wire:click="openForm(<?php echo e($rule->id); ?>)"
                            class="p-2 text-muted hover:text-ink rounded-lg hover:bg-surface transition-colors"
                            :title="__('Edit rule')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </button>

                    
                    <button wire:click="delete(<?php echo e($rule->id); ?>)"
                            wire:confirm="<?php echo e(__('Delete this auto-reply rule?')); ?>"
                            class="p-2 text-muted hover:text-danger rounded-lg hover:bg-danger/10 transition-colors"
                            :title="__('Delete rule')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showForm): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="auto-reply-rule-modal-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-surface/50 backdrop-blur-sm" wire:click="closeForm"></div>
            <div class="relative bg-surface-2 rounded-2xl shadow-xl max-w-lg w-full p-6 max-h-[90vh] overflow-y-auto" x-trap="$wire.showForm">

                <div class="flex items-center justify-between mb-5">
                    <h2 id="auto-reply-rule-modal-title" class="text-lg font-semibold text-ink">
                        <?php echo e($editingId ? 'Edit Rule' : 'New Auto-Reply Rule'); ?>

                    </h2>
                    <button wire:click="closeForm" class="p-2 text-muted hover:text-ink rounded-lg hover:bg-surface transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="space-y-4">
                    
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Rule Name')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="name"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="<?php echo e(__('e.g. Pricing inquiry')); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Keywords')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="keywordsInput"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="<?php echo e(__('price, pricing, cost, how much')); ?>">
                        <p class="text-xs text-muted mt-1"><?php echo e(__('Comma-separated. Case-insensitive matching.')); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['keywordsInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Match Type')); ?></label>
                        <select wire:model="matchType"
                                class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface">
                            <option value="any"><?php echo e(__('Any keyword (OR)')); ?></option>
                            <option value="all"><?php echo e(__('All keywords (AND)')); ?></option>
                            <option value="exact"><?php echo e(__('Exact phrase match')); ?></option>
                        </select>
                        <p class="text-xs text-muted mt-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($matchType === 'any'): ?> <?php echo e(__('Triggers if the message contains')); ?> <strong><?php echo e(__('any')); ?></strong> <?php echo e(__('of the keywords.')); ?>

                            <?php elseif($matchType === 'all'): ?> <?php echo e(__('Triggers only if the message contains')); ?> <strong><?php echo e(__('all')); ?></strong> <?php echo e(__('keywords.')); ?>

                            <?php else: ?> <?php echo e(__('Triggers only if the full message text exactly equals one of the keywords.')); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </p>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Channel')); ?></label>
                        <select wire:model="channel"
                                class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface">
                            <option value="all"><?php echo e(__('All Channels')); ?></option>
                            <option value="email"><?php echo e(__('Email only')); ?></option>
                            <option value="whatsapp"><?php echo e(__('WhatsApp only')); ?></option>
                            <option value="sms"><?php echo e(__('SMS only')); ?></option>
                            <option value="chat"><?php echo e(__('Live Chat only')); ?></option>
                            <option value="telegram"><?php echo e(__('Telegram only')); ?></option>
                        </select>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Reply Subject')); ?> <span class="text-xs text-muted"><?php echo e(__('(optional)')); ?></span></label>
                        <input type="text" wire:model="replySubject"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="<?php echo e(__("Leave empty to use 'Re: original subject'")); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['replySubject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Reply Body')); ?> <span class="text-red-500">*</span></label>
                        <textarea wire:model="replyBody" rows="6"
                                  class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                                  placeholder="<?php echo e(__('Hi there! Thank you for your inquiry about pricing...')); ?>"></textarea>
                        <p class="text-xs text-muted mt-1"><?php echo e(__('HTML is supported for email replies.')); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['replyBody'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Priority')); ?></label>
                        <input type="number" wire:model="priority" min="0" max="999"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface"
                               placeholder="0">
                        <p class="text-xs text-muted mt-1"><?php echo e(__('Higher priority rules are checked first. Default is 0.')); ?></p>
                    </div>

                    
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-surface rounded-xl">
                            <div>
                                <span class="text-sm text-ink/80"><?php echo e(__('Active')); ?></span>
                                <p class="text-xs text-muted mt-0.5"><?php echo e(__('Enable or disable this rule')); ?></p>
                            </div>
                            <button wire:click="$toggle('isActive')" type="button"
                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors <?php echo e($isActive ? 'bg-brand' : 'bg-gray-200 dark:bg-gray-700'); ?>">
                                <span class="inline-block h-4 w-4 rounded-full bg-surface-2 shadow transition-transform <?php echo e($isActive ? 'translate-x-6' : 'translate-x-1'); ?>"></span>
                            </button>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-surface rounded-xl">
                            <div>
                                <span class="text-sm text-ink/80"><?php echo e(__('First message only')); ?></span>
                                <p class="text-xs text-muted mt-0.5"><?php echo e(__('Only trigger on the first inbound message in a conversation')); ?></p>
                            </div>
                            <button wire:click="$toggle('firstMessageOnly')" type="button"
                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors <?php echo e($firstMessageOnly ? 'bg-brand' : 'bg-gray-200 dark:bg-gray-700'); ?>">
                                <span class="inline-block h-4 w-4 rounded-full bg-surface-2 shadow transition-transform <?php echo e($firstMessageOnly ? 'translate-x-6' : 'translate-x-1'); ?>"></span>
                            </button>
                        </div>
                    </div>
                </div>

                
                <div class="flex items-center justify-end gap-3 mt-6 pt-4 border-t border-border">
                    <button wire:click="closeForm" class="px-4 py-2.5 text-sm font-medium text-muted hover:text-ink"><?php echo e(__('Cancel')); ?></button>
                    <button wire:click="save" class="px-6 py-2.5 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors">
                        <span wire:loading.remove wire:target="save"><?php echo e($editingId ? 'Update Rule' : 'Create Rule'); ?></span>
                        <span wire:loading wire:target="save" class="inline-flex items-center gap-2">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                            Saving...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/auto-reply-rules.blade.php ENDPATH**/ ?>