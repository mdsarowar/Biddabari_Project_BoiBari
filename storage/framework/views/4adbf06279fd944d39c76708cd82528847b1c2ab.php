
<?php $__env->startSection('title',__('Site Languages')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Site Languages';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'Site Languages';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          
          <div class="row">
            <div class="col-lg-4">
              <h5 class="box-title"><?php echo e(__('All Site Languages')); ?></h5>
            </div>
            <div class="col-md-4">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('advertisements.create')): ?>
              <div class="widgetbar">

                <a title="Click to add new language" data-toggle="modal" data-target="#addLang"
                  class="float-right btn btn-primary-rgba mr-2">
                  <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add New Language")); ?>

                </a>
              </div>
              <?php endif; ?>
              
            </div>
            <div class="col-md-4">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('advertisements.create')): ?>
              <div class="widgetbar">

                
                <form method="POST" action="<?php echo e(url('/vue/sync-translation')); ?>">
                  <?php echo csrf_field(); ?>
                  <button title="Sync VUE based homepage translation" type="submit" class="float-right btn btn-primary-rgba mr-2">
                    <i class="fa fa-refresh"></i> <?php echo e(__("Sync homepage translations")); ?>

                  </button>
                </form>
              </div>
              <?php endif; ?>
              
            </div>
          </div>

        </div>
        <div class="card-body">
          <ul class="nav nav-tabs custom-tab-line mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true"><?php echo e(__('Languages')); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false"><?php echo e(__('Update Static Word Translations')); ?></a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <table class="table table-bordered">
                <thead>
                  <th>
                    #
                  </th>
                  <th>
                    <?php echo e(__('Display Name')); ?>

                  </th>
                  <th>
                    <?php echo e(__("Language Code")); ?>

                  </th>
                  <th>
                    <?php echo e(__("Default")); ?>

                  </th>
                  <th>
                    <?php echo e(__("Action")); ?>

                  </th>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $allLang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <?php echo e($key+1); ?>

                    </td>
                    <td>
                      <?php echo e($lang->name); ?>

                    </td>
                    <td>
                      <?php echo e(ucfirst($lang->lang_code)); ?>

                    </td>
                    <td>
                      <?php if($lang->def == 1): ?>
                      <i class="text-green fa fa-check-circle"></i>
                    <?php else: ?>
                      <i class="required fa fa-times"></i>
                    <?php endif; ?>
                      
                    </td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                            <a class="dropdown-item" data-toggle="modal"  data-target="#editLang<?php echo e($lang->id); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                            <a class="dropdown-item btn btn-link" data-toggle="modal" <?php if(env('DEMO_LOCK')==0): ?> data-target="#delModal<?php echo e($lang->id); ?>" title="<?php echo e(__("Delete Language")); ?>"
                              data-toggle="modal" <?php else: ?> disabled title="<?php echo e(__('This action is disabled in demo !')); ?>" <?php endif; ?> >
                                <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                            </a>
                        </div>
                    </div>

                   

                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <table class="table table-bordered">
                <thead>
                  <th>
                    #
                  </th>
                  <th>
                    <?php echo e(__("Display Name")); ?>

                  </th>
                  <th>
                    <?php echo e(__("Language Code")); ?>

                  </th>
                  <th>
                    <?php echo e(__('Default')); ?>

                  </th>
                  <th>
                    <?php echo e(__('Action')); ?>

                  </th>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $allLang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <?php echo e($key+1); ?>

                    </td>
                    <td>
                      <?php echo e($lang->name); ?>

                    </td>
                    <td>
                      <?php echo e(ucfirst($lang->lang_code)); ?>

                    </td>
                    <td>
                      <?php if($lang->def == 1): ?>
                        <i class="text-green fa fa-check-circle"></i>
                      <?php else: ?>
                        <i class="required fa fa-times"></i>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                            <a class="dropdown-item" href="<?php echo e(url('languages/'.$lang->lang_code.'/translations')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                         
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
<div class="modal fade" id="addLang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">
          <?php echo e(__('Add Language')); ?>

        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      
      </div>

      <div class="modal-body">
        <form action="<?php echo e(route('site.lang.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label><?php echo e(__("Language Name")); ?>: <span class="required">*</span></label>
            <input required name="name" type="text" class="form-control" placeholder="<?php echo e(__("Enter language name")); ?>" />
          </div>

          <div class="form-group">
            <label><?php echo e(__("Language Code")); ?>: <span class="required">*</span></label>
            <input required type="text" name="lang_code" class="form-control" placeholder="<?php echo e(__('Enter language code')); ?>" />
          </div>

          <div class="form-group">
            <label><?php echo e(__("Default")); ?>:</label>
            <br>
            <label class="switch">
              <input type="checkbox" class="quizfp toggle-input toggle-buttons" name="def" checked>
              <span class="knob"></span>
            </label>
          </div>

          <div class="form-group">
            <label><?php echo e(__("RTL")); ?>:</label>
            <br>
            <label class="switch">
              <input type="checkbox" class="quizfp toggle-input toggle-buttons" name="rtl_available" checked>
              <span class="knob"></span>
            </label>
          </div>

          <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
          <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
            <?php echo e(__("Create")); ?></button>
        </div>

        <div class="clear-both"></div>


        </form>
      </div>

    </div>
  </div>
</div>

<?php $__currentLoopData = $allLang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Delete Lang Modal -->
<div id="delModal<?php echo e($lang->id); ?>" class="delete-modal modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="delete-icon"></div>
      </div>
      <div class="modal-body text-center">
        <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
        <p><?php echo e(__('Do you really want to delete this language? This process cannot be undone.')); ?></p>
      </div>
      <div class="modal-footer">
        <form method="post" action="<?php echo e(route('site.lang.delete',$lang->id)); ?>" class="pull-right">
          <?php echo e(csrf_field()); ?>

          <?php echo e(method_field("DELETE")); ?>

          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
          <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- edit lang Modal -->
<div class="modal fade" id="editLang<?php echo e($lang->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('Edit Language :lang',['lang' => $lang->display_name])); ?></h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('site.lang.update',$lang->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>

          <div class="form-group">
            <label><?php echo e(__("Edit Language Name")); ?>: <span class="required">*</span></label>
            <input required name="name" value="<?php echo e($lang->name); ?>" type="text" class="form-control"
              placeholder="<?php echo e(__('enter language name')); ?>" />
          </div>

          <div class="form-group">
            <label><?php echo e(__('Edit Language Code:')); ?> <span class="required">*</span></label>
            <input required value="<?php echo e($lang->lang_code); ?>" type="text" name="lang_code" class="form-control"
              placeholder="<?php echo e(__('enter language code')); ?>" />
          </div>

          <div class="form-group">
            <label><?php echo e(__('Default')); ?>:</label>
            <br>
            <label class="switch">
              <input <?php echo e($lang->def == 1 ? 'checked' : ""); ?> type="checkbox" class="quizfp toggle-input toggle-buttons"
                name="def">
              <span class="knob"></span>
            </label>
          </div>

          <div class="form-group">
            <label><?php echo e(__('RTL')); ?>:</label>
            <br>
            <label class="switch">
              <input <?php echo e($lang->rtl_available == 1 ? 'checked' : ''); ?> type="checkbox"
                class="quizfp toggle-input toggle-buttons" name="rtl_available">
              <span class="knob"></span>
            </label>
          </div>

          <button type="button" data-dismiss="modal" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Close')); ?></button>
          <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
            <?php echo e(__("Update")); ?></button>
        </div>

        <div class="clear-both"></div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/language/index.blade.php ENDPATH**/ ?>