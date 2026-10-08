<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name')); ?> — AI-Powered Email Automation</title>
    <meta name="description" content="All-in-one AI email platform. Unified inbox, smart replies, campaigns, CRM, pipeline, 5-channel messaging. Self-hosted. One-time $199. Replace $170/month in tools.">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo e(config('app.name')); ?> — AI Email Automation & CRM">
    <meta property="og:description" content="Replace HelpScout + Mailchimp + HubSpot + Intercom. Self-hosted. $199 one-time.">
    <meta property="og:image" content="<?php echo e(asset('images/og-image.png')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url('/')); ?>">

    <!-- Favicon -->
    <?php
        $__landFav = \App\Models\SystemSetting::get('favicon');
        $__pwaOn = \App\Models\SystemSetting::get('pwa_enabled', 'false') === 'true';
    ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($__landFav): ?>
    <link rel="icon" href="<?php echo e(asset('storage/' . $__landFav)); ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo e(asset('storage/' . $__landFav)); ?>">
    <?php else: ?>
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" sizes="any">
    <link rel="icon" href="<?php echo e(asset('favicon.svg')); ?>" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo e(asset('apple-touch-icon.png')); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($__pwaOn): ?>
    <link rel="manifest" href="<?php echo e(route('pwa.manifest')); ?>">
    <meta name="theme-color" content="<?php echo e(\App\Models\SystemSetting::get('pwa_theme_color', '#6366f1')); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <?php else: ?>
    <meta name="theme-color" content="#6C3CE7">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/landing.css', 'resources/js/landing-app.js']); ?>

    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="landing-body">
    <?php echo $__env->yieldContent('content'); ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($__pwaOn ?? false): ?>
    <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('<?php echo e(asset("sw.js")); ?>').catch(function() {});
    }
    </script>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</body>
</html>
<?php /**PATH /home/dahimail.com/public_html/resources/views/layouts/landing.blade.php ENDPATH**/ ?>