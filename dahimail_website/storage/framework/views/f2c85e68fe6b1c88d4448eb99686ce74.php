<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Create Coupon'),'subtitle' => __('Add a new discount coupon synced to Stripe.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create Coupon')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Add a new discount coupon synced to Stripe.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6" x-data="couponForm()">

        <form method="POST" action="<?php echo e(route('admin.coupons.store')); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Coupon Details')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('This coupon will be synced to Stripe upon creation.')); ?></p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Name')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required aria-required="true"
                                   placeholder="<?php echo e(__('e.g. Summer Sale 20% Off')); ?>"
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
                            <label for="code" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Code')); ?></label>
                            <input type="text" name="code" id="code" value="<?php echo e(old('code')); ?>"
                                   placeholder="<?php echo e(__('Auto-generated if empty')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink font-mono uppercase <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <p class="text-xs text-muted mt-1"><?php echo e(__('Letters, numbers, dashes, underscores. Leave blank to auto-generate.')); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['code'];
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
            </div>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Discount')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Choose the discount type and value.')); ?></p>
                </div>
                <div class="p-6 space-y-5">
                    
                    <div>
                        <label for="type" class="block text-sm font-medium text-ink mb-1.5">
                            <?php echo e(__('Discount Type')); ?> <span class="text-danger" aria-hidden="true">*</span>
                            <span class="relative inline-block ml-1" x-data="{ show: false }">
                                <svg @mouseenter="show = true" @mouseleave="show = false" class="w-4 h-4 inline text-muted/60 cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div x-show="show" x-transition class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-ink rounded-lg shadow-lg whitespace-nowrap z-50">
                                    <?php echo e(__('Percentage applies a % discount. Fixed Amount deducts a specific dollar value.')); ?>

                                    <div class="absolute top-full left-1/2 -translate-x-1/2 -mt-1 w-2 h-2 bg-ink rotate-45"></div>
                                </div>
                            </span>
                        </label>
                        <select name="type" id="type" x-model="type" required aria-required="true"
                                class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="percent_off"><?php echo e(__('Percentage Off')); ?></option>
                            <option value="amount_off"><?php echo e(__('Fixed Amount Off')); ?></option>
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

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div x-show="type === 'percent_off'" x-transition>
                            <label for="percent_off" class="block text-sm font-medium text-ink mb-1.5">
                                <?php echo e(__('Percentage')); ?> <span class="text-danger" aria-hidden="true">*</span>
                                <span class="relative inline-block ml-1" x-data="{ show: false }">
                                    <svg @mouseenter="show = true" @mouseleave="show = false" class="w-4 h-4 inline text-muted/60 cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div x-show="show" x-transition class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-ink rounded-lg shadow-lg whitespace-nowrap z-50">
                                        <?php echo e(__('Enter a value between 1 and 100. For example, 20 means 20% off.')); ?>

                                        <div class="absolute top-full left-1/2 -translate-x-1/2 -mt-1 w-2 h-2 bg-ink rotate-45"></div>
                                    </div>
                                </span>
                            </label>
                            <div class="relative">
                                <input type="number" name="percent_off" id="percent_off" value="<?php echo e(old('percent_off')); ?>"
                                       min="1" max="100" step="0.01"
                                       placeholder="<?php echo e(__('e.g. 20')); ?>"
                                       :required="type === 'percent_off'"
                                       :aria-required="type === 'percent_off' ? 'true' : 'false'"
                                       class="w-full px-4 pr-10 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['percent_off'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm text-muted font-medium">%</span>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['percent_off'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div x-show="type === 'amount_off'" x-transition>
                            <label for="amount_off" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Amount')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-muted font-medium">$</span>
                                <input type="number" name="amount_off" id="amount_off" value="<?php echo e(old('amount_off')); ?>"
                                       min="0.01" step="0.01"
                                       placeholder="<?php echo e(__('e.g. 10.00')); ?>"
                                       :required="type === 'amount_off'"
                                       :aria-required="type === 'amount_off' ? 'true' : 'false'"
                                       class="w-full pl-8 pr-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['amount_off'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['amount_off'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div x-show="type === 'amount_off'" x-transition>
                            <label for="currency" class="block text-sm font-medium text-ink mb-1.5">
                                <?php echo e(__('Currency')); ?>

                                <span class="relative inline-block ml-1" x-data="{ show: false }">
                                    <svg @mouseenter="show = true" @mouseleave="show = false" class="w-4 h-4 inline text-muted/60 cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div x-show="show" x-transition class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-ink rounded-lg shadow-lg whitespace-nowrap z-50">
                                        <?php echo e(__('The currency used for the fixed discount amount.')); ?>

                                        <div class="absolute top-full left-1/2 -translate-x-1/2 -mt-1 w-2 h-2 bg-ink rotate-45"></div>
                                    </div>
                                </span>
                            </label>
                            <select name="currency" id="currency"
                                    class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="USD" <?php echo e(old('currency', 'USD') === 'USD' ? 'selected' : ''); ?>><?php echo e(__('USD - US Dollar')); ?></option>
                                <option value="EUR" <?php echo e(old('currency') === 'EUR' ? 'selected' : ''); ?>><?php echo e(__('EUR - Euro')); ?></option>
                                <option value="GBP" <?php echo e(old('currency') === 'GBP' ? 'selected' : ''); ?>><?php echo e(__('GBP - British Pound')); ?></option>
                                <option value="CAD" <?php echo e(old('currency') === 'CAD' ? 'selected' : ''); ?>><?php echo e(__('CAD - Canadian Dollar')); ?></option>
                                <option value="AUD" <?php echo e(old('currency') === 'AUD' ? 'selected' : ''); ?>><?php echo e(__('AUD - Australian Dollar')); ?></option>
                                <option value="INR" <?php echo e(old('currency') === 'INR' ? 'selected' : ''); ?>><?php echo e(__('INR - Indian Rupee')); ?></option>
                                <option value="JPY" <?php echo e(old('currency') === 'JPY' ? 'selected' : ''); ?>><?php echo e(__('JPY - Japanese Yen')); ?></option>
                                <option value="BRL" <?php echo e(old('currency') === 'BRL' ? 'selected' : ''); ?>><?php echo e(__('BRL - Brazilian Real')); ?></option>
                                <option value="SGD" <?php echo e(old('currency') === 'SGD' ? 'selected' : ''); ?>><?php echo e(__('SGD - Singapore Dollar')); ?></option>
                                <option value="CHF" <?php echo e(old('currency') === 'CHF' ? 'selected' : ''); ?>><?php echo e(__('CHF - Swiss Franc')); ?></option>
                            </select>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['currency'];
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
            </div>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Duration & Limits')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Control how long the discount applies and how many times it can be used.')); ?></p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div>
                            <label for="duration" class="block text-sm font-medium text-ink mb-1.5">
                                <?php echo e(__('Duration')); ?> <span class="text-danger" aria-hidden="true">*</span>
                                <span class="relative inline-block ml-1" x-data="{ show: false }">
                                    <svg @mouseenter="show = true" @mouseleave="show = false" class="w-4 h-4 inline text-muted/60 cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div x-show="show" x-transition class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-ink rounded-lg shadow-lg whitespace-nowrap z-50">
                                        <?php echo e(__("How long the discount applies to a customer's subscription billing.")); ?>

                                        <div class="absolute top-full left-1/2 -translate-x-1/2 -mt-1 w-2 h-2 bg-ink rotate-45"></div>
                                    </div>
                                </span>
                            </label>
                            <select name="duration" id="duration" x-model="duration" required aria-required="true"
                                    class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="once"><?php echo e(__('Once (first invoice only)')); ?></option>
                                <option value="repeating"><?php echo e(__('Repeating (multiple months)')); ?></option>
                                <option value="forever"><?php echo e(__('Forever (every invoice)')); ?></option>
                            </select>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div x-show="duration === 'repeating'" x-transition>
                            <label for="duration_in_months" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Number of Months')); ?> <span class="text-danger" aria-hidden="true">*</span></label>
                            <input type="number" name="duration_in_months" id="duration_in_months" value="<?php echo e(old('duration_in_months')); ?>"
                                   min="1" max="36"
                                   placeholder="<?php echo e(__('e.g. 3')); ?>"
                                   :required="duration === 'repeating'"
                                   :aria-required="duration === 'repeating' ? 'true' : 'false'"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['duration_in_months'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['duration_in_months'];
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
                            <label for="max_redemptions" class="block text-sm font-medium text-ink mb-1.5">
                                <?php echo e(__('Maximum Uses')); ?>

                                <span class="relative inline-block ml-1" x-data="{ show: false }">
                                    <svg @mouseenter="show = true" @mouseleave="show = false" class="w-4 h-4 inline text-muted/60 cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div x-show="show" x-transition class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 text-xs text-white bg-ink rounded-lg shadow-lg whitespace-nowrap z-50">
                                        <?php echo e(__('Total number of times this coupon can be applied across all customers.')); ?>

                                        <div class="absolute top-full left-1/2 -translate-x-1/2 -mt-1 w-2 h-2 bg-ink rotate-45"></div>
                                    </div>
                                </span>
                            </label>
                            <input type="number" name="max_redemptions" id="max_redemptions" value="<?php echo e(old('max_redemptions')); ?>"
                                   min="1"
                                   placeholder="<?php echo e(__('Unlimited')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['max_redemptions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <p class="text-xs text-muted mt-1"><?php echo e(__('Leave blank for unlimited uses.')); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['max_redemptions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="expires_at" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Expiration Date')); ?></label>
                            <input type="date" name="expires_at" id="expires_at" value="<?php echo e(old('expires_at')); ?>"
                                   min="<?php echo e(now()->addDay()->format('Y-m-d')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['expires_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <p class="text-xs text-muted mt-1"><?php echo e(__('Leave blank for no expiration.')); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['expires_at'];
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
            </div>

            
            <div class="flex items-center justify-between">
                <a href="<?php echo e(route('admin.coupons.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <?php echo e(__('Back to Coupons')); ?>

                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand text-white text-sm font-semibold rounded-xl hover:bg-brand-strong shadow-lg shadow-soft transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php echo e(__('Create Coupon')); ?>

                </button>
            </div>
        </form>
    </div>

    <script>
    function couponForm() {
        return {
            type: '<?php echo e(old('type', 'percent_off')); ?>',
            duration: '<?php echo e(old('duration', 'once')); ?>',
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/coupons/create.blade.php ENDPATH**/ ?>