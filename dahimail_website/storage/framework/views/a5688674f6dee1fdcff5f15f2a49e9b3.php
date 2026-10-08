<div class="space-y-6">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 8000)"
         class="p-3 bg-success/10 dark:bg-green-900/30 border border-success/20 dark:border-green-800 text-success dark:text-green-300 rounded-xl text-sm flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span><?php echo e(session('success')); ?></span>
        </div>
        <div class="flex items-center gap-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lastMergeAuditId): ?>
            <button wire:click="undoLastMerge" wire:confirm="Undo this merge? Deleted contacts will be restored."
                    class="text-xs font-semibold px-3 py-1 bg-white dark:bg-gray-800 text-ink border border-border rounded-lg hover:bg-surface transition-colors">
                <?php echo e(__('Undo')); ?>

            </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <button @click="show = false" class="text-green-500 hover:text-success dark:hover:text-green-200">&times;</button>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div x-data="{ show: true }" x-show="show"
         class="p-3 bg-danger/10 dark:bg-red-900/30 border border-danger/20 dark:border-red-800 text-danger dark:text-red-300 rounded-xl text-sm flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            <span><?php echo e(session('error')); ?></span>
        </div>
        <button @click="show = false" class="text-red-500 hover:text-danger dark:hover:text-red-200">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-3">
                <a href="<?php echo e(route('contacts')); ?>" class="text-muted hover:text-muted dark:hover:text-muted/50 transition-colors" :title="__('Back to Contacts')">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Combine Duplicate Contacts')); ?></h1>
            </div>
            <p class="text-sm text-muted mt-1 ml-8"><?php echo e(__('Find and merge duplicate contacts in your workspace')); ?></p>
        </div>
        <div class="flex items-center gap-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mergedCount > 0): ?>
            <span class="text-sm text-muted"><?php echo e($mergedCount); ?> <?php echo e(__('merged this session')); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <button wire:click="scanForDuplicates"
                    wire:loading.attr="disabled"
                    wire:target="scanForDuplicates"
                    class="btn-primary inline-flex items-center gap-2 text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                <svg wire:loading.remove wire:target="scanForDuplicates" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <svg wire:loading wire:target="scanForDuplicates" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                <span wire:loading.remove wire:target="scanForDuplicates"><?php echo e(__('Find Duplicates')); ?></span>
                <span wire:loading wire:target="scanForDuplicates"><?php echo e(__('Scanning...')); ?></span>
            </button>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($duplicateGroups) || $scannedContactCount > 0): ?>
    <div class="flex flex-wrap items-center gap-4 text-sm">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($scannedContactCount > 0): ?>
        <div class="flex items-center gap-1.5 text-muted">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <span><?php echo e(number_format($scannedContactCount)); ?> <?php echo e(__('contacts scanned')); ?></span>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <div class="flex items-center gap-1.5 text-muted">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            <span><?php echo e(count($duplicateGroups)); ?> <?php echo e(__('duplicate group(s) found')); ?></span>
        </div>
        <div class="flex items-center gap-1.5 text-muted">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <?php
                $totalDupeContacts = collect($duplicateGroups)->sum(fn ($g) => count($g['contacts']));
            ?>
            <span><?php echo e(number_format($totalDupeContacts)); ?> <?php echo e(__('contacts involved')); ?></span>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(empty($duplicateGroups) && $scannedContactCount === 0): ?>
        
        <div class="bg-surface-2 rounded-2xl border border-border p-12 text-center">
            <div class="w-16 h-16 bg-surface dark:bg-gray-700 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-muted " fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-ink/80"><?php echo e(__('Find Duplicate Contacts')); ?></h3>
            <p class="text-sm text-muted  mt-1 max-w-md mx-auto">
                <?php echo e(__('Scan your workspace for contacts that share the same email address or have matching names and companies. Review and merge them to keep your CRM clean.')); ?>

            </p>
            <button wire:click="scanForDuplicates"
                    wire:loading.attr="disabled"
                    wire:target="scanForDuplicates"
                    class="btn-primary mt-6 inline-flex items-center gap-2 text-sm disabled:opacity-50">
                <svg wire:loading.remove wire:target="scanForDuplicates" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <svg wire:loading wire:target="scanForDuplicates" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                <span wire:loading.remove wire:target="scanForDuplicates"><?php echo e(__('Scan for Duplicates')); ?></span>
                <span wire:loading wire:target="scanForDuplicates"><?php echo e(__('Scanning...')); ?></span>
            </button>
        </div>
    <?php elseif(empty($duplicateGroups) && $scannedContactCount > 0): ?>
        
        <div class="bg-surface-2 rounded-2xl border border-border p-12 text-center">
            <div class="w-16 h-16 bg-success/10 dark:bg-green-900/30 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-ink/80"><?php echo e(__('No Duplicates Found')); ?></h3>
            <p class="text-sm text-muted  mt-1 max-w-md mx-auto">
                <?php echo e(__('Your contact list looks clean. No duplicate contacts were detected based on email address or name + company matching.')); ?>

            </p>
        </div>
    <?php else: ?>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <div class="lg:col-span-4">
                <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                    <div class="px-4 py-3 border-b border-border">
                        <h2 class="text-sm font-semibold text-ink/80"><?php echo e(__('Duplicate Groups')); ?></h2>
                    </div>
                    <div class="max-h-[600px] overflow-y-auto divide-y divide-border/60 dark:divide-gray-700">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $duplicateGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <div wire:click="selectGroup(<?php echo e($index); ?>)"
                             <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'group-'.e($index).''; ?>wire:key="group-<?php echo e($index); ?>"
                             class="px-4 py-3 cursor-pointer transition-colors <?php echo e($selectedGroupIndex === $index ? 'bg-primary-50 dark:bg-primary-900/20 border-l-2 border-primary-500' : 'hover:bg-surface dark:hover:bg-gray-700/50 border-l-2 border-transparent'); ?>">
                            <div class="flex items-start justify-between gap-2">
                                <div class="min-w-0 flex-1">
                                    
                                    <p class="text-sm font-medium text-ink truncate">
                                        <?php echo e($group['match_value']); ?>

                                    </p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="inline-flex items-center gap-1 text-xs px-1.5 py-0.5 rounded-full <?php echo e($group['match_type'] === 'email' ? 'bg-info/15 text-info dark:bg-blue-900/40 dark:text-blue-300' : 'bg-warning/15 text-warning dark:bg-amber-900/40 dark:text-amber-300'); ?>">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($group['match_type'] === 'email'): ?>
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                            <?php echo e(__('Email')); ?>

                                            <?php else: ?>
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                            <?php echo e(__('Name')); ?>

                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </span>
                                        <span class="text-xs text-muted "><?php echo e(count($group['contacts'])); ?> <?php echo e(__('contacts')); ?></span>
                                    </div>
                                </div>
                                <button wire:click.stop="dismissGroup(<?php echo e($index); ?>)"
                                        class="p-1 text-muted/50 hover:text-red-500  dark:hover:text-red-400 rounded transition-colors flex-shrink-0"
                                        :title="__('Not duplicates')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="lg:col-span-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedGroupIndex !== null && !empty($selectedGroupContacts)): ?>
                    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
                        <div class="px-4 py-3 border-b border-border flex items-center justify-between">
                            <h2 class="text-sm font-semibold text-ink/80"><?php echo e(__('Compare & Merge')); ?></h2>
                            <span class="text-xs text-muted "><?php echo e(__('Select the primary contact to keep')); ?></span>
                        </div>

                        
                        <div class="p-4 overflow-x-auto">
                            <div class="flex gap-4" style="min-width: <?php echo e(count($selectedGroupContacts) * 280); ?>px;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $selectedGroupContacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <?php
                                    $isPrimary = $primaryContactId === $contact['id'];
                                ?>
                                <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'compare-'.e($contact['id']).''; ?>wire:key="compare-<?php echo e($contact['id']); ?>"
                                     class="flex-1 min-w-[260px] max-w-[360px] rounded-xl border-2 transition-all <?php echo e($isPrimary ? 'border-primary-500 bg-primary-50/50 dark:bg-primary-900/10' : 'border-border bg-surface-2'); ?>">
                                    
                                    <div class="p-4 border-b border-border dark:border-gray-700">
                                        <div class="flex items-center justify-between mb-3">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio"
                                                       name="primary_contact"
                                                       value="<?php echo e($contact['id']); ?>"
                                                       wire:click="setPrimary(<?php echo e($contact['id']); ?>)"
                                                       <?php echo e($isPrimary ? 'checked' : ''); ?>

                                                       class="w-4 h-4 text-primary-600 border-border focus:ring-primary-500">
                                                <span class="text-xs font-medium <?php echo e($isPrimary ? 'text-primary-700 dark:text-primary-400' : 'text-muted'); ?>">
                                                    <?php echo e($isPrimary ? __('Primary (Keep)') : __('Secondary (Merge)')); ?>

                                                </span>
                                            </label>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isPrimary): ?>
                                            <span class="px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300 rounded-full"><?php echo e(__('Master')); ?></span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0">
                                                <?php echo e(strtoupper(substr($contact['first_name'] ?? '', 0, 1))); ?><?php echo e(strtoupper(substr($contact['last_name'] ?? '', 0, 1))); ?>

                                            </div>
                                            <div class="min-w-0">
                                                <p class="text-sm font-semibold text-ink truncate"><?php echo e($contact['full_name']); ?></p>
                                                <p class="text-xs text-muted truncate"><?php echo e($contact['email'] ?? __('No email')); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="p-4 space-y-2.5 text-sm">
                                        <?php
                                            $fields = [
                                                'phone' => __('Phone'),
                                                'company' => __('Company'),
                                                'job_title' => __('Job Title'),
                                                'city' => __('City'),
                                                'country' => __('Country'),
                                                'timezone' => __('Timezone'),
                                                'lead_score' => __('Engagement Score'),
                                                'status' => __('Status'),
                                            ];

                                            // Compute which fields differ across the group.
                                            $diffFields = [];
                                            foreach ($fields as $fKey => $fLabel) {
                                                $values = collect($selectedGroupContacts)->pluck($fKey)->unique()->filter(fn($v) => $v !== null && $v !== '')->values();
                                                if ($values->count() > 1) {
                                                    $diffFields[] = $fKey;
                                                }
                                            }
                                        ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldKey => $fieldLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <?php
                                            $isDiff = in_array($fieldKey, $diffFields);
                                            $value = $contact[$fieldKey] ?? null;
                                        ?>
                                        <div class="flex items-start gap-2 <?php echo e($isDiff ? 'bg-warning/10 dark:bg-amber-900/20 -mx-2 px-2 py-1 rounded-lg' : ''); ?>">
                                            <span class="text-xs text-muted  w-20 flex-shrink-0 pt-0.5"><?php echo e($fieldLabel); ?></span>
                                            <span class="text-xs font-medium <?php echo e($value ? 'text-ink dark:text-gray-200' : 'text-muted/50  italic'); ?> break-all">
                                                <?php echo e($value !== null && $value !== '' ? $value : __('Empty')); ?>

                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isDiff && $value): ?>
                                                <svg class="w-3 h-3 text-amber-500 inline ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </span>
                                        </div>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                                        
                                        <div class="flex items-start gap-2">
                                            <span class="text-xs text-muted  w-20 flex-shrink-0 pt-0.5"><?php echo e(__('Tags')); ?></span>
                                            <div class="flex flex-wrap gap-1">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $contact['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                                <span class="px-1.5 py-0.5 text-[10px] font-medium bg-surface dark:bg-gray-700 text-muted /50 rounded"><?php echo e($tagName); ?></span>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                <span class="text-xs text-muted/50  italic"><?php echo e(__('None')); ?></span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>

                                        
                                        <div class="flex items-start gap-2 pt-1 border-t border-border dark:border-gray-700">
                                            <span class="text-xs text-muted  w-20 flex-shrink-0 pt-0.5"><?php echo e(__('Relations')); ?></span>
                                            <div class="text-xs text-muted /50">
                                                <?php echo e($contact['conversations_count']); ?> <?php echo e(__('conversation(s)')); ?>, <?php echo e($contact['deals_count']); ?> <?php echo e(__('deal(s)')); ?>

                                            </div>
                                        </div>

                                        
                                        <div class="flex items-start gap-2">
                                            <span class="text-xs text-muted  w-20 flex-shrink-0 pt-0.5"><?php echo e(__('Created')); ?></span>
                                            <span class="text-xs text-muted /50">
                                                <?php echo e($contact['created_at'] ? \Carbon\Carbon::parse($contact['created_at'])->format('M j, Y') : __('Unknown')); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="mx-4 mb-4 p-3 bg-surface dark:bg-gray-700/50 rounded-xl">
                            <h4 class="text-xs font-semibold text-muted /50 mb-1.5"><?php echo e(__('What happens when you merge:')); ?></h4>
                            <ul class="text-xs text-muted space-y-1">
                                <li class="flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    <?php echo e(__('All conversations and deals move to the primary contact')); ?>

                                </li>
                                <li class="flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    <?php echo e(__('Tags from all contacts are combined')); ?>

                                </li>
                                <li class="flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    <?php echo e(__('Empty fields on primary are filled from secondary data')); ?>

                                </li>
                                <li class="flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    <?php echo e(__('Lead score is set to the highest value')); ?>

                                </li>
                                <li class="flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                    <?php echo e(__('Secondary contacts are soft-deleted (recoverable)')); ?>

                                </li>
                            </ul>
                        </div>

                        
                        <div class="px-4 py-3 border-t border-border flex items-center justify-between">
                            <button wire:click="dismissGroup(<?php echo e($selectedGroupIndex); ?>)"
                                    class="inline-flex items-center gap-1.5 px-3 py-2 text-sm text-muted  bg-surface-2 dark:bg-gray-700 border border-border dark:border-gray-600 rounded-xl hover:bg-surface dark:hover:bg-gray-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                <?php echo e(__('Not Duplicates')); ?>

                            </button>
                            <button wire:click="mergeContacts"
                                    wire:confirm="This will merge <?php echo e(count($selectedGroupContacts) - 1); ?> contact(s) into the primary contact. This action cannot be easily undone. Continue?"
                                    wire:loading.attr="disabled"
                                    wire:target="mergeContacts"
                                    class="btn-primary inline-flex items-center gap-2 text-sm disabled:opacity-50">
                                <svg wire:loading.remove wire:target="mergeContacts" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                <svg wire:loading wire:target="mergeContacts" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                <span wire:loading.remove wire:target="mergeContacts"><?php echo e(__('Merge into Primary')); ?></span>
                                <span wire:loading wire:target="mergeContacts"><?php echo e(__('Merging...')); ?></span>
                            </button>
                        </div>
                    </div>
                <?php else: ?>
                    
                    <div class="bg-surface-2 rounded-2xl border border-border p-12 text-center h-full flex flex-col items-center justify-center min-h-[400px]">
                        <div class="w-12 h-12 bg-surface dark:bg-gray-700 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-muted/50 " fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                        </div>
                        <p class="text-sm text-muted"><?php echo e(__('Select a duplicate group from the left to compare and merge contacts')); ?></p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/contacts/contact-merge.blade.php ENDPATH**/ ?>