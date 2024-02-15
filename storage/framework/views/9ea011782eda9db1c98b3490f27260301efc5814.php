
<?php $__env->startSection('title',__("Shipping Item : :order | ",['order' => $inv_cus->prefix.$invoice->inv_no.$inv_cus->postfix])); ?>
<?php $__env->startSection('body'); ?>

<?php $__env->startComponent('admin.component.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Shipping Item ')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Shipping Item ')); ?>

<?php $__env->endSlot(); ?>


<?php $__env->slot('button'); ?>
<div class="col-md-6">
  <div class="widgetbar">
    <a href="<?php echo e(route('admin.order.edit',$invoice->order->order_id)); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

  </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
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
            <h5 class="box-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Invoice Setting')); ?></h5>
            <?php if($invoice->variant): ?>
            <?php echo e(__("Shipping Item :")); ?> <?php echo e($invoice->variant->products->name); ?> (<?php echo e(variantname($invoice->variant)); ?>)  <?php echo e('#'.$inv_cus->prefix.$invoice->inv_no.$inv_cus->postfix); ?>

        <?php endif; ?>

        <?php if($invoice->simple_product): ?>
        <?php echo e(__("Shipping Item :")); ?> <?php echo e($invoice->simple_product->product_name); ?>  <?php echo e('#'.$inv_cus->prefix.$invoice->inv_no.$inv_cus->postfix); ?>

        <?php endif; ?>
          </div>
          <div class="card-body">
            <form action="<?php echo e(route("ship.item",$invoice->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
    
                <div class="form-group col-md-6">
                    
                    <label>
                        <?php echo e(__("Courier Channel:")); ?> <span class="required">*</span>
                    </label>
                    <input required placeholder="DHL" name="courier_channel" type="text" class="form-control" value="<?php echo e($invoice->courier_channel); ?>"/>
                       
                </div>

                <div class="form-group col-md-6">
                    <label>
                        <?php echo e(__("Courier tracking link OR Consignment No:")); ?> <span class="required">*</span>
                    </label>

                    <input required placeholder="2XXXX50" name="tracking_link" type="text" class="form-control" value="<?php echo e($invoice->tracking_link); ?>"/>

                </div>

                <div class="form-group col-md-6">
                    <label>
                        <?php echo e(__("Expected Delivery date:")); ?> <span class="required">*</span>
                    </label>

                    <input required placeholder="<?php echo e(now()->addDays(7)->format('Y-m-d')); ?>" name="exp_delivery_date" type="text" class="deliverydate form-control default-date" value="<?php echo e($invoice->exp_delivery_date ? date("Y-m-d",strtotime($invoice->exp_delivery_date)) : now()->addDays(7)->format('Y-m-d')); ?>"/>

                </div>

                <div class="form-group col-12">
                    <button type="submit" class="btn btn-md btn-primary">
                        <i class="fa fa-plane"></i> <?php echo e(__("Ship")); ?>

                    </button>
                </div>
                
    
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
    <script>
        $(".deliverydate").datepicker({
            dateFormat: "yy-mm-dd",
            minDate : "<?php echo e(date('Y-m-d',strtotime($invoice->created_at))); ?>"
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/updatestatus.blade.php ENDPATH**/ ?>