<?php $__env->startComponent('mail::message'); ?>
# <?php echo e("\#"); ?><?php echo e($hd->ticket_no); ?> <?php echo e(__('ticket request has been Recieved from')); ?> <?php echo e($get_user_name); ?> !

#<?php echo e($hd->issue_title); ?>

<?php echo e(strip_tags($hd->issue)); ?>


<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/emails/SendTicketToAdmin.blade.php ENDPATH**/ ?>