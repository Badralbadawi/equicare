<?php $__env->startSection('body-title'); ?>
	<?php echo app('translator')->get('equicare.hospitals'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.hospitals'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.hospitals'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.manage_hospitals'); ?>
						<?php if(
							Auth::user()->hasDirectPermission('Create Hospitals')): ?>
							<a href="<?php echo e(route('hospitals.create')); ?>" class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a></h4>
						<?php endif; ?>

				</div>

				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
						<thead class="thead-inverse">
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.name'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.email'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.user'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.slug'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.phone'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.mobile'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Hospitals') || Auth::user()->hasDirectPermission('Delete Hospitals')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?></th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($hospitals)): ?>
							<?php
								$count = 0;
							?>
							<?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$count++;
							?>
							<tr>
							<td> <?php echo e($count); ?> </td>
							<td> <?php echo e(ucfirst($hospital->name)); ?> </td>
							<td> <?php echo e($hospital->email ?? '-'); ?></td>
							<td> <?php echo e($hospital->user ? ucfirst($hospital->user->name) : '-'); ?></td>
							<td> <?php echo e($hospital->slug ?? '-'); ?></td>
							<td> <?php echo e($hospital->phone_no ?? '-'); ?> </td>
							<td> <?php echo e($hospital->mobile_no ?? '-'); ?> </td>
							<?php if(
							Auth::user()->hasDirectPermission('Edit Hospitals') || Auth::user()->hasDirectPermission('Delete Hospitals')): ?>
                        	<td class="text-nowrap">
								<?php echo Form::open(['url' => 'admin/hospitals/'.$hospital->id,'method'=>'DELETE','class'=>'form-inline']); ?>

									
									<?php if(Auth::user()->hasDirectPermission('Edit Hospitals')): ?>
									<a href="<?php echo e(route('hospitals.edit',$hospital->id)); ?>" class="btn bg-purple btn-sm btn-flat" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit"></i>  </a>
									
									&nbsp;
		                            <?php endif; ?>
		                            <input type="hidden" name="id" value="<?php echo e($hospital->id); ?>">
									<?php if(Auth::user()->hasDirectPermission('Delete Hospitals')): ?>

		                            
		                            <button class="btn btn-warning btn-sm btn-flat" type="submit" onclick="return confirm('<?php echo app('translator')->get('equicare.are_you_sure'); ?>')" title="<?php echo app('translator')->get('equicare.delete'); ?>"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
		                            
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
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.name'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.email'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.user'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.slug'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.phone'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.mobile'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Hospitals') || Auth::user()->hasDirectPermission('Delete Hospitals')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?></th>
								<?php endif; ?>
							</tr>
						</tfoot>
					</table>
				</div>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare\framework\resources\views/hospitals/index.blade.php ENDPATH**/ ?>