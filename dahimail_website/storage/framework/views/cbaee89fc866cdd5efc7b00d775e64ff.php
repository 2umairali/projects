<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Create Permission'),'subtitle' => __('Define a new permission for role-based access control.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create Permission')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Define a new permission for role-based access control.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        <form method="POST" action="<?php echo e(route('admin.permissions.store')); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Permission Details')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Use the format')); ?> <code class="text-xs font-mono bg-surface px-1.5 py-0.5 rounded">module.action</code> <?php echo e(__('for consistent naming (e.g. users.create, posts.delete).')); ?></p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Permission Name')); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required
                                   placeholder="<?php echo e(__('e.g. users.create, posts.delete')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink font-mono <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <p class="text-xs text-muted mt-1"><?php echo e(__('Use dot notation: module.action')); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="guard_name" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Guard')); ?> <span class="text-danger">*</span></label>
                            <select name="guard_name" id="guard_name" required
                                    class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['guard_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="web" <?php echo e(old('guard_name', 'web') === 'web' ? 'selected' : ''); ?>><?php echo e(__('Web')); ?></option>
                                <option value="api" <?php echo e(old('guard_name') === 'api' ? 'selected' : ''); ?>><?php echo e(__('API')); ?></option>
                            </select>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['guard_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="flex items-center justify-between">
                <a href="<?php echo e(route('admin.permissions.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <?php echo e(__('Back to Permissions')); ?>

                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand text-white text-sm font-semibold rounded-xl hover:bg-brand-strong shadow-lg shadow-soft transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php echo e(__('Create Permission')); ?>

                </button>
            </div>
        </form>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/permissions/create.blade.php ENDPATH**/ ?>