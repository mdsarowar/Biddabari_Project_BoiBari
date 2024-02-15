
<?php $__env->startSection('title','Emart | Help Desk'); ?>
<?php $__env->startSection('head-script'); ?>
<!-- TinyMCE Editor -->
<script src="<?php echo e(url('admin/plugins/tinymce/tinymce.min.js')); ?>" referrerpolicy="origin"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?> 


    <!-- Home Start -->
    <section id="home" class="home-main-block product-home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb" class="breadcrumb-main-block">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="<?php echo e(__('Home')); ?>"><?php echo e(__('Home')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Helpdesk & Support')); ?></li>
              </ol>
            </nav>
            <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('frontend/assets/images/checkout/breadcrumb.png');">
              <div class="breadcrumb-nav">
                <h3 class="breadcrumb-title"><?php echo e(__('Helpdesk & Support')); ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home End -->

        <!-- Help Start -->
        <section id="help" class="help-main-block">
            <div class="container">
                <form novalidate class="form" action="<?php echo e(route('hdesk.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputIssue" class="form-label"><?php echo e(__('Issue')); ?>: <span class="required">*</span></label>
                                <input required type="text" name="issue_title" class="<?php $__errorArgs = ['issue_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control">
                                <?php $__errorArgs = ['issue_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><?php echo e(__('Image')); ?>: <span class="required">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="file" name="image" class="<?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label"><?php echo e(__('Describe your Issue')); ?> <span class="required">*</span></label>
                                <textarea required name="issue" id="editor1" cols="10" rows="10" class="<?php $__errorArgs = ['issue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"></textarea>
                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" title="create ticket" class="btn btn-primary">Create Ticket</button>
                </form>
            </div>
        </section>
            <!-- Help End -->



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/helpdesk.blade.php ENDPATH**/ ?>