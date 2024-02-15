


















<?php $__env->startSection('title','Boibari | All Product'); ?>
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
                               <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Products')); ?></li>
                           </ol>
                       </nav>
                       <div class="about-breadcrumb-block wishlist-breadcrumb" style=" background-color: #6a9c23">
                           <div class="breadcrumb-nav">
                               <h3 class="breadcrumb-title text-light"><?php echo e(__(' Products')); ?></h3>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- Home End -->

       <!-- Prodcut Start -->
       <section id="product-filter" class="product-filter-main-block">
           <div class="container bg-white pc">
               <div class="row">
                   <div class="col-lg-3 col-md-4">
                       <div class="product-filter-sidebar">
                           <form id="filterform" action="<?php echo e(route('filter_product')); ?>" method="get" class="submitForm">
                               <?php echo csrf_field(); ?>
                               
                               <div class="accordion" id="accordionExample">

                                   <div class="product-filter-block checkout-personal-dtl accordion-item">
                                       <div class="accordion-header" id="headingcategory">
                                           <h4 class="section-title accordion-button" type="button"
                                               data-bs-toggle="collapse" data-bs-target="#collapsecategory"
                                               aria-expanded="true"
                                               aria-controls="collapsecategory">Category</h4>
                                           <div id="collapsecategory" class="accordion-collapse collapse show"
                                                aria-labelledby="headingcategory" data-bs-parent="#accordionExample">
                                               <div class="accordion-body">
                                                   <ul>
                                                       <?php $__currentLoopData = App\Category::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <li>
                                                               <label class="address-checkbox mb-15"><?php echo e($category->title); ?>

                                                                   <input <?php echo e(isset($selectcategories)?(in_array($category->id,$selectcategories)) ?'checked':'':''); ?> type="checkbox"
                                                                          id="br<?php echo e($category->id); ?>" onclick="submitForm()"
                                                                          name="categories[]" value="<?php echo e($category->id); ?>">
                                                                   <span class="checkmark"></span>
                                                               </label>
                                                           </li>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   </ul>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="product-filter-block checkout-personal-dtl accordion-item">
                                       <div class="accordion-header" id="headingauthor">
                                           <h4 class="section-title accordion-button" type="button"
                                               data-bs-toggle="collapse" data-bs-target="#collapseauthor"
                                               aria-expanded="true"
                                               aria-controls="collapseauthor">Author</h4>
                                           <div id="collapseauthor" class="accordion-collapse collapse show"
                                                aria-labelledby="headingauthor" data-bs-parent="#accordionExample">
                                               <div class="accordion-body">
                                                   <ul>
                                                       <?php $__currentLoopData = App\Author::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <li>
                                                               <label class="address-checkbox mb-15"><?php echo e($author->title); ?>

                                                                   <input <?php echo e(isset($selectauthors)?(in_array($author->id,$selectauthors)) ?'checked':'':''); ?> type="checkbox"
                                                                          id="br<?php echo e($author->id); ?>" onclick="submitForm()"
                                                                          name="authors[]" value="<?php echo e($author->id); ?>">
                                                                   <span class="checkmark"></span>
                                                               </label>
                                                           </li>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   </ul>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="product-filter-block checkout-personal-dtl accordion-item">
                                       <div class="accordion-header" id="headingpublisher">
                                           <h4 class="section-title accordion-button" type="button"
                                               data-bs-toggle="collapse" data-bs-target="#collapsepublisher"
                                               aria-expanded="true"
                                               aria-controls="collapsepublisher">Publisher</h4>
                                           <div id="collapsepublisher" class="accordion-collapse collapse show"
                                                aria-labelledby="headingpublisher" data-bs-parent="#accordionExample">
                                               <div class="accordion-body">
                                                   <ul>
                                                       <?php $__currentLoopData = App\Publisher::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <li>
                                                               <label class="address-checkbox mb-15"><?php echo e($publisher->title); ?>

                                                                   <input <?php echo e(isset($selectpublishers)?(in_array($publisher->id,$selectpublishers)) ?'checked':'':''); ?> type="checkbox"
                                                                          id="br<?php echo e($publisher->id); ?>"
                                                                          onclick="submitForm()" name="publishers[]"
                                                                          value="<?php echo e($publisher->id); ?>">
                                                                   <span class="checkmark"></span>
                                                               </label>
                                                           </li>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   </ul>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="product-filter-img">
                                   <img src="<?php echo e(url('frontend/assets/images/product/offer.png')); ?>" class="img-fluid"
                                        alt="img not found">
                               </div>
                           </form>
                       </div>
                   </div>
                   <div class="col-lg-9 col-md-8">
                       <div class="row">
                           
                           <?php if($products): ?>
                               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="col-lg-3 col-md-4 col-4">
                                       <div class="featured-product-block">
                                           <div class="featured-product-img">
                                               <a style="height: 257px" href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>" title="">
                                                   <?php if($product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$product->thumbnail)): ?>

                                                       <img style="height: 300px" class="img-fluid pt-2 pb-2"
                                                            src="<?php echo e(url('images/simple_products/'.$product->thumbnail)); ?>"
                                                            alt="<?php echo e($product->product_name); ?>">

                                                   <?php else: ?>

                                                       <img style="height: 300px" class="img-fluid pt-2 pb-2" title=""
                                                            src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"/>

                                                   <?php endif; ?>
                                               </a>

                                               
                                               
                                               
                                               
                                               

                                               

                                               

                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               

                                               

                                               
                                               
                                               
                                               
                                               
                                               

                                               
                                               
                                               
                                               

                                               
                                               
                                               
                                               

                                               
                                               
                                               
                                               
                                               <?php if($product['sale_tag'] !== NULL && $product['sale_tag'] != ''): ?>
                                                   <div class="featured-product-badge">
                                                <span class="badge" style="background : <?php echo e($product['sale_tag_color']); ?> ; color : <?php echo e($product['sale_tag_text_color']); ?>">
                                                       <?php echo e($product['sale_tag']); ?>

                                                </span>
                                                   </div>
                                               <?php endif; ?>
                                           </div>
                                           <div class="featured-product-dtl">
                                               <div class="row">
                                                   <div class="col-xl-12 col-lg-12">
                                                       <h6 class="featured-product-title truncate">
                                                           <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>">
                                                               <?php echo e($product->product_name); ?>

                                                           </a>
                                                       </h6>
                                                       <p class="store-name fs-9">By:
                                                           <?php echo e(__($product->author_id?$product->author->title:'')); ?>

                                                       </p>

                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                   </div>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   

                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                               </div>
                                               <div class="row">
                                                   
                                                   <div class="col-md-8  text-start">
                                                       
                                                       <div class="featured-product-price text-start fs-6 ">
                                                           <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                           <?php echo e($product->offer_price != 0 && $product->offer_price != '' ? price_format($product->offer_price) :  price_format($product->price)); ?>

                                                           <del class="text-danger"><?php echo e($product->offer_price != 0 && $product->offer_price != '' ? price_format($product->price) :  ''); ?></del>
                                                       </div>
                                                       

                                                       
                                                       
                                                       
                                                       
                                                       
                                                       

                                                   </div>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   <div class="col-md-4 text-end ">
                                                       
                                                       
                                                       <form method="POST"
                                                             action="<?php echo e($product->type == 'ex_product' ? $product->external_product_link : route('add.cart.simple',['pro_id' => $product->id, 'price' => $product->price, 'offerprice' => $product->offer_price])); ?>"
                                                             class="addSimpleCardFrom<?php echo e($product->id); ?>">
                                                           <?php echo csrf_field(); ?>

                                                           <input name="qty" type="hidden"
                                                                  value="<?php echo e($product->min_order_qty); ?>"
                                                                  max="<?php echo e($product->max_order_qty); ?>"
                                                                  class="qty-section">

                                                           <a href="javascript:"
                                                              onclick="addSimpleProCard(<?php echo e($product->id); ?>)"
                                                              data-bs-toggle="tooltip" data-bs-placement="left"
                                                              data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                                                       data-feather="shopping-cart"></i></a>

                                                       </form>
                                                       
                                                       
                                                   </div>
                                                   
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>


                       </div>
                   </div>
               </div>
           </div>
           <div class="container bg-white mobile">
               <div class="row">
                   <div class="col-lg-3 col-md-4">
                       <!-- Button trigger modal -->
                       <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalCenter">
                           Filter Product
                       </button>

                       <!-- Modal -->
                       <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle">Filter</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                       <div class="product-filter-sidebar">
                                           <form id="filterform" action="<?php echo e(route('filter_product')); ?>" method="get" class="mobilesubmitForm">
                                               <?php echo csrf_field(); ?>
                                               
                                               <div class="accordion" id="accordionExample">

                                                   <div class="product-filter-block checkout-personal-dtl accordion-item">
                                                       <div class="accordion-header" id="headingcategory">
                                                           <h4 class="section-title accordion-button" type="button"
                                                               data-bs-toggle="collapse" data-bs-target="#collapsecategory"
                                                               aria-expanded="true"
                                                               aria-controls="collapsecategory">Category</h4>
                                                           <div id="collapsecategory" class="accordion-collapse collapse show"
                                                                aria-labelledby="headingcategory" data-bs-parent="#accordionExample">
                                                               <div class="accordion-body">
                                                                   <ul>
                                                                       <?php $__currentLoopData = App\Category::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                           <li>
                                                                               <label class="address-checkbox mb-15"><?php echo e($category->title); ?>

                                                                                   <input <?php echo e(isset($selectcategories)?(in_array($category->id,$selectcategories)) ?'checked':'':''); ?> type="checkbox"
                                                                                          id="br<?php echo e($category->id); ?>" onclick="mobilesubmit()"
                                                                                          name="categories[]" value="<?php echo e($category->id); ?>">
                                                                                   <span class="checkmark"></span>
                                                                               </label>
                                                                           </li>
                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                   </ul>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="product-filter-block checkout-personal-dtl accordion-item">
                                                       <div class="accordion-header" id="headingauthor">
                                                           <h4 class="section-title accordion-button" type="button"
                                                               data-bs-toggle="collapse" data-bs-target="#collapseauthor"
                                                               aria-expanded="true"
                                                               aria-controls="collapseauthor">Author</h4>
                                                           <div id="collapseauthor" class="accordion-collapse collapse show"
                                                                aria-labelledby="headingauthor" data-bs-parent="#accordionExample">
                                                               <div class="accordion-body">
                                                                   <ul>
                                                                       <?php $__currentLoopData = App\Author::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                           <li>
                                                                               <label class="address-checkbox mb-15"><?php echo e($author->title); ?>

                                                                                   <input <?php echo e(isset($selectauthors)?(in_array($author->id,$selectauthors)) ?'checked':'':''); ?> type="checkbox"
                                                                                          id="br<?php echo e($author->id); ?>" onclick="mobilesubmit()"
                                                                                          name="authors[]" value="<?php echo e($author->id); ?>">
                                                                                   <span class="checkmark"></span>
                                                                               </label>
                                                                           </li>
                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                   </ul>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="product-filter-block checkout-personal-dtl accordion-item">
                                                       <div class="accordion-header" id="headingpublisher">
                                                           <h4 class="section-title accordion-button" type="button"
                                                               data-bs-toggle="collapse" data-bs-target="#collapsepublisher"
                                                               aria-expanded="true"
                                                               aria-controls="collapsepublisher">Publisher</h4>
                                                           <div id="collapsepublisher" class="accordion-collapse collapse show"
                                                                aria-labelledby="headingpublisher" data-bs-parent="#accordionExample">
                                                               <div class="accordion-body">
                                                                   <ul>
                                                                       <?php $__currentLoopData = App\Publisher::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                           <li>
                                                                               <label class="address-checkbox mb-15"><?php echo e($publisher->title); ?>

                                                                                   <input <?php echo e(isset($selectpublishers)?(in_array($publisher->id,$selectpublishers)) ?'checked':'':''); ?> type="checkbox"
                                                                                          id="br<?php echo e($publisher->id); ?>"
                                                                                          onclick="mobilesubmit()" name="publishers[]"
                                                                                          value="<?php echo e($publisher->id); ?>">
                                                                                   <span class="checkmark"></span>
                                                                               </label>
                                                                           </li>
                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                   </ul>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="product-filter-img">
                                                   <img src="<?php echo e(url('frontend/assets/images/product/offer.png')); ?>" class="img-fluid"
                                                        alt="">
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       
                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
                   <div class="col-lg-9 col-md-8">
                       <div class="row">
                           
                           <?php if($products): ?>
                               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="col-6">
                                       <div class="featured-product-block">
                                           <div class="featured-product-img">

                                               <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>" title="">
                                                   <?php if($product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$product->thumbnail)): ?>

                                                       <img class="img-fluid "
                                                            src="<?php echo e(url('images/simple_products/'.$product->thumbnail)); ?>"
                                                            alt="<?php echo e($product->product_name); ?>">

                                                   <?php else: ?>

                                                       <img class="img-fluid" title=""
                                                            src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"/>

                                                   <?php endif; ?>
                                               </a>
                                               
                                               
                                               
                                               
                                               
                                               

                                               

                                               

                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               

                                               

                                               
                                               
                                               
                                               
                                               
                                               

                                               
                                               
                                               
                                               

                                               
                                               
                                               
                                               

                                               
                                               
                                               
                                               
                                               <?php if($product['sale_tag'] !== NULL && $product['sale_tag'] != ''): ?>
                                                   <div class="featured-product-badge">
                                                <span class="badge" style="background : <?php echo e($product['sale_tag_color']); ?> ; color : <?php echo e($product['sale_tag_text_color']); ?>">
                                                       <?php echo e($product['sale_tag']); ?>

                                                </span>
                                                   </div>
                                               <?php endif; ?>
                                           </div>
                                           <div class="featured-product-dtl">
                                               <div class="row">
                                                   <div class="col-xl-12 col-lg-12 col-md-12">
                                                       <h6 class="featured-product-title truncate fw-bold">
                                                           <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>">
                                                               <?php echo e($product->product_name); ?>

                                                           </a>
                                                       </h6>

                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                   </div>

                                               </div>
                                               <div class="row">
                                                   <div class="col-md-12  text-start">
                                                       <p class="store-name fs-9">By:
                                                           <?php echo e(__($product->author_id?$product->author->title:'')); ?>

                                                       </p>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   
                                                   <div class="col-md-12  text-start">
                                                       
                                                       <div class="featured-product-price text-start fs-5 ">
                                                           <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                           
                                                           <del class="text-danger h12"><?php echo e($product->offer_price != 0 && $product->offer_price != '' ? price_format($product->price) :  ''); ?></del>
                                                       </div>
                                                       

                                                       
                                                       
                                                       
                                                       
                                                       

                                                   </div>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                               </div>

                                               <div class="row">
                                                   <div class="col-8 text-start">
                                                       <div class="featured-product-price text-start fs-6">
                                                           <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                           <?php echo e($product->offer_price != 0 && $product->offer_price != '' ? price_format($product->offer_price) :  price_format($product->price)); ?>

                                                           
                                                       </div>
                                                   </div>
                                                   <div class="col-4 text-end">
                                                       <form method="POST"
                                                             action="<?php echo e($product->type == 'ex_product' ? $product->external_product_link : route('add.cart.simple',['pro_id' => $product->id, 'price' => $product->price, 'offerprice' => $product->offer_price])); ?>"
                                                             class="addSimpleCardFrom<?php echo e($product->id); ?>">
                                                           <?php echo csrf_field(); ?>

                                                           <input name="qty" type="hidden"
                                                                  value="<?php echo e($product->min_order_qty); ?>"
                                                                  max="<?php echo e($product->max_order_qty); ?>"
                                                                  class="qty-section">

                                                           <a href="javascript:"
                                                              onclick="addSimpleProCard(<?php echo e($product->id); ?>)"
                                                              data-bs-toggle="tooltip" data-bs-placement="left"
                                                              data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                                                       data-feather="shopping-cart"></i></a>

                                                       </form>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>


                       </div>
                   </div>
               </div>
           </div>

       </section>
       <!-- Product End -->

   </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function mobilesubmit(){
            $('.mobilesubmitForm').submit();
        }
        function submitForm() {
            
            

            
            

            
            
            
            
            
            
            
            
            
            // alert("sarowar");
            // if (varType) {
            //     // console.log('varType');
            //     $('.varType').val(varType);
            // }
            $('.submitForm').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/pages/all_product.blade.php ENDPATH**/ ?>