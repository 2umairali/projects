<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Create Plan'),'subtitle' => __('Add a new subscription plan.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create Plan')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Add a new subscription plan.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6" x-data="planForm()">

        <form method="POST" action="<?php echo e(route('admin.plans.store')); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>

            
            <div class="panel p-1.5">
                <div class="flex flex-wrap gap-1">
                    <?php
                    $planTabs = [
                        ['id' => 'basic',    'label' => __('Basic Info'),       'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['id' => 'limits',   'label' => __('Resource Limits'),  'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                        ['id' => 'features', 'label' => __('Feature Access'),   'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['id' => 'bullets',  'label' => __('Pricing Bullets'),  'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
                    ];
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $planTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <button type="button" @click="activeTab = '<?php echo e($tab['id']); ?>'"
                            :class="activeTab === '<?php echo e($tab['id']); ?>' ? 'bg-brand text-white shadow-soft' : 'text-muted hover:bg-surface hover:text-ink'"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($tab['icon']); ?>"/></svg>
                        <span class="hidden sm:inline"><?php echo e($tab['label']); ?></span>
                    </button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>

            
            <div x-show="activeTab === 'basic'" x-cloak class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <div class="flex items-center gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-brand/10 text-brand">
                            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Basic Information')); ?></h2>
                            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Define the plan identity and pricing.')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="p-6 space-y-5">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Plan Name')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                            <input type="text" name="name" id="name" required aria-required="true"
                                   x-model="name"
                                   @input="if(autoSlug) slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '')"
                                   placeholder="<?php echo e(__('e.g. Professional')); ?>"
                                   value="<?php echo e(old('name')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label for="slug" class="block text-sm font-medium text-ink mb-1.5">
                                <?php echo e(__('Slug')); ?> <span class="text-danger" aria-hidden="true">*</span>
                                <button type="button" @click="autoSlug = !autoSlug" class="ml-2 text-xs font-normal text-brand hover:underline" x-text="autoSlug ? '<?php echo e(__('Manual')); ?>' : '<?php echo e(__('Auto-generate')); ?>'"></button>
                            </label>
                            <input type="text" name="slug" id="slug" required aria-required="true"
                                   x-model="slug"
                                   @input="autoSlug = false"
                                   placeholder="<?php echo e(__('e.g. professional')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink font-mono <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <p class="text-xs text-muted mt-1"><?php echo e(__('Letters, numbers, dashes, and underscores only.')); ?></p>
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

                    
                    <div>
                        <label for="description" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Description')); ?></label>
                        <textarea name="description" id="description" rows="3"
                                  placeholder="<?php echo e(__('A short description of what this plan offers...')); ?>"
                                  class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink resize-none <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('description')); ?></textarea>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="monthly_price" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Monthly Price')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-muted font-medium">$</span>
                                <input type="number" name="monthly_price" id="monthly_price" required aria-required="true" min="0" step="0.01"
                                       x-model="monthlyPrice"
                                       value="<?php echo e(old('monthly_price', '0')); ?>"
                                       class="w-full pl-8 pr-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['monthly_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['monthly_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label for="yearly_price" class="block text-sm font-medium text-ink mb-1.5">
                                <?php echo e(__('Yearly Price')); ?> <span class="text-danger" aria-hidden="true">*</span>
                                <template x-if="yearlySavings > 0">
                                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-success/10 text-success" x-text="'Save ' + yearlySavings + '%'"></span>
                                </template>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-muted font-medium">$</span>
                                <input type="number" name="yearly_price" id="yearly_price" required aria-required="true" min="0" step="0.01"
                                       x-model="yearlyPrice"
                                       value="<?php echo e(old('yearly_price', '0')); ?>"
                                       class="w-full pl-8 pr-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['yearly_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            </div>
                            <p class="text-xs text-muted mt-1" x-show="monthlyPrice > 0" x-text="'Equivalent to $' + (yearlyPrice / 12).toFixed(2) + '/mo'"></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['yearly_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Sort Order')); ?></label>
                            <input type="number" name="sort_order" id="sort_order" value="<?php echo e(old('sort_order', '0')); ?>" min="0"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['sort_order'];
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
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', '1') == '1' ? 'checked' : ''); ?> class="sr-only peer">
                                <div class="w-10 h-5 bg-gray-200 dark:bg-gray-600 peer-focus:ring-2 peer-focus:ring-brand/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand"></div>
                            </label>
                            <div>
                                <span class="text-sm font-medium text-ink"><?php echo e(__('Active')); ?></span>
                                <p class="text-xs text-muted"><?php echo e(__('Visible to customers')); ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 sm:pt-7">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_popular" value="0">
                                <input type="checkbox" name="is_popular" value="1" <?php echo e(old('is_popular', '0') == '1' ? 'checked' : ''); ?> class="sr-only peer">
                                <div class="w-10 h-5 bg-gray-200 dark:bg-gray-600 peer-focus:ring-2 peer-focus:ring-warning/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-warning"></div>
                            </label>
                            <div>
                                <span class="text-sm font-medium text-ink"><?php echo e(__('Popular Badge')); ?></span>
                                <p class="text-xs text-muted"><?php echo e(__('Highlight on pricing page')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div x-show="activeTab === 'limits'" x-cloak class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <div class="flex items-center gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-purple-500/10 text-purple-500">
                            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Resource Limits')); ?></h2>
                            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Set numeric limits for each resource. Check "Unlimited" to remove the cap.')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        <template x-for="(item, index) in resourceLimits" :key="item.key">
                            <div class="p-4 bg-surface/50 rounded-xl border border-border">
                                <div class="flex items-center justify-between mb-3">
                                    <label class="text-sm font-medium text-ink" x-text="item.label"></label>
                                    <label class="inline-flex items-center gap-1.5 cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" x-model="item.unlimited"
                                               @change="if(item.unlimited) item.value = null">
                                        <div class="w-8 h-[18px] bg-gray-200 dark:bg-gray-600 peer-focus:ring-2 peer-focus:ring-brand/30 rounded-full peer peer-checked:after:translate-x-3.5 peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3.5 after:w-3.5 after:transition-all peer-checked:bg-brand relative"></div>
                                        <span class="text-xs text-muted"><?php echo e(__('Unlimited')); ?></span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input type="number" min="0"
                                           :name="'limits[' + item.key + ']'"
                                           x-model="item.value"
                                           :disabled="item.unlimited"
                                           :placeholder="item.unlimited ? '<?php echo e(__('Unlimited')); ?>' : '0'"
                                           :class="item.unlimited ? 'opacity-40 cursor-not-allowed' : ''"
                                           class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink">
                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-muted" x-show="item.suffix" x-text="item.suffix"></span>
                                </div>
                                <input type="hidden" :name="'limits_unlimited[' + item.key + ']'" :value="item.unlimited ? '1' : '0'">
                                <p class="text-xs text-muted mt-1.5" x-text="item.help"></p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            
            <div x-show="activeTab === 'features'" x-cloak class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <div class="flex items-center gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-success/10 text-success">
                            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Feature Access')); ?></h2>
                            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Toggle which integrations and capabilities are included.')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <template x-for="(toggle, index) in featureToggles" :key="toggle.key">
                            <div class="flex items-center justify-between p-4 bg-surface/50 rounded-xl border border-border transition-colors"
                                 :class="toggle.enabled ? 'border-brand/20 bg-brand/[0.02]' : ''">
                                <div class="flex-1 min-w-0 mr-4">
                                    <p class="text-sm font-medium text-ink" x-text="toggle.label"></p>
                                    <p class="text-xs text-muted mt-0.5" x-text="toggle.description"></p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer shrink-0">
                                    <input type="hidden" :name="'toggles[' + toggle.key + ']'" :value="toggle.enabled ? '1' : '0'">
                                    <input type="checkbox" x-model="toggle.enabled" class="sr-only peer">
                                    <div class="w-10 h-5 bg-gray-200 dark:bg-gray-600 peer-focus:ring-2 peer-focus:ring-brand/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand"></div>
                                </label>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            
            <div x-show="activeTab === 'bullets'" x-cloak class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-warning/10 text-warning">
                            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Plan Features List')); ?></h2>
                            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Bullet points displayed on the pricing page.')); ?></p>
                        </div>
                    </div>
                    <button type="button" @click="addPricingFeature()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-brand border border-brand/20 rounded-lg hover:bg-brand/10 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <?php echo e(__('Add Feature')); ?>

                    </button>
                </div>
                <div class="p-6">
                    <template x-if="pricingFeatures.length === 0">
                        <div class="text-center py-8">
                            <svg class="w-10 h-10 text-muted/40 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            <p class="text-sm text-muted"><?php echo e(__('No features listed yet.')); ?></p>
                            <button type="button" @click="addPricingFeature()" class="mt-2 text-sm text-brand hover:underline font-medium"><?php echo e(__('Add your first feature bullet')); ?></button>
                        </div>
                    </template>

                    <div class="space-y-2">
                        <template x-for="(feature, index) in pricingFeatures" :key="index">
                            <div class="flex items-center gap-3 group">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-success/10 text-success text-xs font-bold" x-text="index + 1"></span>
                                <input type="text" :name="'features[' + index + ']'" x-model="pricingFeatures[index]"
                                       placeholder="<?php echo e(__('e.g. 10 email accounts')); ?>"
                                       class="flex-1 px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink">
                                <button type="button" @click="pricingFeatures.splice(index, 1)"
                                        class="p-1.5 text-muted hover:text-danger hover:bg-danger/10 rounded-lg transition-colors opacity-0 group-hover:opacity-100" title="<?php echo e(__('Remove')); ?>">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            
            <div class="flex items-center justify-between">
                <a href="<?php echo e(route('admin.plans.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <?php echo e(__('Cancel')); ?>

                </a>
                <div class="flex items-center gap-3">
                    <button type="submit" name="action" value="save_and_create"
                            class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-brand border border-brand/20 rounded-xl hover:bg-brand/10 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <?php echo e(__('Save & Create Another')); ?>

                    </button>
                    <button type="submit" name="action" value="save"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand text-white text-sm font-semibold rounded-xl hover:bg-brand/90 shadow-lg shadow-brand/20 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <?php echo e(__('Create Plan')); ?>

                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
    function planForm() {
        return {
            activeTab: 'basic',
            name: '<?php echo e(old("name", "")); ?>',
            slug: '<?php echo e(old("slug", "")); ?>',
            autoSlug: <?php echo e(old('slug') ? 'false' : 'true'); ?>,
            monthlyPrice: <?php echo e(old('monthly_price', 0)); ?>,
            yearlyPrice: <?php echo e(old('yearly_price', 0)); ?>,

            get yearlySavings() {
                if (this.monthlyPrice <= 0 || this.yearlyPrice <= 0) return 0;
                const fullYearly = this.monthlyPrice * 12;
                const pct = Math.round(((fullYearly - this.yearlyPrice) / fullYearly) * 100);
                return pct > 0 ? pct : 0;
            },

            resourceLimits: [
                { key: 'email_accounts', label: 'Email Accounts', value: <?php echo e(old('limits.email_accounts', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.email_accounts', 'false') === '1' ? 'true' : 'false'); ?>, suffix: '', help: 'Number of email accounts the user can connect.' },
                { key: 'ai_replies', label: 'AI Replies / Month', value: <?php echo e(old('limits.ai_replies', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.ai_replies', 'false') === '1' ? 'true' : 'false'); ?>, suffix: '/mo', help: 'AI-generated replies allowed per month.' },
                { key: 'contacts', label: 'Contacts', value: <?php echo e(old('limits.contacts', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.contacts', 'false') === '1' ? 'true' : 'false'); ?>, suffix: '', help: 'Maximum number of contacts in address book.' },
                { key: 'team_members', label: 'Team Members', value: <?php echo e(old('limits.team_members', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.team_members', 'false') === '1' ? 'true' : 'false'); ?>, suffix: '', help: 'Max workspace members including owner.' },
                { key: 'storage_mb', label: 'Storage', value: <?php echo e(old('limits.storage_mb', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.storage_mb', 'false') === '1' ? 'true' : 'false'); ?>, suffix: 'MB', help: 'File storage space in megabytes.' },
                { key: 'campaigns_per_month', label: 'Campaigns / Month', value: <?php echo e(old('limits.campaigns_per_month', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.campaigns_per_month', 'false') === '1' ? 'true' : 'false'); ?>, suffix: '/mo', help: 'Email campaigns allowed per month.' },
                { key: 'workflows', label: 'Workflows', value: <?php echo e(old('limits.workflows', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.workflows', 'false') === '1' ? 'true' : 'false'); ?>, suffix: '', help: 'Automation workflows the user can create.' },
                { key: 'kb_documents', label: 'KB Documents', value: <?php echo e(old('limits.kb_documents', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.kb_documents', 'false') === '1' ? 'true' : 'false'); ?>, suffix: '', help: 'Knowledge base documents for AI training.' },
                { key: 'kb_file_size_mb', label: 'KB Max File Size', value: <?php echo e(old('limits.kb_file_size_mb', 'null')); ?>, unlimited: false, suffix: 'MB', help: 'Maximum single file upload size.' },
                { key: 'temp_mail_addresses', label: 'Temp Mail Addresses', value: <?php echo e(old('limits.temp_mail_addresses', 'null')); ?>, unlimited: <?php echo e(old('limits_unlimited.temp_mail_addresses', 'false') === '1' ? 'true' : 'false'); ?>, suffix: '', help: 'Number of active temp mail addresses allowed.' },
                { key: 'temp_mail_lifetime_hours', label: 'Temp Mail Lifetime (Hours)', value: <?php echo e(old('limits.temp_mail_lifetime_hours', 'null')); ?>, unlimited: false, suffix: 'hrs', help: 'How long temp mail addresses remain active.' },
            ],

            featureToggles: [
                { key: 'knowledge_base', label: 'Knowledge Base', description: 'AI training with documents, website scraping, and Q&A.', enabled: <?php echo e(old('toggles.knowledge_base', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'campaigns', label: 'Email Campaigns', description: 'Create and send bulk email campaigns.', enabled: <?php echo e(old('toggles.campaigns', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'deal_pipeline', label: 'Deals & Pipeline', description: 'Sales pipeline and deal management.', enabled: <?php echo e(old('toggles.deal_pipeline', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'analytics', label: 'Analytics & Reports', description: 'Advanced analytics dashboard and reports.', enabled: <?php echo e(old('toggles.analytics', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'whatsapp', label: 'WhatsApp Integration', description: 'Send and receive WhatsApp messages from inbox.', enabled: <?php echo e(old('toggles.whatsapp', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'sms', label: 'SMS Integration', description: 'Two-way SMS messaging via Twilio or other providers.', enabled: <?php echo e(old('toggles.sms', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'telegram', label: 'Telegram Integration', description: 'Connect Telegram bots and channels.', enabled: <?php echo e(old('toggles.telegram', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'slack', label: 'Slack Integration', description: 'Receive notifications and reply from Slack.', enabled: <?php echo e(old('toggles.slack', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'live_chat', label: 'Live Chat', description: 'Embeddable live chat widget for websites.', enabled: <?php echo e(old('toggles.live_chat', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'api_access', label: 'API Access', description: 'REST API access for custom integrations.', enabled: <?php echo e(old('toggles.api_access', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'priority_support', label: 'Priority Support', description: 'Faster response times and dedicated support.', enabled: <?php echo e(old('toggles.priority_support', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'custom_roles', label: 'Custom Roles', description: 'Create custom team roles with granular permissions.', enabled: <?php echo e(old('toggles.custom_roles', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'white_label', label: 'White Label', description: 'Remove <?php echo e(config('app.name')); ?> branding and use your own.', enabled: <?php echo e(old('toggles.white_label', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'sso_saml', label: 'SSO / SAML', description: 'Enterprise single sign-on via SAML 2.0.', enabled: <?php echo e(old('toggles.sso_saml', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'temp_mail', label: 'Temp Mail', description: 'Generate disposable temporary email addresses.', enabled: <?php echo e(old('toggles.temp_mail', '0') == '1' ? 'true' : 'false'); ?> },
                // ── Premium AI / Campaign features (added in Phase 2/3) ──
                // ai_own_key: user can plug in their own LLM API key (Pro+)
                // ai_per_channel: per-channel AI behavior cards (Pro+)
                // ai_auto_escalation: auto handoff to humans on low confidence (Pro+)
                // sms_campaigns: bulk SMS broadcasts via Twilio (Pro+)
                { key: 'ai_own_key', label: 'AI: Use Own API Key', description: 'Allow users to plug in their own OpenAI / Anthropic API key (otherwise platform keys are used).', enabled: <?php echo e(old('toggles.ai_own_key', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'ai_per_channel', label: 'AI: Per-Channel Settings', description: 'Custom AI prompt, send-mode, and confidence per channel (Email / WhatsApp / SMS / Live Chat / Telegram).', enabled: <?php echo e(old('toggles.ai_per_channel', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'ai_auto_escalation', label: 'AI: Auto-Escalation', description: 'Automatically assign low-confidence conversations to a human agent and notify them.', enabled: <?php echo e(old('toggles.ai_auto_escalation', '0') == '1' ? 'true' : 'false'); ?> },
                { key: 'sms_campaigns', label: 'SMS Bulk Campaigns', description: 'Send bulk SMS broadcasts to contact lists via Twilio.', enabled: <?php echo e(old('toggles.sms_campaigns', '0') == '1' ? 'true' : 'false'); ?> },
                // Free-by-default features. Listed here so admins can disable them on
                // ultra-restricted plans if needed; default ON for new plans.
                { key: 'email_templates', label: 'Workflow Email Templates', description: 'Template dropdown inside the workflow Send Email action.', enabled: <?php echo e(old('toggles.email_templates', '1') == '1' ? 'true' : 'false'); ?> },
                { key: 'workflow_in_app_notify', label: 'Workflow In-App Notifications', description: 'Send Notification action with the in-app (bell icon) channel.', enabled: <?php echo e(old('toggles.workflow_in_app_notify', '1') == '1' ? 'true' : 'false'); ?> },
            ],

            pricingFeatures: <?php echo json_encode(old('features', []), 512) ?>,

            addPricingFeature() {
                this.pricingFeatures.push('');
                this.$nextTick(() => {
                    const inputs = this.$el.querySelectorAll('input[name^="features["]');
                    if (inputs.length) inputs[inputs.length - 1].focus();
                });
            },
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/plans/create.blade.php ENDPATH**/ ?>