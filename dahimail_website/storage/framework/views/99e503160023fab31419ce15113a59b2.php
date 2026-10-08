<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Contact Details']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Contact Details']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">
        
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('contacts')); ?>" class="text-sm text-brand hover:text-brand/80 flex items-center gap-1" wire:navigate>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                <?php echo e(__('Back to Contacts')); ?>

            </a>
        </div>

        
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-primary-500 rounded-full flex items-center justify-center text-white text-lg font-semibold flex-shrink-0">
                <?php echo e($contact->initials); ?>

            </div>
            <div>
                <h1 class="text-2xl font-bold text-ink"><?php echo e($contact->full_name); ?></h1>
                <p class="text-sm text-muted"><?php echo e($contact->email); ?></p>
            </div>
        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-1 space-y-4">
                <div class="bg-surface-2 rounded-2xl border border-border p-5 space-y-3">
                    <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Details')); ?></h3>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contact->phone): ?>
                    <div>
                        <p class="text-xs text-muted"><?php echo e(__('Phone')); ?></p>
                        <p class="text-sm text-ink"><?php echo e($contact->phone); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contact->company): ?>
                    <div>
                        <p class="text-xs text-muted"><?php echo e(__('Company')); ?></p>
                        <p class="text-sm text-ink"><?php echo e($contact->company); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contact->job_title): ?>
                    <div>
                        <p class="text-xs text-muted"><?php echo e(__('Job Title')); ?></p>
                        <p class="text-sm text-ink"><?php echo e($contact->job_title); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contact->city || $contact->country): ?>
                    <div>
                        <p class="text-xs text-muted"><?php echo e(__('Location')); ?></p>
                        <p class="text-sm text-ink"><?php echo e(implode(', ', array_filter([$contact->city, $contact->country]))); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contact->timezone): ?>
                    <div>
                        <p class="text-xs text-muted"><?php echo e(__('Timezone')); ?></p>
                        <p class="text-sm text-ink"><?php echo e($contact->timezone); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div>
                        <p class="text-xs text-muted"><?php echo e(__('Engagement Score')); ?></p>
                        <p class="text-sm text-ink font-semibold"><?php echo e($contact->lead_score ?? 0); ?></p>
                    </div>

                    <div>
                        <p class="text-xs text-muted"><?php echo e(__('Status')); ?></p>
                        <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'inline-block text-xs font-medium px-2 py-0.5 rounded-full',
                            'bg-success/15 text-success' => ($contact->status ?? 'active') === 'active',
                            'bg-danger/15 text-danger' => ($contact->status ?? 'active') === 'unsubscribed',
                        ]); ?>"><?php echo e(ucfirst($contact->status ?? 'active')); ?></span>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contact->last_contacted_at): ?>
                    <div>
                        <p class="text-xs text-muted"><?php echo e(__('Last Contacted')); ?></p>
                        <p class="text-sm text-ink" title="<?php echo e($contact->last_contacted_at->format('M j, Y g:i A')); ?>"><?php echo e($contact->last_contacted_at->diffForHumans()); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contact->tags->count() > 0): ?>
                <div class="bg-surface-2 rounded-2xl border border-border p-5">
                    <h3 class="text-sm font-semibold text-ink mb-3"><?php echo e(__('Tags')); ?></h3>
                    <div class="flex flex-wrap gap-1.5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $contact->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <span class="px-2 py-0.5 rounded-md text-xs font-medium bg-surface text-muted" style="<?php echo e($tag->color ? 'background-color:' . $tag->color . '20; color:' . $tag->color : ''); ?>">
                            <?php echo e($tag->name); ?>

                        </span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="lg:col-span-2">
                <div class="bg-surface-2 rounded-2xl border border-border p-5">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contacts.contact-timeline', ['contactId' => $contact->id]);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1624227042-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/contacts/show.blade.php ENDPATH**/ ?>