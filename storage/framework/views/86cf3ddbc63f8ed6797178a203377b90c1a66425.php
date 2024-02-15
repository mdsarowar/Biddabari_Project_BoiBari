
<?php $__env->startSection('title',__("Create a new user |")); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Create a new user';
  $data['title0'] = 'User';
  $data['title1'] = 'Create a new user';
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
                      <h5 class="card-title"> <?php echo e(__("Create a new user")); ?></h5>
                  </div>
                  <div class="col-md-2">
                    <div class="widgetbar">
                      <a href="<?php echo e(route('users.index',['filter' => app('request')->input('type') ])); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/users/')); ?>">
                  <?php echo csrf_field(); ?>

                  <div class="card card-bg">
                    <div class="card-header">
                      <h5 class="card-title"> <?php echo e(__("Basic Info")); ?></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
              
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Full Name:")); ?> <span class="required text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="<?php echo e(__("Please enter Full name")); ?>" name="name" value="<?php echo e(old('name')); ?>">
                          </div>
                        </div>
                
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Email:")); ?> <span class="required text-danger">*</span></label>
                            <input placeholder="<?php echo e(__("Please enter email")); ?>" type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-dark"> <?php echo e(__("Mobile:")); ?> <span class="required text-danger">*</span></label>
                            <div class="row no-gutter">
                              <div class="col-md-12">
                                <div class="input-group">
                                  <input required pattern="[0-9]+" title="Invalid mobile no." placeholder="1" type="text"
                                  name="phonecode" value="<?php echo e(old('phonecode')); ?>" class="col-md-2 form-control">
                                  <input required pattern="[0-9]+" title="Invalid mobile no." placeholder="<?php echo e(__("Please enter mobile no.")); ?>" type="text"
                                    name="mobile" value="<?php echo e(old('mobile')); ?>" class="col-md-10 form-control">
                                </div>
                              </div>
                            </div>
                          </div>                          
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-dark">
                              <?php echo e(__("Phone:")); ?>

                            </label>
                            <input pattern="[0-9]+" title="Invalid Phone no." placeholder="<?php echo e(__("Please enter phone no.")); ?>" type="text"
                              name="phone" value="<?php echo e(old('phone')); ?>" class="form-control">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label for="first-name" class="text-dark"> <?php echo e(__("Choose Profile:")); ?></label>
                          <div class="input-group">
                            <div class="custom-file">
                              <!-- <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"> -->
                              <!-- <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label> -->
                              
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" id="img_upload_input" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange="readURL(this);" />
                                  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose Profile")); ?> </label>
                                </div>
                              </div> 

                            </div>
                          </div>  <br>
                          <div class="thumbnail-img-block mb-3">
                            <img id="image-pre" class="img-fluid" alt="">
                          </div>                       
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-dark">
                              <?php echo e(__("User Role:")); ?> <span class="required">*</span>
                            </label>
                            <select name="role" data-placeholder="<?php echo e(__("Please choose user role")); ?>" class="form-control select2">
                              
                              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(app('request')->input('type') == $role->name ? "selected" : ""); ?> value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Status:')); ?></label><br>
                            <label class="switch">
                              <input class="slider" type="checkbox" checked id="toggle-event3" name="status" >
                              <span class="knob"></span>
                            </label>
                            <br>                            
                            <input type="hidden" name="status" value="1" id="status3">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card mt-4 card-bg">

                    <div class="card-header">
                      <h5 class="card-title"> <?php echo e(__("Address")); ?></h5>
                    </div>

                    <div class="card-body">
                      <div class="row">              
                        
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="text-dark"> <?php echo e(__("Country:")); ?></label>
                            <select name="country_id" class="form-control select2" id="select_country">
                              <option value=""><?php echo e(__("Select Country")); ?></option>
                            </select>
                          </div>
                        </div>
                
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="text-dark"> <?php echo e(__("State:")); ?></label>
                            <select data-placeholder="Please select state" required name="state_id" class="form-control select2" id="select_state">
                              <option value=""><?php echo e(__("Select State")); ?></option>
                            </select>
                          </div>
                        </div>
                
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="first-name" class="text-dark"> <?php echo e(__("City:")); ?> </label>
                            <select name="city_id" id="select_city" onchange="selectCity(this.value)" class="form-control select2">
                              <option value=""><?php echo e(__('Select City')); ?></option>
                              <?php if(isset($citys)): ?>
                                <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>                            
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card mt-4 card-bg">
                    <div class="card-header">
                      <h5 class="card-title"> <?php echo e(__("Social Media")); ?></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">  

                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Website:")); ?></label>
                            <input placeholder="http://" type="text" id="first-name" name="website" value="<?php echo e(old('website')); ?>"
                              class="form-control">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card mt-4 card-bg">
                    <div class="card-header">
                      <h5 class="card-title"> <?php echo e(__("Authentication")); ?></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">  

                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="eyeCy">
                              <label for="password" class="text-dark"><?php echo e(__("Enter Password:")); ?></label>
                                <div class="input-group mb-3">
                                  <input minlength="8" id="password" type="password" class="passwordbox form-control" placeholder="<?php echo e(__("Enter password min. length 8")); ?>" name="password">
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" id="main_password" type="button"><span class="fa fa-fw fa-eye field-icon toggle-password"></span></button>
                                  </div>
                                </div>                                  
                            </div>
                          </div>              
                        </div>            
              
                        <div class="col-md-6">              
                          <div class="form-group">
                            <div class="eyeCy">
                              <label for="confirm" class="text-dark"><?php echo e(__("Confirm Password:")); ?></label>
                              <div class="input-group mb-3">
                                <input id="confirm_password" type="password" class="passwordbox form-control" placeholder="<?php echo e(__("Re-enter password for confirmation")); ?>" name="password_confirmation">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-secondary" id="confirmPassword" type="button"><span class="fa fa-fw fa-eye field-icon toggle-password"></span></button>
                                </div>
                              </div>
                            </div>
                            <span class="required"><?php echo e($errors->first('password_confirmation')); ?></span>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                  <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> title="<?php echo e(__("This action is disabled in demo !")); ?>" disabled="disabled" <?php endif; ?>  class="btn btn-primary"><i class="fa fa-check-circle"></i><?php echo e(__("Create")); ?></button>

                  
                </form>
              </div>
          </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  var baseUrl = "<?= url('/') ?>";
</script>
<script src="<?php echo e(url("js/ajaxlocationlist.js")); ?>"></script>
<script>
  $(document).on('click', '#main_password', function() {

    var input = $("#password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

  });

  $(document).on('click', '#confirmPassword', function() {

    var input = $("#confirm_password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

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

$("#select_city").select2({
    minimumInputLength: 2
});
</script>
<script>
  function selectCity(city_id) {
    var up = $('#select_state').empty();
    var up1 = $('#select_country').empty();
    var cat_id = city_id;

    if (cat_id) {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: baseUrl + '/admin/select_state_country',
        data: {
          catId: cat_id
        },
        success: function (data) {
          console.log(data);
          // $('#country_id').append('<option value="">Please Choose</option>');
          // up.append('<option value="">Please Choose</option>');
          $.each(data.states, function (id, title) {
            up.append($('<option>', {
              value: id,
              text: title
            }));
          });

          $.each(data.country, function (id, title) {
            up1.append($('<option>', {
              value: id,
              text: title
            }));
          });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest);
        }
      });
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/user/add_user.blade.php ENDPATH**/ ?>