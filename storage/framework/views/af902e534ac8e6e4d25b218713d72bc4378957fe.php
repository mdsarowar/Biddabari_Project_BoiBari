
<?php $__env->startSection('title',__('Offline Payment Gateway | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Offline Payment';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Offline Payment';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
    <div class="row">
        
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
                    <h5 class="box-title">
                        <?php echo e(__("All Offline Payment Gateway")); ?>

                    </h5>
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="box-title"><?php echo e(__('Sliders')); ?></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="widgetbar">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-payment.create')): ?>
                                <a data-target="#addPaymentModal" data-toggle="modal" class="btn btn-primary-rgba mr-2">
                                    <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add New")); ?>

                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                
                    <div class="table-responsive">
                        <table style="width:100%" id="full_detail_table" class="table table-bordered">
                            <thead>
                                <th>
                                    #
                                </th>
                                <th>
                                    <?php echo e(__("Payment Gateway Name")); ?>

                                </th>
                                <th>
                                    <?php echo e(__('Action')); ?>

                                </th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e(ucfirst($m->payment_name)); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1"
                                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                class="feather icon-more-vertical-"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('childcategory.edit')): ?>
                                              <a class="dropdown-item" data-toggle="modal" data-target="#editPaymentmethod<?php echo e($m->id); ?>"><i
                                                  class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                                              <?php endif; ?>
                      
                                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('childcategory.delete')): ?>
                                              <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($m->id); ?>">
                                                <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                              </a>
                                              <?php endif; ?>
                                            </div>
                                          </div>
                                        
                                       
                                    </td>
                                </tr>
                        
                                <!-- Edit Payment Method Modal -->
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-payment.edit')): ?>
                                <div data-backdrop="false" id="editPaymentmethod<?php echo e($m->id); ?>" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="editPaymentModal-title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPaymentModal-title">Edit Payment method: <?php echo e($m->payment_name); ?>


                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </h5>
                        
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('manual.payment.gateway.update',$m->id)); ?>" method="POST"
                                                    enctype="multipart/form-data">
                        
                                                    <?php echo csrf_field(); ?>
                        
                                                    <div class="form-group">
                                                        <label for="">
                                                            <?php echo e(__("Payment method name:")); ?> <span class="text-danger">*</span>
                                                        </label>
                                                        <input required type="text" value="<?php echo e($m['payment_name']); ?>" name="payment_name"
                                                            class="form-control" />
                                                    </div>
                        
                                                    <div class="form-group">
                                                        <label for="">
                                                            <?php echo e(__("Payment Instructions:")); ?> <span class="text-danger">*</span>
                                                        </label>
                        
                                                        <textarea name="description" id="" cols="30" rows="5"
                                                            class="form-control editor"><?php echo $m['description']; ?></textarea>
                        
                                                    </div>
                        
                                                    <div class="form-group">
                                                        <label for="">
                                                            <?php echo e(__("Image :")); ?>

                                                        </label>
                                                        <div class="input-group">

                                                            <input required readonly id="thumbnail<?php echo e($m['id']); ?>" name="thumbnail" type="text"
                                                                class="form-control">
                                                            <div class="input-group-append">
                                                                <span data-input="thumbnail<?php echo e($m['id']); ?>"
                                                                    class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group">
                                                        <label>Status :</label>
                                                        <br>
                                                        <label class="switch">
                                                            <input id="status" type="checkbox" name="status"
                                                                <?php echo e($m['status'] == 1 ? "checked" : ""); ?>>
                                                            <span class="knob"></span>
                                                        </label>
                                                    </div>
                        
                                                    <div class="form-group">
                                                        <button <?php if(env('DEMO_LOCK')==0): ?> type="reset"  <?php else: ?> disabled title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?>  class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                        <button <?php if(env('DEMO_LOCK')==0): ?>  type="submit" <?php else: ?> disabled title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?>  class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                                            <?php echo e(__("Update")); ?></button>
                                                    </div>
                        
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-payment.delete')): ?>
                                <!-- Delete Payment -->
                                <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($m->id); ?>" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__("DELETE")); ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                          <p><?php echo e(__('Do you really want to delete')); ?>? <?php echo e(__('This process cannot be undone.')); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                          <form method="get" action="<?php echo e(route('manual.payment.gateway.delete',$m->id)); ?>" class="pull-right">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field("DELETE")); ?>

                                            <button type="reset" class="btn btn-danger-rgba" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                            <button type="submit" class="btn btn-primary-rgba"><?php echo e(__("YES")); ?></button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php endif; ?>
                                <!-- END -->
                        
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-payment.create')): ?>
    <div data-backdrop="false" id="addPaymentModal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="addPaymentModal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentModal-title">Add new payment method</h5>

                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('manual.payment.gateway.store')); ?>" method="POST" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="">
                                <?php echo e(__('Payment method name:')); ?> <span class="text-danger">*</span>
                            </label>
                            <input required type="text" value="<?php echo e(old('payment_name')); ?>" name="payment_name"
                                class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="">
                                <?php echo e(__('Payment Instructions :')); ?> <span class="text-danger">*</span>
                            </label>

                            <textarea name="description" id="" cols="30" rows="5"
                                class="form-control editor"><?php echo old('description'); ?></textarea>

                        </div>

                        <div class="form-group">
                            <label for="">
                                <?php echo e(__("Image :")); ?>

                            </label>
                            <div class="input-group">

                                <input required readonly id="thumbnail" name="thumbnail" type="text"
                                    class="form-control">
                                <div class="input-group-append">
                                    <span data-input="thumbnail"
                                        class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>
                                <?php echo e(__('Status :')); ?>

                            </label>
                            <br>
                            <label class="switch">
                                <input id="status" type="checkbox" name="status" <?php echo e(old('status') ? "checked" : ""); ?> checked>
                                <span class="knob"></span>
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                              <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                              <?php echo e(__("Create")); ?></button>
                          </div>
              
                          <div class="clear-both"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
  <script>
      $(".midia-toggle").midia({
          base_url: '<?php echo e(url('')); ?>',
          directory_name: 'manual_payment'
      });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/manualpayment/index.blade.php ENDPATH**/ ?>