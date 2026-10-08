<div class="space-y-6" x-data="{ dirty: false }" @change="dirty = true" @saved.window="dirty = false"
     x-on:livewire:navigating.window="if(dirty && !confirm('You have unsaved changes. Leave anyway?')) $event.preventDefault()"
     x-init="window.addEventListener('beforeunload', (e) => { if(dirty) { e.preventDefault(); e.returnValue = '' } })">
    <div>
        <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Channel Integrations')); ?></h1>
        <p class="text-sm text-muted mt-1"><?php echo e(__('Connect messaging channels to manage all conversations in one place.')); ?></p>
    </div>

    <?php
    $channels = [
        ['key' => 'whatsapp', 'name' => __('WhatsApp'), 'desc' => __('Connect WhatsApp Business API for messaging.'), 'icon' => 'message-circle', 'bg' => 'bg-success/10', 'text' => 'text-success'],
        ['key' => 'sms', 'name' => __('SMS (Twilio)'), 'desc' => __('Send and receive SMS via Twilio.'), 'icon' => 'phone', 'bg' => 'bg-danger/10', 'text' => 'text-danger'],
        ['key' => 'telegram', 'name' => __('Telegram'), 'desc' => __('Connect your Telegram bot.'), 'icon' => 'send', 'bg' => 'bg-info/10', 'text' => 'text-blue-600'],
        ['key' => 'slack', 'name' => __('Slack'), 'desc' => __('Message Slack channels two-way — bot posts replies, channel messages land in inbox.'), 'icon' => 'hash', 'bg' => 'bg-brand/10', 'text' => 'text-purple-600'],
        ['key' => 'chat', 'name' => __('Live Chat'), 'desc' => __('Embed a chat widget on your website.'), 'icon' => 'message-square', 'bg' => 'bg-cyan-50', 'text' => 'text-cyan-600'],
    ];
    ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <?php $integration = $integrations[$ch['key']] ?? null; $connected = $integration && $integration->status === 'active'; ?>
        <div class="bg-surface-2 rounded-2xl border border-border p-6 hover:shadow-md transition-all duration-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 <?php echo e($ch['bg']); ?> rounded-xl flex items-center justify-center">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => $ch['icon'],'class' => 'w-6 h-6 '.e($ch['text']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ch['icon']),'class' => 'w-6 h-6 '.e($ch['text']).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-ink"><?php echo e($ch['name']); ?></h3>
                    <p class="text-xs text-muted mt-0.5"><?php echo e($ch['desc']); ?></p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-5 pt-4 border-t border-border">
                <div class="flex items-center gap-3">
                    <span class="flex items-center gap-1.5 text-xs font-medium <?php echo e($connected ? 'text-success' : 'text-muted'); ?>">
                        <span class="w-2 h-2 rounded-full <?php echo e($connected ? 'bg-success/100' : 'bg-gray-300'); ?>"></span>
                        <?php echo e($connected ? 'Connected' : 'Not connected'); ?>

                    </span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($connected): ?>
                    <a href="<?php echo e(url('/inbox/compose?channel=' . $ch['key'])); ?>" class="text-xs text-brand hover:text-brand font-medium">
                        Send test message &rarr;
                    </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="flex items-center gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($connected): ?>
                    <button wire:click="disconnect('<?php echo e($ch['key']); ?>')" wire:confirm="Disconnect <?php echo e($ch['name']); ?>? You will need to reconfigure this channel."
                            class="px-3 py-1.5 text-xs font-medium text-danger border border-danger/20 rounded-lg hover:bg-danger/10 transition-colors">
                        Disconnect
                    </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <button wire:click="configure('<?php echo e($ch['key']); ?>')"
                            class="px-4 py-2 text-sm font-medium text-white bg-brand rounded-xl hover:bg-brand-strong transition-colors">
                        <?php echo e($connected ? 'Edit' : 'Configure'); ?>

                    </button>
                </div>
            </div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringChannel): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="channel-config-modal-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" wire:click="closeConfig"></div>
            <div class="relative bg-surface-2 rounded-2xl shadow-xl max-w-lg w-full p-6 max-h-[90vh] overflow-y-auto" x-trap="$wire.configuringChannel">
                <div class="flex items-center justify-between mb-5">
                    <h2 id="channel-config-modal-title" class="text-lg font-semibold text-ink">
                        Configure
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($configuringChannel):
                            case ('whatsapp'): ?> WhatsApp <?php break; ?>
                            <?php case ('sms'): ?> SMS (Twilio) <?php break; ?>
                            <?php case ('telegram'): ?> Telegram <?php break; ?>
                            <?php case ('slack'): ?> Slack <?php break; ?>
                            <?php case ('chat'): ?> Live Chat <?php break; ?>
                        <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </h2>
                    <button wire:click="closeConfig" class="p-2 text-muted/60 hover:text-ink rounded-lg hover:bg-surface">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($saveStatus === 'saved'): ?>
                <div class="mb-4 p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm flex items-center gap-2">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Settings saved successfully!
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="space-y-4">
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringChannel === 'whatsapp'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Phone Number ID')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="whatsappPhoneNumberId" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="<?php echo e(__('e.g. 1234567890')); ?>">
                        <p class="text-xs text-muted mt-1"><?php echo e(__('From Meta Developer Dashboard')); ?> → WhatsApp → API Setup</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Access Token')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="whatsappAccessToken" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="<?php echo e(__('Permanent system user token')); ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Verify Token')); ?></label>
                        <input type="text" wire:model="whatsappVerifyToken" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="<?php echo e(__('Custom verify token for webhook')); ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('App Secret')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="whatsappAppSecret" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="<?php echo e(__('Meta App Secret — signs webhook deliveries')); ?>">
                        <p class="text-xs text-muted mt-1"><?php echo e(__('Meta Developer Dashboard → App Settings → Basic → App secret (click Show). Required for webhook signature verification.')); ?></p>
                    </div>
                    <div class="bg-surface rounded-xl p-4">
                        <p class="text-xs font-medium text-ink/80 mb-1"><?php echo e(__('Notification URL')); ?></p>
                        <div class="flex items-center gap-2">
                            <code class="flex-1 text-xs bg-surface-2 border border-border rounded-lg px-3 py-2 text-muted  truncate"><?php echo e(url('/api/webhooks/whatsapp')); ?></code>
                            <button x-data="{ copied: false }"
                                    @click="navigator.clipboard.writeText('<?php echo e(url('/api/webhooks/whatsapp')); ?>'); copied = true; setTimeout(() => copied = false, 2000)"
                                    class="px-3 py-2 text-xs font-medium text-brand bg-brand/10 rounded-lg hover:bg-brand/15">
                                <span x-show="!copied"><?php echo e(__('Copy')); ?></span>
                                <span x-show="copied" x-cloak class="text-success"><?php echo e(__('Copied!')); ?></span>
                            </button>
                        </div>
                        <p class="text-xs text-muted mt-2"><?php echo e(__('Paste this URL in Meta Developer Dashboard')); ?> → WhatsApp → Configuration → Webhook URL</p>
                    </div>
                    <div class="bg-blue-500/5 border border-blue-500/10 rounded-xl p-4 space-y-2">
                        <p class="text-xs font-semibold text-blue-400"><?php echo e(__('Setup Guide')); ?></p>
                        <ol class="text-xs text-muted space-y-1.5 list-decimal list-inside">
                            <li><?php echo e(__('Go to')); ?> <a href="https://developers.facebook.com" target="_blank" class="text-blue-400 underline">developers.facebook.com</a> → <?php echo e(__('Create an App (Business type)')); ?></li>
                            <li><?php echo e(__('Add WhatsApp product to your app')); ?></li>
                            <li><?php echo e(__('Go to WhatsApp → API Setup → copy Phone Number ID')); ?></li>
                            <li><?php echo e(__('Create a System User in Business Settings → generate a Permanent Token with whatsapp_business_messaging permission')); ?></li>
                            <li><?php echo e(__('Paste Phone Number ID and Access Token above')); ?></li>
                            <li><?php echo e(__('Go to WhatsApp → Configuration → Webhook → paste the Notification URL above')); ?></li>
                            <li><?php echo e(__('Subscribe to "messages" webhook field')); ?></li>
                            <li><?php echo e(__('Set the Verify Token (same value as above)')); ?></li>
                        </ol>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringChannel === 'sms'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Account SID')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="twilioSid" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="ACxxxxxxxxxxxxxxxx">
                        <p class="text-xs text-muted mt-1"><?php echo e(__('From Twilio Console')); ?> → Account Info</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Auth Token')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="twilioAuthToken" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="<?php echo e(__('Your auth token')); ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Phone Number')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="twilioPhoneNumber" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="+1234567890">
                    </div>
                    <div class="bg-surface rounded-xl p-4">
                        <p class="text-xs font-medium text-ink/80 mb-1"><?php echo e(__('Webhook URLs')); ?></p>
                        <div class="space-y-2">
                            <div>
                                <span class="text-xs text-muted"><?php echo e(__('Incoming:')); ?></span>
                                <div class="flex items-center gap-2 mt-1">
                                    <code class="flex-1 text-xs bg-surface-2 border border-border rounded-lg px-3 py-2 text-muted  truncate"><?php echo e(url('/api/webhooks/twilio/incoming')); ?></code>
                                    <button x-data="{ copied: false }"
                                            @click="navigator.clipboard.writeText('<?php echo e(url('/api/webhooks/twilio/incoming')); ?>'); copied = true; setTimeout(() => copied = false, 2000)"
                                            class="px-3 py-2 text-xs font-medium text-brand bg-brand/10 rounded-lg hover:bg-brand/15">
                                        <span x-show="!copied"><?php echo e(__('Copy')); ?></span>
                                        <span x-show="copied" x-cloak class="text-success"><?php echo e(__('Copied!')); ?></span>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-muted"><?php echo e(__('Status:')); ?></span>
                                <div class="flex items-center gap-2 mt-1">
                                    <code class="flex-1 text-xs bg-surface-2 border border-border rounded-lg px-3 py-2 text-muted  truncate"><?php echo e(url('/api/webhooks/twilio/status')); ?></code>
                                    <button x-data="{ copied: false }"
                                            @click="navigator.clipboard.writeText('<?php echo e(url('/api/webhooks/twilio/status')); ?>'); copied = true; setTimeout(() => copied = false, 2000)"
                                            class="px-3 py-2 text-xs font-medium text-brand bg-brand/10 rounded-lg hover:bg-brand/15">
                                        <span x-show="!copied"><?php echo e(__('Copy')); ?></span>
                                        <span x-show="copied" x-cloak class="text-success"><?php echo e(__('Copied!')); ?></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-500/5 border border-blue-500/10 rounded-xl p-4 space-y-2">
                        <p class="text-xs font-semibold text-blue-400"><?php echo e(__('Setup Guide')); ?></p>
                        <ol class="text-xs text-muted space-y-1.5 list-decimal list-inside">
                            <li><?php echo e(__('Go to')); ?> <a href="https://console.twilio.com" target="_blank" class="text-blue-400 underline">console.twilio.com</a> → <?php echo e(__('sign up or log in')); ?></li>
                            <li><?php echo e(__('Copy Account SID and Auth Token from the dashboard')); ?></li>
                            <li><?php echo e(__('Buy a phone number (Phone Numbers → Buy a Number)')); ?></li>
                            <li><?php echo e(__('Paste SID, Auth Token, and Phone Number above')); ?></li>
                            <li><?php echo e(__('Go to Phone Numbers → Active Numbers → click your number')); ?></li>
                            <li><?php echo e(__('Under Messaging → "A message comes in" → paste the Incoming webhook URL above')); ?></li>
                            <li><?php echo e(__('Under "Status callback URL" → paste the Status webhook URL above')); ?></li>
                            <li><?php echo e(__('Save and test by sending an SMS to your Twilio number')); ?></li>
                        </ol>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringChannel === 'telegram'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Bot Token')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="telegramBotToken" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11">
                        <p class="text-xs text-muted mt-1"><?php echo e(__('Message @BotFather on Telegram')); ?> → /newbot → copy the token</p>
                    </div>
                    <div class="bg-surface rounded-xl p-4">
                        <p class="text-xs font-medium text-ink/80 mb-1"><?php echo e(__('Notification URL')); ?></p>
                        <div class="flex items-center gap-2">
                            <code class="flex-1 text-xs bg-surface-2 border border-border rounded-lg px-3 py-2 text-muted  truncate"><?php echo e(url('/api/webhooks/telegram')); ?></code>
                            <button x-data="{ copied: false }"
                                    @click="navigator.clipboard.writeText('<?php echo e(url('/api/webhooks/telegram')); ?>'); copied = true; setTimeout(() => copied = false, 2000)"
                                    class="px-3 py-2 text-xs font-medium text-brand bg-brand/10 rounded-lg hover:bg-brand/15">
                                <span x-show="!copied"><?php echo e(__('Copy')); ?></span>
                                <span x-show="copied" x-cloak class="text-success"><?php echo e(__('Copied!')); ?></span>
                            </button>
                        </div>
                        <p class="text-xs text-muted mt-2"><?php echo e(__('The webhook is set automatically when you save (HTTPS required).')); ?></p>
                    </div>
                    <div class="bg-blue-500/5 border border-blue-500/10 rounded-xl p-4 space-y-2">
                        <p class="text-xs font-semibold text-blue-400"><?php echo e(__('Setup Guide')); ?></p>
                        <ol class="text-xs text-muted space-y-1.5 list-decimal list-inside">
                            <li><?php echo e(__('Open Telegram → search for')); ?> <strong class="text-ink">@BotFather</strong></li>
                            <li><?php echo e(__('Send')); ?> <code class="bg-white/5 px-1 rounded">/newbot</code> → <?php echo e(__('follow the prompts to name your bot')); ?></li>
                            <li><?php echo e(__('BotFather gives you a token like')); ?> <code class="bg-white/5 px-1 rounded">123456:ABC-DEF...</code> → <?php echo e(__('copy it')); ?></li>
                            <li><?php echo e(__('Paste the token above and click Save')); ?></li>
                            <li><?php echo e(__('The webhook URL is registered automatically (requires HTTPS)')); ?></li>
                            <li><?php echo e(__('Users must send')); ?> <code class="bg-white/5 px-1 rounded">/start</code> <?php echo e(__('to your bot before you can message them')); ?></li>
                            <li><?php echo e(__('Use the chat ID or @username to send messages from the inbox')); ?></li>
                        </ol>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringChannel === 'slack'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Client ID')); ?> <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="slackClientId" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="<?php echo e(__('Your Slack app Client ID')); ?>">
                        <p class="text-xs text-muted mt-1"><?php echo e(__('From api.slack.com/apps')); ?> → Your App → Basic Information</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Client Secret')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="slackClientSecret" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Signing Secret')); ?> <span class="text-red-500">*</span></label>
                        <input type="password" wire:model="slackSigningSecret" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface">
                    </div>
                    <div class="bg-surface rounded-xl p-4 space-y-2">
                        <p class="text-xs font-medium text-ink/80"><?php echo e(__('Slack App URLs')); ?></p>
                        <div><span class="text-xs text-muted"><?php echo e(__('Events:')); ?></span> <code class="text-xs"><?php echo e(url('/api/webhooks/slack/events')); ?></code></div>
                        <div><span class="text-xs text-muted"><?php echo e(__('Commands:')); ?></span> <code class="text-xs"><?php echo e(url('/api/webhooks/slack/commands')); ?></code></div>
                        <div><span class="text-xs text-muted"><?php echo e(__('Interactions:')); ?></span> <code class="text-xs"><?php echo e(url('/api/webhooks/slack/interactions')); ?></code></div>
                    </div>
                    <div class="bg-blue-500/5 border border-blue-500/10 rounded-xl p-4 space-y-2">
                        <p class="text-xs font-semibold text-blue-400"><?php echo e(__('Setup Guide')); ?></p>
                        <ol class="text-xs text-muted space-y-1.5 list-decimal list-inside">
                            <li><?php echo e(__('Go to')); ?> <a href="https://api.slack.com/apps" target="_blank" class="text-blue-400 underline">api.slack.com/apps</a> → <?php echo e(__('Create New App → From Scratch')); ?></li>
                            <li><?php echo e(__('Copy Client ID, Client Secret, Signing Secret from Basic Information')); ?></li>
                            <li><?php echo e(__('Paste them above')); ?></li>
                            <li><?php echo e(__('Go to Event Subscriptions → Enable → paste the Events URL above')); ?></li>
                            <li><?php echo e(__('Subscribe to bot events:')); ?> <code class="bg-white/5 px-1 rounded">message.channels</code>, <code class="bg-white/5 px-1 rounded">message.im</code></li>
                            <li><?php echo e(__('Go to Interactivity → Enable → paste the Interactions URL above')); ?></li>
                            <li><?php echo e(__('Go to Slash Commands → create commands → paste the Commands URL above')); ?></li>
                            <li><?php echo e(__('Go to OAuth & Permissions → add scopes:')); ?> <code class="bg-white/5 px-1 rounded">chat:write</code>, <code class="bg-white/5 px-1 rounded">channels:history</code>, <code class="bg-white/5 px-1 rounded">im:history</code></li>
                            <li><?php echo e(__('Install app to workspace → authorize')); ?></li>
                            <li><?php echo e(__('Use channel name (e.g. #general) or channel ID to send messages')); ?></li>
                        </ol>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($configuringChannel === 'chat'): ?>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Company / Brand Name')); ?></label>
                        <input type="text" wire:model="chatCompanyName" placeholder="<?php echo e(__('e.g. Acme Support')); ?>" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl bg-surface focus:outline-none focus:ring-2 focus:ring-brand/40">
                        <p class="text-[10px] text-muted mt-1"><?php echo e(__('Shown in the chat header. Leave blank to use workspace name.')); ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Widget Color')); ?></label>
                        <div class="flex items-center gap-3">
                            <input type="color" wire:model="chatWidgetColor" class="w-10 h-10 rounded-lg border border-border cursor-pointer">
                            <input type="text" wire:model="chatWidgetColor" class="flex-1 px-4 py-2.5 text-sm border border-border rounded-xl bg-surface">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Position')); ?></label>
                        <select wire:model="chatPosition" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl bg-surface focus:outline-none focus:ring-2 focus:ring-brand/40">
                            <option value="bottom-right"><?php echo e(__('Bottom Right')); ?></option>
                            <option value="bottom-left"><?php echo e(__('Bottom Left')); ?></option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Welcome Message')); ?></label>
                        <textarea wire:model="chatWelcomeMessage" rows="2" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="<?php echo e(__('Hi there! How can we help you today?')); ?>"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Offline Message')); ?></label>
                        <textarea wire:model="chatOfflineMessage" rows="2" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 bg-surface" placeholder="<?php echo e(__("We're offline. Leave a message...")); ?>"></textarea>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-surface rounded-xl">
                        <div>
                            <span class="text-sm text-ink/80"><?php echo e(__('AI Auto-Reply in chat')); ?></span>
                            <p class="text-[10px] text-muted"><?php echo e(__('AI will reply to visitors when enabled')); ?></p>
                        </div>
                        <button wire:click="$toggle('chatAiAutoReply')" type="button"
                                class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors <?php echo e($chatAiAutoReply ? 'bg-brand' : 'bg-gray-200 dark:bg-gray-700'); ?>">
                            <span class="inline-block h-4 w-4 rounded-full bg-surface-2 shadow transition-transform <?php echo e($chatAiAutoReply ? 'translate-x-6' : 'translate-x-1'); ?>"></span>
                        </button>
                    </div>
                    <div class="bg-surface rounded-xl p-4">
                        <p class="text-xs font-medium text-ink/80 mb-1"><?php echo e(__('Embed Code')); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($chatWidgetPublicId): ?>
                            <code class="block text-xs bg-surface-2 border border-border rounded-lg px-3 py-2 text-muted break-all">&lt;script src="<?php echo e(url('/widget/v1.js')); ?>" data-workspace="<?php echo e($chatWidgetPublicId); ?>" data-color="<?php echo e($chatWidgetColor); ?>" data-position="<?php echo e($chatPosition); ?>"&gt;&lt;/script&gt;</code>
                            <p class="text-[10px] text-muted mt-1.5"><?php echo e(__('Paste this before')); ?> &lt;/body&gt; <?php echo e(__('on any page where you want the widget.')); ?></p>
                        <?php else: ?>
                            <p class="text-xs text-warning"><?php echo e(__('Save the channel first to generate the embed code.')); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="bg-blue-500/5 border border-blue-500/10 rounded-xl p-4 space-y-2">
                        <p class="text-xs font-semibold text-blue-400"><?php echo e(__('Setup Guide')); ?></p>
                        <ol class="text-xs text-muted space-y-1.5 list-decimal list-inside">
                            <li><?php echo e(__('Customize the widget color, welcome message, and position above')); ?></li>
                            <li><?php echo e(__('Click Save & Connect')); ?></li>
                            <li><?php echo e(__('Copy the embed script code shown above')); ?></li>
                            <li><?php echo e(__('Paste it before')); ?> <code class="bg-white/5 px-1 rounded">&lt;/body&gt;</code> <?php echo e(__('on your website pages')); ?></li>
                            <li><?php echo e(__('Visitors will see a chat bubble on your website')); ?></li>
                            <li><?php echo e(__('Messages appear in your inbox under Live Chat channel')); ?></li>
                            <li><?php echo e(__('Enable AI Auto-Reply to auto-respond to visitors')); ?></li>
                        </ol>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="flex items-center justify-end gap-3 mt-6 pt-4 border-t border-border">
                    <button wire:click="closeConfig" class="px-4 py-2.5 text-sm font-medium text-muted  hover:text-ink dark:text-gray-200"><?php echo e(__('Cancel')); ?></button>
                    <button wire:click="saveChannel" class="px-6 py-2.5 bg-brand text-white text-sm font-medium rounded-xl hover:bg-brand-strong transition-colors">
                        <span wire:loading.remove wire:target="saveChannel"><?php echo e(__('Save & Connect')); ?></span>
                        <span wire:loading wire:target="saveChannel" class="inline-flex items-center gap-2">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                            Saving...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/channel-settings.blade.php ENDPATH**/ ?>