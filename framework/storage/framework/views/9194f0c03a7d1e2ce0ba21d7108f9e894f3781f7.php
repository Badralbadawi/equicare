<?php $__env->startSection('body-title'); ?>
	<?php echo app('translator')->get('equicare.departments'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.departments'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
	<li><a href="<?php echo e(route('departments.index')); ?>"><?php echo app('translator')->get('equicare.departments'); ?></a></li>
	<li class="active"><?php echo app('translator')->get('equicare.create_department'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
	<style type="text/css">
		.mt-2{
			margin-top: 10px;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<?php echo app('translator')->get('equicare.create_department'); ?>
						</h4>
					</div>
					<div class="box-body">
					<?php echo $__env->make('errors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php echo Form::open(['url'=>'admin/departments','method'=>'POST']); ?>

						<div class="row">
							<div class="form-group col-md-6">
								<?php echo Form::label('name',__('equicare.name')); ?>

								<?php echo Form::text('name',null,['class' => 'form-control']); ?>

							</div>
							<div class="form-group col-md-6">
								<?php echo Form::label('short_name',__('equicare.short_name_e')); ?>

								<?php echo Form::text('short_name',null,['class' => 'form-control']); ?>

							</div>

							<div class="form-group col-md-12">
								<?php echo Form::submit(__('equicare.submit'),['class' => 'btn btn-primary btn-flat']); ?>

							</div>
						</div>
						<?php echo Form::close(); ?>

					</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/departments/create.blade.php ENDPATH**/ ?>