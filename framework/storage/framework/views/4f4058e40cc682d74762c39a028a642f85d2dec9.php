<?php $__env->startSection('body-title'); ?>
	<?php echo app('translator')->get('equicare.permissions'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.permissions'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(url('admin/permissions')); ?>"><?php echo app('translator')->get('equicare.permissions'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('equicare.edit_permission'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.edit_permissions'); ?></h4>
			</div>
				<div class="box-body ">
					<?php echo $__env->make('errors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<form class="form" method="post" action="<?php echo e(route('permissions.update',$permission->id)); ?>">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="_method" value="PATCH"/>
						<div class="row">
						<div class="form-group col-md-6">
							<label for="name"> <?php echo app('translator')->get('equicare.name'); ?> </label>
							<input type="text" name="name" class="form-control" value="<?php echo e($permission->name); ?>" />
						</div>
						<div class="form-group col-md-12">
							<input type="submit" value="<?php echo app('translator')->get('equicare.submit'); ?>" class="btn btn-primary btn-flat"/>
						</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/permissions/edit.blade.php ENDPATH**/ ?>