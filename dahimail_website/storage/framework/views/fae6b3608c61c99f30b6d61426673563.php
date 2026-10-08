<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => __('Create User'),'subtitle' => __('Add a new user account and assign roles instantly.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create User')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Add a new user account and assign roles instantly.'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="space-y-6">

        <div class="flex flex-wrap items-center justify-between gap-4">
            <a href="<?php echo e(route('admin.users.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface-2 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <?php echo e(__('Back to Users')); ?>

            </a>
            <p class="text-sm text-muted"><?php echo e(__('All required fields must be completed.')); ?></p>
        </div>

        <form method="POST" action="<?php echo e(route('admin.users.store')); ?>" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>

            <div class="grid gap-6 lg:grid-cols-2">

                
                <div class="panel p-6">
                    <p class="panel-heading"><?php echo e(__('Personal Details')); ?></p>
                    <div class="mt-4 grid gap-4">

                        
                        <div class="flex items-center gap-4" x-data="{ preview: null, readFile(e) { var f = e.target.files[0]; if (f) { var r = new FileReader(); var self = this; r.onload = function(ev) { self.preview = ev.target.result; }; r.readAsDataURL(f); } } }">
                            <div class="h-16 w-16 overflow-hidden rounded-2xl border border-border bg-surface-2/80 shrink-0">
                                <template x-if="preview">
                                    <img :src="preview" alt="<?php echo e(__('Preview')); ?>" class="h-full w-full object-cover">
                                </template>
                                <template x-if="!preview">
                                    <div class="h-full w-full flex items-center justify-center text-muted">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                </template>
                            </div>
                            <div>
                                <label for="avatar" class="block text-sm font-medium text-ink"><?php echo e(__('Profile Photo')); ?></label>
                                <input id="avatar" name="avatar" type="file" accept=".jpg,.jpeg,.png,.webp" class="mt-1 text-sm text-muted"
                                       @change="readFile($event)">
                                <p class="mt-1 text-xs text-muted"><?php echo e(__('JPG, PNG, or WEBP. Max 5MB.')); ?></p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-ink"><?php echo e(__('Full Name')); ?> <span class="text-danger">*</span></label>
                            <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" required maxlength="60"
                                   placeholder="<?php echo e(__('e.g. John Doe')); ?>"
                                   class="input-field mt-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-ink"><?php echo e(__('Email Address')); ?> <span class="text-danger">*</span></label>
                            <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required maxlength="100"
                                   placeholder="<?php echo e(__('e.g. john@example.com')); ?>"
                                   class="input-field mt-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-ink"><?php echo e(__('Mobile Number')); ?></label>
                            <input id="phone" name="phone" type="text" value="<?php echo e(old('phone')); ?>" maxlength="20" inputmode="tel"
                                   placeholder="+91XXXXXXXXXX"
                                   class="input-field mt-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-ink"><?php echo e(__('Email Verified')); ?></label>
                            <input type="hidden" name="email_verified" value="0">
                            <label class="mt-2 inline-flex items-center gap-3 text-sm text-muted cursor-pointer">
                                <input type="checkbox" name="email_verified" value="1" class="peer sr-only" <?php if(old('email_verified', true)): echo 'checked'; endif; ?>>
                                <span class="relative inline-flex h-6 w-11 items-center rounded-full bg-border transition peer-checked:bg-brand [--switch-x:0.125rem] peer-checked:[--switch-x:1.25rem]">
                                    <span class="inline-block h-5 w-5 translate-x-[var(--switch-x)] rounded-full bg-white shadow transition"></span>
                                </span>
                                <span><?php echo e(__('Mark email as verified on creation')); ?></span>
                            </label>
                        </div>
                    </div>
                </div>

                
                <div class="panel p-6">
                    <p class="panel-heading"><?php echo e(__('Access & Status')); ?></p>
                    <div class="mt-4 grid gap-4">

                        
                        <div>
                            <label class="block text-sm font-medium text-ink"><?php echo e(__('User Roles')); ?></label>
                            <div class="mt-2 grid gap-2 text-sm text-muted sm:grid-cols-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="roles[]" value="<?php echo e($role->name); ?>"
                                           class="h-4 w-4 rounded border-border text-brand focus:ring-brand/40"
                                           <?php if(in_array($role->name, old('roles', []), true)): echo 'checked'; endif; ?>>
                                    <?php echo e($role->name); ?>

                                </label>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['roles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['roles.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label for="plan_id" class="block text-sm font-medium text-ink"><?php echo e(__('Plan')); ?></label>
                            <select id="plan_id" name="plan_id" class="input-field mt-1">
                                <option value=""><?php echo e(__('No plan assigned')); ?></option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <option value="<?php echo e($plan->id); ?>" <?php if(old('plan_id') == $plan->id): echo 'selected'; endif; ?>><?php echo e($plan->name); ?></option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </select>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['plan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div x-data="{ showPw: false }">
                            <label for="password" class="block text-sm font-medium text-ink"><?php echo e(__('Password')); ?> <span class="text-danger">*</span></label>
                            <div class="relative mt-1">
                                <input id="password" name="password" :type="showPw ? 'text' : 'password'" required autocomplete="new-password"
                                       placeholder="<?php echo e(__('Min 10 characters')); ?>"
                                       class="input-field pr-12">
                                <button type="button" @click="showPw = !showPw" class="absolute inset-y-0 right-3 flex items-center text-muted/70 hover:text-ink transition" aria-label="<?php echo e(__('Toggle password')); ?>">
                                    <svg x-show="!showPw" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <svg x-show="showPw" x-cloak viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 5l16 16"/><path d="M10.5 10.5a2.5 2.5 0 003 3"/><path d="M7.5 7.5C5 9 3 12 3 12s3.5 6 9 6c1.6 0 3.1-.3 4.4-.9"/><path d="M14.5 14.5c1.9-1.4 3.5-3.5 3.5-3.5s-1.3-2.3-3.5-3.8"/></svg>
                                </button>
                            </div>
                            <p class="mt-1 text-xs text-muted"><?php echo e(__('Must include uppercase, lowercase, number, and symbol.')); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div x-data="{ showCpw: false }">
                            <label for="password_confirmation" class="block text-sm font-medium text-ink"><?php echo e(__('Confirm Password')); ?> <span class="text-danger">*</span></label>
                            <div class="relative mt-1">
                                <input id="password_confirmation" name="password_confirmation" :type="showCpw ? 'text' : 'password'" required autocomplete="new-password"
                                       placeholder="<?php echo e(__('Repeat password')); ?>"
                                       class="input-field pr-12">
                                <button type="button" @click="showCpw = !showCpw" class="absolute inset-y-0 right-3 flex items-center text-muted/70 hover:text-ink transition" aria-label="<?php echo e(__('Toggle password')); ?>">
                                    <svg x-show="!showCpw" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <svg x-show="showCpw" x-cloak viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 5l16 16"/><path d="M10.5 10.5a2.5 2.5 0 003 3"/><path d="M7.5 7.5C5 9 3 12 3 12s3.5 6 9 6c1.6 0 3.1-.3 4.4-.9"/><path d="M14.5 14.5c1.9-1.4 3.5-3.5 3.5-3.5s-1.3-2.3-3.5-3.8"/></svg>
                                </button>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-ink"><?php echo e(__('Status')); ?></label>
                            <input type="hidden" name="is_active" value="0">
                            <label class="mt-2 inline-flex items-center gap-3 text-sm text-muted cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="peer sr-only" <?php if(old('is_active', true)): echo 'checked'; endif; ?>>
                                <span class="relative inline-flex h-6 w-11 items-center rounded-full bg-border transition peer-checked:bg-brand [--switch-x:0.125rem] peer-checked:[--switch-x:1.25rem]">
                                    <span class="inline-block h-5 w-5 translate-x-[var(--switch-x)] rounded-full bg-white shadow transition"></span>
                                </span>
                                <span><?php echo e(__('Active')); ?></span>
                            </label>
                        </div>
                    </div>
                </div>

                
                <div class="panel p-6 lg:col-span-2" x-data="{ isAdmin: <?php echo e(old('is_admin') ? 'true' : 'false'); ?> }">
                    <p class="panel-heading"><?php echo e(__('Admin Access')); ?></p>
                    <p class="mt-1 text-sm text-muted"><?php echo e(__('Grant this user access to the admin panel.')); ?></p>
                    <div class="mt-4 grid gap-4 lg:grid-cols-2">
                        <div>
                            <input type="hidden" name="is_admin" value="0">
                            <label class="inline-flex items-center gap-3 text-sm text-muted cursor-pointer">
                                <input type="checkbox" name="is_admin" value="1" class="peer sr-only" x-model="isAdmin">
                                <span class="relative inline-flex h-6 w-11 items-center rounded-full bg-border transition peer-checked:bg-brand [--switch-x:0.125rem] peer-checked:[--switch-x:1.25rem]">
                                    <span class="inline-block h-5 w-5 translate-x-[var(--switch-x)] rounded-full bg-white shadow transition"></span>
                                </span>
                                <span><?php echo e(__('Enable Admin Access')); ?></span>
                            </label>
                        </div>
                        <div x-show="isAdmin" x-cloak>
                            <label for="admin_role" class="block text-sm font-medium text-ink"><?php echo e(__('Admin Role')); ?></label>
                            <select id="admin_role" name="admin_role" class="input-field mt-1">
                                <option value=""><?php echo e(__('Select role...')); ?></option>
                                <option value="super_admin" <?php if(old('admin_role') === 'super_admin'): echo 'selected'; endif; ?>><?php echo e(__('Super Admin')); ?></option>
                                <option value="admin" <?php if(old('admin_role') === 'admin'): echo 'selected'; endif; ?>><?php echo e(__('Admin')); ?></option>
                                <option value="moderator" <?php if(old('admin_role') === 'moderator'): echo 'selected'; endif; ?>><?php echo e(__('Moderator')); ?></option>
                                <option value="support" <?php if(old('admin_role') === 'support'): echo 'selected'; endif; ?>><?php echo e(__('Support')); ?></option>
                            </select>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['admin_role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="flex flex-wrap items-center justify-end gap-3">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand text-white text-sm font-semibold rounded-xl hover:bg-brand-strong shadow-lg shadow-soft transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    <?php echo e(__('Save User')); ?>

                </button>
                <button type="submit" name="save_and_new" value="1" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-muted border border-border rounded-xl hover:bg-surface-2 transition-colors">
                    <?php echo e(__('Save & New')); ?>

                </button>
            </div>
        </form>
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
<?php /**PATH /home/dahimail.com/public_html/resources/views/admin/users/create.blade.php ENDPATH**/ ?>