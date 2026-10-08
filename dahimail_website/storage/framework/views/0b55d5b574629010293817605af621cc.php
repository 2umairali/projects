<?php if (isset($component)) { $__componentOriginal1e6834b7596effc838ab3adb1475b477 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1e6834b7596effc838ab3adb1475b477 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.guest','data' => ['title' => __('Set Up Two-Factor Authentication')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Set Up Two-Factor Authentication'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div>
        <h2 class="text-2xl font-bold text-ink"><?php echo e(__('Set up two-factor authentication')); ?></h2>
        <p class="mt-2 text-sm text-muted"><?php echo e(__('Scan the QR code below with your authenticator app (Google Authenticator, Authy, 1Password, etc.) and enter the 6-digit code to verify.')); ?></p>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mt-4 p-4 bg-danger/10 border border-danger/20 rounded-xl">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <p class="text-sm text-danger"><?php echo e($error); ?></p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="mt-8 space-y-6">
        
        <div class="flex flex-col items-center">
            <div class="bg-surface-2 p-4 rounded-2xl border border-border shadow-sm">
                <img src="<?php echo e($qrImageUrl); ?>" alt="<?php echo e(__('QR Code for authenticator app')); ?>" class="w-[200px] h-[200px]" loading="eager">
            </div>
        </div>

        
        <div class="bg-surface rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted mb-2"><?php echo e(__("Can't scan the QR code? Enter this key manually:")); ?></p>
            <div class="flex items-center gap-3" x-data="{ copied: false }">
                <code class="flex-1 block text-sm font-mono text-ink bg-surface-2 px-4 py-2.5 rounded-lg border border-border select-all break-all tracking-wider"><?php echo e($secret); ?></code>
                <button type="button"
                        @click="navigator.clipboard.writeText('<?php echo e($secret); ?>'); copied = true; setTimeout(() => copied = false, 2000)"
                        class="flex-shrink-0 px-3 py-2.5 text-sm font-medium text-brand border border-brand/30 rounded-lg hover:bg-brand/5 transition-colors">
                    <span x-show="!copied"><?php echo e(__('Copy')); ?></span>
                    <span x-show="copied" x-cloak><?php echo e(__('Copied')); ?></span>
                </button>
            </div>
        </div>

        
        <form method="POST" action="<?php echo e(route('two-factor.activate')); ?>" class="space-y-5"
              x-data="{ submitting: false, code: '' }" @submit="submitting = true">
            <?php echo csrf_field(); ?>

            <div>
                <label for="code" class="block text-sm font-medium text-muted mb-1"><?php echo e(__('Verification code')); ?></label>
                <input id="code"
                       type="text"
                       name="code"
                       x-model="code"
                       required
                       autofocus
                       autocomplete="one-time-code"
                       inputmode="numeric"
                       pattern="[0-9]{6}"
                       maxlength="6"
                       placeholder="<?php echo e(__('Enter 6-digit code')); ?>"
                       class="input text-center text-2xl tracking-[0.5em] font-mono <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger !ring-danger/20 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <button type="submit"
                    :disabled="submitting || code.length !== 6"
                    class="btn-primary w-full py-3"
                    :class="(submitting || code.length !== 6) && 'opacity-75 cursor-not-allowed'">
                <span x-show="!submitting"><?php echo e(__('Enable Two-Factor Authentication')); ?></span>
                <span x-show="submitting" x-cloak class="inline-flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    <?php echo e(__('Verifying...')); ?>

                </span>
            </button>
        </form>

        
        <p class="text-center text-sm text-muted">
            <a href="<?php echo e(route('settings.security')); ?>" class="text-brand font-semibold hover:text-brand-strong"><?php echo e(__('Back to security settings')); ?></a>
        </p>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1e6834b7596effc838ab3adb1475b477)): ?>
<?php $attributes = $__attributesOriginal1e6834b7596effc838ab3adb1475b477; ?>
<?php unset($__attributesOriginal1e6834b7596effc838ab3adb1475b477); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1e6834b7596effc838ab3adb1475b477)): ?>
<?php $component = $__componentOriginal1e6834b7596effc838ab3adb1475b477; ?>
<?php unset($__componentOriginal1e6834b7596effc838ab3adb1475b477); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/auth/two-factor-setup.blade.php ENDPATH**/ ?>