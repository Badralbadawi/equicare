<div class="col-md-3 mt-4">
   <b><?php echo app('translator')->get('equicare.equip_id'); ?></b> : <?php echo e($equipment->id); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.unique_id'); ?></b> : <?php echo e($equipment->unique_id); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.short_name'); ?></b> : <?php echo e($equipment->short_name); ?>

</div>
<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.user'); ?></b> : <?php echo e($equipment->user?ucfirst($equipment->user->name):'-'); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.company'); ?></b> : <?php echo e($equipment->company?? '-'); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.model'); ?></b> : <?php echo e($equipment->model ?? '-'); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.hospital'); ?></b> : <?php echo e($equipment->hospital?$equipment->hospital->name:'-'); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.serial_no'); ?></b> : <?php echo e($equipment->sr_no); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.department'); ?></b> : <?php echo e(($equipment->get_department->short_name)??"-"); ?> (<?php echo e(($equipment->get_department->name) ??'-'); ?>)
</div>
<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.purchase_date'); ?></b> : <?php echo e($equipment->date_of_purchase?? '-'); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.order_date'); ?></b> : <?php echo e($equipment->order_date?? '-'); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.installation_date'); ?></b> : <?php echo e($equipment->date_of_installation??'-'); ?>

</div>

<div class="col-md-3">
   <b><?php echo app('translator')->get('equicare.warranty_date'); ?></b> : <?php echo e($equipment->warranty_due_date??'-'); ?>

</div><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/equipments/equipment.blade.php ENDPATH**/ ?>