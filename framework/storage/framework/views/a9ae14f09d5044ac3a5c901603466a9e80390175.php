<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.calibrations'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.calibrations'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.calibrations'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.calibrations'); ?>
                    <?php if(Auth::user()->hasDirectPermission('Create Calibrations')): ?>
					<a href="<?php echo e(route('calibration.create')); ?>" class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a>
					<?php endif; ?>
				</h4>
			</div>
			<div class="box-body">
				<div class="table-responsive overflow_x_unset">
					<table id="data_table" class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th> <?php echo app('translator')->get('equicare.calibrations'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.user'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.calibration_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.due_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.certificate-no'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.company'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.contact_person'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Calibrations') || Auth::user()->hasDirectPermission('Delete Calibrations')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php $count=0; ?>
							<?php if(isset($calibrations)): ?>
							<?php $__currentLoopData = $calibrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calibration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $count++; ?>
							<tr>
								<td><?php echo e($count); ?> </td>
								<td><?php echo e($calibration->equipment->name?? ''); ?> </td>
								<td><?php echo e(ucwords($calibration->user->name)?? ''); ?> </td>
								<td><?php echo e(date_change($calibration->date_of_calibration)); ?> </td>
								<td><?php echo e(date_change($calibration->due_date)); ?> </td>
								<td><?php echo e($calibration->certificate_no); ?> </td>
								<td><?php echo e($calibration->company); ?> </td>
								<td><?php echo e($calibration->contact_person); ?> </td>
								<?php if(Auth::user()->can('Edit Calibrations') || Auth::user()->can('Delete Calibrations')): ?>
								<td>
									<?php echo Form::open(['url' =>
									'admin/calibration/'.$calibration->id,'method'=>'DELETE','class'=>'form-inline']); ?>

									<?php if(Auth::user()->hasDirectPermission('Edit Calibrations')): ?>
									<a href="<?php echo e(route('calibration.edit',$calibration->id)); ?>" class="btn bg-purple btn-sm btn-flat" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit"></i> </a>
									<?php endif; ?> &nbsp;
									
									<?php if(isset($calibration->calibration_certificate)): ?>
									<a href="<?php echo e(asset($calibration->calibration_certificate)); ?>" target="_blank" download class="btn btn-success btn-sm btn-flat" title="<?php echo app('translator')->get('equicare.calibration_certificate'); ?>"><span class="fa fa-download" aria-hidden="true"></span></a>  &nbsp;
									<?php endif; ?>

									<input type="hidden" name="id" value="<?php echo e($calibration->id); ?>">
									<?php if(Auth::user()->hasDirectPermission('Delete Calibrations')): ?>
									<button class="btn btn-warning btn-sm btn-flat" type="submit"
										onclick="return confirm('<?php echo app('translator')->get('equicare.are_you_sure'); ?>')" title="<?php echo app('translator')->get('equicare.delete'); ?>"><span
											class="fa fa-trash-o" aria-hidden="true"></span></button>
									<?php endif; ?>
									<?php echo Form::close(); ?>


								</td>
								<?php endif; ?>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th> <?php echo app('translator')->get('equicare.calibrations'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.user'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.calibration_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.due_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.certificate-no'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.company'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.contact_person'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Calibrations') || Auth::user()->hasDirectPermission('Delete Calibrations')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
								<?php endif; ?>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - mains\framework\resources\views/calibrations/index.blade.php ENDPATH**/ ?>