<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(isset(App\Setting::first()->company) ? App\Setting::first()->company : config('app.name')); ?></title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo e(asset('assets/1x/favicon.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">

    
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/pnotify.custom.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/default.css')); ?>">


    <style type="text/css">
        .login-box, .register-box{
            margin: 6% auto;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div id="app">

    <main class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    </div>
    <script src="<?php echo e(asset('assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('assets/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo e(asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/js/pnotify.custom.min.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
    });
     <?php if(session('flash_message')): ?>
      new PNotify({
              title: ' Success!',
              text: "<?php echo e(session('flash_message')); ?>",
              type: 'success',
              delay: 3000,
              nonblock: {
                nonblock: true
              }
          });
    <?php endif; ?>
    <?php if(session('flash_message_error')): ?>
      new PNotify({
              title: ' Warning!',
              text: "<?php echo e(session('flash_message_error')); ?>",
              type: 'warning',
              delay: 3000,
              nonblock: {
                nonblock: true
              }
          });
    <?php endif; ?>
  });
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/layouts/app.blade.php ENDPATH**/ ?>