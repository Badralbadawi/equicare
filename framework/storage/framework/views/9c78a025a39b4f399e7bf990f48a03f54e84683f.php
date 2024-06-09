<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.roles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.roles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active"><?php echo app('translator')->get('equicare.roles'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.manage_roles'); ?>
					<?php if(Auth::user()->hasDirectPermission('Create Roles')): ?>
					<a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a></h4>
					<?php endif; ?>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
						<thead class="thead-inverse">
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.name'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.created_on'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.permissions'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Roles') || Auth::user()->hasDirectPermission('Delete Roles')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($roles)): ?>
							<?php
							$count = 0;
							?>
							<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
							$count++;
							?>
							<tr>
								<td> <?php echo e($count); ?> </td>
								<td> <?php echo e(ucfirst($role->name)); ?> </td>
								<td> <?php echo e($role->created_at->diffForHumans()); ?></td>
								<td> <?php echo e(str_limit(implode(', ',$role->permissions->pluck('name')->toArray()),70)); ?> </td>
								<?php if(Auth::user()->can('Edit Roles') || Auth::user()->can('Delete Roles')): ?>
								<td class="todo-list">
									<div class="tools">
										<?php echo Form::open(['url' => 'admin/roles/'.$role->id,'method'=>'DELETE','class'=>'form-inline']); ?>

										<?php if(Auth::user()->hasDirectPermission('Edit Roles')): ?>
										<a href="<?php echo e(route('roles.edit',$role->id)); ?>" class="btn bg-purple btn-flat btn-sm" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit"></i>  </a>
										<?php endif; ?> &nbsp;
										<input type="hidden" name="id" value="<?php echo e($role->id); ?>">
										<?php if(Auth::user()->hasDirectPermission('Delete Roles')): ?>
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
								<th> <?php echo app('translator')->get('equicare.permissions'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Roles') || Auth::user()->hasDirectPermission('Delete Roles')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
								<?php endif; ?>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/roles/index.blade.php ENDPATH**/ ?>