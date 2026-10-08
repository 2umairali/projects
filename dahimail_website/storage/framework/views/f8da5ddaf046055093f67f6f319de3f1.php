
<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Header')); ?></h2>
    </div>
    <div class="p-6 space-y-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label class="settings-label"><?php echo e(__('Last Updated Date')); ?></label>
                <input type="text" name="content[last_updated]" value="<?php echo e(old('content.last_updated', $content['last_updated'] ?? '')); ?>" class="settings-input" placeholder="<?php echo e(__('January 1, 2026')); ?>">
            </div>
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Subtitle')); ?></label>
            <textarea name="content[subtitle]" rows="2" class="settings-input resize-none"><?php echo e(old('content.subtitle', $content['subtitle'] ?? '')); ?></textarea>
        </div>
    </div>
</div>


<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Privacy Sections')); ?></h2>
        <p class="text-xs text-muted mt-0.5"><?php echo e(__('Each section appears as a card with title and content.')); ?></p>
    </div>
    <div class="p-6 space-y-5">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 8; $i++): ?>
        <div class="rounded-xl border border-border/50 p-4 space-y-3">
            <div>
                <label class="settings-label"><?php echo e(__('Section')); ?> <?php echo e($i + 1); ?> <?php echo e(__('Title')); ?></label>
                <input type="text" name="content[sections][<?php echo e($i); ?>][title]" value="<?php echo e(old("content.sections.{$i}.title", $content['sections'][$i]['title'] ?? '')); ?>" class="settings-input">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Section')); ?> <?php echo e($i + 1); ?> <?php echo e(__('Content')); ?></label>
                <textarea name="content[sections][<?php echo e($i); ?>][content]" rows="3" class="settings-input resize-none"><?php echo e(old("content.sections.{$i}.content", $content['sections'][$i]['content'] ?? '')); ?></textarea>
            </div>
        </div>
        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>


<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Bottom Section')); ?></h2>
    </div>
    <div class="p-6">
        <label class="settings-label"><?php echo e(__('Bottom Text')); ?></label>
        <textarea name="content[bottom_text]" rows="3" class="settings-input resize-none"><?php echo e(old('content.bottom_text', $content['bottom_text'] ?? '')); ?></textarea>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/frontend-settings/partials/privacy.blade.php ENDPATH**/ ?>