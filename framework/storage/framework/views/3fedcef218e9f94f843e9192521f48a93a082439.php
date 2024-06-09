<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.users'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.users'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active"><?php echo app('translator')->get('equicare.users'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
					<h4 class="box-title"><?php echo app('translator')->get('equicare.manage_users'); ?>
					   <?php if(Auth::user()->hasDirectPermission('Create Users')): ?>
								<a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a>
						<?php endif; ?>	
					</h4>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
						<thead class="thead-inverse">
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.name'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.email'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.created_on'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.role'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Users') || Auth::user()->hasDirectPermission('Delete Users')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?></th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($users)): ?>
							<?php
								$count = 0;
							?>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$count++;
							?>
							<tr>
							<td> <?php echo e($count); ?> </td>
							<td> <?php echo e(ucfirst($user->name)); ?> </td>
							<td> <?php echo e($user->email); ?></td>
							<td> <?php echo e($user->created_at->diffForHumans()); ?></td>
							<td> <?php echo e($user->roles->pluck('name')->toArray()[0] ?? ''); ?> </td>
							<?php if(Auth::user()->hasDirectPermission('Edit Users') || Auth::user()->hasDirectPermission('Delete Users')): ?>
                        <td class="todo-list">
								<div class="tools">
									<?php echo Form::open(['url' => 'admin/users/'.$user->id,'method'=>'DELETE','class'=>'form-inline']); ?>

									   <?php if(Auth::user()->hasDirectPermission('Edit Users')): ?>
										<a href="<?php echo e(route('users.edit',$user->id)); ?>" class="btn bg-purple btn-sm btn-flat" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit"></i>  </a>
										<?php endif; ?> &nbsp;
			                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
			                           <?php if(Auth::user()->hasDirectPermission('Delete Users')): ?>
			                            <button class="btn btn-warning btn-sm btn-flat" type="submit" onclick="return confirm('<?php echo app('translator')->get('equicare.are_you_sure'); ?>')" title="<?php echo app('translator')->get('equicare.delete'); ?>"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
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
								<th> <?php echo app('translator')->get('equicare.email'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.created_on'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.role'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Users') || Auth::user()->hasDirectPermission('Delete Users')): ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare\framework\resources\views/users/index.blade.php ENDPATH**/ ?>