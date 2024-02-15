
<?php $__env->startSection('title',__('General Settings | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'General Settings';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'General Settings';
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
          <a href="<?php echo e(url()->previous()); ?>" class="float-right btn btn-md btn-primary-rgba"><i
              class="feather icon-arrow-left"></i> <?php echo e(__("Back")); ?></a>
          <h4 class="card-title"><?php echo e(__("Content Settings")); ?></h4>

        </div>
        <div class="card-body ml-2">
            <form method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/update/content')); ?>">
            <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><?php echo e(__("Writer Name")); ?>: <span class="required">*</span></label>
                            <input placeholder="<?php echo e(__('Writer Name')); ?>" type="text" name="writer" value="<?php echo e($settings->writer); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label><?php echo e(__("Content")); ?>: <span class="required">*</span></label><br>
                            <textarea name="content" id="editor1" rows="2" class="form-control"><?php echo e($settings->content); ?></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-success-rgba" value="Update">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/genral/content_page.blade.php ENDPATH**/ ?>