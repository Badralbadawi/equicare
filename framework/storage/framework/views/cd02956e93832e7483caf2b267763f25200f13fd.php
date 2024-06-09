<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.departments'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.departments'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
	<li class=" active"><?php echo app('translator')->get('equicare.departments'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title"><?php echo app('translator')->get('equicare.manage_departments'); ?>
							
							<?php if(
                            Auth::user()->hasDirectPermission('Create Departments')): ?>
								<a href="<?php echo e(route('departments.create')); ?>" class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a>
							<?php endif; ?>
						</h4>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
							<thead class="thead-inverse">
								<tr>
									<th> # </th>
									<th> <?php echo app('translator')->get('equicare.name'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.short_name'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.created_on'); ?> </th>
									<?php if(\Auth::user()->hasDirectPermission('Edit Departments') || \Auth::user()->hasDirectPermission('Delete Departments')): ?>
									<th> <?php echo app('translator')->get('equicare.action'); ?></th>
									<?php endif; ?>
								</tr>
							</thead>
							<tbody>
								<?php if(isset($departments)): ?>
								<?php
									$count = 0;
								?>
								<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$count++;
								?>
								<tr>
								<td> <?php echo e($count); ?> </td>
								<td> <?php echo e(ucfirst($department->name)); ?> </td>
								<td><?php echo e($department->short_name ?? "-"); ?></td>
								<td> <?php echo e($department->created_at->diffForHumans()); ?></td>
								<?php if(\Auth::user()->hasDirectPermission('Edit Departments') || \Auth::user()->hasDirectPermission('Delete Departments')): ?>
								<td class="todo-list">
									<div class="tools">
										<?php echo Form::open(['url' => 'admin/departments/'.$department->id,'method'=>'DELETE','class'=>'form-inline']); ?>

										<?php if(\Auth::user()->hasDirectPermission('Edit Departments')): ?>
											<a href="<?php echo e(route('departments.edit',$department->id)); ?>" class="btn bg-purple btn-flat btn-sm" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit"></i>  </a>
										<?php endif; ?> &nbsp;
				                            <input type="hidden" name="id" value="<?php echo e($department->id); ?>">
										<?php if(\Auth::user()->hasDirectPermission('Delete Departments')): ?>
				                            <button class="btn btn-warning btn-flat btn-sm" type="submit" onclick="return confirm('<?php echo app('translator')->get('equicare.are_you_sure'); ?>')" title="<?php echo app('translator')->get('equicare.delete'); ?>"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
				                        <?php endif; ?>
				                        <?php echo Form::close(); ?>

									</div>
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
									<th> <?php echo app('translator')->get('equicare.short_name'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.created_on'); ?> </th>
									<?php if(\Auth::user()->hasDirectPermission('Edit Departments') || \Auth::user()->hasDirectPermission('Delete Departments')): ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/departments/index.blade.php ENDPATH**/ ?>