<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Header')); ?></h2>
    </div>
    <div class="p-6">
        <label class="settings-label"><?php echo e(__('Section Title')); ?></label>
        <input type="text" name="content[title]" value="<?php echo e(old('content.title', $content['title'] ?? '')); ?>" class="settings-input">
    </div>
</div>

<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('FAQ Items')); ?></h2>
        <p class="text-xs text-muted mt-0.5"><?php echo e(__('Edit the 5 FAQ accordion items.')); ?></p>
    </div>
    <div class="p-6 space-y-5">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 5; $i++): ?>
        <div class="rounded-xl border border-border/50 p-4 space-y-3">
            <div>
                <label class="settings-label"><?php echo e(__('Question')); ?> <?php echo e($i + 1); ?></label>
                <input type="text" name="content[items][<?php echo e($i); ?>][question]" value="<?php echo e(old("content.items.{$i}.question", $content['items'][$i]['question'] ?? '')); ?>" class="settings-input">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Answer')); ?> <?php echo e($i + 1); ?></label>
                <textarea name="content[items][<?php echo e($i); ?>][answer]" rows="3" class="settings-input resize-none"><?php echo e(old("content.items.{$i}.answer", $content['items'][$i]['answer'] ?? '')); ?></textarea>
            </div>
        </div>
        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/frontend-settings/partials/faq.blade.php ENDPATH**/ ?>