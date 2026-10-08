<div class="space-y-6">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('message')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm"><?php echo e(session('message')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Team Members')); ?></h1>
            <p class="text-sm text-muted mt-1"><?php echo e(__('Manage your workspace team and invitations.')); ?></p>
        </div>
        <button wire:click="openInviteForm" class="btn-primary flex items-center gap-2 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <?php echo e(__('Invite Member')); ?>

        </button>
    </div>

    
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface border-b border-border">
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Member')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3"><?php echo e(__('Role')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden sm:table-cell"><?php echo e(__('Joined')); ?></th>
                        <th class="w-16 px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-surface" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'member-'.e($member->id).''; ?>wire:key="member-<?php echo e($member->id); ?>">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-primary-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                    <?php echo e(strtoupper(substr($member->name, 0, 1))); ?><?php echo e(strtoupper(substr(explode(' ', $member->name)[1] ?? '', 0, 1))); ?>

                                </div>
                                <div>
                                    <p class="text-sm font-medium text-ink">
                                        <?php echo e($member->name); ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->id === auth()->id()): ?>
                                        <span class="text-xs text-muted"><?php echo e(__('(You)')); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </p>
                                    <p class="text-xs text-muted"><?php echo e($member->email); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->id === auth()->id() || $member->role === 'owner'): ?>
                            <span class="px-2.5 py-1 rounded-lg text-xs font-medium <?php echo e($member->role === 'owner' ? 'bg-warning/15 text-yellow-800' : 'bg-surface  text-muted '); ?>"><?php echo e(ucfirst($member->role)); ?></span>
                            <?php else: ?>
                            <select wire:change="changeRole(<?php echo e($member->id); ?>, $event.target.value)" class="text-xs bg-surface border border-border rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-primary-500">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['admin', 'agent', 'viewer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <option value="<?php echo e($role); ?>" <?php echo e($member->role === $role ? 'selected' : ''); ?>><?php echo e(ucfirst($role)); ?></option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </select>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-sm text-muted hidden sm:table-cell">
                            <?php echo e(\Carbon\Carbon::parse($member->created_at)->format('M j, Y')); ?>

                        </td>
                        <td class="px-4 py-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->id !== auth()->id() && $member->role !== 'owner'): ?>
                            <button wire:click="removeMember(<?php echo e($member->id); ?>)" wire:confirm="<?php echo e(__('Remove this team member? They will lose access to this workspace.')); ?>"
                                    class="p-1.5 text-muted hover:text-red-500 rounded-lg hover:bg-danger/10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendingInvites->isNotEmpty()): ?>
    <div class="bg-surface-2 rounded-2xl border border-border p-6">
        <h2 class="text-lg font-semibold text-ink mb-4"><?php echo e(__('Pending Invitations')); ?></h2>
        <div class="space-y-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $pendingInvites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'invite-'.e($invite->id).''; ?>wire:key="invite-<?php echo e($invite->id); ?>" class="flex items-center justify-between p-3 bg-surface rounded-xl">
                <div>
                    <p class="text-sm font-medium text-ink/80"><?php echo e($invite->email); ?></p>
                    <p class="text-xs text-muted">
                        <?php echo e(__('Role:')); ?> <?php echo e(ucfirst($invite->role)); ?>

                        &middot; <?php echo e(__('Expires')); ?> <span title="<?php echo e(\Carbon\Carbon::parse($invite->expires_at)->format('M j, Y g:i A')); ?>"><?php echo e(\Carbon\Carbon::parse($invite->expires_at)->diffForHumans()); ?></span>
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <button wire:click="resendInvite(<?php echo e($invite->id); ?>)" class="px-3 py-1.5 text-xs text-muted  bg-surface-2 border border-border rounded-lg hover:bg-surface"><?php echo e(__('Resend')); ?></button>
                    <button wire:click="cancelInvite(<?php echo e($invite->id); ?>)" class="px-3 py-1.5 text-xs text-danger bg-surface-2 border border-danger/20 rounded-lg hover:bg-danger/10"><?php echo e(__('Cancel')); ?></button>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showInviteForm): ?>
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="team-invite-modal-title">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-surface/50" wire:click="closeInviteForm"></div>
            <div class="relative bg-surface-2 rounded-2xl shadow-xl max-w-md w-full p-6" x-trap="$wire.showInviteForm">
                <h2 id="team-invite-modal-title" class="text-lg font-semibold text-ink mb-4"><?php echo e(__('Invite Team Member')); ?></h2>
                <form wire:submit="sendInvite" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Email Address')); ?></label>
                        <input type="email" wire:model="inviteEmail" class="w-full px-4 py-2.5 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500" placeholder="<?php echo e(__('colleague@example.com')); ?>" autofocus>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['inviteEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink/80 mb-1"><?php echo e(__('Role')); ?></label>
                        <select wire:model="inviteRole" class="w-full px-4 py-2.5 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option value="admin"><?php echo e(__('Admin - Full workspace access')); ?></option>
                            <option value="agent"><?php echo e(__('Agent - Handle conversations & contacts')); ?></option>
                            <option value="viewer"><?php echo e(__('Viewer - Read-only access')); ?></option>
                        </select>
                    </div>
                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button type="button" wire:click="closeInviteForm" class="btn-secondary text-sm"><?php echo e(__('Cancel')); ?></button>
                        <button type="submit" class="btn-primary px-4 py-2 text-sm">
                            <span wire:loading.remove wire:target="sendInvite"><?php echo e(__('Send Invitation')); ?></span>
                            <span wire:loading wire:target="sendInvite" class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Sending...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/team-manager.blade.php ENDPATH**/ ?>