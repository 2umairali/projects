<div class="space-y-6">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)"
         class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm flex items-center gap-2">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="bg-surface-2 rounded-2xl border border-border p-6">
        <div class="flex items-start gap-4 mb-5">
            <div class="w-12 h-12 bg-brand/10 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Email Deliverability Check')); ?></h2>
                <p class="text-sm text-muted mt-0.5"><?php echo e(__('Check if your domains SPF, DKIM, and DMARC records are properly configured. Correct setup prevents your emails from landing in spam.')); ?></p>
            </div>
        </div>

        <form wire:submit="checkDeliverability" class="flex items-start gap-3">
            <div class="flex-1">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                    </div>
                    <input type="text"
                           wire:model="domain"
                           placeholder="example.com"
                           class="w-full pl-10 pr-4 py-2.5 text-sm bg-surface border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                           autocomplete="off"
                           spellcheck="false">
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-xs text-red-500 mt-1.5"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <button type="submit"
                    class="btn-primary px-5 py-2.5 text-sm font-semibold flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
                    wire:loading.attr="disabled"
                    wire:target="checkDeliverability">
                <span wire:loading.remove wire:target="checkDeliverability">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <span wire:loading wire:target="checkDeliverability">
                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                </span>
                <span wire:loading.remove wire:target="checkDeliverability"><?php echo e(__('Check Domain')); ?></span>
                <span wire:loading wire:target="checkDeliverability"><?php echo e(__('Checking...')); ?></span>
            </button>
        </form>
        <p class="text-xs text-muted mt-2"><?php echo e(__('DNS lookups may take a few seconds. Results are cached for 1 hour. Up to 5 checks per hour.')); ?></p>
    </div>

    
    <div wire:loading wire:target="checkDeliverability" class="bg-surface-2 rounded-2xl border border-border p-12 text-center">
        <svg class="w-10 h-10 animate-spin text-primary-500 mx-auto mb-3" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
        <p class="text-sm font-medium text-ink/80"><?php echo e(__('Running DNS checks for')); ?> <?php echo e($domain); ?>...</p>
        <p class="text-xs text-muted mt-1"><?php echo e(__('Checking SPF, DKIM, DMARC, and MX records')); ?></p>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($results): ?>
    
    <div class="bg-surface-2 rounded-2xl border border-border p-6" wire:loading.remove wire:target="checkDeliverability">
        <div class="flex items-center gap-6">
            
            <div class="relative flex-shrink-0">
                <?php
                    $score = $results['overall_score'] ?? 0;
                    $circumference = 2 * pi() * 54;
                    $dashOffset = $circumference - ($score / 100) * $circumference;
                    $scoreColor = $score >= 80 ? '#22c55e' : ($score >= 50 ? '#eab308' : '#ef4444');
                    $scoreBg = $score >= 80 ? '#dcfce7' : ($score >= 50 ? '#fef9c3' : '#fef2f2');
                ?>
                <svg class="w-32 h-32 -rotate-90" viewBox="0 0 120 120">
                    <circle cx="60" cy="60" r="54" fill="none" stroke="#f3f4f6" stroke-width="8"/>
                    <circle cx="60" cy="60" r="54" fill="none"
                            stroke="<?php echo e($scoreColor); ?>"
                            stroke-width="8"
                            stroke-linecap="round"
                            stroke-dasharray="<?php echo e($circumference); ?>"
                            stroke-dashoffset="<?php echo e($dashOffset); ?>"
                            style="transition: stroke-dashoffset 1s ease-in-out"/>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-3xl font-bold" style="color: <?php echo e($scoreColor); ?>"><?php echo e($score); ?></span>
                    <span class="text-xs text-muted -mt-0.5">/ 100</span>
                </div>
            </div>

            
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-ink">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($score >= 90): ?>
                        <?php echo e(__('Excellent Deliverability')); ?>

                    <?php elseif($score >= 70): ?>
                        <?php echo e(__('Good Deliverability')); ?>

                    <?php elseif($score >= 50): ?>
                        <?php echo e(__('Fair Deliverability')); ?>

                    <?php elseif($score >= 25): ?>
                        <?php echo e(__('Poor Deliverability')); ?>

                    <?php else: ?>
                        <?php echo e(__('Critical Issues Found')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </h3>
                <p class="text-sm text-muted mt-1">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($score >= 90): ?>
                        <?php echo e(__('Your domain')); ?> <?php echo e($results['domain']); ?> <?php echo e(__('has properly configured email authentication. Emails from this domain should be delivered reliably to most recipients.')); ?>

                    <?php elseif($score >= 70): ?>
                        <?php echo e(__('Your domain')); ?> <?php echo e($results['domain']); ?> <?php echo e(__('has good email authentication but there is room for improvement. Review the recommendations below.')); ?>

                    <?php elseif($score >= 50): ?>
                        <?php echo e(__('Your domain')); ?> <?php echo e($results['domain']); ?> <?php echo e(__('is partially configured. Some emails may land in spam. Address the issues below to improve deliverability.')); ?>

                    <?php else: ?>
                        <?php echo e(__('Your domain')); ?> <?php echo e($results['domain']); ?> <?php echo e(__('has significant email authentication issues. Many emails will be rejected or marked as spam. Immediate action is recommended.')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>

                
                <div class="flex flex-wrap gap-2 mt-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['spf' => 'SPF', 'dkim' => 'DKIM', 'dmarc' => 'DMARC', 'mx' => 'MX']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <?php $status = $results[$key]['status'] ?? 'fail'; ?>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium
                            <?php echo e($status === 'pass' ? 'bg-success/10 text-success' : ($status === 'warning' ? 'bg-warning/10 text-warning' : 'bg-danger/10 text-danger')); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status === 'pass'): ?>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <?php elseif($status === 'warning'): ?>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                            <?php else: ?>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php echo e($label); ?>

                        </span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4" wire:loading.remove wire:target="checkDeliverability">

        
        <?php $spf = $results['spf'] ?? []; $spfStatus = $spf['status'] ?? 'fail'; ?>
        <div class="bg-surface-2 rounded-2xl border border-border p-5">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center
                    <?php echo e($spfStatus === 'pass' ? 'bg-success/10' : ($spfStatus === 'warning' ? 'bg-warning/10' : 'bg-danger/10')); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($spfStatus === 'pass'): ?>
                        <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php elseif($spfStatus === 'warning'): ?>
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                    <?php else: ?>
                        <svg class="w-5 h-5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-ink"><?php echo e(__('SPF Record')); ?></h4>
                    <span class="text-xs font-medium px-2 py-0.5 rounded-full
                        <?php echo e($spfStatus === 'pass' ? 'bg-success/15 text-success' : ($spfStatus === 'warning' ? 'bg-warning/15 text-warning' : 'bg-danger/15 text-danger')); ?>">
                        <?php echo e(ucfirst($spfStatus)); ?>

                    </span>
                </div>
            </div>

            <p class="text-sm text-muted  mb-3"><?php echo e($spf['details'] ?? __('No data available.')); ?></p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($spf['record'])): ?>
            <div class="relative" x-data="{ copied: false }">
                <div class="bg-surface rounded-lg p-3 pr-10 font-mono text-xs text-ink/80 break-all border border-border">
                    <?php echo e($spf['record']); ?>

                </div>
                <button @click="navigator.clipboard.writeText('<?php echo e(addslashes($spf['record'])); ?>'); copied = true; setTimeout(() => copied = false, 2000)"
                        class="absolute top-2 right-2 p-1.5 text-muted hover:text-muted  rounded-md hover:bg-surface  transition-colors"
                        :title="__('Copy record')">
                    <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </button>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($spf['lookup_count'])): ?>
            <div class="flex items-center gap-2 mt-2 text-xs text-muted">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                DNS lookups: <?php echo e($spf['lookup_count']); ?> / 10
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <?php $dkim = $results['dkim'] ?? []; $dkimStatus = $dkim['status'] ?? 'fail'; ?>
        <div class="bg-surface-2 rounded-2xl border border-border p-5">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center
                    <?php echo e($dkimStatus === 'pass' ? 'bg-success/10' : ($dkimStatus === 'warning' ? 'bg-warning/10' : 'bg-danger/10')); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dkimStatus === 'pass'): ?>
                        <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php elseif($dkimStatus === 'warning'): ?>
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                    <?php else: ?>
                        <svg class="w-5 h-5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-ink"><?php echo e(__('DKIM Record')); ?></h4>
                    <span class="text-xs font-medium px-2 py-0.5 rounded-full
                        <?php echo e($dkimStatus === 'pass' ? 'bg-success/15 text-success' : ($dkimStatus === 'warning' ? 'bg-warning/15 text-warning' : 'bg-danger/15 text-danger')); ?>">
                        <?php echo e(ucfirst($dkimStatus)); ?>

                    </span>
                </div>
            </div>

            <p class="text-sm text-muted  mb-3"><?php echo e($dkim['details'] ?? __('No data available.')); ?></p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($dkim['selectors_found'])): ?>
            <div class="space-y-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $dkim['selectors_found']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="bg-surface rounded-lg p-3 border border-border">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-xs font-semibold text-ink/80"><?php echo e(__('Selector:')); ?></span>
                        <span class="text-xs font-mono text-primary-600"><?php echo e($sel['selector']); ?></span>
                        <span class="text-xs text-muted">(<?php echo e($sel['type']); ?>)</span>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($sel['record'])): ?>
                    <div class="relative" x-data="{ copied: false }">
                        <p class="font-mono text-xs text-muted  break-all pr-8"><?php echo e(Str::limit($sel['record'], 200)); ?></p>
                        <button @click="navigator.clipboard.writeText(<?php echo \Illuminate\Support\Js::from($sel['record'])->toHtml() ?>); copied = true; setTimeout(() => copied = false, 2000)"
                                class="absolute top-0 right-0 p-1 text-muted hover:text-muted  rounded-md hover:bg-gray-200 dark:bg-gray-700/50 transition-colors"
                                :title="__('Copy record')">
                            <svg x-show="!copied" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <svg x-show="copied" class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </button>
                    </div>
                    <?php elseif(isset($sel['target'])): ?>
                    <p class="font-mono text-xs text-muted ">CNAME -> <?php echo e($sel['target']); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <?php $dmarc = $results['dmarc'] ?? []; $dmarcStatus = $dmarc['status'] ?? 'fail'; ?>
        <div class="bg-surface-2 rounded-2xl border border-border p-5">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center
                    <?php echo e($dmarcStatus === 'pass' ? 'bg-success/10' : ($dmarcStatus === 'warning' ? 'bg-warning/10' : 'bg-danger/10')); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dmarcStatus === 'pass'): ?>
                        <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php elseif($dmarcStatus === 'warning'): ?>
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                    <?php else: ?>
                        <svg class="w-5 h-5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-ink"><?php echo e(__('DMARC Record')); ?></h4>
                    <span class="text-xs font-medium px-2 py-0.5 rounded-full
                        <?php echo e($dmarcStatus === 'pass' ? 'bg-success/15 text-success' : ($dmarcStatus === 'warning' ? 'bg-warning/15 text-warning' : 'bg-danger/15 text-danger')); ?>">
                        <?php echo e(ucfirst($dmarcStatus)); ?>

                    </span>
                </div>
            </div>

            <p class="text-sm text-muted  mb-3"><?php echo e($dmarc['details'] ?? __('No data available.')); ?></p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($dmarc['policy'])): ?>
            <div class="flex flex-wrap gap-2 mb-3">
                <span class="inline-flex items-center gap-1 text-xs font-medium px-2.5 py-1 rounded-lg
                    <?php echo e($dmarc['policy'] === 'reject' ? 'bg-success/10 text-success' : ($dmarc['policy'] === 'quarantine' ? 'bg-info/10 text-info' : 'bg-warning/10 text-warning')); ?>">
                    Policy: <?php echo e($dmarc['policy']); ?>

                </span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($dmarc['has_rua'])): ?>
                <span class="inline-flex items-center gap-1 text-xs font-medium px-2.5 py-1 rounded-lg bg-success/10 text-success">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Aggregate Reports
                </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($dmarc['has_ruf'])): ?>
                <span class="inline-flex items-center gap-1 text-xs font-medium px-2.5 py-1 rounded-lg bg-success/10 text-success">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Forensic Reports
                </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($dmarc['record'])): ?>
            <div class="relative" x-data="{ copied: false }">
                <div class="bg-surface rounded-lg p-3 pr-10 font-mono text-xs text-ink/80 break-all border border-border">
                    <?php echo e($dmarc['record']); ?>

                </div>
                <button @click="navigator.clipboard.writeText(<?php echo \Illuminate\Support\Js::from($dmarc['record'])->toHtml() ?>); copied = true; setTimeout(() => copied = false, 2000)"
                        class="absolute top-2 right-2 p-1.5 text-muted hover:text-muted  rounded-md hover:bg-surface  transition-colors"
                        :title="__('Copy record')">
                    <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </button>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <?php $mx = $results['mx'] ?? []; $mxStatus = $mx['status'] ?? 'fail'; ?>
        <div class="bg-surface-2 rounded-2xl border border-border p-5">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center
                    <?php echo e($mxStatus === 'pass' ? 'bg-success/10' : 'bg-danger/10'); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mxStatus === 'pass'): ?>
                        <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?php else: ?>
                        <svg class="w-5 h-5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-ink"><?php echo e(__('MX Records')); ?></h4>
                    <span class="text-xs font-medium px-2 py-0.5 rounded-full
                        <?php echo e($mxStatus === 'pass' ? 'bg-success/15 text-success' : 'bg-danger/15 text-danger'); ?>">
                        <?php echo e(ucfirst($mxStatus)); ?>

                    </span>
                </div>
            </div>

            <p class="text-sm text-muted  mb-3"><?php echo e($mx['details'] ?? __('No data available.')); ?></p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($mx['records'])): ?>
            <div class="bg-surface rounded-lg border border-border overflow-hidden">
                <table class="w-full text-xs">
                    <thead>
                        <tr class="border-b border-border">
                            <th class="text-left px-3 py-2 font-semibold text-muted "><?php echo e(__('Priority')); ?></th>
                            <th class="text-left px-3 py-2 font-semibold text-muted "><?php echo e(__('Mail Server')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mx['records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr class="border-b border-border last:border-0">
                            <td class="px-3 py-2 text-muted font-mono"><?php echo e($record['priority']); ?></td>
                            <td class="px-3 py-2 text-ink/80 font-mono"><?php echo e($record['host']); ?></td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($results['recommendations'])): ?>
    <div class="bg-surface-2 rounded-2xl border border-border p-6" wire:loading.remove wire:target="checkDeliverability">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-warning/10 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-ink"><?php echo e(__('Recommendations')); ?></h3>
                <p class="text-sm text-muted"><?php echo e(__('Steps to improve your email deliverability.')); ?></p>
            </div>
        </div>

        <div class="space-y-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $results['recommendations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="rounded-xl border p-4
                <?php echo e(($rec['severity'] ?? '') === 'critical' ? 'border-danger/20 bg-danger/10/50' : (($rec['severity'] ?? '') === 'high' ? 'border-orange-200 bg-orange-50/50' : (($rec['severity'] ?? '') === 'medium' ? 'border-warning/20 bg-warning/10/50' : 'border-border bg-surface'))); ?>">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 mt-0.5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($rec['severity'] ?? '') === 'critical'): ?>
                            <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold rounded-md bg-danger/15 text-danger"><?php echo e(__('Critical')); ?></span>
                        <?php elseif(($rec['severity'] ?? '') === 'high'): ?>
                            <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold rounded-md bg-orange-100 text-orange-700"><?php echo e(__('High')); ?></span>
                        <?php elseif(($rec['severity'] ?? '') === 'medium'): ?>
                            <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold rounded-md bg-warning/15 text-warning"><?php echo e(__('Medium')); ?></span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold rounded-md bg-surface  text-muted "><?php echo e(__('Low')); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-semibold text-muted uppercase"><?php echo e($rec['area'] ?? ''); ?></span>
                        </div>
                        <p class="text-sm text-ink/80"><?php echo e($rec['message']); ?></p>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($rec['dns_record'])): ?>
                        <div class="mt-2 relative" x-data="{ copied: false }">
                            <div class="bg-surface-2 rounded-lg p-3 pr-10 font-mono text-xs text-ink/80 break-all border border-border">
                                <span class="text-muted select-none">TXT &nbsp;</span><?php echo e($rec['dns_record']); ?>

                            </div>
                            <button @click="navigator.clipboard.writeText(<?php echo \Illuminate\Support\Js::from($rec['dns_record'])->toHtml() ?>); copied = true; setTimeout(() => copied = false, 2000)"
                                    class="absolute top-2 right-2 p-1.5 text-muted hover:text-muted  rounded-md hover:bg-surface  transition-colors"
                                    :title="__('Copy DNS record')">
                                <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </button>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($results): ?>
    <div class="bg-surface rounded-2xl border border-border p-5" wire:loading.remove wire:target="checkDeliverability">
        <h4 class="text-sm font-semibold text-ink/80 mb-2"><?php echo e(__('How the score is calculated')); ?></h4>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs text-muted">
            <div class="bg-surface-2 rounded-lg p-3 border border-border text-center">
                <p class="font-semibold text-ink/80 text-lg mb-0.5">30</p>
                <p><?php echo e(__('SPF points')); ?></p>
            </div>
            <div class="bg-surface-2 rounded-lg p-3 border border-border text-center">
                <p class="font-semibold text-ink/80 text-lg mb-0.5">30</p>
                <p><?php echo e(__('DKIM points')); ?></p>
            </div>
            <div class="bg-surface-2 rounded-lg p-3 border border-border text-center">
                <p class="font-semibold text-ink/80 text-lg mb-0.5">25</p>
                <p><?php echo e(__('DMARC points')); ?></p>
            </div>
            <div class="bg-surface-2 rounded-lg p-3 border border-border text-center">
                <p class="font-semibold text-ink/80 text-lg mb-0.5">15</p>
                <p><?php echo e(__('MX points')); ?></p>
            </div>
        </div>
        <p class="text-xs text-muted mt-3"><?php echo e(__('Partial configurations (warnings) receive half points. A score of 100 means all email authentication standards are properly configured.')); ?></p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($results['checked_at'])): ?>
        <p class="text-xs text-muted mt-2"><?php echo e(__('Checked at:')); ?> <?php echo e(\Carbon\Carbon::parse($results['checked_at'])->format('M j, Y g:i A')); ?></p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/deliverability-check.blade.php ENDPATH**/ ?>