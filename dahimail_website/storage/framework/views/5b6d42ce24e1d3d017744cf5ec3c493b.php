<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('About Page Content')); ?></h2>
    </div>
    <div class="p-6 space-y-4">
        <div>
            <label class="settings-label"><?php echo e(__('Page Title')); ?></label>
            <input type="text" name="content[title]" value="<?php echo e(old('content.title', $content['title'] ?? '')); ?>" class="settings-input" placeholder="About Us">
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Subtitle')); ?></label>
            <textarea name="content[subtitle]" rows="2" class="settings-input resize-none"><?php echo e(old('content.subtitle', $content['subtitle'] ?? '')); ?></textarea>
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Story / Description')); ?></label>
            <textarea name="content[story]" rows="5" class="settings-input resize-none"><?php echo e(old('content.story', $content['story'] ?? '')); ?></textarea>
        </div>
        <div>
            <label class="settings-label"><?php echo e(__('Mission Statement')); ?></label>
            <textarea name="content[mission]" rows="3" class="settings-input resize-none"><?php echo e(old('content.mission', $content['mission'] ?? '')); ?></textarea>
        </div>
    </div>
</div>

<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Stats')); ?></h2>
        <p class="text-xs text-muted mt-0.5"><?php echo e(__('Key numbers displayed on the about page.')); ?></p>
    </div>
    <div class="p-6 space-y-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 4; $i++): ?>
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="settings-label"><?php echo e(__('Stat')); ?> <?php echo e($i + 1); ?> <?php echo e(__('Value')); ?></label>
                <input type="text" name="content[stats][<?php echo e($i); ?>][value]" value="<?php echo e(old("content.stats.{$i}.value", $content['stats'][$i]['value'] ?? '')); ?>" class="settings-input" placeholder="10K+">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Stat')); ?> <?php echo e($i + 1); ?> <?php echo e(__('Label')); ?></label>
                <input type="text" name="content[stats][<?php echo e($i); ?>][label]" value="<?php echo e(old("content.stats.{$i}.label", $content['stats'][$i]['label'] ?? '')); ?>" class="settings-input" placeholder="Active Users">
            </div>
        </div>
        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/frontend-settings/partials/about.blade.php ENDPATH**/ ?>