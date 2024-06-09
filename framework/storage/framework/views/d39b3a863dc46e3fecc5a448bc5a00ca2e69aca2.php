<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.hospitals'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.hospitals'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(url('admin/hospitals')); ?>"><?php echo app('translator')->get('equicare.hospitals'); ?> </a></li>
<li class="active"><?php echo app('translator')->get('equicare.create'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.create_hospital'); ?></h4>
				</div>

				<div class="box-body ">
					<?php echo $__env->make('errors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<form class="form" method="post" action="<?php echo e(route('hospitals.store')); ?>">
						<?php echo e(csrf_field()); ?>

						<?php echo e(method_field('POST')); ?>

						<div class="row">
						<div class="form-group col-md-6">
							<label for="name"> <?php echo app('translator')->get('equicare.name'); ?> </label>
							<input type="text" name="name" class="form-control"
							value="<?php echo e(old('name')); ?>" />
						</div>
						<div class="form-group col-md-6">
							<label for="slug"> <?php echo app('translator')->get('equicare.Short Name'); ?> </label>
							<input type="text" name="slug" class="form-control"
							value="<?php echo e(old('slug')); ?>" />
						</div>
						<div class="form-group col-md-6">
							<label for="email"> <?php echo app('translator')->get('equicare.email'); ?> </label>
							<input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>"/>
						</div>
						<div class="form-group col-md-6">
							<label for="contact_person"> <?php echo app('translator')->get('equicare.contact_person'); ?> </label>
							<input type="text" name="contact_person" class="form-control"
							value="<?php echo e(old('contact_person')); ?>" />
						</div>
						<div class="form-group col-md-6">
							<label for="phone_no"> <?php echo app('translator')->get('equicare.phone'); ?> </label>
							<input type="text" name="phone_no" class="form-control phone"
							value="<?php echo e(old('phone_no')); ?>" />
						</div>
						<div class="form-group col-md-6">
							<label for="mobile_no"> <?php echo app('translator')->get('equicare.mobile'); ?> </label>
							<input type="text" name="mobile_no" class="form-control phone"
							value="<?php echo e(old('mobile_no')); ?>" />
						</div>
						<div class="form-group col-md-6">
							<label for="address"> <?php echo app('translator')->get('equicare.address'); ?> </label>
							<textarea rows="3" name="address" class="form-control"
							><?php echo e(old('address')); ?></textarea>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare\framework\resources\views/hospitals/create.blade.php ENDPATH**/ ?>