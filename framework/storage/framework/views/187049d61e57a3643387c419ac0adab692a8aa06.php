<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.user'); ?> : </b> <?php echo e(ucwords($d['user']['name']) ?? ''); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.calibration_date'); ?> : </b> <?php echo e($d['date_of_calibration']); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.due_date'); ?> : </b> <?php echo e($d['due_date']); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.certificate-no'); ?> : </b> <?php echo e($d['certificate_no']); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.company'); ?> : </b> <?php echo e($d['company']); ?>

</div>

<div class="col-md-4">
   <b><?php echo app('translator')->get('equicare.contact_person'); ?> : </b> <?php echo e($d['contact_person']); ?>

</div><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/equipments/calibration.blade.php ENDPATH**/ ?>