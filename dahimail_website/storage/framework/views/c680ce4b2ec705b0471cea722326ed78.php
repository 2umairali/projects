<div class="space-y-6" x-data="{ tab: 'plans' }">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('success')); ?></span>
        <button @click="show = false" class="text-green-500 hover:text-success" aria-label="Dismiss">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm"><?php echo e(session('error')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Billing & Plans')); ?></h1>
            <p class="text-sm text-muted mt-1"><?php echo e(__('Manage your subscription and billing information.')); ?></p>
        </div>
    </div>

    
    <div class="flex items-center gap-1 bg-surface rounded-xl p-1 w-fit">
        <button @click="tab = 'plans'" :class="tab === 'plans' ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted hover:text-ink'" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors"><?php echo e(__('Plans')); ?></button>
        <button @click="tab = 'usage'" :class="tab === 'usage' ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted hover:text-ink'" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors"><?php echo e(__('Usage')); ?></button>
        <button @click="tab = 'history'" :class="tab === 'history' ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted hover:text-ink'" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors"><?php echo e(__('Billing History')); ?></button>
    </div>

    
    <div x-show="tab === 'plans'" x-transition class="space-y-6">

    
    <div class="bg-surface-2 rounded-2xl border border-border p-6">
        <h2 class="text-lg font-semibold text-ink mb-4"><?php echo e(__('Current Plan')); ?></h2>
        <div class="bg-gradient-to-br from-primary-600 to-secondary-600 rounded-xl p-5 text-white">
            <p class="text-sm font-medium text-white/80"><?php echo e(__('Your Plan')); ?></p>
            <p class="text-2xl font-bold mt-1"><?php echo e($currentPlan?->name ?? __('Free')); ?></p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subscription): ?>
            <p class="text-sm text-white/70 mt-1">
                <?php echo e(ucfirst($subscription->billing_cycle ?? 'monthly')); ?> <?php echo e(__('billing')); ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subscription->current_period_end): ?>
                &middot; <?php echo e(__('Renews')); ?> <?php echo e($subscription->current_period_end->format('M j, Y')); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subscription->onTrial()): ?>
            <p class="text-sm text-yellow-200 mt-1"><?php echo e(__('Trial ends')); ?> <span title="<?php echo e($subscription->trial_ends_at->format('M j, Y')); ?>"><?php echo e($subscription->trial_ends_at->diffForHumans()); ?></span></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subscription->onGracePeriod()): ?>
            <p class="text-sm text-yellow-200 mt-1"><?php echo e(__('Canceled - Access until')); ?> <?php echo e($subscription->grace_period_ends_at->format('M j, Y')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subscription?->stripe_subscription_id): ?>
        <button wire:click="manageBilling" class="mt-4 px-5 py-2.5 bg-surface  text-ink/80 text-sm font-medium rounded-xl hover:bg-gray-200 dark:bg-gray-700 transition-colors">
            <span wire:loading.remove wire:target="manageBilling"><?php echo e(__('Manage Billing on Stripe')); ?></span>
            <span wire:loading wire:target="manageBilling" class="inline-flex items-center gap-2">
                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                Redirecting...
            </span>
        </button>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    </div>

    
    <div x-show="tab === 'usage'" x-transition class="space-y-6">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($resourceUsage)): ?>
    <div class="bg-surface-2 rounded-2xl border border-border p-6">
        <h2 class="text-lg font-semibold text-ink mb-4"><?php echo e(__('Usage Overview')); ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $resourceUsage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <?php
                $used = $resource['used'];
                $limit = $resource['limit'];
                $isUnlimited = $limit === null;
                $percent = (!$isUnlimited && $limit > 0) ? min(100, round(($used / $limit) * 100)) : 0;
                $labels = [
                    'contacts' => __('Contacts'),
                    'email_accounts' => __('Email Accounts'),
                    'team_members' => __('Team Members'),
                    'workflows' => __('Workflows'),
                    'kb_documents' => __('KB Documents'),
                    'ai_replies' => __('AI Replies / Month'),
                    'campaigns_per_month' => __('Campaigns / Month'),
                    'storage_mb' => __('Storage (MB)'),
                ];
                $label = $labels[$key] ?? str_replace('_', ' ', ucfirst($key));
            ?>
            <div class="p-4 bg-surface rounded-xl">
                <div class="flex justify-between text-sm mb-2">
                    <span class="font-medium text-ink/80"><?php echo e($label); ?></span>
                    <span class="text-muted">
                        <?php echo e(number_format($used)); ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isUnlimited): ?>
                            / <span class="text-success font-medium"><?php echo e(__('Unlimited')); ?></span>
                        <?php else: ?>
                            / <?php echo e(number_format($limit)); ?>

                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isUnlimited): ?>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="rounded-full h-2 transition-all <?php echo e($percent > 90 ? 'bg-danger' : ($percent > 70 ? 'bg-warning' : 'bg-brand')); ?>" style="width: <?php echo e($percent); ?>%"></div>
                </div>
                <?php else: ?>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="rounded-full h-2 bg-success/50" style="width: 100%"></div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="bg-surface-2 rounded-2xl border border-border p-6 text-center py-12">
        <svg class="w-10 h-10 text-muted/30 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
        <p class="text-sm text-muted"><?php echo e(__('No active plan. Subscribe to see usage data.')); ?></p>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div x-show="tab === 'plans'" x-transition>
    <div class="bg-surface-2 rounded-2xl border border-border p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Available Plans')); ?></h2>
            <div class="flex items-center bg-surface  rounded-xl p-0.5">
                <button wire:click="switchCycle('monthly')" class="px-3 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($billingCycle === 'monthly' ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted'); ?>"><?php echo e(__('Monthly')); ?></button>
                <button wire:click="switchCycle('yearly')" class="px-3 py-1.5 text-sm font-medium rounded-lg transition-colors <?php echo e($billingCycle === 'yearly' ? 'bg-surface-2 text-ink shadow-sm' : 'text-muted'); ?>"><?php echo e(__('Yearly')); ?> <span class="text-success text-xs">-20%</span></button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <?php
                $isCurrent = $currentPlan?->id === $plan->id;
                $price = $billingCycle === 'yearly' ? $plan->yearly_price : $plan->monthly_price;
                $monthlyEquiv = $billingCycle === 'yearly' ? round($price / 12, 2) : $price;
            ?>
            <div class="border rounded-2xl p-6 relative flex flex-col <?php echo e($plan->is_popular ? 'border-primary-500 ring-2 ring-primary-200 dark:ring-primary-800 shadow-lg shadow-primary-500/10' : 'border-border'); ?> <?php echo e($isCurrent ? 'bg-primary-50/50 dark:bg-primary-900/10' : 'bg-surface-2'); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->is_popular): ?>
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 bg-primary-600 dark:bg-primary-700 text-white text-xs font-semibold rounded-full shadow-sm"><?php echo e(__('Popular')); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <h3 class="text-lg font-bold text-ink"><?php echo e($plan->name); ?></h3>
                <p class="text-xs text-muted mt-1 min-h-[2rem]"><?php echo e($plan->description ?? ''); ?></p>

                <div class="mt-4 mb-5">
                    <span class="text-4xl font-extrabold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($monthlyEquiv); ?></span>
                    <span class="text-sm text-muted"><?php echo e(__('/mo')); ?></span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingCycle === 'yearly' && $price > 0): ?>
                    <p class="text-xs text-muted mt-0.5"><?php echo e(__('Billed')); ?> <?php echo \App\Helpers\CurrencyHelper::display($price); ?><?php echo e(__('/year')); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($plan->features): ?>
                <ul class="space-y-2.5 mb-6 flex-1">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $plan->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php
                        if (!is_numeric($key) && $key === 'trial_days') {
                            $display = ((int) $value) . '-day free trial';
                        } elseif (is_numeric($key)) {
                            $display = is_string($value) ? $value : (string) $value;
                        } else {
                            $label = str_replace('_', ' ', $key);
                            if (is_bool($value) || $value === true || $value === 'true') {
                                $display = ucfirst($label);
                            } elseif (strtolower((string)$value) === 'unlimited') {
                                $display = 'Unlimited ' . $label;
                            } else {
                                $display = $value . ' ' . $label;
                            }
                        }
                    ?>
                    <li class="flex items-start gap-2 text-sm <?php echo e(!is_numeric($key) && $key === 'trial_days' ? 'text-primary-600 dark:text-primary-400 font-medium' : 'text-muted dark:text-gray-400'); ?>">
                        <svg class="w-4 h-4 <?php echo e(!is_numeric($key) && $key === 'trial_days' ? 'text-primary-500' : 'text-success'); ?> flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <?php echo e($display); ?>

                    </li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ul>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="mt-auto">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isCurrent): ?>
                    <span class="block w-full text-center py-2.5 px-4 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 text-sm font-semibold rounded-xl"><?php echo e(__('Current Plan')); ?></span>
                    <?php elseif($plan->isFree()): ?>
                    <span class="block w-full text-center py-2.5 px-4 bg-surface text-muted text-sm font-medium rounded-xl border border-border"><?php echo e(__('Free Tier')); ?></span>
                    <?php elseif($currentPlan && $plan->monthly_price <= $currentPlan->monthly_price): ?>
                    
                    <span class="block w-full text-center py-2.5 px-4 bg-surface text-muted/50 text-sm font-medium rounded-xl border border-border">—</span>
                    <?php else: ?>
                    <button wire:click="upgradePlan(<?php echo e($plan->id); ?>)" wire:confirm="Upgrade to <?php echo e($plan->name); ?>? Your billing will be updated." class="btn-primary block w-full text-center py-2.5 px-4 text-sm font-semibold shadow-sm">
                        <span wire:loading.remove wire:target="upgradePlan(<?php echo e($plan->id); ?>)">
                            Upgrade
                        </span>
                        <span wire:loading wire:target="upgradePlan(<?php echo e($plan->id); ?>)" class="inline-flex items-center gap-2">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                            Redirecting...
                        </span>
                    </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>

    </div>

    
    <div x-show="tab === 'history'" x-transition class="space-y-6">

    
    <div class="bg-surface-2 rounded-2xl border border-border p-6">
        <h2 class="text-lg font-semibold text-ink mb-4"><?php echo e(__('Billing History')); ?></h2>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingHistory->isEmpty()): ?>
        <div class="text-center py-8">
            <svg class="w-10 h-10 text-muted/30 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
            </svg>
            <p class="text-sm text-muted"><?php echo e(__('No payment history yet')); ?></p>
        </div>
        <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-xs uppercase tracking-widest text-muted border-b border-border">
                        <th class="text-left py-2 px-3 font-semibold"><?php echo e(__('Date')); ?></th>
                        <th class="text-left py-2 px-3 font-semibold"><?php echo e(__('Description')); ?></th>
                        <th class="text-left py-2 px-3 font-semibold"><?php echo e(__('Amount')); ?></th>
                        <th class="text-left py-2 px-3 font-semibold"><?php echo e(__('Status')); ?></th>
                        <th class="text-left py-2 px-3 font-semibold"><?php echo e(__('Gateway')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $billingHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php
                        $statusColor = match($payment->status) {
                            'succeeded' => 'text-success',
                            'failed' => 'text-danger',
                            'pending' => 'text-warning',
                            'refunded' => 'text-info',
                            default => 'text-muted',
                        };
                    ?>
                    <tr class="hover:bg-surface/50">
                        <td class="py-3 px-3 text-muted"><?php echo e($payment->created_at->format('M j, Y')); ?></td>
                        <td class="py-3 px-3 text-ink font-medium"><?php echo e($payment->description ?? __('Payment')); ?></td>
                        <td class="py-3 px-3 font-semibold text-ink">
                            <?php echo \App\Helpers\CurrencyHelper::display($payment->amount); ?>
                        </td>
                        <td class="py-3 px-3">
                            <span class="inline-flex items-center gap-1 <?php echo e($statusColor); ?> text-xs font-semibold">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payment->status === 'succeeded'): ?>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php echo e(ucfirst($payment->status)); ?>

                            </span>
                        </td>
                        <td class="py-3 px-3 text-xs text-muted"><?php echo e(ucfirst($payment->gateway_slug ?? 'stripe')); ?></td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/billing-manager.blade.php ENDPATH**/ ?>