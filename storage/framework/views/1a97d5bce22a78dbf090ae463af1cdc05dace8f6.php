
<?php $__env->startSection('title',__('All RMA Reasons | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'All RMA Reasons';
  $data['title0'] = 'Order & Invoices';
  $data['title1'] = 'All RMA Reasons';
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
          
          <div class="row">
            <div class="col-lg-8">
               <h5 class="box-title"><?php echo e(__('All RMA Reasons')); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a data-target="#createrma" data-toggle="modal" class=" btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>
                    <?php echo e(__('Add Reason')); ?>

                </a>
              </div>
            </div>
          </div>
          
        </div>
        <div class="card-body">
               
          <div class="table-responsive">
            <table  id="datatable-buttons" class="table table-striped table-bordered">
             <thead>
               <tr>
                 <th><?php echo e(__('#')); ?></th>
                 <th><?php echo e(__('Reason')); ?></th>
                 <th><?php echo e(__('Status')); ?></th>
                 <th><?php echo e(__('Action')); ?></th>
                </tr>
               </thead>

               <tbody>
                <?php $__currentLoopData = $allrma; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e(++$key); ?></td>
                      <td class="text-dark"><?php echo e($item->reason); ?></td>
                      <td>
                        <p class="badge badge-<?php echo e($item->status == 1 ? __("success") : __("danger")); ?>">
                          <?php echo e($item->status == 1 ? __("Active") : __("Deactive")); ?>

                        </p>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                          <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">

                            <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#edit<?php echo e($item->id); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>

                            <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($item->id); ?>"><i class="feather icon-trash mr-2"></i><?php echo e(__("Delete")); ?></a>
                          
                          </div>
                      </div>
                      </td>
                    </tr>

                    <div id="delete<?php echo e($item->id); ?>" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
        
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                            <p><?php echo e(__('Do you really want to delete this reason')); ?> <b><?php echo e($item->reason); ?></b><?php echo e(__("? This process cannot be undone.")); ?></p>
                          </div>
                          <div class="modal-footer">
                          <form method="POST" action="<?php echo e(route('rma.destroy',$item->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
        
                              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
                              <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
                            </form>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div id="edit<?php echo e($item->id); ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="my-modal-title"><?php echo e(__("Update reason")); ?></h5>
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('rma.update',$item->id)); ?>" class="form" method="POST" novalidate>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("PUT"); ?>
                
                                    <?php if (isset($component)) { $__componentOriginal30600fd1d86901c8d1e2118fb7bb2cb7e3d1570f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Forms\Input::class, ['value' => $item->reason,'placeholder' => __('Enter reason'),'label' => __('Enter Reason:'),'name' => 'reason','required' => true]); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30600fd1d86901c8d1e2118fb7bb2cb7e3d1570f)): ?>
<?php $component = $__componentOriginal30600fd1d86901c8d1e2118fb7bb2cb7e3d1570f; ?>
<?php unset($__componentOriginal30600fd1d86901c8d1e2118fb7bb2cb7e3d1570f); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal44a171300c32a35c42cf26101b7092dc0f5595ca = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Forms\Toggle::class, ['label' => __('Status'),'name' => 'status','checked' => $item->status == 1 ? true : false]); ?>
<?php $component->withName('forms.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44a171300c32a35c42cf26101b7092dc0f5595ca)): ?>
<?php $component = $__componentOriginal44a171300c32a35c42cf26101b7092dc0f5595ca; ?>
<?php unset($__componentOriginal44a171300c32a35c42cf26101b7092dc0f5595ca); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Forms\Button::class, ['text' => __('Update'),'type' => 'submit','class' => 'btn-md btn-primary-rgba','icon' => 'icon-save']); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div id="delete<?php echo e($item->id); ?>" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
        
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                            <p><?php echo e(__("Do you really want to delete this reason")); ?> <b><?php echo e($item->reason); ?></b><?php echo e(__("? This process cannot be undone.")); ?></p>
                          </div>
                          <div class="modal-footer">
                          <form method="POST" action="<?php echo e(route('rma.destroy',$item->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
        
                              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
                              <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
                            </form>
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
  </div>
</div>

<div id="createrma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><?php echo e(__("Create reason")); ?></h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('rma.store')); ?>" class="form" method="POST" novalidate>
                    <?php echo csrf_field(); ?>

                    <?php if (isset($component)) { $__componentOriginal30600fd1d86901c8d1e2118fb7bb2cb7e3d1570f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Forms\Input::class, ['value' => old('reason'),'placeholder' => __('Enter reason'),'label' => __('Enter Reason:'),'name' => 'reason','required' => true]); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30600fd1d86901c8d1e2118fb7bb2cb7e3d1570f)): ?>
<?php $component = $__componentOriginal30600fd1d86901c8d1e2118fb7bb2cb7e3d1570f; ?>
<?php unset($__componentOriginal30600fd1d86901c8d1e2118fb7bb2cb7e3d1570f); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal44a171300c32a35c42cf26101b7092dc0f5595ca = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Forms\Toggle::class, ['label' => __('Status'),'name' => 'status','checked' => false]); ?>
<?php $component->withName('forms.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44a171300c32a35c42cf26101b7092dc0f5595ca)): ?>
<?php $component = $__componentOriginal44a171300c32a35c42cf26101b7092dc0f5595ca; ?>
<?php unset($__componentOriginal44a171300c32a35c42cf26101b7092dc0f5595ca); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Forms\Button::class, ['text' => __('Create'),'type' => 'submit','class' => 'btn-md btn-primary-rgba','icon' => 'icon-plus']); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
              
                       
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/rma/index.blade.php ENDPATH**/ ?>