<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(trans('installer_messages.title')); ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/1x/favicon.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/default.css')); ?>"> 

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="<?php echo e(asset('assets/installer/css/style.min.css')); ?>" rel="stylesheet"/>
    <?php echo $__env->yieldContent('style'); ?>

</head>
<body>
<div class="master">
    <div class="box widthbox">
        <div class="header">
            <img src="<?php echo e(asset('/assets/images/logo_install.png')); ?>" height="55px" alt="">
            <h1 class="header__title"><?php echo $__env->yieldContent('title'); ?></h1>
        </div>

        <div class="main">
            <?php echo $__env->yieldContent('container'); ?>
        </div>
    </div>
</div>
</body>
<?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /**PATH C:\xampp\htdocs\equicare\framework\resources\views/layouts/master.blade.php ENDPATH**/ ?>