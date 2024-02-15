
<?php $__env->startSection('title',__('Footer Social Icon Setting | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Social Icon';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Social Icon';
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
              <h5 class="box-title"><?php echo e(__('Social Icon Setting')); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a href="<?php echo e(url('admin/social/create')); ?>" class=" btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Social Icon')); ?></a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
         <!-- main content start -->
         <div class="table-responsive">
           <table id="datatable-buttons" class="table table-striped table-bordered">
             <thead>
               <th><?php echo e(__('ID')); ?></th>
               <th><?php echo e(__('Url')); ?></th>
               <th><?php echo e(__('Icon')); ?></th>
               <th><?php echo e(__('Status')); ?></th>
               <th><?php echo e(__('Action')); ?></th>
             </thead>
             <tbody>
             <?php $i=1; ?>
               <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($i++); ?></td>
                  <td><?php echo e($social->url); ?></td>
                  <td>
                  <?php echo e(ucfirst($social->icon)); ?>

                  </td> 
                  <td>
                    <form action="<?php echo e(route('social.quick.update',$social->id)); ?>" method="POST">
                     <?php echo e(csrf_field()); ?>

                     <button <?php if(env('DEMO_LOCK') == 0): ?> type="submit" <?php else: ?> disabled="" title="<?php echo e(__('This action cannot be done in demo !')); ?>" <?php endif; ?> class="btn btn-rounded <?php echo e($social->status == 1 ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>">
                       <?php echo e($social->status ==1 ? 'Active' : 'Deactive'); ?>

                     </button>
                     </form>
                  </td>
                  <td>
                    <div class="dropdown">
                       <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                       <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                           <a class="dropdown-item" href="<?php echo e(url('admin/social/'.$social->id.'/edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                           <a <?php if(env('DEMO_LOCK') == 0): ?> data-toggle="modal" data-target="#delete<?php echo e($social->id); ?>" <?php else: ?> dis title="This action is disabled in demo !" <?php endif; ?> class="dropdown-item btn btn-link"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                       </div>
                    </div>
                   <!-- delete Modal start -->
                    <div id="delete<?php echo e($social->id); ?>" class="delete-modal modal fade" role="dialog">
                       <div class="modal-dialog modal-sm">
                         <!-- Modal content-->
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             <div class="delete-icon"></div>
                           </div>
                           <div class="modal-body text-center">
                             <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                             <p>
                               <?php echo e(__("Do you really want to delete this Icon? This process cannot be undone.")); ?>

                             </p>
                           </div>
                           <div class="modal-footer">
                             <form method="post" action="<?php echo e(url('admin/social/'.$social->id)); ?>" class="pull-right">
                                         <?php echo e(csrf_field()); ?>

                                         <?php echo e(method_field("DELETE")); ?>

                                       
                               <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
                               <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                  </td>
                </tr>
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
                
 ​
                       
​
                            
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/social/index.blade.php ENDPATH**/ ?>