<?php $__env->startSection('body-title'); ?>
<?php echo app('translator')->get('equicare.equipments'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
| <?php echo app('translator')->get('equicare.equipments'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="active"><?php echo app('translator')->get('equicare.equipments'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.filters'); ?></h4>
			</div>
			<div class="box-body">
				<form method="get" class="form" action="<?php echo e(route('equipments.index')); ?>">
					<div class="row">
						<div class="form-group col-md-3">
							<label><?php echo app('translator')->get('equicare.hospital'); ?>: </label>
							<select name="hospital_id" class="form-control">
								<option value=""><?php echo app('translator')->get('equicare.select'); ?></option>
								<?php if(isset($hospitals)): ?>
								<?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($hospital->id); ?>"
									<?php if(isset($hospital_id) && $hospital_id==$hospital->id): ?>
									selected
									<?php endif; ?>
									>
									<?php echo e(ucfirst($hospital->name)); ?>

								</option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label><?php echo app('translator')->get('equicare.company'); ?>: </label>
							<select name="company" class="form-control">
								<option value=""><?php echo app('translator')->get('equicare.select'); ?></option>
								<?php if(isset($companies)): ?>
								<?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($company->company); ?>"
									<?php if(isset($companyy) && $companyy==$company->company): ?>
									selected
									<?php endif; ?>
									>
									<?php echo e(ucfirst($company->company)); ?>

								</option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</select>
						</div>
						<div class="form-group col-md-2">
							<label class="visibility">123</label>
							<input type="submit" value="excel" id="excel_hidden" name="excel_hidden" class="hidden"/>
							<input type="submit" value="pdf" id="pdf_hidden" name="pdf_hidden" class="hidden"/>
							<input type="submit" value="<?php echo app('translator')->get('equicare.submit'); ?>" class="btn btn-primary btn-flat form-control" />
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title"><?php echo app('translator')->get('equicare.manage_equipments'); ?>
					<?php if(\Auth::user()->hasDirectPermission('Create Equipments')): ?>
					<a href="<?php echo e(route('equipments.create')); ?>" class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a></h4>
					<?php endif; ?>
					<div class="export-btns">
					<?php echo Form::label('excel_hidden',__('equicare.export_excel'),['class' => 'btn btn-success btn-flat excel','name'=>'action','tabindex'=>1]); ?>

					<?php echo Form::label('pdf_hidden',__('equicare.export_pdf'),['class' => 'btn btn-primary btn-flat pdf','name'=>'action','tabindex'=>2]); ?>

					</div>
				</div>
				<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table_equipment">
						<thead class="thead-inverse">
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.qr_code'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.name'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.short_name'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.user'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.company'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.model'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.serial_no'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.department'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.unique_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.purchase_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.order_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.installation_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.warranty_date'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Equipments') || Auth::user()->hasDirectPermission('Delete Equipments')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($equipments)): ?>
							
							<?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td> <?php echo e($key+1); ?> </td>
								<?php
								// dd( (\App\QrGenerate::where('id',$equipment->qr_id)->first() !=null) ? (\App\QrGenerate::where('id',$equipment->qr_id)->first()->uid) : '');
								// \App\Equipment::select('*')->delete();
								$u_e_id = (\App\QrGenerate::where('id',$equipment->qr_id)->first() !=null ? (\App\QrGenerate::where('id',$equipment->qr_id)->first()->uid) : '')
								?>
								<td><img loading="lazy" src="<?php echo e(asset('/uploads/qrcodes/qr_assign/'.$u_e_id.'.png')); ?>" width="80px" /></td>
								<td> <?php echo e(ucfirst($equipment->name)); ?> </td>
								<td><?php echo e($equipment->short_name); ?></td>
								<td><?php echo e($equipment->user?ucfirst($equipment->user->name):'-'); ?></td>
								<td><?php echo e($equipment->company?? '-'); ?></td>
								<td><?php echo e($equipment->model ?? '-'); ?></td>
								<td><?php echo e($equipment->hospital?$equipment->hospital->name:'-'); ?></td>
								<td><?php echo e($equipment->sr_no); ?></td>
								
								<td><?php echo e(($equipment->get_department->short_name)??"-"); ?> (<?php echo e(($equipment->get_department->name) ??'-'); ?>)</td>
								<?php
									$uids = explode('/',$equipment->unique_id);
									$department_id = $uids[1];
									$department = \App\Department::withTrashed()->find($department_id);
									if (!is_null($department)) {
										$uids[1] = $department->short_name;
									}
									$uids = implode('/',$uids);
								?>
								
								<td><?php echo e($equipment->unique_id ?? ''); ?></td>
								<td><?php echo e(date_change($equipment->date_of_purchase)?? '-'); ?></td>
								<td><?php echo e(date_change($equipment->order_date)?? '-'); ?></td>
								<td><?php echo e(date_change($equipment->date_of_installation)??'-'); ?></td>
								<td><?php echo e(date_change($equipment->warranty_due_date)??'-'); ?></td>
								<?php if(Auth::user()->hasDirectPermission('Edit Equipments') || Auth::user()->hasDirectPermission('Delete Equipments')): ?>
								<td class="text-nowrap">
									<?php echo Form::open(['url' => 'admin/equipments/'.$equipment->id,'method'=>'DELETE','class'=>'form-inline']); ?>

									<?php if(Auth::user()->hasDirectPermission('Edit Equipments')): ?>
									<a href="<?php echo e(route('equipments.edit',$equipment->id)); ?>" class="btn bg-purple btn-sm btn-flat marginbottom" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i class="fa fa-edit"></i></a>
									<?php endif; ?>
									<a target="_blank" href="<?php echo e(route('equipments.history',$equipment->id)); ?>" class="btn bg-success btn-sm btn-flat marginbottom" title="<?php echo app('translator')->get('equicare.history'); ?>"><i class="fa fa-history"></i></a>
									<?php
									// \App\Equipment::select('*')->delete();
									$u_e_id = (\App\QrGenerate::where('id',$equipment->qr_id)->first() !=null ? (\App\QrGenerate::where('id',$equipment->qr_id)->first()->uid) : '')

									?>
									<a href="#" class="btn bg-success btn-sm btn-flat marginbottom" title="<?php echo app('translator')->get('equicare.qr_code'); ?>" data-uniqueid="<?php echo e($equipment->unique_id); ?>" data-url="<?php echo e(asset('uploads/qrcodes/qr_assign/'.$u_e_id.'.png')); ?>" data-toggle="modal" data-target="#qr-modal"><i class="fa fa-qrcode"></i></a>
									<input type="hidden" name="id" value="<?php echo e($equipment->id); ?>">
									<?php if(Auth::user()->hasDirectPermission('Delete Equipments')): ?>
									<button class="btn btn-warning btn-sm btn-flat marginbottom" type="submit" onclick="return confirm('<?php echo app('translator')->get('equicare.are_you_sure'); ?>')" title="<?php echo app('translator')->get('equicare.delete'); ?>"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
									<?php endif; ?>
									<?php echo Form::close(); ?>

								</td>
								<?php endif; ?>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th> # </th>
								<th> <?php echo app('translator')->get('equicare.qr_code'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.name'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.short_name'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.user'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.company'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.model'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.serial_no'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.department'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.unique_id'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.purchase_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.order_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.installation_date'); ?> </th>
								<th> <?php echo app('translator')->get('equicare.warranty_date'); ?> </th>
								<?php if(Auth::user()->hasDirectPermission('Edit Equipments') || Auth::user()->hasDirectPermission('Delete Equipments')): ?>
								<th> <?php echo app('translator')->get('equicare.action'); ?> </th>
								<?php endif; ?>
							</tr>
						</tfoot>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#data_table_equipment').DataTable();
			$('#qr-modal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var modal = $(this)
				modal.find('#qr-modal-iframe').attr('src','#');
				modal.find('.modal-title').html('QR Code for <strong>'+button.data('uniqueid')+'</strong>');
				modal.find('#qr-image').attr('src', button.data('url'));
			})
		} );
	</script>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('styles'); ?>
	<style type="text/css">
	#data_table_equipment{
		border-collapse: collapse !important;
	}
	.export-btns{
		display: inline-block;
		float: right;
	}
	</style>
<div class="modal fade" id="qr-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      	<div class="text-center">
        <!-- <iframe id="qr-modal-iframe" src="" width="100%" height="170" style="border:0; overflow:hidden;"></iframe> -->
        <img id="qr-image" src="" alt=""/>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/equipments/index.blade.php ENDPATH**/ ?>