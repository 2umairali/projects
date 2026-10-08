<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Plans'),'subtitle' => __('Manage subscription plans, feature limits, and pricing.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Plans')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Manage subscription plans, feature limits, and pricing.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Plans')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Manage subscription plans, pricing, and feature access.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" class="btn-secondary" x-data @click="$dispatch('open-modal', 'import-plans')"><?php echo e(__('Import CSV')); ?></button>
                    <a href="<?php echo e(route('admin.plans.export', ['template' => 1])); ?>" class="btn-secondary"><?php echo e(__('Download Template')); ?></a>
                    <a href="<?php echo e(route('admin.plans.create')); ?>" class="btn-primary"><?php echo e(__('Add Plan')); ?></a>
                </div>
            </div>

            <form method="get" class="filter-form mt-6 grid gap-4 lg:grid-cols-[1.4fr_1fr_1fr_auto] md:grid-cols-[1.4fr_1fr_1fr] sm:grid-cols-2">
                <div>
                    <label class="sr-only" for="search"><?php echo e(__('Search')); ?></label>
                    <input id="search" name="search" value="<?php echo e(request('search')); ?>" class="input-field" placeholder="<?php echo e(__('Search by plan name')); ?>">
                </div>
                <div>
                    <label class="sr-only" for="status"><?php echo e(__('Status')); ?></label>
                    <select id="status" name="status" class="input-field">
                        <option value=""><?php echo e(__('All statuses')); ?></option>
                        <option value="active" <?php if(request('status') === 'active'): echo 'selected'; endif; ?>><?php echo e(__('Active')); ?></option>
                        <option value="inactive" <?php if(request('status') === 'inactive'): echo 'selected'; endif; ?>><?php echo e(__('Inactive')); ?></option>
                    </select>
                </div>
                <div>
                    <label class="sr-only" for="sort"><?php echo e(__('Sort')); ?></label>
                    <select id="sort" name="sort" class="input-field">
                        <option value="latest" <?php if(request('sort', 'latest') === 'latest'): echo 'selected'; endif; ?>><?php echo e(__('Created (Newest)')); ?></option>
                        <option value="oldest" <?php if(request('sort') === 'oldest'): echo 'selected'; endif; ?>><?php echo e(__('Created (Oldest)')); ?></option>
                        <option value="name_asc" <?php if(request('sort') === 'name_asc'): echo 'selected'; endif; ?>><?php echo e(__('Name (A-Z)')); ?></option>
                        <option value="name_desc" <?php if(request('sort') === 'name_desc'): echo 'selected'; endif; ?>><?php echo e(__('Name (Z-A)')); ?></option>
                    </select>
                </div>
                <div class="flex items-center gap-3">
                    <button class="btn-secondary" type="submit"><?php echo e(__('Filter')); ?></button>
                    <a href="<?php echo e(route('admin.plans.index')); ?>" class="btn-secondary"><?php echo e(__('Reset')); ?></a>
                </div>
            </form>
        </div>

        
        <div class="panel p-6" x-data="{
            selected: [],
            selectAll: false,
            view: localStorage.getItem('admin-plans-view') || 'list',
            allIds: [<?php echo e($plans->pluck('id')->join(',')); ?>]
        }" x-init="$watch('view', v => localStorage.setItem('admin-plans-view', v)); $watch('selectAll', v => { selected = v ? [...allIds] : [] })">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Plan Directory')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Showing')); ?> <?php echo e($plans->count()); ?> <?php echo e(__('plans.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" @click="view = 'list'" :class="view === 'list' ? 'btn-primary' : 'btn-secondary'"><?php echo e(__('List')); ?></button>
                    <button type="button" @click="view = 'grid'" :class="view === 'grid' ? 'btn-primary' : 'btn-secondary'"><?php echo e(__('Grid')); ?></button>
                    <button type="button" class="btn-secondary" onclick="window.print()"><?php echo e(__('Print')); ?></button>
                    <a href="<?php echo e(route('admin.plans.export', request()->query())); ?>" class="btn-secondary"><?php echo e(__('Export')); ?></a>
                    <button x-show="selected.length > 0" x-cloak type="button" class="btn-danger" @click="$dispatch('open-modal', 'bulk-delete-plans')" x-text="'<?php echo e(__('Bulk Delete')); ?> (' + selected.length + ')'"></button>
                </div>
            </div>

            
            <div x-show="view === 'list'" class="mt-6 overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="text-xs uppercase tracking-[0.2em] text-muted">
                        <tr>
                            <th class="pb-3">
                                <input type="checkbox" x-model="selectAll" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                            </th>
                            <th class="pb-3"><?php echo e(__('Plan')); ?></th>
                            <th class="pb-3"><?php echo e(__('Price')); ?></th>
                            <th class="pb-3"><?php echo e(__('Subscribers')); ?></th>
                            <th class="pb-3"><?php echo e(__('Status')); ?></th>
                            <th class="pb-3 text-right"><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/60">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr>
                            <td class="py-4">
                                <input type="checkbox" value="<?php echo e($plan->id); ?>" x-model.number="selected" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                            </td>
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand/10 text-brand text-xs font-bold">
                                        <?php echo e(strtoupper(substr($plan->name, 0, 2))); ?>

                                    </span>
                                    <div>
                                        <span class="font-semibold text-ink"><?php echo e($plan->name); ?></span>
                                        <p class="text-xs text-muted font-mono"><?php echo e($plan->slug); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->isFree()): ?>
                                    <span class="text-sm font-semibold text-ink"><?php echo e(__('Free')); ?></span>
                                <?php else: ?>
                                    <div>
                                        <span class="text-sm font-semibold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($plan->monthly_price); ?><?php echo e(__('/mo')); ?></span>
                                    </div>
                                    <p class="text-xs text-muted"><?php echo \App\Helpers\CurrencyHelper::display($plan->yearly_price); ?><?php echo e(__('/yr')); ?></p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="py-4 text-sm text-ink"><?php echo e(number_format($plan->active_subscriptions_count)); ?></td>
                            <td class="py-4">
                                <span class="text-sm font-semibold text-ink"><?php echo e($plan->is_active ? __('Active') : __('Inactive')); ?></span>
                            </td>
                            <td class="py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="<?php echo e(route('admin.plans.show', $plan->id)); ?>" class="btn-secondary"><?php echo e(__('View')); ?></a>
                                    <a href="<?php echo e(route('admin.plans.edit', $plan->id)); ?>" class="btn-secondary"><?php echo e(__('Edit')); ?></a>
                                    <button type="button" class="btn-danger" x-data @click="$dispatch('open-modal', 'confirm-delete-<?php echo e($plan->id); ?>')"><?php echo e(__('Delete')); ?></button>
                                </div>
                            </td>
                        </tr>

                        
                        <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'confirm-delete-'.e($plan->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-delete-'.e($plan->id).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <form method="POST" action="<?php echo e(route('admin.plans.destroy', $plan->id)); ?>" class="p-6 space-y-4">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <div>
                                    <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete')); ?> "<?php echo e($plan->name); ?>"?</p>
                                    <p class="mt-2 text-sm text-muted"><?php echo e(__('This will')); ?> <strong class="text-danger"><?php echo e(__('permanently delete')); ?></strong> <?php echo e(__('this plan. Existing subscribers may be affected.')); ?></p>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                                    <button type="submit" class="btn-danger"><?php echo e(__('Delete Plan')); ?></button>
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
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr>
                            <td colspan="6" class="py-6 text-center text-sm text-muted"><?php echo e(__('No plans found.')); ?></td>
                        </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <div x-show="view === 'grid'" x-cloak class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="panel p-4 space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" value="<?php echo e($plan->id); ?>" x-model.number="selected" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand/10 text-brand text-sm font-bold">
                            <?php echo e(strtoupper(substr($plan->name, 0, 2))); ?>

                        </span>
                        <div class="min-w-0">
                            <span class="font-semibold text-ink truncate block"><?php echo e($plan->name); ?></span>
                            <p class="text-xs text-muted font-mono"><?php echo e($plan->slug); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->isFree()): ?>
                            <span class="font-semibold text-ink"><?php echo e(__('Free')); ?></span>
                        <?php else: ?>
                            <span class="font-semibold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($plan->monthly_price); ?><?php echo e(__('/mo')); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span class="text-muted"><?php echo e(number_format($plan->active_subscriptions_count)); ?> <?php echo e(__('subs')); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="font-semibold text-ink"><?php echo e($plan->is_active ? __('Active') : __('Inactive')); ?></span>
                    </div>
                    <div class="flex items-center gap-2 pt-2 border-t border-border/60">
                        <a href="<?php echo e(route('admin.plans.show', $plan->id)); ?>" class="btn-secondary text-xs"><?php echo e(__('View')); ?></a>
                        <a href="<?php echo e(route('admin.plans.edit', $plan->id)); ?>" class="btn-secondary text-xs"><?php echo e(__('Edit')); ?></a>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-span-full py-6 text-center text-sm text-muted"><?php echo e(__('No plans found.')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'import-plans']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'import-plans']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.plans.import')); ?>" enctype="multipart/form-data" class="p-6 space-y-5">
            <?php echo csrf_field(); ?>
            <div>
                <h3 class="text-lg font-semibold text-ink"><?php echo e(__('Import Plans')); ?></h3>
                <p class="mt-1 text-sm text-muted"><?php echo e(__('Upload a CSV file that matches the provided template.')); ?></p>
            </div>
            <?php if (isset($component)) { $__componentOriginal853435531aaae0055371330c04c002f1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal853435531aaae0055371330c04c002f1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.file-uploader','data' => ['name' => 'file','accept' => '.csv,.txt','label' => __('CSV File')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('file-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'file','accept' => '.csv,.txt','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('CSV File'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal853435531aaae0055371330c04c002f1)): ?>
<?php $attributes = $__attributesOriginal853435531aaae0055371330c04c002f1; ?>
<?php unset($__attributesOriginal853435531aaae0055371330c04c002f1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal853435531aaae0055371330c04c002f1)): ?>
<?php $component = $__componentOriginal853435531aaae0055371330c04c002f1; ?>
<?php unset($__componentOriginal853435531aaae0055371330c04c002f1); ?>
<?php endif; ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'bulk-delete-plans']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bulk-delete-plans']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.plans.bulk-destroy')); ?>" class="p-6 space-y-4"
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
                <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete selected plans?')); ?></p>
                <p class="mt-2 text-sm text-muted"><?php echo e(__('You are about to')); ?> <strong class="text-danger"><?php echo e(__('permanently delete')); ?></strong> <?php echo e(__('the selected plan(s). Plans with active subscriptions will be skipped. This action cannot be undone.')); ?></p>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/plans/index.blade.php ENDPATH**/ ?>