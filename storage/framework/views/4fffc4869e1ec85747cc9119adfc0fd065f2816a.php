
<?php $__env->startSection('title',__('Edit Social Icon')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Edit Social Icon';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Social Icon';
  $data['title2'] = 'Edit Social Icon';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="row">
    <div class="col-lg-12">
      <?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>
      <div class="card m-b-30">
        <div class="card-header">

          <div class="row">
            <div class="col-lg-8">
              <h5 class="box-title"><?php echo e(__("Edit Social Icon")); ?> <?php if($row->icon == 'fb'): ?> <?php echo e(__("Facebook")); ?> <?php elseif($row->icon == 'tw'): ?> <?php echo e(__("Twitter")); ?> <?php else: ?> <?php echo e(ucfirst($row->icon)); ?> <?php endif; ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a href="<?php echo e(url('admin/social')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
          
          <!-- form start -->
          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/social/'.$row->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                       
                    <!-- row start -->
                    <div class="row">
                      
                      <!-- Url -->
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Url')); ?> <span class="text-danger">*</span></label>
                              <input type="text" value="<?php echo e($row->url ?? ''); ?>" autofocus="" class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="http://" name="url" required="">
                          </div>
                      </div>

                      <!-- Description -->
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Icon')); ?> <span class="text-danger">*</span></label>
                                <select name="icon" class="select2 form-control">
                                  <option value="youtube" <?php echo e($row->icon == 'youtube' ? 'selected="selected"' : ''); ?>><?php echo e(__("Youtube")); ?></option>
                                  <option value="linkedin" <?php echo e($row->icon == 'linkedin' ? 'selected="selected"' : ''); ?>><?php echo e(__("LinkedIn")); ?></option>
                                  <option value="pintrest" <?php echo e($row->icon == 'pintrest' ? 'selected="selected"' : ''); ?>><?php echo e(__("Pinterest")); ?></option>
                                  <option value="rss" <?php echo e($row->icon == 'rss' ? 'selected="selected"' : ''); ?> ><?php echo e(__('RSS Feed')); ?></option>
                                  <option value="googleplus" <?php echo e($row->icon == 'googleplus' ? 'selected="selected"' : ''); ?> ><?php echo e(__("Google+")); ?></option>
                                  <option value="tw" <?php echo e($row->icon == 'tw' ? 'selected="selected"' : ''); ?>><?php echo e(__("Twitter")); ?></option>
                                  <option value="fb" <?php echo e($row->icon == 'fb' ? 'selected="selected"' : ''); ?> ><?php echo e(__('Facebook')); ?></option>
                                  <option value="instagram" <?php echo e($row->icon == 'instagram' ? 'selected="selected"' : ''); ?>><?php echo e(__("Instagram")); ?></option>
                                </select>
                                <small class="txt-desc"><?php echo e(__("Please choose icon")); ?></small>
                          </div>
                      </div>

                        <!-- Status -->
                        <div class="form-group col-md-6">
                          <label for="exampleInputDetails"><?php echo e(__('Status')); ?> </label><br>
                          <label class="switch">
                            <input class="slider" type="checkbox" name="status" checked />
                            <span class="knob"></span>
                          </label><br>
                          <small>(<?php echo e(__("Please Choose Status")); ?>) </small>
                      </div>
                                    
                      <!-- create and close button -->
                      <div class="col-md-12">
                          <div class="form-group">
                              <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                              <?php echo e(__("Create")); ?></button>
                          </div>
                      </div>

                    </div><!-- row end -->
                                              
                  </form>
                  <!-- form end -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/social/edit.blade.php ENDPATH**/ ?>