<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Checkout — '.e($plan->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Checkout — '.e($plan->name).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<div class="max-w-4xl mx-auto" x-data="{
    selectedGateway: '',
    selectedCurrency: '<?php echo e($defaultCurrency); ?>',
    basePrice: <?php echo e($price); ?>,
    gatewayCurrencies: <?php echo \Illuminate\Support\Js::from($gatewayCurrencies)->toHtml() ?>,
    currencySymbols: <?php echo \Illuminate\Support\Js::from($currencySymbols)->toHtml() ?>,
    exchangeRates: <?php echo \Illuminate\Support\Js::from($currencies->pluck('exchange_rate', 'code'))->toHtml() ?>,

    // Coupon state
    couponCode: '<?php echo e($couponCode); ?>',
    couponValid: false,
    couponMessage: '',
    couponType: '',
    couponValue: 0,
    couponName: '',
    couponLoading: false,
    couponError: false,

    get filteredGateways() {
        const c = this.selectedCurrency;
        return Object.entries(this.gatewayCurrencies).filter(([slug, currencies]) => {
            return currencies.length === 0 || currencies.includes(c);
        }).map(([slug]) => slug);
    },
    get currencySymbol() {
        return this.currencySymbols[this.selectedCurrency] || this.selectedCurrency;
    },
    get convertedPrice() {
        const rate = this.exchangeRates[this.selectedCurrency] || 1;
        return (this.basePrice * rate).toFixed(2);
    },
    get discountAmount() {
        if (!this.couponValid) return 0;
        const price = parseFloat(this.convertedPrice);
        if (this.couponType === 'percent') {
            return (price * (this.couponValue / 100)).toFixed(2);
        }
        return Math.min(this.couponValue, price).toFixed(2);
    },
    get finalPrice() {
        if (!this.couponValid) return this.convertedPrice;
        return Math.max(0, parseFloat(this.convertedPrice) - parseFloat(this.discountAmount)).toFixed(2);
    },

    async applyCoupon() {
        if (!this.couponCode.trim()) return;
        this.couponLoading = true;
        this.couponError = false;
        this.couponValid = false;
        this.couponMessage = '';
        try {
            const response = await fetch('<?php echo e(route('checkout.validate-coupon')); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    code: this.couponCode,
                    plan_id: <?php echo e($plan->id); ?>,
                }),
            });
            const data = await response.json();
            if (data.valid) {
                this.couponValid = true;
                this.couponType = data.type;
                this.couponValue = parseFloat(data.value);
                this.couponName = data.name;
                this.couponMessage = data.message;
                this.couponError = false;
            } else {
                this.couponValid = false;
                this.couponMessage = data.message;
                this.couponError = true;
            }
        } catch (e) {
            this.couponMessage = '<?php echo e(__("Failed to validate coupon. Please try again.")); ?>';
            this.couponError = true;
        }
        this.couponLoading = false;
    },

    removeCoupon() {
        this.couponCode = '';
        this.couponValid = false;
        this.couponMessage = '';
        this.couponType = '';
        this.couponValue = 0;
        this.couponName = '';
        this.couponError = false;
    }
}">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 space-y-6">
            <div>
                <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Complete Your Purchase')); ?></h1>
                <p class="text-sm text-muted mt-1"><?php echo e(__('Choose your preferred payment method to subscribe to')); ?> <?php echo e($plan->name); ?>.</p>
            </div>

            
            <div class="bg-surface-2 rounded-2xl border border-border p-5">
                <label class="block text-sm font-semibold text-ink mb-2"><?php echo e(__('Currency')); ?></label>
                <select x-model="selectedCurrency" class="w-full sm:w-64 px-4 py-2.5 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $availableCurrencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <option value="<?php echo e($code); ?>"><?php echo e($code); ?> <?php echo e($currencySymbols[$code] ?? ''); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
                <p class="text-xs text-muted mt-2"><?php echo e(__('Payment will be processed in the selected currency. Available gateways depend on currency.')); ?></p>
            </div>

            
            <div class="bg-surface-2 rounded-2xl border border-border p-5">
                <label class="block text-sm font-semibold text-ink mb-3"><?php echo e(__('Payment Method')); ?></label>

                <div class="space-y-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    
                    <label x-show="filteredGateways.includes('<?php echo e($gw->slug); ?>')"
                           x-transition
                           class="flex items-center gap-4 p-4 border-2 rounded-xl cursor-pointer transition-all"
                           :class="selectedGateway === '<?php echo e($gw->slug); ?>' ? 'border-brand bg-brand/10 ring-1 ring-brand/40' : 'border-border hover:border-brand/40'">
                        <input type="radio" name="gateway_radio" value="<?php echo e($gw->slug); ?>" x-model="selectedGateway" class="sr-only">

                        
                        <div class="w-10 h-10 rounded-xl bg-surface flex items-center justify-center border border-border shrink-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gw->logo): ?>
                            <img src="<?php echo e(asset($gw->logo)); ?>" alt="<?php echo e($gw->name); ?>" class="w-6 h-6 object-contain">
                            <?php else: ?>
                            <span class="text-xs font-bold text-brand"><?php echo e(strtoupper(substr($gw->slug, 0, 2))); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-ink"><?php echo e($gw->name); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gw->description): ?>
                            <p class="text-xs text-muted line-clamp-1"><?php echo e($gw->description); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0"
                             :class="selectedGateway === '<?php echo e($gw->slug); ?>' ? 'border-brand bg-brand' : 'border-border'">
                            <svg x-show="selectedGateway === '<?php echo e($gw->slug); ?>'" class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </label>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                
                <div x-show="filteredGateways.length === 0" class="text-center py-8">
                    <p class="text-sm text-muted"><?php echo e(__('No payment methods available for this currency. Please select a different currency.')); ?></p>
                </div>
            </div>
        </div>

        
        <div class="lg:col-span-1">
            <div class="bg-surface-2 rounded-2xl border border-border p-5 sticky top-24 space-y-4">
                <h2 class="text-sm font-semibold text-ink uppercase tracking-wide"><?php echo e(__('Order Summary')); ?></h2>

                <div class="bg-gradient-to-br from-primary-600 to-secondary-600 rounded-xl p-4 text-white">
                    <p class="text-sm font-medium text-white/80"><?php echo e($plan->name); ?> <?php echo e(__('Plan')); ?></p>
                    <template x-if="!couponValid">
                        <p class="text-3xl font-extrabold mt-1"><span x-text="currencySymbol"></span><span x-text="convertedPrice"></span></p>
                    </template>
                    <template x-if="couponValid">
                        <div>
                            <p class="text-lg line-through text-white/50 mt-1"><span x-text="currencySymbol"></span><span x-text="convertedPrice"></span></p>
                            <p class="text-3xl font-extrabold"><span x-text="currencySymbol"></span><span x-text="finalPrice"></span></p>
                        </div>
                    </template>
                    <p class="text-xs text-white/60 mt-0.5"><?php echo e($billingCycle === 'yearly' ? __('per year') : __('per month')); ?> <span x-show="selectedCurrency !== 'USD'" class="text-white/40">(<span x-text="selectedCurrency"></span>)</span></p>
                </div>

                
                <div class="space-y-2">
                    <label class="block text-xs font-semibold text-ink uppercase tracking-wide"><?php echo e(__('Coupon Code')); ?></label>
                    <template x-if="!couponValid">
                        <div class="flex gap-2">
                            <input type="text"
                                   x-model="couponCode"
                                   @keydown.enter.prevent="applyCoupon()"
                                   placeholder="<?php echo e(__('ENTER COUPON CODE')); ?>"
                                   class="flex-1 min-w-0 px-3 py-2 text-sm bg-surface border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 uppercase">
                            <button type="button"
                                    @click="applyCoupon()"
                                    :disabled="couponLoading || !couponCode.trim()"
                                    class="px-4 py-2 text-sm font-medium bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors disabled:opacity-40 disabled:cursor-not-allowed whitespace-nowrap">
                                <span x-show="!couponLoading"><?php echo e(__('Apply')); ?></span>
                                <span x-show="couponLoading">...</span>
                            </button>
                        </div>
                    </template>
                    <template x-if="couponValid">
                        <div class="flex items-center justify-between bg-success/10 border border-success/20 rounded-lg px-3 py-2">
                            <div>
                                <p class="text-sm font-semibold text-success" x-text="couponCode.toUpperCase()"></p>
                                <p class="text-xs text-success/80" x-text="couponMessage"></p>
                            </div>
                            <button type="button" @click="removeCoupon()" class="text-muted hover:text-danger transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </template>
                    <p x-show="couponError" x-text="couponMessage" class="text-xs text-danger"></p>
                </div>

                
                <template x-if="couponValid">
                    <div class="bg-surface rounded-xl p-3 space-y-1.5 text-sm">
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Original price')); ?></span>
                            <span class="text-ink"><span x-text="currencySymbol"></span><span x-text="convertedPrice"></span></span>
                        </div>
                        <div class="flex justify-between text-success">
                            <span><?php echo e(__('Discount')); ?></span>
                            <span>-<span x-text="currencySymbol"></span><span x-text="discountAmount"></span></span>
                        </div>
                        <div class="border-t border-border pt-1.5 flex justify-between font-semibold">
                            <span class="text-ink"><?php echo e(__('Total')); ?></span>
                            <span class="text-ink"><span x-text="currencySymbol"></span><span x-text="finalPrice"></span></span>
                        </div>
                    </div>
                </template>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->features): ?>
                <ul class="space-y-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $plan->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($key !== 'trial_days'): ?>
                    <?php
                        if (is_numeric($key)) {
                            // Plain array: value is the feature string itself
                            $display = is_string($value) ? $value : '';
                        } else {
                            // Associative array: key is feature name, value is count/boolean
                            $label = str_replace('_', ' ', $key);
                            $display = is_bool($value) || $value === true ? ucfirst($label) : (strtolower((string)$value) === 'unlimited' ? 'Unlimited ' . $label : $value . ' ' . $label);
                        }
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($display): ?>
                    <li class="flex items-start gap-2 text-xs text-muted">
                        <svg class="w-3.5 h-3.5 text-success flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <?php echo e($display); ?>

                    </li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ul>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <form method="POST" action="<?php echo e(route('checkout.process', $plan->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="billing_cycle" value="<?php echo e($billingCycle); ?>">
                    <input type="hidden" name="gateway" :value="selectedGateway">
                    <input type="hidden" name="currency" :value="selectedCurrency">
                    <input type="hidden" name="coupon_code" :value="couponValid ? couponCode : ''">

                    <button type="submit"
                            :disabled="!selectedGateway"
                            class="w-full py-3 px-4 text-sm font-semibold rounded-xl transition-all disabled:opacity-40 disabled:cursor-not-allowed"
                            :class="selectedGateway ? 'bg-primary-600 text-white hover:bg-primary-700 shadow-sm' : 'bg-gray-300 text-gray-500'">
                        <?php echo e(__('Pay & Subscribe')); ?>

                    </button>
                </form>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <div class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-xs"><?php echo e(session('error')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <p class="text-[10px] text-muted text-center leading-relaxed">
                    <?php echo e(__('By proceeding, you agree to our')); ?> <a href="<?php echo e(route('legal.terms')); ?>" class="underline"><?php echo e(__('Terms of Service')); ?></a>.
                    <?php echo e(__('Your subscription will auto-renew. Cancel anytime from billing settings.')); ?>

                </p>
            </div>
        </div>
    </div>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/checkout/index.blade.php ENDPATH**/ ?>