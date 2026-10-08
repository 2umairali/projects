<div class="panel overflow-hidden">
    <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
        <h2 class="text-base font-bold text-ink"><?php echo e(__('Testimonial Details')); ?></h2>
    </div>
    <div class="p-6 space-y-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div>
                <label class="settings-label"><?php echo e(__('Client Name')); ?> <span class="text-danger">*</span></label>
                <input type="text" name="client_name" value="<?php echo e(old('client_name', $testimonial->client_name ?? '')); ?>" class="settings-input" required placeholder="Sarah Chen">
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Position / Title')); ?></label>
                <input type="text" name="client_position" value="<?php echo e(old('client_position', $testimonial->client_position ?? '')); ?>" class="settings-input" placeholder="Head of Customer Success, TechFlow">
            </div>
        </div>

        <div>
            <label class="settings-label"><?php echo e(__('Review')); ?> <span class="text-danger">*</span></label>
            <textarea name="review" rows="4" class="settings-input resize-none" required placeholder="What did the client say?"><?php echo e(old('review', $testimonial->review ?? '')); ?></textarea>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <div>
                <label class="settings-label"><?php echo e(__('Rating')); ?></label>
                <select name="rating" class="settings-select">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 5; $i >= 1; $i--): ?>
                    <option value="<?php echo e($i); ?>" <?php echo e(old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : ''); ?>><?php echo e($i); ?> <?php echo e(str_repeat('★', $i)); ?></option>
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Client Photo')); ?></label>
                <input type="file" name="client_image" accept="image/*" class="settings-input text-xs">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($testimonial) && $testimonial->client_image): ?>
                <div class="mt-2 flex items-center gap-2">
                    <img src="<?php echo e(asset('storage/' . $testimonial->client_image)); ?>" class="w-10 h-10 rounded-full object-cover">
                    <span class="text-xs text-muted"><?php echo e(__('Current photo')); ?></span>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="settings-label"><?php echo e(__('Status')); ?></label>
                <label class="flex items-center gap-3 mt-2 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $testimonial->is_active ?? true) ? 'checked' : ''); ?> class="rounded border-border text-brand focus:ring-brand">
                    <span class="text-sm text-ink"><?php echo e(__('Active (visible on website)')); ?></span>
                </label>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/testimonials/_form.blade.php ENDPATH**/ ?>