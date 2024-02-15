
<?php $__env->startSection('title',__('SEO Directories | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'SEO Directories';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'SEO Directories';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">
  <div class="row">

    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          
          <div class="row">
            <div class="col-lg-8">
              <h5 class="box-title"><?php echo e(__('All Directories')); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a href=" <?php echo e(route('seo-directory.create')); ?> " class="btn btn-primary-rgba mr-2">
                  <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add new directory")); ?>

                </a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="seo_dir" class="width100 table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo e(__("City")); ?></th>
                  <th><?php echo e(__("Detail")); ?></th>
                  <th><?php echo e(__('Status')); ?></th>
                  <th><?php echo e(__('Action')); ?></th>
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




<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  $(function () {
    "use strict";
    var table = $('#seo_dir').DataTable({
      processing: true,
      serverSide: true,
      ajax: <?php echo json_encode(route('seo-directory.index'), 15, 512) ?>,
      language: {
        searchPlaceholder: "Search in records..."
      },
      columns: [{
          data: 'DT_RowIndex',
          name: 's_e_o_directories.id',
          searchable: false
        },
        {
          data: 'city',
          name: 's_e_o_directories.city'
        },
        {
          data: 'detail',
          name: 's_e_o_directories.detail',
          orderable: false
        },
        {
          data: 'status',
          name: 'status',
          searchable: false,
          orderable: false
        },
        {
          data: 'action',
          name: 'action',
          searchable: false,
          orderable: false
        },
      ],
      dom: 'lBfrtip',
      buttons: [
        'csv', 'excel', 'pdf', 'print'
      ],
      order: [
        [0, 'DESC']
      ]
    });

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/seodirectory/index.blade.php ENDPATH**/ ?>