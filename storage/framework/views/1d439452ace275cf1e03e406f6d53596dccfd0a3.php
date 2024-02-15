
<?php $__env->startSection('title',"Emart | FAQ's"); ?>
<?php $__env->startSection('content'); ?>
<!-- Home Start -->
<section id="home" class="home-main-block product-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb" class="breadcrumb-main-block">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="<?php echo e(__('Home')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__("FAQ's")); ?></li>
                    </ol>
                </nav>
				<div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('frontend/assets/images/wishlist/breadcrum.png');">
					<div class="breadcrumb-nav">
						<h3 class="breadcrumb-title"><?php echo e(__("FAQ's")); ?></h3>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home End --> 
<section id="faq" class="faq-main-block">
	<div class="container">
		<?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="accordion" id="accordionExample" data-aos="fade-up">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne<?php echo e($key); ?>">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo e($key); ?>">
									<span><?php echo e($key+1); ?>.</span> <?php echo e($faq->que); ?>

								</button>
							</h2>
							<div id="collapseOne<?php echo e($key); ?>" class="accordion-collapse collapse <?php echo e($key=='0'?'show':''); ?>" aria-labelledby="headingOne<?php echo e($key); ?>" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<?php echo e($faq->ans); ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/faq.blade.php ENDPATH**/ ?>