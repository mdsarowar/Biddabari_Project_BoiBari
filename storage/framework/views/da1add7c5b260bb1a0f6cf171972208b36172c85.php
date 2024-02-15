
<?php $__env->startSection('title',__('Edit Dashboard Setting')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Dashboard Setting';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'Dashboard Setting';
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
          <h5 class="box-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Dashboard Setting')); ?></h5>
        </div>
        <div class="card-body">
          <ul class="nav nav-tabs custom-tab-line mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true"><?php echo e(__('Main Screen Setting')); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false"><?php echo e(__('Facebook Widget Setting')); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                aria-controls="pills-contact" aria-selected="false"><?php echo e(__('Twitter Widget Setting')); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="insta-contact-tab" data-toggle="pill" href="#pills-insta" role="tab"
                aria-controls="pills-insta" aria-selected="false"><?php echo e(__('Instagram Widget Setting')); ?></a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="profile" aria-selected="false">&nbsp;&nbsp;<?php echo e(__('Admin Setting')); ?></a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <form action="<?php echo e(route('admin.dash.update',$dashsetting->id)); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                  <table class="w-100 table table-hover">
                    <thead>
                      <tr>
                        <th><?php echo e(__('Widget Name')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                        <th><?php echo e(__('Max Item')); ?></th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>
                          <?php echo e(__("Latest Order")); ?>

                        </td>
                        <td>
                          <label class="switch">
                            <input name="lat_ord" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                              <?php echo e($dashsetting->lat_ord==1 ? "checked" :""); ?>>
                            <span class="knob"></span>

                          </label>

                        </td>

                        <td class="<?php echo e($dashsetting->lat_ord==0 ? 'display-none' : ''); ?>"><input class="form-control" min="1"
                            name="max_item_ord" type="number" value="<?php echo e($dashsetting->max_item_ord); ?>"></td>

                      </tr>

                      <tr>
                        <td>
                          <?php echo e(__("Recently added products")); ?>

                        </td>
                        <td>
                          <label class="switch">
                            <input name="rct_pro" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                              <?php echo e($dashsetting->rct_pro==1 ? "checked" :""); ?>>
                            <span class="knob"></span>

                          </label>

                        </td>

                        <td class="<?php echo e($dashsetting->rct_pro == 0 ? 'display-none' : ''); ?>"><input class="form-control" min="1"
                            name="max_item_pro" max="5" type="number" value="<?php echo e($dashsetting->max_item_pro); ?>"></td>

                      </tr>

                      <tr>
                        <td>
                          <?php echo e(__("Recent store requests")); ?>

                        </td>
                        <td>
                          <label class="switch">
                            <input name="rct_str" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                              <?php echo e($dashsetting->rct_str==1 ? "checked" :""); ?>>
                            <span class="knob"></span>

                          </label>

                        </td>

                        <td class="<?php echo e($dashsetting->rct_str == 0 ? 'display-none' : ''); ?>"><input class="form-control" min="1"
                            name="max_item_str" type="number" value="<?php echo e($dashsetting->max_item_str); ?>"></td>

                      </tr>

                      <tr>
                        <td>
                          <?php echo e(__("Recent customers")); ?>

                        </td>
                        <td>
                          <label class="switch">
                            <input name="rct_cust" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                              <?php echo e($dashsetting->rct_cust == 1 ? "checked" :""); ?>>
                            <span class="knob"></span>

                          </label>

                        </td>

                        <td><input class="form-control <?php echo e($dashsetting->rct_cust == 0 ? 'd-none' : ""); ?>" min="1"
                            name="max_item_cust" max="12" type="number" value="<?php echo e($dashsetting->max_item_cust); ?>"></td>

                      </tr>


                    </tbody>
                  </table>
                  <div class="form-group">
                    <button <?php if(env('DEMO_LOCK')==0): ?> type="reset" <?php else: ?> disabled
                      title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-danger-rgba"><i
                        class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                    <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> disabled
                      title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-primary-rgba"><i
                        class="fa fa-check-circle"></i>
                      <?php echo e(__("Update")); ?></button>
                  </div>
                  <div class="clear-fix"></div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <form class="col-md-12" action="<?php echo e(route('fb.update',$dashsetting->id)); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <label for=""><?php echo e(__("Facebook Page ID")); ?>:</label>
                <input type="text" placeholder="<?php echo e(__('Enter Facebook Page ID')); ?>" name="fb_page_id" class="form-control"
                  value="<?php echo e($dashsetting->fb_page_id); ?>" />
                <br>
                <div class="eyeCy">
                  <label><?php echo e(__('Facebook Page Access Token')); ?>:</label>
                  <input placeholder="<?php echo e(__('Enter Page Access Token')); ?>" type="password" id="token" class="form-control"
                    name="fb_page_token" value="<?php echo e($dashsetting->fb_page_token); ?>" />
                  <span toggle="#token" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                </div>
                <br>
                <label for=""><?php echo e(__('Status')); ?>:</label>
                <label class="switch">
                  <input name="fb_wid" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                    <?php echo e($dashsetting->fb_wid==1 ? "checked" :""); ?>>
                  <span class="knob"></span>

                </label>

                <br>

                <br>
                <div class="form-group">
                  <button <?php if(env('DEMO_LOCK')==0): ?> type="reset" <?php else: ?> disabled
                    title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                    <?php echo e(__("Reset")); ?></button>
                  <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> disabled
                    title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-primary-rgba"><i
                      class="fa fa-check-circle"></i>
                    <?php echo e(__("Update")); ?></button>
                </div>
                <div class="clear-both"></div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <form class="col-md-12" action="<?php echo e(route('tw.update',$dashsetting->id)); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <label for=""><?php echo e(__('Twitter Username')); ?>:</label>
                <input type="text" placeholder="<?php echo e(__("Enter Twitter Username")); ?>" name="tw_username" class="form-control"
                  value="<?php echo e($dashsetting->tw_username); ?>" />
                <br>
                <label class="switch">
                  <input name="tw_wid" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                    <?php echo e($dashsetting->tw_wid==1 ? "checked" :""); ?>>
                  <span class="knob"></span>

                </label>

                <br>
                <div class="form-group">
                  <button <?php if(env('DEMO_LOCK')==0): ?> type="reset" <?php else: ?> disabled
                    title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                    <?php echo e(__("Reset")); ?></button>
                  <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> disabled
                    title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-primary-rgba"><i
                      class="fa fa-check-circle"></i>
                    <?php echo e(__("Update")); ?></button>
                </div>
                <div class="clear-both"></div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-insta" role="tabpanel" aria-labelledby="pills-insta-tab">
              <form class="col-md-12" action="<?php echo e(route('ins.update',$dashsetting->id)); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <label for=""><?php echo e(__("Instagram Username")); ?>:</label>
                <input type="text" placeholder="<?php echo e(__('Enter Instagram Username')); ?>" name="inst_username" class="form-control"
                  value="<?php echo e($dashsetting->inst_username); ?>" />
                <br>
                <label class="switch">
                  <input name="insta_wid" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                    <?php echo e($dashsetting->insta_wid==1 ? "checked" :""); ?>>
                  <span class="knob"></span>

                </label>

                <br>

                <div class="form-group">
                  <button <?php if(env('DEMO_LOCK')==0): ?> type="reset" <?php else: ?> disabled
                    title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                    <?php echo e(__("Reset")); ?></button>
                  <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> disabled
                    title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-primary-rgba"><i
                      class="fa fa-check-circle"></i>
                    <?php echo e(__("Update")); ?></button>
                </div>
                <div class="clear-both"></div>
              </form>
            </div>

            <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                <form action="<?php echo e(route('adminsetting.update')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="shadow-sm border card col-md-6" style="width: 18rem;">
                            <img src="<?php echo e(url('images/sidebar/admin.png')); ?>" class="card-img-top" alt="Classic">
                            <div class="card-body">
                                <h4 class="card-text"><?php echo e(__('New Sidebar for Admin')); ?></h4>
                                <div class="custom-radio-button mt-3">
                                  <label class="switch">
                                    <input name="sidebar_enable" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33" <?php echo e($dashsetting->sidebar_enable==1 ? "checked" :""); ?>>
                                    <span class="knob"></span>
                                  </label>
                                </div>
                            </div>
                        </div>
                        <div class="shadow-sm border card col-md-6" style="width: 18rem;">
                            <img src="<?php echo e(url('images/sidebar/seller.png')); ?>" class="card-img-top" alt="Classic">
                            <div class="card-body">
                                <h4 class="card-text"><?php echo e(__('New Sidebar for Seller')); ?></h4>
                                <div class="custom-radio-button mt-3">
                                    <div class="form-check-inline radio-primary">
                                      <label class="switch">
                                        <input name="seller_enable" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33" <?php echo e($dashsetting->seller_enable==1 ? "checked" :""); ?>>
                            
                                        <span class="knob"></span>
                                      </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Apply theme button -->
                        <div class="mt-3 col-md-12">
                            <div class="form-group">
                                <button <?php if(env('DEMO_LOCK')==0): ?> type="reset" <?php else: ?> disabled
                    title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button  <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> disabled
                    title="<?php echo e(__('This operation is disabled is demo !')); ?>" <?php endif; ?> class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Update")); ?></button>
                            </div>
                        </div>
                    
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
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/dashbord/setting.blade.php ENDPATH**/ ?>