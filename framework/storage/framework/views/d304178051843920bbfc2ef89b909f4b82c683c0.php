<?php $__env->startSection('content'); ?>
	<div class="row">
	<div class='col-md-8 col-md-offset-2'>
		<h1><center><span  class="font100size"><?php echo app('translator')->get('equicare.401'); ?></span><br>
		<b><?php echo app('translator')->get('equicare.access'); ?></b> <?php echo app('translator')->get('equicare.denied'); ?></center></h1>
	</div>
	<br/>
	<div class='col-md-8 col-md-offset-2'>
		<center><a href="<?php echo e(url()->previous()); ?>"><?php echo app('translator')->get('equicare.back'); ?></a></center>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/errors/401.blade.php ENDPATH**/ ?>