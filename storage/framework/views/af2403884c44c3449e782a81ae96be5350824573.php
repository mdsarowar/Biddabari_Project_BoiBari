<div class="form-group">

    <label for="<?php echo e($name); ?>"><?php echo e($label); ?> <?php if($required == true): ?> <span class='text-danger'>*</span> <?php endif; ?></label> 
    <input value="<?php echo e($value); ?>" type="text" <?php echo e($required == true ? 'required' : ''); ?> class="form-control <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder); ?>">
    
    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
       <span class="text-danger">
            <?php echo e($message); ?>

       </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div><?php /**PATH D:\xampp\htdocs\boibari\resources\views/components/forms/input.blade.php ENDPATH**/ ?>