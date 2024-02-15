
<?php $__env->startSection('title','BoiBari | Cart'); ?>
<?php $__env->startSection("content"); ?>   
<div style="background-color: #fff8f5">

    <!-- Home Start -->
    <section id="home" class="home-main-block">
        <div class="container bg-white">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="breadcrumb-main-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Cart')); ?></li>
                        </ol>
                    </nav>
                    <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('frontend/assets/images/wishlist/breadcrum.png');">
                        <div class="breadcrumb-nav">
                            <h3 class="breadcrumb-title"><?php echo e(__('Cart')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home End -->

    <?php
        //                $pro = Session('pro_qty');

                        $value = Session::get('cart');

                        if (Auth::check())
                        {
                          $count = $cart_table->count();
                        }
                        else {
                          if (isset($value))
                              {
                                $count = count($value);
                              }
                          else
                              {
                                $count = 0;
                              }
                        }

                        if(Auth::check()){
                          $usercart = $count;
                        }else{
                          $usercart = session()->get('cart');
                        }
    ?>

            <!-- Cart Start -->
    <section id="cart" class="cart-main-block">
        <div class="container bg-white">
            <div class="row">
                <div class="col-lg-8 col-md-7 pc">

                    <?php if($count > 0 && $count != null): ?>
                        <?php if(Session::has('validcurrency')): ?>
                            <div class="cart-alert">
                                <i class="fa fa-info-circle"></i> <b><?php echo e(__('Oscur')); ?> <u><?php echo e(Session::get('currency')['id']); ?></u><?php echo e(__('CerrorMsg')); ?> !</b>
                            </div>
                        <?php endif; ?>

                        <?php if(Auth::check()): ?>
                            <?php $__currentLoopData = $cart_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    //                            $orivar = $row->variant;
                                ?>

                                <?php if(isset($orivar)): ?>
                                    <!-- Varient Product Code Here -->
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    

                                    

                                    

                                    
                                    

                                    

                                    

                                    

                                    

                                    

                                    

                                    
                                    

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                <?php endif; ?>

                                <?php if($row->simple_product): ?>
                                    <!-- Simple Product Code Here -->
                                    <div class="wishlist-block">
                                        <div class="alert alert-dismissible fade show" role="alert">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td style="width:10%;"></td>
                                                    <td style="width:12%;">
                                                        <a href="<?php echo e(route('show.product',['id' => $row->simple_product->id, 'slug' =>   $row->simple_product->slug])); ?>" title="">
                                                            <?php if($row->simple_product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$row->simple_product->thumbnail)): ?>
                                                                <img src="<?php echo e(url('images/simple_products/'.$row->simple_product->thumbnail)); ?>" class="img-fluid" alt="<?php echo e(__('Product Image')); ?>">
                                                            <?php else: ?>
                                                                <img class="img-fluid" title="<?php echo e($row->product_name); ?>" src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image" />
                                                            <?php endif; ?>
                                                        </a>
                                                    </td>
                                                    <td class="brd-rgt p-25 wishlist-title" style="width:35%;">
                                                        <a href="<?php echo e(route('show.product',['id' => $row->simple_product->id, 'slug' =>   $row->simple_product->slug])); ?>" title="<?php echo e($row->simple_product->product_name); ?>"><?php echo e(ucfirst($row->simple_product->product_name)); ?></a>

                                                        <?php if(isset($row->simple_product->cashback_settings) && $row->simple_product->cashback_settings->enable == 1): ?>
                                                            <p>
                                                                <?php echo e(__("Congrats ! You can earn cashback in your wallet")); ?> <?php echo e($row->simple_product->cashback_settings->discount_type); ?>  <?php if($row->simple_product->cashback_settings->cashback_type == 'fix'): ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i><b><?php echo e(price_format( $row->simple_product->cashback_settings->discount * $conversion_rate)); ?></b> <?php else: ?> <b><?php echo e($row->simple_product->cashback_settings->discount.'%'); ?></b> <?php endif; ?>
                                                            </p>
                                                        <?php endif; ?>
                                                    </td>
                                                        <?php

                                                        if($row->simple_product->max_order_qty == null || $row->simple_product->max_order_qty == 0 || $row->simple_product->max_order_qty == '')
                                                        {
                                                            $product_stock = $row->simple_product->stock;

                                                        }else{
                                                            $product_stock = $row->simple_product->max_order_qty;
                                                        }

                                                        ?>
                                                    <td class="brd-rgt p-15" style="width:20%;">
                                                        <div class="quantity">
                                                            <input type="number" id="rent-day" data-id="<?php echo e($row->id); ?>" data-type="sp"
                                                                   data-pr="<?php echo e($product_stock); ?>" name="quantity" value="<?php echo e($row->qty); ?>" price="<?php echo e($row->price_total); ?>"
                                                                   variant="<?php echo e($row->id); ?>" offerprice="<?php echo e($row->semi_total); ?>" max="<?php echo e($product_stock); ?>"
                                                                   min="<?php echo e($row->simple_product->min_order_qty); ?>">
                                                        </div>
                                                    </td>
                                                    <td class="brd-rgt p-25" style="width:28%;">
                                                        <?php if($row->semi_total == 0): ?>
                                                            <i class="price <?php echo e(session()->get('currency')['value']); ?>"></i><span class="price cart-grand-total-price cart-sub-total-price sub_total_<?php echo e($row->id); ?>" id="<?php echo e($row->id); ?>">
                                                        <?php echo e(price_format($row->price_total*$conversion_rate)); ?>

                                                        </span>
                                                        <?php else: ?>
                                                            <i class="price <?php echo e(session()->get('currency')['value']); ?>"></i><span
                                                                    class="price cart-grand-total-price cart-sub-total-price sub_total_<?php echo e($row->id); ?>" id="<?php echo e($row->id); ?>">
                                                        <?php echo e(price_format($row->semi_total*$conversion_rate)); ?>

                                                        </span>

                                                            <i class="price-strike <?php echo e(session()->get('currency')['value']); ?>"></i>
                                                            
                                                            <del class="price-strike"
                                                                 id="strike<?php echo e($row->id); ?>"><s><?php echo e(price_format($row->price_total*$conversion_rate)); ?></s></del>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <a href="<?php echo e(route("rm.simple.cart",$row->id)); ?>" title="<?php echo e(__('Remove from cart')); ?>">
                                                <button title="close_button" type="button" class="btn-close"></button>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php if(!empty($value)): ?>
                                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $id = $row['id'];
                                        $qty = $row['quantity'];
                                        $product =\App\SimpleProduct::find($id);
                                    ?>

                                    <?php if(isset($product)): ?>
                                        <!-- Simple Product Code Here -->
                                        <div class="wishlist-block">
                                            <div class="alert alert-dismissible fade show" role="alert">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:10%;"></td>
                                                        <td style="width:12%;">
                                                            <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>" title="">
                                                                <?php if($product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$product->thumbnail)): ?>
                                                                    <img src="<?php echo e(url('images/simple_products/'.$product->thumbnail)); ?>" class="img-fluid" alt="<?php echo e(__('Product Image')); ?>">
                                                                <?php else: ?>
                                                                    <img class="img-fluid" title="<?php echo e($product->product_name); ?>" src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image" />
                                                                <?php endif; ?>
                                                            </a>
                                                        </td>
                                                        <td class="brd-rgt p-25 wishlist-title" style="width:35%;">
                                                            <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>" title="<?php echo e($product->product_name); ?>"><?php echo e(ucfirst($product->product_name)); ?></a>

                                                            <?php if(isset($product->cashback_settings) && $product->cashback_settings->enable == 1): ?>
                                                                <p>
                                                                    <?php echo e(__("Congrats ! You can earn cashback in your wallet")); ?> <?php echo e($product->cashback_settings->discount_type); ?>  <?php if($product->cashback_settings->cashback_type == 'fix'): ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i><b><?php echo e(price_format( $product->cashback_settings->discount * $conversion_rate)); ?></b> <?php else: ?> <b><?php echo e($product->cashback_settings->discount.'%'); ?></b> <?php endif; ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </td>
                                                            <?php

                                                            if($product->max_order_qty == null || $product->max_order_qty == 0 || $product->max_order_qty == '')
                                                            {
                                                                $product_stock = $product->stock;

                                                            }else{
                                                                $product_stock = $product->max_order_qty;
                                                            }

                                                            ?>
                                                        <td class="brd-rgt p-15" style="width:20%;">
                                                            <div class="quantity">
                                                                <input type="number"  id="rent-day<?php echo e($row['id']); ?>" onchange="qtych('<?php echo e($row['id']); ?>')" data-id="<?php echo e($id); ?>" data-type="sp"
                                                                       data-pr="<?php echo e($product_stock); ?>" name="quantity" value="<?php echo e($qty); ?>" price="<?php echo e($qty * $product->price); ?>"
                                                                       variant="<?php echo e($id); ?>" offerprice="<?php echo e($qty * $product->offer_price); ?>" variant="<?php echo e($product->id); ?> max="<?php echo e($product_stock); ?>"
                                                                min="<?php echo e($product->min_order_qty); ?>">
                                                            </div>
                                                        </td>
                                                        <td class="brd-rgt p-25" style="width:28%;">
                                                            <?php if($product->offer_price == 0): ?>
                                                                <i  class="price <?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                <span class="price cart-grand-total-price cart-sub-total-price sub_total" id="nofferss<?php echo e($product->id); ?>">
                                                <?php echo e(price_format($qty * $product->price)); ?>

                                                </span>
                                                            <?php else: ?>
                                                                <i class="price <?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                <span
                                                                        class="price cart-grand-total-price cart-sub-total-price sub_total_<?php echo e($id); ?>" id="offer_p<?php echo e($product->id); ?>">
                                                    <?php echo e(price_format($qty * $product->offer_price)); ?>

                                                </span>

                                                                
                                                                
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <a href="<?php echo e(route("rm.simple.cart",$product->id)); ?>" title="<?php echo e(__('Remove from cart')); ?>">
                                                    <button title="close_button" type="button" class="btn-close"></button>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                
                                
                                
                                

                                
                                
                                
                                

                                

                                

                                

                                
                                

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                

                                
                                
                                
                                
                                

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                

                                
                                
                                

                                

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php else: ?>
                        <div class="wishlist-block text-center">
                            <h5><?php echo e(__('Your Shopping Cart is Empty')); ?></h5>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-8 col-md-7 mobile">

                    <?php if($count > 0 && $count != null): ?>
                        <?php if(Session::has('validcurrency')): ?>
                            <div class="cart-alert">
                                <i class="fa fa-info-circle"></i> <b><?php echo e(__('Oscur')); ?> <u><?php echo e(Session::get('currency')['id']); ?></u><?php echo e(__('CerrorMsg')); ?> !</b>
                            </div>
                        <?php endif; ?>

                        <?php if(Auth::check()): ?>
                            <?php $__currentLoopData = $cart_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->simple_product): ?>
                                    <!-- Simple Product Code Here -->
                                    <div class="wishlist-block">
                                        <div class="alert alert-dismissible fade show" role="alert">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td style="width:20%;">
                                                        <a href="<?php echo e(route("rm.simple.cart",$row->id)); ?>" title="<?php echo e(__('Remove from cart')); ?>">
                                                            <button title="close_button" type="button" class="btn-close"></button>
                                                        </a>
                                                    </td>
                                                    <td style="width:15%;">
                                                        <a href="<?php echo e(route('show.product',['id' => $row->simple_product->id, 'slug' =>   $row->simple_product->slug])); ?>" title="">
                                                            <?php if($row->simple_product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$row->simple_product->thumbnail)): ?>
                                                                <img src="<?php echo e(url('images/simple_products/'.$row->simple_product->thumbnail)); ?>" class="img-fluid" alt="<?php echo e(__('Product Image')); ?>">
                                                            <?php else: ?>
                                                                <img class="img-fluid" title="<?php echo e($row->product_name); ?>" src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image" />
                                                            <?php endif; ?>
                                                        </a>
                                                    </td>
                                                    <td class="brd-rgt p-25 wishlist-title" style="width:30%;">
                                                        <a href="<?php echo e(route('show.product',['id' => $row->simple_product->id, 'slug' =>   $row->simple_product->slug])); ?>" title="<?php echo e($row->simple_product->product_name); ?>"><?php echo e(ucfirst($row->simple_product->product_name)); ?></a>

                                                        <?php if(isset($row->simple_product->cashback_settings) && $row->simple_product->cashback_settings->enable == 1): ?>
                                                            <p>
                                                                <?php echo e(__("Congrats ! You can earn cashback in your wallet")); ?> <?php echo e($row->simple_product->cashback_settings->discount_type); ?>  <?php if($row->simple_product->cashback_settings->cashback_type == 'fix'): ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i><b><?php echo e(price_format( $row->simple_product->cashback_settings->discount * $conversion_rate)); ?></b> <?php else: ?> <b><?php echo e($row->simple_product->cashback_settings->discount.'%'); ?></b> <?php endif; ?>
                                                            </p>
                                                        <?php endif; ?>
                                                    </td>
                                                        <?php

                                                        if($row->simple_product->max_order_qty == null || $row->simple_product->max_order_qty == 0 || $row->simple_product->max_order_qty == '')
                                                        {
                                                            $product_stock = $row->simple_product->stock;

                                                        }else{
                                                            $product_stock = $row->simple_product->max_order_qty;
                                                        }

                                                        ?>
                                                    <td class="brd-rgt p-15" style="width:10%;">
                                                        <div class="quantity" id="mobile_input">
                                                            <input type="number" id="rent-day" data-id="<?php echo e($row->id); ?>" data-type="sp"
                                                                   data-pr="<?php echo e($product_stock); ?>" name="quantity" value="<?php echo e($row->qty); ?>" price="<?php echo e($row->price_total); ?>"
                                                                   variant="<?php echo e($row->id); ?>" offerprice="<?php echo e($row->semi_total); ?>" max="<?php echo e($product_stock); ?>"
                                                                   min="<?php echo e($row->simple_product->min_order_qty); ?>">
                                                        </div>
                                                    </td>
                                                    <td class="brd-rgt p-25" style="width:28%;">
                                                        <?php if($row->semi_total == 0): ?>
                                                            <i class="price <?php echo e(session()->get('currency')['value']); ?>"></i>
                                                            <span class="price cart-grand-total-price cart-sub-total-price sub_total_<?php echo e($row->id); ?>" id="mobile<?php echo e($row->id); ?>">
                                                        <?php echo e(price_format($row->price_total*$conversion_rate)); ?>

                                                        </span>
                                                        <?php else: ?>
                                                            <i class="price <?php echo e(session()->get('currency')['value']); ?>"></i><span
                                                                    class="price cart-grand-total-price cart-sub-total-price sub_total_<?php echo e($row->id); ?>" id="mobile<?php echo e($row->id); ?>">
                                                        <?php echo e(price_format($row->semi_total*$conversion_rate)); ?>

                                                        </span>

                                                            <i class="price-strike <?php echo e(session()->get('currency')['value']); ?>"></i><del class="price-strike"
                                                                                                                                     id="strike<?php echo e($row->id); ?>"><s><?php echo e(price_format($row->price_total*$conversion_rate)); ?></s></del>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php if(!empty($value)): ?>
                                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $id = $row['id'];
                                        $qty = $row['quantity'];
                                        $product =\App\SimpleProduct::find($id);
                                    ?>

                                    <?php if(isset($product)): ?>
                                        <!-- Simple Product Code Here -->
                                        <div class="wishlist-block">
                                            <div class="alert alert-dismissible fade show" role="alert">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:20%;">
                                                            <a href="<?php echo e(route("rm.simple.cart",$product->id)); ?>" title="<?php echo e(__('Remove from cart')); ?>">
                                                                <button title="close_button" type="button" class="btn-close"></button>
                                                            </a>
                                                        </td>
                                                        <td style="width:15%;">
                                                            <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>" title="">
                                                                <?php if($product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$product->thumbnail)): ?>
                                                                    <img src="<?php echo e(url('images/simple_products/'.$product->thumbnail)); ?>" class="img-fluid" alt="<?php echo e(__('Product Image')); ?>">
                                                                <?php else: ?>
                                                                    <img class="img-fluid" title="<?php echo e($product->product_name); ?>" src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image" />
                                                                <?php endif; ?>
                                                            </a>
                                                        </td>
                                                        <td class="brd-rgt p-25 wishlist-title" style="width:30%;">
                                                            <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>" title="<?php echo e($product->product_name); ?>"><?php echo e(ucfirst($product->product_name)); ?></a>

                                                            <?php if(isset($product->cashback_settings) && $product->cashback_settings->enable == 1): ?>
                                                                <p>
                                                                    <?php echo e(__("Congrats ! You can earn cashback in your wallet")); ?> <?php echo e($product->cashback_settings->discount_type); ?>  <?php if($product->cashback_settings->cashback_type == 'fix'): ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i><b><?php echo e(price_format( $product->cashback_settings->discount * $conversion_rate)); ?></b> <?php else: ?> <b><?php echo e($product->cashback_settings->discount.'%'); ?></b> <?php endif; ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </td>
                                                            <?php

                                                            if($product->max_order_qty == null || $product->max_order_qty == 0 || $product->max_order_qty == '')
                                                            {
                                                                $product_stock = $product->stock;

                                                            }else{
                                                                $product_stock = $product->max_order_qty;
                                                            }

                                                            ?>
                                                        <td class="brd-rgt p-15" style="width:10%;">
                                                            <div class="quantity">
                                                                <input type="number"  id="mobilerent-day<?php echo e($row['id']); ?>" onchange="moqtych('<?php echo e($row['id']); ?>')" data-id="<?php echo e($id); ?>" data-type="sp"
                                                                       data-pr="<?php echo e($product_stock); ?>" name="quantity" value="<?php echo e($qty); ?>" price="<?php echo e($qty * $product->price); ?>"
                                                                       variant="<?php echo e($product->id); ?>" offerprice="<?php echo e($qty * $product->offer_price); ?>" variant="<?php echo e($product->id); ?> max="<?php echo e($product_stock); ?>"
                                                                min="<?php echo e($product->min_order_qty); ?>">
                                                            </div>
                                                        </td>
                                                        <td class="brd-rgt p-25" style="width:28%;">
                                                            <?php if($product->offer_price == 0): ?>
                                                                <i  class="price <?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                <span class="price cart-grand-total-price cart-sub-total-price sub_total" id="mobilenofferss<?php echo e($product->id); ?>">
                                                <?php echo e(price_format($qty * $product->price)); ?>

                                                </span>
                                                            <?php else: ?>
                                                                <i class="price <?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                <span
                                                                        class="price cart-grand-total-price cart-sub-total-price sub_total_<?php echo e($id); ?>" id="mobileoffer_p<?php echo e($product->id); ?>">
                                                    <?php echo e(price_format($qty * $product->offer_price)); ?>

                                                </span>

                                                                
                                                                
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                
                                
                                
                                

                                
                                
                                
                                

                                

                                

                                

                                
                                

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                

                                
                                
                                
                                
                                

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                

                                
                                
                                

                                

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php else: ?>
                        <div class="wishlist-block text-center">
                            <h5><?php echo e(__('Your Shopping Cart is Empty')); ?></h5>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="col-lg-4 col-md-5">

                    <div class="cart-block">
                        <h4 class="section-title"><?php echo e(__('Detail')); ?> (<?php echo e($count); ?> <?php echo e(__('items')); ?>)</h4>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td style="width: 60%;">Total pricess</td>
                                <td>
                                    <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                    <span id="show-total">
                        <?php
                            $total = 0;
                            $oot = array();
//                            $stotal=Session::get('total');
                        ?>
                                        <?php if(auth()->guard()->guest()): ?>
                                            <?php if(!empty(Session::get('cart'))): ?>


                                                <?php $__currentLoopData = $cts = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        //                                $total=0;
                                                                                            $row= App\SimpleProduct::where('id',$c['id'])->first();

                                                                                            if ($row->offer_price == 0 || $row->offer_price == null){
                                                                                                $stotal = $c['quantity'] * $row->price;

                                                                                            }else{
                                                                                                 $stotal = $c['quantity'] * $row->offer_price;
                                                                                            }

                                                                                            $total=$total+$stotal;

                                                    ?>

                                                    <?php

                                                            ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php echo e(sprintf("%.2f",$total*$conversion_rate)); ?>


                                            <?php endif; ?>
                                        <?php else: ?>

                                            <?php
                                                $cart_table = App\Cart::where('user_id',auth()->id())->where('active_cart',1)->get();
                                            ?>

                                            <?php if(count($cart_table)): ?>

                                                <?php $__currentLoopData = $cart_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($c->simple_product): ?>
                                                        <?php if($c->semi_total != 0): ?>
                                                            <?php $price = $c->semi_total - $c->tax_amount; ?>
                                                        <?php else: ?>
                                                            <?php $price = $c->price_total - $c->tax_amount; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    
                                                    
                                                    
                                                    
                                                    

                                                    <?php $total= $total+$price; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>
                                            <?php if(Session::get('gift')): ?>
                                                <?php echo e(sprintf("%.2f",$total*$conversion_rate,2)); ?>

                                            <?php endif; ?>
                                            <?php echo e(price_format(sprintf("%.2f",$total*$conversion_rate))); ?>

                                        <?php endif; ?>
                        </span>
                                </td>
                            </tr>
                            <?php $shipping = 0; ?>
                            <?php if(!empty(Session::get('gift')['discount'])): ?>
                                <tr>
                                    <td style="width: 60%;"><?php echo e(__('Gift Discount')); ?></td>
                                    <td class="wishlist-out-stock"><i class="price-strike <?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(Session::get('gift')['discount']); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if(App\Cart::isCoupanApplied() == '1'): ?>
                                <tr>
                                    <td style="width: 70%;">Coupon</td>
                                    <td class="wishlist-out-stock">
                                        <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                        <span class="" id="discountedam"><?php echo e(price_format(App\Cart::getDiscount()*$conversion_rate)); ?></span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if(Session::has('coupanapplied')): ?>
                                <tr>
                                    <td style="width: 60%;">Coupon</td>
                                    <td class="wishlist-out-stock">
                                        <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                        <span class="" id="discountedam"> <?php echo e(price_format(session()->get('coupanapplied')['discount'] * $conversion_rate)); ?></span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <!-- <tr>
                    <td style="width: 70%;">Delivery Charges</td>
                    <td class="wishlist-stock">$ 5</td>
                  </tr> -->
                            </tbody>
                        </table>
                        <table class="table total-amount-table">
                            <tbody>
                            <tr>
                                <td style="width: 60%;">Total Amount</td>
                                <td>
                                    <?php

                                        $total = sprintf('%.2f',$total*$conversion_rate);

                                        $shipping = sprintf("%.2f",$shipping * $conversion_rate);

                                        if(App\Cart::isCoupanApplied() == '1'){

                                        $gtotal = ($shipping+$total) - sprintf(App\Cart::getDiscount() * $conversion_rate);

                                        }else{

                                        if(Session::get('gift')){
                                            $gtotal = $shipping + $total - Session::get('gift')['discount'] ;
                                        }else{
                                            $gtotal = $shipping + $total ;
                                        }

                                        }

                                        if(!Auth::check()){

                                        if(Session::has('coupanapplied')){

                                            $gtotal = ($shipping+$total) - (session()->get('coupanapplied')['discount'] * $conversion_rate);

                                        }else{

                                            $gtotal = $shipping + $total;

                                        }

                                        }

                                        Session::put('shippingrate',$shipping);

                                    ?>
                                    <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                    <span class="" id="show-total-amoutn"> <?php echo e(price_format($gtotal)); ?></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php if(Auth::check()): ?>
                            <div class="apply-coupon-btn">

                                <form action="<?php echo e(route('apply.cpn')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="coupon" placeholder="<?php echo e(__('Apply Coupon or Vouchers')); ?>" aria-label="<?php echo e(__('Apply Coupon or Vouchers')); ?>" aria-describedby="button-addon2" value="<?php if(App\Cart::getCoupanDetail()): ?> <?php echo e(App\Cart::getCoupanDetail()->code); ?> <?php elseif(session()->has('coupanapplied')): ?> <?php echo e(session()->get('coupanapplied')['code']); ?> <?php endif; ?>">
                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2"><?php echo e(__('Apply')); ?></button>
                                    </div>
                                </form>

                                <form action="<?php echo e(route('apply.gift')); ?>" method="POST"  class="giftcardform" >
                                    <?php echo csrf_field(); ?>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="<?php echo e(__('Apply Gift Vouchers')); ?>" aria-label="<?php echo e(__('Apply Gift Vouchers')); ?>" aria-describedby="button-addon1">
                                        <button class="btn btn-outline-primary" type="button" id="button-addon1"><?php echo e(__('Apply')); ?></button>
                                    </div>
                                </form>

                            </div>
                        <?php endif; ?>


                        <div class="checkout-btn">
                            <?php if(auth()->guard()->check()): ?>
                                <?php  $c = count($cart_table); ?>
                            <?php else: ?>
                                <?php  $c = count([Session::get('cart')]);?>
                            <?php endif; ?>

                            <!-- <a href="javascript:" type="button" class="btn btn-primary"><?php echo e(__('Checkout')); ?></a> -->
                            <?php if(!Session::has('validcurrency')): ?>
                                <?php if(!empty($oot) && in_array(0, $oot) || $c<1): ?>
                                    <form action="<?php echo e(url('checkout')); ?>" method="GET">
                                        <?php echo e(csrf_field()); ?>

                                        <button disabled type="submit" id="proccedtocheckout" title="<?php echo e(__('Checkout')); ?>" class="btn btn-primary checkout-btn"><?php echo e(__('Checkout')); ?></button>
                                    </form>
                                <?php else: ?>
                                    <?php if(!Auth::check()): ?>
                                        
                                        


                                        
                                        <a class="text-info" href="javascript:" role="button" data-bs-toggle="modal" data-bs-target="#loginModal">
                                            <button class="btn btn-primary ">
                                                Login / Register
                                            </button>

                                        </a>
                                        
                                        
                                        
                                    <?php else: ?>
                                        <?php if(count([Session::get('cart')])>0): ?>

                                            <form action="<?php echo e(url('checkout')); ?>" method="GET">
                                                <?php echo e(csrf_field()); ?>


                                                <button type="submit" id="proccedtocheckout" title="<?php echo e(__('Checkout')); ?>" class="btn btn-primary checkout-btn"><?php echo e(__('Checkout')); ?></button>
                                            </form>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                <?php endif; ?>
                            <?php else: ?>
                                <button type="button" id="proccedtocheckout" disabled="disabled" title="<?php echo e(__('Checkout')); ?>" class="btn btn-primary checkout-btn"><?php echo e(__('Checkout')); ?></button>
                            <?php endif; ?>

                            <?php if(auth()->guard()->check()): ?>
                                

                                <form action="<?php echo e(route('empty.cart')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" title="<?php echo e(__('Empty Cart')); ?>" class="btn btn-primary checkout-btn"><?php echo e(__('Empty Cart')); ?></button>
                                </form>

                            <?php else: ?>
                                
                                <?php if(Session::has('cart')): ?>

                                    <form action="<?php echo e(route('s.cart',md5(uniqid(rand(), true)))); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" title="<?php echo e(__('Empty Cart')); ?>" class="btn btn-primary checkout-btn"><?php echo e(__('Empty Cart')); ?></button>
                                    </form>

                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="continue-btn">
                        <a href="<?php echo e(url('/')); ?>" type="button" title="<?php echo e(__('Continue Shopping')); ?>" class="btn btn-info"><?php echo e(__('Continue Shopping')); ?><i data-feather="arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart End -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>

        $(function () {

            var conversion_rate = +'<?php echo e($conversion_rate); ?>';
            $('#mobile_input input').change(function () {
                var p = $(this).attr('price');
                var op = $(this).attr('offerprice');
                var variantId = $(this).attr('variant');
            });
            var urlLike = '<?php echo e(route('rentdays')); ?>';
            $("body").on("change keyup", "#rent-day", function (t) {
                t.preventDefault();

                var p = $(this).attr('price');
                var op = $(this).attr('offerprice');
                var variantId = $(this).attr('variant');

                var e = $(this).val();

                var z = $(this).data("id");
                var stock = $(this).data("pr");

                if (e == stock) {
                    swal({
                        title: "Limit reached",
                        text: 'Max Order quantity limit reached !',
                        icon: 'warning'
                    });
                }

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    type: "GET",
                    url: urlLike,
                    data: {
                        days: e,
                        id: z,
                        variant_id: variantId,
                        price: p,
                        offerprice: op

                    },

                    error: function (jqXHR, exception) {

                    }
                }).done(function (t) {
                    var pricetotal = t.pricetotal * conversion_rate;

                    pricetotal = pricetotal.toFixed(2);

                    $('#show-total').text(pricetotal);
                    $('#show-total-amoutn').text(pricetotal);

                    if (t.singletotal == 0) {
                        var singletotal = t.singletotal * conversion_rate;
                        singletotal = singletotal.toFixed(2);
                        $('#' + t.id).text(singletotal);
                        $('#strike' + t.id).text();
                    } else {

                        var singletotal = t.singletotal * conversion_rate;
                        singletotal = singletotal.toFixed(2);
                        var noffertotal = t.noffertotal * conversion_rate;
                        noffertotal = noffertotal.toFixed(2);
                        $('#mobile' + t.id).text(t.singletotal);
                        $('#strike' + t.id).text(noffertotal);
                    }

                    var discount = t.per * conversion_rate
                    discount = discount.toFixed(2);

                    var gtotal = t.gtotal * conversion_rate;
                    gtotal = gtotal.toFixed(2);
                    $('#total_cart').text(gtotal);

                    var shipping = t.shipping * conversion_rate;
                    shipping = shipping.toFixed(2);

                    $('#shipping').text(shipping);

                    $('#discountedam').text(discount);

                    $('#gtotal').text(gtotal);

                    $('#send').val(shipping);

                    $('#subtotal').text(gtotal);

                    $('#qty' + t.id).text(e);


                }).fail(function () {
                    console.log("Error occur !");
                })
            });
        });

        function moqtych(id) {

            var conversion_rate = '<?php echo e($conversion_rate); ?>';
            var urlLike = '<?php echo e(route('rentdays')); ?>';
            var p = $('#mobilerent-day' + id).attr('price');
            var op = $('#mobilerent-day' + id).attr('offerprice');
            var variantId = $('#mobilerent-day' + id).attr('variant');
            var e = $('#mobilerent-day' + id).val();

            var z = $('#mobilerent-day' + id).data("id");
            var stock = $('#mobilerent-day' + id).data("pr");
            if (e == stock) {
                swal({
                    title: "Limit reached",
                    text: 'Max Order quantity limit reached !',
                    icon: 'warning'
                });
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "GET",
                url: urlLike,
                data: {
                    days: e,
                    id: z,
                    variant_id: variantId,
                    price: p,
                    offerprice: op

                },

                error: function (jqXHR, exception) {
                }
            }).done(function (t) {

                var pricetotal = t.pricetotal * conversion_rate;
                pricetotal = pricetotal.toFixed(2);
                $('#show-total').text(pricetotal);
                $('#show-total-amoutn').text(pricetotal);

                if (t.singletotal != 0) {
                    var singletotal = t.singletotal * conversion_rate;
                    singletotal = singletotal.toFixed(2);
                    $('#monofferss' + t.variant_id).text(singletotal);
                } else {
                    var offertotal = t.offertotal * conversion_rate;
                    offertotal = offertotal.toFixed(2);

                    var noffertotal = t.noffertotal * conversion_rate;
                    noffertotal = noffertotal.toFixed(2);

                    $('#mobileoffer_p' + t.variant_id).text(offertotal);
                    $('#nofferss' + t.variant_id).text(noffertotal);
                }

                var total = t.total * conversion_rate;
                total = total.toFixed(2);
                $('#total_cart').text(total);

                var shipping = t.shipping * conversion_rate;
                shipping = shipping.toFixed(2);

                var discount = t.per * conversion_rate
                discount = discount.toFixed(2);

                var gtotal = t.gtotal * conversion_rate;

                gtotal = gtotal.toFixed(2);

                $('#shipping').text(shipping);

                $('#gtotal').text(gtotal);

                $('#discountedam').text(discount);

                $('#send').val(shipping);

                $('#subtotal').text(total);

                $('#sqty' + t.id).text(e);


            }).fail(function () {
                console.log("Error occur !");
            })
        }
    </script>

<script>
  "use strict";

  $(function () {

    var conversion_rate = +'<?php echo e($conversion_rate); ?>';
    $('.cart-product-quantity input').change(function () {
      var p = $(this).attr('price');
      var op = $(this).attr('offerprice');
      var variantId = $(this).attr('variant');
    });
    var urlLike = '<?php echo e(route('rentdays')); ?>';
    $("body").on("change keyup", "#rent-day", function (t) {
      t.preventDefault();

      var p = $(this).attr('price');
      var op = $(this).attr('offerprice');
      var variantId = $(this).attr('variant');

      var e = $(this).val();


      var z = $(this).data("id");
      var stock = $(this).data("pr");

      if (e == stock) {
        swal({
          title: "Limit reached",
          text: 'Max Order quantity limit reached !',
          icon: 'warning'
        });
      }

      $.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "GET",
        url: urlLike,
        data: {
          days: e,
          id: z,
          variant_id: variantId,
          price: p,
          offerprice: op

        },

        error: function (jqXHR, exception) {

        }
      }).done(function (t) {

        var pricetotal = t.pricetotal * conversion_rate;

        pricetotal = pricetotal.toFixed(2);

        $('#show-total').text(pricetotal);
        $('#show-total-amoutn').text(pricetotal);
        if (t.singletotal == 0) {
          var singletotal = t.singletotal * conversion_rate;
          singletotal = singletotal.toFixed(2);
          $('#' + t.id).text(singletotal);
          $('#strike' + t.id).text();
        } else {
          var singletotal = t.singletotal * conversion_rate;
          singletotal = singletotal.toFixed(2);

          var noffertotal = t.noffertotal * conversion_rate;
          noffertotal = noffertotal.toFixed(2);
          $('#' + t.id).text(singletotal);
          $('#strike' + t.id).text(noffertotal);
        }

        var discount = t.per * conversion_rate
        discount = discount.toFixed(2);

        var gtotal = t.gtotal * conversion_rate;
        gtotal = gtotal.toFixed(2);
        $('#total_cart').text(gtotal);

        var shipping = t.shipping * conversion_rate;
        shipping = shipping.toFixed(2);

        $('#shipping').text(shipping);

        $('#discountedam').text(discount);

        $('#gtotal').text(gtotal);

        $('#send').val(shipping);

        $('#subtotal').text(gtotal);

        $('#qty' + t.id).text(e);


      }).fail(function () {
        console.log("Error occur !");
      })
    });
  });

  function qtych(id) {

    var conversion_rate = '<?php echo e($conversion_rate); ?>';
    var urlLike = '<?php echo e(route('rentdays')); ?>';
    var p = $('#rent-day' + id).attr('price');
    var op = $('#rent-day' + id).attr('offerprice');
    var variantId = $('#rent-day' + id).attr('variant');
    var e = $('#rent-day' + id).val();

    var z = $('#rent-day' + id).data("id");
    var stock = $('#rent-day' + id).data("pr");
    if (e == stock) {
      swal({
        title: "Limit reached",
        text: 'Max Order quantity limit reached !',
        icon: 'warning'
      });
    }

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      type: "GET",
      url: urlLike,
      data: {
        days: e,
        id: z,
        variant_id: variantId,
        price: p,
        offerprice: op

      },

      error: function (jqXHR, exception) {

      }
    }).done(function (t) {

        var pricetotal = t.pricetotal * conversion_rate;
        pricetotal = pricetotal.toFixed(2);
        $('#show-total').text(pricetotal);
        $('#show-total-amoutn').text(pricetotal);

        if (t.singletotal != 0) {
            var singletotal = t.singletotal * conversion_rate;
            singletotal = singletotal.toFixed(2);
            $('#nofferss' + t.variant_id).text(singletotal);
        } else {
            var offertotal = t.offertotal * conversion_rate;
            offertotal = offertotal.toFixed(2);

            var noffertotal = t.noffertotal * conversion_rate;
            noffertotal = noffertotal.toFixed(2);

            $('#offer_p' + t.variant_id).text(t.offertotal);
            $('#nofferss' + t.variant_id).text(noffertotal);
        }

        var total = t.total * conversion_rate;
        total = total.toFixed(2);
        $('#total_cart').text(total);

        var shipping = t.shipping * conversion_rate;
        shipping = shipping.toFixed(2);

        var discount = t.per * conversion_rate
        discount = discount.toFixed(2);

        var gtotal = t.gtotal * conversion_rate;

        gtotal = gtotal.toFixed(2);

        $('#shipping').text(shipping);

        $('#gtotal').text(gtotal);

        $('#discountedam').text(discount);

        $('#send').val(shipping);

        $('#subtotal').text(total);

        $('#sqty' + t.id).text(e);


    }).fail(function () {
      console.log("Error occur !");
    })
  }

  function checkuncheckproduct(id){
    
    var checkproduct = $('#selectproduct'+id).val();

    if(checkproduct == 1){
      var activecart = 0;
    }
    else{
      var activecart = 1;
    }
    $('#selectproduct'+id).val(activecart);
    var grand_total = $("#gtotal").text();
    var subtotal = $(".sub_total_"+id).text();
    if(activecart == 1){
      var total_amount = parseFloat(grand_total) + parseFloat(subtotal);
    }
    else{
      var total_amount = parseFloat(grand_total) - parseFloat(subtotal);
    }  
    if(total_amount<=0){
      $("#gtotal").text(0);
      $("#proccedtocheckout").prop('disabled', true);
    }else{
      $("#proccedtocheckout").prop('disabled', false);
      $("#gtotal").text(total_amount.toFixed(2));
    }
    
    var updatecart = '<?php echo e(url('/UpdateCart')); ?>';
    
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: updatecart,
      type: 'POST',
      data : { cartstatus :activecart, cart_id :id },
      success: function (response) {

       

        if (response == 1) {
          console.log("Success");
         
        } else {
          console.log("Fail");
        }

      }
    });



  }

  function addtowishlist(id) {

    var wc = $('#wishcount').text();
    wc = Number(wc);
    if (wc == 0) {
      wc = 1;
    } else {
      wc = Number(wc) + 1;
    }

    var addtowishurl = '<?php echo e(url('/AddToWishList')); ?>/'+id; var addtowishurl = '<?php echo e(url('/AddToWishList')); ?>/'+id;

    $.ajax({
      url: addtowishurl,
      type: 'GET',
      success: function (response) {

        $('#wishcount').text(wc);

        if (response == 'success') {
          swal({
            title: "Added",
            text: 'Added to your wishlist !',
            icon: 'success'
          });

          $('#addtowish' + id).parent().html('<a id="removefromwish' + id + '" onclick="removefromwishlist(' + id + ')" class="cursor-pointer icon kal" title="<?php echo e(__('Remove From Wishlist ')); ?>"><?php echo e(__('Remove From Wishlist ')); ?> <i class="fa fa-heart-o"></i></a>');

        } else {
          swal({
            title: "Oops !",
            text: 'Product is already in your wishlist !',
            icon: 'warning'
          });
        }

      }
    });
  }

  function removefromwishlist(id) {

    var removefromwishurl = '<?php echo e(url('removeWishList')); ?>/' + id;

    var wc = $('#wishcount').text();
    wc = Number(wc);
    if (wc == 1) {
      wc = 0;
    } else {
      wc = Number(wc) - 1;
    }

    $.ajax({
      url: removefromwishurl,
      type: 'GET',
      success: function (response) {

        $('#wishcount').text(wc);

        if (response == 'deleted') {
          swal({
            title: "Removed",
            text: 'Removed from your wishlist !',
            icon: 'success'
          });

          $('#removefromwish' + id).parent().html('<a id="addtowish' + id + '" onclick="addtowishlist(' + id +')" class="cursor-pointer icon addtowish" title="<?php echo e(__('Add To WishList')); ?>"><?php echo e(__('Add To WishList')); ?> <i class="fa fa-heart"></i></a>');

        } else {
          swal({
            title: "Oops !",
            text: 'Product is already  removed from your wishlist !',
            icon: 'warning'
          });
        }
      }
    });
  }
  $('.giftCart').on('click',function(){
    $('.giftcardform').toggle();
  })
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/cart.blade.php ENDPATH**/ ?>