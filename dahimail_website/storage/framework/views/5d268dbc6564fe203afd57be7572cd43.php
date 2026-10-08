<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $role->name,'subtitle' => __('Role details, permissions, and assigned users.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($role->name),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Role details, permissions, and assigned users.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-brand/10 text-brand text-lg font-bold">
                        <?php echo e(strtoupper(substr($role->name, 0, 2))); ?>

                    </span>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-lg font-bold text-ink"><?php echo e($role->name); ?></span>
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded-full <?php echo e($role->guard_name === 'web' ? 'bg-brand/15 text-brand' : 'bg-warning/15 text-warning'); ?>"><?php echo e($role->guard_name); ?></span>
                        </div>
                        <p class="text-sm text-muted mt-1">
                            <?php echo e(__('Created')); ?> <?php echo e($role->created_at->format('M j, Y')); ?>

                            &middot; <?php echo e($role->permissions->count()); ?> <?php echo e(__('permissions')); ?>

                            &middot; <?php echo e($role->users->count()); ?> <?php echo e(__('users')); ?>

                        </p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="<?php echo e(route('admin.roles.edit', $role->id)); ?>" class="btn-secondary"><?php echo e(__('Edit Role')); ?></a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role->name !== 'Super Admin'): ?>
                    <button type="button" class="btn-danger" x-data @click="$dispatch('open-modal', 'confirm-delete-role')"><?php echo e(__('Delete')); ?></button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Assigned Permissions')); ?></h2>
                    <p class="text-sm text-muted mt-0.5"><?php echo e($role->permissions->count()); ?> <?php echo e(__('permissions grouped by module.')); ?></p>
                </div>
                <div class="p-6 space-y-4">
                    <?php
                        $grouped = $role->permissions->groupBy(function ($permission) {
                            $parts = explode('.', $permission->name);
                            return count($parts) > 1 ? $parts[0] : 'general';
                        });
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="border border-border rounded-xl overflow-hidden">
                        <div class="px-4 py-2.5 bg-surface border-b border-border flex items-center justify-between">
                            <span class="text-sm font-bold text-ink uppercase tracking-wider"><?php echo e(ucfirst($module)); ?></span>
                            <span class="text-xs text-muted"><?php echo e($permissions->count()); ?> <?php echo e(__('permissions')); ?></span>
                        </div>
                        <div class="p-3 flex flex-wrap gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <span class="px-2.5 py-1 text-xs font-medium bg-brand/10 text-brand rounded-full"><?php echo e($permission->name); ?></span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <div class="text-center py-6">
                        <p class="text-sm text-muted"><?php echo e(__('No permissions assigned to this role.')); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="panel overflow-hidden">
                <div class="px-6 py-4 border-b border-border/50 bg-surface/50">
                    <h2 class="text-lg font-bold text-ink"><?php echo e(__('Users with this Role')); ?></h2>
                    <p class="text-sm text-muted mt-0.5"><?php echo e($role->users->count()); ?> <?php echo e(__('users assigned.')); ?></p>
                </div>
                <div class="p-6 space-y-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $role->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="flex items-center justify-between p-4 bg-surface rounded-xl hover:bg-surface transition-colors">
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand/10 text-brand text-xs font-bold">
                                <?php echo e(strtoupper(substr($user->name, 0, 2))); ?>

                            </span>
                            <div>
                                <p class="text-sm font-semibold text-ink"><?php echo e($user->name); ?></p>
                                <p class="text-xs text-muted"><?php echo e($user->email); ?></p>
                            </div>
                        </div>
                        <a href="<?php echo e(route('admin.users.show', $user->id)); ?>" class="btn-secondary text-xs"><?php echo e(__('View')); ?></a>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <div class="text-center py-6">
                        <p class="text-sm text-muted"><?php echo e(__('No users assigned to this role.')); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="flex items-center">
            <a href="<?php echo e(route('admin.roles.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <?php echo e(__('Back to Roles')); ?>

            </a>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role->name !== 'Super Admin'): ?>
    <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'confirm-delete-role']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-delete-role']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.roles.destroy', $role->id)); ?>" class="p-6 space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div>
                <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete')); ?> "<?php echo e($role->name); ?>"?</p>
                <p class="mt-2 text-sm text-muted"><?php echo e(__('This role will be')); ?> <strong class="text-danger"><?php echo e(__('permanently deleted')); ?></strong>. <?php echo e(__('All')); ?> <?php echo e($role->users->count()); ?> <?php echo e(__('users assigned to this role will lose their permissions.')); ?></p>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                <button type="submit" class="btn-danger"><?php echo e(__('Delete Role')); ?></button>
            </div>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27)): ?>
<?php $attributes = $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27; ?>
<?php unset($__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27)): ?>
<?php $component = $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27; ?>
<?php unset($__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/roles/show.blade.php ENDPATH**/ ?>