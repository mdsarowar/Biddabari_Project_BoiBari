
<?php $__env->startSection('title','Emart | My Account'); ?>
<?php $__env->startSection("content"); ?>   

<!-- Home Start -->
<section id="home" class="home-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb" class="breadcrumb-main-block">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><?php echo e(__('Account')); ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('My Tickets')); ?></li>
                    </ol>
                </nav>
                <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('frontend/assets/images/wishlist/breadcrum.png');">
                  <div class="breadcrumb-nav">
                      <h3 class="breadcrumb-title"><?php echo e(__('My Tickets')); ?></h3>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home End -->

<!-- My Account Start -->
<section id="my-account" class="my-account-main-block popular-item-main-block">
    <div class="container">
        <div class="row">
            <?php $active['active'] = 'Ticket'; ?>
            <?php echo $__env->make('frontend.profile.sidebar',$active, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="personal-info-block ticket-block">
                        <div class="card-header">
                            <h3 class="section-title"><?php echo e(__('My Tickets')); ?> (<?php echo e(auth()->user()->ticket->count()); ?>)</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Ticket No')); ?>.</th>
                                        <th><?php echo e(__('Issue')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>
                                        <th><?php echo e(__('View')); ?></th>
                                    </tr>
                                </thead>
                                <?php
                                $tickets = App\HelpDesk::where('user_id','=',Auth::user()->id)->latest()->paginate(10);
                                ?>
                                <tbody>
                                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><span class="font-weight500 font-size-12">#<?php echo e($ticket->ticket_no); ?></span></td>
                                        <td><?php echo e($ticket->issue_title); ?></td>
                                        <td>
                                            <?php if($ticket->status =="open"): ?>
                                            <p class="font-weight-bold"><i data-feather="volume"></i> <span class="badge badge-secondary"><?php echo e(ucfirst($ticket->status)); ?></span></p>
                                            <?php elseif($ticket->status=="pending"): ?>
                                            <p class="font-weight-bold"><i data-feather="clock"></i> <span class="badge badge-primary"><?php echo e(ucfirst($ticket->status)); ?></span></p>
                                            <?php elseif($ticket->status=="closed"): ?>
                                            <p class="font-weight-bold text-secondary"><i data-feather="slash"></i>  <span class="badge badge-dark"><?php echo e(ucfirst($ticket->status)); ?></span></p>
                                            <?php elseif($ticket->status=="solved"): ?>
                                            <p class="font-weight-bold"><i data-feather="check"></i> <span class="badge badge-success"><?php echo e(ucfirst($ticket->status)); ?></span></p>
                                            <?php endif; ?>
                                        </td>
                                        <td><a title="view" data-bs-toggle="modal" data-bs-target="#ticket<?php echo e($ticket->id); ?>" href="javascript:" data-toggle="modal"><i data-feather="eye"></i></a></td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="ticket<?php echo e($ticket->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModal">
                                                    #<?php echo e($ticket->ticket_no); ?> <?php echo e($ticket->issue_title); ?>

                                                    <?php if($ticket->status =="open"): ?>
                                                    <p class="font-weight-bold info"><i data-feather="volume"></i> <span class="badge badge-secondary"><?php echo e(ucfirst($ticket->status)); ?></span></p>
                                                    <?php elseif($ticket->status=="pending"): ?>
                                                    <p class="font-weight-bold warning"><i data-feather="clock"></i> <?php echo e(ucfirst($ticket->status)); ?></p>
                                                    <?php elseif($ticket->status=="closed"): ?>
                                                    <p class="font-weight-bold secondary"><i data-feather="slash"></i> <?php echo e(ucfirst($ticket->status)); ?></p>
                                                    <?php elseif($ticket->status=="solved"): ?>
                                                    <p class="font-weight-bold success"><i data-feather="check"></i> <?php echo e(ucfirst($ticket->status)); ?></p>
                                                    <?php endif; ?> 
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"><?php echo $ticket->issue; ?></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- My Account End -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/profile/tickets.blade.php ENDPATH**/ ?>