<div class="space-y-6">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         role="alert" aria-live="polite"
         class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('success')); ?></span>
        <button @click="show = false" class="text-green-500 hover:text-success">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         role="alert" aria-live="assertive"
         class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('error')); ?></span>
        <button @click="show = false" class="text-danger hover:text-red-700">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-3">
                <a href="<?php echo e(route('contacts')); ?>" class="text-sm text-brand hover:text-brand/80 flex items-center gap-1" wire:navigate>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    <?php echo e(__('Back to Contacts')); ?>

                </a>
            </div>
            <h1 class="text-2xl font-bold text-ink mt-2"><?php echo e(__('Trash')); ?></h1>
            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Deleted contacts are kept for 30 days before permanent removal.')); ?></p>
        </div>
        <div class="flex items-center gap-2 flex-wrap">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contacts->total() > 0): ?>
            <button wire:click="restoreAll" wire:confirm="Restore all <?php echo e($contacts->total()); ?> contact(s)?"
                    wire:loading.attr="disabled"
                    class="flex items-center gap-1.5 px-3 py-2 text-sm text-muted bg-surface-2 border border-border rounded-xl hover:bg-surface transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                <svg class="w-4 h-4" wire:loading.remove wire:target="restoreAll" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                <svg class="w-4 h-4 animate-spin" wire:loading wire:target="restoreAll" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                <?php echo e(__('Restore All')); ?>

            </button>
            <button wire:click="emptyTrash" wire:confirm="Permanently delete all contacts in trash? This cannot be undone."
                    wire:loading.attr="disabled"
                    class="flex items-center gap-1.5 px-3 py-2 text-sm text-white bg-danger rounded-xl hover:bg-red-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                <svg class="w-4 h-4" wire:loading.remove wire:target="emptyTrash" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                <svg class="w-4 h-4 animate-spin" wire:loading wire:target="emptyTrash" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                <?php echo e(__('Empty Trash')); ?>

            </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <div class="flex items-center">
        <div class="relative">
            <svg class="w-4 h-4 text-muted absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="<?php echo e(__('Search deleted contacts...')); ?>"
                   class="pl-9 pr-4 py-2 text-sm bg-surface-2 border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent placeholder-gray-400 w-full sm:w-80">
        </div>
    </div>

    
    <div wire:loading.delay class="text-center py-2">
        <div class="inline-flex items-center gap-2 text-sm text-muted">
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
            <?php echo e(__('Loading...')); ?>

        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contacts->count() > 0): ?>
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface border-b border-border">
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Name')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Email')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden lg:table-cell"><?php echo e(__('Deleted')); ?></th>
                        <th class="text-right text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Actions')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-surface transition-colors" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'trash-'.e($contact->id).''; ?>wire:key="trash-<?php echo e($contact->id); ?>">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-gray-400 rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0 opacity-60">
                                    <?php echo e($contact->initials); ?>

                                </div>
                                <span class="text-sm font-medium text-ink whitespace-nowrap"><?php echo e($contact->full_name); ?></span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm text-muted"><?php echo e($contact->email); ?></td>
                        <td class="px-4 py-3 text-sm text-muted hidden lg:table-cell" title="<?php echo e($contact->deleted_at->format('M j, Y g:i A')); ?>"><?php echo e($contact->deleted_at->diffForHumans()); ?></td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button wire:click="restore(<?php echo e($contact->id); ?>)"
                                        class="text-xs text-brand hover:text-brand/80 font-medium transition-colors">
                                    <?php echo e(__('Restore')); ?>

                                </button>
                                <button wire:click="forceDelete(<?php echo e($contact->id); ?>)"
                                        wire:confirm="Permanently delete <?php echo e($contact->first_name); ?>? This cannot be undone."
                                        class="text-xs text-danger hover:text-red-700 font-medium transition-colors">
                                    <?php echo e(__('Delete Forever')); ?>

                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="px-4 py-3 border-t border-border">
            <?php echo e($contacts->links()); ?>

        </div>
    </div>
    <?php else: ?>
    <?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['type' => 'contacts','title' => __('Trash is empty'),'description' => __('Deleted contacts will appear here for 30 days before permanent removal.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'contacts','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Trash is empty')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Deleted contacts will appear here for 30 days before permanent removal.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

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
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/contacts/contact-trash.blade.php ENDPATH**/ ?>