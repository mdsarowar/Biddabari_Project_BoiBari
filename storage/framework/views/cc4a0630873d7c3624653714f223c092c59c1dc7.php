<?php $__env->startComponent('mail::message'); ?>
<?php echo e(__('#')); ?> <?php echo e("\#"); ?><?php echo e($hd->ticket_no); ?> <?php echo e(__('has been created !')); ?>


#<?php echo e($hd->issue_title); ?>

<?php echo e(strip_tags($hd->issue)); ?>


<hr>
<?php echo e(__('Sorry for the trouble which occurs to you,')); ?>

<br>
<?php echo e(__('We will get in touch with this email id for further process.')); ?>

<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\xampp\htdocs\boibari\resources\views/email/ticket.blade.php ENDPATH**/ ?>