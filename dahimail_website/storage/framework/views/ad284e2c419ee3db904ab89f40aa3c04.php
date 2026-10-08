<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Edit Page'),'subtitle' => __('Update page:') . ' ' . $page->title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Edit Page')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Update page:') . ' ' . $page->title)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6" x-data="pageForm()">

        <form method="POST" action="<?php echo e(route('admin.cms.update', $page->id)); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Page Details')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Basic information about this page.')); ?></p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div>
                            <label for="title" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Title')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                            <input type="text" name="title" id="title" value="<?php echo e(old('title', $page->title)); ?>" required aria-required="true"
                                   placeholder="<?php echo e(__('e.g. About Us')); ?>"
                                   @input="!slugManual && (slug = slugify($el.value))"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="slug" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Slug')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                            <input type="text" name="slug" id="slug" x-model="slug" required aria-required="true"
                                   placeholder="<?php echo e(__('url-friendly-slug')); ?>"
                                   @input="slugManual = true"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink font-mono <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <p class="text-xs text-muted mt-1"><?php echo e(__('URL-friendly identifier. Auto-generated from title if left unchanged.')); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div>
                            <label for="type" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Type')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                            <select name="type" id="type" required aria-required="true"
                                    class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="landing" <?php if(old('type', $page->type) === 'landing'): echo 'selected'; endif; ?>><?php echo e(__('Landing Page')); ?></option>
                                <option value="static" <?php if(old('type', $page->type) === 'static'): echo 'selected'; endif; ?>><?php echo e(__('Static Page')); ?></option>
                                <option value="blog" <?php if(old('type', $page->type) === 'blog'): echo 'selected'; endif; ?>><?php echo e(__('Blog Post')); ?></option>
                            </select>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="flex items-center gap-3 sm:pt-7">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" name="is_published" value="1" <?php echo e(old('is_published', $page->is_published) ? 'checked' : ''); ?>

                                       class="sr-only peer">
                                <div class="w-10 h-5 bg-gray-200 peer-focus:ring-2 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-surface-2 after:border-border after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand"></div>
                            </label>
                            <span class="text-sm font-medium text-ink"><?php echo e(__('Published')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Content')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Page body content. Supports HTML markup.')); ?></p>
                </div>
                <div class="p-6">
                    <?php
                        // Page::$casts declares content as `array`, so landing-page
                        // rows return a PHP array of structured sections instead
                        // of a plain HTML string. We detect that here and surface
                        // it in the UI: show a blue banner explaining what's on
                        // screen, and offer a "Flatten to HTML" action that the
                        // user can opt into if they want to edit as plain text.
                        $rawContent = $page->content;
                        $isStructured = is_array($rawContent);
                        $contentForEditor = $isStructured
                            ? json_encode($rawContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
                            : (string) ($rawContent ?? '');

                        // Build an HTML preview from the array structure so the
                        // "Flatten to HTML" button has something sensible to drop
                        // into the textarea. Walks known section shapes: title,
                        // subtitle, desc, reasons[], items[], features[], etc.
                        $flattenHtml = '';
                        if ($isStructured) {
                            $walk = function ($node) use (&$walk) {
                                if (is_string($node)) {
                                    return '<p>' . e($node) . '</p>' . "\n";
                                }
                                if (! is_array($node)) {
                                    return '';
                                }
                                $out = '';
                                if (! empty($node['title'])) {
                                    $out .= '<h2>' . e($node['title']) . '</h2>' . "\n";
                                }
                                if (! empty($node['subtitle'])) {
                                    $out .= '<h3>' . e($node['subtitle']) . '</h3>' . "\n";
                                }
                                foreach (['desc', 'description', 'body', 'text', 'content'] as $k) {
                                    if (! empty($node[$k]) && is_string($node[$k])) {
                                        $out .= '<p>' . e($node[$k]) . '</p>' . "\n";
                                    }
                                }
                                foreach (['reasons', 'items', 'features', 'sections', 'cards'] as $listKey) {
                                    if (! empty($node[$listKey]) && is_array($node[$listKey])) {
                                        $out .= "\n";
                                        foreach ($node[$listKey] as $item) {
                                            $out .= $walk($item);
                                        }
                                    }
                                }
                                return $out;
                            };
                            $flattenHtml = trim($walk($rawContent));
                        }
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isStructured): ?>
                    <div x-data="{ mode: 'json', flatten: <?php echo \Illuminate\Support\Js::from($flattenHtml)->toHtml() ?> }" class="mb-3">
                        <div class="rounded-xl border border-info/30 bg-info/10 px-4 py-3 flex items-start gap-3">
                            <svg class="w-5 h-5 text-info shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><line x1="12" y1="8" x2="12" y2="12" stroke-width="2"/><line x1="12" y1="16" x2="12.01" y2="16" stroke-width="2"/></svg>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-ink"><?php echo e(__('This page uses structured sections')); ?></p>
                                <p class="text-xs text-muted mt-0.5"><?php echo e(__('The content below is stored as JSON so your landing page can render it in sections (hero, reasons, features, etc.). Edit the JSON keys/values to change individual sections, or convert to plain HTML if you prefer a simple rich-text page.')); ?></p>
                                <div class="flex gap-2 mt-3">
                                    <button type="button"
                                            x-on:click="mode = 'json'; document.getElementById('content').value = <?php echo \Illuminate\Support\Js::from($contentForEditor)->toHtml() ?>"
                                            :class="mode === 'json' ? 'bg-brand text-white' : 'bg-surface-2 text-muted hover:text-ink border border-border'"
                                            class="px-3 py-1.5 rounded-lg text-xs font-medium transition">
                                        <?php echo e(__('Structured JSON (keeps sections)')); ?>

                                    </button>
                                    <button type="button"
                                            x-on:click="if(confirm('<?php echo e(__('Switch to plain HTML will flatten section structure. Your landing page layout may change. Continue?')); ?>')) { mode = 'html'; document.getElementById('content').value = flatten; }"
                                            :class="mode === 'html' ? 'bg-brand text-white' : 'bg-surface-2 text-muted hover:text-ink border border-border'"
                                            class="px-3 py-1.5 rounded-lg text-xs font-medium transition">
                                        <?php echo e(__('Flatten to plain HTML')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <label for="content" class="sr-only"><?php echo e(__('Content')); ?></label>
                    <textarea name="content" id="content" rows="16"
                              placeholder="<?php echo e(__('Enter page content (HTML supported)...')); ?>"
                              class="w-full px-4 py-3 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink font-mono resize-y <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('content', $contentForEditor)); ?></textarea>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('SEO & Meta')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Search engine optimization settings for this page.')); ?></p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Meta Title')); ?></label>
                            <input type="text" name="meta_title" id="meta_title" value="<?php echo e(old('meta_title', $page->meta_title)); ?>"
                                   placeholder="<?php echo e(__('SEO title (defaults to page title)')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="meta_image" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('OG Image URL')); ?></label>
                            <input type="url" name="meta_image" id="meta_image" value="<?php echo e(old('meta_image', $page->meta_image)); ?>"
                                   placeholder="https://example.com/og-image.png"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['meta_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['meta_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Meta Description')); ?></label>
                        <textarea name="meta_description" id="meta_description" rows="3"
                                  placeholder="<?php echo e(__('Brief description for search engines (max 500 characters)')); ?>"
                                  class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink resize-none <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('meta_description', $page->meta_description)); ?></textarea>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="flex items-center justify-between">
                <a href="<?php echo e(route('admin.cms.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <?php echo e(__('Back to Pages')); ?>

                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand text-white text-sm font-semibold rounded-xl hover:bg-brand-strong shadow-lg shadow-soft transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php echo e(__('Update Page')); ?>

                </button>
            </div>
        </form>
    </div>

    <script>
    function pageForm() {
        return {
            slug: '<?php echo e(old('slug', $page->slug)); ?>',
            slugManual: true,
            slugify(text) {
                return text.toString().toLowerCase().trim()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
            }
        };
    }
    </script>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/cms/edit.blade.php ENDPATH**/ ?>