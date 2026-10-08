<?php $__env->startSection('content'); ?>
<h2 class="text-xl font-bold text-gray-900 mb-1"><?php echo e(__('Database Configuration')); ?></h2>
<p class="text-sm text-gray-500 mb-6"><?php echo e(__('Enter your MySQL database credentials.')); ?></p>

<form method="POST" action="<?php echo e(route('install.database.save')); ?>" id="db-form">
    <?php echo csrf_field(); ?>
    <div class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Host')); ?></label>
                <input type="text" name="host" value="<?php echo e(session('db.host', '127.0.0.1')); ?>" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Port')); ?></label>
                <input type="number" name="port" value="<?php echo e(session('db.port', '3306')); ?>" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Database Name')); ?></label>
            <input type="text" name="database" value="<?php echo e(session('db.database', '')); ?>" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="mailtrixy">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Username')); ?></label>
                <input type="text" name="username" value="<?php echo e(session('db.username', 'root')); ?>" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1"><?php echo e(__('Password')); ?></label>
                <input type="password" name="password" value="<?php echo e(session('db.password', '')); ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
        </div>
    </div>

    <div id="test-result" class="mt-4 hidden p-3 rounded-xl text-sm"></div>

    <div class="mt-6 flex items-center justify-between">
        <a href="<?php echo e(route('install.requirements')); ?>" class="text-sm text-gray-500 hover:text-gray-700">&larr; <?php echo e(__('Back')); ?></a>
        <div class="flex gap-3">
            <button type="button" onclick="testConnection()" class="px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-xl hover:bg-gray-50" id="test-btn"><?php echo e(__('Test Connection')); ?></button>
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-700"><?php echo e(__('Save & Continue')); ?></button>
        </div>
    </div>
</form>

<?php $__env->startPush('scripts'); ?>
<script>
function testConnection() {
    const btn = document.getElementById('test-btn');
    const result = document.getElementById('test-result');
    const form = document.getElementById('db-form');
    const data = new FormData(form);

    btn.textContent = '<?php echo e(__("Testing...")); ?>';
    btn.disabled = true;
    result.classList.add('hidden');

    fetch('<?php echo e(route("install.database.test")); ?>', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content, 'Accept': 'application/json' },
        body: data
    })
    .then(r => r.json())
    .then(d => {
        result.classList.remove('hidden');
        if (d.success) {
            result.className = 'mt-4 p-3 rounded-xl text-sm bg-green-50 text-green-700 border border-green-200';
            result.textContent = '<?php echo e(__("Connection successful!")); ?>';
        } else {
            result.className = 'mt-4 p-3 rounded-xl text-sm bg-red-50 text-red-700 border border-red-200';
            result.textContent = '<?php echo e(__("Connection failed:")); ?> ' + (d.message || '<?php echo e(__("Unknown error")); ?>');
        }
    })
    .catch(() => {
        result.classList.remove('hidden');
        result.className = 'mt-4 p-3 rounded-xl text-sm bg-red-50 text-red-700 border border-red-200';
        result.textContent = '<?php echo e(__("Connection test failed.")); ?>';
    })
    .finally(() => { btn.textContent = '<?php echo e(__("Test Connection")); ?>'; btn.disabled = false; });
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/dahimail.com/public_html/resources/views/install/database.blade.php ENDPATH**/ ?>