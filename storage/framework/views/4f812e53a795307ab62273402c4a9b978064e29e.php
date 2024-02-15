
<?php $__env->startSection('title',__('SEO Settings | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Seo Settings';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'Seo Settings';
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
          <h5 class="box-title"><?php echo e(__('Seo Settings')); ?></h5>
        </div>
        <div class="card-body">
        
         <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(route('seo.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo csrf_field(); ?>  
            <!-- row start -->
            <div class="row">
              
              <!-- Project Title -->
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="text-dark"><?php echo e(__('Project Title')); ?> <span class="text-danger">*</span></label>
                      <input placeholder="Enter project title (It will also show in title bar)" type="text" id="first-name" name="project_name" value="<?php echo e($seo->project_name ?? ''); ?>" class="form-control">
                  </div>
              </div>

              <!-- Metadata Description -->
              <div class="col-md-6">
                <div class="form-group">
                    <label class="text-dark"><?php echo e(__('Metadata Description')); ?> <span class="text-danger">*</span></label>
                    <input placeholder="<?php echo e(__("Enter meta data description")); ?>" type="text" id="first-name" name="metadata_des" value="<?php echo e($seo->metadata_des ?? ''); ?>" class="form-control">
                </div>
              </div>

              <!-- Metadata Keyword -->
              <div class="col-md-6">
                <div class="form-group">
                    <label class="text-dark"><?php echo e(__('Metadata Keyword')); ?> <span class="text-danger">*</span></label>
                    <input placeholder="<?php echo e(__("Enter Metadata Keyword, use comma to seprate it")); ?>" type="text" id="first-name" name="metadata_key" value="<?php echo e($seo->metadata_key ?? ''); ?>" class="form-control">
                </div>
              </div>

              <!-- Metadata Keyword -->
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="text-dark"><?php echo e(__('Google Analytics :')); ?></label>
                      <input placeholder="<?php echo e(__("Enter Google Analytics Key")); ?>" type="text" id="first-name" name="google_analysis" value="<?php echo e($seo->google_analysis ?? ''); ?>" class="form-control">
                  </div>
              </div>

                <!-- Facebook Pixel -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label class="text-dark"><?php echo e(__('Facebook Pixel :')); ?></label>
                      <input placeholder="<?php echo e(__('Please enter Facebook Pixel Code Key')); ?>" type="text" id="first-name" name="FACEBOOK_PIXEL_ID" value="<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>" class="form-control">
                  </div>
              </div>

              <!-- Generate Sitemap -->
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="text-dark"><?php echo e(__('Generate Sitemap :')); ?></label><br>
                      <a href="<?php echo e(url('/sitemap')); ?>" class="btn btn-md btn-warning-rgba"><?php echo e(__('Generate')); ?></a>
                      <?php if(@file_get_contents(public_path().'/sitemap.xml')): ?>
                      <?php echo e(__("Download")); ?> <a href="<?php echo e(url('/sitemap/download')); ?>">Sitemap.xml</a>
                      |
                      <?php echo e(__("View")); ?> <a href="<?php echo e(url('/sitemap.xml')); ?>"><?php echo e(__('Sitemap')); ?></a>
                      <?php endif; ?>
                  </div>
              </div>

              <!-- create and close button -->
              <div class="col-md-12">
                  <div class="form-group">
                      <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                      <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> title="This action is disabled in demo !" disabled="disabled" <?php endif; ?> class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i> <?php echo e(__("Save Settings")); ?></button>
                  </div>
              </div>

            </div><!-- row end -->
                                              
          </form>
          <!-- form end -->
        
         <!-- main content end -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/Seo/edit.blade.php ENDPATH**/ ?>