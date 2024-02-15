<?php $__env->startComponent('mail::message'); ?>

<?php echo e(__('For Order')); ?> <b>#<?php echo e($inv_cus->order_prefix.$inv->order->order_id); ?></b> <?php echo e(__('following item has been')); ?> <?php echo e($status); ?>.


<p><?php echo e(__('Item ')); ?>

<?php if(isset($inv->variant)): ?>
<?php
	$orivar = App\AddSubVariant::withTrashed()->findorfail($inv->variant_id);
	$i=0;
	$varcount = count($orivar->main_attr_value);
?>
<b><?php echo e($orivar->products->name); ?></b>
(<?php $__currentLoopData = $orivar->main_attr_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $orivars): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $i++; ?>
<?php
$getattrname = App\ProductAttributes::where('id',$key)->first()->attr_name;
$getvarvalue = App\ProductValues::where('id',$orivars)->first();
?>
<?php if($i < $varcount): ?>
<?php if(strcasecmp($getvarvalue->unit_value, $getvarvalue->values) != 0 && $getvarvalue->unit_value != null): ?>
<?php if($getvarvalue->proattr->attr_name == "Color" || $getvarvalue->proattr->attr_name == "Colour" || $getvarvalue->proattr->attr_name == "color" || $getvarvalue->proattr->attr_name == "colour"): ?>
<?php echo e($getvarvalue->values); ?>,
<?php else: ?>
<?php echo e($getvarvalue->values); ?><?php echo e($getvarvalue->unit_value); ?>,
<?php endif; ?>
<?php else: ?>
<?php echo e($getvarvalue->values); ?>,
<?php endif; ?>
<?php else: ?>
<?php if(strcasecmp($getvarvalue->unit_value, $getvarvalue->values) != 0 && $getvarvalue->unit_value != null): ?>
<?php if($getvarvalue->proattr->attr_name == "Color" || $getvarvalue->proattr->attr_name == "Colour" || $getvarvalue->proattr->attr_name == "color" || $getvarvalue->proattr->attr_name == "colour"): ?>
<?php echo e($getvarvalue->values); ?>

<?php else: ?>
<?php echo e($getvarvalue->values); ?><?php echo e($getvarvalue->unit_value); ?>

<?php endif; ?>
<?php else: ?>
<?php echo e($getvarvalue->values); ?>

<?php endif; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
) 
<?php endif; ?>

<?php if(isset($inv->simple_product)): ?>
<b><?php echo e($inv->simple_product->product_name); ?></b>
<?php endif; ?>

<?php echo e(__('has been')); ?> <b><?php echo e($status); ?></b>.
</p>
<?php echo e(__('Thanks,')); ?>

<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\xampp\htdocs\boibari\resources\views/email/orderstatus.blade.php ENDPATH**/ ?>