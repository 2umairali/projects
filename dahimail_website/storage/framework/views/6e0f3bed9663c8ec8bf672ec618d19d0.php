
<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Brand Section')); ?></h2>
    </div>
    <div class="p-6 space-y-4">
        <div>
            <label class="settings-label"><?php echo e(__('Description')); ?></label>
            <textarea name="content[description]" rows="3" class="settings-input resize-none"><?php echo e(old('content.description', $content['description'] ?? '')); ?></textarea>
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Copyright Text')); ?></label>
            <input type="text" name="content[copyright]" value="<?php echo e(old('content.copyright', $content['copyright'] ?? '')); ?>" class="settings-input">
        </div>
    </div>
</div>


<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Social Links')); ?></h2>
        <p class="text-xs text-muted mt-0.5"><?php echo e(__('Leave empty to hide the icon.')); ?></p>
    </div>
    <div class="p-6 space-y-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label class="settings-label"><?php echo e(__('Twitter / X URL')); ?></label>
                <input type="url" name="content[twitter_url]" value="<?php echo e(old('content.twitter_url', $content['twitter_url'] ?? '')); ?>" class="settings-input" placeholder="https://x.com/yourapp">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('GitHub URL')); ?></label>
                <input type="url" name="content[github_url]" value="<?php echo e(old('content.github_url', $content['github_url'] ?? '')); ?>" class="settings-input" placeholder="https://github.com/yourapp">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('LinkedIn URL')); ?></label>
                <input type="url" name="content[linkedin_url]" value="<?php echo e(old('content.linkedin_url', $content['linkedin_url'] ?? '')); ?>" class="settings-input" placeholder="https://linkedin.com/company/yourapp">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Facebook URL')); ?></label>
                <input type="url" name="content[facebook_url]" value="<?php echo e(old('content.facebook_url', $content['facebook_url'] ?? '')); ?>" class="settings-input" placeholder="https://facebook.com/yourapp">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Instagram URL')); ?></label>
                <input type="url" name="content[instagram_url]" value="<?php echo e(old('content.instagram_url', $content['instagram_url'] ?? '')); ?>" class="settings-input" placeholder="https://instagram.com/yourapp">
            </div>
        </div>
    </div>
</div>


<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Newsletter Section')); ?></h2>
    </div>
    <div class="p-6 space-y-4">
        <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="content[newsletter_enabled]" value="false">
            <input type="checkbox" name="content[newsletter_enabled]" value="true" <?php echo e(($content['newsletter_enabled'] ?? 'true') === 'true' ? 'checked' : ''); ?> class="rounded border-border text-brand focus:ring-brand">
            <span class="text-sm text-ink"><?php echo e(__('Show newsletter signup in footer')); ?></span>
        </label>
        <div>
            <label class="settings-label"><?php echo e(__('Newsletter Title')); ?></label>
            <input type="text" name="content[newsletter_title]" value="<?php echo e(old('content.newsletter_title', $content['newsletter_title'] ?? '')); ?>" class="settings-input">
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Newsletter Subtitle')); ?></label>
            <input type="text" name="content[newsletter_subtitle]" value="<?php echo e(old('content.newsletter_subtitle', $content['newsletter_subtitle'] ?? '')); ?>" class="settings-input">
        </div>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/frontend-settings/partials/footer.blade.php ENDPATH**/ ?>