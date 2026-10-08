
<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Contact Page Content')); ?></h2>
    </div>
    <div class="p-6 space-y-4">
        <div>
            <label class="settings-label"><?php echo e(__('Subtitle')); ?></label>
            <input type="text" name="content[subtitle]" value="<?php echo e(old('content.subtitle', $content['subtitle'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__("Have a question? We'd love to hear from you.")); ?>">
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Support Email Label')); ?></label>
            <input type="text" name="content[support_email_label]" value="<?php echo e(old('content.support_email_label', $content['support_email_label'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('Email Support')); ?>">
            <p class="settings-hint"><?php echo e(__('The actual email address is pulled from System Settings > General > Support Email.')); ?></p>
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Response Time')); ?></label>
            <input type="text" name="content[response_time]" value="<?php echo e(old('content.response_time', $content['response_time'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('24-48 hours')); ?>">
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Support Channels Description')); ?></label>
            <textarea name="content[support_channels]" rows="3" class="settings-input resize-none"><?php echo e(old('content.support_channels', $content['support_channels'] ?? '')); ?></textarea>
        </div>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/frontend-settings/partials/contact.blade.php ENDPATH**/ ?>