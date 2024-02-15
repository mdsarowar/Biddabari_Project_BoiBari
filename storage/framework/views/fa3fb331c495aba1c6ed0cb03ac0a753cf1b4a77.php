
<?php $__env->startSection('title',__('Color Settings | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Color Settings';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Color Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">  

    <div class="row">
  
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header">
				  <h5 class="card-title"> <?php echo e(__("Color Settings")); ?></h5>
			    </div>
                
                <div class="card-body">
					<div class="table-responsive">
                        <form action="<?php echo e(route('admin.theme.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label><?php echo e(__('Choose Pattern :')); ?> </label>
                                <br>
                                <select required class="theme_pattern form-control select2" name="key" id="key">
                                  
                
                                    <option value="default" <?php echo e($themesettings && $themesettings->key == 'default' ? "selected" : ""); ?>><?php echo e(__("Default Theme")); ?></option>
                
                                    <option <?php echo e($themesettings && $themesettings->key == 'pattern1' ? "selected" : ""); ?> value="pattern1"><?php echo e(__("Pattern")); ?> 1</option>
                
                                    <option <?php echo e($themesettings && $themesettings->key == 'pattern2' ? "selected" : ""); ?> value="pattern2"><?php echo e(__("Pattern")); ?> 2</option>
                
                                    <option <?php echo e($themesettings && $themesettings->key == 'pattern3' ? "selected" : ""); ?> value="pattern3"><?php echo e(__("Pattern")); ?> 3</option>
                
                                    <option <?php echo e($themesettings && $themesettings->key == 'pattern4' ? "selected" : ""); ?> value="pattern4"><?php echo e(__("Pattern")); ?> 4</option>
                
                                    <option <?php echo e($themesettings && $themesettings->key == 'pattern5' ? "selected" : ""); ?> value="pattern5"><?php echo e(__("Pattern")); ?> 5</option>
                
                                </select>
                            </div>
                
                            <div style="<?php echo e($themesettings && $themesettings['key'] == 'default' ? "display:none;" : ""); ?>" class="color_options form-group col-md-6">
                                <label><?php echo e(__('Choose Color Scheme :')); ?> </label>
                                <br>
                                <select <?php echo e($themesettings && $themesettings['key'] != 'default' ? 'required' : ""); ?> class="theme_pattern_options form-control select2" name="theme_pattern_options" id="theme_pattern_options">
                
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'yellow_blue' ? "selected" : ""); ?> value="yellow_blue">Yellow + Blue</option>
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'gold_blue' ? "selected" : ""); ?> value="gold_blue">Gold + Blue</option>
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'marron_brown' ? "selected" : ""); ?> value="marron_brown">Marron + Brown</option>
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'greenlight_greendark' ? "selected" : ""); ?> value="greenlight_greendark">Green Light + Green Dark</option>
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'greendark_greenlight' ? "selected" : ""); ?> value="greendark_greenlight">Green Dark + Green Light</option>
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'yellow_darkblue' ? "selected" : ""); ?> value="yellow_darkblue">Yellow + Dark Blue</option>
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'darkpink_darkgrey' ? "selected" : ""); ?> value="darkpink_darkgrey">Dark Pink + Dark Grey</option>
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'lightgrey_lightgold' ? "selected" : ""); ?> value="lightgrey_lightgold">Light Grey + Light Gold</option>
                
                                    <option <?php echo e($themesettings && $themesettings->theme_name == 'black_lightblue' ? "selected" : ""); ?> value="black_lightblue">Black + Light Blue</option>
                                
                                </select>
                            </div>
                            
                        </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button  type="submit"class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                <?php echo e(__("Update")); ?></button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
                 
                  

<?php $__env->stopSection(); ?>     
<?php $__env->startSection('custom-script'); ?>
    <script>
        $('.theme_pattern').on('change',function(){

            var pattern = $(this).val();

            if(pattern == 'pattern1'){
                $('.color_options').show();
            }

            if(pattern == 'pattern2'){
                $('.color_options').show();
            }

            if(pattern == 'pattern3'){
                $('.color_options').show();
            }

            if(pattern == 'pattern4'){
                $('.color_options').show();
            }

            if(pattern == 'pattern5'){
                $('.color_options').show();
            }

            if(pattern == 'default'){
                $('.color_options').hide();
               
            }


        });
    </script>
<?php $__env->stopSection(); ?>        
    
                
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/themes/index.blade.php ENDPATH**/ ?>