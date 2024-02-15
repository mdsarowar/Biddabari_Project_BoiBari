
<?php $__env->startSection('title','BoiBari | My Account'); ?>
<?php $__env->startSection("content"); ?>   

<div style="background-color: #fff8f5">
    <!-- Home Start -->
    <section id="home" class="home-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="breadcrumb-main-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item"><?php echo e(__('Account')); ?></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('My Failed Transcations')); ?></li>
                        </ol>
                    </nav>
                    <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('frontend/assets/images/wishlist/breadcrum.png');">
                        <div class="breadcrumb-nav">
                            <h3 class="breadcrumb-title"><?php echo e(__('My Failed Transcations')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home End -->

    <!-- My Account Start -->
    <section id="my-account" class="my-account-main-block popular-item-main-block">
        <div class="container bg-white">
            <div class="row">
                <?php $active['active'] = 'Failedt'; ?>
                <?php echo $__env->make('frontend.profile.sidebar',$active, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="personal-info-block failed-trans-block">
                            <div class="card-header">
                                <h3 class="section-title"><?php echo e(__('My Failed Transcations')); ?> (<?php echo e(auth()->user()->failedtxn->count()); ?>)</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table filed-block">
                                        <thead>
                                        <th>#</th>
                                        <th><?php echo e(__('TXN ID')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $failedtranscations->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $ftxn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><h6><?php echo e($ftxn->txn_id); ?></h6></td>
                                                <td><p><?php echo e(date('d-m-Y h:i A',strtotime($ftxn->created_at))); ?></p></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div> <?php echo $failedtranscations->links(); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account End -->

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/profile/faild_trancation.blade.php ENDPATH**/ ?>