<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Payment Gateways'),'subtitle' => __('Configure payment providers, credentials, and modes.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Payment Gateways')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Configure payment providers, credentials, and modes.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php
        $categories = [
            'popular' => ['label' => __('Popular'), 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
            'regional' => ['label' => __('Regional'), 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9'],
            'crypto' => ['label' => __('Crypto'), 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
            'other' => ['label' => __('Other'), 'icon' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2'],
        ];
        $grouped = $gateways->groupBy(fn($g) => $g->category ?? 'other');
    ?>

    <div class="space-y-6" x-data="{ search: '', activeCategory: 'popular' }">

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
             class="p-4 bg-success/10 border border-success/20 rounded-xl text-sm font-medium text-success flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <?php echo e(session('success')); ?>

            <button @click="show = false" class="ml-auto opacity-60 hover:opacity-100">&times;</button>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
        <div x-data="{ show: true }" x-show="show" class="p-4 bg-danger/10 border border-danger/20 rounded-xl text-sm font-medium text-danger flex items-center gap-2">
            <?php echo e(session('error')); ?>

            <button @click="show = false" class="ml-auto opacity-60 hover:opacity-100">&times;</button>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="panel p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Gateway Directory')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e($gateways->count()); ?> <?php echo e(__('gateways available.')); ?> <?php echo e($gateways->where('is_active', true)->count()); ?> <?php echo e(__('active.')); ?></p>
                </div>
            </div>
            <div class="mt-5 relative">
                <svg viewBox="0 0 24 24" class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>
                <input type="search" class="input-field pl-10" placeholder="<?php echo e(__('Search by gateway name...')); ?>" x-model="search">
            </div>
        </div>

        
        <div class="panel p-1.5">
            <div class="flex flex-wrap gap-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catKey => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php $catCount = ($grouped[$catKey] ?? collect())->count(); ?>
                <button @click="activeCategory = '<?php echo e($catKey); ?>'"
                        :class="activeCategory === '<?php echo e($catKey); ?>' ? 'bg-brand text-white shadow-soft' : 'text-muted hover:bg-surface hover:text-ink'"
                        class="flex items-center gap-2 px-4 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($cat['icon']); ?>"/></svg>
                    <span><?php echo e($cat['label']); ?></span>
                    <span class="inline-flex items-center justify-center px-1.5 py-0.5 text-[10px] font-bold rounded-full" :class="activeCategory === '<?php echo e($catKey); ?>' ? 'bg-white/20 text-white' : 'bg-surface-2 text-muted'"><?php echo e($catCount); ?></span>
                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catKey => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <div x-show="activeCategory === '<?php echo e($catKey); ?>'" x-cloak class="space-y-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $grouped[$catKey] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="panel overflow-hidden" x-data="{ expanded: false }"
                 x-show="!search || <?php echo e(Js::from(strtolower($gateway->name))); ?>.includes(search.toLowerCase()) || <?php echo e(Js::from(strtolower($gateway->slug))); ?>.includes(search.toLowerCase())"
                 x-transition>

                
                <div class="flex items-center justify-between gap-4 px-6 py-4">
                    <button type="button" class="flex min-w-0 flex-1 items-center gap-4 text-left" @click="expanded = !expanded">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-surface-2/70 text-muted">
                            <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2">
                                <p class="truncate font-semibold text-ink"><?php echo e($gateway->name); ?></p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gateway->is_active): ?>
                                <span class="inline-flex items-center rounded-md bg-emerald-500/10 px-2 py-0.5 text-[11px] font-medium text-emerald-600 ring-1 ring-inset ring-emerald-500/20"><?php echo e(__('Active')); ?></span>
                                <?php else: ?>
                                <span class="inline-flex items-center rounded-md bg-slate-500/10 px-2 py-0.5 text-[11px] font-medium text-slate-500 ring-1 ring-inset ring-slate-500/20"><?php echo e(__('Inactive')); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gateway->is_sandbox): ?>
                                <span class="inline-flex items-center rounded-md bg-amber-500/10 px-2 py-0.5 text-[11px] font-medium text-amber-600 ring-1 ring-inset ring-amber-500/20"><?php echo e(__('Sandbox')); ?></span>
                                <?php else: ?>
                                <span class="inline-flex items-center rounded-md bg-blue-500/10 px-2 py-0.5 text-[11px] font-medium text-blue-600 ring-1 ring-inset ring-blue-500/20"><?php echo e(__('Live')); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($gateway->supported_currencies)): ?>
                            <div class="mt-1 flex flex-wrap gap-1">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = array_slice($gateway->supported_currencies, 0, 6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <span class="inline-flex items-center rounded bg-surface-2/70 px-1.5 py-0.5 text-[10px] font-medium text-muted"><?php echo e($cur); ?></span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($gateway->supported_currencies) > 6): ?>
                                <span class="inline-flex items-center rounded bg-surface-2/70 px-1.5 py-0.5 text-[10px] font-medium text-muted">+<?php echo e(count($gateway->supported_currencies) - 6); ?> more</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <svg viewBox="0 0 24 24" class="h-5 w-5 shrink-0 text-muted transition-transform duration-200" :class="expanded && 'rotate-180'" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M6 9l6 6 6-6"/></svg>
                    </button>

                    <form method="POST" action="<?php echo e(route('admin.payment-gateways.toggle', $gateway)); ?>" class="shrink-0">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="relative inline-flex h-6 w-11 items-center rounded-full transition <?php echo e($gateway->is_active ? 'bg-brand' : 'bg-border'); ?>" title="<?php echo e($gateway->is_active ? 'Disable' : 'Enable'); ?>">
                            <span class="inline-block h-5 w-5 rounded-full bg-white shadow transition" style="transform: translateX(<?php echo e($gateway->is_active ? '1.25rem' : '0.125rem'); ?>)"></span>
                        </button>
                    </form>
                </div>

                
                <div x-show="expanded" x-collapse>
                    <div class="border-t border-border/60 px-6 py-6">
                        <form method="POST" action="<?php echo e(route('admin.payment-gateways.configure', $gateway)); ?>" class="space-y-6">
                            <?php echo csrf_field(); ?>

                            <div class="panel p-5">
                                <p class="panel-heading"><?php echo e(__('Environment')); ?></p>
                                <div class="mt-4 grid gap-4 lg:grid-cols-2">
                                    <div>
                                        <label for="mode_<?php echo e($gateway->id); ?>" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Mode')); ?></label>
                                        <select id="mode_<?php echo e($gateway->id); ?>" name="is_sandbox" class="input-field">
                                            <option value="1" <?php if($gateway->is_sandbox): echo 'selected'; endif; ?>><?php echo e(__('Sandbox / Test')); ?></option>
                                            <option value="0" <?php if(!$gateway->is_sandbox): echo 'selected'; endif; ?>><?php echo e(__('Live / Production')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($gateway->supported_currencies)): ?>
                            <div class="panel p-5">
                                <p class="panel-heading"><?php echo e(__('Supported Currencies')); ?></p>
                                <div class="mt-3 flex flex-wrap gap-1.5">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $gateway->supported_currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <span class="inline-flex items-center rounded-lg bg-surface-2/70 px-2.5 py-1 text-xs font-medium text-ink ring-1 ring-inset ring-border/40"><?php echo e($cur); ?></span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($gateway->credentialFields ?? []) > 0): ?>
                            <div class="panel p-5">
                                <p class="panel-heading"><?php echo e(__('Credentials')); ?></p>
                                <div class="mt-4 grid gap-4 lg:grid-cols-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $gateway->credentialFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <div>
                                        <label for="cred_<?php echo e($gateway->id); ?>_<?php echo e($field['key']); ?>" class="block text-sm font-medium text-ink mb-1.5"><?php echo e($field['label']); ?></label>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($field['type'] ?? 'text') === 'password'): ?>
                                        <div class="relative">
                                            <input id="cred_<?php echo e($gateway->id); ?>_<?php echo e($field['key']); ?>" name="credentials[<?php echo e($field['key']); ?>]" type="password" class="input-field pr-12" autocomplete="new-password"
                                                   placeholder="<?php echo e(!empty($gateway->decryptedCredentials[$field['key']]) ? '••••••••' : ($field['placeholder'] ?? '')); ?>">
                                            <button type="button" class="absolute inset-y-0 right-3 flex items-center text-muted/70 hover:text-ink transition"
                                                    onclick="const i=document.getElementById('cred_<?php echo e($gateway->id); ?>_<?php echo e($field['key']); ?>');i.type=i.type==='password'?'text':'password'">
                                                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"/><circle cx="12" cy="12" r="3"/></svg>
                                            </button>
                                        </div>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($gateway->decryptedCredentials[$field['key']])): ?>
                                        <p class="mt-1 text-xs text-muted"><?php echo e(__('Saved (hidden). Leave blank to keep current value.')); ?></p>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php else: ?>
                                        <input id="cred_<?php echo e($gateway->id); ?>_<?php echo e($field['key']); ?>" name="credentials[<?php echo e($field['key']); ?>]" type="text" class="input-field mt-1"
                                               value="<?php echo e(old('credentials.' . $field['key'], $gateway->decryptedCredentials[$field['key']] ?? '')); ?>"
                                               <?php if(!empty($field['placeholder'])): ?> placeholder="<?php echo e($field['placeholder']); ?>" <?php endif; ?>>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($field['hint'])): ?>
                                        <p class="mt-1 text-xs text-muted"><?php echo e($field['hint']); ?></p>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="rounded-2xl border border-dashed border-border/70 bg-surface-2/70 p-6 text-center text-sm text-muted">
                                <?php echo e(__('No driver found for')); ?> <span class="font-semibold text-ink"><?php echo e($gateway->slug); ?></span>.
                                Create <code class="rounded bg-surface-2 px-1.5 py-0.5 text-xs font-mono">App\Services\Payment\Drivers\<?php echo e(\Illuminate\Support\Str::studly($gateway->slug)); ?>Driver</code>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="flex justify-end">
                                <button type="submit" class="btn-primary"><?php echo e(__('Save')); ?> <?php echo e($gateway->name); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($grouped[$catKey] ?? collect())->isEmpty()): ?>
            <div class="panel p-6 text-center">
                <p class="text-sm text-muted">No <?php echo e(strtolower($cat['label'])); ?> gateways found.</p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/payment-gateways/index.blade.php ENDPATH**/ ?>