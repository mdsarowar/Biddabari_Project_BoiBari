
<?php $__env->startSection('title',__('All Products |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'All Products';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'All Products';
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
            <div class="col-lg-2">
                <h5 class="card-title"> <?php echo e(__("All Products")); ?></h5>
            </div>
            <div class="col-lg-4">
              <form id="bulk_delete_form" method="POST" action="<?php echo e(route('pro.bulk.delete')); ?>" class="pull-left form-inline">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <select required name="action" id="action" class="form-control">
                    <option value=""><?php echo e(__("Please select action")); ?></option>
                    <option value="deleted"><?php echo e(__("Delete selected")); ?></option>
                    <option value="deactivated"><?php echo e(__("Deactive selected")); ?></option>
                    <option value="activated"><?php echo e(__("Active selected")); ?></option>
                  </select>
                </div>
                <button type="submit" class="ml-2 btn btn-md btn-primary-rgba">
                  <?php echo e(__('Apply')); ?>

                </button>
              </form>
            </div>
            <div class="col-md-6">
              <div class="widgetbar text-right">
     
                  <a href="<?php echo e(url('admin/products/create')); ?>" class="btn btn-primary-rgba mr-2"> <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add Product")); ?> </a>
                  <a title="Import products" href="<?php echo e(route('import.page')); ?>" class="btn btn-success-rgba mr-2"> <i class="feather icon-download mr-1"></i><?php echo e(__("Import Products")); ?> </a>
                  <a href="<?php echo e(route('trash.variant.products')); ?>" class="btn btn-md btn-danger-rgba mr-2"> <i class="fa fa-trash"></i> <?php echo e(__("Trash")); ?></a>
                  
              </div>
            </div>
          </div>
          <!-- ---------------------- -->
            
           

        </div>
        <div class="card-body ml-2">
         <!-- main content start -->
         <div class="table-responsive">
            <table id="productTable" class="w-100 table table-bordered table-hover">
              <thead>
                <th>
                  <div class="inline">
                    <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all"/>
                    <label for="checkboxAll" class="material-checkbox"></label>
                  </div>
                
                </th>
                <th>
                  <?php echo e(__('S.NO')); ?>

                </th>
                <th>
                  <?php echo e(__('Image')); ?>

                </th>
                <th>
                <?php echo e(__('Product Detail')); ?>

                </th>
                <th>
                  <?php echo e(__('Price')); ?> (<?php echo e($defCurrency->currency->code); ?>)
                </th>
                <th>
                  <?php echo e(__('Categories & More')); ?>

                </th>
                <th>
                  <?php echo e(__('Featured')); ?>

                </th>
                <th>
                  <?php echo e(__('Status')); ?>

                </th>
                <th>
                  <?php echo e(__('Actions')); ?>

                </th>
              </thead>
            </table>
           </div>
                    <!-- main content end -->
        </div>
      </div>
    </div>
  </div>
</div>


<div id="bulk_delete" class="delete-modal modal fade" role="dialog">
      <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="delete-icon"></div>
          </div>
          <div class="modal-body text-center">
            <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
            <p>
              <?php echo e(__("Do you really want to delete selected products? This process cannot be undone.")); ?>

            </p>
          </div>
          <div class="modal-footer">
           <form id="bulk_delete_form" method="post" action="<?php echo e(route('pro.bulk.delete')); ?>">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
              <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  $(function () {

      "use strict";

      var table = $('#productTable').DataTable({
          processing: true,
          serverSide: true,
          searching: true,
          stateSave: true,
          ajax: "<?php echo e(route('products.index')); ?>",
          language: {
                searchPlaceholder: "Search Products..."
          },
          columns: [
              
              {data : 'checkbox', name : 'checkbox', searchable : false,orderable : false},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false, orderable : false},
              {data : 'image', name : 'image',searchable : false, orderable : false},
              {data : 'name', name : 'products.name'},
              {data : 'price', name : 'price'},
              {data : 'catdtl', name : 'category.title'},
              {data : 'featured', name : 'products.featured',searchable : false},
              {data : 'status', name : 'products.status',searchable : false},
              {data : 'action', name : 'action', searchable : false,orderable : false}
          ],
          dom : 'lBfrtip',
          buttons : [
            'csv','excel','pdf','print'
          ],
          order : [
            [8,'DESC']
          ]
      });
      
  });

  

   $('#productTable').on('click', '.ptl', function (e) { 
        var id = $(this).data('proid');
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type : 'POST',
          data : { productid : $(this).data('proid') },
          datatype : 'html',
          url  : '<?php echo e(route('add.price.product')); ?>',
          success : function(response){
              $('#priceDetail'+id).modal('show');
              $('#pricecontent'+id).html('');
              $('#pricecontent'+id).html(response.body);
          }
      });

    });
    
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/product/index.blade.php ENDPATH**/ ?>