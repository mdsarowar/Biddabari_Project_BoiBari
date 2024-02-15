
<?php $__env->startSection('title',__('All Brands | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'All Brand';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'All Brand';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="row">

    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          
          <div class="row">
            <div class="col-lg-7">
                <h5 class="card-title"> <?php echo e(__("All Brand")); ?></h5>
            </div>
            <div class="col-md-5">
            <div class="widgetbar">

              <a href=" <?php echo e(url('admin/brand/create')); ?> " class="btn btn-primary-rgba mr-2">
                <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add Brand")); ?>

              </a>
              <a data-toggle="modal" data-target="#importbrand" role="button" class="btn btn-success-rgba mr-2">
                <i class="feather icon-file-text mr-2"></i> <?php echo e(__("Import Brands")); ?>

              </a>
              
            </div>
            </div>
          </div>
          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="brandTable" class="width100 table table-bordered table-striped">
              <thead>
                <tr>
                  <th><?php echo e(__("Sr. NO.")); ?></th>
                  <th><?php echo e(__("Brand Name")); ?></th>
                  <th><?php echo e(__("Brand Logo")); ?></th>
                  <th><?php echo e(__("Status")); ?></th>
                  <th><?php echo e(__("Action")); ?></th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade bd-example-modal-sm" id="delete<?php echo e($brand->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
        <p><?php echo e(__('Do you really want to delete')); ?>? <?php echo e(__('This process can\'t be undone.')); ?></p>
      </div>
      <div class="modal-footer">
        <form method="post" action="<?php echo e(url('admin/brand/'.$brand->id)); ?>" class="pull-right">
          <?php echo e(csrf_field()); ?>

          <?php echo e(method_field("DELETE")); ?>

          <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('NO')); ?></button>
          <button type="submit" class="btn btn-primary"><?php echo e(__("YES")); ?></button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="modal fade" id="importbrand" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleStandardModalLabel"><?php echo e(__("Bulk Import Brands")); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- main content start -->
        <a href="<?php echo e(url('files/Brands.xlsx')); ?>" class="btn btn-md btn-success"> <?php echo e(__("Download Example xls/csv file")); ?>

          </a>
        <hr>
        <form action="<?php echo e(url('/import/brands')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <div class="row">
            <div class="form-group col-md-12">
              <label for="file"><?php echo e(__("Choose your xls/csv file")); ?> :</label>
              <!-- ------------ -->
              <div class="input-group mb-3">
               
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
            <div class="box-title"><?php echo e(__("Instructions")); ?></div>
          </div>

          <div class="box-body">
            <p><b><?php echo e(__("Follow the instructions carefully before importing the file.")); ?></b></p>
            <p><?php echo e(__("The columns of the file should be in the following order.")); ?></p>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th><?php echo e(__("Column NO")); ?></th>
                  <th><?php echo e(__("Column Name")); ?></th>
                  <th><?php echo e(__("Required")); ?></th>
                  <th><?php echo e(__("Description")); ?></th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>1</td>
                  <td><b>name</b></td>
                  <td><b><?php echo e(__("Yes")); ?></b></td>
                  <td><?php echo e(__("Enter brand name")); ?></td>
                </tr>

                <tr>
                  <td>2</td>
                  <td> <b>status</b> </td>
                  <td><b><?php echo e(__("Yes")); ?></b></td>
                  <td><?php echo e(__("Brand status")); ?> (1 = <?php echo e(__("active")); ?>, 0 = <?php echo e(__("deactive")); ?>)</b> .</td>
                </tr>
                

                <tr>
                  <td>3</td>
                  <td> <b>image</b> </td>
                  <td><b><?php echo e(__('NO')); ?></b></td>
                  <td><?php echo e(__('Name your image eg: example.jpg')); ?> <b>(<?php echo e(__("Image can be uploaded using Media Manager / Brand Tab.")); ?> )</b> .</td>
                </tr>

                <tr>
                  <td>4</td>
                  <td> <b>show_image</b> </td>
                  <td><b><?php echo e(__('NO')); ?></b></td>
                  <td><?php echo e(__("Show brand in brand slider in footer (front)")); ?></b> .</td>
                </tr>

                <tr>
                  <td>5</td>
                  <td> <b>category_id</b> </td>
                  <td><b><?php echo e(__("Yes")); ?></b></td>
                  <td><?php echo e(__("Multiple category id can be pass here seprate by comma")); ?></b> .</td>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  var url = <?php echo json_encode(route('brand.index'), 15, 512) ?>;
</script>
<script src="<?php echo e(url('js/brand.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/brand/index.blade.php ENDPATH**/ ?>