
<?php $__env->startSection('title',__('Maintenance Mode |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Maintenance Mode Setting';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'Maintenance Mode Setting';
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
            <h5 class="box-title"><?php echo e(__('Setting')); ?> <?php echo e(__('Maintenance Mode')); ?></h5>
          </div>
          <div class="card-body">
            <form action="<?php echo e(route('get.m.post')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label><?php echo e(__('Allowed IP\'s')); ?>: </label>
                    <br>
                    <select required class="form-control select2" name="allowed_ips[]" multiple="multiple" id="allowed_ips">
                        <?php if(isset($data->allowed_ips)): ?>
                            <?php $__currentLoopData = $data->allowed_ips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($ip ? "selected" : ""); ?> value="<?php echo e($ip); ?>"><?php echo e($ip); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <?php $__errorArgs = ['allowed_ips'];
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
                    <br>
                    <small class="help-block text-info">
                        <i class="fa fa-question-circle"></i> <b><?php echo e(__('Your IP is:')); ?> <span class="text-dark"><?php echo e(Request::ip()); ?></span></b>
                    </small>
                </div>

                <div class="form-group">
                    <label><?php echo e(__("Maintenance mode message")); ?> <span class="text-danger">*</span></label>
                    <textarea class="editor form-control" name="message" id="message" cols="30" rows="10"><?php if($data): ?> <?php echo $data->message; ?> <?php else: ?> <?php echo e(old('message')); ?> <?php endif; ?></textarea>
                    <?php $__errorArgs = ['message'];
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

                <div class="form-group">
                    <label><?php echo e(__('Enable Maintenance mode:')); ?></label>
                    <br>
                    <label class="switch">
                        <input type="checkbox" name="status" <?php echo e(isset($data) && $data->status == 1 ? "checked" : ""); ?>>
                        <span class="knob"></span>
                    </label>
                    <br>
                    <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('Turn On the toggle to enable Maintenance mode')); ?></small>
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
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
<?php $__env->startSection('custom-script'); ?>
    <script>
        $('.allowed_ips').select2({
            placeholder: 'Enter IP',
            tags: true,
            tokenSeparators: [',', ' ']
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/maintenance/index.blade.php ENDPATH**/ ?>