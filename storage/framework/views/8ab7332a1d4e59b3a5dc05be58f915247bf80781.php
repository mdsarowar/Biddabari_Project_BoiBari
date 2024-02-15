
<?php $__env->startSection('title',__('Custom Style and Javascript')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Custom Style';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Custom Style';
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
          <h5 class="box-title">
            <?php echo e(__('Custom Style Setting')); ?>

          </h5>
        </div>
        <div class="card-body ml-2">
          <form action="<?php echo e(route('css.store')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

           <div class="form-group">
              <label for="css"><?php echo e(__("Custom CSS")); ?>:</label>
                <small class="text-danger"><?php echo e($errors->first('css',__('CSS Cannot be blank !'))); ?></small>
              <textarea placeholder="a {
                color:red;
              }"  id="he" class="form-control" name="css" rows="10" cols="30"><?php if(isset($css)): ?> <?php echo e($css); ?> <?php endif; ?></textarea>
           </div>
          
          <div class="form-group">
             <input <?php if(env('DEMO_LOCK') == 0): ?> type="submit" <?php else: ?> disabled="" title="<?php echo e(__("This operation is disabled in Demo !")); ?>" <?php endif; ?>  value="ADD CSS" class="btn btn-md btn-primary-rgba">
          </div>
          </form>
        </div>
      </div>
      
    </div>
    
    <div class="col-lg-12">
      <div class="card m-b-30">
        
        <div class="card-body ml-2">
          <form action="<?php echo e(route('js.store')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

          <label for="js"><?php echo e(__('Custom JS')); ?>:</label>
          <small class="text-danger"><?php echo e($errors->first('js',__('Javascript Cannot be blank !'))); ?></small>
          <textarea required placeholder="$(document).ready(function{
            //code
        });" class="form-control" name="js" rows="10" cols="30"><?php if(isset($js)): ?> <?php echo e($js); ?> <?php endif; ?></textarea>
       <br>
           
        <div class="form-group">
          <input <?php if(env('DEMO_LOCK') == 0): ?> type="submit" <?php else: ?> disabled="" title="<?php echo e(__("This operation is disabled in Demo !")); ?>" <?php endif; ?> value="ADD JS" class="btn btn-md btn-primary-rgba">
        </div> 
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/customstyle/add.blade.php ENDPATH**/ ?>