<?php if (isset($component)) { $__componentOriginal1e6834b7596effc838ab3adb1475b477 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1e6834b7596effc838ab3adb1475b477 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.guest','data' => ['title' => __('Create Account')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create Account'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div>
        <h2 class="text-2xl font-bold text-ink"><?php echo e(__('Create your account')); ?></h2>
        <p class="mt-1 text-sm text-muted"><?php echo e(__('Your :domain address is your login for everything.', ['domain' => '@'.config('dahify.domain')])); ?></p>
    </div>

    <form method="POST" action="<?php echo e(route('register')); ?>" class="mt-6 space-y-4"
          x-data="{ submitting: false }" @submit="submitting = true">
        <?php echo csrf_field(); ?>

        
        <div class="hidden" aria-hidden="true">
            <label for="website">Website</label>
            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
        </div>
        <input type="hidden" name="form_token" value="<?php echo e($formToken); ?>">

        
        <div>
            <label for="name" class="block text-sm font-medium text-muted mb-1"><?php echo e(__('Full name')); ?></label>
            <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus
                   autocomplete="name"
                   class="input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('John Doe')); ?>">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div>
            <label for="username" class="block text-sm font-medium text-muted mb-1"><?php echo e(__('Username')); ?></label>
            <div class="relative">
                <input id="username" type="text" name="username" value="<?php echo e(old('username')); ?>" required
                       autocomplete="username" autocapitalize="off" autocorrect="off" spellcheck="false"
                       x-data x-on:input="$el.value = $el.value.toLowerCase()"
                       class="input pr-40 <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('yourname')); ?>">
                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-muted pointer-events-none">
                    <?php echo e('@' . config('dahify.domain')); ?>

                </span>
            </div>
            <p class="mt-1 text-xs text-muted"><?php echo e(__('This becomes your address for both email and login — choose carefully.')); ?></p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php echo $__env->make('auth.partials.phone-field', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        
        
        <div x-data="{
            show: false,
            password: '',
            get strength() {
                let s = 0;
                if (this.password.length >= 10) s++;
                if (/[A-Z]/.test(this.password)) s++;
                if (/[a-z]/.test(this.password)) s++;
                if (/[0-9]/.test(this.password)) s++;
                if (/[^A-Za-z0-9]/.test(this.password)) s++;
                return s;
            },
            get strengthLabel() {
                if (!this.password) return '';
                if (this.strength <= 2) return 'Weak';
                if (this.strength <= 3) return 'Fair';
                if (this.strength <= 4) return 'Good';
                return 'Strong';
            },
            get strengthColor() {
                if (this.strength <= 2) return 'bg-danger/100';
                if (this.strength <= 3) return 'bg-warning/100';
                if (this.strength <= 4) return 'bg-info/100';
                return 'bg-success/100';
            }
        }">
            <label for="password" class="block text-sm font-medium text-muted mb-1"><?php echo e(__('Password')); ?></label>
            <div class="relative">
                <input id="password" :type="show ? 'text' : 'password'" name="password" required
                       autocomplete="new-password"
                       x-model="password"
                       class="input pr-10 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> !border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Min 10 characters, letters and numbers')); ?>">
                <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-muted hover:text-ink">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
            </div>
            <div x-show="password.length > 0" x-transition class="mt-1.5">
                <div class="flex gap-1 mb-0.5">
                    <template x-for="i in 5">
                        <div class="h-1 flex-1 rounded-full transition-colors" :class="i <= strength ? strengthColor : 'bg-gray-200'"></div>
                    </template>
                </div>
                <p class="text-xs" :class="{
                    'text-danger': strength <= 2,
                    'text-yellow-600': strength === 3,
                    'text-blue-600': strength === 4,
                    'text-success': strength === 5
                }" x-text="strengthLabel"></p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-muted mb-1"><?php echo e(__('Confirm password')); ?></label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   autocomplete="new-password"
                   class="input"
                   placeholder="<?php echo e(__('Confirm your password')); ?>">
        </div>

        
        <div class="flex items-start">
            <input id="terms" type="checkbox" name="terms" required class="w-4 h-4 mt-0.5 rounded border-border text-brand focus:ring-brand">
            <label for="terms" class="ml-2 text-sm text-muted"><?php echo e(__('I agree to the')); ?> <a href="<?php echo e(url('/terms')); ?>" target="_blank" class="text-brand hover:underline"><?php echo e(__('Terms')); ?></a> <?php echo e(__('and')); ?> <a href="<?php echo e(url('/privacy')); ?>" target="_blank" class="text-brand hover:underline"><?php echo e(__('Privacy Policy')); ?></a></label>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <button type="submit" :disabled="submitting"
                class="btn-primary w-full py-2.5"
                :class="submitting && 'opacity-75 cursor-not-allowed'">
            <span x-show="!submitting"><?php echo e(__('Create Account')); ?></span>
            <span x-show="submitting" x-cloak class="inline-flex items-center justify-center gap-2">
                <svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                <?php echo e(__('Creating account...')); ?>

            </span>
        </button>

        

        
        <p class="text-center text-sm text-muted mt-4">
            <?php echo e(__('Already have an account?')); ?> <a href="<?php echo e(route('login')); ?>" class="text-brand font-semibold hover:text-brand-strong"><?php echo e(__('Log in')); ?></a>
        </p>
    </form>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>