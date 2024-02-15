<?php $__env->startSection('title',__("Forget Password ?")); ?>
<?php $__env->startSection('body'); ?>
<?php
    require_once(base_path().'/app/Http/Controllers/price.php');
?>
  <div class="body-content">
    <div class="container-fluid">
        <div class="sign-in-page">
            <div class="row justify-content-center">
              <div id="aniBox" class="col-md-6 sign-in">
                
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(Module::has('MimSms') && Module::find('MimSms')->isEnabled() && env('MIM_SMS_OTP_ENABLE') == 1 && env('DEFAULT_SMS_CHANNEL') == 'mim'): ?>
                        <?php echo $__env->make('mimsms::auth.forgetpassword', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled() && env('DEFAULT_SMS_CHANNEL') == 'exabytes'): ?>
                        <?php echo $__env->make('exabytes::auth.forgetpassword', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                      <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group has-feedback">
                          <label for="email"><?php echo e(__('Enter email to continue')); ?></label>
                          <input required="" value="<?php echo e(old('email')); ?>" type="email" name="email" class="form-control" placeholder="<?php echo e(__('Email')); ?>">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                          <?php endif; ?>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Send Password Reset Link')); ?>

                            </button>
                          </div>
                        </div>
                      
                      </form>
                    <?php endif; ?>
              </div>
            </div>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("front.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>