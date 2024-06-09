<?php if(count($errors) > 0): ?>
	<div class="row">
        <div class="col-md-8">
			<div class="alert alert-danger">
			    <ul class=" mb-0">
			    	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        		<li><?php echo e($error); ?></li>
		    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </ul>
			</div>
		</div>
	</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/errors/list.blade.php ENDPATH**/ ?>