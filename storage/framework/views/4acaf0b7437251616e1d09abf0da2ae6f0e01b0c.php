
<?php $__env->startSection('title','Emart | Contact us'); ?>
<?php $__env->startSection("content"); ?>   

<!-- Home Start -->
<section id="home" class="home-main-block">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <nav aria-label="breadcrumb" class="breadcrumb-main-block">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Contact Form')); ?></li>
            </ol>
        </nav>
        <div class="about-breadcrumb-block contact-breadcrumb" style="background-image: url('frontend/assets/images/contact/contact_bg.png');">
            <div class="overlay-bg"></div>
            <div class="breadcrumb-nav">
                <h3 class="breadcrumb-title"><?php echo e(__('Contact Form')); ?></h3>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- Home End -->

<!-- Strategy Start -->
<section id="strategy" class="strategy-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="strategy-title">We’re here available for you 24/7</h4>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et.</p>
            </div>
        </div>
    </div>
</section>
<!-- Strategy End -->

<!-- Contact Start -->
<section id="contact-us" class="contact-us-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="contact-us-block">
                    <div class="contact-img">
                        <img src="<?php echo e(url('frontend/assets/images/contact/map-location.png')); ?>" class="img-fluid" alt="">
                    </div>
                    <div><a href="#" title="Address"><?php echo e($settings['address']); ?></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="contact-us-block">
                    <div class="contact-img">
                        <img src="<?php echo e(url('frontend/assets/images/contact/phone.png')); ?>" class="img-fluid" alt="">
                    </div>
                    <div><a href="tel:+<?php echo e($settings['mobile']); ?>" title="Phone No."><?php echo e($settings['mobile']); ?></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="contact-us-block">
                    <div class="contact-img">
                        <img src="<?php echo e(url('frontend/assets/images/contact/email.png')); ?>" class="img-fluid" alt="">
                    </div>
                    <div><a href="mailto: <?php echo e($settings['email']); ?>" title="Email"><?php echo e($settings['email']); ?></a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="contact-us-block">
                    <div class="contact-img">
                        <img src="<?php echo e(url('frontend/assets/images/contact/world-wide-web.png')); ?>" class="img-fluid" alt="">
                    </div>
                    <div><a href="mailto: <?php echo e($settings['email']); ?>" title="Email"><?php echo e($settings['email']); ?></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact End -->

<!-- Contact Form Start -->
<section id="contact-form" class="contact-form-main-block">
    <div class="container">
        <div class="contact-form-block">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="section-title"><?php echo e(__('Drop Message')); ?></h3>
                    <form action="<?php echo e(route('get.connect')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">

                                    <label for="firstname" class="form-label"><?php echo e(__('Your Name')); ?></label>
                                    <input required name="name" type="text" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control unicase-form-control text-input" id="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Enter Name')); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">

                                    <label class="form-label" for="email"><?php echo e(__('Email')); ?> <span class="text-danger">*</span></label>
                                    <input required name="email" type="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control unicase-form-control text-input" id="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Enter Email')); ?>">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">

                                    <label class="form-label" for="mobile"><?php echo e(__('Mobile No.')); ?></label>
                                    <input type="number" class="<?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control unicase-form-control text-input" id="mobile" value="<?php echo e(old('mobile')); ?>" placeholder="<?php echo e(__('Enter Mobile No.')); ?>">
                                    <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">

                                    <label class="form-label" for="subject"><?php echo e(__('Subject')); ?>: <span class="text-danger">*</span></label>
                                    <input required name="subject" required type="text" class="<?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control unicase-form-control text-input" id="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('Please Enter Subject')); ?>">
                                    <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="mb-3">

                                    <label class="form-label" for="message"><?php echo e(__('Message')); ?><span class="text-danger">*</span></label>
                                    <textarea rows="5" cols="30" name="message" required placeholder="<?php echo e(__('Please Enter Message')); ?>" class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> unicase-form-control" id="message"><?php echo e(old('message')); ?></textarea>
                                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact-form-btn">
                                    <input type="submit" class="btn btn-primary" value="Send Message">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form End -->
<section id="contact-form" class="contact-form-main-block">
    <div class="container">
        <div class="contact-form-block">
            <div class="row">
                <iframe width="600" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=450&amp;hl=en&amp;q=<?php echo e($settings['address']); ?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- Map Start -->
<section id="map-block" class="map-main-block">
    <div class="container">
        <!-- <div id="map"></div> -->
    </div>
</section>
<!-- Map End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/contact_us.blade.php ENDPATH**/ ?>