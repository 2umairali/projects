<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Payments'),'subtitle' => __('Track all subscription payments, refunds, and failed transactions.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Payments')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Track all subscription payments, refunds, and failed transactions.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        
        <div class="panel p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Payments')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Track payments, refunds, and transaction history.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" class="btn-secondary" x-data @click="$dispatch('open-modal', 'import-payments')"><?php echo e(__('Import CSV')); ?></button>
                    <a href="<?php echo e(route('admin.payments.export', ['template' => 1])); ?>" class="btn-secondary"><?php echo e(__('Download Template')); ?></a>
                </div>
            </div>

            <form method="get" action="<?php echo e(route('admin.payments.index')); ?>" class="filter-form mt-6 grid gap-4 lg:grid-cols-[1.4fr_1fr_1fr_1fr_1fr_auto] md:grid-cols-[1.4fr_1fr_1fr] sm:grid-cols-2">
                <div>
                    <label class="sr-only" for="search"><?php echo e(__('Search')); ?></label>
                    <input id="search" name="search" value="<?php echo e(request('search')); ?>" class="input-field" placeholder="<?php echo e(__('Search by invoice or user')); ?>">
                </div>
                <div>
                    <label class="sr-only" for="status"><?php echo e(__('Status')); ?></label>
                    <select id="status" name="status" class="input-field">
                        <option value=""><?php echo e(__('All statuses')); ?></option>
                        <option value="succeeded" <?php if(request('status') === 'succeeded'): echo 'selected'; endif; ?>><?php echo e(__('Succeeded')); ?></option>
                        <option value="failed" <?php if(request('status') === 'failed'): echo 'selected'; endif; ?>><?php echo e(__('Failed')); ?></option>
                        <option value="refunded" <?php if(request('status') === 'refunded'): echo 'selected'; endif; ?>><?php echo e(__('Refunded')); ?></option>
                        <option value="pending" <?php if(request('status') === 'pending'): echo 'selected'; endif; ?>><?php echo e(__('Pending')); ?></option>
                    </select>
                </div>
                <div>
                    <label class="sr-only" for="from"><?php echo e(__('From date')); ?></label>
                    <input id="from" type="date" name="from" value="<?php echo e(request('from')); ?>" class="input-field">
                </div>
                <div>
                    <label class="sr-only" for="to"><?php echo e(__('To date')); ?></label>
                    <input id="to" type="date" name="to" value="<?php echo e(request('to')); ?>" class="input-field">
                </div>
                <div class="flex items-center gap-3">
                    <button class="btn-secondary" type="submit"><?php echo e(__('Filter')); ?></button>
                    <a href="<?php echo e(route('admin.payments.index')); ?>" class="btn-secondary"><?php echo e(__('Reset')); ?></a>
                </div>
            </form>
        </div>

        
        <div class="panel p-6" x-data="{
            view: localStorage.getItem('admin-payments-view') || 'list'
        }" x-init="$watch('view', v => localStorage.setItem('admin-payments-view', v))">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="panel-heading"><?php echo e(__('Payment Directory')); ?></p>
                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Showing')); ?> <?php echo e($payments->firstItem() ?? 0); ?>-<?php echo e($payments->lastItem() ?? 0); ?> <?php echo e(__('of')); ?> <?php echo e($payments->total()); ?> <?php echo e(__('transactions.')); ?></p>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" @click="view = 'list'" :class="view === 'list' ? 'btn-primary' : 'btn-secondary'"><?php echo e(__('List')); ?></button>
                    <button type="button" @click="view = 'grid'" :class="view === 'grid' ? 'btn-primary' : 'btn-secondary'"><?php echo e(__('Grid')); ?></button>
                    <button type="button" class="btn-secondary" onclick="window.print()"><?php echo e(__('Print')); ?></button>
                    <a href="<?php echo e(route('admin.payments.export', request()->query())); ?>" class="btn-secondary"><?php echo e(__('Export')); ?></a>
                </div>
            </div>

            
            <div x-show="view === 'list'" class="mt-6 overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="text-xs uppercase tracking-[0.2em] text-muted">
                        <tr>
                            <th class="pb-3"><?php echo e(__('Invoice')); ?></th>
                            <th class="pb-3"><?php echo e(__('User')); ?></th>
                            <th class="pb-3"><?php echo e(__('Amount')); ?></th>
                            <th class="pb-3"><?php echo e(__('Status')); ?></th>
                            <th class="pb-3"><?php echo e(__('Date')); ?></th>
                            <th class="pb-3 text-right"><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/60">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr>
                            <td class="py-4">
                                <code class="text-xs text-muted font-mono"><?php echo e($payment->stripe_payment_id ?? '#' . $payment->id); ?></code>
                            </td>
                            <td class="py-4">
                                <span class="font-semibold text-ink"><?php echo e($payment->workspace?->name ?? __('N/A')); ?></span>
                            </td>
                            <td class="py-4">
                                <span class="text-sm font-semibold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($payment->amount); ?></span>
                            </td>
                            <td class="py-4">
                                <span class="text-sm font-semibold text-ink"><?php echo e(ucfirst($payment->status)); ?></span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->gateway_slug): ?>
                                    <span class="block text-xs text-muted"><?php echo e(str_replace('_', ' ', ucfirst($payment->gateway_slug))); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'failed' && $payment->failure_reason): ?>
                                    <span class="block text-xs text-danger"><?php echo e(\Illuminate\Support\Str::limit($payment->failure_reason, 60)); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="py-4 text-sm text-ink"><?php echo e($payment->created_at->format('M j, Y')); ?></td>
                            <td class="py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'succeeded' && !$payment->refund_amount): ?>
                                        <button type="button" class="btn-danger" x-data @click="$dispatch('open-modal', 'confirm-refund-<?php echo e($payment->id); ?>')"><?php echo e(__('Refund')); ?></button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'pending' && in_array($payment->gateway_slug, ['bank_transfer', 'offline'], true)): ?>
                                        <button type="button" class="btn-primary" x-data @click="$dispatch('open-modal', 'approve-payment-<?php echo e($payment->id); ?>')"><?php echo e(__('Approve')); ?></button>
                                        <button type="button" class="btn-secondary" x-data @click="$dispatch('open-modal', 'reject-payment-<?php echo e($payment->id); ?>')"><?php echo e(__('Reject')); ?></button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($payment->status, ['pending', 'failed'], true)): ?>
                                        <button type="button" class="btn-danger" x-data @click="$dispatch('open-modal', 'delete-payment-<?php echo e($payment->id); ?>')"><?php echo e(__('Delete')); ?></button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </td>
                        </tr>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'succeeded' && !$payment->refund_amount): ?>
                        <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'confirm-refund-'.e($payment->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-refund-'.e($payment->id).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <form method="POST" action="<?php echo e(route('admin.payments.refund', $payment->id)); ?>" class="p-6 space-y-4">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <p class="text-lg font-semibold text-ink"><?php echo e(__('Refund')); ?> <?php echo \App\Helpers\CurrencyHelper::display($payment->amount); ?>?</p>
                                    <p class="mt-2 text-sm text-muted"><?php echo e(__('This will issue a')); ?> <strong class="text-danger"><?php echo e(__('full refund')); ?></strong> <?php echo e(__('of')); ?> <?php echo \App\Helpers\CurrencyHelper::display($payment->amount); ?> <?php echo e(__('to')); ?> <?php echo e($payment->workspace?->name ?? __('this customer')); ?>. <?php echo e(__('This action cannot be undone.')); ?></p>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                                    <button type="submit" class="btn-danger"><?php echo e(__('Issue Refund')); ?></button>
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

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'pending' && in_array($payment->gateway_slug, ['bank_transfer', 'offline'], true)): ?>
                        <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'approve-payment-'.e($payment->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'approve-payment-'.e($payment->id).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <form method="POST" action="<?php echo e(route('admin.payments.approve', $payment->id)); ?>" class="p-6 space-y-4">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <p class="text-lg font-semibold text-ink"><?php echo e(__('Approve payment')); ?> <?php echo \App\Helpers\CurrencyHelper::display($payment->amount); ?>?</p>
                                    <p class="mt-2 text-sm text-muted"><?php echo e(__('Confirm you have received this bank transfer from')); ?> <strong><?php echo e($payment->workspace?->name ?? __('this customer')); ?></strong>. <?php echo e(__('Their plan will be activated immediately.')); ?></p>
                                    <p class="mt-1 text-xs text-muted"><?php echo e(__('Reference')); ?>: #<?php echo e($payment->id); ?></p>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                                    <button type="submit" class="btn-primary"><?php echo e(__('Approve & activate plan')); ?></button>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'reject-payment-'.e($payment->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'reject-payment-'.e($payment->id).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <form method="POST" action="<?php echo e(route('admin.payments.reject', $payment->id)); ?>" class="p-6 space-y-4">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <p class="text-lg font-semibold text-ink"><?php echo e(__('Reject payment')); ?> <?php echo \App\Helpers\CurrencyHelper::display($payment->amount); ?>?</p>
                                    <p class="mt-2 text-sm text-muted"><?php echo e(__('The customer\'s plan will not change. You can add a reason for your records.')); ?></p>
                                </div>
                                <textarea name="reason" rows="3" maxlength="500" class="input w-full" placeholder="<?php echo e(__('Reason (optional) — e.g. transfer not received')); ?>"></textarea>
                                <div class="flex justify-end gap-3">
                                    <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                                    <button type="submit" class="btn-danger"><?php echo e(__('Reject payment')); ?></button>
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

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($payment->status, ['pending', 'failed'], true)): ?>
                        <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'delete-payment-'.e($payment->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'delete-payment-'.e($payment->id).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <form method="POST" action="<?php echo e(route('admin.payments.destroy', $payment->id)); ?>" class="p-6 space-y-4">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <div>
                                    <p class="text-lg font-semibold text-ink"><?php echo e(__('Delete this payment record?')); ?></p>
                                    <p class="mt-2 text-sm text-muted"><?php echo e(__('This removes the pending/failed record permanently. This action cannot be undone.')); ?></p>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <button type="button" class="btn-secondary" x-on:click="$dispatch('close')"><?php echo e(__('Cancel')); ?></button>
                                    <button type="submit" class="btn-danger"><?php echo e(__('Delete')); ?></button>
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
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr>
                            <td colspan="6" class="py-6 text-center text-sm text-muted"><?php echo e(__('No payments found.')); ?></td>
                        </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <div x-show="view === 'grid'" x-cloak class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="panel p-4 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-ink"><?php echo e($payment->workspace?->name ?? __('N/A')); ?></span>
                        <span class="text-sm font-semibold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($payment->amount); ?></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="font-semibold text-ink"><?php echo e(ucfirst($payment->status)); ?></span>
                        <span class="text-muted"><?php echo e($payment->created_at->format('M j, Y')); ?></span>
                    </div>
                    <code class="text-xs text-muted font-mono block truncate"><?php echo e($payment->stripe_payment_id ?? '#' . $payment->id); ?></code>
                    <div class="pt-2 border-t border-border/60 flex flex-wrap gap-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'succeeded' && !$payment->refund_amount): ?>
                            <button type="button" class="btn-danger text-xs" x-data @click="$dispatch('open-modal', 'confirm-refund-<?php echo e($payment->id); ?>')"><?php echo e(__('Refund')); ?></button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'pending' && in_array($payment->gateway_slug, ['bank_transfer', 'offline'], true)): ?>
                            <button type="button" class="btn-primary text-xs" x-data @click="$dispatch('open-modal', 'approve-payment-<?php echo e($payment->id); ?>')"><?php echo e(__('Approve')); ?></button>
                            <button type="button" class="btn-secondary text-xs" x-data @click="$dispatch('open-modal', 'reject-payment-<?php echo e($payment->id); ?>')"><?php echo e(__('Reject')); ?></button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($payment->status, ['pending', 'failed'], true)): ?>
                            <button type="button" class="btn-danger text-xs" x-data @click="$dispatch('open-modal', 'delete-payment-<?php echo e($payment->id); ?>')"><?php echo e(__('Delete')); ?></button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-span-full py-6 text-center text-sm text-muted"><?php echo e(__('No payments found.')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payments->hasPages()): ?>
            <div class="mt-4 border-t border-border/60 pt-4">
                <?php echo e($payments->withQueryString()->links()); ?>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['name' => 'import-payments']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'import-payments']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form method="POST" action="<?php echo e(route('admin.payments.import')); ?>" enctype="multipart/form-data" class="p-6 space-y-5">
            <?php echo csrf_field(); ?>
            <div>
                <h3 class="text-lg font-semibold text-ink"><?php echo e(__('Import Payments')); ?></h3>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/payments/index.blade.php ENDPATH**/ ?>