	
	<?php $__env->startSection('body-title'); ?>
		<?php echo app('translator')->get('equicare.equipments'); ?>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('title'); ?>
		| <?php echo app('translator')->get('equicare.equipments'); ?>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="<?php echo e(url('admin/equipments')); ?>"><?php echo app('translator')->get('equicare.equipments'); ?> </a></li>
	<li class="active"><?php echo app('translator')->get('equicare.create'); ?></li>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title"><?php echo app('translator')->get('equicare.create_equipments'); ?></h4>
					</div>
					<div class="box-body ">
						<?php echo $__env->make('errors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<form class="form" method="post" action="<?php echo e(route('equipments.store')); ?>">
							<?php echo e(csrf_field()); ?>

							<?php echo e(method_field('POST')); ?>

							<div class="row">
							<div class="form-group col-md-6">
								<label for="name"> <?php echo app('translator')->get('equicare.name'); ?> </label>
								<input type="text" name="name" class="form-control"
								value="<?php echo e(old('name')); ?>" />
							</div>
							<div class="form-group col-md-6">
								<label for="short_name"> <?php echo app('translator')->get('equicare.short_name_eq'); ?> </label>
								<input type="text" name="short_name" class="form-control"
								value="<?php echo e(old('short_name')); ?>" />
							</div>
							<div class="form-group col-md-6">
								<label for="company"> <?php echo app('translator')->get('equicare.company'); ?> </label>
								<input type="text" name="company" class="form-control"
								value="<?php echo e(old('company')); ?>" />
							</div>
							<div class="form-group col-md-6">
								<label for="model"> <?php echo app('translator')->get('equicare.model'); ?> </label>
								<input type="text" name="model" class="form-control"
								value="<?php echo e(old('model')); ?>" />
							</div>
							<div class="form-group col-md-6">
								<label for="sr_no"> <?php echo app('translator')->get('equicare.serial_number'); ?> </label>
								<input type="text" name="sr_no" class="form-control"
								value="<?php echo e(old('sr_no')); ?>" />
							</div>
							<div class="form-group col-md-6">
								<label for="hospital_id"> <?php echo app('translator')->get('equicare.hospital'); ?> </label>
								<select name="hospital_id" class="form-control">
									<option value="">---select---</option>
									<?php if(isset($hospitals)): ?>
										<?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($hospital->id); ?>"
												<?php echo e(old('hospital_id')?'selected':''); ?>

												><?php echo e($hospital->name); ?>

											</option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="department"> <?php echo app('translator')->get('equicare.department'); ?> </label>
								<?php echo Form::select('department',$departments??[],null,['class'=>'form-control','placeholder'=>'--select--']); ?>

							</div>
							<div class="form-group col-md-6">
								<label for="date_of_purchase"> <?php echo app('translator')->get('equicare.purchase_date'); ?> </label>
								<div class="input-group">

									<input type="text" id="date_of_purchase" name="date_of_purchase" class="form-control"
									value="<?php echo e(old('date_of_purchase')); ?>" />
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="order_date"> <?php echo app('translator')->get('equicare.order_date'); ?> </label>
								<div class="input-group">

								<input type="text" id="order_date" name="order_date" class="form-control"
								value="<?php echo e(old('order_date')); ?>" />
								<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
								</span>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="date_of_installation"> <?php echo app('translator')->get('equicare.installation_date'); ?> </label>
								<div class="input-group">

								<input type="text" id="date_of_installation" name="date_of_installation" class="form-control"
								value="<?php echo e(old('date_of_installation')); ?>" />
								<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
								</span>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="warranty_due_date"> <?php echo app('translator')->get('equicare.warranty_due_date'); ?> </label>
								<div class="input-group">

								<input type="text" id="warranty_due_date" name="warranty_due_date" class="form-control"
								value="<?php echo e(old('warranty_due_date')); ?>" />
								<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
								</span>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="service_engineer_no"> <?php echo app('translator')->get('equicare.service_engineer_number'); ?></label>
								<input type="text" name="service_engineer_no" class="form-control phone"
								value="<?php echo e(old('service_engineer_no')); ?>" />
							</div>
							<div class="form-group col-md-6">
								<label> <?php echo app('translator')->get('equicare.critical'); ?> </label><br/>
								<label>
								<input type="radio" value="1" name="is_critical" <?php if(old('is_critical') == '1'): ?> checked <?php endif; ?>>
								<?php echo app('translator')->get('equicare.yes'); ?>	</label> &nbsp;
								<label>
								<input type="radio" value="0" name="is_critical" <?php if(old('is_critical') == '0'): ?> checked <?php endif; ?> <?php if(!old('is_critical')): ?> checked <?php endif; ?>>
								<?php echo app('translator')->get('equicare.no'); ?>
								</label>
							</div>
							<div class="form-group col-md-6">
								<label for="notes"> <?php echo app('translator')->get('equicare.notes'); ?> </label>
								<textarea rows="2" name="notes" class="form-control"
								><?php echo e(old('notes')); ?></textarea>
							</div>
							<input type="hidden" name="qr_id" value="<?php echo e(request('qr_id')); ?>"/>
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
	<?php $__env->startSection('scripts'); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#date_of_purchase').datepicker({
					format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
					'todayHighlight' : true,
				});
				$('#order_date').datepicker({
					format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
					'todayHighlight' : true,
				});
				$('#date_of_installation').datepicker({
					format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
					'todayHighlight' : true,
				});
				$('#warranty_due_date').datepicker({
					format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
					'todayHighlight' : true,
				});
			});
		</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - mains\framework\resources\views/equipments/create.blade.php ENDPATH**/ ?>