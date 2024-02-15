
<?php $__env->startSection('title',__('Manage Bank Details |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Bank Details';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'Bank Details';
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
          <h5 class="box-title"><?php echo e(__('Edit')); ?> <?php echo e(__(' Bank Details')); ?></h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/bank_details/')); ?>"
          data-parsley-validate class="form-horizontal form-label-left">
          <?php echo e(csrf_field()); ?>

     
       
         <div class="row">
      
          <div class="form-group col-md-6">
            <label class="control-label" for="first-name">
              <?php echo e(__("Enable Bank transfer on checkout page")); ?>:
            </label>
            <br>
      
              <label class="switch">
                <input type="checkbox" name="BANK_TRANSFER" <?php echo e(env('BANK_TRANSFER') == 1 ? "checked" : ""); ?>>
                <span class="knob"></span>
              </label>
      
          </div>
      
          <div class="form-group col-md-6">
            <label class="control-label" for="first-name">
              <?php echo e(__('Bank Name')); ?> <span class="required">*</span>
            </label>
      
              <input placeholder="<?php echo e(__("Please enter bank name")); ?>" type="text" id="first-name" name="bankname"
                class="form-control" value="<?php echo e($bank->bankname ?? ''); ?> ">
      
          </div>

          <div class="form-group col-md-6">
            <label class="control-label" for="first-name">
              <?php echo e(__("Branch Name")); ?> <span class="required">*</span>
            </label>
      
              <input placeholder="<?php echo e(__("Please enter branch name")); ?>" type="text" id="first-name" name="branchname"
                class="form-control" value="<?php echo e($bank->branchname ?? ''); ?> ">
      
          </div>


          <div class="form-group col-md-6">
            <label class="control-label" for="first-name">
              <?php echo e(__("IFSC Code")); ?> <span class="required">*</span>
            </label>
      
              <input placeholder="<?php echo e(__("Enter IFSC code")); ?>" type="text" id="first-name" name="ifsc"
                class="form-control col-md-12" value="<?php echo e($bank->ifsc ?? ''); ?> ">
      
          </div>


          <div class="form-group col-md-6">
            <label class="control-label" for="first-name">
              <?php echo e(__("SWIFT Code")); ?>:
            </label>
      
              <input placeholder="<?php echo e(__("Enter SWIFT code")); ?>" type="text" id="first-name" name="swift_code"
                class="form-control col-md-12" value="<?php echo e($bank->swift_code ?? ''); ?>">
      
          </div>


          <div class="form-group col-md-6">
            <label class="control-label" for="first-name">
              <?php echo e(__("Account Number")); ?> <span class="required">*</span>
            </label>
      
              <input placeholder="<?php echo e(__("Enter account no.")); ?>" type="text" id="first-name" name="account"
                class="form-control col-md-12" value="<?php echo e($bank->account ?? ''); ?>">
      
          </div>


          <div class="form-group col-md-6">
            <label class="control-label" for="first-name">
              <?php echo e(__('Account Name')); ?> <span class="required">*</span>
            </label>
      
              <input placeholder="<?php echo e(__("Enter account name")); ?>" type="text" id="first-name" value="<?php echo e($bank->acountname ?? ''); ?>"
                name="acountname" class="form-control col-md-12">
      
          </div>

      
          <div class="form-group col-md-12">
            <button <?php if(env('DEMO_LOCK')==0): ?> type="reset"  <?php else: ?> disabled title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?>  class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
            <button <?php if(env('DEMO_LOCK')==0): ?>  type="submit" <?php else: ?> disabled title="<?php echo e(__("This operation is disabled is demo !")); ?>" <?php endif; ?>  class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                <?php echo e(__("Update")); ?></button>
        </div>
        <div class="clear-both"></div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/bankDetail/edit.blade.php ENDPATH**/ ?>