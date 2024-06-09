<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.permissions'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.permissions'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
	<li class=" active"><?php echo app('translator')->get('equicare.permissions'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header">
					<h4 class="box-title"><?php echo app('translator')->get('equicare.manage_permissions'); ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Permissions')): ?>
								<a href="<?php echo e(route('permissions.create')); ?>" class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a>
							<?php endif; ?>
						</h4>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
							<thead class="thead-inverse">
								<tr>
									<th> # </th>
									<th> <?php echo app('translator')->get('equicare.name'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.created_on'); ?> </th>
									<?php if(\Auth::user()->can('Edit Permissions') || \Auth::user()->can('Delete Permissions')): ?>
									<th> <?php echo app('translator')->get('equicare.action'); ?></th>
									<?php endif; ?>
								</tr>
							</thead>
							<tbody>
								<?php if(isset($permissions)): ?>
								<?php
									$count = 0;
								?>
								<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$count++;
								?>
								<tr>
								<td> <?php echo e($count); ?> </td>
								<td> <?php echo e(ucfirst($permission->name)); ?> </td>
								<td> <?php echo e($permission->created_at->diffForHumans()); ?></td>
								<?php if(\Auth::user()->can('Edit Permissions') || \Auth::user()->can('Delete Permissions')): ?>
								<td class="todo-list">
									<div class="tools">
										<?php echo Form::open(['url' => 'admin/permissions/'.$permission->id,'method'=>'DELETE','class'=>'form-inline']); ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Permissions')): ?>
											<a href="<?php echo e(route('permissions.edit',$permission->id)); ?>" class="btn bg-purple btn-flat btn-sm" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit"></i>  </a>
										<?php endif; ?> &nbsp;
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Permissions')): ?>
				                            <input type="hidden" name="id" value="<?php echo e($permission->id); ?>">
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
									<th> <?php echo app('translator')->get('equicare.created_on'); ?> </th>
									<?php if(\Auth::user()->can('Edit Permissions') || \Auth::user()->can('Delete Permissions')): ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/permissions/index.blade.php ENDPATH**/ ?>