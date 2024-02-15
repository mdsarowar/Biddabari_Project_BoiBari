
<?php $__env->startSection('title',__('Terms Settings | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Terms Settings';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'Terms Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">
  <!-- Start row -->
  <div class="row">
      <!-- Start col -->
      <div class="col-md-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="card-title"><?php echo e(__("Terms Settings")); ?></h5>
              </div>
              <div class="card-body">
                  <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-user mr-2"></i><?php echo e(__("User term setting")); ?></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-users mr-2"></i><?php echo e(__("Seller term setting")); ?></a>
                      </li>
                      
                  </ul>
                  <div class="tab-content" id="defaultTabContentLine">
                      <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                        <form method="POST" action="<?php echo e(route('update.term.setting',$userTerm->key)); ?>">
                          <?php echo csrf_field(); ?>

                          <div class="form-group">
                              <label for="title"><?php echo e(__("Title:")); ?> <span class="required">*</span></label>
                              <input required placeholder="<?php echo e(__("Enter title")); ?>" id="title" class="form-control" type="text" name="title" value="<?php if(old('title')): ?> <?php echo e(old('title')); ?> <?php elseif(isset($userTerm)): ?><?php echo e($userTerm['title']); ?><?php endif; ?>">

                              <?php $__errorArgs = ['title'];
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

                          <div class="form-group">
                              <label><?php echo e(__("Description:")); ?> <span class="required">*</span></label>
                              <textarea placeholder="<?php echo e(__('Enter content')); ?>" class="editor" name="description" id="description" cols="30" rows="10"><?php if(old('content')): ?> <?php echo e(old('content')); ?> <?php elseif(isset($userTerm)): ?><?php echo $userTerm['description']; ?><?php endif; ?></textarea>

                              <?php $__errorArgs = ['description'];
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

                          <div class="form-group">
                            <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Update")); ?></button>
                          </div>
                      </form>
                      </div>
                      <div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
                        <form method="POST" action="<?php echo e(route('update.term.setting',$sellerTerm->key)); ?>">
                          <?php echo csrf_field(); ?>
  
                          <div class="form-group">
                              <label for="title"><?php echo e(__('Title:')); ?> <span class="required">*</span></label>
                              <input required placeholder="<?php echo e(__("Enter title")); ?>" id="title" class="form-control" type="text" name="title" value="<?php if(old('title')): ?> <?php echo e(old('title')); ?> <?php elseif(isset($sellerTerm)): ?><?php echo e($sellerTerm['title']); ?><?php endif; ?>">
  
                              <?php $__errorArgs = ['title'];
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
  
                          <div class="form-group">
                              <label><?php echo e(__("Description:")); ?> <span class="required">*</span></label>
                              <textarea placeholder="<?php echo e(__('Enter content')); ?>" class="editor" name="description" id="description" cols="30" rows="10"><?php if(old('content')): ?> <?php echo e(old('content')); ?> <?php elseif(isset($sellerTerm)): ?><?php echo $sellerTerm['description']; ?><?php endif; ?></textarea>
  
                              <?php $__errorArgs = ['description'];
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
  
                          <div class="form-group">
                            <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Update")); ?></button>
                          </div>
                      </form>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>

<?php $__env->stopSection(); ?>     
               
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/terms/term.blade.php ENDPATH**/ ?>