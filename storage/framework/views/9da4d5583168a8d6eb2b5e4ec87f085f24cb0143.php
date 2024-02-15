
<?php $__env->startSection('title',__('Widget Settings | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Widget Settings';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Widget Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__("Widget Settings")); ?></h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-grid mr-2"></i>
                                <?php echo e(__('Sidebar Widgets')); ?>    
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-file-text mr-2"></i>
                                <?php echo e(__("Main Page Widgets")); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#contact-line" role="tab" aria-controls="contact-line" aria-selected="false"><i class="feather icon-folder mr-2"></i>
                                <?php echo e(__("Chat Widgets")); ?>

                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="defaultTabContentLine">
                        <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <th>
                                        
                                        <?php echo e(__("Widget Example:")); ?>

        
                                    </th>
                                    <th>
                                        <?php echo e(__('Widget Name')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(__("Widget Place")); ?>

                                    </th>
                                </thead>
        
                                <tbody>
        
                                    <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php if($widget->name == 'category'): ?>
                                            <img  class="img-fluid widget_image"
                                                src="<?php echo e(url('images/widgetpreview/category.png')); ?>" alt="<?php echo e($widget->name); ?>"
                                                title="<?php echo e(ucfirst($widget->name)); ?>">
                                            <?php elseif($widget->name == 'hotdeals'): ?>
                                            <img  class="img-fluid widget_image"
                                                src="<?php echo e(url('images/widgetpreview/hotdeal.png')); ?>" alt="<?php echo e($widget->name); ?>"
                                                title="<?php echo e(ucfirst($widget->name)); ?>">
                                            <?php elseif($widget->name == 'specialoffer'): ?>
                                            <img  class="img-fluid widget_image"
                                                src="<?php echo e(url('images/widgetpreview/spoffer.png')); ?>" alt="<?php echo e($widget->name); ?>"
                                                title="<?php echo e(ucfirst($widget->name)); ?>">
                                            <?php elseif($widget->name == 'testimonial'): ?>
                                            <img  class="img-fluid widget_image"
                                                src="<?php echo e(url('images/widgetpreview/testimonial.png')); ?>"
                                                alt="<?php echo e($widget->name); ?>" title="<?php echo e(ucfirst($widget->name)); ?>">
                                            <?php elseif($widget->name == 'newsletter'): ?>
                                            <img  class="img-fluid widget_image"
                                                src="<?php echo e(url('images/widgetpreview/newsletter.png')); ?>" alt="<?php echo e($widget->name); ?>"
                                                title="<?php echo e(ucfirst($widget->name)); ?>">
                                            <?php elseif($widget->name == 'slider'): ?>
                                            <img  class="img-fluid widget_image"
                                                src="<?php echo e(url('images/widgetpreview/slider.png')); ?>" alt="<?php echo e($widget->name); ?>"
                                                title="<?php echo e(ucfirst($widget->name)); ?>">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(ucfirst($widget->name)); ?></td>
                                        <td>
        
                                            <div class="row">
        
                                                <div class="col-md-6">
                                                    <?php if($widget->name == 'testimonial' || $widget->name == 'specialoffer' ||
                                                    $widget->name == 'slider' || $widget->name == 'category' || $widget->name ==
                                                    'hotdeals' || $widget->name == 'newsletter'): ?>
                                                    <p><b><?php echo e(__("Show On Home Page:")); ?></b></p>
                                                    <?php endif; ?>
        
                                                    <form action="<?php echo e(route('widget.home.quick.update',$widget->id)); ?>"
                                                        method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit"
                                                            class="btn btn-xs <?php echo e($widget->home==1 ? "btn-success-rgba" : "btn-danger-rgba"); ?>">
                                                            <?php echo e($widget->home ==1 ? 'Yes' : 'No'); ?>

                                                        </button>
                                                    </form>
                                                </div>
        
                                                <div class="col-md-6">
        
                                                    <?php if($widget->name == 'hotdeals' || $widget->name == 'newsletter'): ?>
                                                    <p><b><?php echo e(__("Show On Product Detail Page:")); ?></b></p>
                                                    <?php endif; ?>
        
                                                    <?php if($widget->name == 'newsletter' || $widget->name == 'hotdeals'): ?>
                                                    <form action="<?php echo e(route('widget.shop.quick.update',$widget->id)); ?>"
                                                        method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <button <?php if(env("DEMO_LOCK")==0): ?> type="submit" <?php else: ?>
                                                            title="<?php echo e(__("This action is disabled in demo !")); ?>" disabled="disabled" <?php endif; ?>
                                                            class="btn btn-xs <?php echo e($widget->shop==1 ? "btn-success-rgba" : "btn-danger-rgba"); ?>">
                                                            <?php echo e($widget->shop ==1 ? 'Yes' : 'No'); ?>

                                                        </button>
                                                    </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
        
        
        
        
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
                            <h4>
                                <?php echo e(__("Widget Example:")); ?>

                            </h4>
                            <hr>
                            <div class="col-md-12">
                                <img class="img-responsive pagewidth_image" src="<?php echo e(url('images/widgetpreview/newpro.png')); ?>" alt="" />
                            </div>
                           
                            <form id="demo-form2" method="post" enctype="multipart/form-data"
                                action="<?php echo e(url('admin/NewProCat')); ?>" data-parsley-validate
                                class="form-horizontal form-label-left">
                                <?php echo e(csrf_field()); ?>

                               
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>
                                                <?php echo e(__("Select Categories to show:")); ?>

                                            </h5>

                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                   <div class="card-body">
                                                    <div class="row">
                                                        <?php $__currentLoopData = App\Category::where('status','1')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        if(!empty($NewProCat)){
                                                        $parents = explode(",",$NewProCat->name);
                                                        }
                                                        ?>
            
                                                        <div class="col-md-6">
                                                            <div class="panel-heading" role="tab" id="headingOne">
                                                                <h5 class="panel-title">
                                                                    <a role="button" data-parent="#accordion" aria-expanded="true"
                                                                        aria-controls="collapseOne">
                                                                        <input id="categories_<?php echo e($item->id); ?>" <?php if(!empty($parents)): ?>
                                                                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php echo e($p == $item->id ? "checked" : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?> type="checkbox" class=" required_one categories"
                                                                            name="name[]" value="<?php echo e($item->id); ?>">
            
                                                                        <?php echo e($item->title); ?>

                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                        
                                        
                                <hr>
        
                                <div class="">
                                    <h5> <?php echo e(__('Status:')); ?></h5>
                                     
                                        <label class="switch">
                                            <input class="slider" type="checkbox" <?php if(!empty($NewProCat)): ?>
                                            <?php echo e($NewProCat->status ==1 ? "checked" : ""); ?> <?php endif; ?>  id="toggle-event3" name="status" >
                                            <span class="knob"></span>
                                          </label>
                                        
                                        <input type="hidden" name="status"
                                            value="<?php if(!empty($NewProCat)): ?> <?php echo e($NewProCat->status); ?> <?php endif; ?>" id="status3">
                                    </div>
                                
                               
                                     <div class="">
                                     
                                        <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                        <button   class="btn btn-primary-rgba" <?php if(env('DEMO_LOCK') == 0): ?> type="submit" <?php else: ?> disabled="disabled" title="This action is disabled in demo !" <?php endif; ?>><i class="fa fa-check-circle"></i>
                                        <?php echo e(__("Update")); ?></button>
                                       
                                    </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">
                            <h4>
                                <?php echo e(__("Chat Widget Settings:")); ?>

                            </h4>
                            <hr>
                            <form action="<?php echo e(route('wp.setting.update')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="my-input"><?php echo e(__("Enable Whatsapp Chat Floating Button:")); ?></label>
                                            <br>
                                            <label class="switch">
                                                <input id="status" type="checkbox" name="status"
                                                  <?php echo e($wp->status == 1 ? "checked" : ""); ?>>
                                                <span class="knob"></span>
                                            </label>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="my-input">
                                                <?php echo e(__("Whatsapp No: (with country code without [+] sign):")); ?>

                                            </label>
                                            <input name="phone_no" value="<?php echo e($wp->phone_no); ?>" class="form-control" type="text" name="size" placeholder="eg:01234567890">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="my-input">
                                                <?php echo e(__("Popmessage Text:")); ?>

                                            </label>
                                            <input value="<?php echo e($wp->popupMessage); ?>" id="my-input" class="form-control" type="text" name="popupMessage" placeholder="eg: Hi ! How can we help you?">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="my-input">
                                                <?php echo e(__("Button Size:")); ?>

                                            </label>
                                            <input value="<?php echo e($wp->size); ?>" id="my-input" class="form-control" type="text" name="size" placeholder="eg:60px">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="my-input">
                                                <?php echo e(__("Position:")); ?>

                                            </label>
                                            <input value="<?php echo e($wp->position); ?>" id="my-input" class="form-control" type="text" name="position" placeholder="eg:left">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="my-input">
                                                <?php echo e(__("Header title:")); ?>

                                            </label>
                                            <input value="<?php echo e($wp->headerTitle); ?>" id="my-input" class="form-control" type="text" name="headerTitle" placeholder="eg:Chat with us !">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="my-input">
                                                <?php echo e(__('Header color:')); ?>

                                            </label>
                                            <div  class="input-group initial-color" title="Using input value">
                                                <input type="text" class="form-control input-lg"  id="my-input" value="<?php echo e($wp->headerColor); ?>" name="headerColor"  placeholder="#000000"/>
                                                <span class="input-group-append">
                                                  <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                </span>
                                              </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <h4><i class="fa fa-facebook-official" aria-hidden="true"></i>
                                            <?php echo e(__("Messenger Bubble Chat URL:")); ?>    
                                        </h4><br>
                                            <label><?php echo e(__("MESSENGER CHAT BUBBLE URL :")); ?></label><br>
                                        <div class="form-group">
                                           
                                            <small>
                                                <a target="__blank" title="<?php echo e(__("Get your code")); ?>" class="text-muted" href="https://app.respond.io/"><i
                                                    class="fa fa-key"></i> <?php echo e(__("Get Your Code For Messenger Chat Bubble URL Here Here")); ?></a>
                                            </small>
                                            <br>
                                            <input placeholder="https://app.respond.io/facebook/chat/plugin/XXXX/XXXXXXXXXX"
                                            id="MESSENGER_CHAT_BUBBLE_URL" value="<?php echo e(env('MESSENGER_CHAT_BUBBLE_URL')); ?>"
                                            name="MESSENGER_CHAT_BUBBLE_URL" type="text" class="form-control"
                                            placeholder="<?php echo e(__("Enter MESSENGER CHAT BUBBLE URL")); ?>">
                                        </div>
                                       
                                       
                                    </div>
        
                                </div>
        
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                    <button   class="btn btn-primary-rgba" <?php if(env('DEMO_LOCK') == 0): ?> type="submit" <?php else: ?> disabled="disabled" <?php endif; ?>><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Update")); ?></button>

                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>     
                        
    
                    
    
                  
          
                  
    
    
          
                  
    
    
                  
                  
                
    
                
                                      


          

            
          
              




            

            
            
            
  
                 
  
               
  
          
    
             
            

          



<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/widget/settings.blade.php ENDPATH**/ ?>