<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.user'); ?> : </b> <?php echo e(ucwords($d['user']['name']) ?? ''); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.call_handle'); ?> : </b> <?php echo e($d['call_handle']); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.working_status'); ?> : </b> <?php echo e($d['working_status']); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.report_number'); ?> : </b> <?php echo e($d['report_no']); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.next_due_date'); ?> : </b> <?php echo e($d['next_due_date']); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.call_registration_date_time'); ?> : </b> <?php echo e(date('Y-m-d h:i A',strtotime($d['call_register_date_time'])) ?? '-'); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.attended_by'); ?> : </b> <?php echo e($d['user_attended_fn']?ucwords($d['user_attended_fn']['name']):'-'); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.first_attended_on'); ?> : </b> <?php echo e($d['user_attended_fn']?date('Y-m-d h:i A',strtotime($d['call_attend_date_time'])):'-'); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.completed_on'); ?> : </b> <?php echo e(!is_null($d['call_complete_date_time'])?date('Y-m-d h:i A',strtotime($d['call_complete_date_time'])) : '-'); ?>

</div><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/equipments/call.blade.php ENDPATH**/ ?>