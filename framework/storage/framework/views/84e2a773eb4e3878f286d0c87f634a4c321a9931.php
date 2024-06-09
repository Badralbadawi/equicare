<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.roles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.roles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(url('admin/roles')); ?>"><?php echo app('translator')->get('equicare.roles'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('equicare.create_new'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
	<style type="text/css">
	.checkbox{
		margin-top: 0px;
	}
	.checkbox+.checkbox, .radio+.radio {
    	margin-top: unset;
	}
	.row > .checkbox{
		padding-left: 0px;

	}
	.form-check > .row {
		margin-top: 20px;
	}
	</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.create_role'); ?></h4>
				</div>

				<div class="box-body ">
					<?php echo $__env->make('errors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<form class="form" method="post" action="<?php echo e(route('roles.store')); ?>">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="_method" value="POST"/>
						<div class="row">
						<div class="form-group col-md-6">
							<label for="name"> <?php echo app('translator')->get('equicare.name'); ?> </label>
							<input type="text" name="name" class="form-control"/>
						</div>
						
						<?php if(isset($permissions) && $permissions->count() > 0): ?>
                               <?php echo $__env->make('user_role_permission.table_create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>  
                              
						

						<div class="form-group col-md-6">
							<input type="submit" value="<?php echo app('translator')->get('equicare.submit'); ?>" class="btn btn-primary btn-flat"/>
						</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/roles/create.blade.php ENDPATH**/ ?>