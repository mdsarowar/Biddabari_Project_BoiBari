
<?php $__env->startSection('title',__('Add New Product |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Add Product';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'All Products';
  $data['title2'] = 'Add Product';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="row">​
    <div class="col-lg-12">
      <?php if($errors->any()): ?>
      <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>
      <div class="card m-b-30">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
                <h5 class="card-title"> <?php echo e(__("Add Product")); ?></h5>
            </div>
            <div class="col-md-2">
              <div class="widgetbar">
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
            <?php echo $__env->make('admin.product.tab.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="taxmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">
          <?php echo e(__('Product Tax Information(PTI)')); ?>

        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       
      </div>
      <div class="modal-body">
        <div id="accordion">
          <?php $__currentLoopData = App\TaxClass::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $protax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#tbl<?php echo e($protax->id); ?>"
                  aria-expanded="false" aria-controls="<?php echo e($protax->title); ?>">
                  <?php echo e($protax->title); ?>

                </button>
              </h5>
            </div>
            <div id="tbl<?php echo e($protax->id); ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th><?php echo e(__("Tax Name")); ?>

                      <img src="<?php echo e((url('images/info.png'))); ?>" class="height-15" data-toggle="popover"
                        data-content="<?php echo e(__('You Want to Choose Tax Class Then Apply same Tax Class And Tax Rate.')); ?>">
                    </th>
                    <th>
                      <?php echo e(__("Tax Rate")); ?>

                    </th>
                    <th>
                      <?php echo e(__('Priority')); ?>

                      <img src="<?php echo e((url('images/info.png'))); ?>" class="height-15" data-toggle="popover" data-content="<?php echo e(__('1 Priority Is Higher Priority And All Numeric Number Is Lowest Priority, Priority Are Accept Is Numeric Number.')); ?>">
                    </th>
                    <th><?php echo e(__('Based On')); ?> <img src="<?php echo e((url('images/info.png'))); ?>" class="height-15" data-toggle="popover"
                        data-content="<?php echo e(__('You Want To Choose Billing address Then Billing Address And Zone Address Are Same Then Tax Will Be Applied, And You Will Be Choose Store Address then Store Addrss And User Billing Address Is Same Then Tax Will Be Apply')); ?>">
                    </th>
                    <th><?php echo e(__("Zone Details")); ?><img src="<?php echo e((url('images/info.png'))); ?>" class="height-15" data-toggle="popover"
                        data-content="<?php echo e(__('You Want To Choose Billing address Then Billing Address And Zone Address Are Same Then Tax Will Be Applied, And You Will Be Choose Store Address then Store Addrss And User Billing Address Is Same Then Tax Will Be Apply.')); ?>">
                    </th>
                  </tr>
                  <?php if(isset($protax->priority)): ?>
                  <?php $__currentLoopData = $protax->priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $taxRate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(isset($protax->taxRate_id[$taxRate])): ?>
                  <?php $taxs = App\Tax::where('id',$protax->taxRate_id[$taxRate])->first(); ?>
                  <?php if(isset($taxs)): ?>
                  <tr>
                    <td>
                      <?php echo e($taxs->name); ?>

                    </td>
                    <td><?php if($taxs->type=='f'): ?><?php echo e($taxs->rate); ?><?php echo e('%'); ?><?php else: ?><?php echo e($taxs->rate); ?><?php endif; ?></td>
                    <td><?php echo e($taxRate); ?></td>
                    <td><?php echo e($protax->based_on[$taxRate]); ?></td>
                    <td>
                      <?php $zone = App\Zone::where('id',$taxs->zone_id)->first();?>
                      <?php if(!empty($zone)): ?>
                      <?php echo e($zone->state_id=='0'?'All Zone':$zone->title); ?>

                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </table>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Nav tabs -->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/product/create.blade.php ENDPATH**/ ?>