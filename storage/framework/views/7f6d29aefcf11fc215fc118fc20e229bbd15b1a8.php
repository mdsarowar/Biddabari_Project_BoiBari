
<?php $__env->startSection('title',__('News Latter | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'News Latter';
  $data['title0'] = 'Footer';
  $data['title1'] = 'News Latter';
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
          <a href="<?php echo e(url()->previous()); ?>" class="float-right btn btn-md btn-primary-rgba"><i class="feather icon-arrow-left"></i> <?php echo e(__("Back")); ?></a>
          <h4 class="card-title"><?php echo e(__("News Latter")); ?></h4>

        </div>
        <div class="card-body ml-2">
            <form method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/update/news')); ?>">
            <?php echo csrf_field(); ?>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><?php echo e(__("Heading")); ?>:</label>
                            <input type="text" name="heading" value="<?php echo e($footer->heading); ?>" class="form-control" placeholder="Heading">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><?php echo e(__("Sub Heading")); ?>:</label>
                            <input type="text" name="sub_heading" value="<?php echo e($footer->sub_heading); ?>" class="form-control" placeholder="Sub Heading">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label text-dark" for="first-name"> <?php echo e(__("Image")); ?>: </label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="image" class="inputfile inputfile-1" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
                                </div>
                            </div>
                            <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(<?php echo e(__('Please choose image')); ?>)</small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img src="<?php echo e(url('images/newslatter/'.$footer->image)); ?>" height="100px">
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
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/footer/newslatter.blade.php ENDPATH**/ ?>