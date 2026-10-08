



<div x-show="showMenu" @click.away="showMenu = false"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 scale-95 translate-y-2"
     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-[520px] max-w-[90vw] bg-surface-2 rounded-xl shadow-2xl border border-border p-0 z-30 overflow-hidden"
     style="display: none;">

    
    <div class="px-5 py-3 bg-surface border-b border-border">
        <p class="text-sm font-semibold text-ink"><?php echo e(__('Add a Step')); ?></p>
        <p class="text-xs text-muted mt-0.5"><?php echo e(__('Choose what happens next in your workflow')); ?></p>
    </div>

    <div class="p-4 grid grid-cols-1 sm:grid-cols-3 gap-4">

        
        
        
        <div>
            <div class="flex items-center gap-2 mb-2 pb-2 border-b border-yellow-100">
                <span class="w-6 h-6 bg-warning/15 rounded-md flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
                <span class="text-xs font-bold text-yellow-600 uppercase tracking-wider"><?php echo e(__('Conditions')); ?></span>
            </div>
            <div class="space-y-0.5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $conditionSubtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <button @click="showMenu = false" wire:click="addNode('condition', '<?php echo e($key); ?>')"
                        class="w-full text-left px-3 py-2 text-sm text-ink/80 hover:bg-warning/10 hover:text-warning rounded-lg transition-all duration-150 flex items-center gap-2.5">
                    <span class="w-2 h-2 rounded-full bg-yellow-400 flex-shrink-0"></span>
                    <span class="text-xs font-medium"><?php echo e($label); ?></span>
                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        
        
        
        <div>
            <div class="flex items-center gap-2 mb-2 pb-2 border-b border-green-100">
                <span class="w-6 h-6 bg-success/15 rounded-md flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
                </span>
                <span class="text-xs font-bold text-success uppercase tracking-wider"><?php echo e(__('Actions')); ?></span>
            </div>
            <div class="space-y-0.5 max-h-64 overflow-y-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $actionSubtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($key !== 'wait_delay'): ?>
                    <button @click="showMenu = false" wire:click="addNode('action', '<?php echo e($key); ?>')"
                            class="w-full text-left px-3 py-2 text-sm text-ink/80 hover:bg-success/10 hover:text-success rounded-lg transition-all duration-150 flex items-center gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0"></span>
                        <span class="text-xs font-medium"><?php echo e($label); ?></span>
                    </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        
        
        
        <div>
            <div class="flex items-center gap-2 mb-2 pb-2 border-b border-purple-100">
                <span class="w-6 h-6 bg-brand/15 rounded-md flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
                <span class="text-xs font-bold text-purple-600 uppercase tracking-wider"><?php echo e(__('Delays')); ?></span>
            </div>
            <div class="space-y-0.5">
                <button @click="showMenu = false" wire:click="addNode('action', 'wait_delay')"
                        class="w-full text-left px-3 py-2 text-sm text-ink/80 hover:bg-brand/10 hover:text-brand rounded-lg transition-all duration-150 flex items-center gap-2.5">
                    <span class="w-2 h-2 rounded-full bg-purple-400 flex-shrink-0"></span>
                    <span class="text-xs font-medium"><?php echo e(__('Wait Duration')); ?></span>
                </button>
            </div>

            
            <div class="mt-4 p-3 bg-surface rounded-lg border border-border">
                <p class="text-[10px] font-semibold text-muted uppercase tracking-wider mb-1.5"><?php echo e(__('Tips')); ?></p>
                <ul class="text-[10px] text-muted space-y-1">
                    <li class="flex items-start gap-1.5">
                        <span class="w-1 h-1 rounded-full bg-gray-300 mt-1 flex-shrink-0"></span>
                        <?php echo e(__('Use conditions to branch logic')); ?>

                    </li>
                    <li class="flex items-start gap-1.5">
                        <span class="w-1 h-1 rounded-full bg-gray-300 mt-1 flex-shrink-0"></span>
                        <?php echo e(__('Add delays between actions')); ?>

                    </li>
                    <li class="flex items-start gap-1.5">
                        <span class="w-1 h-1 rounded-full bg-gray-300 mt-1 flex-shrink-0"></span>
                        <?php echo e(__('Chain multiple actions together')); ?>

                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/workflows/_add-node-dropdown.blade.php ENDPATH**/ ?>