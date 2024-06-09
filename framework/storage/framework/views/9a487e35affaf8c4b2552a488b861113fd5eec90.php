<?php $__env->startSection('body-title'); ?>
    <?php echo app('translator')->get('equicare.users'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    | <?php echo app('translator')->get('equicare.users'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(url('admin/users')); ?>"><?php echo app('translator')->get('equicare.users'); ?> </a></li>
    <li class="breadcrumb-item active"><?php echo app('translator')->get('equicare.create'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h4 class="box-title"><?php echo app('translator')->get('equicare.create_user'); ?></h4>
                </div>

                <div class="box-body ">
                    <?php echo $__env->make('errors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form class="form" method="post" action="<?php echo e(route('users.store')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" id="select_all" name="select_all" value="0" />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name"> <?php echo app('translator')->get('equicare.name'); ?> </label>
                                <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"> <?php echo app('translator')->get('equicare.email'); ?> </label>
                                <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="role"> <?php echo app('translator')->get('equicare.role'); ?> </label>
                                <select name="role" class="form-control select2_role">
                                    <option value=""> </option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password"> <?php echo app('translator')->get('equicare.password'); ?> </label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation"> <?php echo app('translator')->get('equicare.confirm_password'); ?> </label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hospitals"> <?php echo app('translator')->get('equicare.hospitals'); ?> <span class="select_all_msg"></span> </label>
                                <select class="select2_hospital form-control" multiple name="hospitals[]">
                                    <option value="selectAll" <?php if(old('hospitals') && in_array('selectAll', old('hospitals'))): ?> selected <?php endif; ?>>
                                        Select All
                                    </option>
                                    <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hospital->id); ?>"
                                            <?php if(old('hospitals') && in_array($hospital->id, old('hospitals'))): ?> selected <?php endif; ?>>
                                            <?php echo e($hospital->name ?? ''); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" value="<?php echo app('translator')->get('equicare.submit'); ?>" class="btn btn-primary btn-flat" />
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('.select2_hospital').select2({
            allowClear: true,
            placeholder: "<?php echo app('translator')->get('equicare.select_hospital'); ?>"
        });
        $('.select2_role').select2({
            allowClear: true,
            placeholder: "<?php echo app('translator')->get('equicare.select_role'); ?>"
        });
        $('.select2_hospital').on('select2:select', function() {
            if ($(this).val() !== null && $(this).val().includes('selectAll')) {
                // Select all options
                $('#select_all').val(1);
                $('.select_all_msg').text('(Select All option automatically assigns a new hospital to a user.)');
                $(this).val($(this).find('option').not(':first').map(function() {
                    return this.value;
                })).trigger('change');
            }
        });
				 $('.select2_hospital').on('select2:unselect', function() {
								$('#select_all').val(0);
                $('.select_all_msg').text('');
				 });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/users/create.blade.php ENDPATH**/ ?>