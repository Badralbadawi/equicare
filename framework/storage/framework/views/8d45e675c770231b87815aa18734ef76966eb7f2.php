<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.sticker'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	|  <?php echo app('translator')->get('equicare.s_calibrations'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.sticker'); ?></li>
<li class="active"><?php echo app('translator')->get('equicare.calibrations_sticker'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">	
			<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title"><?php echo app('translator')->get('equicare.filters'); ?></h4>
				</div>
				<div class="box-body">
					<form action="<?php echo e(route('admin/calibrations_sticker2')); ?>" style='with:100%;' name ='filter_form' class='filter_form'>
                    
					

					<div class="row">
						<div class="form-group col-md-3">
							<?php echo Form::label('hospital',__('equicare.hospital')); ?>

							<?php echo Form::select('hospital',$hospitals??[],$hospital??null,['class'=>'form-control select2_hospital','placeholder'=>__('equicare.select')]); ?>

						</div>
						<div class="form-group col-md-3">
							<?php echo Form::label('unique_id',__('equicare.equipment_id')); ?>

							<?php echo Form::select('unique_id',$equipments??[],$unique_id??null,['class'=>'form-control select2_equipment','placeholder'=>'Select']); ?>

						</div>
						<?php echo Form::hidden('excel',null,['class'=>'export_hidden']); ?>

						<?php echo Form::hidden('pdf',null,['class'=>'pdf_hidden']); ?>

						<div class="form-group col-md-1">
							<?php echo Form::submit(__('equicare.submit'),['class' => 'btn btn-primary btn-flat','style'=>'margin-top:25px;',
								'name' => 'action',
							]); ?>

							<input type="submit" value="excel" id="excel_hidden" name="excel_hidden" class="hidden"/>
								<input type="submit" value="pdf" id="pdf_hidden" name="pdf_hidden" class="hidden"/>
						</div>
						<div class="form-group col-md-1 col-lg-1 ">
							<a class="btn btn-primary" href="<?php echo e(route('admin.calibration.index')); ?>" style="margin-top:25px;margin-right:10px">Reset</a>
						</div>

						<div class="form-group col-md-2">
							<?php echo Form::submit(__('equicare.generate_stickers'),['class' => 'btn btn-primary btn-flat','style'=>'margin-top:25px;',
								'name' => 'action',
							]); ?>

						</div>
					</div>
					
					</form>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header">
					<h4 class="box-title"><?php echo app('translator')->get('equicare.calibration_sticker'); ?></h4>
				</div>
				<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead class="thead-inverse">
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.unique_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.equipment'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.pm_date'); ?></th>
								<th> <?php echo app('translator')->get('equicare.pm_due_date'); ?></th>
								<th> <?php echo app('translator')->get('equicare.calibration_date'); ?></th>
								<th> <?php echo app('translator')->get('equicare.calibration_due_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
							</tr>
						</thead>
						<tbody>
							
							<?php if(isset($calibrations) && count($calibrations) > 0): ?>
							<?php ($count = 0); ?>
							<?php $__currentLoopData = $calibrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calibration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							<?php ($count++); ?>
							<tr>
								<td> <?php echo e($count); ?> </td>
								<td><?php echo e($calibration->equipment?$calibration->equipment->hospital->name : '-'); ?>

								</td>
								<td><?php echo e($calibration->equipment->unique_id); ?></td>
								<td><?php echo e($calibration->equipment->name); ?></td>

								<td><?php echo e(($calibration->equipment->pm != null) ? date_change(date('Y-m-d',strtotime($calibration->equipment->pm->call_register_date_time))): '-'); ?>

								</td>	
								
								<td><?php echo e(($calibration->equipment->pm != null ) ? date_change($calibration->equipment->pm->next_due_date) : '-'); ?>

								</td>
								
								<td> <?php echo e(date_change($calibration->date_of_calibration)??'-'); ?>

								</td>
								
								<td> <?php echo e(date_change($calibration->due_date) ??'-'); ?></td>
								<td>
									
									<a href="<?php echo e(url('admin/calibrations_sticker',$calibration->id)); ?>" class="btn btn-flat btn-success btn-sm"><?php echo app('translator')->get('equicare.generate_single_sticker'); ?></a>
								</td>
								
								
								
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<tr class="text-center">
								<td colspan="8"><?php echo app('translator')->get('equicare.no_data_available'); ?></td>
							</tr>
						<?php endif; ?>
						</tbody>
						<tfoot>
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.unique_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.equipment'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.pm_date'); ?></th>
								<th> <?php echo app('translator')->get('equicare.pm_due_date'); ?></th>
								<th> <?php echo app('translator')->get('equicare.calibration_date'); ?></th>
								<th> <?php echo app('translator')->get('equicare.calibration_due_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
							</tr>
						</tfoot>
					</table>
				</div>
					<?php if(isset($calibrations)): ?>
					<div class="row">
						<div class="col-md-12">
							<?php echo $calibrations->render(); ?>

						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/datetimepicker.js')); ?>" type="text/javascript"></script>
	<script type="text/javascript">
		$(function() {

			$('.excel').on('click',function(){
			 	var clicked = $('.export_hidden').val("1");
			 	$('.filter_form').submit();
			});
			$('.pdf').on('click',function(){
			 	var clicked = $('.pdf_hidden').val("1");
			 	$('.filter_form').submit();
			});
			$('.select2_equipment, .select2_hospital').select2({
				allowClear:true,
				placeholder:"<?php echo e(__("equicare.select_option")); ?>"
			});
			$('select[name=hospital]').change(function(){
				var hospital_id = $(this).val();
				if(hospital_id){
				$.ajax({
					url:"<?php echo e(url('admin/calibrations_sticker/get_equipment')); ?>",
					type:"GET",
					data:{
						'hospital_id':hospital_id
					},
					success:function(data){
						$('.select2_equipment').empty();
						if(data.equipments.length == 0){
							alert('<?php echo e(__("equicare.select_other_hospital")); ?>');
						}
						$('.select2_equipment').append('<option val=""></option>');
						$('.select2_equipment').select2({
							data:data.equipments,
							placeholder: "<?php echo app('translator')->get('equicare.equipment_id'); ?>"
						});
						// for(key in data.equipments){
						// 	console.log(key,data.equipments[key]);
						// 	$('.select2_equipment').append('<option val="'+key+'">'+data.equipments[key]+'</option>');
						// }
					}
				});
				}
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css')); ?>">
	<style type="text/css">
		.table{
			border-collapse: collapse;
		}
	</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/stickers/calibrations_sticker.blade.php ENDPATH**/ ?>