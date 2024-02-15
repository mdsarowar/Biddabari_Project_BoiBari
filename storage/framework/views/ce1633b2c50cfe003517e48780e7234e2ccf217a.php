
<?php $__env->startSection('title','BoiBari | My Account'); ?>
<?php $__env->startSection("content"); ?>   
<div style="background-color: #fff8f5">

  <!-- Home Start -->
  <section id="home" class="home-main-block product-home">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav aria-label="breadcrumb" class="breadcrumb-main-block">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
              <li class="breadcrumb-item"><?php echo e(__('Account')); ?></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Order')); ?></li>
            </ol>
          </nav>
          <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('<?= URL::to('/'); ?>/frontend/assets/images/wishlist/breadcrum.png');">
            <div class="breadcrumb-nav">
              <h3 class="breadcrumb-title"><?php echo e(__('Order')); ?></h3>
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
        <?php $active['active'] = 'Myorder'; ?>
        <?php echo $__env->make('frontend.profile.sidebar',$active, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-9 col-md-8">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="order-block">
              <h3 class="section-title"><?php echo e(__('My Orders')); ?> (<?php echo e(count($orders)); ?>)</h3>
              <div class="order-search-filter">
                <div class="row d-none">
                  <div class="col-lg-11">
                    <form action="#" class="search-form">
                      <div class="input-group">
                        <div class="form-group">
                          <input type="text" class="form-control" id="search" placeholder="Search">
                          <div class="search-icon">
                            <i data-feather="search"></i>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-1">
                    <a href="" title="">
                      <div class="filter-icon">
                        <i data-feather="filter"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="our-product-block">
                <div class="row">
                  <?php $__currentLoopData = $orders->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      if($order->discount != 0){
                        if($order->distype == 'category'){

                        $findCoupon = App\Coupan::where('code','=',$order->coupon)->first();
                        $catarray = collect();
                          foreach ($order->invoices as $key => $os) {

                            if(isset($os->variant->products) && $os->variant->products->category_id == $findCoupon->cat_id){

                              $catarray->push($os);

                            }

                            if(isset($os->simple_product) && $os->simple_product->category_id == $findCoupon->cat_id){

                              $catarray->push($os);

                            }

                          }

                        }
                      }
                    ?>
                    <div class="col-lg-6">
                      <div class="product-order-block">
                        <div class="product-date-rate">

                          <div class="row mt-2">
                            <div class="col-lg-12 mb-2">
                              <h6 class="date-title">
                                <?php echo e(__('Order ID')); ?>: <span><?php echo e($order->transaction_id); ?></span>
                              </h6>
                            </div>

                            <div class="col-lg-12">
                              <h6 class="date-title">
                                <?php echo e(__('Payment Method')); ?>: <span><?php echo e($order->payment_method); ?></span>
                              </h6>
                            </div>
                          </div>

                        </div>
                        <div class="product-order-dtl-block">
                          <?php
                            $x = count($order->invoices);
                            if(isset($order->invoices[0])){
                              $firstarray = array($order->invoices[0]);
                            }

                            $morearray = array();
                            $counter = 0;

                            foreach ($order->invoices as $value) {
                              if($counter++ >0 ){
                                array_push($morearray, $value);
                              }
                            }

                            $morecount = count($morearray);
                          ?>
                          <?php if(isset($firstarray)): ?>
                            <?php $__currentLoopData = $firstarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="product-order-img">

                                    <?php if($o->variant): ?>
                                      <a target="_blank" href="<?php echo e($o->variant->products->getURL($o->variant)); ?>" title="<?php echo e(__('Order Detail')); ?>">
                                        <?php if(isset($o->variant->variantimages) && file_exists(public_path().'/variantimages/thumbnails/'.$o->variant->variantimages->main_image)): ?>
                                          <img class="img-fluid" src="<?php echo e(url('variantimages/thumbnails/'.$o->variant->variantimages->main_image)); ?>" alt="<?php echo e(__('product name')); ?>" />
                                        <?php else: ?>
                                          <img class="img-fluid" src="<?php echo e(Avatar::create($o->variant->products->name)->toBase64()); ?>" alt="<?php echo e(__('product name')); ?>" />
                                        <?php endif; ?>
                                      </a>
                                    <?php endif; ?>

                                    <?php if($o->simple_product): ?>
                                      <?php if($o->simple_product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$o->simple_product->thumbnail)): ?>
                                        <img class="img-fluid" src="<?php echo e(url('images/simple_products/'.$o->simple_product->thumbnail)); ?>"/>
                                      <?php else: ?>
                                        <img class="img-fluid" src="<?php echo e(Avatar::create($o->simple_product->product_name)->toBase64()); ?>" alt="product name" />
                                      <?php endif; ?>
                                    <?php endif; ?>

                                  </div>
                                </div>
                                <div class="col-lg-8">
                                  <div class="product-order-dtl">
                                    <?php if(isset($o->variant)): ?>
                                      <h6><a target="_blank" href="<?php echo e($o->variant->products->getURL($o->variant)); ?>"><?php echo e(substr($o->variant->products->name, 0, 30)); ?><?php echo e(strlen($o->variant->products->name)>30 ? '...' : ""); ?></a></h6>
                                      <p><small><?php echo e(variantname($o->variant)); ?></small></p>
                                      
                                    <?php endif; ?>

                                    <?php if(isset($o->simple_product)): ?>
                                      <h6><a target="_blank" href="<?php echo e(route('show.product',['id' => $o->simple_product->id, 'slug' =>   $o->simple_product->slug])); ?>"><?php echo e($o->simple_product->product_name); ?></a></h6>
                                      
                                    <?php endif; ?>

                                    <small><b><?php echo e(__('Qty')); ?>:</b> <?php echo e($o->qty); ?></small>

                                  </div>
                                </div>
                              </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                          <div class="product-order-icon">
                            <a href="<?php echo e(route('user.view.order',$order->order_id)); ?>" title="<?php echo e(__('Order Detail')); ?>"><i data-feather="chevron-right"></i></a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <h6 class="date-title">Status: <span><?php echo e(ucfirst($o->status)); ?></span></h6>
                          </div>
                          <div class="col-lg-12">
                            <p class="expected-delivery-date"><?php echo e(__('Expected delivery by :date',['date' => date("d-M-Y",strtotime($o->exp_delivery_date))])); ?>.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <nav aria-label="Page navigation example text-center">
                  <a href="<?php echo e(url('all/my/order')); ?>" class="btn btn-primary">View More</a>
                </nav>
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


<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/profile/orders.blade.php ENDPATH**/ ?>