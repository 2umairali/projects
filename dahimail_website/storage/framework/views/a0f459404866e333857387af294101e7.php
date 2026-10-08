<div
    x-data="emailBuilder()"
    x-on:keydown.escape.window="$wire.selectedBlockIndex = -1"
    x-init="
        window.addEventListener('beforeunload', (e) => {
            if ($wire.hasUnsavedChanges) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    "
    class="flex flex-col h-full"
>
    
    <div class="flex items-center justify-between px-4 py-3 bg-surface-2 border-b border-border shrink-0">
        <div class="flex items-center gap-3">
            <button
                wire:click="$dispatch('builder-close')"
                class="p-1.5 text-muted/60 hover:text-ink rounded-lg hover:bg-surface transition-colors"
                :title="__('Close builder')"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="h-6 w-px bg-gray-200 dark:bg-gray-700"></div>
            <div class="flex items-center gap-2">
                <input
                    type="text"
                    wire:model="templateName"
                    placeholder="<?php echo e(__('Untitled Template')); ?>"
                    class="text-sm font-semibold text-ink bg-transparent border-0 border-b border-transparent hover:border-border focus:border-primary-500 focus:ring-0 px-1 py-0.5 w-48 transition-colors"
                >
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['templateName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-xs text-red-500"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div wire:poll.30s="autoSave" class="flex items-center gap-2 text-xs text-muted ml-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lastSavedAt): ?>
                    <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span><?php echo e(__('Saved at')); ?> <?php echo e($lastSavedAt); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasUnsavedChanges): ?>
                    <span class="text-amber-500 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                        <?php echo e(__('Unsaved changes')); ?>

                    </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <div class="flex items-center gap-2">
            
            <div x-data="{ open: false }" class="relative">
                <button
                    @click="open = !open"
                    class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-ink/80 bg-surface-2 border border-border rounded-xl hover:bg-surface transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                    </svg>
                    <?php echo e(__('Templates')); ?>

                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-64 bg-surface-2 rounded-xl border border-border shadow-lg z-50 py-1 max-h-80 overflow-y-auto"
                >
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($savedTemplates->isEmpty()): ?>
                        <p class="px-4 py-3 text-sm text-muted"><?php echo e(__('No templates yet.')); ?></p>
                    <?php else: ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $savedTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tpl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <button
                                wire:click="loadTemplate(<?php echo e($tpl->id); ?>)"
                                @click="open = false"
                                class="w-full text-left px-4 py-2.5 text-sm hover:bg-surface flex items-center justify-between group transition-colors"
                            >
                                <div class="min-w-0">
                                    <p class="font-medium text-ink truncate"><?php echo e($tpl->name); ?></p>
                                    <p class="text-xs text-muted">
                                        <?php echo e(count($tpl->blocks ?? [])); ?> blocks
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tpl->is_default): ?>
                                            <span class="ml-1 text-primary-600 font-medium"><?php echo e(__('Default')); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </p>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($templateId === $tpl->id): ?>
                                    <svg class="w-4 h-4 text-primary-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <button
                wire:click="saveAsTemplate"
                class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-ink/80 bg-surface-2 border border-border rounded-xl hover:bg-surface transition-colors"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                </svg>
                <?php echo e(__('Save')); ?>

            </button>

            
            <button
                wire:click="$toggle('showPreview')"
                class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium rounded-xl transition-colors <?php echo e($showPreview ? 'text-primary-700 dark:text-primary-300 bg-primary-50 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800' : 'text-ink/80 bg-surface-2 border border-border hover:bg-surface'); ?>"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <?php echo e(__('Preview')); ?>

            </button>

            
            <button
                wire:click="useInCampaign"
                class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-xl hover:bg-primary-700 transition-colors"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <?php echo e(__('Use in Campaign')); ?>

            </button>
        </div>
    </div>

    
    <div class="flex flex-1 min-h-0">

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showPreview): ?>
            <div class="flex-1 bg-surface  p-6 overflow-auto">
                <div class="max-w-3xl mx-auto">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-ink/80"><?php echo e(__('Email Preview')); ?></h3>
                        <div class="flex items-center gap-2">
                            <button
                                @click="previewDevice = 'desktop'"
                                :class="previewDevice === 'desktop' ? 'bg-surface-2 shadow-sm text-ink' : 'text-muted hover:text-ink/80'"
                                class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            ><?php echo e(__('Desktop')); ?></button>
                            <button
                                @click="previewDevice = 'mobile'"
                                :class="previewDevice === 'mobile' ? 'bg-surface-2 shadow-sm text-ink' : 'text-muted hover:text-ink/80'"
                                class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            ><?php echo e(__('Mobile')); ?></button>
                        </div>
                    </div>
                    <div
                        class="bg-surface-2 rounded-xl border border-border shadow-sm overflow-hidden mx-auto transition-all duration-300"
                        :style="previewDevice === 'mobile' ? 'max-width: 375px' : 'max-width: 700px'"
                    >
                        
                        <iframe
                            srcdoc="<?php echo e($this->previewHtml); ?>"
                            class="w-full border-0"
                            style="min-height: 600px;"
                            sandbox="allow-same-origin"
                            title="Email preview"
                        ></iframe>
                    </div>
                </div>
            </div>
        <?php else: ?>

        
        <div class="w-60 bg-surface-2 border-r border-border flex flex-col shrink-0 overflow-y-auto">
            <div class="p-4 border-b border-border">
                <h3 class="text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Content Blocks')); ?></h3>
            </div>
            <div class="p-3 space-y-1.5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->availableBlockTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div
                        draggable="true"
                        @dragstart="handlePaletteDragStart($event, '<?php echo e($type); ?>')"
                        @dragend="handleDragEnd($event)"
                        wire:click="addBlock('<?php echo e($type); ?>')"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-grab active:cursor-grabbing hover:bg-surface border border-transparent hover:border-border transition-all group select-none"
                    >
                        <div class="w-8 h-8 rounded-lg bg-surface  flex items-center justify-center text-muted group-hover:bg-primary-50 dark:group-hover:bg-primary-900/20 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors shrink-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($type):
                                case ('header'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                                    <?php break; ?>
                                <?php case ('text'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h10M4 18h7"/></svg>
                                    <?php break; ?>
                                <?php case ('image'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <?php break; ?>
                                <?php case ('button'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                                    <?php break; ?>
                                <?php case ('divider'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                    <?php break; ?>
                                <?php case ('columns'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 4v16M15 4v16M4 4h16v16H4z"/></svg>
                                    <?php break; ?>
                                <?php case ('spacer'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 4h-4m4 0l-5-5"/></svg>
                                    <?php break; ?>
                                <?php case ('social'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8a3 3 0 100-6 3 3 0 000 6zM6 15a3 3 0 100-6 3 3 0 000 6zM18 22a3 3 0 100-6 3 3 0 000 6zM8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98"/></svg>
                                    <?php break; ?>
                                <?php case ('footer'): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2zM3 17h18"/></svg>
                                    <?php break; ?>
                            <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-ink/80"><?php echo e($config['label']); ?></p>
                        </div>
                        <svg class="w-4 h-4 text-muted/50 ml-auto opacity-0 group-hover:opacity-100 transition-opacity shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            
            <div class="mt-auto p-4 border-t border-border">
                <h4 class="text-xs font-semibold text-muted uppercase tracking-wider mb-2"><?php echo e(__('Merge Tags')); ?></h4>
                <div class="flex flex-wrap gap-1.5">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['{first_name}', '{last_name}', '{email}', '{company}']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <button
                            @click="navigator.clipboard.writeText('<?php echo e($tag); ?>'); $dispatch('notify', { message: 'Copied!' })"
                            class="px-2 py-1 text-xs font-mono bg-surface  text-muted  rounded-md hover:bg-primary-50 dark:hover:bg-primary-900/20 hover:text-primary-700 dark:hover:text-primary-300 transition-colors cursor-pointer"
                            :title="__('Click to copy')"
                        ><?php echo e($tag); ?></button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </div>

        
        <div
            class="flex-1 bg-surface  overflow-y-auto"
            @dragover.prevent="handleCanvasDragOver($event)"
            @drop.prevent="handleCanvasDrop($event)"
        >
            <div class="max-w-xl mx-auto py-6 px-4">
                
                <div class="text-center mb-4">
                    <p class="text-xs font-medium text-muted uppercase tracking-wider">600px Email Canvas</p>
                </div>

                
                <div
                    class="bg-surface-2 rounded-xl border border-border shadow-sm min-h-[400px] relative"
                    :class="{ 'ring-2 ring-primary-300 ring-offset-2': dragOverCanvas }"
                >
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(empty($blocks)): ?>
                        
                        <div
                            class="flex flex-col items-center justify-center py-20 px-8"
                            @dragover.prevent="dragOverCanvas = true"
                            @dragleave="dragOverCanvas = false"
                        >
                            <div class="w-16 h-16 bg-surface  rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-ink mb-1"><?php echo e(__('Start building your email')); ?></p>
                            <p class="text-xs text-muted text-center max-w-xs"><?php echo e(__('Drag blocks from the left panel or click them to add content to your email.')); ?></p>
                        </div>
                    <?php else: ?>
                        
                        <div class="divide-y divide-border/60">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!isset($block['type'])): ?> <?php continue; ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <div
                                    class="h-1 transition-all duration-150 relative"
                                    :class="dropTarget === <?php echo e($index); ?> ? 'h-3 bg-primary-100 dark:bg-primary-900/30' : ''"
                                    @dragover.prevent="handleBlockDragOver($event, <?php echo e($index); ?>)"
                                    @dragleave="clearDropTarget()"
                                    @drop.prevent="handleBlockDrop($event, <?php echo e($index); ?>)"
                                >
                                    <div
                                        x-show="dropTarget === <?php echo e($index); ?>"
                                        class="absolute inset-x-4 top-1/2 -translate-y-1/2 h-0.5 bg-primary-500 rounded-full"
                                    ></div>
                                </div>

                                
                                <div
                                    draggable="true"
                                    @dragstart="handleBlockDragStart($event, <?php echo e($index); ?>)"
                                    @dragend="handleDragEnd($event)"
                                    @click="$wire.selectBlock(<?php echo e($index); ?>)"
                                    class="relative group transition-all duration-150 cursor-pointer"
                                    :class="{
                                        'ring-2 ring-primary-500 ring-inset z-10': <?php echo e($selectedBlockIndex === $index ? 'true' : 'false'); ?>,
                                        'opacity-50': draggingBlockIndex === <?php echo e($index); ?>

                                    }"
                                >
                                    
                                    <div class="px-6 py-4">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($block['type']):
                                            case ('header'): ?>
                                                <div class="rounded-lg overflow-hidden" style="background-color: <?php echo e($block['data']['bg_color'] ?? '#4F46E5'); ?>">
                                                    <div class="px-6 py-4 text-center">
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($block['data']['logo_url'])): ?>
                                                            <img src="<?php echo e($block['data']['logo_url']); ?>" alt="Logo" class="w-8 h-8 rounded-md inline-block align-middle mr-2">
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                        <span class="text-white font-bold text-lg align-middle"><?php echo e($block['data']['company_name'] ?? '{company}'); ?></span>
                                                    </div>
                                                </div>
                                                <?php break; ?>

                                            <?php case ('text'): ?>
                                                <div class="prose prose-sm max-w-none text-ink/80" style="text-align: <?php echo e($block['data']['align'] ?? 'left'); ?>; font-size: <?php echo e($block['data']['font_size'] ?? 16); ?>px;">
                                                    <?php echo \App\Helpers\HtmlSanitizer::sanitize($block['data']['content'] ?? '<p>Enter text...</p>'); ?>

                                                </div>
                                                <?php break; ?>

                                            <?php case ('image'): ?>
                                                <div class="text-center">
                                                    <img
                                                        src="<?php echo e($block['data']['src'] ?? 'https://placehold.co/600x200'); ?>"
                                                        alt="<?php echo e($block['data']['alt'] ?? ''); ?>"
                                                        class="max-w-full h-auto rounded-md mx-auto"
                                                        style="width: <?php echo e($block['data']['width'] ?? 100); ?>%"
                                                    >
                                                </div>
                                                <?php break; ?>

                                            <?php case ('button'): ?>
                                                <div style="text-align: <?php echo e($block['data']['align'] ?? 'center'); ?>">
                                                    <span
                                                        class="inline-block px-8 py-3 rounded-lg text-sm font-semibold"
                                                        style="background-color: <?php echo e($block['data']['bg_color'] ?? '#4F46E5'); ?>; color: <?php echo e($block['data']['text_color'] ?? '#FFFFFF'); ?>"
                                                    ><?php echo e($block['data']['text'] ?? __('Click Here')); ?></span>
                                                </div>
                                                <?php break; ?>

                                            <?php case ('divider'): ?>
                                                <div class="py-2" style="text-align: center;">
                                                    <hr style="border: none; border-top: 1px <?php echo e($block['data']['style'] ?? 'solid'); ?> <?php echo e($block['data']['color'] ?? '#E5E7EB'); ?>; width: <?php echo e($block['data']['width'] ?? 100); ?>%; display: inline-block;">
                                                </div>
                                                <?php break; ?>

                                            <?php case ('columns'): ?>
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div class="prose prose-sm max-w-none text-ink/80 p-3 bg-surface rounded-lg">
                                                        <?php echo \App\Helpers\HtmlSanitizer::sanitize($block['data']['left_content'] ?? '<p>Left column</p>'); ?>

                                                    </div>
                                                    <div class="prose prose-sm max-w-none text-ink/80 p-3 bg-surface rounded-lg">
                                                        <?php echo \App\Helpers\HtmlSanitizer::sanitize($block['data']['right_content'] ?? '<p>Right column</p>'); ?>

                                                    </div>
                                                </div>
                                                <?php break; ?>

                                            <?php case ('spacer'): ?>
                                                <div class="flex items-center justify-center text-muted" style="height: <?php echo e(min($block['data']['height'] ?? 30, 120)); ?>px">
                                                    <span class="text-xs border border-dashed border-border px-2 py-0.5 rounded"><?php echo e($block['data']['height'] ?? 30); ?>px spacer</span>
                                                </div>
                                                <?php break; ?>

                                            <?php case ('social'): ?>
                                                <div class="flex items-center justify-center gap-2">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($block['data']['links'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                                        <?php
                                                            $colors = ['twitter'=>'#1DA1F2','linkedin'=>'#0A66C2','facebook'=>'#1877F2','instagram'=>'#E4405F','youtube'=>'#FF0000','github'=>'#333'];
                                                            $color = $colors[$link['platform'] ?? ''] ?? '#64748B';
                                                        ?>
                                                        <span
                                                            class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-bold"
                                                            style="background-color: <?php echo e($color); ?>"
                                                        ><?php echo e(strtoupper(substr($link['platform'] ?? '?', 0, 1))); ?></span>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                </div>
                                                <?php break; ?>

                                            <?php case ('footer'): ?>
                                                <div class="text-center py-2 bg-surface rounded-lg">
                                                    <p class="text-xs text-muted"><?php echo e($block['data']['text'] ?? ''); ?></p>
                                                    <p class="text-xs text-primary-600 mt-1"><?php echo e($block['data']['unsubscribe_text'] ?? __('Unsubscribe')); ?></p>
                                                </div>
                                                <?php break; ?>
                                        <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>

                                    
                                    <div
                                        class="absolute inset-0 bg-primary-500/5 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"
                                        :class="{ 'opacity-100': <?php echo e($selectedBlockIndex === $index ? 'true' : 'false'); ?> }"
                                    ></div>

                                    
                                    <div class="absolute top-1 left-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <span class="text-[10px] font-semibold text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20 px-1.5 py-0.5 rounded"><?php echo e(strtoupper($block['type'])); ?></span>
                                    </div>

                                    
                                    <div class="absolute top-1 right-2 flex items-center gap-0.5 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index > 0): ?>
                                            <button
                                                wire:click.stop="moveBlock(<?php echo e($index); ?>, <?php echo e($index - 1); ?>)"
                                                class="p-1 text-muted hover:text-ink/80 hover:bg-surface rounded transition-colors"
                                                :title="__('Move up')"
                                            >
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                                            </button>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index < count($blocks) - 1): ?>
                                            <button
                                                wire:click.stop="moveBlock(<?php echo e($index); ?>, <?php echo e($index + 1); ?>)"
                                                class="p-1 text-muted hover:text-ink/80 hover:bg-surface rounded transition-colors"
                                                :title="__('Move down')"
                                            >
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                            </button>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <button
                                            wire:click.stop="duplicateBlock(<?php echo e($index); ?>)"
                                            class="p-1 text-muted hover:text-ink/80 hover:bg-surface rounded transition-colors"
                                            :title="__('Duplicate')"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/></svg>
                                        </button>
                                        <button
                                            wire:click.stop="removeBlock(<?php echo e($index); ?>)"
                                            class="p-1 text-muted hover:text-danger hover:bg-danger/10 rounded transition-colors"
                                            :title="__('Delete')"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </div>

                                    
                                    <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 opacity-0 group-hover:opacity-100 transition-opacity cursor-grab active:cursor-grabbing">
                                        <div class="w-6 h-8 bg-surface-2 border border-border rounded-md shadow-sm flex items-center justify-center text-muted">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><circle cx="7" cy="4" r="1.5"/><circle cx="13" cy="4" r="1.5"/><circle cx="7" cy="10" r="1.5"/><circle cx="13" cy="10" r="1.5"/><circle cx="7" cy="16" r="1.5"/><circle cx="13" cy="16" r="1.5"/></svg>
                                        </div>
                                    </div>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                            
                            <div
                                class="h-3 transition-all duration-150 relative"
                                :class="dropTarget === <?php echo e(count($blocks)); ?> ? 'h-4 bg-primary-100 dark:bg-primary-900/30' : ''"
                                @dragover.prevent="handleBlockDragOver($event, <?php echo e(count($blocks)); ?>)"
                                @dragleave="clearDropTarget()"
                                @drop.prevent="handleBlockDrop($event, <?php echo e(count($blocks)); ?>)"
                            >
                                <div
                                    x-show="dropTarget === <?php echo e(count($blocks)); ?>"
                                    class="absolute inset-x-4 top-1/2 -translate-y-1/2 h-0.5 bg-primary-500 rounded-full"
                                ></div>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="w-72 bg-surface-2 border-l border-border overflow-y-auto shrink-0">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedBlockIndex >= 0 && isset($blocks[$selectedBlockIndex]) && isset($blocks[$selectedBlockIndex]['type'])): ?>
                <?php $block = $blocks[$selectedBlockIndex]; ?>
                <div class="p-4 border-b border-border">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-ink"><?php echo e(ucfirst($block['type'])); ?> <?php echo e(__('Settings')); ?></h3>
                        <button
                            wire:click="$set('selectedBlockIndex', -1)"
                            class="p-1 text-muted hover:text-muted  rounded transition-colors"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>

                <div class="p-4 space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($block['type']):
                        case ('header'): ?>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Company Name')); ?></label>
                                <input
                                    type="text"
                                    wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.company_name"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Logo URL')); ?></label>
                                <input
                                    type="url"
                                    wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.logo_url"
                                    placeholder="https://example.com/logo.png"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Background Color')); ?></label>
                                <div class="flex items-center gap-2">
                                    <input
                                        type="color"
                                        wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.bg_color"
                                        class="w-8 h-8 rounded-md border border-border cursor-pointer p-0"
                                    >
                                    <input
                                        type="text"
                                        wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.bg_color"
                                        class="flex-1 px-3 py-2 text-sm font-mono border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                    >
                                </div>
                            </div>
                            <?php break; ?>

                        <?php case ('text'): ?>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Content (HTML)')); ?></label>
                                <textarea
                                    wire:model.live.debounce.500ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.content"
                                    rows="8"
                                    class="w-full px-3 py-2 text-sm font-mono border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-y"
                                    placeholder="<p>Your text here...</p>"
                                ></textarea>
                                <p class="text-xs text-muted mt-1"><?php echo e(__('Supports HTML tags and merge tags.')); ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Alignment')); ?></label>
                                <div class="flex items-center gap-1 bg-surface  rounded-lg p-1">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['left', 'center', 'right']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <button
                                            wire:click="$set('blocks.<?php echo e($selectedBlockIndex); ?>.data.align', '<?php echo e($alignment); ?>')"
                                            class="flex-1 py-1.5 text-xs font-medium rounded-md transition-colors <?php echo e(($block['data']['align'] ?? 'left') === $alignment ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted hover:text-ink/80'); ?>"
                                        ><?php echo e(__(ucfirst($alignment))); ?></button>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Font Size (px)')); ?></label>
                                <input
                                    type="number"
                                    wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.font_size"
                                    min="10"
                                    max="32"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <?php break; ?>

                        <?php case ('image'): ?>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Image URL')); ?></label>
                                <input
                                    type="url"
                                    wire:model.live.debounce.500ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.src"
                                    placeholder="https://example.com/image.jpg"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Alt Text')); ?></label>
                                <input
                                    type="text"
                                    wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.alt"
                                    placeholder="Describe the image..."
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Width (%)')); ?></label>
                                <input
                                    type="range"
                                    wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.width"
                                    min="20"
                                    max="100"
                                    step="5"
                                    class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-primary-600"
                                >
                                <p class="text-xs text-muted text-right mt-0.5"><?php echo e($block['data']['width'] ?? 100); ?>%</p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Link URL (optional)')); ?></label>
                                <input
                                    type="url"
                                    wire:model.live.debounce.500ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.link_url"
                                    placeholder="https://example.com"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <?php break; ?>

                        <?php case ('button'): ?>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Button Text')); ?></label>
                                <input
                                    type="text"
                                    wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.text"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Link URL')); ?></label>
                                <input
                                    type="url"
                                    wire:model.live.debounce.500ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.url"
                                    placeholder="https://example.com"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Button Color')); ?></label>
                                <div class="flex items-center gap-2">
                                    <input
                                        type="color"
                                        wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.bg_color"
                                        class="w-8 h-8 rounded-md border border-border cursor-pointer p-0"
                                    >
                                    <input
                                        type="text"
                                        wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.bg_color"
                                        class="flex-1 px-3 py-2 text-sm font-mono border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                    >
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Text Color')); ?></label>
                                <div class="flex items-center gap-2">
                                    <input
                                        type="color"
                                        wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.text_color"
                                        class="w-8 h-8 rounded-md border border-border cursor-pointer p-0"
                                    >
                                    <input
                                        type="text"
                                        wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.text_color"
                                        class="flex-1 px-3 py-2 text-sm font-mono border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                    >
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Alignment')); ?></label>
                                <div class="flex items-center gap-1 bg-surface  rounded-lg p-1">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['left', 'center', 'right']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <button
                                            wire:click="$set('blocks.<?php echo e($selectedBlockIndex); ?>.data.align', '<?php echo e($alignment); ?>')"
                                            class="flex-1 py-1.5 text-xs font-medium rounded-md transition-colors <?php echo e(($block['data']['align'] ?? 'center') === $alignment ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted hover:text-ink/80'); ?>"
                                        ><?php echo e(__(ucfirst($alignment))); ?></button>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                            <?php break; ?>

                        <?php case ('divider'): ?>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Color')); ?></label>
                                <div class="flex items-center gap-2">
                                    <input
                                        type="color"
                                        wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.color"
                                        class="w-8 h-8 rounded-md border border-border cursor-pointer p-0"
                                    >
                                    <input
                                        type="text"
                                        wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.color"
                                        class="flex-1 px-3 py-2 text-sm font-mono border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                    >
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Width (%)')); ?></label>
                                <input
                                    type="range"
                                    wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.width"
                                    min="20"
                                    max="100"
                                    step="5"
                                    class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-primary-600"
                                >
                                <p class="text-xs text-muted text-right mt-0.5"><?php echo e($block['data']['width'] ?? 100); ?>%</p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Style')); ?></label>
                                <select
                                    wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.style"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-surface-2"
                                >
                                    <option value="solid"><?php echo e(__('Solid')); ?></option>
                                    <option value="dashed"><?php echo e(__('Dashed')); ?></option>
                                    <option value="dotted"><?php echo e(__('Dotted')); ?></option>
                                </select>
                            </div>
                            <?php break; ?>

                        <?php case ('columns'): ?>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Left Column (HTML)')); ?></label>
                                <textarea
                                    wire:model.live.debounce.500ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.left_content"
                                    rows="5"
                                    class="w-full px-3 py-2 text-sm font-mono border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-y"
                                ></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Right Column (HTML)')); ?></label>
                                <textarea
                                    wire:model.live.debounce.500ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.right_content"
                                    rows="5"
                                    class="w-full px-3 py-2 text-sm font-mono border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-y"
                                ></textarea>
                            </div>
                            <?php break; ?>

                        <?php case ('spacer'): ?>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Height (px)')); ?></label>
                                <input
                                    type="range"
                                    wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.height"
                                    min="10"
                                    max="120"
                                    step="5"
                                    class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-primary-600"
                                >
                                <p class="text-xs text-muted text-right mt-0.5"><?php echo e($block['data']['height'] ?? 30); ?>px</p>
                            </div>
                            <?php break; ?>

                        <?php case ('social'): ?>
                            <div class="space-y-3">
                                <label class="block text-xs font-medium text-muted "><?php echo e(__('Social Links')); ?></label>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($block['data']['links'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linkIndex => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <div class="p-3 bg-surface rounded-lg space-y-2">
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs font-medium text-muted ">Link <?php echo e($linkIndex + 1); ?></span>
                                            <button
                                                wire:click="$set('blocks.<?php echo e($selectedBlockIndex); ?>.data.links', <?php echo e(json_encode(array_values(collect($block['data']['links'])->forget($linkIndex)->toArray()))); ?>)"
                                                class="text-xs text-red-500 hover:text-danger"
                                            ><?php echo e(__('Remove')); ?></button>
                                        </div>
                                        <select
                                            wire:model.live="blocks.<?php echo e($selectedBlockIndex); ?>.data.links.<?php echo e($linkIndex); ?>.platform"
                                            class="w-full px-3 py-1.5 text-sm border border-border rounded-lg bg-surface-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                        >
                                            <option value="twitter">Twitter / X</option>
                                            <option value="linkedin">LinkedIn</option>
                                            <option value="facebook">Facebook</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="youtube">YouTube</option>
                                            <option value="github">GitHub</option>
                                        </select>
                                        <input
                                            type="url"
                                            wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.links.<?php echo e($linkIndex); ?>.url"
                                            placeholder="https://..."
                                            class="w-full px-3 py-1.5 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                        >
                                    </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($block['data']['links'] ?? []) < 6): ?>
                                    <button
                                        wire:click="$set('blocks.<?php echo e($selectedBlockIndex); ?>.data.links', <?php echo e(json_encode(array_merge($block['data']['links'] ?? [], [['platform' => 'twitter', 'url' => '']]))); ?>)"
                                        class="w-full py-2 text-xs font-medium text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20 rounded-lg hover:bg-primary-100 dark:hover:bg-primary-900/30 transition-colors"
                                    ><?php echo e(__('+ Add Social Link')); ?></button>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <?php break; ?>

                        <?php case ('footer'): ?>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Footer Text')); ?></label>
                                <textarea
                                    wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.text"
                                    rows="3"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-y"
                                    placeholder="Company name and address..."
                                ></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-muted  mb-1"><?php echo e(__('Unsubscribe Text')); ?></label>
                                <input
                                    type="text"
                                    wire:model.live.debounce.300ms="blocks.<?php echo e($selectedBlockIndex); ?>.data.unsubscribe_text"
                                    class="w-full px-3 py-2 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                >
                            </div>
                            <?php break; ?>
                    <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <div class="pt-4 border-t border-border space-y-2">
                        <button
                            wire:click="duplicateBlock(<?php echo e($selectedBlockIndex); ?>)"
                            class="w-full py-2 text-sm font-medium text-ink/80 bg-surface  rounded-lg hover:bg-gray-200 dark:bg-gray-700 transition-colors"
                        ><?php echo e(__('Duplicate Block')); ?></button>
                        <button
                            wire:click="removeBlock(<?php echo e($selectedBlockIndex); ?>)"
                            class="w-full py-2 text-sm font-medium text-danger bg-danger/10 rounded-lg hover:bg-danger/15 transition-colors"
                        ><?php echo e(__('Delete Block')); ?></button>
                    </div>
                </div>
            <?php else: ?>
                
                <div class="flex flex-col items-center justify-center h-full p-6 text-center">
                    <div class="w-12 h-12 bg-surface  rounded-xl flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Block Properties')); ?></p>
                    <p class="text-xs text-muted"><?php echo e(__('Click on a block in the canvas to edit its properties here.')); ?></p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2"
            class="fixed bottom-6 right-6 z-50 px-4 py-3 bg-green-600 text-white text-sm font-medium rounded-xl shadow-lg"
        >
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

    <?php
        $__scriptKey = '2526022233-0';
        ob_start();
    ?>
<script>
    Alpine.data('emailBuilder', () => ({
        draggingType: null,
        draggingBlockIndex: null,
        dropTarget: null,
        dragOverCanvas: false,
        previewDevice: 'desktop',

        handlePaletteDragStart(event, type) {
            this.draggingType = type;
            this.draggingBlockIndex = null;
            event.dataTransfer.effectAllowed = 'copy';
            event.dataTransfer.setData('text/plain', type);
            event.target.style.opacity = '0.5';
        },

        handleBlockDragStart(event, index) {
            this.draggingType = null;
            this.draggingBlockIndex = index;
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/plain', `block:${index}`);
        },

        handleDragEnd(event) {
            event.target.style.opacity = '1';
            this.draggingType = null;
            this.draggingBlockIndex = null;
            this.dropTarget = null;
            this.dragOverCanvas = false;
        },

        handleCanvasDragOver(event) {
            event.dataTransfer.dropEffect = this.draggingType ? 'copy' : 'move';
            this.dragOverCanvas = true;
        },

        handleCanvasDrop(event) {
            this.dragOverCanvas = false;
            if (this.draggingType) {
                this.$wire.addBlock(this.draggingType);
            }
            this.clearDragState();
        },

        handleBlockDragOver(event, index) {
            event.dataTransfer.dropEffect = this.draggingType ? 'copy' : 'move';
            this.dropTarget = index;
        },

        handleBlockDrop(event, position) {
            if (this.draggingType) {
                this.$wire.addBlock(this.draggingType, position);
            } else if (this.draggingBlockIndex !== null && this.draggingBlockIndex !== position) {
                let from = this.draggingBlockIndex;
                let to = position > from ? position - 1 : position;
                if (from !== to) {
                    this.$wire.moveBlock(from, to);
                }
            }
            this.clearDragState();
        },

        clearDropTarget() {
            this.dropTarget = null;
        },

        clearDragState() {
            this.draggingType = null;
            this.draggingBlockIndex = null;
            this.dropTarget = null;
            this.dragOverCanvas = false;
        }
    }));
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/campaigns/email-builder.blade.php ENDPATH**/ ?>