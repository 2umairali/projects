<?php $__env->startSection('title', __('Create Workspace')); ?>
<?php $__env->startSection('step-name', __('Workspace')); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-surface-2 rounded-2xl border border-border/60 p-6 shadow-sm">

        
        <div class="text-center mb-5">
            <div class="w-12 h-12 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-ink"><?php echo e(__('Create your workspace')); ?></h2>
            <p class="mt-1 text-sm text-muted"><?php echo e(__('Set up your workspace to start automating communications')); ?></p>
        </div>

        
        <form method="POST" action="<?php echo e(route('onboarding.store-step-1')); ?>" enctype="multipart/form-data" class="space-y-4">
            <?php echo csrf_field(); ?>

            
            <div>
                <label for="workspace_name" class="block text-sm font-medium text-muted mb-1"><?php echo e(__('Workspace Name')); ?></label>
                <input id="workspace_name" type="text" name="workspace_name"
                       value="<?php echo e(old('workspace_name', $defaultName ?? '')); ?>" required
                       class="w-full px-4 py-2 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                       placeholder="<?php echo e(__('My Workspace')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['workspace_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div x-data="{ fileName: '', preview: null, setFile(f) { this.fileName = f.name; const r = new FileReader(); r.onload = e => this.preview = e.target.result; r.readAsDataURL(f); } }">
                <label class="block text-sm font-medium text-muted mb-1"><?php echo e(__('Company Logo')); ?> <span class="text-muted"><?php echo e(__('(optional)')); ?></span></label>
                <div class="relative border-2 border-dashed border-primary-300 rounded-xl p-4 text-center hover:border-primary-500 transition-colors cursor-pointer"
                     @dragover.prevent @drop.prevent="setFile($event.dataTransfer.files[0])" @click="$refs.fileInput.click()">
                    <template x-if="preview">
                        <div class="flex items-center justify-center gap-3">
                            <img :src="preview" class="w-10 h-10 object-cover rounded-lg" alt="<?php echo e(__('Logo preview')); ?>">
                            <span class="text-sm text-muted" x-text="fileName"></span>
                            <button type="button" @click.stop="preview=null;fileName='';$refs.fileInput.value=''" class="text-xs text-red-500 hover:text-danger font-medium"><?php echo e(__('Remove')); ?></button>
                        </div>
                    </template>
                    <template x-if="!preview">
                        <p class="text-sm text-muted"><span class="text-primary-600 font-semibold"><?php echo e(__('Click to upload')); ?></span> <?php echo e(__('or drag and drop')); ?> &middot; <?php echo e(__('PNG, JPG, SVG up to 2MB')); ?></p>
                    </template>
                    <input type="file" name="logo" x-ref="fileInput" accept="image/*" class="hidden" @change="setFile($event.target.files[0])">
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div>
                <label for="industry" class="block text-sm font-medium text-muted mb-1"><?php echo e(__('Industry')); ?></label>
                <select id="industry" name="industry" required
                        class="w-full px-4 py-2 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-surface-2">
                    <option value="" disabled <?php echo e(old('industry') ? '' : 'selected'); ?>><?php echo e(__('Select your industry')); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['saas' => __('SaaS / Software'), 'ecommerce' => __('E-commerce / Retail'), 'finance' => __('Finance / Banking'), 'healthcare' => __('Healthcare'), 'education' => __('Education'), 'real-estate' => __('Real Estate'), 'agency' => __('Agency / Consulting'), 'travel' => __('Travel / Hospitality'), 'nonprofit' => __('Non-profit'), 'other' => __('Other')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <option value="<?php echo e($val); ?>" <?php echo e(old('industry') === $val ? 'selected' : ''); ?>><?php echo e($lbl); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['industry'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div>
                <label class="block text-sm font-medium text-muted mb-2"><?php echo e(__('Team Size')); ?></label>
                <div class="grid grid-cols-4 gap-2" x-data="{ selected: '<?php echo e(old('team_size', '1')); ?>' }">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['1' => __('Just me'), '2-5' => __('2 - 5'), '6-20' => __('6 - 20'), '20+' => __('20+')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <label class="relative cursor-pointer">
                        <input type="radio" name="team_size" value="<?php echo e($value); ?>" class="peer sr-only" x-model="selected" <?php echo e(old('team_size', '1') === $value ? 'checked' : ''); ?>>
                        <div class="flex flex-col items-center justify-center py-2.5 border-2 rounded-xl transition-all peer-checked:border-primary-600 peer-checked:bg-primary-900/20 border-border hover:border-border">
                            <span class="text-sm font-medium" :class="selected === '<?php echo e($value); ?>' ? 'text-primary-700' : 'text-ink/80'"><?php echo e($label); ?></span>
                        </div>
                    </label>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['team_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="pt-2">
                <button type="submit" class="w-full py-2.5 px-6 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors flex items-center justify-center gap-2">
                    <?php echo e(__('Continue')); ?>

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.onboarding', ['currentStep' => 1], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/dahimail.com/public_html/resources/views/onboarding/step-1.blade.php ENDPATH**/ ?>