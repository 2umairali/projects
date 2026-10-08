<div
    class="space-y-6"
    x-data="globalSearchUI()"
    x-on:keydown.arrow-down.prevent="focusNext()"
    x-on:keydown.arrow-up.prevent="focusPrev()"
    x-on:keydown.enter.prevent="openFocused()"
    x-on:keydown.escape="clearFocus()"
>
    
    <div class="relative">
        <svg class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 h-5 w-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        <input
            type="text"
            wire:model.live.debounce.300ms="query"
            x-ref="searchInput"
            x-on:focus="showRecents = query.length === 0"
            placeholder="<?php echo e(__('Search contacts, conversations, messages, campaigns...')); ?>"
            class="w-full rounded-2xl border border-border bg-surface-2 py-3.5 pl-12 pr-20 text-sm text-ink placeholder:text-muted shadow-soft transition focus:border-brand/40 focus:outline-none focus:ring-2 focus:ring-brand/30"
            autofocus
            aria-label="<?php echo e(__('Global search')); ?>"
            role="searchbox"
            aria-controls="search-results"
            autocomplete="off"
        />
        
        <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center gap-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($query): ?>
            <button
                wire:click="$set('query', '')"
                class="flex items-center justify-center h-6 w-6 rounded-md text-muted hover:text-ink hover:bg-surface transition"
                aria-label="<?php echo e(__('Clear search')); ?>"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <?php else: ?>
            <kbd class="hidden sm:inline-flex items-center rounded-lg border border-border bg-surface px-2 py-0.5 text-[10px] font-medium text-muted">
                /
            </kbd>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div
            x-show="showRecents && recentSearches.length > 0 && !$wire.query"
            x-on:click.outside="showRecents = false"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute left-0 right-0 top-full mt-2 z-20 rounded-xl border border-border bg-surface-2 p-2 shadow-lg"
            x-cloak
        >
            <div class="flex items-center justify-between px-3 py-1.5">
                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-muted"><?php echo e(__('Recent Searches')); ?></span>
                <button x-on:click="clearRecents()" class="text-xs text-muted hover:text-danger transition"><?php echo e(__('Clear')); ?></button>
            </div>
            <template x-for="(term, idx) in recentSearches" :key="idx">
                <button
                    x-on:click="applyRecent(term)"
                    class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm text-ink transition hover:bg-surface"
                >
                    <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span x-text="term"></span>
                </button>
            </template>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($searched): ?>
    <div class="flex items-center gap-1 overflow-x-auto pb-px no-scrollbar" role="tablist" aria-label="<?php echo e(__('Search result categories')); ?>">
        <?php
            $tabs = [
                'all'           => ['label' => __('All'),            'icon' => 'search'],
                'contacts'      => ['label' => __('Contacts'),       'icon' => 'users'],
                'conversations' => ['label' => __('Conversations'),  'icon' => 'message-square'],
                'messages'      => ['label' => __('Messages'),       'icon' => 'mail'],
                'campaigns'     => ['label' => __('Campaigns'),      'icon' => 'send'],
                'deals'         => ['label' => __('Deals'),          'icon' => 'briefcase'],
                'documents'     => ['label' => __('Knowledge Base'), 'icon' => 'book-open'],
            ];
        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <button
            wire:click="setTab('<?php echo e($key); ?>')"
            class="tab whitespace-nowrap <?php echo e($activeTab === $key ? 'tab-active' : ''); ?>"
            role="tab"
            aria-selected="<?php echo e($activeTab === $key ? 'true' : 'false'); ?>"
            aria-controls="search-results"
        >
            <?php echo e($tab['label']); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($key !== 'all' && ($counts[$key] ?? 0) > 0): ?>
            <span class="ml-1 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full <?php echo e($activeTab === $key ? 'bg-brand/15 text-brand' : 'bg-surface text-muted'); ?> px-1.5 text-[10px] font-bold transition">
                <?php echo e($counts[$key]); ?>

            </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($totalResults > 0): ?>
    <div class="flex items-center justify-between">
        <p class="text-xs text-muted">
            <span class="font-semibold text-ink"><?php echo e(number_format($totalResults)); ?></span>
            <?php echo e(trans_choice('{1} result|[2,*] results', $totalResults)); ?> <?php echo e(__('for')); ?>

            "<span class="font-medium text-ink"><?php echo e($query); ?></span>"
        </p>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div id="search-results" role="list" aria-label="<?php echo e(__('Search results')); ?>">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($searched && $totalResults > 0): ?>
        <div class="space-y-2" x-ref="resultsList">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($activeTab === 'all' || $activeTab === $type) && count($items) > 0): ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'all'): ?>
                    <div class="flex items-center gap-3 pt-4 first:pt-0">
                        <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-muted whitespace-nowrap">
                            <?php echo e($tabs[$type]['label'] ?? ucfirst($type)); ?>

                        </h3>
                        <div class="h-px flex-1 bg-border/60"></div>
                        <span class="text-xs text-muted"><?php echo e(count($items)); ?></span>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb42d549d598d0769a01f1ea41bc23752 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb42d549d598d0769a01f1ea41bc23752 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-result-item','data' => ['type' => $item['type'],'title' => $item['title'],'subtitle' => $item['subtitle'],'url' => $item['url'],'meta' => $item['meta'],'timestamp' => $item['timestamp'] ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search-result-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['type']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['title']),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['subtitle']),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['url']),'meta' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['meta']),'timestamp' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['timestamp'] ?? null)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb42d549d598d0769a01f1ea41bc23752)): ?>
<?php $attributes = $__attributesOriginalb42d549d598d0769a01f1ea41bc23752; ?>
<?php unset($__attributesOriginalb42d549d598d0769a01f1ea41bc23752); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb42d549d598d0769a01f1ea41bc23752)): ?>
<?php $component = $__componentOriginalb42d549d598d0769a01f1ea41bc23752; ?>
<?php unset($__componentOriginalb42d549d598d0769a01f1ea41bc23752); ?>
<?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <?php elseif($searched): ?>
        
        <?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['type' => 'search','title' => 'No results for \'' . e($query) . '\'','description' => __('Try different keywords, check your spelling, or search in a different category.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'search','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('No results for \'' . e($query) . '\''),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Try different keywords, check your spelling, or search in a different category.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            
            <div class="mt-6 space-y-3">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-muted"><?php echo e(__('Suggestions')); ?></p>
                <ul class="space-y-1.5 text-sm text-muted">
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <?php echo e(__('Search by email address for contacts')); ?>

                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <?php echo e(__('Use conversation subjects to find threads')); ?>

                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <?php echo e(__('Try shorter or more general keywords')); ?>

                    </li>
                </ul>
            </div>
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

        <?php elseif(!$searched && !$query): ?>
        
        <div class="py-16 flex flex-col items-center justify-center text-center px-6">
            <div class="w-32 h-32 mb-6">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                    <circle cx="100" cy="100" r="90" fill="color-mix(in srgb, var(--color-brand) 6%, transparent)"/>
                    <circle cx="100" cy="100" r="65" fill="color-mix(in srgb, var(--color-brand) 10%, transparent)"/>
                    <circle cx="90" cy="90" r="30" fill="var(--color-surface-2)" stroke="var(--color-brand)" stroke-width="2.5" opacity="0.8"/>
                    <line x1="112" y1="112" x2="138" y2="138" stroke="var(--color-brand)" stroke-width="4" stroke-linecap="round" opacity="0.8"/>
                    <circle cx="82" cy="82" r="4" fill="color-mix(in srgb, var(--color-brand) 20%, transparent)"/>
                    <circle cx="98" cy="82" r="4" fill="color-mix(in srgb, var(--color-brand) 20%, transparent)"/>
                    <circle cx="90" cy="96" r="4" fill="color-mix(in srgb, var(--color-brand) 20%, transparent)"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-ink"><?php echo e(__('Search your workspace')); ?></h3>
            <p class="text-sm text-muted mt-1.5 max-w-sm">
                <?php echo e(__('Find contacts, conversations, campaigns, and more. Type at least 2 characters to start searching.')); ?>

            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['contacts', 'conversations', 'campaigns', 'deals', 'documents']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <span class="badge badge-ghost"><?php echo e(ucfirst($hint)); ?></span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div wire:loading.delay.long class="fixed inset-0 z-50 flex items-center justify-center bg-surface/60 backdrop-blur-sm">
        <div class="flex items-center gap-3 rounded-2xl bg-surface-2 px-6 py-4 shadow-lg border border-border">
            <div class="loading-spinner loading-sm text-brand"></div>
            <span class="text-sm font-medium text-ink"><?php echo e(__('Searching...')); ?></span>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('globalSearchUI', () => ({
        showRecents: false,
        focusedIndex: -1,
        recentSearches: [],

        init() {
            this.loadRecents();

            // Focus search with "/" key
            document.addEventListener('keydown', (e) => {
                if (e.key === '/' && !['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement?.tagName)) {
                    e.preventDefault();
                    this.$refs.searchInput?.focus();
                }
            });

            // Save search term when results load
            this.$watch('$wire.query', (val) => {
                this.showRecents = false;
                if (val && val.length >= 2) {
                    this.saveRecent(val);
                }
            });
        },

        loadRecents() {
            try {
                this.recentSearches = JSON.parse(localStorage.getItem('mb-recent-searches') || '[]').slice(0, 5);
            } catch {
                this.recentSearches = [];
            }
        },

        saveRecent(term) {
            const cleaned = term.trim();
            if (!cleaned) return;

            let recents = this.recentSearches.filter(t => t.toLowerCase() !== cleaned.toLowerCase());
            recents.unshift(cleaned);
            recents = recents.slice(0, 8);
            this.recentSearches = recents;

            try {
                localStorage.setItem('mb-recent-searches', JSON.stringify(recents));
            } catch {
                // localStorage full — ignore
            }
        },

        clearRecents() {
            this.recentSearches = [];
            localStorage.removeItem('mb-recent-searches');
            this.showRecents = false;
        },

        applyRecent(term) {
            this.$wire.set('query', term);
            this.showRecents = false;
            this.$refs.searchInput?.focus();
        },

        // Keyboard navigation
        get resultItems() {
            if (!this.$refs.resultsList) return [];
            return Array.from(this.$refs.resultsList.querySelectorAll('a[role="listitem"]'));
        },

        focusNext() {
            const items = this.resultItems;
            if (items.length === 0) return;
            this.focusedIndex = Math.min(this.focusedIndex + 1, items.length - 1);
            this.highlightItem(items[this.focusedIndex]);
        },

        focusPrev() {
            const items = this.resultItems;
            if (items.length === 0) return;
            this.focusedIndex = Math.max(this.focusedIndex - 1, 0);
            this.highlightItem(items[this.focusedIndex]);
        },

        highlightItem(el) {
            this.resultItems.forEach(item => item.classList.remove('ring-2', 'ring-brand/40'));
            if (el) {
                el.classList.add('ring-2', 'ring-brand/40');
                el.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
            }
        },

        openFocused() {
            const items = this.resultItems;
            if (this.focusedIndex >= 0 && this.focusedIndex < items.length) {
                items[this.focusedIndex].click();
            }
        },

        clearFocus() {
            this.focusedIndex = -1;
            this.resultItems.forEach(item => item.classList.remove('ring-2', 'ring-brand/40'));
        },
    }));
});
</script>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/search/global-search.blade.php ENDPATH**/ ?>