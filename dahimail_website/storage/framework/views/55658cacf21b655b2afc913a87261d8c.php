<div class="space-y-6">
    <div class="bg-surface-2 rounded-2xl border border-border p-6">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-brand/10 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="8" rx="2" stroke-width="2"/><rect x="2" y="13" width="20" height="8" rx="2" stroke-width="2"/><path stroke-linecap="round" stroke-width="2" d="M6 7h.01M6 17h.01"/></svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Mail server settings')); ?></h2>
                <p class="text-sm text-muted mt-0.5">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($info['available'] ?? false): ?>
                        <?php echo e(__('Use these details to read and send your :email mailbox from another email app or website.', ['email' => $info['email']])); ?>

                    <?php else: ?>
                        <?php echo e($info['message'] ?? ''); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
            </div>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($info['available'] ?? false): ?>
        <div class="grid gap-6 md:grid-cols-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [['key' => 'imap', 'title' => __('Incoming mail (IMAP)'), 'hint' => __('Lets another app read and sync your mail.')], ['key' => 'smtp', 'title' => __('Outgoing mail (SMTP)'), 'hint' => __('Lets another app send mail from your address.')]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php ($s = $info[$sec['key']]); ?>
                <div class="bg-surface-2 rounded-2xl border border-border p-6">
                    <h3 class="text-base font-semibold text-ink"><?php echo e($sec['title']); ?></h3>
                    <p class="text-xs text-muted mb-3"><?php echo e($sec['hint']); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [[__('Server'), $s['host']], [__('Port'), (string) $s['port']], [__('Security'), $s['security']], [__('Username'), $info['username']]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <div class="flex items-center justify-between gap-3 py-2.5 border-b border-border" x-data="{ copied: false }">
                            <div class="min-w-0">
                                <div class="text-xs text-muted"><?php echo e($label); ?></div>
                                <div class="text-sm font-medium text-ink break-all"><?php echo e($value); ?></div>
                            </div>
                            <button type="button" @click="navigator.clipboard.writeText(<?php echo \Illuminate\Support\Js::from($value)->toHtml() ?>); copied = true; setTimeout(() => copied = false, 1500)"
                                    class="text-xs font-medium text-brand hover:underline flex-shrink-0">
                                <span x-show="!copied"><?php echo e(__('Copy')); ?></span><span x-show="copied" x-cloak><?php echo e(__('Copied')); ?></span>
                            </button>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <div class="py-2.5 border-b border-border">
                        <div class="text-xs text-muted"><?php echo e(__('Password')); ?></div>
                        <div class="text-sm text-ink"><?php echo e($info['password_hint']); ?></div>
                    </div>
                    <p class="text-xs text-muted pt-3"><?php echo e(__('Alternative: port :port with :sec.', ['port' => $s['alt_port'], 'sec' => $s['alt_security']])); ?></p>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($info['pop3'])): ?>
            <div class="bg-surface-2 rounded-2xl border border-border p-6">
                <h3 class="text-base font-semibold text-ink"><?php echo e(__('POP3 (only if an app asks for it)')); ?></h3>
                <p class="text-sm text-muted mt-1"><?php echo e(__('Server')); ?>: <span class="font-medium text-ink"><?php echo e($info['pop3']['host']); ?></span> &middot; <?php echo e(__('Port')); ?>: <span class="font-medium text-ink"><?php echo e($info['pop3']['port']); ?></span> &middot; <?php echo e($info['pop3']['security']); ?>. <?php echo e(__('IMAP is recommended: it keeps all your devices in sync.')); ?></p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($info['webmail_url'])): ?>
            <a href="<?php echo e($info['webmail_url']); ?>" target="_blank" rel="noopener" class="btn-primary inline-flex items-center gap-2"><?php echo e(__('Open webmail')); ?></a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <p class="text-xs text-muted"><?php echo e(__('Keep your password private. If you change it on :app, update it in the other app too.', ['app' => $info['app_name']])); ?></p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/mail-server-settings.blade.php ENDPATH**/ ?>