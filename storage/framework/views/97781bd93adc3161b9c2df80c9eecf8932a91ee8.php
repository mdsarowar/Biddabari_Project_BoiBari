<div class="form-group">
    <label><?php echo e($label); ?></label>
    <br>
    <label class="switch">
      <input type="checkbox" name="<?php echo e($name); ?>" <?php echo e($checked == true ? 'checked' : ''); ?>>
      <span class="knob"></span>
    </label>
    <?php if(isset($helptext)): ?>
        <br>
        <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e($helptext); ?></small>
    <?php endif; ?>
  </div><?php /**PATH D:\xampp\htdocs\boibari\resources\views/components/forms/toggle.blade.php ENDPATH**/ ?>