<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Hero Section')); ?></h2>
    </div>
    <div class="p-6 space-y-4">
        <div>
            <label class="settings-label"><?php echo e(__('Badge Text')); ?></label>
            <input type="text" name="content[badge]" value="<?php echo e(old('content.badge', $content['badge'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('Now with GPT-4o & Claude 4 Support')); ?>">
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div>
                <label class="settings-label"><?php echo e(__('Title Line 1')); ?></label>
                <input type="text" name="content[title_line1]" value="<?php echo e(old('content.title_line1', $content['title_line1'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('Achieve flawless email delivery')); ?>">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Highlighted Word')); ?></label>
                <input type="text" name="content[title_highlight]" value="<?php echo e(old('content.title_highlight', $content['title_highlight'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('AI-powered')); ?>">
                <p class="settings-hint"><?php echo e(__('This text gets the gradient color effect.')); ?></p>
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Title Line 2')); ?></label>
                <input type="text" name="content[title_line2]" value="<?php echo e(old('content.title_line2', $content['title_line2'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('automation.')); ?>">
            </div>
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Subtitle')); ?></label>
            <textarea name="content[subtitle]" rows="3" class="settings-input resize-none"><?php echo e(old('content.subtitle', $content['subtitle'] ?? '')); ?></textarea>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label class="settings-label"><?php echo e(__('Primary Button Text')); ?></label>
                <input type="text" name="content[cta_text]" value="<?php echo e(old('content.cta_text', $content['cta_text'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('Get Started Free')); ?>">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Primary Button URL')); ?></label>
                <input type="text" name="content[cta_url]" value="<?php echo e(old('content.cta_url', $content['cta_url'] ?? '')); ?>" class="settings-input" placeholder="/register">
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label class="settings-label"><?php echo e(__('Secondary Button Text')); ?></label>
                <input type="text" name="content[cta2_text]" value="<?php echo e(old('content.cta2_text', $content['cta2_text'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('See Features')); ?>">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Secondary Button URL')); ?></label>
                <input type="text" name="content[cta2_url]" value="<?php echo e(old('content.cta2_url', $content['cta2_url'] ?? '')); ?>" class="settings-input" placeholder="#features">
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/frontend-settings/partials/hero.blade.php ENDPATH**/ ?>