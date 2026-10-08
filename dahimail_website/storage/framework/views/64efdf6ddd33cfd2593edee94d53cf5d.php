<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Ticket') . ' #' . $ticket->id,'subtitle' => Str::limit($ticket->subject, 60)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ticket') . ' #' . $ticket->id),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Str::limit($ticket->subject, 60))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 space-y-6">
                
                <div class="panel p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-xs font-bold text-muted bg-surface px-2 py-1 rounded-lg">#<?php echo e($ticket->id); ?></span>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($ticket->status):
                                    case ('open'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-info/15 text-info"><?php echo e(__('Open')); ?></span>
                                        <?php break; ?>
                                    <?php case ('in_progress'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-warning/15 text-warning"><?php echo e(__('In Progress')); ?></span>
                                        <?php break; ?>
                                    <?php case ('waiting'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-orange-100 text-orange-700"><?php echo e(__('Waiting')); ?></span>
                                        <?php break; ?>
                                    <?php case ('resolved'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-success/15 text-success"><?php echo e(__('Resolved')); ?></span>
                                        <?php break; ?>
                                    <?php case ('closed'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-surface text-ink/80"><?php echo e(__('Closed')); ?></span>
                                        <?php break; ?>
                                    <?php default: ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-surface text-ink/80"><?php echo e(ucfirst($ticket->status)); ?></span>
                                <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($ticket->priority):
                                    case ('low'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-info/15 text-info"><?php echo e(__('Low Priority')); ?></span>
                                        <?php break; ?>
                                    <?php case ('medium'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-warning/15 text-warning"><?php echo e(__('Medium Priority')); ?></span>
                                        <?php break; ?>
                                    <?php case ('high'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-danger/15 text-danger"><?php echo e(__('High Priority')); ?></span>
                                        <?php break; ?>
                                    <?php case ('urgent'): ?>
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-red-200 text-red-800 animate-pulse"><?php echo e(__('Urgent')); ?></span>
                                        <?php break; ?>
                                <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <p class="text-base font-semibold text-ink"><?php echo e($ticket->subject); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-muted">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->category): ?>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            <?php echo e(ucfirst($ticket->category)); ?>

                        </span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <?php echo e(__('Created:')); ?> <?php echo e($ticket->created_at->format('M j, Y \\a\\t g:i A')); ?>

                        </span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->updated_at->ne($ticket->created_at)): ?>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <?php echo e(__('Updated:')); ?> <span title="<?php echo e($ticket->updated_at->format('M j, Y g:i A')); ?>"><?php echo e($ticket->updated_at->diffForHumans()); ?></span>
                        </span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <div class="panel p-5">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-9 h-9 bg-info/15 text-info rounded-full flex items-center justify-center text-xs font-bold">
                            <?php echo e($ticket->user?->initials ?? '??'); ?>

                        </div>
                        <div>
                            <p class="text-sm font-semibold text-ink"><?php echo e($ticket->user?->name ?? __('Unknown User')); ?></p>
                            <p class="text-[10px] text-muted"><?php echo e($ticket->created_at->format('M j, Y \\a\\t g:i A')); ?></p>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold bg-info/15 text-info rounded-full ml-auto"><?php echo e(__('Customer')); ?></span>
                    </div>
                    <div class="text-sm text-ink/80 leading-relaxed prose prose-sm max-w-none">
                        <?php echo nl2br(e($ticket->body)); ?>

                    </div>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->ticketReplies->count()): ?>
                <div class="space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $ticket->ticketReplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="<?php echo e($reply->is_admin_reply ? 'bg-gradient-to-r from-indigo-50 to-purple-50 border-brand/20' : 'bg-surface-2 border-border'); ?> rounded-2xl border p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reply->is_admin_reply): ?>
                                <div class="w-9 h-9 bg-gradient-to-br from-gray-800 to-gray-900 text-white rounded-full flex items-center justify-center text-xs font-bold">
                                    <?php echo e($reply->user ? $reply->user->initials : 'AD'); ?>

                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-ink"><?php echo e($reply->user?->name ?? __('Admin')); ?></p>
                                    <p class="text-[10px] text-muted"><?php echo e($reply->created_at->format('M j, Y \\a\\t g:i A')); ?></p>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold bg-brand/15 text-brand rounded-full ml-auto"><?php echo e(__('Admin')); ?></span>
                            <?php else: ?>
                                <div class="w-9 h-9 bg-info/15 text-info rounded-full flex items-center justify-center text-xs font-bold">
                                    <?php echo e($reply->user?->initials ?? '??'); ?>

                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-ink"><?php echo e($reply->user?->name ?? __('Unknown User')); ?></p>
                                    <p class="text-[10px] text-muted"><?php echo e($reply->created_at->format('M j, Y \\a\\t g:i A')); ?></p>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold bg-info/15 text-info rounded-full ml-auto"><?php echo e(__('Customer')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="text-sm text-ink/80 leading-relaxed prose prose-sm max-w-none">
                            <?php echo nl2br(e($reply->body)); ?>

                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->status !== 'closed'): ?>
                <div class="panel p-6">
                    <h3 class="text-sm font-bold text-ink mb-3"><?php echo e(__('Reply to Ticket')); ?></h3>
                    <form method="POST" action="<?php echo e(route('admin.tickets.reply', $ticket->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <textarea name="body" rows="5" placeholder="<?php echo e(__('Type your reply here...')); ?>" required aria-required="true"
                            class="w-full px-4 py-3 text-sm border border-border rounded-xl focus:ring-2 focus:ring-brand/40/20 focus:border-indigo-500 transition-all resize-none <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('body')); ?></textarea>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-semibold text-white bg-brand rounded-xl hover:bg-brand-strong shadow-lg shadow-soft transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                <?php echo e(__('Send Reply')); ?>

                            </button>
                        </div>
                    </form>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="space-y-6">
                
                <div class="panel p-5">
                    <h3 class="text-xs font-bold text-muted uppercase tracking-wider mb-4"><?php echo e(__('Customer Info')); ?></h3>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-info/15 text-info rounded-full flex items-center justify-center text-sm font-bold">
                            <?php echo e($ticket->user?->initials ?? '??'); ?>

                        </div>
                        <div>
                            <p class="text-sm font-bold text-ink"><?php echo e($ticket->user?->name ?? __('Unknown User')); ?></p>
                            <p class="text-xs text-muted"><?php echo e($ticket->user?->email ?? __('N/A')); ?></p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->workspace): ?>
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Workspace')); ?></span>
                            <span class="font-medium text-ink"><?php echo e($ticket->workspace->name); ?></span>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->user): ?>
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Member Since')); ?></span>
                            <span class="text-ink/80"><?php echo e($ticket->user->created_at->format('M j, Y')); ?></span>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->user): ?>
                    <a href="<?php echo e(route('admin.users.show', $ticket->user->id)); ?>" class="block mt-4 text-center px-4 py-2 text-xs font-semibold text-brand bg-brand/10 border border-brand/20 rounded-xl hover:bg-brand/15 transition-colors">
                        <?php echo e(__('View Full Profile')); ?>

                    </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="panel p-5">
                    <h3 class="text-xs font-bold text-muted uppercase tracking-wider mb-4"><?php echo e(__('Update Status')); ?></h3>
                    <form method="POST" action="<?php echo e(route('admin.tickets.status', $ticket->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs font-bold text-ink/80 mb-1.5"><?php echo e(__('Status')); ?></label>
                                <select name="status" class="w-full px-3 py-2 text-sm border border-border rounded-xl bg-surface-2 focus:ring-2 focus:ring-brand/40/20 focus:border-indigo-500 transition-all">
                                    <option value="open" <?php echo e($ticket->status === 'open' ? 'selected' : ''); ?>><?php echo e(__('Open')); ?></option>
                                    <option value="in_progress" <?php echo e($ticket->status === 'in_progress' ? 'selected' : ''); ?>><?php echo e(__('In Progress')); ?></option>
                                    <option value="waiting" <?php echo e($ticket->status === 'waiting' ? 'selected' : ''); ?>><?php echo e(__('Waiting')); ?></option>
                                    <option value="resolved" <?php echo e($ticket->status === 'resolved' ? 'selected' : ''); ?>><?php echo e(__('Resolved')); ?></option>
                                    <option value="closed" <?php echo e($ticket->status === 'closed' ? 'selected' : ''); ?>><?php echo e(__('Closed')); ?></option>
                                </select>
                            </div>
                            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-semibold text-white bg-brand rounded-xl hover:bg-brand-strong shadow-sm transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <?php echo e(__('Update Status')); ?>

                            </button>
                        </div>
                    </form>
                </div>

                
                <div class="panel p-5">
                    <h3 class="text-xs font-bold text-muted uppercase tracking-wider mb-4"><?php echo e(__('Ticket Details')); ?></h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Ticket ID')); ?></span>
                            <span class="font-mono text-xs text-ink/80">#<?php echo e($ticket->id); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Priority')); ?></span>
                            <span class="font-medium text-ink"><?php echo e(ucfirst($ticket->priority)); ?></span>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->category): ?>
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Category')); ?></span>
                            <span class="font-medium text-ink"><?php echo e(ucfirst($ticket->category)); ?></span>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->assignedTo): ?>
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Assigned To')); ?></span>
                            <span class="font-medium text-ink"><?php echo e($ticket->assignedTo->name); ?></span>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Replies')); ?></span>
                            <span class="font-medium text-ink"><?php echo e($ticket->ticketReplies->count()); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Created')); ?></span>
                            <span class="text-ink/80"><?php echo e($ticket->created_at->format('M j, Y')); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted"><?php echo e(__('Last Updated')); ?></span>
                            <span class="text-ink/80" title="<?php echo e($ticket->updated_at->format('M j, Y g:i A')); ?>"><?php echo e($ticket->updated_at->diffForHumans()); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/tickets/show.blade.php ENDPATH**/ ?>