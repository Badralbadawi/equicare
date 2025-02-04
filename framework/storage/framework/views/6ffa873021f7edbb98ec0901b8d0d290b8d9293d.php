<!DOCTYPE html>
<html>
<head>
	<title><?php echo app('translator')->get('equicare.calibration_single_sticker_generate'); ?></title>
	<style type="text/css">
		.container{
			width: 700px;
		}
		.card{
			width: 50%;
			display: inline-block;
			border: 1px solid;
			border-radius: 3%;
			padding:5px;
			float: left;
			margin-right: 10px;
			margin-bottom: 10px;
		}
		.card > span{
			line-height: 1.5;
			font-size: 12px;
		}
		.page-break {
		    page-break-after: always;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<?php
								// \App\Equipment::select('*')->delete();
								$u_e_id = (\App\QrGenerate::where('id',$calibration->equipment->qr_id)->first() !=null ? (\App\QrGenerate::where('id',$calibration->equipment->qr_id)->first()->uid) : '')
								
								?>
								
			<img src="<?php echo e(asset('/uploads/qrcodes/qr_assign/'.$u_e_id.'.png')); ?>" style="float:right; padding:5px; width: 100px;">
			<span><b><?php echo app('translator')->get('equicare.equipment_id'); ?> </b> : <?php echo e($calibration->equipment->unique_id); ?></span><br/>
			<span><b><?php echo app('translator')->get('equicare.equipment_name'); ?></b> : <?php echo e($calibration->equipment->name); ?></span>
			<br>
			<span><b><?php echo app('translator')->get('equicare.date_pm'); ?></b> :
				
				<?php echo e($calibration->equipment->pm ? date('Y-m-d',strtotime($calibration->equipment->pm->call_register_date_time)): '-'); ?>

			
				
				
			</span>
			<br/>
			<span><b><?php echo app('translator')->get('equicare.due_pm'); ?></b> :
				<?php echo e(($calibration->equipment->pm != null ) ? date_change($calibration->equipment->pm->next_due_date) : '-'); ?>

			</span>
			<br/>
			<span><b><?php echo app('translator')->get('equicare.calibration_date'); ?></b> : <?php echo e(date_change($calibration->date_of_calibration)); ?>

			</span>
			<br/>
			<span><b><?php echo app('translator')->get('equicare.calibration_due_date'); ?></b> : <?php echo e(date_change($calibration->due_date)); ?>

			</span>
			<br/>
			<span><b><?php echo app('translator')->get('equicare.engineer_contact_no'); ?></b> : <?php echo e($calibration->engineer_no); ?>

			</span>
		</div>
	</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/stickers/sticker_single.blade.php ENDPATH**/ ?>