<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.home'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.dashboard'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.dashboard'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .red{ border-left: 5px solid red; }
</style>
<div class="row ">
   <div class="col-lg-3 col-xs-6 ">
      <!-- small box -->
      <?php $count=0;  $count = \App\Hospital::query()->Hospital()->count(); ?>
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo e($count); ?></h3>
                <p><?php echo app('translator')->get('equicare.hospitals'); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-hospital-o"></i>
            </div>
            <a href="<?php echo e(url('admin/hospitals')); ?>" class="small-box-footer"><?php echo app('translator')->get('equicare.more_info'); ?>
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <?php $count=0; $count = \App\Equipment::query()->Hospital()->count(); ?>
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo e($count); ?></h3>
                <p><?php echo app('translator')->get('equicare.equipments'); ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-wheelchair"></i>
            </div>
            <a href="<?php echo e(url('admin/equipments')); ?>" class="small-box-footer"><?php echo app('translator')->get('equicare.more_info'); ?>
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <?php $count=0; $count =\App\CallEntry::where('call_type','breakdown')->Hospital()->count(); ?>
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($count); ?></h3>
                <p><?php echo app('translator')->get('equicare.breakdown_maintenance'); ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-wrench"></i>
            </div>
            <a href="<?php echo e(url('admin/call/breakdown_maintenance')); ?>" class="small-box-footer"><?php echo app('translator')->get('equicare.more_info'); ?>
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <?php $count=0; $count =\App\CallEntry::where('call_type','preventive')->Hospital()->count(); ?>
        <div class="small-box bg-teal">
            <div class="inner">
                <h3><?php echo e($count); ?></h3>
                <p><?php echo app('translator')->get('equicare.preventive_maintenance'); ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-life-buoy"></i>
            </div>
            <a href="<?php echo e(url('admin/call/preventive_maintenance')); ?>" class="small-box-footer"><?php echo app('translator')->get('equicare.more_info'); ?>
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
     <div class="col-lg-3 col-xs-6">
        <?php $count=0; $count = \App\Calibration::query()->Hospital()->count(); ?>
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo e($count); ?></h3>
                <p><?php echo app('translator')->get('equicare.calibrations'); ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-balance-scale"></i>
            </div>
            <a href="<?php echo e(url('admin/calibration')); ?>" class="small-box-footer"><?php echo app('translator')->get('equicare.more_info'); ?>
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <?php $count=0; $count = \App\Department::all()->count(); ?>
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?php echo e($count); ?></h3>
                <p><?php echo app('translator')->get('equicare.departments'); ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
            <a href="<?php echo e(url('admin/departments')); ?>" class="small-box-footer"><?php echo app('translator')->get('equicare.more_info'); ?>
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <?php ($date = date('Y-m-d',strtotime('+15 days'))); ?>
        <?php ($preventive_reminder_count = \App\CallEntry::where('call_type','preventive')->where('next_due_date','<=',$date)->Hospital()->count()); ?>
        <div class="small-box bg-purple <?php echo e($preventive_reminder_count > 0 ? 'red':''); ?>">
            <div class="inner">
                <h3><?php echo e($preventive_reminder_count); ?></h3>
                <p><?php echo app('translator')->get('equicare.preventive_reminder'); ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="<?php echo e(url('admin/reminder/preventive_maintenance')); ?>" class="small-box-footer"><?php echo app('translator')->get('equicare.more_info'); ?>
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
        
    </div>
    <div class="col-lg-3 col-xs-6">
        <?php ($calibrations_reminder_count = \App\Calibration::where('due_date','<=',$date)->Hospital()->count()); ?>
        <div class="small-box bg-gray-active <?php echo e($calibrations_reminder_count > 0 ? 'red':''); ?>">
            <div class="inner">
                
                <h3><?php echo e($calibrations_reminder_count); ?></h3>
                <p><?php echo app('translator')->get('equicare.calibrations_reminder'); ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-clock-o"></i>
            </div>
            <a href="<?php echo e(url('admin/reminder/calibration')); ?>" class="small-box-footer"><?php echo app('translator')->get('equicare.more_info'); ?>
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title"><?php echo app('translator')->get('equicare.call_entries_chart'); ?></h4>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12" id="chart-container">


                <canvas id="myChart">
                    <?php echo app('translator')->get('equicare.call_entries_chart_render'); ?>
                </canvas>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/bower_components/chart.js/Chart.bundle.min.js')); ?>"></script>
    <script type="text/javascript">
        $(function(){

            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($total_days_array); ?>,
                    datasets: [
                    {
                        label: '<?php echo e(__("equicare.breakdown_maintenance")); ?>',
                        data: <?php echo json_encode($breakdown); ?>,
                        fill:false,
                        lineTension: 0.1,
                        borderColor: 'rgba(0,192,239,0.9)',
                    },
                    {
                        label: '<?php echo e(__("equicare.preventive_maintenance")); ?>',
                        data: <?php echo json_encode($preventive); ?>,
                        fill:false,
                        lineTension: 0.1,
                        borderColor:'rgba(57,204,204,0.7)'

                    },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                stepSize:1,
                                suggestedMin: 0,
                                suggestedMax: 3
                            }
                        }],
                    }
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
  <style type="text/css">
    .bg-gray-active:hover{
        color:#000;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare\framework\resources\views/home.blade.php ENDPATH**/ ?>