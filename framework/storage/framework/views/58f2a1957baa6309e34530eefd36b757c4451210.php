<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
	<li class="active"><?php echo app('translator')->get('equicare.settings'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
	<style type="text/css">
		.mt-2{
			margin-top: 10px;
		}
		.mb-2{
			margin-bottom: 10px;
		}
		select{
			width: 128px;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<?php echo app('translator')->get('equicare.settings'); ?>
						</h4>
					</div>
					<div class="box-body">
						<?php echo $__env->make('errors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php echo Form::open(['url'=>'admin/settings','method'=>'POST','files'=>true]); ?>

						<div class="row">
							<div class="form-group col-md-6">
								<?php echo Form::label('company',__('equicare.company')); ?>

								<?php echo Form::text('company',old('company')??$setting->company??null,['class' => 'form-control']); ?>

							</div>
							<div class="form-group col-md-6">
								<?php echo Form::label('logo',__('equicare.logo_upload')); ?>

								<?php echo Form::file('logo',['class' => 'form-control']); ?>

								<?php if($setting != null): ?>
								<?php if(file_exists('uploads/'.$setting->logo) == true && $setting->logo != null): ?>
									<div class="mt-2">
									<img src="<?php echo e(asset('uploads/'.$setting->logo)); ?>" height="100px" width="100px" class="img-thumbnail">
									<button type="button" onclick="" class="btn btn-danger del-img btn-sm" title="<?php echo app('translator')->get('equicare.delete_logo'); ?>"><i class="fa fa-trash"></i></button>
								</div>
								<?php endif; ?>
								<?php endif; ?>
							</div>


							<div class="form-group col-md-12">
								<?php echo Form::submit(__('equicare.submit'),['class' => 'btn btn-primary btn-flat']); ?>

							</div>
						</div>
						<?php echo Form::close(); ?>

					</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">
						<?php echo app('translator')->get('equicare.smtp_settings'); ?>
					</h4>
				</div>
				<div class="box-body">
					<?php if($errors->hasBag('mail_errors')): ?>
					<div class="row">
						<div class="col-md-12 ">
							<div class="alert alert-danger alert-dismisable">
								<button class="close" data-dismiss="alert">&times;</button>
								<ul class="">
								<?php $__currentLoopData = $errors->mail_errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><?php echo e($error); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php echo Form::open(['url'=>'admin/mail-settings','method'=>'POST']); ?>

					<div class="row">
						<div class="form-group col-md-6">
							<?php echo Form::label('mail_driver',__('equicare.mail_driver')); ?>

							<?php echo Form::text('mail_driver',old('mail_driver')??env('MAIL_DRIVER')??null,['class' => 'form-control']); ?>

						</div>
						<div class="form-group col-md-6">
							<?php echo Form::label('mail_host',__('equicare.mail_host')); ?>

							<?php echo Form::text('mail_host',env('MAIL_HOST')??null,['class' => 'form-control']); ?>

						</div>
						<div class="form-group col-md-6">
							<?php echo Form::label('mail_port',__('equicare.mail_port')); ?>

							<?php echo Form::text('mail_port',env('MAIL_PORT')??null,['class' => 'form-control']); ?>

						</div>
						<div class="form-group col-md-6">
							<?php echo Form::label('mail_username',__('equicare.mail_username')); ?>

							<?php echo Form::text('mail_username',env('MAIL_USERNAME')??null,['class' => 'form-control']); ?>

						</div>
						<div class="form-group col-md-6">
							<?php echo Form::label('mail_encryption',__('equicare.mail_enc')); ?>

							<?php echo Form::text('mail_encryption',env('MAIL_ENCRYPTION')??null,['class' => 'form-control']); ?>

						</div>
						<div class="form-group col-md-6">
							<?php echo Form::label('mail_password',__('equicare.mail_pwd')); ?>

							<input type="password" name="mail_password" value="<?php echo e(env('MAIL_PASSWORD')??""); ?>" class="form-control" id="mail_password" autocomplete="off" />
						</div>
						<div class="form-group col-md-12">
							<?php echo Form::submit(__('equicare.submit'),['class' => 'btn btn-primary btn-flat']); ?>

						</div>
					</div>
					<?php echo Form::close(); ?>

					
				</div>
			</div>

			<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">
						<?php echo app('translator')->get('equicare.date_settings'); ?>
					</h4>
				</div>
				<div class="box-body">
					<?php if($errors->hasBag('date_errors')): ?>
					<div class="row">
						<div class="col-md-12 ">
							<div class="alert alert-danger alert-dismisable">
								<button class="close" data-dismiss="alert">&times;</button>
								<ul class="">
								<?php $__currentLoopData = $errors->mail_errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><?php echo e($error); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php echo Form::open(['url'=>'admin/date-settings','method'=>'POST']); ?>

					<div class="row">
					
						<div class="form-group col-md-6">
							<?php echo Form::label('date_settings',__('equicare.date_settings')); ?>

							<br>
						
							<select name="date_settings" required>
								<option value="">--Select--</option>
								<option value="dd-mm-yyyy,d-m-Y" <?php echo e(env('date_settings')=='dd-mm-yyyy' ? 'selected' : ''); ?>> dd-mm-yyyy</option>
								<option value="mm-dd-yyyy,m-d-Y" <?php echo e(env('date_settings')=='mm-dd-yyyy' ? 'selected' : ''); ?>>mm-dd-yyyy</option>
								<option value="yyyy-mm-dd,Y-m-d" <?php echo e(env('date_settings')=='yyyy-mm-dd' ? 'selected' : ''); ?>>yyyy-mm-dd</option>
							</select>
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
<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$(function(){
			$('select').select2();
			$('#mail_password').val("<?php echo e(env('MAIL_PASSWORD')??""); ?>");
			$('.del-img').on('click',function(){
					<?php if($setting != null && $setting->logo != null): ?>
					if(confirm('<?php echo app('translator')->get('equicare.are_you_sure'); ?>')){

					window.location.href="<?php echo e(url('admin/delete_logo',$setting->logo)); ?>";
					}
					<?php endif; ?>
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/settings/index.blade.php ENDPATH**/ ?>