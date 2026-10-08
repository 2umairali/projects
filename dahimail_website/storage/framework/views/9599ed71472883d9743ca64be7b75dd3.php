<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('CTA Section')); ?></h2>
    </div>
    <div class="p-6 space-y-4">
        <div>
            <label class="settings-label"><?php echo e(__('Badge Text')); ?></label>
            <input type="text" name="content[badge]" value="<?php echo e(old('content.badge', $content['badge'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('Ready to get started?')); ?>">
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Title')); ?></label>
            <input type="text" name="content[title]" value="<?php echo e(old('content.title', $content['title'] ?? '')); ?>" class="settings-input">
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Subtitle')); ?></label>
            <textarea name="content[subtitle]" rows="2" class="settings-input resize-none"><?php echo e(old('content.subtitle', $content['subtitle'] ?? '')); ?></textarea>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label class="settings-label"><?php echo e(__('Button Text')); ?></label>
                <input type="text" name="content[cta_text]" value="<?php echo e(old('content.cta_text', $content['cta_text'] ?? '')); ?>" class="settings-input">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Button URL')); ?></label>
                <input type="text" name="content[cta_url]" value="<?php echo e(old('content.cta_url', $content['cta_url'] ?? '')); ?>" class="settings-input" placeholder="/register">
            </div>
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Bottom Note')); ?></label>
            <input type="text" name="content[note]" value="<?php echo e(old('content.note', $content['note'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('No credit card required. Setup in minutes.')); ?>">
        </div>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/frontend-settings/partials/cta.blade.php ENDPATH**/ ?>