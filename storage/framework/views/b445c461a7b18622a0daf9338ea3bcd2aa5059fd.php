
<?php $__env->startSection('title',__('Edit Abuse')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Abuse';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'Abuse';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">
  <div class="row">
   
    <div class="col-lg-12">
      <?php if($errors->any()): ?>
      <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="color:red;">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Abuse')); ?></h5>
        </div>
        <div class="card-body">

          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/abuse/')); ?>"
            data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

              <div class="row"> 
 
            <div class="form-group col-md-12">
              <label class="control-label" for="first-name">
                <?php echo e(__('Abuse Words')); ?> <span class="required">*</span>
              </label>
           
                <input placeholder="Please enter Abuse Word" type="text" id="first-name" data-role="tagsinput"
                  name="name" value=" <?php echo e($abuse->name); ?> " class="form-control">

            </div>
            <div class="form-group col-md-12">
              <label class="control-label" for="first-name">
                Replace Words <span class="required">*</span>
              </label>
              
                <input placeholder="<?php echo e(__('Please enter Replace Word')); ?>" type="text" id="first-name" name="rep"
                  data-role="tagsinput" value=" <?php echo e($abuse->rep); ?> " class="form-control">

            </div>

            <div class="form-group col-md-12">
              <label class="control-label " for="first-name">
                <?php echo e(__('Status')); ?>

              </label>
                <br>
              
                <label class="switch">
                  <input <?php echo ($abuse->status=='1')?'checked':'' ?> id="toggle-event3" type="checkbox">
                  <span class="knob"></span>
                  <input type="hidden" name="status" value="<?php echo e($abuse->status ?? ''); ?>" id="status3">

                </label>
              
            </div>
        
            <div class="form-group col-md-12">
              <button <?php if(env('DEMO_LOCK')==0): ?> type="reset"  <?php else: ?> disabled title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?>  class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
              <button <?php if(env('DEMO_LOCK')==0): ?>  type="submit" <?php else: ?> disabled title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?>  class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Update')); ?></button>
          </div>
          <div class="clear-both"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/abuse/edit.blade.php ENDPATH**/ ?>