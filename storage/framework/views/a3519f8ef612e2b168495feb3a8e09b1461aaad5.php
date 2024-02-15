
<?php $__env->startSection('title',__("Edit Author | ")); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Edit Author';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'All Authors';
  $data['title2'] = 'Edit Author';
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
            <div class="col-lg-10">
                <h5 class="card-title"> <?php echo e(__("Edit Author")); ?></h5>
            </div>
            <div class="col-md-2">
              <div class="widgetbar">
                <a href="<?php echo e(route('author.index')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
              </div>
            </div>
          </div>

        </div>

        <div class="card-body">
          <!-- Start Form -->
          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(route('author.update',$author->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">

            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            
            <div class="row">

              <div class="form-group col-md-6">
                <label class="control-label text-dark" for="first-name"> <?php echo e(__('Author')); ?>: <span class="required">*</span></label>
                <input placeholder="<?php echo e(__('Please enter Author name')); ?>" type="text" id="first-name" name="title" value="<?php echo e($author->title); ?>" class="form-control col-md-12">
              </div>
              <div class="form-group col-md-6"></div>
              
























              <div class="form-group col-md-6">
                <label class="control-label text-dark" for="first-name"> <?php echo e(__("Image")); ?>: </label>                
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" id="img_upload_input" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange="readURL(this);" />
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose Profile")); ?> </label>
                  </div>
                </div><br>
                  <div class="mb-2">
                      <?php if(@file_get_contents('images/Author/'.$author->image)): ?>
                      <img width="100px" id="image-pre" class="img-fluid bg-primary-rgba p-3" src=" <?php echo e(url('images/author/'.$author->image)); ?>">
                      <?php else: ?>
                      <img title="<?php echo e($author->title); ?>" id="image-pre" class="pro-img" src="<?php echo e(Avatar::create($author['title'])->toBase64()); ?>" />
                      <?php endif; ?>
                    </div>
              </div>


              <div class="form-group col-md-12">
                <label class="control-label text-dark" for="first-name"> <?php echo e(__('Description')); ?> <span class="required">*</span></label>
                <textarea cols="2" id="editor1" name="description" rows="5"> <?php echo e(ucfirst($author->description)); ?></textarea>
              </div>

              <div class="form-group col-md-6">
                <label class="control-label text-dark" for="first-name"> <?php echo e(__("Featured:")); ?></label><br>
                <label class="switch">
                  <input class="slider tgl tgl-skewed" name="featured" type="checkbox" id="toggle-event33" <?php echo e($author->featured ==1 ? "checked" : ""); ?>>
                  <span class="knob"></span>
                </label>
                <br>
                <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(<?php echo e(__("If enabled than Category will be featured")); ?>)</small>
              </div>

              <div class="form-group col-md-6">
                <label class="control-label text-dark" for="first-name"> <?php echo e(__('Status')); ?>:</label><br>
                <label class="switch">
                  <input class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33" <?php echo e($author->status ==1 ? "checked" : ""); ?>>
                  <span class="knob"></span>
                  <input type="hidden" name="status" value="<?php echo e($author->status); ?>" id="status3">
                </label>
                <br>
                <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(<?php echo e(__("Please Choose Status")); ?>)</small>
              </div>

            </div>

            <div class="form-group">
              <button <?php if(env('DEMO_LOCK')==0): ?> type="reset" <?php else: ?> disabled title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
              <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> disabled title="<?php echo e(__('This operation is disabled is demo !')); ?>"  <?php endif; ?> class="btn btn-primary"><i class="fa fa-check-circle"></i> <?php echo e(__("Update")); ?></button>
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
    function readURLIcon(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.thumbnail-img-block').show();
          $('#image-pre-icon').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/author/edit.blade.php ENDPATH**/ ?>