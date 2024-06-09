<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.maintenance_cost'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.maintenance_cost'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.maintenance_cost'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.maintenance_cost'); ?>
					<?php if(Auth::user()->hasDirectPermission('Create Maintenance Cost')): ?>
					<a href="<?php echo e(route('maintenance_cost.create')); ?>" class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a>
					<?php endif; ?>
				</h4>
			</div>
			<div class="box-body">
				<div class="table-responsive overflow_x_unset">
					<table id="data_table" class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.cost_Type'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.by'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
							</tr>
						</thead>
						<tbody>
							<?php $count=0; ?>
							<?php if(isset($maintenance_costs)): ?>
							<?php $__currentLoopData = $maintenance_costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $count++; ?>
							<tr>
								<td> <?php echo e($count); ?> </td>
								<td> <?php echo e(ucwords($cost->hospital->name)); ?> </td>
								<td> <?php echo e($cost->type=='amc'?'AMC':'CMC'); ?> </td>
								<?php
								if($cost->cost_by =='tp'){
									$text = 'Third Party';
								}else{
									$text = isset(\App\Setting::first()->company)?\App\Setting::first()->company:config('app.name');
								}
								?>
								<td> <?php echo e($text); ?> </td>
			                        <td >
										<?php echo Form::open(['url' => 'admin/maintenance_cost/'.$cost->id,'method'=>'DELETE','class'=>'form-inline']); ?>

										      <?php if(Auth::user()->hasDirectPermission('Edit Maintenance Cost')): ?>
											<a href="<?php echo e(route('maintenance_cost.edit',$cost->id)); ?>" class="btn bg-purple btn-sm btn-flat" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit"></i>  </a>
											<?php endif; ?> &nbsp;
				                            <input type="hidden" name="id" value="<?php echo e($cost->id); ?>">
				                            <button class="btn btn-view btn-info btn-sm btn-flat" type="button" title="<?php echo app('translator')->get('equicare.view'); ?>"  data-id="<?php echo e($cost->id); ?>"><span class="fa fa-eye" aria-hidden="true"></span></button>
					      		    <?php if(Auth::user()->hasDirectPermission('Delete Maintenance Cost')): ?>
				                            	<button class="btn btn-warning btn-sm btn-flat" type="submit" onclick="return confirm('<?php echo app('translator')->get('equicare.are_you_sure'); ?>')" title="<?php echo app('translator')->get('equicare.delete'); ?>"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
				                            <?php endif; ?>
				                        <?php echo Form::close(); ?>


									</td>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tbody>
							<tfoot>
								<tr>
									<th> # </th>
									<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.cost_Type'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.by'); ?> </th>
									<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="get_info"></div>

	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('scripts'); ?>
	
	<script src="<?php echo e(asset('assets/js/datetimepicker.js')); ?>" type="text/javascript"></script>
	<script type="text/javascript">
	$(function(){
		$(document).on('click','.btn-view',function(){
			$btn = $(this);
			id = $btn.data('id');
			$.ajax({
			url:"<?php echo e(route('maintenance_cost.get_info')); ?>",
			method:"POST",
			data:{
				id:id,
				'_token':"<?php echo e(csrf_token()); ?>"
			},beforeSend:function(){
				$('#get_info_modal').modal('hide');
				$btn.prop('disabled',true);
			},complete:function(){
				$btn.prop('disabled',false);
			},success:function(res){
				if (res == 'not_exist') {
					alert('Error: Not Exist');
				}else{
					$('#get_info').html(res);
					$('#get_info_modal').modal('show');

				}
			},
			error:function(res){
				console.log(res);
			}
			})
		});
	})
	</script>

	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css')); ?>">
	<style type="text/css">
	.select2-container{
		display: block;
	}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/maintenance_cost/index.blade.php ENDPATH**/ ?>