
<?php $__env->startSection('title',__('Create a Author')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Add Author';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'All Authors';
  $data['title2'] = 'Add Author';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="row">
   
    <div class="col-lg-12">

      <?php if($errors->any()): ?>
      <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="color:red;">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>


      <div class="card m-b-30">

        <div class="card-header">
          
          <div class="row">
            <div class="col-lg-10">
                <h5 class="card-title"> <?php echo e(__("Add Authors")); ?></h5>
            </div>
            <div class="col-md-2">
              <div class="widgetbar">
                <a href="<?php echo e(route('author.index')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

              </div>
            </div>
          </div>

        </div>

        <div class="card-body">
          <!-- Form Start -->

          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(route('author.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label text-dark" for="first-name"> <?php echo e(__('Author')); ?>: <span class="required">*</span></label>
                <input placeholder="<?php echo e(__('Please enter Author name')); ?>" type="text" id="first-name" name="title" class="form-control col-md-12" value="<?php echo e(old('title')); ?>">
              </div>



                  <!-- <div class="input-group">
                    <input type="text" class="form-control iconvalue" name="icon" value="<?php echo e(__('Choose icon')); ?>">
                    <span class="input-group-append">
                      <button type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                    </span>
                  </div> -->











              <div class="form-group col-md-6">
                <label class="text-dark control-label" for="first-name"> <?php echo e(__('Image')); ?>:</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" id="img_upload_input" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange="readURL(this);" />
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose Image")); ?> </label>
                  </div>
                </div> <br>
                <div class="thumbnail-img-block mb-3">
                  <img id="image-pre" class="img-fluid" alt="">
                </div> 
              </div>
              
              <div class="form-group col-md-12">
                <label class="text-dark control-label" for="first-name"> <?php echo e(__('Description')); ?> <span class="required"></span></label>
                  <textarea cols="2" id="editor1" name="description" rows="5"> <?php echo e(old('description')); ?> </textarea>
                  <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(<?php echo e(__('Please enter description')); ?>)</small>  
              </div>

              <div class="form-group col-md-6">
                <label class="control-label text-dark" for="first-name"> <?php echo e(__("Featured:")); ?></label><br>
                <label class="switch">
                  <input class="slider tgl tgl-skewed" name="featured" type="checkbox" id="toggle-event33" checked>
                  <span class="knob"></span>
                </label>
              </div>
              
              <div class="form-group col-md-6">
                <label class="text-dark control-label" for="first-name"> <?php echo e(__('Status')); ?>: <span class="required">*</span> </label> <br>
                  <label class="text-dark switch">
                    <input class="slider tgl tgl-skewed" type="checkbox" id="status" checked="checked">
                    <span class="knob"></span>
                  </label> <br>
                  <input type="hidden" name="status" value="1" id="status3">
              </div>
            </div>
              
            <div class="form-group">
              <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> <?php echo e(__("Create")); ?></button>
            </div>

            <div class="clear-both"></div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
  <script>
      $(".midia-toggle").midia({
          base_url: '<?php echo e(url('')); ?>',
          directory_name: 'Author'
      });
  </script>
    <script>
    $('.thumbnail-img-block').hide();
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.thumbnail-img-block').show();
          $('#image-pre').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  <script>
    $('.thumbnail-img-block-icon').hide();
    function readURLIcon(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.thumbnail-img-block-icon').show();
          $('#image-pre-icon').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/author/add.blade.php ENDPATH**/ ?>