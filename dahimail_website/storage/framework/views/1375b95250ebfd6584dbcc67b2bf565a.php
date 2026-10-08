<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Phone Verification'),'subtitle' => __('Control phone numbers at sign-up and how they are verified.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Phone Verification')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Control phone numbers at sign-up and how they are verified.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6 max-w-3xl">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="rounded-xl border border-green-300 bg-green-50 text-green-800 px-4 py-3 text-sm"><?php echo e(session('success')); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
            <div class="rounded-xl border border-red-300 bg-red-50 text-red-800 px-4 py-3 text-sm"><?php echo e($errors->first()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="panel p-5">
            <div class="text-sm font-semibold text-ink mb-1"><?php echo e(__('Current behaviour')); ?></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$verification): ?>
                <p class="text-sm text-muted"><?php echo e(__('Verification is OFF: people can register and add a phone number WITHOUT any SMS or WhatsApp code. Numbers saved this way are marked unverified and are not used for friend discovery (otherwise anyone could type another person\'s number to see who has it saved).')); ?></p>
            <?php elseif(empty($channels)): ?>
                <p class="text-sm text-amber-700"><?php echo e(__('Verification is switched ON but no sending method is ready, so it behaves as OFF. Enable SMS and/or WhatsApp below and make sure its credentials are saved in Settings → Integrations.')); ?></p>
            <?php else: ?>
                <p class="text-sm text-muted"><?php echo e(__('Verification is ON: people confirm their number with a code sent by :c. Only verified numbers can use friend discovery.', ['c' => implode(' / ', array_map(fn ($c) => $c === 'sms' ? 'SMS' : 'WhatsApp', $channels))])); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testMode): ?><p class="text-xs text-amber-700 mt-2"><?php echo e(__('Test mode is active (FRIENDS_SMS_DRIVER=log): codes are written to the log, not sent.')); ?></p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <form method="POST" action="<?php echo e(route('admin.phone-verification.save')); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>

            <div class="panel p-6 space-y-3">
                <h3 class="text-base font-semibold text-ink"><?php echo e(__('Phone number at sign-up')); ?></h3>
                <p class="text-sm text-muted"><?php echo e(__('Applies to the website and the mobile app.')); ?></p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['off' => [__('Do not ask'), __('No phone field on the sign-up form.')], 'optional' => [__('Optional'), __('Shown, but people can leave it empty.')], 'required' => [__('Required'), __('People must enter a phone number to register.')]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => [$label, $hint]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="radio" name="phone_registration" value="<?php echo e($val); ?>" class="mt-1" <?php if($registration === $val): echo 'checked'; endif; ?>>
                        <span><span class="text-sm font-medium text-ink"><?php echo e($label); ?></span><span class="block text-xs text-muted"><?php echo e($hint); ?></span></span>
                    </label>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <div class="panel p-6 space-y-4">
                <label class="flex items-start gap-3 cursor-pointer">
                    <input type="checkbox" name="phone_verification_enabled" value="1" class="mt-1" <?php if($verification): echo 'checked'; endif; ?>>
                    <span><span class="text-base font-semibold text-ink"><?php echo e(__('Verify phone numbers with a code')); ?></span>
                        <span class="block text-sm text-muted"><?php echo e(__('Switch OFF to let people add a number without any verification.')); ?></span></span>
                </label>

                <div class="border-t border-border pt-4 space-y-4">
                    <div>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="phone_verify_sms" value="1" <?php if($sms): echo 'checked'; endif; ?>>
                            <span class="text-sm font-medium text-ink"><?php echo e(__('Send the code by SMS')); ?></span>
                            <span class="text-xs rounded-full px-2 py-0.5 <?php echo e($smsReady ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800'); ?>"><?php echo e($smsReady ? __('Twilio is set up') : __('Twilio not set up')); ?></span>
                        </label>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$smsReady): ?><p class="text-xs text-muted mt-1 ml-7"><?php echo e(__('Add the Twilio SID, auth token and phone number under Settings → Integrations.')); ?></p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="phone_verify_whatsapp" value="1" <?php if($whatsapp): echo 'checked'; endif; ?>>
                            <span class="text-sm font-medium text-ink"><?php echo e(__('Send the code by WhatsApp')); ?></span>
                            <span class="text-xs rounded-full px-2 py-0.5 <?php echo e($whatsappReady ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800'); ?>"><?php echo e($whatsappReady ? __('WhatsApp is set up') : __('WhatsApp not set up')); ?></span>
                        </label>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$whatsappReady): ?><p class="text-xs text-muted mt-1 ml-7"><?php echo e(__('Add the WhatsApp phone number ID and access token under Settings → Integrations.')); ?></p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="ml-7 mt-3 grid gap-3 sm:grid-cols-2">
                            <div>
                                <label class="block text-xs text-muted mb-1"><?php echo e(__('Approved template name')); ?></label>
                                <input type="text" name="whatsapp_otp_template" value="<?php echo e(old('whatsapp_otp_template', $template)); ?>" class="input w-full" placeholder="<?php echo e(__('e.g. verification_code')); ?>">
                            </div>
                            <div>
                                <label class="block text-xs text-muted mb-1"><?php echo e(__('Template language code')); ?></label>
                                <input type="text" name="whatsapp_otp_language" value="<?php echo e(old('whatsapp_otp_language', $language)); ?>" class="input w-full" placeholder="en_US">
                            </div>
                            <label class="sm:col-span-2 flex items-center gap-2 text-xs text-muted"><input type="checkbox" name="whatsapp_otp_button" value="1" <?php if($button): echo 'checked'; endif; ?>> <?php echo e(__('The template has a “copy code” button (authentication template)')); ?></label>
                        </div>
                        <p class="text-xs text-muted mt-2 ml-7"><?php echo e(__('WhatsApp only lets a business start a conversation with an APPROVED template. Without a template name a plain message is tried, which usually fails for new numbers.')); ?></p>
                    </div>
                </div>
            </div>

            <div class="panel p-6 space-y-2 border-amber-300">
                <label class="flex items-start gap-3 cursor-pointer">
                    <input type="checkbox" name="phone_discovery_unverified" value="1" class="mt-1" <?php if($unverifiedDiscovery): echo 'checked'; endif; ?>>
                    <span><span class="text-base font-semibold text-ink"><?php echo e(__('Allow friend discovery with UNVERIFIED numbers')); ?></span>
                        <span class="block text-sm text-muted"><?php echo e(__('Use this if you do not send verification codes. People can then be found by the phone number they typed, and friends see a "number not verified" note.')); ?></span>
                        <span class="block text-xs text-amber-700 mt-1"><?php echo e(__('Not recommended: without a code nobody can prove a number is theirs, so someone could claim another person\'s number and appear as that person to everyone who saved it. Leave this OFF if you can use SMS or WhatsApp verification.')); ?></span></span>
                </label>
            </div>

            <button type="submit" class="btn-primary"><?php echo e(__('Save')); ?></button>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/phone-verification.blade.php ENDPATH**/ ?>