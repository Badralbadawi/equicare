<!DOCTYPE html>
<html>
<head>
	<title><?php echo app('translator')->get('equicare.time_pdf_report'); ?></title>
	<style type="text/css">
		.table ,td,th{
			border:1px solid;
		}
		td,th{
			padding: 2px 5px 2px 5px;
		}
		.table{
			border-collapse: collapse;
			width: 100%;
		}
	</style>
</head>
<body>
	<h2><?php echo app('translator')->get('equicare.time_pdf_report'); ?></h2>
	<?php
					function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
    if ($interval->d) { $result .= $interval->format("%d day(s) "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }

    return $result;
}
function convert_seconds($seconds)
 {
  $dt1 = new DateTime("@0");
  $dt2 = new DateTime("@$seconds");
  return format_interval($dt1->diff($dt2));
  }

function calculateIntervalAverage() {
	$arr = func_get_args();
    $offset = new DateTime('@0');

    foreach ($arr as  $int) {
    	$count_i = count($int);
    	foreach ($int as $interval) {

        	$offset->add($interval);
    	}
    }

    return convert_seconds(round($offset->getTimestamp() / $count_i));
}
					?>
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th> # </th>
				<th> <?php echo app('translator')->get('equicare.equip_id'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.call_type'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.attended_by'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.response_time'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.breakdown_time'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.attend_to_complete_time'); ?> </th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($call_entries) && $call_entries->count() > 0): ?>
			<?php $count=0;

			?>
			<?php $__currentLoopData = $call_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
			$count++;
			$reg_dt = new DateTime($entry->call_register_date_time);
			$attend_dt = new DateTime($entry->call_attend_date_time);
			$complete_dt = new DateTime($entry->call_complete_date_time);
// Response time
			$res_interval = $reg_dt->diff($attend_dt);
			$resposne_time = format_interval($res_interval);
			if ($entry->call_attend_date_time) {
				$res_avg[] = $res_interval;
			}

// Breakdown time
			$breakdown_interval = $reg_dt->diff($complete_dt);
			$breakdown_time = format_interval($breakdown_interval);
			if ($entry->call_register_date_time && $entry->call_complete_date_time) {
				$breakdown_avg[] = $breakdown_interval;
			}
// Attend to Complete time
	$attend_to_complete_interval = $attend_dt->diff($complete_dt);
	$attend_to_complete_time = format_interval($attend_to_complete_interval);
			if ($entry->call_attend_date_time && $entry->call_complete_date_time) {
				$attend_to_complete_avg[] = $attend_to_complete_interval;
			}
			?>

			<tr>
				<td> <?php echo e($count); ?></td>
				<td> <?php echo e($entry->equipment->unique_id); ?></td>
				<td> <?php echo e($entry->equipment->hospital->name); ?></td>
				<td> <?php echo e(ucfirst($entry->call_handle)); ?></td>
				<td> <?php echo e($entry->user_attended_fn->name ?? '-'); ?></td>
				<td> <?php echo e($entry->call_attend_date_time?$resposne_time:'-'); ?> </td>
				<td> <?php echo e($entry->call_complete_date_time?$breakdown_time:'-'); ?>

				</td>
				<td> <?php echo e($entry->call_complete_date_time?$attend_to_complete_time:'-'); ?>

				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
			<tr class="text-center">
				<td colspan="8"> No Data available </td>
			</tr>
			<?php endif; ?>

		</tbody>

		<tfoot>
			<tr>
				<th> # </th>
				<th> <?php echo app('translator')->get('equicare.equip_id'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.call_type'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.attended_by'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.response_time'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.breakdown_time'); ?> </th>
				<th> <?php echo app('translator')->get('equicare.attend_to_complete_time'); ?> </th>
			</tr>
		</tfoot>
	</table>
	<?php if(isset($res_avg)): ?>
				<input type="hidden" name="res_avg" id="res_avg" value="<?php echo e(calculateIntervalAverage($res_avg)); ?>"/>
				<?php endif; ?>
				<?php if(isset($breakdown_avg)): ?>
				<input type="hidden" name="brk_avg" id="brk_avg" value="<?php echo e(calculateIntervalAverage($breakdown_avg)); ?>"/>
				<?php endif; ?>
				<?php if(isset($attend_to_complete_avg)): ?>
				<input type="hidden" name="att_to_cmplt_avg" id="att_to_cmplt_avg" value="<?php echo e(calculateIntervalAverage($attend_to_complete_avg)); ?>"/>
				<?php endif; ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/reports/export_time_indicator_pdf.blade.php ENDPATH**/ ?>