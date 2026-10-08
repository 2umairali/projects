<div class="space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="<?php echo e(route('campaigns')); ?>" class="p-1.5 text-muted/60 hover:text-ink rounded-lg hover:bg-surface">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <h1 class="text-2xl font-bold text-ink"><?php echo e($campaignId ? __('Edit Campaign') : __('Create Campaign')); ?></h1>
            </div>
        </div>
        <button wire:click="saveDraft" class="px-4 py-2 text-sm font-medium text-ink/80 bg-surface-2 border border-border rounded-xl hover:bg-surface transition-colors">
            <?php echo e(__('Save Draft')); ?>

        </button>
    </div>

    
    <div class="bg-surface-2 rounded-2xl border border-border p-4">
        <div class="flex items-center justify-between">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [1 => __('Basics'), 2 => __('Content'), 3 => __('Audience'), 4 => __('Schedule')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button wire:click="goToStep(<?php echo e($step); ?>)"
                    class="flex items-center gap-2 <?php echo e($currentStep === $step ? 'text-primary-700 dark:text-primary-300' : ($currentStep > $step ? 'text-success' : 'text-muted')); ?>">
                <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold border-2 <?php echo e($currentStep === $step ? 'border-primary-600 bg-primary-50 dark:bg-primary-900/20 text-primary-700 dark:text-primary-300' : ($currentStep > $step ? 'border-green-500 bg-success/10 text-success' : 'border-border text-muted')); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep > $step): ?>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php else: ?>
                    <?php echo e($step); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
                <span class="text-sm font-medium hidden sm:inline"><?php echo e($label); ?></span>
            </button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step < 4): ?>
            <div class="flex-1 h-px mx-3 <?php echo e($currentStep > $step ? 'bg-green-300' : 'bg-gray-200 dark:bg-gray-700'); ?>"></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep === 1): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($channel === 'email'): ?>
        <?php if (isset($component)) { $__componentOriginaldd77bc1583a6eaa2d3f91949e4708da1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd77bc1583a6eaa2d3f91949e4708da1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.deliverability-guide','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('deliverability-guide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd77bc1583a6eaa2d3f91949e4708da1)): ?>
<?php $attributes = $__attributesOriginaldd77bc1583a6eaa2d3f91949e4708da1; ?>
<?php unset($__attributesOriginaldd77bc1583a6eaa2d3f91949e4708da1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd77bc1583a6eaa2d3f91949e4708da1)): ?>
<?php $component = $__componentOriginaldd77bc1583a6eaa2d3f91949e4708da1; ?>
<?php unset($__componentOriginaldd77bc1583a6eaa2d3f91949e4708da1); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="bg-surface-2 rounded-2xl border border-border p-6 space-y-5">
        <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Campaign Details')); ?></h2>

        
        <div>
            <label class="block text-sm font-medium text-ink/80 mb-2"><?php echo e(__('Send via')); ?></label>
            <div class="grid grid-cols-2 gap-3">
                <label class="relative cursor-pointer">
                    <input type="radio" wire:model.live="channel" value="email" class="peer sr-only">
                    <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary-100 dark:bg-primary-900/40 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-ink"><?php echo e(__('Email Campaign')); ?></p>
                                <p class="text-xs text-muted mt-0.5"><?php echo e(__('Drag-drop builder, A/B tests')); ?></p>
                            </div>
                        </div>
                    </div>
                </label>
                <?php $canSms = $planFeatures['sms_campaigns'] ?? false; ?>
                <label class="relative <?php echo e($canSms ? 'cursor-pointer' : 'cursor-not-allowed'); ?>">
                    <input type="radio" wire:model.live="channel" value="sms" <?php if(!$canSms): echo 'disabled'; endif; ?> class="peer sr-only">
                    <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border <?php echo e($canSms ? 'hover:border-border' : 'opacity-60'); ?>">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-success/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-semibold text-ink"><?php echo e(__('SMS Campaign')); ?></p>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$canSms): ?>
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wider bg-warning/15 text-warning rounded-full">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                            <?php echo e(__('Pro')); ?>

                                        </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <p class="text-xs text-muted mt-0.5">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canSms): ?>
                                        <?php echo e(__('Twilio bulk text messages')); ?>

                                    <?php else: ?>
                                        <?php echo e(__('Upgrade to Pro to send bulk SMS')); ?>

                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['channel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Campaign Name')); ?></label>
            <input type="text" wire:model="name" placeholder="e.g., Spring Product Launch"
                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($channel === 'email'): ?>
        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Campaign Type')); ?></label>
            <div class="grid grid-cols-2 gap-3">
                <label class="relative cursor-pointer">
                    <input type="radio" wire:model.live="type" value="regular" class="peer sr-only">
                    <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                        <p class="text-sm font-semibold text-ink"><?php echo e(__('Regular Campaign')); ?></p>
                        <p class="text-xs text-muted mt-0.5"><?php echo e(__('Send the same email to all recipients')); ?></p>
                    </div>
                </label>
                <label class="relative cursor-pointer">
                    <input type="radio" wire:model.live="type" value="ab_test" class="peer sr-only">
                    <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                        <p class="text-sm font-semibold text-ink"><?php echo e(__('A/B Test')); ?></p>
                        <p class="text-xs text-muted mt-0.5"><?php echo e(__('Test different subject lines')); ?></p>
                    </div>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Subject Line')); ?></label>
            <input type="text" wire:model="subject" placeholder="<?php echo e(__('Enter email subject...')); ?>"
                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Preview Text')); ?> <span class="text-muted font-normal">(<?php echo e(__('optional')); ?>)</span></label>
            <input type="text" wire:model="previewText" placeholder="<?php echo e(__('Brief summary shown in inbox preview...')); ?>"
                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('From Account')); ?></label>
            <select wire:model="emailAccountId"
                    class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-surface-2">
                <option value=""><?php echo e(__('Select email account...')); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $emailAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <option value="<?php echo e($account->id); ?>"><?php echo e($account->display_name); ?> (<?php echo e($account->email); ?>)</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
        </div>
        <?php else: ?>
            
            <div class="bg-primary-50 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800 rounded-xl p-4">
                <p class="text-xs text-primary-700 dark:text-primary-300">
                    <strong><?php echo e(__('SMS Campaign:')); ?></strong>
                    <?php echo e(__('Next step lets you pick your Twilio number and write the message. Recipients are filtered to contacts who have a phone number on file.')); ?>

                </p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type === 'ab_test'): ?>
        <div class="border-t border-border pt-5 space-y-4">
            <h3 class="text-base font-semibold text-ink"><?php echo e(__('A/B Test Configuration')); ?></h3>
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Subject Line A')); ?></label>
                <input type="text" wire:model="subjectA" placeholder="<?php echo e(__('First subject variation...')); ?>"
                       class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['subjectA'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Subject Line B')); ?></label>
                <input type="text" wire:model="subjectB" placeholder="<?php echo e(__('Second subject variation...')); ?>"
                       class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['subjectB'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Split Percentage (Variant A)')); ?></label>
                <div class="flex items-center gap-4">
                    <input type="range" wire:model.live="splitPercentage" min="10" max="90" step="5"
                           class="flex-1 h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-primary-600">
                    <div class="flex items-center gap-2 text-sm font-medium">
                        <span class="text-primary-700">A: <?php echo e($splitPercentage); ?>%</span>
                        <span class="text-muted">/</span>
                        <span class="text-secondary-700">B: <?php echo e(100 - $splitPercentage); ?>%</span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="flex justify-end pt-2">
            <button wire:click="goToStep(2)" class="btn-primary px-6 py-2.5 text-sm">
                <?php echo e(__('Next: Content')); ?>

            </button>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep === 2): ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($channel === 'sms'): ?>
    
    <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'step2-sms'; ?>wire:key="step2-sms" class="bg-surface-2 rounded-2xl border border-border p-6 space-y-5"
         x-data="{
             body: <?php echo \Illuminate\Support\Js::from($bodyText)->toHtml() ?>,
             get len() { return this.body.length; },
             get isUnicode() { return /[^\x00-\x7F]/.test(this.body); },
             get segmentSize() { return this.isUnicode ? 70 : 160; },
             get segments() { return this.body.length === 0 ? 0 : Math.ceil(this.body.length / this.segmentSize); }
         }">
        <h2 class="text-lg font-semibold text-ink"><?php echo e(__('SMS Content')); ?></h2>

        
        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Send from number')); ?></label>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($smsNumbers->isEmpty()): ?>
                <div class="border border-warning/40 bg-warning/10 rounded-xl p-4">
                    <p class="text-sm text-warning font-medium"><?php echo e(__('No active SMS integration found.')); ?></p>
                    <p class="text-xs text-muted mt-1">
                        <?php echo e(__('Connect a Twilio number first:')); ?>

                        <a href="<?php echo e(url('/settings/channels')); ?>" class="text-brand hover:underline"><?php echo e(__('Settings → Channels → SMS')); ?></a>
                    </p>
                </div>
            <?php else: ?>
                <select wire:model="fromNumber"
                        class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 bg-surface-2">
                    <option value=""><?php echo e(__('— Choose a Twilio number —')); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $smsNumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option value="<?php echo e($n->phone_number); ?>">
                            <?php echo e($n->phone_number); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($n->account_name): ?> — <?php echo e($n->account_name); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['fromNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div>
            <div class="flex items-center justify-between mb-1">
                <label class="block text-sm font-medium text-ink/80"><?php echo e(__('Message')); ?></label>
                <div class="text-xs text-muted">
                    <span x-text="len"></span> <?php echo e(__('chars')); ?> ·
                    <span x-text="segments"></span> <?php echo e(__('segment(s)')); ?>

                    <span x-show="isUnicode" class="text-warning ml-1">(<?php echo e(__('Unicode — 70/segment')); ?>)</span>
                </div>
            </div>
            <textarea wire:model.live.debounce.300ms="bodyText"
                      x-model="body"
                      rows="6"
                      maxlength="1600"
                      placeholder="Hi {first_name}, this is a quick update from {company}..."
                      class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 bg-surface font-mono resize-y"></textarea>
            <div class="flex items-start justify-between gap-3 mt-1">
                <p class="text-[10px] text-muted">
                    <?php echo e(__('Variables:')); ?> <code>{first_name}</code> <code>{last_name}</code>
                    <code>{full_name}</code> <code>{company}</code> <code>{phone}</code> <code>{email}</code>
                </p>
                <p class="text-[10px] text-muted">
                    <?php echo e(__('Carriers split long SMS into multiple billed segments.')); ?>

                </p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['bodyText'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="flex items-center justify-between pt-3 border-t border-border/50">
            <button wire:click="goToStep(1)" class="px-4 py-2 text-sm font-medium text-ink/80 bg-surface border border-border rounded-xl hover:bg-surface-2 transition-colors">
                <?php echo e(__('Back')); ?>

            </button>
            <button wire:click="goToStep(3)" class="btn-primary px-6 py-2.5 text-sm">
                <?php echo e(__('Next: Audience')); ?>

            </button>
        </div>
    </div>
    <?php else: ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showEmailBuilder): ?>
    <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'builder-overlay'; ?>wire:key="builder-overlay" class="fixed inset-0 z-50 bg-surface-2 flex flex-col" wire:ignore.self>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('campaigns.email-builder', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2651228154-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
    </div>
    <?php else: ?>

    <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'step2-content'; ?>wire:key="step2-content" class="bg-surface-2 rounded-2xl border border-border p-6 space-y-5">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Email Content')); ?></h2>
            
            <div class="flex items-center bg-surface  rounded-xl p-1">
                <button
                    wire:click="$set('editorMode', 'visual')"
                    class="px-4 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($editorMode === 'visual' ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted hover:text-ink/80'); ?>"
                >
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                        <?php echo e(__('Visual Builder')); ?>

                    </span>
                </button>
                <button
                    wire:click="$set('editorMode', 'html')"
                    class="px-4 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($editorMode === 'html' ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted hover:text-ink/80'); ?>"
                >
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        <?php echo e(__('HTML Editor')); ?>

                    </span>
                </button>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editorMode === 'visual'): ?>
            
            <div class="space-y-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bodyHtml && !empty($bodyBlocks)): ?>
                    
                    <div class="border border-success/20 bg-success/10 rounded-xl p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-success/15 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-green-900"><?php echo e(__('Email content ready')); ?></p>
                                    <p class="text-xs text-success"><?php echo e(count($bodyBlocks)); ?> block(s) built with the visual editor</p>
                                </div>
                            </div>
                            <button
                                wire:click="$set('showEmailBuilder', true)"
                                class="px-4 py-2 text-sm font-medium text-success bg-surface-2 border border-green-300 rounded-xl hover:bg-success/10 transition-colors"
                            >
                                <?php echo e(__('Edit in Builder')); ?>

                            </button>
                        </div>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Preview')); ?></label>
                        <div class="border border-border rounded-xl bg-surface" style="height: 600px;">
                            <iframe
                                srcdoc="<?php echo e($bodyHtml); ?>"
                                class="w-full h-full border-0 rounded-xl"
                                sandbox="allow-same-origin"
                                title="Email preview"
                            ></iframe>
                        </div>
                    </div>
                <?php else: ?>
                    
                    <div class="border-2 border-dashed border-border rounded-xl p-8 text-center">
                        <div class="w-16 h-16 bg-primary-50 dark:bg-primary-900/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <h3 class="text-base font-semibold text-ink mb-1"><?php echo e(__('Design your email visually')); ?></h3>
                        <p class="text-sm text-muted mb-4 max-w-sm mx-auto"><?php echo e(__('Drag and drop content blocks to build beautiful, responsive emails without writing any code.')); ?></p>
                        <button
                            wire:click="$set('showEmailBuilder', true)"
                            class="btn-primary inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            <?php echo e(__('Open Email Builder')); ?>

                        </button>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php else: ?>
            
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Email Body (HTML)')); ?></label>
                <textarea wire:model="bodyHtml" rows="16" placeholder="<?php echo e(__('Enter your email HTML content here...')); ?>"
                          class="w-full px-4 py-3 text-sm font-mono border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-y">
                </textarea>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['bodyHtml'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <p class="text-xs text-muted mt-1">You can use HTML tags. Use {{first_name}}, {{last_name}}, {{email}}, {{company}} as merge tags.</p>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bodyHtml): ?>
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1">Preview</label>
                <div class="border border-border rounded-xl p-4 bg-surface max-h-64 overflow-y-auto">
                    <div class="bg-surface-2 rounded-lg p-4 shadow-sm">
                        <?php echo $this->safeBodyHtml; ?>

                    </div>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['bodyHtml'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="flex justify-between pt-2">
            <button wire:click="goToStep(1)" class="px-6 py-2.5 text-ink/80 bg-surface-2 border border-border text-sm font-medium rounded-xl hover:bg-surface transition-colors">
                <?php echo e(__('Back')); ?>

            </button>
            <button wire:click="goToStep(3)" class="btn-primary px-6 py-2.5 text-sm">
                <?php echo e(__('Next: Audience')); ?>

            </button>
        </div>
    </div>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> 
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep === 3): ?>
    <div class="bg-surface-2 rounded-2xl border border-border p-6 space-y-5">
        <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Select Audience')); ?></h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <label class="relative cursor-pointer">
                <input type="radio" wire:model.live="audienceType" value="all" class="peer sr-only">
                <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-ink"><?php echo e(__('All Contacts')); ?></p>
                            <p class="text-xs text-muted"><?php echo e(number_format($totalContacts)); ?> subscribers</p>
                        </div>
                    </div>
                </div>
            </label>
            <label class="relative cursor-pointer">
                <input type="radio" wire:model.live="audienceType" value="list" class="peer sr-only">
                <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-ink"><?php echo e(__('Contact Group')); ?></p>
                            <p class="text-xs text-muted"><?php echo e(__('Send to a specific group')); ?></p>
                        </div>
                    </div>
                </div>
            </label>
            <label class="relative cursor-pointer">
                <input type="radio" wire:model.live="audienceType" value="segment" class="peer sr-only">
                <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-secondary-100 dark:bg-secondary-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-secondary-600 dark:text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-ink"><?php echo e(__('Segment')); ?></p>
                            <p class="text-xs text-muted"><?php echo e(__('Dynamic rule-based filter')); ?></p>
                        </div>
                    </div>
                </div>
            </label>
            <label class="relative cursor-pointer">
                <input type="radio" wire:model.live="audienceType" value="contacts" class="peer sr-only">
                <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-100 dark:bg-amber-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-ink"><?php echo e(__('Specific Contacts')); ?></p>
                            <p class="text-xs text-muted"><?php echo e(__('Pick individual recipients')); ?></p>
                        </div>
                    </div>
                </div>
            </label>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($audienceType === 'list'): ?>
        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Select Contact Group')); ?></label>
            <select wire:model.live="audienceId"
                    class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-surface-2">
                <option value=""><?php echo e(__('Choose a group...')); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $contactLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?> (<?php echo e(number_format($list->contacts_count)); ?> contacts)</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contactLists->isEmpty()): ?>
            <p class="text-xs text-muted mt-1">No groups yet. <a href="<?php echo e(url('/contacts/groups')); ?>" class="text-brand hover:underline">Create one</a></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($audienceType === 'segment'): ?>
        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Select Segment')); ?></label>
            <select wire:model.live="audienceId"
                    class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-surface-2">
                <option value=""><?php echo e(__('Choose a segment...')); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $segments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <option value="<?php echo e($segment->id); ?>"><?php echo e($segment->name); ?> (<?php echo e(number_format($segment->contacts_count)); ?> contacts)</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($audienceType === 'contacts'): ?>
        <div class="space-y-3">
            <label class="block text-sm font-medium text-ink/80"><?php echo e(__('Search and add contacts')); ?></label>

            
            <div class="relative">
                <input type="text"
                       wire:model.live.debounce.300ms="contactSearch"
                       placeholder="<?php echo e(__('Type a name, email, or company…')); ?>"
                       class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-surface-2">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($contactSearchResults)): ?>
                <div class="absolute z-20 mt-1 w-full bg-surface-2 border border-border rounded-xl shadow-lg max-h-64 overflow-y-auto">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $contactSearchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <button type="button"
                            wire:click="addSpecificContact(<?php echo e($c['id']); ?>)"
                            class="w-full text-left px-4 py-2.5 hover:bg-primary-50 dark:hover:bg-primary-900/20 border-b border-border last:border-b-0">
                        <p class="text-sm font-medium text-ink"><?php echo e($c['name']); ?></p>
                        <p class="text-xs text-muted"><?php echo e($c['email']); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($c['company']): ?> · <?php echo e($c['company']); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></p>
                    </button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
                <?php elseif(strlen(trim($contactSearch)) >= 2): ?>
                <p class="text-xs text-muted mt-1"><?php echo e(__('No matching contacts.')); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <?php ($selected = $this->selectedContactsList); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($selected)): ?>
            <div>
                <p class="text-xs text-muted mb-2"><?php echo e(count($selected)); ?> <?php echo e(__('selected')); ?></p>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary-50 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-full text-xs">
                        <span><?php echo e($c['name']); ?> &lt;<?php echo e($c['email']); ?>&gt;</span>
                        <button type="button" wire:click="removeSpecificContact(<?php echo e($c['id']); ?>)" class="hover:text-red-600" title="<?php echo e(__('Remove')); ?>">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
            <?php else: ?>
            <p class="text-xs text-muted"><?php echo e(__('No contacts picked yet. Use the search above to add one.')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['audienceType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="bg-primary-50 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-primary-900 dark:text-primary-100"><?php echo e(number_format($audienceCount)); ?> <?php echo e(__('recipients')); ?></p>
                    <p class="text-xs text-primary-600 dark:text-primary-400"><?php echo e(__('will receive this campaign')); ?></p>
                </div>
            </div>
        </div>

        <div class="flex justify-between pt-2">
            <button wire:click="goToStep(2)" class="px-6 py-2.5 text-ink/80 bg-surface-2 border border-border text-sm font-medium rounded-xl hover:bg-surface transition-colors">
                <?php echo e(__('Back')); ?>

            </button>
            <button wire:click="goToStep(4)" class="btn-primary px-6 py-2.5 text-sm">
                <?php echo e(__('Next: Schedule')); ?>

            </button>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep === 4): ?>
    <div class="bg-surface-2 rounded-2xl border border-border p-6 space-y-5">
        <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Schedule & Send')); ?></h2>

        <div class="space-y-3">
            <label class="relative cursor-pointer block">
                <input type="radio" wire:model.live="sendOption" value="now" class="peer sr-only">
                <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                    <p class="text-sm font-semibold text-ink"><?php echo e(__('Send Now')); ?></p>
                    <p class="text-xs text-muted"><?php echo e(__('Send the campaign immediately to all recipients')); ?></p>
                </div>
            </label>
            <label class="relative cursor-pointer block">
                <input type="radio" wire:model.live="sendOption" value="schedule" class="peer sr-only">
                <div class="p-4 border-2 rounded-xl transition-colors peer-checked:border-primary-600 peer-checked:bg-primary-50 dark:peer-checked:bg-primary-900/20 border-border hover:border-border">
                    <p class="text-sm font-semibold text-ink"><?php echo e(__('Schedule for Later')); ?></p>
                    <p class="text-xs text-muted"><?php echo e(__('Pick a specific date and time to send')); ?></p>
                </div>
            </label>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sendOption === 'schedule'): ?>
        <div>
            <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Scheduled Date & Time')); ?></label>
            <input type="datetime-local" wire:model="scheduledAt"
                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['scheduledAt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <p class="text-xs text-muted mt-1.5"><?php echo e(__('Scheduled campaigns may be delayed by 1-2 minutes.')); ?></p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div x-data="{ open: false }" class="border border-border rounded-xl overflow-hidden">
            <button @click="open = !open" type="button"
                    class="w-full flex items-center justify-between px-4 py-3 bg-surface hover:bg-surface transition-colors text-left">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span class="text-sm font-semibold text-ink"><?php echo e(__('Delivery Speed & Batching')); ?></span>
                    <span class="text-xs text-muted"><?php echo e(__('(optional — reduce spam risk)')); ?></span>
                </div>
                <svg class="w-4 h-4 text-muted transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>

            <div x-show="open" x-collapse x-cloak class="px-4 py-4 space-y-4 border-t border-border">
                <p class="text-xs text-muted">
                    <?php echo e(__('Sending too fast can trigger spam filters and get your account temporarily banned. Slower rates are safer.')); ?>

                </p>

                
                <div>
                    <label class="block text-sm font-medium text-ink/80 mb-1">
                        <?php echo e(__('Send rate (emails per minute)')); ?>

                    </label>
                    <div class="flex items-center gap-4">
                        <input type="range" wire:model.live="emailsPerMinute" min="1" max="600" step="1"
                               class="flex-1 h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-primary-600">
                        <div class="min-w-[120px] text-right">
                            <input type="number" wire:model.lazy="emailsPerMinute" min="1" max="600"
                                   class="w-20 px-2 py-1 text-sm border border-border rounded-lg text-right focus:outline-none focus:ring-1 focus:ring-primary-500">
                            <span class="text-xs text-muted ml-1">/min</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-muted mt-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($emailsPerMinute <= 30): ?>
                            <?php echo e(__('Very slow — safest for new accounts or cold outreach.')); ?>

                        <?php elseif($emailsPerMinute <= 120): ?>
                            <?php echo e(__('Normal — works for most established sender accounts.')); ?>

                        <?php elseif($emailsPerMinute <= 300): ?>
                            <?php echo e(__('Fast — only use if your sender reputation is warm.')); ?>

                        <?php else: ?>
                            <?php echo e(__('Very fast — may hit provider rate limits or spam flags.')); ?>

                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['emailsPerMinute'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-border">
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1">
                            <?php echo e(__('Batch size')); ?>

                        </label>
                        <input type="number" wire:model.lazy="batchSize" min="0" max="5000" step="10"
                               placeholder="0 = no batching"
                               class="w-full px-3 py-2 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <p class="text-[11px] text-muted mt-1"><?php echo e(__('Emails per batch. 0 = send continuously with no batch pauses.')); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['batchSize'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1">
                            <?php echo e(__('Pause between batches')); ?>

                        </label>
                        <div class="flex items-center gap-2">
                            <input type="number" wire:model.lazy="batchDelaySeconds" min="0" max="3600" step="5"
                                   placeholder="0"
                                   <?php echo e($batchSize == 0 ? 'disabled' : ''); ?>

                                   class="w-full px-3 py-2 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 <?php echo e($batchSize == 0 ? 'opacity-50 cursor-not-allowed' : ''); ?>">
                            <span class="text-xs text-muted shrink-0"><?php echo e(__('seconds')); ?></span>
                        </div>
                        <p class="text-[11px] text-muted mt-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($batchSize == 0): ?>
                                <?php echo e(__('Only used when batch size > 0.')); ?>

                            <?php else: ?>
                                <?php echo e(__('e.g. 30 seconds pause every :n emails.', ['n' => $batchSize])); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['batchDelaySeconds'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($audienceCount > 0 && $this->estimatedSendDuration): ?>
                <div class="bg-primary-50 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800 rounded-xl p-3">
                    <p class="text-xs text-primary-900 dark:text-primary-100">
                        <?php echo e(__('Estimated total send time:')); ?>

                        <span class="font-semibold"><?php echo e($this->estimatedSendDuration); ?></span>
                        <span class="text-primary-600 dark:text-primary-400">
                            (<?php echo e(number_format($audienceCount)); ?> <?php echo e(__('recipients')); ?>)
                        </span>
                    </p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <div x-data="{ testOpen: false }" class="border border-border rounded-xl overflow-hidden">
            <button @click="testOpen = !testOpen" type="button"
                    class="w-full flex items-center justify-between px-4 py-3 bg-surface hover:bg-surface  transition-colors text-left">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span class="text-sm font-semibold text-ink"><?php echo e(__('Test Before Sending')); ?></span>
                </div>
                <svg class="w-4 h-4 text-muted transition-transform" :class="{ 'rotate-180': testOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>

            <div x-show="testOpen" x-collapse x-cloak class="px-4 py-4 space-y-3 border-t border-border">
                <p class="text-xs text-muted">Send a preview to yourself. Template variables will use sample data. Subject will be prefixed with [TEST].</p>

                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="flex-1">
                        <input type="email" wire:model="testEmail" placeholder="your@email.com"
                               class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                               <?php echo e($testSending ? 'disabled' : ''); ?>>
                    </div>
                    <button wire:click="sendTestEmail"
                            wire:loading.attr="disabled"
                            wire:target="sendTestEmail"
                            <?php echo e($testSending ? 'disabled' : ''); ?>

                            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 text-sm font-medium rounded-xl transition-colors
                                   <?php echo e($testSending ? 'bg-gray-200 dark:bg-gray-700 text-muted cursor-not-allowed' : 'bg-warning/100 text-white hover:bg-amber-600'); ?>">
                        <span wire:loading wire:target="sendTestEmail">
                            <svg class="animate-spin h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        </span>
                        <span wire:loading.remove wire:target="sendTestEmail">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <?php echo e($testSending ? __('Sending...') : __('Send Test Email')); ?>

                    </button>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['testEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-xs text-red-500"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testResult): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(str_starts_with($testResult, 'success:')): ?>
                        <div class="flex items-start gap-2 p-3 bg-success/10 border border-success/20 rounded-lg">
                            <svg class="w-4 h-4 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <p class="text-xs text-success"><?php echo e(str_replace('success:', '', $testResult)); ?></p>
                        </div>
                    <?php elseif(str_starts_with($testResult, 'error:')): ?>
                        <div class="flex items-start gap-2 p-3 bg-danger/10 border border-danger/20 rounded-lg">
                            <svg class="w-4 h-4 text-danger mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            <p class="text-xs text-danger"><?php echo e(str_replace('error:', '', $testResult)); ?></p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <div class="border-t border-border pt-5">
            <h3 class="text-base font-semibold text-ink mb-3"><?php echo e(__('Campaign Summary')); ?></h3>
            <div class="bg-surface rounded-xl p-4 space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="text-muted"><?php echo e(__('Campaign Name')); ?></span>
                    <span class="font-medium text-ink"><?php echo e($name ?: '--'); ?></span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-muted"><?php echo e(__('Type')); ?></span>
                    <span class="font-medium text-ink"><?php echo e($type === 'ab_test' ? __('A/B Test') : __('Regular')); ?></span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-muted"><?php echo e(__('Subject')); ?></span>
                    <span class="font-medium text-ink"><?php echo e($subject ?: '--'); ?></span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-muted"><?php echo e(__('Content')); ?></span>
                    <span class="font-medium text-ink">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editorMode === 'visual' && !empty($bodyBlocks)): ?>
                            <?php echo e(__('Visual Builder')); ?> (<?php echo e(count($bodyBlocks)); ?> blocks)
                        <?php elseif(!empty($bodyHtml)): ?>
                            <?php echo e(__('Custom HTML')); ?>

                        <?php else: ?>
                            --
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-muted"><?php echo e(__('Recipients')); ?></span>
                    <span class="font-medium text-ink"><?php echo e(number_format($audienceCount)); ?></span>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type === 'ab_test'): ?>
                <div class="flex justify-between text-sm">
                    <span class="text-muted"><?php echo e(__('Subject A')); ?></span>
                    <span class="font-medium text-ink"><?php echo e($subjectA ?: '--'); ?> (<?php echo e($splitPercentage); ?>%)</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-muted"><?php echo e(__('Subject B')); ?></span>
                    <span class="font-medium text-ink"><?php echo e($subjectB ?: '--'); ?> (<?php echo e(100 - $splitPercentage); ?>%)</span>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-2">
            <button wire:click="goToStep(3)" class="px-6 py-2.5 text-ink/80 bg-surface-2 border border-border text-sm font-medium rounded-xl hover:bg-surface transition-colors">
                <?php echo e(__('Back')); ?>

            </button>
            <div class="flex items-center gap-3">
                <button wire:click="saveDraft" class="px-6 py-2.5 text-ink/80 bg-surface-2 border border-border text-sm font-medium rounded-xl hover:bg-surface transition-colors">
                    <?php echo e(__('Save Draft')); ?>

                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sendOption === 'schedule'): ?>
                <button wire:click="schedule" wire:confirm="Schedule this campaign? It will be sent at the selected time."
                        class="px-6 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-xl hover:bg-blue-700 transition-colors">
                    <?php echo e(__('Schedule Campaign')); ?>

                </button>
                <?php else: ?>
                <button wire:click="sendNow" wire:confirm="Send this campaign now to <?php echo e(number_format($audienceCount)); ?> recipients?"
                        class="btn-primary px-6 py-2.5 text-sm">
                    <?php echo e(__('Send Now')); ?>

                </button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($campaignId): ?>
        <div class="mt-6 border-t border-border pt-6">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('campaigns.drip-sequence-editor', ['campaignId' => $campaignId]);

$__keyOuter = $__key ?? null;

$__key = 'drip-'.$campaignId;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2651228154-1', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/campaigns/campaign-editor.blade.php ENDPATH**/ ?>