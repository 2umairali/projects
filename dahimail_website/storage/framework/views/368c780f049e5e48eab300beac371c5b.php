<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Content Management'),'subtitle' => __('Manage static pages, blog posts, and SEO settings.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Content Management')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Manage static pages, blog posts, and SEO settings.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="p-4 bg-success/10 border border-success/30 rounded-xl text-sm text-success font-medium flex items-center gap-2">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
        <div class="p-4 bg-danger/10 border border-danger/30 rounded-xl text-sm text-danger font-medium flex items-center gap-2">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="panel p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('CMS Pages')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Manage landing pages, static content, and blog posts.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="<?php echo e(route('admin.cms.create')); ?>" class="btn-primary"><?php echo e(__('Create Page')); ?></a>
                </div>
            </div>

            <form method="get" action="<?php echo e(route('admin.cms.index')); ?>" class="filter-form mt-6 grid gap-4 lg:grid-cols-[1.4fr_1fr_1fr_auto] md:grid-cols-[1.4fr_1fr_1fr] sm:grid-cols-2">
                <div>
                    <label class="sr-only" for="search"><?php echo e(__('Search')); ?></label>
                    <input id="search" name="search" value="<?php echo e(request('search')); ?>" class="input-field" placeholder="<?php echo e(__('Search by title or slug...')); ?>">
                </div>
                <div>
                    <label class="sr-only" for="type"><?php echo e(__('Type')); ?></label>
                    <select id="type" name="type" class="input-field">
                        <option value=""><?php echo e(__('All types')); ?></option>
                        <option value="landing" <?php if(request('type') === 'landing'): echo 'selected'; endif; ?>><?php echo e(__('Landing Pages')); ?></option>
                        <option value="static" <?php if(request('type') === 'static'): echo 'selected'; endif; ?>><?php echo e(__('Static Pages')); ?></option>
                        <option value="blog" <?php if(request('type') === 'blog'): echo 'selected'; endif; ?>><?php echo e(__('Blog Posts')); ?></option>
                    </select>
                </div>
                <div>
                    <label class="sr-only" for="status"><?php echo e(__('Status')); ?></label>
                    <select id="status" name="status" class="input-field">
                        <option value=""><?php echo e(__('All statuses')); ?></option>
                        <option value="published" <?php if(request('status') === 'published'): echo 'selected'; endif; ?>><?php echo e(__('Published')); ?></option>
                        <option value="draft" <?php if(request('status') === 'draft'): echo 'selected'; endif; ?>><?php echo e(__('Draft')); ?></option>
                    </select>
                </div>
                <div class="flex items-center gap-3">
                    <button class="btn-secondary" type="submit"><?php echo e(__('Filter')); ?></button>
                    <a href="<?php echo e(route('admin.cms.index')); ?>" class="btn-secondary"><?php echo e(__('Reset')); ?></a>
                </div>
            </form>
        </div>

        
        <div class="panel p-6" x-data="{
            selected: [],
            selectAll: false,
            allIds: [<?php echo e($pages->pluck('id')->join(',')); ?>]
        }" x-init="$watch('selectAll', v => { selected = v ? [...allIds] : [] })">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Page Directory')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Showing')); ?> <?php echo e($pages->count()); ?> <?php echo e(__('of')); ?> <?php echo e($pages->total()); ?> <?php echo e(__('pages.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <a href="<?php echo e(route('admin.cms.export', request()->query())); ?>" class="btn-secondary"><?php echo e(__('Export')); ?></a>
                    <button x-show="selected.length > 0" x-cloak type="button" class="btn-danger" @click="$dispatch('open-modal', 'bulk-delete-pages')" x-text="'Bulk Delete (' + selected.length + ')'"></button>
                </div>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="text-xs uppercase tracking-[0.2em] text-muted">
                        <tr>
                            <th class="pb-3">
                                <input type="checkbox" x-model="selectAll" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                            </th>
                            <th class="pb-3"><?php echo e(__('Page')); ?></th>
                            <th class="pb-3"><?php echo e(__('Slug')); ?></th>
                            <th class="pb-3"><?php echo e(__('Type')); ?></th>
                            <th class="pb-3"><?php echo e(__('Meta Title')); ?></th>
                            <th class="pb-3"><?php echo e(__('Status')); ?></th>
                            <th class="pb-3"><?php echo e(__('Last Updated')); ?></th>
                            <th class="pb-3 text-right"><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/60">
                        <?php
                            $typeIcons = [
                                'landing' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                                'static' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                'blog' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
                            ];
                            $typeLabels = ['landing' => __('Landing'), 'static' => __('Static'), 'blog' => __('Blog')];
                        ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr class="hover:bg-surface transition-colors">
                            <td class="py-4">
                                <input type="checkbox" value="<?php echo e($page->id); ?>" x-model.number="selected" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                            </td>
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 bg-brand/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($typeIcons[$page->type] ?? $typeIcons['static']); ?>"/></svg>
                                    </div>
                                    <span class="font-semibold text-ink"><?php echo e($page->title); ?></span>
                                </div>
                            </td>
                            <td class="py-4">
                                <code class="text-xs bg-surface text-muted px-2 py-1 rounded-lg font-mono"><?php echo e($page->slug); ?></code>
                            </td>
                            <td class="py-4">
                                <span class="text-sm font-semibold text-ink"><?php echo e($typeLabels[$page->type] ?? ucfirst($page->type)); ?></span>
                            </td>
                            <td class="py-4 text-muted text-xs max-w-[200px] truncate"><?php echo e($page->meta_title ?? '--'); ?></td>
                            <td class="py-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->is_published): ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-success/15 text-success"><?php echo e(__('Published')); ?></span>
                                <?php else: ?>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-warning/15 text-warning"><?php echo e(__('Draft')); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="py-4 text-muted text-xs"><?php echo e($page->updated_at ? $page->updated_at->format('M j, Y') : '--'); ?></td>
                            <td class="py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="<?php echo e(route('admin.cms.edit', $page->id)); ?>" class="btn-secondary"><?php echo e(__('Edit')); ?></a>
                                    <button type="button" class="btn-danger" x-data @click="$dispatch('open-modal', 'confirm-delete-<?php echo e($page->id); ?>')"><?php echo e(__('Delete')); ?></button>
                                </div>
                            </td>
                        </tr>

                        
                        <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'confirm-delete-'.e($page->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-delete-'.e($page->id).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <form method="POST" action="<?php echo e(route('admin.cms.destroy', $page->id)); ?>" class="p-6 space-y-4">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <div>
                                    <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete page')); ?> "<?php echo e($page->title); ?>"?</p>
                                    <p class="mt-2 text-sm text-muted"><?php echo e(__('This will')); ?> <strong class="text-danger"><?php echo e(__('permanently delete')); ?></strong> <?php echo e(__('this page. This action cannot be undone.')); ?></p>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                                    <button type="submit" class="btn-danger"><?php echo e(__('Delete Page')); ?></button>
                                </div>
                            </form>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27)): ?>
<?php $attributes = $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27; ?>
<?php unset($__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27)): ?>
<?php $component = $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27; ?>
<?php unset($__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27); ?>
<?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr>
                            <td colspan="8" class="py-12 text-center">
                                <div class="w-16 h-16 bg-brand/15 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-ink mb-1"><?php echo e(__('No pages yet')); ?></h3>
                                <p class="text-sm text-muted max-w-md mx-auto mb-6"><?php echo e(__('Create your first page to get started with your public-facing content.')); ?></p>
                                <a href="<?php echo e(route('admin.cms.create')); ?>" class="btn-primary"><?php echo e(__('Create Page')); ?></a>
                            </td>
                        </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pages->hasPages()): ?>
            <div class="mt-4 border-t border-border/60 pt-4">
                <?php echo e($pages->withQueryString()->links()); ?>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php
                $getSetting = function($key, $default = '') {
                    static $cache = null;
                    if ($cache === null) {
                        try {
                            $cache = \Illuminate\Support\Facades\DB::table('system_settings')->pluck('value', 'key')->toArray();
                        } catch (\Exception $e) {
                            $cache = [];
                        }
                    }
                    return $cache[$key] ?? $default;
                };
            ?>
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Global SEO Defaults')); ?></h2>
                    <p class="text-sm text-muted mt-0.5"><?php echo e(__('Default SEO meta tags applied when page-specific values are not set.')); ?></p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-ink/80 uppercase tracking-wider mb-1.5"><?php echo e(__('Default Meta Title')); ?></label>
                            <input type="text" name="seo_default_title" value="<?php echo e($getSetting('seo_default_title', config('app.name') . ' - AI-Powered Communication Automation')); ?>" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:ring-2 focus:ring-brand/40/20 focus:border-indigo-500 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-ink/80 uppercase tracking-wider mb-1.5"><?php echo e(__('OG Image URL')); ?></label>
                            <input type="url" name="seo_og_image" value="<?php echo e($getSetting('seo_og_image', '')); ?>" placeholder="https://example.com/og-image.png" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:ring-2 focus:ring-brand/40/20 focus:border-indigo-500 transition-all">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-ink/80 uppercase tracking-wider mb-1.5"><?php echo e(__('Default Meta Description')); ?></label>
                        <textarea rows="2" name="seo_default_description" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:ring-2 focus:ring-brand/40/20 focus:border-indigo-500 transition-all resize-none"><?php echo e($getSetting('seo_default_description', config('app.name') . ' automates email communication with AI. Manage your inbox, contacts, and campaigns with intelligent automation.')); ?></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-semibold text-white bg-brand rounded-xl hover:bg-brand-strong shadow-lg shadow-soft transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <?php echo e(__('Save SEO Defaults')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    
    <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'bulk-delete-pages']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bulk-delete-pages']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.cms.bulk-destroy')); ?>" class="p-6 space-y-4"
              x-data @submit="
                  const checkboxes = document.querySelectorAll('input[type=checkbox][x-model\\.number=selected]:checked');
                  checkboxes.forEach(cb => {
                      const input = document.createElement('input');
                      input.type = 'hidden'; input.name = 'ids[]'; input.value = cb.value;
                      $el.appendChild(input);
                  });
              ">
            <?php echo csrf_field(); ?>
            <div>
                <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete selected pages?')); ?></p>
                <p class="mt-2 text-sm text-muted"><?php echo e(__('You are about to')); ?> <strong class="text-danger"><?php echo e(__('permanently delete')); ?></strong> <?php echo e(__('the selected page(s). This action cannot be undone.')); ?></p>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                <button type="submit" class="btn-danger"><?php echo e(__('Delete Permanently')); ?></button>
            </div>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27)): ?>
<?php $attributes = $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27; ?>
<?php unset($__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27)): ?>
<?php $component = $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27; ?>
<?php unset($__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/cms/index.blade.php ENDPATH**/ ?>