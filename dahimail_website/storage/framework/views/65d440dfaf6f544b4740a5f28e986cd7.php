<?php $__env->startSection('title', __('Installing')); ?>
<?php $__env->startSection('step-name', __('Install')); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-5">
    <div class="space-y-1">
        <h1 class="text-2xl font-bold tracking-tight"><?php echo e(__('Installing')); ?> <span class="text-primary italic"><?php echo e(config('app.name')); ?>.</span></h1>
        <p class="text-gray-500 text-xs font-medium"><?php echo e(__('Please wait while we set up your application. Do not close this page.')); ?></p>
    </div>

    <div class="space-y-2" id="steps">
        <div class="step flex items-center gap-3 p-3 rounded-xl border border-[#2d3039] bg-[#15171e]" data-step="1">
            <div class="icon w-8 h-8 rounded-lg bg-[#1a1d27] flex items-center justify-center shrink-0"><span class="text-xs font-bold text-gray-400">1</span></div>
            <div class="flex-1"><p class="text-sm font-medium text-gray-700"><?php echo e(__('Writing environment file')); ?></p><p class="sub text-[10px] text-gray-400"><?php echo e(__('Waiting...')); ?></p></div>
        </div>
        <div class="step flex items-center gap-3 p-3 rounded-xl border border-[#2d3039] bg-[#15171e]" data-step="2">
            <div class="icon w-8 h-8 rounded-lg bg-[#1a1d27] flex items-center justify-center shrink-0"><span class="text-xs font-bold text-gray-400">2</span></div>
            <div class="flex-1"><p class="text-sm font-medium text-gray-700"><?php echo e(__('Running database migrations')); ?></p><p class="sub text-[10px] text-gray-400"><?php echo e(__('Waiting...')); ?></p></div>
        </div>
        <div class="step flex items-center gap-3 p-3 rounded-xl border border-[#2d3039] bg-[#15171e]" data-step="3">
            <div class="icon w-8 h-8 rounded-lg bg-[#1a1d27] flex items-center justify-center shrink-0"><span class="text-xs font-bold text-gray-400">3</span></div>
            <div class="flex-1"><p class="text-sm font-medium text-gray-700"><?php echo e(__('Seeding initial data')); ?></p><p class="sub text-[10px] text-gray-400"><?php echo e(__('Waiting...')); ?></p></div>
        </div>
        <div class="step flex items-center gap-3 p-3 rounded-xl border border-[#2d3039] bg-[#15171e]" data-step="4">
            <div class="icon w-8 h-8 rounded-lg bg-[#1a1d27] flex items-center justify-center shrink-0"><span class="text-xs font-bold text-gray-400">4</span></div>
            <div class="flex-1"><p class="text-sm font-medium text-gray-700"><?php echo e(__('Creating admin account')); ?></p><p class="sub text-[10px] text-gray-400"><?php echo e(__('Waiting...')); ?></p></div>
        </div>
        <div class="step flex items-center gap-3 p-3 rounded-xl border border-[#2d3039] bg-[#15171e]" data-step="5">
            <div class="icon w-8 h-8 rounded-lg bg-[#1a1d27] flex items-center justify-center shrink-0"><span class="text-xs font-bold text-gray-400">5</span></div>
            <div class="flex-1"><p class="text-sm font-medium text-gray-700"><?php echo e(__('Setting file permissions')); ?></p><p class="sub text-[10px] text-gray-400"><?php echo e(__('Waiting...')); ?></p></div>
        </div>
        <div class="step flex items-center gap-3 p-3 rounded-xl border border-[#2d3039] bg-[#15171e]" data-step="6">
            <div class="icon w-8 h-8 rounded-lg bg-[#1a1d27] flex items-center justify-center shrink-0"><span class="text-xs font-bold text-gray-400">6</span></div>
            <div class="flex-1"><p class="text-sm font-medium text-gray-700"><?php echo e(__('Finalizing installation')); ?></p><p class="sub text-[10px] text-gray-400"><?php echo e(__('Waiting...')); ?></p></div>
        </div>
    </div>

    <div>
        <div class="w-full bg-gray-200 rounded-full h-1.5">
            <div id="progress-bar" class="bg-primary h-1.5 rounded-full transition-all duration-500" style="width:0%"></div>
        </div>
        <div id="progress-text" class="text-[10px] text-gray-400 mt-2 text-center font-bold uppercase tracking-widest"><?php echo e(__('Starting...')); ?></div>
    </div>

    <div id="retry-wrap" class="hidden">
        <button onclick="retryFromFailed()" class="w-full h-11 rounded-xl bg-primary hover:bg-primary/90 text-sm font-bold shadow-lg shadow-primary/20 transition-all text-white">
            <?php echo e(__('Retry Failed Step')); ?>

        </button>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
var failedAt = 0;
var totalSteps = 6;
var csrf = document.querySelector('meta[name=csrf-token]').content;

function markStep(i, state, msg) {
    var el = document.querySelector('.step[data-step="' + i + '"]');
    var icon = el.querySelector('.icon');
    var sub = el.querySelector('.sub');

    if (state === 'running') {
        el.className = 'step flex items-center gap-3 p-3 rounded-xl border border-indigo-300 bg-indigo-50';
        icon.className = 'icon w-8 h-8 rounded-lg bg-primary flex items-center justify-center shrink-0 shadow-lg shadow-primary/30';
        icon.innerHTML = '<svg class="w-4 h-4 text-white animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>';
        sub.textContent = '<?php echo e(__("Running...")); ?>';
        sub.className = 'sub text-[10px] text-primary font-semibold';
    } else if (state === 'done') {
        el.className = 'step flex items-center gap-3 p-3 rounded-xl border border-emerald-300 bg-emerald-50';
        icon.className = 'icon w-8 h-8 rounded-lg bg-emerald-500 flex items-center justify-center shrink-0';
        icon.innerHTML = '<svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>';
        sub.textContent = '<?php echo e(__("Done")); ?>';
        sub.className = 'sub text-[10px] text-emerald-600 font-semibold';
    } else if (state === 'failed') {
        el.className = 'step flex items-center gap-3 p-3 rounded-xl border border-red-300 bg-red-50';
        icon.className = 'icon w-8 h-8 rounded-lg bg-red-500 flex items-center justify-center shrink-0';
        icon.innerHTML = '<svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>';
        sub.textContent = msg || '<?php echo e(__("Failed")); ?>';
        sub.className = 'sub text-[10px] text-red-600 font-semibold';
    }
}

async function runSteps(startFrom) {
    document.getElementById('retry-wrap').classList.add('hidden');
    failedAt = 0;

    for (var i = startFrom; i <= totalSteps; i++) {
        markStep(i, 'running');

        try {
            var formData = new FormData();
            formData.append('step', i);
            var resp = await fetch('<?php echo e(route("install.execute")); ?>', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' },
                credentials: 'same-origin',
                body: formData
            });
            var data = await resp.json();

            if (data.success) {
                markStep(i, 'done');
            } else {
                throw new Error(data.message || 'Step failed');
            }
        } catch (e) {
            markStep(i, 'failed', e.message);
            failedAt = i;
            document.getElementById('progress-text').textContent = '<?php echo e(__("Failed at step")); ?> ' + i;
            document.getElementById('retry-wrap').classList.remove('hidden');
            return;
        }

        document.getElementById('progress-bar').style.width = Math.round((i / totalSteps) * 100) + '%';
        document.getElementById('progress-text').textContent = '<?php echo e(__("Step")); ?> ' + i + ' <?php echo e(__("of")); ?> ' + totalSteps + ' <?php echo e(__("complete")); ?>';
    }

    document.getElementById('progress-text').textContent = '<?php echo e(__("Installation complete! Redirecting...")); ?>';
    setTimeout(function() { window.location.href = '<?php echo e(route("install.complete")); ?>'; }, 1500);
}

function retryFromFailed() {
    if (failedAt > 0) {
        runSteps(failedAt);
    }
}

// Start
runSteps(1);
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/dahimail.com/public_html/resources/views/install/progress.blade.php ENDPATH**/ ?>