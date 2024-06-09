<?php $__env->startSection('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('assets/1x/login-logo.png')); ?>"></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <form method="POST" action="<?php echo e(route('login')); ?>" aria-label="<?php echo e(__('Login')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group has-feedback">
                <label for="email" class="col-form-label text-md-right"><?php echo app('translator')->get('equicare.email_add'); ?> </label>
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                    name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>

            </div>

            <div class="form-group has-feedback">
                <label for="password" class="col-form-label text-md-right"><?php echo app('translator')->get('equicare.password'); ?> </label>


                <input id="password" type="password"
                    class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                <?php endif; ?>

            </div>

            <div class="form-group row">
                <div class="col-xs-12">
                    <div class="checkbox icheck login-block">
                        <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="remember">
                            <?php echo app('translator')->get('equicare.remember_me'); ?>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-flat pull-right">
                        <?php echo app('translator')->get('equicare.login'); ?>
                    </button>
                </div>
            </div>
            <a class="btn btn-link login-padding" href="<?php echo e(route('password.request')); ?>">
                <?php echo app('translator')->get('equicare.forgot_your_password'); ?>
            </a>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare\framework\resources\views/auth/login.blade.php ENDPATH**/ ?>