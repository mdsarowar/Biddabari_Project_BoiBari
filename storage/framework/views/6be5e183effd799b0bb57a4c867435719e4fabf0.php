<?php $__env->startSection('title',__('Register').' | '); ?>
<?php $__env->startSection("content"); ?>
<?php
    require_once(base_path().'/app/Http/Controllers/price.php');
    $userterm = App\TermsSettings::firstWhere('key','user-register-term');
?>
<?php $__env->startSection('stylesheet'); ?>
<style>
    .select2-selection__rendered {
        line-height: 38px !important;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
    }

    .select2-selection__arrow {
        height: 34px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        text-align: center;
    }
</style>
<?php $__env->stopSection(); ?>
<?php
    if(isset($selected_language) && $selected_language->rtl_available == 1){
        $class = 'offset-md-1';
    }else{
        $class = 'offset-md-3';
    }
?>
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <h4 class="checkout-subtitle"><?php echo e(__('Create a new account')); ?></h4>

            <?php if(Module::has('MimSms') && Module::find('MimSms')->isEnabled() && env('MIM_SMS_OTP_ENABLE') == 1 && env('DEFAULT_SMS_CHANNEL') == 'mim'): ?>
                <?php echo $__env->make('mimsms::auth.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php elseif(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled() && env('DEFAULT_SMS_CHANNEL') == 'exabytes'): ?>
                <?php echo $__env->make('exabytes::auth.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>

            
                
                <form class="form outer-top-xs" role="form" method="POST" action="<?php echo e(route('register')); ?>" novalidate>
                    <?php echo csrf_field(); ?>
                    <!-- create a new account -->

                    <div class="row">

                        <div class="<?php echo e($class); ?> col-md-6">
                            <p class="text-success"><?php echo e(__('Quick Sign up with')); ?> :</p>
                            <div class="social-btn text-center">

                                <?php if($configs->fb_login_enable=='1'): ?>
                                <a href="<?php echo e(route('sociallogin','facebook')); ?>" class="btn btn-primary btn-lg"><i
                                        class="fa fa-facebook"></i> <?php echo e(__('Facebook')); ?></a>
                                <?php endif; ?>

                                <?php if($configs->twitter_enable == 1): ?>
                                <a href="<?php echo e(route('sociallogin','twitter')); ?>" class="btn bg-twitter btn-lg"><i
                                        class="fa fa-twitter"></i> <?php echo e(__('Twitter')); ?></a>
                                <?php endif; ?>

                                <?php if($configs->google_login_enable=='1'): ?>
                                <a href="<?php echo e(route('sociallogin','google')); ?>" class="btn btn-danger btn-lg"><i
                                        class="fa fa-google"></i> <?php echo e(__('Google')); ?></a>
                                <?php endif; ?>

                                <?php if($configs->amazon_enable=='1'): ?>
                                <a href="<?php echo e(route('sociallogin','amazon')); ?>" class="btn btn-warning btn-lg"><i
                                        class="fa fa-amazon"></i> <?php echo e(__('Amazon')); ?></a>
                                <?php endif; ?>

                                <?php if(env('ENABLE_GITLAB') == 1 ): ?>
                                <a href="<?php echo e(route('sociallogin','gitlab')); ?>" class="btn bg-dark btn-lg"><i
                                        class="fa fa-gitlab"></i> <?php echo e(__('Gitlab')); ?></a>
                                <?php endif; ?>

                                <?php if($configs->linkedin_enable=='1'): ?>
                                <a href="<?php echo e(route('sociallogin','linkedin')); ?>" class="btn bg-primary btn-lg"><i
                                        class="fa fa-linkedin"></i> <?php echo e(__('Linkedin')); ?></a>
                                <?php endif; ?>


                            </div>



                        </div>


                        <div class="<?php echo e($class); ?> col-md-6">
                            <div class="form-group">
                                <label class="info-title"
                                    for="exampleInputEmail1"><?php echo e(__('Name')); ?><span>*</span></label>
                                <input required name="name" type="text" value="<?php echo e(old('name')); ?>"
                                    class="form-control unicase-form-control text-input<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                    id="name"> <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span> <?php endif; ?>


                            </div>
                        </div>















                        <div class="<?php echo e($class); ?> col-md-6">
                            <input hidden="" type="text" value="user@user.com" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="exampleInputEmail2" aria-describedby="emailHelp" name="email" >
                            <input hidden="" type="text" value="0" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="exampleInputEmail2" aria-describedby="emailHelp" name="type" >
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"><?php echo e(__('Mobile No')); ?>

                                    <span>*</span></label>
                                    <div class="row no-gutters">




    
                                        <div class="col-md-10">
                                            <input required  title="<?php echo e(__('Please enter valid mobile no')); ?>."
                                            value="<?php echo e(old('mobile')); ?>" type="text"
                                            class="form-control unicase-form-control text-input<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" name="mobile" id="phone" required>
                                        </div>
                                    </div>
                                    <?php if($errors->has('mobile')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('mobile')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="<?php echo e($class); ?> col-md-6">
                            <div class="form-group">
                                <label class="info-title" for="password"><?php echo e(__('Enter Password')); ?>

                                    <span>*</span></label>
                                <input required type="password" id="password"
                                    class="form-control unicase-form-control text-input <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                    name="password" required> <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span> <?php endif; ?>
                            </div>
                        </div>

                        <div class="<?php echo e($class); ?> col-md-6">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"><?php echo e(__('Confirm Password')); ?>

                                    <span>*</span></label>
                                <input required type="password" name="password_confirmation" id="password-confirm"
                                    class="form-control unicase-form-control text-input" required />



                            </div>
                        </div>

                        <?php if($aff_system->enable_affilate == 1): ?>
                        <div class="<?php echo e($class); ?> col-md-6">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"><?php echo e(__('Refer Code')); ?>

                                </label>
                                <input value="<?php echo e(app('request')->input('refercode') ?? old('refercode')); ?>" type="text"
                                    name="refer_code"
                                    class="<?php echo e($errors->has('refercode') ? ' is-invalid' : ''); ?> form-control unicase-form-control text-input" />

                                <?php if($errors->has('refercode')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('refercode')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>


                        <?php if($genrals_settings->captcha_enable == 1): ?>

                        <div class="<?php echo e($class); ?> col-md-6">
                            <div class="form-group">
                                <?php echo no_captcha()->display(); ?>

                            </div>

                            <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><b><?php echo e($message); ?></b></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <?php endif; ?>
                        <div class="<?php echo e($class); ?> col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="eula" id="eula" required>
                                    <label class="form-check-label" for="eula">
                                        <b><?php echo e(__('I agree to ')); ?><a href="#eulaModal"
                                                data-toggle="modal"><?php echo e(__('terms and conditions')); ?></a></b>
                                    </label>
                                </div>
                            </div>
                            <span> Already have account  <a class="text-info"
                                       href="<?php echo e(route('user_login')); ?>"><?php echo e(__('login here?')); ?></a></span>
                        </div>

                        <div class="<?php echo e($class); ?> col-md-6">
                            <button type="submit"
                                class="register btn-upper btn btn-primary checkout-page-button"><?php echo e(__('Register')); ?></button>

                        </div>


                    </div>

                    

                    <div id="eulaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="my-modal-title"><?php echo e($userterm['title']); ?></h5>

                                </div>
                                <div class="modal-body">
                                    <div style="overflow: scroll;max-height:500px">

                                        <?php echo $userterm['description']; ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- /.body-content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    "use strict";

    var baseurl = <?php echo json_encode(url('/'), 15, 512) ?>;
    $(function () {
        $('.select2').select2({
            height: '100px'
        });
    });
</script>
<script src="<?php echo e(url('js/ajaxlocationlist.js')); ?>"></script>
<?php if($genrals_settings->captcha_enable == 1): ?>
    <?php echo no_captcha()->script(); ?>

<?php endif; ?>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('form');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $('.register').html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i> <?php echo e(__("Register")); ?>');
                    }
                    form.classList.add('was-validated');

                }, false);

            });
        }, false);
    })();
</script>
<?php echo $__env->yieldPushContent('module-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("front.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/auth/register.blade.php ENDPATH**/ ?>