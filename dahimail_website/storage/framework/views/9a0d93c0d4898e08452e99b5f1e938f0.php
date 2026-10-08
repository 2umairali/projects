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

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pages->count() === 0): ?>
            
            <div class="panel p-12 text-center">
                <div class="w-16 h-16 bg-brand/15 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-ink mb-1"><?php echo e(__('No pages yet')); ?></h3>
                <p class="text-sm text-muted max-w-md mx-auto mb-6"><?php echo e(__('Create your first page to get started with your public-facing content. Pages can be landing pages, static content (terms, privacy), or blog posts.')); ?></p>
                <p class="text-xs text-muted"><?php echo e(__('Pages can be created via database seeder or a future CMS editor.')); ?></p>
            </div>
        <?php else: ?>
            
            <?php
                $grouped = $pages->groupBy('type');
                $typeLabels = ['landing' => __('Landing Pages'), 'static' => __('Static Pages'), 'blog' => __('Blog Posts')];
                $typeIcons = [
                    'landing' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                    'static' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    'blog' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
                ];
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $typeLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $typeLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($grouped[$typeKey]) && $grouped[$typeKey]->count() > 0): ?>
                <div>
                    <h2 class="text-xs font-bold text-muted uppercase tracking-wider mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($typeIcons[$typeKey]); ?>"/></svg>
                        <?php echo e($typeLabel); ?>

                    </h2>
                    <div class="panel overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-surface border-b border-border/50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Page')); ?></th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Slug')); ?></th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Meta Title')); ?></th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Status')); ?></th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted uppercase tracking-wider"><?php echo e(__('Last Updated')); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-border/60">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $grouped[$typeKey]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <tr class="hover:bg-surface transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-9 h-9 bg-brand/10 rounded-lg flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($typeIcons[$typeKey]); ?>"/></svg>
                                                </div>
                                                <span class="font-semibold text-ink"><?php echo e($page->title); ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <code class="text-xs bg-surface text-muted px-2 py-1 rounded-lg font-mono"><?php echo e($page->slug); ?></code>
                                        </td>
                                        <td class="px-6 py-4 text-muted text-xs max-w-[200px] truncate"><?php echo e($page->meta_title ?? '--'); ?></td>
                                        <td class="px-6 py-4">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->is_published): ?>
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-success/15 text-success"><?php echo e(__('Published')); ?></span>
                                            <?php else: ?>
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-warning/15 text-warning"><?php echo e(__('Draft')); ?></span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 text-muted text-xs"><?php echo e($page->updated_at ? \Carbon\Carbon::parse($page->updated_at)->format('M j, Y') : '--'); ?></td>
                                    </tr>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/cms.blade.php ENDPATH**/ ?>