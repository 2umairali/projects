<div class="space-y-6 text-ink">
    
    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-ink"><?php echo e(__('Email Templates')); ?></h1>
            <p class="text-sm text-muted mt-1"><?php echo e(__('Browse professional templates to kickstart your campaigns.')); ?></p>
        </div>
        <a href="<?php echo e(url('/campaigns')); ?>" wire:navigate class="btn-secondary gap-2 text-sm">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'arrow-right','class' => 'w-4 h-4 rotate-180']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'arrow-right','class' => 'w-4 h-4 rotate-180']); ?>
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
            <?php echo e(__('Back to Campaigns')); ?>

        </a>
    </div>

    
    <div class="flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1 max-w-md">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'search','class' => 'absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-muted pointer-events-none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','class' => 'absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-muted pointer-events-none']); ?>
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
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="<?php echo e(__('Search templates...')); ?>"
                class="input pl-10"
                aria-label="Search templates"
            />
        </div>
    </div>

    
    <div class="flex gap-2 overflow-x-auto pb-1 scrollbar-hide -mx-1 px-1">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button
                wire:click="$set('category', '<?php echo e($key); ?>')"
                class="flex-shrink-0 inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold transition-all duration-150
                    <?php echo e($category === $key
                        ? 'bg-brand text-white shadow-sm'
                        : 'bg-surface-2 text-muted border border-border hover:border-brand/30 hover:text-ink'); ?>"
                aria-pressed="<?php echo e($category === $key ? 'true' : 'false'); ?>"
            >
                <?php echo e($label); ?>

                <span class="inline-flex items-center justify-center min-w-[18px] h-[18px] px-1 rounded-full text-[10px] font-bold
                    <?php echo e($category === $key ? 'bg-white/20 text-white' : 'bg-surface text-muted'); ?>">
                    <?php echo e($key === 'all' ? $totalCount : ($categoryCounts[$key] ?? 0)); ?>

                </span>
            </button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($templates->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div
                    <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'tpl-'.e($template->id).''; ?>wire:key="tpl-<?php echo e($template->id); ?>"
                    class="group bg-surface-2 rounded-2xl border border-border overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-200"
                >
                    
                    <div class="relative h-52 overflow-hidden bg-gray-50 dark:bg-gray-800 border-b border-border">
                        <div class="absolute inset-0 overflow-hidden pointer-events-none">
                            <div class="origin-top-left scale-[0.45] w-[222%]">
                                <?php echo \App\Livewire\Campaigns\EmailTemplateGallery::renderBlocksPreview($template->blocks ?? []); ?>

                            </div>
                        </div>

                        
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-200 flex items-center justify-center gap-3 opacity-0 group-hover:opacity-100">
                            <button
                                wire:click="preview(<?php echo e($template->id); ?>)"
                                class="px-4 py-2 text-xs font-semibold text-white bg-white/20 backdrop-blur-sm rounded-lg border border-white/30 hover:bg-white/30 transition-colors"
                            >
                                <?php echo e(__('Preview')); ?>

                            </button>
                            <button
                                wire:click="useTemplate(<?php echo e($template->id); ?>)"
                                class="px-4 py-2 text-xs font-semibold text-white bg-brand rounded-lg hover:bg-brand-strong transition-colors shadow-sm"
                            >
                                <?php echo e(__('Use Template')); ?>

                            </button>
                        </div>
                    </div>

                    
                    <div class="p-4">
                        <div class="flex items-start justify-between gap-2">
                            <div class="min-w-0">
                                <h3 class="text-sm font-semibold text-ink truncate"><?php echo e($template->name); ?></h3>
                                <span class="inline-block mt-1.5 px-2 py-0.5 text-[10px] font-semibold rounded-full bg-brand/10 text-brand dark:bg-indigo-900/30 dark:text-indigo-400 capitalize">
                                    <?php echo e($template->category); ?>

                                </span>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($template->usage_count > 0): ?>
                                <span class="text-[10px] text-muted font-medium flex-shrink-0">
                                    <?php echo e($template->usage_count); ?> <?php echo e(Str::plural('use', $template->usage_count)); ?>

                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    <?php else: ?>
        
        <div class="flex flex-col items-center justify-center py-16 px-4 bg-surface-2 rounded-2xl border border-border">
            <div class="w-14 h-14 bg-brand/10 dark:bg-indigo-900/20 rounded-full flex items-center justify-center mb-4">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'mail','class' => 'w-7 h-7 text-brand dark:text-indigo-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mail','class' => 'w-7 h-7 text-brand dark:text-indigo-400']); ?>
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
            </div>
            <p class="text-sm font-semibold text-ink"><?php echo e(__('No templates found')); ?></p>
            <p class="text-xs text-muted mt-1"><?php echo e(__('Try adjusting your search or filter criteria.')); ?></p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($previewTemplate): ?>
        <div
            x-data="{ open: true }"
            x-show="open"
            x-on:keydown.escape.window="open = false; $wire.closePreview()"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            role="dialog"
            aria-modal="true"
            aria-label="Template preview"
        >
            
            <div
                class="absolute inset-0 bg-black/60 backdrop-blur-sm"
                x-on:click="open = false; $wire.closePreview()"
            ></div>

            
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                class="relative bg-surface-2 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[85vh] flex flex-col overflow-hidden border border-border"
            >
                
                <div class="flex items-center justify-between px-6 py-4 border-b border-border bg-surface/50">
                    <div>
                        <h3 class="text-base font-bold text-ink"><?php echo e($previewTemplate->name); ?></h3>
                        <span class="text-xs text-muted capitalize"><?php echo e($previewTemplate->category); ?> template</span>
                    </div>
                    <button
                        x-on:click="open = false; $wire.closePreview()"
                        class="p-2 rounded-lg text-muted hover:text-ink hover:bg-surface transition-colors"
                        aria-label="Close preview"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                
                <div class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-800">
                    <div class="max-w-[600px] mx-auto bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <?php echo $previewHtml; ?>

                    </div>
                </div>

                
                <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-border bg-surface/50">
                    <button
                        x-on:click="open = false; $wire.closePreview()"
                        class="btn-secondary text-sm"
                    >
                        <?php echo e(__('Close')); ?>

                    </button>
                    <button
                        wire:click="useTemplate(<?php echo e($previewTemplate->id); ?>)"
                        class="btn-primary text-sm"
                    >
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'w-4 h-4']); ?>
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
                        <?php echo e(__('Use This Template')); ?>

                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/campaigns/email-template-gallery.blade.php ENDPATH**/ ?>