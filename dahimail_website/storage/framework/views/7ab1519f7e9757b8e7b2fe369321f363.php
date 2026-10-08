<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Permissions'),'subtitle' => __('Manage all permissions used across roles.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Permissions')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Manage all permissions used across roles.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Permissions')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Manage fine-grained permissions grouped by module.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" class="btn-secondary" x-data @click="$dispatch('open-modal', 'import-permissions')"><?php echo e(__('Import CSV')); ?></button>
                    <a href="<?php echo e(route('admin.permissions.export', request()->query())); ?>" class="btn-secondary"><?php echo e(__('Export CSV')); ?></a>
                    <a href="<?php echo e(route('admin.permissions.create')); ?>" class="btn-primary"><?php echo e(__('Create Permission')); ?></a>
                </div>
            </div>

            <form method="get" action="<?php echo e(route('admin.permissions.index')); ?>" class="filter-form mt-6 grid gap-4 lg:grid-cols-[1.4fr_1fr_1fr_auto] md:grid-cols-[1.4fr_1fr_1fr] sm:grid-cols-2">
                <div>
                    <label class="sr-only" for="search"><?php echo e(__('Search')); ?></label>
                    <input id="search" name="search" value="<?php echo e(request('search')); ?>" class="input-field" placeholder="<?php echo e(__('Search by permission name')); ?>">
                </div>
                <div>
                    <label class="sr-only" for="guard"><?php echo e(__('Guard')); ?></label>
                    <select id="guard" name="guard" class="input-field">
                        <option value=""><?php echo e(__('All guards')); ?></option>
                        <option value="web" <?php if(request('guard') === 'web'): echo 'selected'; endif; ?>><?php echo e(__('Web')); ?></option>
                        <option value="api" <?php if(request('guard') === 'api'): echo 'selected'; endif; ?>><?php echo e(__('API')); ?></option>
                    </select>
                </div>
                <div>
                    <label class="sr-only" for="module"><?php echo e(__('Module')); ?></label>
                    <select id="module" name="module" class="input-field">
                        <option value=""><?php echo e(__('All modules')); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $modules ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($mod); ?>" <?php if(request('module') === $mod): echo 'selected'; endif; ?>><?php echo e(ucfirst($mod)); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                </div>
                <div class="flex items-center gap-3">
                    <button class="btn-secondary" type="submit"><?php echo e(__('Filter')); ?></button>
                    <a href="<?php echo e(route('admin.permissions.index')); ?>" class="btn-secondary"><?php echo e(__('Reset')); ?></a>
                </div>
            </form>
        </div>

        
        <div class="panel p-6" x-data="{
            selected: [],
            selectAll: false,
            allIds: [<?php echo e($permissions->pluck('id')->join(',')); ?>]
        }" x-init="$watch('selectAll', v => { selected = v ? [...allIds] : [] })">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Permission Directory')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Showing')); ?> <?php echo e($permissions->count()); ?> <?php echo e(__('of')); ?> <?php echo e($permissions->total()); ?> <?php echo e(__('permissions.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" class="btn-secondary" onclick="window.print()"><?php echo e(__('Print')); ?></button>
                    <button x-show="selected.length > 0" x-cloak type="button" class="btn-danger" @click="$dispatch('open-modal', 'bulk-delete-permissions')" x-text="'Bulk Delete (' + selected.length + ')'"></button>
                </div>
            </div>

            <?php
                $groupedPerms = $permissions->groupBy(function ($permission) {
                    $parts = explode('.', $permission->name);
                    return count($parts) > 1 ? $parts[0] : 'general';
                });
            ?>

            <div class="mt-6 space-y-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $groupedPerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $modulePermissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="border border-border rounded-xl overflow-hidden">
                    <div class="px-4 py-3 bg-surface border-b border-border flex items-center justify-between">
                        <span class="text-sm font-bold text-ink uppercase tracking-wider"><?php echo e(ucfirst($module)); ?></span>
                        <span class="text-xs text-muted"><?php echo e($modulePermissions->count()); ?> <?php echo e(__('permissions')); ?></span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="text-xs uppercase tracking-[0.2em] text-muted">
                                <tr>
                                    <th class="px-4 pb-3 pt-3">
                                        <input type="checkbox" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40"
                                               @click="
                                                   const ids = [<?php echo e($modulePermissions->pluck('id')->join(',')); ?>];
                                                   const allChecked = ids.every(id => selected.includes(id));
                                                   if (allChecked) { selected = selected.filter(id => !ids.includes(id)); }
                                                   else { ids.forEach(id => { if (!selected.includes(id)) selected.push(id); }); }
                                               ">
                                    </th>
                                    <th class="px-4 pb-3 pt-3"><?php echo e(__('Name')); ?></th>
                                    <th class="px-4 pb-3 pt-3"><?php echo e(__('Guard')); ?></th>
                                    <th class="px-4 pb-3 pt-3"><?php echo e(__('Roles')); ?></th>
                                    <th class="px-4 pb-3 pt-3 text-right"><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border/60">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $modulePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <tr>
                                    <td class="px-4 py-3">
                                        <input type="checkbox" value="<?php echo e($permission->id); ?>" x-model.number="selected" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="font-semibold text-ink"><?php echo e($permission->name); ?></span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full <?php echo e($permission->guard_name === 'web' ? 'bg-brand/15 text-brand' : 'bg-warning/15 text-warning'); ?>"><?php echo e($permission->guard_name); ?></span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-ink"><?php echo e($permission->roles_count ?? $permission->roles->count()); ?></td>
                                    <td class="px-4 py-3 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="<?php echo e(route('admin.permissions.edit', $permission->id)); ?>" class="btn-secondary"><?php echo e(__('Edit')); ?></a>
                                            <button type="button" class="btn-danger" x-data @click="$dispatch('open-modal', 'confirm-delete-perm-<?php echo e($permission->id); ?>')"><?php echo e(__('Delete')); ?></button>
                                        </div>
                                    </td>
                                </tr>

                                <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'confirm-delete-perm-'.e($permission->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-delete-perm-'.e($permission->id).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                    <form method="POST" action="<?php echo e(route('admin.permissions.destroy', $permission->id)); ?>" class="p-6 space-y-4">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <div>
                                            <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete')); ?> "<?php echo e($permission->name); ?>"?</p>
                                            <p class="mt-2 text-sm text-muted"><?php echo e(__('This permission will be')); ?> <strong class="text-danger"><?php echo e(__('permanently deleted')); ?></strong> <?php echo e(__('and removed from all roles.')); ?></p>
                                        </div>
                                        <div class="flex justify-end gap-3">
                                            <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                                            <button type="submit" class="btn-danger"><?php echo e(__('Delete Permission')); ?></button>
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
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="py-6 text-center text-sm text-muted"><?php echo e(__('No permissions found.')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($permissions->hasPages()): ?>
            <div class="mt-4 border-t border-border/60 pt-4">
                <?php echo e($permissions->withQueryString()->links()); ?>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'import-permissions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'import-permissions']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.permissions.import')); ?>" enctype="multipart/form-data" class="p-6 space-y-5">
            <?php echo csrf_field(); ?>
            <div>
                <h3 class="text-lg font-semibold text-ink"><?php echo e(__('Import Permissions')); ?></h3>
                <p class="mt-1 text-sm text-muted"><?php echo e(__('Upload a CSV file with permission definitions (name, guard_name).')); ?></p>
            </div>
            <div>
                <label for="import_file" class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('CSV File')); ?> <span class="text-danger">*</span></label>
                <input type="file" name="file" id="import_file" accept=".csv,.txt" required
                       class="w-full px-4 py-2.5 text-sm border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-brand/40 focus:border-transparent bg-surface text-ink">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                <button type="submit" class="btn-primary"><?php echo e(__('Upload')); ?></button>
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

    
    <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'bulk-delete-permissions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bulk-delete-permissions']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.permissions.bulk-destroy')); ?>" class="p-6 space-y-4"
              x-data @submit="
                  const checkboxes = document.querySelectorAll('input[type=checkbox][x-model\\.number=selected]:checked');
                  checkboxes.forEach(cb => {
                      const input = document.createElement('input');
                      input.type = 'hidden'; input.name = 'ids[]'; input.value = cb.value;
                      $el.appendChild(input);
                  });
              ">
            <?php echo csrf_field(); ?>
            <div>
                <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete selected permissions?')); ?></p>
                <p class="mt-2 text-sm text-muted"><?php echo e(__('You are about to')); ?> <strong class="text-danger"><?php echo e(__('permanently delete')); ?></strong> <?php echo e(__('the selected permission(s). They will be removed from all roles.')); ?></p>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                <button type="submit" class="btn-danger"><?php echo e(__('Delete Permanently')); ?></button>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/permissions/index.blade.php ENDPATH**/ ?>