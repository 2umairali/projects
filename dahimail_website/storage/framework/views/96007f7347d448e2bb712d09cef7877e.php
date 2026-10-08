<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Header')); ?></h2>
    </div>
    <div class="p-6 space-y-4">
        <div>
            <label class="settings-label"><?php echo e(__('Badge Text')); ?></label>
            <input type="text" name="content[badge]" value="<?php echo e(old('content.badge', $content['badge'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('Features')); ?>">
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Section Title')); ?></label>
            <input type="text" name="content[title]" value="<?php echo e(old('content.title', $content['title'] ?? '')); ?>" class="settings-input">
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Section Subtitle')); ?></label>
            <input type="text" name="content[subtitle]" value="<?php echo e(old('content.subtitle', $content['subtitle'] ?? '')); ?>" class="settings-input">
        </div>
    </div>
</div>

<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Feature Cards')); ?></h2>
        <p class="text-xs text-muted mt-0.5"><?php echo e(__('Edit up to 6 feature cards shown on the landing page.')); ?></p>
    </div>
    <div class="p-6 space-y-5">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 6; $i++): ?>
        <div class="rounded-xl border border-border/50 p-4 space-y-3">
            <div>
                <label class="settings-label"><?php echo e(__('Feature')); ?> <?php echo e($i + 1); ?> <?php echo e(__('Title')); ?></label>
                <input type="text" name="content[items][<?php echo e($i); ?>][title]" value="<?php echo e(old("content.items.{$i}.title", $content['items'][$i]['title'] ?? '')); ?>" class="settings-input">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Feature')); ?> <?php echo e($i + 1); ?> <?php echo e(__('Description')); ?></label>
                <textarea name="content[items][<?php echo e($i); ?>][desc]" rows="2" class="settings-input resize-none"><?php echo e(old("content.items.{$i}.desc", $content['items'][$i]['desc'] ?? '')); ?></textarea>
            </div>
        </div>
        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/frontend-settings/partials/features.blade.php ENDPATH**/ ?>