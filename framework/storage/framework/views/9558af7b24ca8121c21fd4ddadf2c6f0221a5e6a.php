<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.equipment_history'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.equipment_history'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.equipment_history'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h2><?php echo app('translator')->get('equicare.equipment_history'); ?></h2>
         <div class="box box-primary">
            <div class="box-header with-border">
                  <h4 class="box-title" style="float:left;">
                     <b><?php echo app('translator')->get('equicare.name'); ?></b> : <?php echo e($equipment->name?? ''); ?>

                     &nbsp;&nbsp;&nbsp;&nbsp;
                  </h4>
                  <?php if(\Auth::user()): ?>
                  <h4 class="box-title" style="float:right;">
                     <a href="<?php echo e(route('equipments.edit',$equipment->id)); ?>" class="h4" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit purple-color"></i> <?php echo app('translator')->get('equicare.edit'); ?></a>   
                  </h4>
                  <?php endif; ?>
            </div>      

            <div class="box-body">
               <div class="row">
                  <?php echo $__env->make('equipments.equipment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
            </div>
         </div>
         
         <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
            
            <?php if($data->count() > 0): ?>
               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <!-- timeline time label -->
               <li class="time-label">
                     <span class="bg-red">
                        <?php echo e(date('Y-m-d',strtotime($d['created_at']))); ?>

                     </span>
               </li>
               <!-- /.timeline-label -->
               <!-- timeline item -->
               <li>
                  <?php if($d['type'] == 'Call'): ?>
                     <i class="fa fa-phone bg-green"></i>
                  <?php else: ?>
                     <i class="fa fa-balance-scale bg-green"></i>
                  <?php endif; ?>               

                  <div class="timeline-item">
                     <span class="time">
                        <i class="fa fa-clock-o"></i> <?php echo e(date('h:i A',strtotime($d['created_at']))); ?>

                     </span>
                     <span class="time">
                        <?php if($d['type'] == 'Call' && $d['call_type'] == 'breakdown'): ?>
                           <a href="<?php echo e(route('breakdown_maintenance.edit',$d['id'])); ?>" title="<?php echo app('translator')->get('equicare.edit'); ?>" class="h4"><i class="fa fa-edit purple-color" ></i> <?php echo app('translator')->get('equicare.edit'); ?> </a>
                        <?php elseif($d['type'] == 'Call' && $d['call_type'] == 'preventive'): ?>
                           <a href="<?php echo e(route('preventive_maintenance.edit',$d['id'])); ?>" title="<?php echo app('translator')->get('equicare.edit'); ?>" class="h4"><i class="fa fa-edit purple-color" ></i> <?php echo app('translator')->get('equicare.edit'); ?> </a>
                        <?php else: ?>
                           <a href="<?php echo e(route('calibration.edit',$d['id'])); ?>" title="<?php echo app('translator')->get('equicare.edit'); ?>" class="h4"><i class="fa fa-edit purple-color" ></i> <?php echo app('translator')->get('equicare.edit'); ?> </a>
                        <?php endif; ?>
                     </span>
                     <h3 class="timeline-header text-blue">
                        <b><?php echo e($d['type']); ?> 
                        <?php if($d['type'] == 'Call'): ?>
                         - <?php echo e($d['call_type']); ?>

                        <?php endif; ?>
                        </b>
                     </h3>

                     <div class="timeline-body">
                        <div class="row">
                           <?php if($d['type'] == 'Call'): ?>
                              <?php echo $__env->make('equipments.call', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                              <?php echo $__env->make('equipments.calibration', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </li>        
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <?php else: ?>
               <!-- timeline item -->
               <li>
                     <i class="fa fa-circle bg-green"></i>

                  <div class="timeline-item">                  
                     <h3 class="timeline-header text-blue">
                        No History Found for this Equipment.
                     </h3>

                     <div class="timeline-body">
                        
                     </div>
                  </div>
               </li>
            <?php endif; ?>
              <li>
                 
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
         </div>

      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/equipments/history.blade.php ENDPATH**/ ?>