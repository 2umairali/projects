<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Support Tickets'),'subtitle' => __('Manage and respond to customer support tickets.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Support Tickets')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Manage and respond to customer support tickets.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Tickets')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Manage support tickets, priorities, and resolutions.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" class="btn-secondary" x-data @click="$dispatch('open-modal', 'import-tickets')"><?php echo e(__('Import CSV')); ?></button>
                    <a href="<?php echo e(route('admin.tickets.export', ['template' => 1])); ?>" class="btn-secondary"><?php echo e(__('Download Template')); ?></a>
                    <button type="button" class="btn-primary" x-data @click="$dispatch('open-modal', 'add-ticket')"><?php echo e(__('Add Ticket')); ?></button>
                </div>
            </div>

            <form method="get" action="<?php echo e(route('admin.tickets.index')); ?>" class="filter-form mt-6 grid gap-4 lg:grid-cols-[1.4fr_1fr_1fr_1fr_auto] md:grid-cols-[1.4fr_1fr_1fr] sm:grid-cols-2">
                <div>
                    <label class="sr-only" for="search"><?php echo e(__('Search')); ?></label>
                    <input id="search" name="search" value="<?php echo e(request('search')); ?>" class="input-field" placeholder="<?php echo e(__('Search by subject, name or email')); ?>">
                </div>
                <div>
                    <label class="sr-only" for="status"><?php echo e(__('Status')); ?></label>
                    <select id="status" name="status" class="input-field">
                        <option value=""><?php echo e(__('All statuses')); ?></option>
                        <option value="open" <?php if(request('status') === 'open'): echo 'selected'; endif; ?>><?php echo e(__('Open')); ?></option>
                        <option value="in_progress" <?php if(request('status') === 'in_progress'): echo 'selected'; endif; ?>><?php echo e(__('In Progress')); ?></option>
                        <option value="waiting" <?php if(request('status') === 'waiting'): echo 'selected'; endif; ?>><?php echo e(__('Waiting')); ?></option>
                        <option value="resolved" <?php if(request('status') === 'resolved'): echo 'selected'; endif; ?>><?php echo e(__('Resolved')); ?></option>
                        <option value="closed" <?php if(request('status') === 'closed'): echo 'selected'; endif; ?>><?php echo e(__('Closed')); ?></option>
                    </select>
                </div>
                <div>
                    <label class="sr-only" for="priority"><?php echo e(__('Priority')); ?></label>
                    <select id="priority" name="priority" class="input-field">
                        <option value=""><?php echo e(__('All priorities')); ?></option>
                        <option value="low" <?php if(request('priority') === 'low'): echo 'selected'; endif; ?>><?php echo e(__('Low')); ?></option>
                        <option value="medium" <?php if(request('priority') === 'medium'): echo 'selected'; endif; ?>><?php echo e(__('Medium')); ?></option>
                        <option value="high" <?php if(request('priority') === 'high'): echo 'selected'; endif; ?>><?php echo e(__('High')); ?></option>
                        <option value="urgent" <?php if(request('priority') === 'urgent'): echo 'selected'; endif; ?>><?php echo e(__('Urgent')); ?></option>
                    </select>
                </div>
                <div>
                    <label class="sr-only" for="sort"><?php echo e(__('Sort')); ?></label>
                    <select id="sort" name="sort" class="input-field">
                        <option value="latest" <?php if(request('sort', 'latest') === 'latest'): echo 'selected'; endif; ?>><?php echo e(__('Created (Newest)')); ?></option>
                        <option value="oldest" <?php if(request('sort') === 'oldest'): echo 'selected'; endif; ?>><?php echo e(__('Created (Oldest)')); ?></option>
                    </select>
                </div>
                <div class="flex items-center gap-3">
                    <button class="btn-secondary" type="submit"><?php echo e(__('Filter')); ?></button>
                    <a href="<?php echo e(route('admin.tickets.index')); ?>" class="btn-secondary"><?php echo e(__('Reset')); ?></a>
                </div>
            </form>
        </div>

        
        <div class="panel p-6" x-data="{
            selected: [],
            selectAll: false,
            view: localStorage.getItem('admin-tickets-view') || 'list',
            allIds: [<?php echo e($tickets->pluck('id')->join(',')); ?>]
        }" x-init="$watch('view', v => localStorage.setItem('admin-tickets-view', v)); $watch('selectAll', v => { selected = v ? [...allIds] : [] })">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Ticket Directory')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Showing')); ?> <?php echo e($tickets->firstItem() ?? 0); ?>-<?php echo e($tickets->lastItem() ?? 0); ?> <?php echo e(__('of')); ?> <?php echo e($tickets->total()); ?> <?php echo e(__('tickets.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" @click="view = 'list'" :class="view === 'list' ? 'btn-primary' : 'btn-secondary'"><?php echo e(__('List')); ?></button>
                    <button type="button" @click="view = 'grid'" :class="view === 'grid' ? 'btn-primary' : 'btn-secondary'"><?php echo e(__('Grid')); ?></button>
                    <button type="button" class="btn-secondary" onclick="window.print()"><?php echo e(__('Print')); ?></button>
                    <a href="<?php echo e(route('admin.tickets.export', request()->query())); ?>" class="btn-secondary"><?php echo e(__('Export')); ?></a>
                    <button x-show="selected.length > 0" x-cloak type="button" class="btn-danger" @click="$dispatch('open-modal', 'bulk-delete-tickets')" x-text="'Bulk Delete (' + selected.length + ')'"></button>
                </div>
            </div>

            
            <div x-show="view === 'list'" class="mt-6 overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="text-xs uppercase tracking-[0.2em] text-muted">
                        <tr>
                            <th class="pb-3">
                                <input type="checkbox" x-model="selectAll" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                            </th>
                            <th class="pb-3"><?php echo e(__('Subject')); ?></th>
                            <th class="pb-3"><?php echo e(__('User')); ?></th>
                            <th class="pb-3"><?php echo e(__('Priority')); ?></th>
                            <th class="pb-3"><?php echo e(__('Status')); ?></th>
                            <th class="pb-3"><?php echo e(__('Date')); ?></th>
                            <th class="pb-3 text-right"><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/60">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr>
                            <td class="py-4">
                                <input type="checkbox" value="<?php echo e($ticket->id); ?>" x-model.number="selected" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                            </td>
                            <td class="py-4">
                                <a href="<?php echo e(route('admin.tickets.show', $ticket->id)); ?>" class="font-semibold text-ink hover:text-brand transition-colors">
                                    <?php echo e(Str::limit($ticket->subject, 50)); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->category): ?>
                                    <p class="text-xs text-muted mt-0.5"><?php echo e(ucfirst($ticket->category)); ?></p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand/10 text-brand text-xs font-bold">
                                        <?php echo e($ticket->user?->initials ?? '??'); ?>

                                    </span>
                                    <div>
                                        <span class="font-semibold text-ink"><?php echo e($ticket->user?->name ?? __('Unknown')); ?></span>
                                        <p class="text-xs text-muted"><?php echo e($ticket->user?->email ?? __('N/A')); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4">
                                <span class="text-sm font-semibold text-ink"><?php echo e(ucfirst($ticket->priority)); ?></span>
                            </td>
                            <td class="py-4">
                                <span class="text-sm font-semibold text-ink"><?php echo e(str_replace('_', ' ', ucfirst($ticket->status))); ?></span>
                            </td>
                            <td class="py-4 text-sm text-ink"><?php echo e($ticket->created_at->format('M j, Y')); ?></td>
                            <td class="py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="<?php echo e(route('admin.tickets.show', $ticket->id)); ?>" class="btn-secondary"><?php echo e(__('View')); ?></a>
                                    <button type="button" class="btn-danger" x-data @click="$dispatch('open-modal', 'confirm-delete-<?php echo e($ticket->id); ?>')"><?php echo e(__('Delete')); ?></button>
                                </div>
                            </td>
                        </tr>

                        
                        <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'confirm-delete-'.e($ticket->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-delete-'.e($ticket->id).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <form method="POST" action="<?php echo e(route('admin.tickets.destroy', $ticket->id)); ?>" class="p-6 space-y-4">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <div>
                                    <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete ticket')); ?> "<?php echo e(Str::limit($ticket->subject, 40)); ?>"?</p>
                                    <p class="mt-2 text-sm text-muted"><?php echo e(__('This will')); ?> <strong class="text-danger"><?php echo e(__('permanently delete')); ?></strong> <?php echo e(__('this ticket and all its replies. This action cannot be undone.')); ?></p>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                                    <button type="submit" class="btn-danger"><?php echo e(__('Delete Ticket')); ?></button>
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
                            <td colspan="7" class="py-6 text-center text-sm text-muted"><?php echo e(__('No tickets found.')); ?></td>
                        </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <div x-show="view === 'grid'" x-cloak class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="panel p-4 space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" value="<?php echo e($ticket->id); ?>" x-model.number="selected" class="h-4 w-4 rounded border-border bg-surface-2/80 text-brand focus:ring-brand/40">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand/10 text-brand text-sm font-bold">
                            <?php echo e($ticket->user?->initials ?? '??'); ?>

                        </span>
                        <div class="min-w-0">
                            <a href="<?php echo e(route('admin.tickets.show', $ticket->id)); ?>" class="font-semibold text-ink hover:text-brand transition-colors truncate block"><?php echo e(Str::limit($ticket->subject, 40)); ?></a>
                            <p class="text-xs text-muted"><?php echo e($ticket->user?->name ?? __('Unknown')); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="font-semibold text-ink"><?php echo e(ucfirst($ticket->priority)); ?></span>
                        <span class="font-semibold text-ink"><?php echo e(str_replace('_', ' ', ucfirst($ticket->status))); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-xs text-muted">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->category): ?>
                            <span><?php echo e(ucfirst($ticket->category)); ?></span>
                        <?php else: ?>
                            <span></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span><?php echo e($ticket->created_at->format('M j, Y')); ?></span>
                    </div>
                    <div class="pt-2 border-t border-border/60">
                        <a href="<?php echo e(route('admin.tickets.show', $ticket->id)); ?>" class="btn-secondary text-xs"><?php echo e(__('View')); ?></a>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-span-full py-6 text-center text-sm text-muted"><?php echo e(__('No tickets found.')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tickets->hasPages()): ?>
            <div class="mt-4 border-t border-border/60 pt-4">
                <?php echo e($tickets->withQueryString()->links()); ?>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'import-tickets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'import-tickets']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.tickets.import')); ?>" enctype="multipart/form-data" class="p-6 space-y-5">
            <?php echo csrf_field(); ?>
            <div>
                <h3 class="text-lg font-semibold text-ink"><?php echo e(__('Import Tickets')); ?></h3>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'add-ticket']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'add-ticket']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.tickets.store')); ?>" class="p-6 space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <h3 class="text-lg font-semibold text-ink"><?php echo e(__('Add Ticket')); ?></h3>
                <p class="mt-1 text-sm text-muted"><?php echo e(__('Create a support ticket on behalf of a user.')); ?></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-ink mb-1"><?php echo e(__('Subject')); ?> <span class="text-red-500">*</span></label>
                <input type="text" name="subject" required maxlength="255" class="input-field" placeholder="<?php echo e(__('Short summary of the issue')); ?>">
            </div>
            <div>
                <label class="block text-sm font-medium text-ink mb-1"><?php echo e(__('Message')); ?> <span class="text-red-500">*</span></label>
                <textarea name="body" required rows="4" class="input-field" placeholder="<?php echo e(__('What did the user report?')); ?>"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-ink mb-1"><?php echo e(__('Priority')); ?></label>
                    <select name="priority" class="input-field">
                        <option value="low"><?php echo e(__('Low')); ?></option>
                        <option value="medium" selected><?php echo e(__('Medium')); ?></option>
                        <option value="high"><?php echo e(__('High')); ?></option>
                        <option value="urgent"><?php echo e(__('Urgent')); ?></option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-ink mb-1"><?php echo e(__('Status')); ?></label>
                    <select name="status" class="input-field">
                        <option value="open" selected><?php echo e(__('Open')); ?></option>
                        <option value="in_progress"><?php echo e(__('In Progress')); ?></option>
                        <option value="waiting"><?php echo e(__('Waiting')); ?></option>
                        <option value="resolved"><?php echo e(__('Resolved')); ?></option>
                        <option value="closed"><?php echo e(__('Closed')); ?></option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-ink mb-1"><?php echo e(__('User email (optional)')); ?></label>
                    <input type="email" name="user_email" class="input-field" placeholder="user@example.com">
                    <p class="text-xs text-muted mt-1"><?php echo e(__('Leave blank for an unattributed ticket.')); ?></p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-ink mb-1"><?php echo e(__('Category (optional)')); ?></label>
                    <input type="text" name="category" class="input-field" placeholder="<?php echo e(__('billing, bug, feature…')); ?>">
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                <button type="submit" class="btn-primary"><?php echo e(__('Create Ticket')); ?></button>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'bulk-delete-tickets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bulk-delete-tickets']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.tickets.bulk-destroy')); ?>" class="p-6 space-y-4"
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
                <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete selected tickets?')); ?></p>
                <p class="mt-2 text-sm text-muted"><?php echo e(__('You are about to')); ?> <strong class="text-danger"><?php echo e(__('permanently delete')); ?></strong> <?php echo e(__('the selected ticket(s) and all their replies. This action cannot be undone.')); ?></p>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/tickets/index.blade.php ENDPATH**/ ?>