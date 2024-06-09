<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	| <?php echo app('translator')->get('equicare.report_equipment'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.report'); ?></li>
<li class="active"><?php echo app('translator')->get('equicare.equipment_report'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h4 class="box-title"><?php echo app('translator')->get('equicare.filters'); ?></h4>
				</div>
				<div class="box-body">

					<?php echo Form::open(['method'=>'GET','style'=>'with:100%;','name'=>'filter_form','class'=>'filter_form','route'=>'equipment_report_post']); ?>


					<div class="row">
						<div class="form-group col-md-2">
							<?php echo Form::label('hospital',__('equicare.hospital')); ?>

							<?php echo Form::select('hospital',$hospitals??[],$hospital??null,['class'=>'form-control hospital_select','placeholder'=>'Select']); ?>

						</div>
						<?php echo Form::hidden('excel',null,['class'=>'export_hidden']); ?>

						<?php echo Form::hidden('pdf',null,['class'=>'pdf_hidden']); ?>

						<div class="form-group col-md-2">
							<?php echo Form::label('working_status',__('equicare.working_status')); ?>

							<?php echo Form::select('working_status',[
								'working' => __("equicare.working"),
								'not working' => __("equicare.not_working"),
								'pending' => __("equicare.pending")
								],$working_status??null,['placeholder' => 'Select','class' => 'form-control test working_status']); ?>

						</div>
						<div class="form-group col-md-2">
							<?php echo Form::submit(__('equicare.submit'),['class' => 'btn btn-primary btn-flat','style'=>'margin-top:25px;',
								'name' => 'action',
							]); ?>

							<input type="submit" value="excel" id="excel_hidden" name="excel_hidden" class="hidden"/>
								<input type="submit" value="pdf" id="pdf_hidden" name="pdf_hidden" class="hidden"/>

						</div>
					</div>

					<?php echo Form::close(); ?>

				</div>
			</div>
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.equipment_report'); ?></h4>
				<?php echo Form::label('excel_hidden',__('equicare.export_excel'),['class' => 'btn btn-success btn-flat excel','name'=>'action','tabindex'=>1]); ?>

				<?php echo Form::label('pdf_hidden',__('equicare.export_pdf'),['class' => 'btn btn-primary btn-flat pdf','name'=>'action','tabindex'=>2]); ?>

				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover">
						<thead class="thead-inverse">
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.unique_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.status'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.call_attended_by'); ?></th>
								<th> <?php echo app('translator')->get('equicare.call_register_date_time'); ?></th>
								<th> <?php echo app('translator')->get('equicare.call_complete_date_time'); ?></th>
								<th> <?php echo app('translator')->get('equicare.purchase_date'); ?> </th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($call_entries) && count($call_entries) > 0): ?>
							<?php
								$count = 0;
							?>
							<?php $__currentLoopData = $call_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $call_entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$count++;
							?>
							<tr>
								<td> <?php echo e($count); ?> </td>
								<td><?php echo e($call_entry->equipment?$call_entry->equipment->hospital->name : '-'); ?>

								</td>
								<td><?php echo e($call_entry->equipment->unique_id??'-'); ?></td>
								<td><?php echo e(ucwords($call_entry->working_status??'-')); ?>

								</td>
								<td><?php echo e($call_entry->user_attended_fn->name?? '-'); ?>

								</td>
								<td><?php echo e($call_entry->call_register_date_time?date('Y-m-d h:i A',strtotime($call_entry->call_register_date_time)): '-'); ?></td>
								<td><?php echo e($call_entry->call_complete_date_time?date('Y-m-d h:i A',strtotime($call_entry->call_complete_date_time)): '-'); ?></td>
								<td><?php echo e(date_change($call_entry->equipment->date_of_purchase)?? '-'); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<tr class="text-center">
								<td colspan="8"> <?php echo app('translator')->get('equicare.no_data_available'); ?></td>
							</tr>
						<?php endif; ?>
						</tbody>
						<tfoot>
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.unique_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.status'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.call_attended_by'); ?></th>
								<th> <?php echo app('translator')->get('equicare.call_register_date_time'); ?></th>
								<th> <?php echo app('translator')->get('equicare.call_complete_date_time'); ?></th>
								<th> <?php echo app('translator')->get('equicare.purchase_date'); ?> </th>amp; time</th>
							</tr>
						</tfoot>
					</table>
					<?php if(isset($call_entries) && empty($excel)): ?>
					<div class="row">
						<div class="col-md-12">
							<?php echo $call_entries->appends(request()->except('page','_token'))->render(); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/reports/equipment_report.blade.php ENDPATH**/ ?>