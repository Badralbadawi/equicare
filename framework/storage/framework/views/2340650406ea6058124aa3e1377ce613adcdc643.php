<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo e(isset(App\Setting::first()->company) ? App\Setting::first()->company : config('app.name')); ?> <?php echo $__env->yieldContent('title'); ?></title>
  <link rel="icon" type="img/png" sizes="32x32" href="<?php echo e(asset('assets/1x/favicon.png')); ?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/bower_components/select2/dist/css/select2.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/skins/_all-skins.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')); ?>">

  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
  
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/pnotify.custom.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
  <!-- bootstrap wysihtml5 - text editor -->

<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/demo.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('assets/css/default.css')); ?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php echo $__env->yieldContent('styles'); ?>
  <style type="text/css">
    .logo-lg img{
          height: 42px;
           <?php ($settings = App\Setting::first()); ?>
      <?php if($settings != null): ?>
    <?php endif; ?>
/*    width: 184px;*/
    padding-top: 6px;

    }
  </style>
</head>
<body class="hold-transition skin-black-light sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('/')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <?php ($settings = App\Setting::first()); ?>
      <?php if($settings != null): ?>
        <span class="logo-mini">
          <b>
            <?php if($settings->company != null): ?>
              <?php echo e(strtoupper(substr($settings->company, 0, 1))); ?>

            <?php else: ?>
              E
            <?php endif; ?>
          </b>
        </span>
        <span class="logo-lg">
          <?php if($settings->logo != null): ?>
          <img class="" alt="Medical Logo" src="<?php echo e(asset('uploads/'.$settings->logo)); ?>" ></img>
          <?php elseif($settings->company != null): ?>
          <span class="logo-lg"><b><?php echo e($settings->company); ?></b></span>
          <?php else: ?>
            <span class="logo-lg"><img src="<?php echo e(asset('assets/1x/logo.png')); ?>"></span>
          <?php endif; ?>
          </span>
      <?php else: ?>
        <span class="logo-lg"><img src="<?php echo e(asset('assets/1x/logo.png')); ?>"></span>
      <?php endif; ?>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"><?php echo app('translator')->get('equicare.toggle_navigation'); ?></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav pull-right">
           <li class="nav-item dropdown">
            <a href="#" class=" nav-link familyfont" data-toggle="dropdown" area-expanded="false">
              <i class="fa fa-user"></i>
              <span class="hidden-xs">&nbsp;&nbsp;<?php echo e(ucfirst(Auth::user()->name) ?? 'No User'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="<?php echo e($page=='Change Password'?'active':''); ?>">
                <a class="dropdown-item" href="<?php echo e(route('change-password')); ?>">
                  <i class="fa fa-key"></i>&nbsp;
                  <?php echo app('translator')->get('equicare.change_password'); ?>
                </a>
              </li>
              <li>
              <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i class="fa fa-sign-out"></i>&nbsp;
               <?php echo app('translator')->get('equicare.logout'); ?>

              </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="none-display;">
              <?php echo e(csrf_field()); ?>

              </form>
            </li>
          </ul>
        </li>
      </ul>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="<?php echo e($page=='/home'?'active':''); ?>">
          <a href="<?php echo e(url('/admin/dashboard')); ?>">
            <i class="fa fa-dashboard"></i> <span><?php echo app('translator')->get('equicare.dashboard'); ?></span>
          </a>
        </li>

        <li class="<?php echo e($page=='hospitals'?'active':''); ?>">
          
            <a href="<?php echo e(url('/admin/Governorate')); ?>">
            <i class="fa fa-wrench"></i> <span><?php echo app('translator')->get('equicare.Governorate'); ?></span>
          </a>
        </li>

        <li >
          
            <a href="<?php echo e(url('/admin/Directorates')); ?>">
            <i class="fa fa-wrench"></i> <span><?php echo app('translator')->get('equicare.Directorates'); ?></span>
          </a>
        </li>




        <li class="<?php echo e($page=='hospitals'?'active':''); ?>">
          <a href="<?php echo e(url('/admin/hospitals')); ?>">
            <i class="fa fa-hospital-o"></i> <span><?php echo app('translator')->get('equicare.hospital'); ?></span>
          </a>
        </li>

        <li class="<?php echo e($page=='departments'?'active':''); ?>">
          <a href="<?php echo e(url('/admin/departments')); ?>">
            <i class="fa fa-wrench"></i> <span><?php echo app('translator')->get('equicare.departments'); ?></span>
          </a>
        </li>
        <li class="<?php echo e($page=='equipments'?'active':''); ?>">
          <a href="<?php echo e(url('/admin/equipments')); ?>">
            <i class="fa fa-stethoscope"></i> <span><?php echo app('translator')->get('equicare.equipments'); ?></span>
          </a>
        </li>


        <li class="<?php echo e($page=='manage_Maintenance'?'active':''); ?>">
          <a href="<?php echo e(url('admin/call/breakdown_maintenance')); ?>">
          <i class="fa fa-wrench"></i> <span><?php echo app('translator')->get('equicare.manage_Maintenance'); ?></span>
          </a>
        </li>

        


        <li class="<?php echo e($page=='manage_Calibration'?'active':''); ?>">
          <a href="<?php echo e(url('admin/calibration')); ?>">
          <i class="fa fa-balance-scale"></i> <span><?php echo app('translator')->get('equicare.manage_Calibration'); ?></span>
          </a>
        </li>

        <li class="<?php echo e($page=='manage_Training'?'active':''); ?>">
          <a href="<?php echo e(url('/admin/Training')); ?>">
            <i class="fa fa-user"></i> <span><?php echo app('translator')->get('equicare.manage_Training'); ?></span>
          </a>
        </li>
        <li class="<?php echo e($page=='manage_Equipment'?'active':''); ?>">
          <a href="<?php echo e(url('/admin/equipments')); ?>">
            <i class="fa fa-stethoscope"></i> <span><?php echo app('translator')->get('equicare.manage_Equipment'); ?></span>
          </a>
        </li>


        
        <?php if($page == "breakdown_maintenance" || $page == "preventive_maintenance"): ?>
            <?php ($class="treeview menu-open"); ?>
            <?php ($active = "active"); ?>
            <?php ($menu="style=display:block;"); ?>
            <?php else: ?>
            <?php ($class="treeview"); ?>
            <?php ($active = ""); ?>
            <?php ($menu=""); ?>
            <?php endif; ?>

         <li class="<?php echo e($class); ?> <?php echo e($active); ?>">
          <a href="#" class="">
            <i class="fa fa-gear"></i> <span><?php echo app('translator')->get('equicare.Service Request'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?php echo e($menu); ?>>
            <li class="<?php echo e($page=='breakdown_maintenance'?'active':''); ?>">
              <a href="<?php echo e(url('admin/call/breakdown_maintenance')); ?>">
                <i class="fa fa-minus-circle"></i> <?php echo app('translator')->get('equicare.breakdown_maintenance'); ?>
              </a>
            </li>
            <li class="<?php echo e($page=='preventive_maintenance'?'active':''); ?>">
              <a href="<?php echo e(url('admin/call/preventive_maintenance')); ?>">
                <i class="fa fa-barcode"></i> <?php echo app('translator')->get('equicare.preventive_maintenance'); ?>
              </a>
            </li>
            <li class="<?php echo e($page=='preventive_maintenance'?'active':''); ?>">
              <a href="<?php echo e(url('admin/call/preventive_maintenance')); ?>">
                <i class="fa fa-barcode"></i> <?php echo app('translator')->get('equicare.Request equipment'); ?>
              </a>
            </li>

            <li class="<?php echo e($page=='preventive_maintenance'?'active':''); ?>">
              <a href="<?php echo e(url('admin/call/preventive_maintenance')); ?>">
                <i class="fa fa-barcode"></i> <?php echo app('translator')->get('equicare.training request'); ?>
              </a>
            </li>

            <li class="<?php echo e($page=='calibrations'?'active':''); ?>">
              <a href="<?php echo e(url('admin/calibration')); ?>">
                <i class="fa fa-balance-scale"></i> <span><?php echo app('translator')->get('equicare.calibrations'); ?></span>
              </a>
            </li>
    

          </ul>
        </li>


        <li class="<?php echo e($page=='maintenance_cost'?'active':''); ?>">
          <a href="<?php echo e(url('admin/maintenance_cost')); ?>">
            <i class="fa fa-usd"></i> <span><?php echo app('translator')->get('equicare.maintenance_cost'); ?></span>
          </a>
        </li>
        <?php if($page == "reports/time_indicator" || $page == "reports/equipments"): ?>
            <?php ($class="treeview menu-open"); ?>
            <?php ($active = "active"); ?>
            <?php ($menu="style=display:block;"); ?>
            <?php else: ?>
            <?php ($class="treeview"); ?>
            <?php ($active = ""); ?>
            <?php ($menu=""); ?>
            <?php endif; ?>
        <li class="<?php echo e($class); ?> <?php echo e($active); ?>">
          <a href="#" class="">
            <i class="fa fa-th"></i> <span><?php echo app('translator')->get('equicare.reports'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?php echo e($menu); ?>>
            <li class="<?php echo e($page=='reports/time_indicator'?'active':''); ?>">
              <a href="<?php echo e(url('admin/reports/time_indicator')); ?>">
                <i class="fa fa-clock-o"></i> <span><?php echo app('translator')->get('equicare.time_indicator'); ?></span>
              </a>
            </li>
            <li class="<?php echo e($page=='reports/equipments'?'active':''); ?>">
              <a href="<?php echo e(url('admin/reports/equipments')); ?>">
                <i class="fa fa-wrench"></i> <span><?php echo app('translator')->get('equicare.equipment_report'); ?></span>
              </a>
            </li>
          </ul>
        </li>
        <?php ($date = date('Y-m-d',strtotime('+15 days'))); ?>
        <?php ($preventive_reminder_count = \App\CallEntry::where('call_type','preventive')->where('next_due_date','<=',$date)->count()); ?>
        <?php ($calibrations_reminder_count = \App\Calibration::where('due_date','<=',$date)->count()); ?>
        <?php if($page == "preventive_maintenance_reminder" || $page == "calibrations_reminder"): ?>
            <?php ($class="treeview menu-open"); ?>
            <?php ($active = "active"); ?>
            <?php ($menu="style=display:block;"); ?>
            <?php else: ?>
            <?php ($class="treeview"); ?>
            <?php ($active = ""); ?>
            <?php ($menu=""); ?>
            <?php endif; ?>
        <li class="<?php echo e($class); ?> <?php echo e($active); ?>">
          <a href="#" class="">
            <i class="fa fa-clock-o"></i> <span><?php echo app('translator')->get('equicare.reminder'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?php echo e($menu); ?>>
            <li class="<?php echo e($page=='preventive_maintenance_reminder'?'active':''); ?>">
              <a href="<?php echo e(url('admin/reminder/preventive_maintenance')); ?>">
                <i class="fa fa-barcode"></i> <span><?php echo app('translator')->get('equicare.preventive_reminder'); ?></span>
                <?php if($preventive_reminder_count > 0): ?>
                <span class="badge label-danger"><?php echo e($preventive_reminder_count); ?></span>
                <?php endif; ?>
              </a>
            </li>
            <li class="<?php echo e($page=='calibrations_reminder'?'active':''); ?>">
              <a href="<?php echo e(url('admin/reminder/calibration')); ?>">
                <i class="fa fa-balance-scale"></i> <span><?php echo app('translator')->get('equicare.calibrations_reminder'); ?></span>
                <?php if($calibrations_reminder_count > 0): ?>
                <span class="badge label-danger"><?php echo e($calibrations_reminder_count); ?></span>
                <?php endif; ?>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php echo e($page=='calibrations_sticker'?'active':''); ?>">
          <a href="<?php echo e(url('admin/calibrations_sticker')); ?>">
            <i class="fa fa-tags"></i> <span><?php echo app('translator')->get('equicare.calibrations_sticker'); ?></span>
          </a>
        </li>

        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
        <li class="<?php echo e($page=='settings'?'active':''); ?>">
          <a href="<?php echo e(url('admin/settings')); ?>">
            <i class="fa fa-cog"></i> <span><?php echo app('translator')->get('equicare.settings'); ?></span>
          </a>
        </li>

        <?php if($page == "users" || $page == "roles" || $page == "permissions"): ?>
            <?php ($class="treeview menu-open"); ?>
            <?php ($active = "active"); ?>
            <?php ($menu="style=display:block;"); ?>
            <?php else: ?>
            <?php ($class="treeview"); ?>
            <?php ($active = ""); ?>
            <?php ($menu=""); ?>
            <?php endif; ?>

         <li class="<?php echo e($class); ?> <?php echo e($active); ?>">
          <a href="#" class="">
            <i class="fa fa-users"></i> <span><?php echo app('translator')->get('equicare.user_permission'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" <?php echo e($menu); ?>>
            <li class="<?php echo e($page=='users'?'active':''); ?>">
              <a href="<?php echo e(url('admin/permissions')); ?>">
                <i class="fa fa-user"></i> <?php echo app('translator')->get('equicare.user_permission'); ?>
              </a>
            </li>
            <li class="<?php echo e($page=='users'?'active':''); ?>">
              <a href="<?php echo e(url('admin/users')); ?>">
                <i class="fa fa-user"></i> <?php echo app('translator')->get('equicare.users'); ?>
              </a>
            </li>
            <li class="<?php echo e($page=='roles'?'active':''); ?>">
              <a href="<?php echo e(url('admin/roles')); ?>">
                <i class="fa fa-unlock-alt"></i> <?php echo app('translator')->get('equicare.roles'); ?>
              </a>
            </li>
          </ul>
        </li>
        <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0">

      <?php if(url()->current() == url('/')): ?>
        <h1>
          <?php echo app('translator')->get('equicare.dashboard'); ?>
        </h1>
      <?php else: ?>
        <h1><?php echo $__env->yieldContent('body-title'); ?></h1>
      <?php endif; ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('equicare.home'); ?></a></li>
        <?php echo $__env->yieldContent('breadcrumb'); ?>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $__env->yieldContent('content'); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.1
    </div>
    <strong><?php echo app('translator')->get('equicare.copyright'); ?> &copy; 2019-<?php echo e(date('Y')); ?> <a href="https://hyvikk.com" target="_blank">Hyvikk</a>.</strong> <?php echo app('translator')->get('equicare.all_rights_reserved'); ?>.
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo e(asset('assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('assets/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

<!-- daterangepicker -->
<script src="<?php echo e(asset('assets/bower_components/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('assets/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('assets/dist/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/bower_components/select2/dist/js/select2.full.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('assets/js/pnotify.custom.min.js')); ?>" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('assets/dist/js/pages/dashboard.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_minimal-blue',
      // increaseArea: '20%' /* optional */
    });
  });
</script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
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
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/layouts/admin.blade.php ENDPATH**/ ?>