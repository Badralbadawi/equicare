<!DOCTYPE html>
<html>
<head>
	<title><?php echo app('translator')->get('equicare.equipment_report_pdf'); ?></title>
	<style type="text/css">
		.table ,td,th{
			border:1px solid;
		}
		td,th{
			padding: 2px 5px 2px 5px;
		}
		.table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h2> <?php echo app('translator')->get('equicare.equipment_report'); ?> </h2>
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
			<td><?php echo e($call_entry->equipment->unique_id); ?></td>
			<td><?php echo e(ucwords($call_entry->working_status??'-')); ?>

			</td>
			<td><?php echo e($call_entry->user_attended_fn->name?? '-'); ?>

			</td>
			<td><?php echo e($call_entry->call_register_date_time?date('Y-m-d h:i A',strtotime($call_entry->call_register_date_time)): '-'); ?></td>
			<td><?php echo e($call_entry->call_complete_date_time?date('Y-m-d h:i A',strtotime($call_entry->call_complete_date_time)): '-'); ?></td>
			<td><?php echo e(date_change($call_entry->equipment->date_of_purchase)?? '-'); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
			<th> <?php echo app('translator')->get('equicare.purchase_date'); ?> </th>
		</tr>
	</tfoot>
</table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/reports/export_equipment_pdf.blade.php ENDPATH**/ ?>