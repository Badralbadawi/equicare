<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.calibrations'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.calibrations'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li>
	<a href="<?php echo e(url('admin/calibration')); ?>">
		<?php echo app('translator')->get('equicare.calibrations'); ?>
	</a>
</li>
<li class="active"><?php echo app('translator')->get('equicare.edit'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.edit_calibration'); ?></h4>
			</div>
			<div class="box-body">
				<?php echo $__env->make('errors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php echo Form::model($calibration,['route'=>['calibration.update',$calibration->id], 'method'=>'PATCH','files'=>true]); ?>

				<div class="row">
					<div class="form-group col-md-4">
							<label for="department"> <?php echo app('translator')->get('equicare.hospital'); ?> </label>

							<?php echo Form::select('hospital',array_unique($hospitals)??[],null,['class'=>'form-control hospital_select2','placeholder'=>'Select']); ?>

						</div>
							<div class="form-group col-md-4">
							<label for="department"> <?php echo app('translator')->get('equicare.department'); ?> </label>

							<?php echo Form::select('department',array_unique($departments)??[],null,['class'=>'form-control department_select2','placeholder'=>'Select']); ?>

						</div>
						<div class="form-group col-md-4">
							<label for="name"> <?php echo app('translator')->get('equicare.unique_id'); ?> </label>
							<?php echo Form::select('unique_id',$unique_ids??[],$calibration->equip_id??null,['class'=>'form-control unique_id_select2','placeholder'=>'Select Unique Id']); ?>

						</div>
						<div class="form-group col-md-4">
							<label for="equip_name"> <?php echo app('translator')->get('equicare.equipment_name'); ?> </label>
							<input type="text" name="" class="equip_name form-control" value="<?php echo e($calibration->equipment->name ?? ''); ?>" disabled/>
							<input type="hidden" name="equip_id" value="" id="equip_id"/>
						</div>

						<div class="form-group col-md-4">
							<label for="sr_no"> <?php echo app('translator')->get('equicare.serial_number'); ?> </label>
							<input type="text" name="sr_no" class="form-control sr_no" value="<?php echo e($calibration->equipment->sr_no?? ''); ?>" disabled/>
						</div>
						<div class="form-group col-md-4">
							<label for="company"> <?php echo app('translator')->get('equicare.company'); ?> </label>
							<input type="text" name="company" class=" company form-control" value="<?php echo e($calibration->equipment->company?? ''); ?>" disabled/>
						</div>
						<div class="form-group col-md-4">
							<label for="model"> <?php echo app('translator')->get('equicare.model'); ?> </label>
							<input type="text" name="model" class=" model form-control" value="<?php echo e($calibration->equipment->model?? ''); ?>" disabled/>
						</div>
						<div class="form-group col-md-4">
							<label for="model"> <?php echo app('translator')->get('equicare.date_pm'); ?> </label>
							<input type="text" name="date_pm" class=" date_pm form-control" value="<?php echo e($calibration->equipment->pm->call_register_date_time?? ''); ?>" disabled/>
						</div>
						<div class="form-group col-md-4">
							<label for="model"> <?php echo app('translator')->get('equicare.due_pm'); ?> </label>
							<input type="text" name="due_pm" class=" due_pm form-control" value="<?php echo e($calibration->equipment->pm->next_due_date?? ''); ?>" disabled/>
						</div>

					<div class="form-group col-md-4">
					<?php echo Form::label('date_of_calibration',__('equicare.date_of_calibration')); ?>

					<?php echo Form::text('date_of_calibration',date_change($calibration->date_of_calibration),['class' => 'date_of_calibration form-control']); ?>

					</div>
					<div class="form-group col-md-4">
						<?php echo Form::label('due_date',__('equicare.due_date')); ?>

						<?php echo Form::text('due_date',date_change($calibration->due_date),['class' => 'due_date form-control']); ?>

					</div>
					<div class="form-group col-md-4">
						<?php echo Form::label('certificate_no',__('equicare.certificate_no')); ?>

						<?php echo Form::text('certificate_no',null,['class' => 'form-control']); ?>

					</div>
					<div class="form-group col-md-4">
						<?php echo Form::label('company',__('equicare.company')); ?>

						<?php echo Form::text('company',null,['class' => 'form-control']); ?>

					</div>
					<div class="form-group col-md-4">
						<?php echo Form::label('contact_person',__('equicare.contact_person')); ?>

						<?php echo Form::text('contact_person',null,['class' => 'form-control']); ?>

					</div>
					<div class="form-group col-md-4">
						<?php echo Form::label('contact_person_no',__('equicare.contact_person_no')); ?>

						<?php echo Form::text('contact_person_no',null,['class' => 'form-control phone']); ?>

					</div>
					<div class="form-group col-md-4">
						<?php echo Form::label('engineer_no',__('equicare.engineer_no')); ?>

						<?php echo Form::text('engineer_no',null,['class' => 'form-control phone']); ?>

					</div>
					<div class="form-group col-md-4">
						<?php echo Form::label('traceability_certificate_no',__('equicare.traceability_certificate_no')); ?>

						<?php echo Form::text('traceability_certificate_no',null,['class' => 'form-control']); ?>

					</div>
					<div class="form-group col-md-4">
						<?php echo Form::label('calibration_certificate',__('equicare.calibration_certificate')); ?>

						<?php echo Form::file('calibration_certificate',null,['class' => 'form-control']); ?>

						<?php if(isset($calibration->calibration_certificate)): ?>
						<a href="<?php echo e(asset($calibration->calibration_certificate)); ?>" target="_blank" download style="font-size: 18px;"><?php echo e(__('equicare.calibration_certificate')); ?></a>
						<?php endif; ?>
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
			// get equipment data
			$('.unique_id_select2').trigger('change');
			$('.unique_id_select2').select2({
				placeholder: '<?php echo e(__("equicare.select_option")); ?>',
				allowClear: true
			});
			 $('.hospital_select2').select2({
		    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
  				allowClear: true
		    });
		      $('.department_select2').select2({
		    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
  				allowClear: true
		    });
			$('.date_of_calibration').datepicker({
				format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
				todayHighlight: true
			});
			$('.due_date').datepicker({
				format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
				todayHighlight: true
			});

		});

		$('.unique_id_select2').on('change',function(){
				var value = $(this).val();
				$('#equip_id').val(value);
				var equip_name = $('.equip_name');
				var hospitals = $('.hospital_select2');
			    var sr_no = $('.sr_no');
			    var company = $('.company');
			    var model = $('.model');
			    var department = $('.department_select2');
			    var date_pm = $('.date_pm');
				var due_pm = $('.due_pm');
		    	if(value==""){
	    			equip_name.val("");
		    		sr_no.val("");
		    		company.val("");
		    		model.val("");
		    		department.val("");
		    		date_pm.val("");
					due_pm.val("");
	    		}
				if(value !=""){
			    $.ajax({
			    	url : "<?php echo e(url('unique_id_breakdown')); ?>" ,
			    	type : 'get',

			    	data:{'id' : value },
			    	success:function(data){
			    		equip_name.val(data.success.name);
			    		hospitals.val(data.success.hospital_id);
			    		sr_no.val(data.success.sr_no);
			    		company.val(data.success.company);
			    		model.val(data.success.model);
			    		department.val(data.success.department);
			    		date_pm.val(data.success.date_pm);
			    		due_pm.val(data.success.due_pm);
			    		new PNotify({
				              title: ' Success!',
				              text: "<?php echo e(__('equicare.equipment_data_fetched')); ?>",
				              type: 'success',
				              delay: 3000,
				              nonblock: {
				                nonblock: true
				              }
				          });

			    		 $('.unique_id_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });
					     $('.hospital_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });
					      $('.department_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });

			    	}
			    });
			}
		});

		$('.hospital_select2').on('change',function(){
				var value = $(this).val();
				var equip_name = $('.equip_name');
				var hospitals = $('.hospital_select2');
			    var department = $('.department_select2');
				var unique_id = $('.unique_id_select2');
			    var sr_no = $('.sr_no');
			    var company = $('.company');
			    var model = $('.model');
			    var date_pm = $('.date_pm');
				var due_pm = $('.due_pm');
		    	if(value==""){
	    			equip_name.val("");
		    		sr_no.val("");
		    		company.val("");
		    		model.val("");
		    		department.val("");
		    		unique_id.trigger("change");
		    		unique_id.val("");
		    		date_pm.val("");
					due_pm.val("");
	    		}
				if(value !=""){
			    $.ajax({
			    	url : "<?php echo e(url('hospital_breakdown')); ?>" ,
			    	type : 'get',

			    	data:{'id' : value },
			    	success:function(data){
			    		 console.log(data);
			    		 department.empty();
			    		 unique_id.empty();
			    		if (data.department) {
			    			department.append(
			    					'<option value=""></option>'
			    					);
			    			$.each(data.department,function(k,v){
			    				department.append(
			    					'<option value="'+k+'">'+v+'</option>'
			    					);
			    			});
			    		}

			    		if (data.unique_id) {
			    			unique_id.append(
			    					'<option value=""></option>'
			    					);
			    			$.each(data.unique_id,function(k,v){
			    				unique_id.append(
			    					'<option value="'+k+'">'+v+'</option>'
			    					);
			    			});
			    		}
			    		 $('.unique_id_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });
					     $('.hospital_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });
					      $('.department_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });

			    	}
			    });
			}
		});


		$('.department_select2').on('change',function(){
				var value = $(this).val();
				var equip_name = $('.equip_name');
				var hospitals = $('.hospital_select2');
				var unique_id = $('.unique_id_select2');
			    var sr_no = $('.sr_no');
			    var company = $('.company');
			    var model = $('.model');
			    var date_pm = $('.date_pm');
				var due_pm = $('.due_pm');
		    	if(value==""){
	    			equip_name.val("");
		    		sr_no.val("");
		    		company.val("");
		    		model.val("");
		    		$(this).val("");
		    		unique_id.trigger("change");
		    		unique_id.val("");
		    		date_pm.val("");
					due_pm.val("");
	    		}
				if(value !=""){
			    $.ajax({
			    	url : "<?php echo e(url('department_breakdown')); ?>" ,
			    	type : 'get',

			    	data:{
			    		'department' : value,
						'hospital_id':hospitals.val()
			    	 },
			    	success:function(data){
			    		 unique_id.empty();
			    		if (data.unique_id) {
			    			unique_id.append(
			    					'<option value=""></option>'
			    					);
			    			$.each(data.unique_id,function(k,v){
			    				unique_id.append(
			    					'<option value="'+k+'">'+v+'</option>'
			    					);
			    			});
			    		}

			    		 $('.unique_id_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });
					     $('.hospital_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });
					      $('.department_select2').select2({
					    	placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			  				allowClear: true
					    });

			    	}
			    });
			}
		});
	</script>
	<script type="text/javascript">
		$.ajaxSetup({ headers: { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/calibrations/edit.blade.php ENDPATH**/ ?>