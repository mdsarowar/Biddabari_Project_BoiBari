<form action="<?php echo e(route('brand.quick.update',$id)); ?>" method="POST">
      <?php echo e(csrf_field()); ?>

   <button   <?php if(env('DEMO_LOCK') == 0): ?> type="submit" <?php else: ?> disabled title="<?php echo e(__("This operation is disabled in Demo !")); ?>" <?php endif; ?> class="btn btn-rounded <?php echo e($status==1 ? "btn-success-rgba" : "btn-danger-rgba"); ?>">
        <?php echo e($status ==1 ? __('Active') : __('Deactive')); ?>

   </button>
</form> 
<?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/brand/status.blade.php ENDPATH**/ ?>