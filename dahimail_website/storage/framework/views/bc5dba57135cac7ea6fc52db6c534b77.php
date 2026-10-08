<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Create Role'),'subtitle' => __('Define a new role with specific permissions.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create Role')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Define a new role with specific permissions.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6" x-data="roleForm()">

        <form method="POST" action="<?php echo e(route('admin.roles.store')); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Role Information')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Define the role name and guard type.')); ?></p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Role Name')); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required
                                   placeholder="<?php echo e(__('e.g. Editor, Moderator')); ?>"
                                   class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
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

            
            <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                <div class="px-6 py-4 border-b border-border">
                    <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Permissions')); ?></h2>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Select the permissions to assign to this role. Permissions are grouped by module.')); ?></p>
                </div>
                <div class="p-6 space-y-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="p-3 bg-danger/10 border border-danger/20 rounded-xl text-sm text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $groupedPermissions ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="border border-border rounded-xl overflow-hidden">
                        <div class="px-4 py-3 bg-surface border-b border-border flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" @click="toggleModule('<?php echo e($module); ?>')" :checked="isModuleSelected('<?php echo e($module); ?>')"
                                           class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                                    <span class="text-sm font-bold text-ink uppercase tracking-wider"><?php echo e(ucfirst($module)); ?></span>
                                </label>
                            </div>
                            <span class="text-xs text-muted"><?php echo e(count($permissions)); ?> <?php echo e(__('permissions')); ?></span>
                        </div>
                        <div class="p-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <label class="flex items-center gap-2 cursor-pointer group">
                                <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>"
                                       x-model.number="selectedPermissions"
                                       <?php echo e(in_array($permission->id, old('permissions', [])) ? 'checked' : ''); ?>

                                       class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                                <span class="text-sm text-ink group-hover:text-brand transition-colors"><?php echo e($permission->name); ?></span>
                            </label>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <div class="text-center py-6">
                        <p class="text-sm text-muted"><?php echo e(__('No permissions available.')); ?> <a href="<?php echo e(route('admin.permissions.create')); ?>" class="text-brand hover:underline"><?php echo e(__('Create one')); ?></a>.</p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="flex items-center justify-between">
                <a href="<?php echo e(route('admin.roles.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <?php echo e(__('Back to Roles')); ?>

                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand text-white text-sm font-semibold rounded-xl hover:bg-brand-strong shadow-lg shadow-soft transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php echo e(__('Create Role')); ?>

                </button>
            </div>
        </form>
    </div>

    <script>
    function roleForm() {
        return {
            selectedPermissions: <?php echo json_encode(old('permissions', []), 512) ?>,
            modulePermissions: <?php echo json_encode(collect($groupedPermissions ?? [])->map(fn($perms) => collect($perms)->pluck('id')->toArray())->toArray(), 15, 512) ?>,
            toggleModule(module) {
                const ids = this.modulePermissions[module] || [];
                const allSelected = ids.every(id => this.selectedPermissions.includes(id));
                if (allSelected) {
                    this.selectedPermissions = this.selectedPermissions.filter(id => !ids.includes(id));
                } else {
                    ids.forEach(id => { if (!this.selectedPermissions.includes(id)) this.selectedPermissions.push(id); });
                }
            },
            isModuleSelected(module) {
                const ids = this.modulePermissions[module] || [];
                return ids.length > 0 && ids.every(id => this.selectedPermissions.includes(id));
            }
        };
    }
    </script>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/roles/create.blade.php ENDPATH**/ ?>