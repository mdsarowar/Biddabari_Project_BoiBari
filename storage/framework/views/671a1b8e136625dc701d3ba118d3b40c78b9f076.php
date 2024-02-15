
<?php $__env->startSection('title',__('My Chats')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'My Chats';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'My Chats';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
    <div class="row">
      
      <div class="col-lg-12">

        <?php if($errors->any()): ?>
          <div class="alert alert-danger" role="alert">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>
                    <?php echo e($error); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>

        <div class="card m-b-30">
          <div class="card-header">
            <h5 class="card-title">
                <i class="feather icon-message-circle"></i>
                <?php echo e(__('My Chats')); ?> (<?php echo e($conversations->count()); ?>)
            </h5>

          </div>

          <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <?php $__empty_1 = true; $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   
                        <div class="shadow-sm card mb-3 border">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="font-weight-bold"><?php echo e(__("Conversation ID")); ?></p>
                                        <a href="<?php echo e(route('chat.screen',$chat->conv_id)); ?>"><?php echo e($chat->conv_id); ?></a>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="font-weight-bold"><?php echo e(__("Conversation with")); ?></p>
                                        <span><?php echo e($chat->sender_id == auth()->id() ? $chat->reciever->name : $chat->sender->name); ?></span>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="font-weight-bold"><?php echo e(__("Last Message")); ?></p>
                                        <span> <b><?php echo e(!empty( $chat->chat->last() ) ? $chat->chat->last()->message : "No "); ?></b> <?php echo e(__('from')); ?> <?php echo e(!empty( $chat->chat->last() ) ? $chat->chat->last()->user->name : ''); ?> - <?php echo e(!empty( $chat->chat->last() ) ? $chat->chat->last()->created_at->format('jS M Y - h:i A') : ''); ?> </span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <h4 class="no_conv text-center text-muted">
                            <i class="feather icon-message-circle"></i> <?php echo e(__("Start a new conversation")); ?>

                        </h4>

                    <?php endif; ?>
                </div>
                <div class="col-md-4">

                    <div class="chat-list">
                        <div class="chat-search">
                            <form>
                                <div class="input-group">
                                  <input type="search" name="user" class="form-control" placeholder="<?php echo e(__('Search')); ?>" aria-label="Search" aria-describedby="button-addon3">
                                  <div class="input-group-append">
                                    <button class="btn" type="submit" id="button-addon3"><i class="feather icon-search"></i></button>
                                  </div>
                                </div>
                            </form>
                        </div>
                        <div style="max-height: 300px;overflow:auto;" class="chat-user-list">
                            <ul class="list-unstyled mb-0">
                                
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('chat.start',$user->id)); ?>">
                                      <li class="media">
                                        <?php if($user->image != '' && file_exists(public_path().'/images/user/'.$user->image)): ?>
                                            <img class="align-self-center rounded-circle" src="<?php echo e(url('images/user/'.$user->image)); ?>"/>
                                        <?php else: ?> 
                                            <img class="align-self-center rounded-circle" src="<?php echo e(Avatar::create($user->name)->toBase64()); ?>"/>
                                        <?php endif; ?>
                                        <div class="media-body">
                                            <h5><?php echo e($user->name); ?></h5>
                                            <p>Admin</p>
                                        </div>
                                    </li>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </ul>
                            
                        </div>
                        <?php echo $users->links(); ?>

                    </div>

                </div>
            </div>
             
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/chat/index.blade.php ENDPATH**/ ?>