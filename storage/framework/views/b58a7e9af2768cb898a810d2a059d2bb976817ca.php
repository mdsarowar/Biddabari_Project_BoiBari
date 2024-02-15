
<?php $__env->startSection('title',__('All Publishers')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'All Publisher';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'All Publisher';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <h5 class="card-title"> <?php echo e(__("All Publisher")); ?></h5>
                    </div>
                    <div class="col-md-6">
                      <div class="widgetbar">


                        <a href="<?php echo e(route('publisher.create')); ?> " class="btn btn-primary-rgba mr-2">
                            <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add Publisher")); ?>

                        </a>









                        
                      </div> 
                    </div>
                  </div>

                </div>
                 
                <table id="full_detail_table" class="cattable w-100 table table-bordered table-striped">
                  <thead>
                    <tr class="table-heading-row">
                      <th>#</th>
                      <th><?php echo e(__('Image')); ?></th>
                      <th><?php echo e(__('Title')); ?></th>
                      <th><?php echo e(__('Detail')); ?></th>
                      <th><?php echo e(__('Status')); ?></th>
                      <th><?php echo e(__('Featured')); ?></th>
                      <th><?php echo e(__('Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="row1" data-id="<?php echo e($pub->id); ?>">
                      
                      <td><?php echo e(++$key); ?></td>

                      <td>
                        <?php if($pub->image != '' && file_exists(public_path().'/images/Publishers/'.$pub->image) ): ?>
                        <img class="pro-img mr-2" align="left" src="<?php echo e(asset('images/Publishers/'.$pub->image)); ?>" title="<?php echo e($pub->title); ?>">

                        <?php else: ?>
                        <img class="pro-img mr-2" align="left" title="<?php echo e($pub->title); ?>" src="<?php echo e(Avatar::create($pub->title)->toBase64()); ?>" />
                        <?php endif; ?>
                      </td>
                      
                      <td> <?php echo e($pub->title); ?> </td>
                      
                      <td>
                        
                        <p><b><?php echo e(__('Name')); ?>: </b><span class="font-weight500"><?php echo e($pub->title); ?></span></p>
                        <p><b><?php echo e(__('Description')); ?>: </b><span class="text-justify font-weight500"><?php echo e(substr(strip_tags($pub->description), 0, 100)); ?><?php echo e(strlen(strip_tags(
                           $pub->description))>100 ? '...' : ""); ?></span></p>
                      </td>
            
                      <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category.edit')): ?>
                        <form method="POST" action="<?php echo e(route('cat.quick.update',$pub->id)); ?>">
                          <?php echo e(csrf_field()); ?>

                          <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> title="<?php echo e(__("This operation is disabled in Demo !")); ?>"
                            disabled="" <?php endif; ?> class="btn btn-sm btn-rounded <?php echo e($pub->status ==1 ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>">
                            <?php echo e($pub->status==1 ? __('Active') : __('Deactive')); ?>

                          </button>
                        </form>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category.edit')): ?>
                        <form method="POST" action="<?php echo e(route('cat.featured.quick.update',$pub->id)); ?>">
                          <?php echo e(csrf_field()); ?>

                          <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> title="<?php echo e(__("This operation is disabled in Demo !")); ?>"
                            disabled="" <?php endif; ?> class="btn btn-sm btn-rounded <?php echo e($pub->featured ==1 ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>">
                            <?php echo e($pub->featured==1 ? 'Yes' : 'No'); ?>

                          </button>
                        </form>
                        <?php endif; ?>
                      </td>
                     
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                          <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">

                              <a class="dropdown-item" href="<?php echo e(route('publisher.edit',$pub->id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>

          
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category.delete')): ?>
                              <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($pub->id); ?>" >
                                <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                            </a>
                              <?php endif; ?>
                          </div>
                      </div>
                      <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($pub->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <form method="post" action="<?php echo e(route('publisher.destroy',$pub->id)); ?>" class="pull-right">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field("DELETE")); ?>

                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                        <button type="submit" class="btn btn-primary"><?php echo e(__("YES")); ?></button>
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


<div class="modal fade" id="importcategories" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleStandardModalLabel"><?php echo e(__("Bulk Import Categories")); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- main content start -->
        <a href="<?php echo e(url('files/Category.xlsx')); ?>" class="btn btn-md btn-success"> Download Example xls/csv
          File</a>
        <hr>
        <form action="<?php echo e(url('/import/categories')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <div class="row">
            <div class="form-group col-md-12">
              <label for="file"><?php echo e(__('Choose your xls/csv File :')); ?></label>
              <!-- ------------ -->
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="file" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01" required>
                  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
                </div>
                <?php if($errors->has('file')): ?>
                <span class="invalid-feedback text-danger" role="alert">
                  <strong><?php echo e($errors->first('file')); ?></strong>
                </span>
                <?php endif; ?>
                <p></p>
              </div>
              <!-- ------------- -->
              <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> <?php echo e(__('Import')); ?></button>
            </div>

          </div>

        </form>

        <div class="box box-danger">
          <div class="box-header with-border">
            <div class="box-title"><?php echo e(__('Instructions')); ?></div>
          </div>

          <div class="box-body">
            <p><b><?php echo e(__('Follow the instructions carefully before importing the file.')); ?></b></p>
            <p><?php echo e(__('The columns of the file should be in the following order.')); ?></p>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th><?php echo e(__('Column No')); ?></th>
                  <th><?php echo e(__('Column Name')); ?></th>
                  <th><?php echo e(__('Required')); ?></th>
                  <th><?php echo e(__('Description')); ?></th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>1</td>
                  <td><b>name</b></td>
                  <td><b><?php echo e(__('Yes')); ?></b></td>
                  <td><?php echo e(__("Enter category name")); ?></td>
                </tr>

                <tr>
                  <td>2</td>
                  <td> <b>status</b> </td>
                  <td><b><?php echo e(__('Yes')); ?></b></td>
                  <td><?php echo e(__('Category status')); ?> (1 = <?php echo e(__('active')); ?>, 0 = <?php echo e(__('deactive')); ?>)</b> .</td>
                </tr>
                

                <tr>
                  <td>3</td>
                  <td> <b>image</b> </td>
                  <td><b><?php echo e(__('No')); ?></b></td>
                  <td><?php echo e(__("Name your image eg: example.jpg")); ?> <b>(Image can be uploaded using Media Manager / Category Files Tab. )</b> .</td>
                </tr>

                <tr>
                  <td>4</td>
                  <td> <b>icon</b> </td>
                  <td><b><?php echo e(__('No')); ?></b></td>
                  <td><?php echo e(__("Icon class name eg:")); ?> fa-book.</b> .</td>
                </tr>

                <tr>
                  <td>5</td>
                  <td> <b>description</b> </td>
                  <td><b><?php echo e(__('No')); ?></b></td>
                  <td><b><?php echo e(__('Description of your category.')); ?></b></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td> <b>featured</b> </td>
                  <td><b><?php echo e(__('No')); ?></b></td>
                  <td><b><?php echo e(__('Set category to be featured')); ?> 1 = <?php echo e(__('Yes')); ?> , 0 = <?php echo e(__("No")); ?>.</b></td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <!-- main content end -->
      </div>

    </div>
  </div>
</div>

<!-- /page content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  var url = <?php echo json_encode(url('reposition/category')); ?>;
</script>
<script src="<?php echo e(url('js/category.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/publisher/index.blade.php ENDPATH**/ ?>