<div class="space-y-6" x-data="{ dirty: false }" @change="dirty = true" @saved.window="dirty = false"
     x-on:livewire:navigating.window="if(dirty && !confirm('You have unsaved changes. Leave anyway?')) $event.preventDefault()"
     x-init="window.addEventListener('beforeunload', (e) => { if(dirty) { e.preventDefault(); e.returnValue = '' } })">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?><div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm"><?php echo e(session('success')); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?><div class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm"><?php echo e(session('error')); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div><h1 class="text-2xl font-bold text-ink"><?php echo e(__('Workspace Settings')); ?></h1><p class="text-sm text-muted mt-1"><?php echo e(__('Configure your workspace profile and preferences.')); ?></p></div>

    
    <form wire:submit="save" class="bg-surface-2 rounded-2xl border border-border p-6 space-y-5">
        <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Workspace Profile')); ?></h2>

        
        <div>
            <label class="block text-sm font-medium text-ink/80 mb-2"><?php echo e(__('Workspace Logo')); ?></label>
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-primary-600 rounded-2xl flex items-center justify-center text-white text-xl font-bold flex-shrink-0 overflow-hidden">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($logo): ?>
                        <img src="<?php echo e($logo->temporaryUrl()); ?>" class="w-16 h-16 rounded-2xl object-cover" alt="Preview">
                    <?php elseif($currentLogoUrl): ?>
                        <img src="<?php echo e($currentLogoUrl); ?>" class="w-16 h-16 rounded-2xl object-cover" alt="Logo">
                    <?php else: ?>
                        <?php echo e(strtoupper(substr($name, 0, 1))); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <label class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium border border-border rounded-xl hover:bg-surface transition-colors cursor-pointer">
                        <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?php echo e(__('Upload Logo')); ?>

                        <input type="file" wire:model="logo" accept="image/*" class="hidden">
                    </label>
                    <p class="text-xs text-muted mt-1"><?php echo e(__('PNG, JPG or SVG. 256x256 recommended.')); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1.5"><?php echo e(__('Workspace Name')); ?></label>
                <input type="text" wire:model="name" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1.5"><?php echo e(__('Workspace Slug')); ?></label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-muted bg-surface border border-r-0 border-border rounded-l-xl">app.mailtrixy.com/</span>
                    <input type="text" wire:model="slug" class="flex-1 px-4 py-2.5 text-sm border border-border rounded-r-xl focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1.5"><?php echo e(__('Industry')); ?></label>
                <select wire:model="industry" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 bg-surface-2">
                    <option value=""><?php echo e(__('Select industry...')); ?></option>
                    <option value="saas"><?php echo e(__('SaaS / Software')); ?></option>
                    <option value="ecommerce"><?php echo e(__('E-commerce')); ?></option>
                    <option value="education"><?php echo e(__('Education')); ?></option>
                    <option value="healthcare"><?php echo e(__('Healthcare')); ?></option>
                    <option value="finance"><?php echo e(__('Finance')); ?></option>
                    <option value="consulting"><?php echo e(__('Consulting')); ?></option>
                    <option value="agency"><?php echo e(__('Agency')); ?></option>
                    <option value="real-estate"><?php echo e(__('Real Estate')); ?></option>
                    <option value="other"><?php echo e(__('Other')); ?></option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-ink/80 mb-1.5"><?php echo e(__('Timezone')); ?></label>
                <select wire:model="timezone" class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 bg-surface-2">
                    <option value="UTC">UTC</option>
                    <option value="America/New_York"><?php echo e(__('Eastern Time (US)')); ?></option>
                    <option value="America/Chicago"><?php echo e(__('Central Time (US)')); ?></option>
                    <option value="America/Los_Angeles"><?php echo e(__('Pacific Time (US)')); ?></option>
                    <option value="Europe/London"><?php echo e(__('London (GMT)')); ?></option>
                    <option value="Europe/Berlin"><?php echo e(__('Berlin (CET)')); ?></option>
                    <option value="Asia/Tokyo"><?php echo e(__('Tokyo (JST)')); ?></option>
                    <option value="Asia/Kolkata"><?php echo e(__('Mumbai (IST)')); ?></option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-end pt-2">
            <button type="submit" class="btn-primary px-6 py-2.5 text-sm">
                <span wire:loading.remove wire:target="save"><?php echo e(__('Save Changes')); ?></span>
                <span wire:loading wire:target="save" class="inline-flex items-center gap-2">
                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    Saving...
                </span>
            </button>
        </div>
    </form>

    
    <div class="bg-surface-2 rounded-2xl border-2 border-danger/20 p-6">
        <h2 class="text-lg font-semibold text-danger mb-2"><?php echo e(__('Danger Zone')); ?></h2>
        <p class="text-sm text-muted mb-4"><?php echo e(__('Irreversible and destructive actions. Please proceed with caution.')); ?></p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$showDeleteConfirm): ?>
        <div class="flex items-center justify-between p-4 bg-danger/10 rounded-xl border border-danger/20">
            <div>
                <p class="text-sm font-medium text-red-900"><?php echo e(__('Delete Workspace')); ?></p>
                <p class="text-xs text-danger mt-0.5"><?php echo e(__('This will permanently delete all data. This cannot be undone.')); ?></p>
            </div>
            <button wire:click="showDeleteWorkspace" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-xl hover:bg-red-700 transition-colors flex-shrink-0 ml-4"><?php echo e(__('Delete Workspace')); ?></button>
        </div>
        <?php else: ?>
        <div class="p-4 bg-danger/10 rounded-xl border border-danger/20 space-y-4">
            <p class="text-sm text-red-900 font-medium"><?php echo e(__('Type your workspace name to confirm deletion:')); ?></p>
            <p class="text-sm text-danger font-mono bg-danger/15 px-3 py-1 rounded inline-block"><?php echo e($name); ?></p>
            <div>
                <input type="text" wire:model="deleteConfirmation" placeholder="<?php echo e(__('Type workspace name here...')); ?>" class="w-full px-4 py-2.5 text-sm border border-red-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['deleteConfirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="text-sm text-danger font-medium mb-1 block"><?php echo e(__('Enter your password to confirm:')); ?></label>
                <input type="password" wire:model="deletePassword" placeholder="<?php echo e(__('Your account password')); ?>" class="w-full px-4 py-2.5 text-sm border border-red-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['deletePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="flex items-center gap-2">
                <button wire:click="deleteWorkspace" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-xl hover:bg-red-700 transition-colors"><?php echo e(__('Yes, Delete Forever')); ?></button>
                <button wire:click="cancelDelete" class="px-4 py-2 text-sm font-medium text-muted  border border-border rounded-xl hover:bg-surface transition-colors"><?php echo e(__('Cancel')); ?></button>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/workspace-settings.blade.php ENDPATH**/ ?>