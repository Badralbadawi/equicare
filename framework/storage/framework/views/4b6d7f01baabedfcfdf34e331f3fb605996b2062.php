<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.reminder'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.preventive_maintenance_reminder'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.preventive_maintenance_reminder'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.preventive_maintenance_reminder'); ?>
				</h4>
			</div>
			<div class="box-body">
				<div class="table-responsive overflow_x_unset">
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th> <?php echo app('translator')->get('equicare.equipment_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.due_date_r'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.working_status'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.call_registration_date_time'); ?></th>
								<th> <?php echo app('translator')->get('equicare.added_by'); ?> </th>
							</tr>
						</thead>
						<tbody>
							<?php $count=0; ?>
							<?php if(isset($preventive_reminder) && $preventive_reminder->count() > 0): ?>
							<?php $__currentLoopData = $preventive_reminder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $count++;
							if($p_reminder->next_due_date){
							$now = time(); // or your date as well
							$your_date = strtotime($p_reminder->next_due_date);
							$datediff = $your_date - $now ;

							$remaining_days = round($datediff / (60 * 60 * 24))." days";
							}
							?>
							<tr>
								<td> <?php echo e($count); ?> </td>
								<td> <?php echo e($p_reminder->equipment->unique_id?? '-'); ?> </td>
								<td> <?php echo e($p_reminder->next_due_date?date_change($p_reminder->next_due_date) ." ($remaining_days)":'-'); ?></td>
								<td> <?php echo e($p_reminder->working_status?ucfirst($p_reminder->working_status): '-'); ?></td>
								<td> <?php echo e($p_reminder->call_register_date_time? date('Y-m-d h:i A', strtotime($p_reminder->call_register_date_time)) : '-'); ?></td>
								<td> <?php echo e($p_reminder->user_attended_fn?ucwords($p_reminder->user_attended_fn->name) : '-'); ?>

								</td>
							</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
									<tr class="text-center">
										<td colspan="7"><?php echo app('translator')->get('equicare.no_data_around'); ?></td>
									</tr>
								<?php endif; ?>
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th> <?php echo app('translator')->get('equicare.equipment_id'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.due_date_r'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.working_status'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.call_registration_date_time'); ?></th>
									<th> <?php echo app('translator')->get('equicare.added_by'); ?> </th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/reminder/preventive_maintenance_reminder.blade.php ENDPATH**/ ?>