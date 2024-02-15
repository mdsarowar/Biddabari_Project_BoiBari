


















<?php $__env->startSection('title','Boibari |  Authors'); ?>
<?php $__env->startSection("content"); ?>

 <div style="background-color: #fff8f5;">
     <!-- Home Start -->
     <section id="home" class="home-main-block">
         <div class="container bg-white">
             <div class="row">
                 <div class="col-lg-12">
                     <nav aria-label="breadcrumb" class="breadcrumb-main-block">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
                             <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Authors')); ?></li>
                         </ol>
                     </nav>
                     <div class="about-breadcrumb-block wishlist-breadcrumb"

                          style="background-image: url('frontend/assets/images/checkout/breadcrumb.png');">
                         <div class="breadcrumb-nav">
                             <h3 class="breadcrumb-title"><?php echo e(__('All Authors')); ?></h3>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- Home End -->

     <!-- Prodcut Start -->
     <section class="product-filter-main-block">
         <div class="container">
             <div class="row">
                 <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="col-lg-3 col-md-6 col-sm-6" style="margin-bottom: 20px">
                         <div class="customer-support-block border-hover" data-aos="fade-right">
                             <div class="border-hover-two">
                                 <a href="<?php echo e(route('all_product',[$author->id,'publish'])); ?>">
                                     <div class="row">
                                         <div class="col-lg-3 col-4">
                                             <div class="support-img">
                                                 
                                                 <?php if($author->image != '' && file_exists(public_path() . '/images/Publishers/' . $author->image)): ?>
                                                     <img src="<?php echo e(url('images/Publishers/'.$author->image)); ?>"
                                                          class="img-fluid shipping-img" alt="<?php echo e(__($author->title)); ?>">
                                                 <?php else: ?>
                                                     <img class="img-fluid shipping-img" title="<?php echo e(__($author->title)); ?>"
                                                          src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"/>
                                                 <?php endif; ?>
                                                 
                                             </div>
                                         </div>
                                         <div class="col-lg-9 col-8">
                                             <div class="support-dtl">
                                                 <h5 class="support-title"><?php echo e($author->title); ?></h5>
                                                 <p></p>
                                             </div>
                                         </div>
                                     </div>
                                 </a>

                             </div>
                         </div>
                     </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
         </div>
     </section>
     <!-- Product End -->

 </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function submitForm(varType = '') {
            if (varType) {
                $('.varType').val(varType);
            }
            $('.submitForm').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/pages/all_author.blade.php ENDPATH**/ ?>