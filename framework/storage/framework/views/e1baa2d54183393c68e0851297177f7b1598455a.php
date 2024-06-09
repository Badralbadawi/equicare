<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.maintenance_cost'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.maintenance_cost_edit'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li>
	<a href="<?php echo e(url('admin/maintenance_cost')); ?>">
		<?php echo app('translator')->get('equicare.maintenance_cost'); ?>
	</a>
</li>
<li class="active"><?php echo app('translator')->get('equicare.edit'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.maintenance_cost_edit'); ?></h4>
			</div>
			<div class="box-body ">
				
					<?php echo Form::open
						(
							array(
									'route'=>array('maintenance_cost.update',$maintenance_cost->id),
									'class'=>'form',
									'method'=>'POST'	
								)
						); ?>

					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('PATCH')); ?>

					<div class="row">
						<div class="form-group col-md-4">
							<?php echo Form::label('hospital_id',__('equicare.hospital')); ?>

							<?php echo Form::select('hospital_id',$hospitals??[],$maintenance_cost->hospital_id,['class' => $errors->has('hospital_id')?'is-invalid form-control select2_hospital':'form-control select2_hospital','placeholder'=>'Select Hospital']); ?>

							<?php if($errors->has('hospital_id')): ?>
							<strong class="invalid-feedback">
								<span><?php echo e($errors->first('hospital_id')); ?>

								</span>
							</strong>
							<?php endif; ?>
						</div>
						<div class="form-group col-md-6">
							<label><?php echo app('translator')->get('equicare.type'); ?>:</label>
							<div class="radio iradio">
								<label class="login-padding">
									<?php echo Form::radio('type', 'amc',$maintenance_cost->type=='amc'?true:false,['class'=>$errors->has('type')?'is-invalid':'']); ?> <?php echo app('translator')->get('equicare.annual_cost'); ?>
								</label>
								<label>
									<?php echo Form::radio('type', 'cmc',$maintenance_cost->type=='cmc'?true:false,['class'=>$errors->has('type')?'is-invalid':'']); ?> <?php echo app('translator')->get('equicare.comprehensive_cost'); ?>
								</label>
								<br/>
								<?php if($errors->has('type')): ?>
								<strong class="invalid-feedback">
									<span><?php echo e($errors->first('type')); ?>

									</span>
								</strong>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group col-md-3">
							<label class="margintop"><?php echo app('translator')->get('equicare.cost_by'); ?>:</label>
							<div class="radio iradio zmargin">
								<label class="login-padding">
									<?php echo Form::radio('cost_by', 'us',$maintenance_cost->cost_by=='us'?true:false); ?> <?php echo app('translator')->get('equicare.own_company'); ?>
								</label>
								<label>
									<?php echo Form::radio('cost_by', 'tp',$maintenance_cost->cost_by=='tp'?true:false,['id'=>'tp']); ?> <?php echo app('translator')->get('equicare.third_party'); ?>
								</label>
								<?php if($errors->has('cost_by')): ?>
								<strong class="invalid-feedback">
									<span><?php echo e($errors->first('cost_by')); ?>

									</span>
								</strong>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group col-md-9 tp_details" style="display: <?php echo e($maintenance_cost->cost_by=='tp'?'block':'none'); ?>">
							<div class="row no-gutters">
								<div class="form-group col-md-4">
									<label for="tp_name"> <?php echo app('translator')->get('equicare.name'); ?> </label>
									<input type="text" id="tp_name" name="tp_name" class="<?php echo e($errors->has('tp_name')?'is-invalid ':''); ?>form-control" value="<?php echo e($maintenance_cost->tp_name??old('tp_name')); ?>" />
									<?php if($errors->has('tp_name')): ?>
									<strong class="invalid-feedback">
										<span><?php echo e($errors->first('tp_name')); ?>

										</span>
									</strong>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-4">
									<label for="tp_mobile"> <?php echo app('translator')->get('equicare.mobile'); ?> </label>
									<input type="text" id="tp_mobile" name="tp_mobile" class="<?php echo e($errors->has('tp_mobile')?'is-invalid ':''); ?>form-control" value="<?php echo e($maintenance_cost->tp_mobile??old('tp_mobile')); ?>" />
									<?php if($errors->has('tp_mobile')): ?>
									<strong class="invalid-feedback">
										<span><?php echo e($errors->first('tp_mobile')); ?>

										</span>
									</strong>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-4">
									<label for="tp_email"> <?php echo app('translator')->get('equicare.email'); ?> </label>
									<input type="email" id="tp_email" name="tp_email" class="<?php echo e($errors->has('tp_email')?'is-invalid ':''); ?>form-control" value="<?php echo e($maintenance_cost->tp_email??old('tp_email')); ?>" />
									<?php if($errors->has('tp_email')): ?>
									<strong class="invalid-feedback">
										<span><?php echo e($errors->first('tp_email')); ?>

										</span>
									</strong>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php echo Form::label('equipments','Select Equipments'); ?>

					<div class="add_row_equipments">
						<?php ($i = 0); ?>
						<?php if((old('cost'))): ?>
						<?php $__currentLoopData = old('cost'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="row no-gutters">
							<div class="form-group col-md-3">
								<?php echo Form::select('equipments[]',[],old('equipments.'.$i),['class'=>$errors->has('equipments.'.$i)?'is-invalid form-control select2_equipments':'form-control select2_equipments','id'=>'equipments'.($i+1)]); ?>

								<?php if($errors->has('equipments.'.$i)): ?>
								<strong class="invalid-feedback">
									<span><?php echo e($errors->first('equipments.'.$i)); ?>

									</span>
								</strong>
								<?php endif; ?>
							</div>
							<div class="form-group col-md-3">
								<?php echo Form::text('start_dates[]',old('start_dates.'.$i),['class'=>$errors->has('start_dates.'.$i)?'is-invalid start_dates form-control':'form-control start_dates','placeholder'=>__('equicare.enter_start_date'),'autocomplete'=>'off']); ?>

								<?php if($errors->has('start_dates.'.$i)): ?>
								<strong class="invalid-feedback">
									<span><?php echo e($errors->first('start_dates.'.$i)); ?>

									</span>
								</strong>
								<?php endif; ?>
							</div>
							<div class="form-group col-md-3">
								<?php echo Form::text('end_dates[]',old('end_dates.'.$i),['class'=>$errors->has('end_dates.'.$i)?'is-invalid end_dates form-control':'form-control end_dates','placeholder'=>__('equicare.enter_end_date'),'autocomplete'=>'off']); ?>

								<?php if($errors->has('end_dates.'.$i)): ?>
								<strong class="invalid-feedback">
									<span><?php echo e($errors->first('end_dates.'.$i)); ?>

									</span>
								</strong>
								<?php endif; ?>
							</div>
							<div class="form-group col-md-3">
								<?php echo Form::number('cost[]',old('cost.'.$i),['class'=>$errors->has('cost.'.$i)?'is-invalid cost form-control':'form-control cost','placeholder'=>__('equicare.enter_cost'),'autocomplete'=>'off']); ?>

								<?php if($errors->has('cost.'.$i)): ?>
								<strong class="invalid-feedback">
									<span><?php echo e($errors->first('cost.'.$i)); ?>

									</span>
								</strong>
								<?php endif; ?>
							</div>
							<?php ($i++); ?>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
						
						
						<?php $__currentLoopData = json_decode($maintenance_cost->costs, TRUE); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
						<div class="row no-gutters">
							
							

						<div class="form-group col-md-3">
							<?php echo Form::select('equipments[]', $equipments ?? [], isset(json_decode($maintenance_cost->equipment_ids, true)[$key]) ? json_decode($maintenance_cost->equipment_ids, true)[$key] : null, ['class' => 'form-control select2_equipments', 'id' => 'equipments1']); ?>

						</div>

						<div class="form-group col-md-3">
							<?php echo Form::text('start_dates[]', decode_dates($maintenance_cost->start_dates, $key), ['class' => 'form-control start_dates', 'placeholder' => __('equicare.enter_start_date'), 'id' => 'start_dates1', 'autocomplete' => 'off']); ?>

						</div>

						<div class="form-group col-md-3">
							<?php echo Form::text('end_dates[]', decode_dates($maintenance_cost->end_dates, $key), ['class' => 'form-control end_dates', 'placeholder' => __('equicare.enter_end_date'), 'id' => 'end_dates1', 'autocomplete' => 'off']); ?>

						</div>
							<div class="form-group col-md-3">
								<?php echo Form::number('cost[]',$cost,['class'=>'form-control','placeholder'=>__('equicare.enter_cost')]); ?>

							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</div>
					<div class="form-group col-md-12 login-padding">
						<?php echo Form::submit(__('equicare.submit'),['class' => 'btn btn-primary btn-flat']); ?>

					</div>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/datetimepicker.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		<?php if($errors->has('tp_name') || $errors->has('tp_email') || $errors->has('tp_mobile')): ?>
		$('div.tp_details').show();
		<?php endif; ?>
		if($('#tp').attr('checked') =='checked'){
			$('.tp_details').css('display','block');
		}
		$('#tp').on('ifChecked ifUnchecked',function(e){
			if(e.type == 'ifChecked'){
				$('.tp_details').show();
			}else{
				$('.tp_details').hide();
			}
		})
		$('.start_dates').datepicker({
			todayHighlight: true,
			format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
		});
		$('.end_dates').datepicker({
			todayHighlight: true,
			format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
		});
		$('.select2_equipments').select2({
			placeholder: '<?php echo e(__("equicare.select_option")); ?>',
			allowClear: true
		});
		$('.select2_hospital').select2({
			placeholder:'<?php echo e(__("equicare.select_option")); ?>',
			allowClear:true
		});
		var $i = 1;
		$('.add_btn').on('click',function(e){
			$i++;
			if($('.add_row_equipments').children('.row').length >= 1){
				$('.delete_row_btn').show();
			}else{
				$('.delete_row_btn').hide();
			}
			$(this).parent().siblings('.add_row_equipments').append(
				'<div class="row no-gutters">'+
				'<div class="form-group col-md-3">  '  +
				'	<select name="equipments[]" class="form-control select2_equipments" id="equipments'+$i+'">'  +
				'		<option></option>'+
				'	</select>'+
				'</div>  '  +
				'<div class="form-group col-md-3">  '  +
				' <input type="text" name="start_dates[]" id="start_dates'+$i+'" class="form-control start_dates" placeholder="<?php echo e(__("equicare.enter_start_date")); ?>">	'+
				'</div>  '  +
				'<div class="form-group col-md-3">  '  +
				' <input type="text" name="end_dates[]" id="end_dates'+$i+'" class="form-control end_dates" placeholder="<?php echo e(__("equicare.enter_end_date")); ?>">	'+
				' </div>  '  +
				' <div class="form-group col-md-3">  '  +
				' 	<?php echo Form::number('cost[]',null,['class'=>'form-control','placeholder'=>'<?php echo e(__("equicare.enter_cost")); ?>']); ?>  '  +
				' </div>  ' +
				' </div> ');
			$('#equipments'+$i).select2({
				placeholder: '<?php echo e(__("equicare.select_option")); ?>',
				allowClear: true
			});
			$('#start_dates'+$i).datepicker({
				todayHighlight: true,
				format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
			});
			$('#end_dates'+$i).datepicker({
				todayHighlight: true,
				format:"<?php echo e(env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
			});
		});

		if($('.add_row_equipments').children('.row').length > 1){
			$('.delete_row_btn').show();
		}
		$('.delete_row_btn').on('click',function(e){

			if($('.add_row_equipments').children('.row').length == 2){
				$('.delete_row_btn').hide();
			}else{
				$('.delete_row_btn').show();
			}
			e.preventDefault();
			$(this).parent().siblings('.add_row_equipments').children('.row :last').remove();
		});
		// setTimeout(loadEquipAjax,500);
		$('select[name=hospital_id]').on('change',function(){
			var hospital_id = $(this).val();
			$.ajax({
				url:"<?php echo e(url('get_equipment')); ?>",
				type:'get',
				data:{
					'hospital_id':hospital_id,
				},
				success:function(data){
					if(data.equipments.length == 0){
						alert('<?php echo e(__("equicare.select_other_hospital")); ?>');
					}else{
						$('.select2_equipments').empty();
						$('.select2_equipments').append(
							'<option value=""></option>');
							<?php $key = 0?>
						for(n in data.equipments){
							console.log(n);
							$('.select2_equipments').select2('destroy');
							if(n == <?php echo e(json_decode($maintenance_cost->equipment_ids,TRUE)[$key] ?? ''); ?>){
							$('.select2_equipments').append(
								'<option value='+n+' selected>'+data.equipments[n]+'</option>'
								);
							}else{
								$('.select2_equipments').append(
								'<option value='+n+'>'+data.equipments[n]+'</option>'
								);
							}
							<?php $key++;?>
						}
							$('.select2_equipments').select2({
								placeholder:'<?php echo e(__("equicare.select_option")); ?>',
								allowClear:true
							});
					}
				},
				error:function(data){

				}
			});
		});
	});
	function loadEquipAjax(){
		if($('select[name=hospital_id]').val()){
			$('select[name=hospital_id]').trigger('change');
		}
	}
</script>
<script type="text/javascript">
	$.ajaxSetup({ headers: { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css')); ?>">
<style type="text/css">
.no-gutters {
	margin-right: 0;
	margin-left: 0;
}
.no-gutters > .col-md-3,.no-gutters > .col-md-4 {
	padding-right: 10;
	padding-left: 0;
}

.is-invalid + span.select2-container{
	border:1px solid red !important;
}

.is-invalid{
	border:1px solid red !important;
}
.invalid-feedback{
	color:red;
}
.is-invalid < .iradio_minimal-blue{
	background: url(red.png) no-repeat;
}
.form-group{
	max-height: 62px;
}
.tp_details .row{
	display: block;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/maintenance_cost/edit.blade.php ENDPATH**/ ?>