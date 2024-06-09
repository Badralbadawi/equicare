<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.reminder'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.calibrations_reminder'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.calibrations_reminder'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.calibrations_reminder'); ?></h4>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th> <?php echo app('translator')->get('equicare.equipment_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.calibration_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.due_date_r'); ?></th>
								<th> <?php echo app('translator')->get('equicare.added_by'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.contact_person'); ?> </th>
							</tr>
						</thead>
						<tbody>
							<?php $count=0; ?>
							<?php if(isset($calibrations) && $calibrations->count()): ?>
							<?php $__currentLoopData = $calibrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calibration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $count++;
							if($calibration->due_date){
								$now = time(); // or your date as well
								$your_date = strtotime($calibration->due_date);
								$datediff = $your_date - $now ;

								$remaining_days = round($datediff / (60 * 60 * 24))." days";
							}
							?>
							<tr>
								<td><?php echo e($count); ?> </td>
								<td><?php echo e(ucwords($calibration->equipment->unique_id??'-')?? ''); ?> </td>
								<td><?php echo e(date_change($calibration->date_of_calibration)); ?> </td>
								<td><?php echo e($calibration->due_date?date_change($calibration->due_date) . " ($remaining_days)":'-'); ?> </td>
								<td><?php echo e(ucwords($calibration->user->name)?? ''); ?> </td>
								<td><?php echo e($calibration->contact_person); ?> </td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
							<tr class="text-center">
								<td colspan="6"><?php echo app('translator')->get('equicare.no_data_available'); ?></td>
							</tr>
							<?php endif; ?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th> <?php echo app('translator')->get('equicare.equipment_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.calibration_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.due_date_r'); ?></th>
								<th> <?php echo app('translator')->get('equicare.added_by'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.contact_person'); ?> </th>
							</tr>
						</tfoot>
					</table>
				</div>
				<?php if(isset($calibrations) && $calibrations->count()): ?>
				<div class="row text-center">
					<div class="col-md-12"><?php echo e($calibrations->render()); ?></div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/reminder/calibrations_reminder.blade.php ENDPATH**/ ?>