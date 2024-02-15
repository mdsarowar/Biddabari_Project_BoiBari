
<?php $__env->startSection('title',__('Simple Products | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Simple Products';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'Simple Products';
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
                <div class="col-lg-4">
                    <h5 class="card-title"> <?php echo e(__("Simple Products")); ?></h5>
                </div>
                <div class="col-md-8">
                    <div class="widgetbar float-right">
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.create')): ?>
                            <a href="<?php echo e(route('simple-products.create')); ?>" class="btn btn-primary-rgba mr-2">
                                <i class="feather icon-plus mr-2"></i><?php echo e(__("Add new")); ?>

                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.import')): ?>
                            <a data-toggle="modal" data-target="#importproductimages" class="btn btn-info-rgba mr-2">
                                <i class="feather icon-image"></i> <?php echo e(__("Bulk Upload Images")); ?>

                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.import')): ?>
                            <a class="btn btn-success-rgba mr-2" href="<?php echo e(route('import.page')); ?>">
                                <i class="feather icon-file-text"></i> <?php echo e(__("Import Products")); ?>

                            </a>
                        <?php endif; ?>                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.delete')): ?>
                            <a href="<?php echo e(route('trash.simple.products')); ?>" class="btn btn-danger-rgba mr-2">
                                <i class="feather icon-trash-2"></i> <?php echo e(__("Trash")); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
         <!-- main content start -->
        <table id="d_products" class="w-100 table table-bordered table-hover">
            <thead>
                <th><?php echo e(__("S.No")); ?></th>
                <th><?php echo e(__('Image')); ?></th>
                <th><?php echo e(__("ID")); ?></th>
                <th><?php echo e(__('Product Name')); ?></th>
                <th><?php echo e(__("Pricing")); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
            </thead>
        </table>                
         <!-- main content end -->
        </div>
      </div>
    </div>
  </div>

<!-- ----------- -->
<div class="modal fade" id="importproductimages" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel"><?php echo e(__("Bulk Import Simple Product Images")); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- main content start -->
                <a href="<?php echo e(url('files/SimpleProductImages.xlsx')); ?>" class="btn btn-md btn-success"> <?php echo e(__('Download Example xls/csv File')); ?></a>
						<hr>
						<form action="<?php echo e(route('simple.product.import.images')); ?>" method="POST" enctype="multipart/form-data">	
                            <?php echo csrf_field(); ?>
						
							<div class="row">
								<div class="form-group col-md-12">
									<label for="file"><?php echo e(__("Choose your xls/csv File")); ?> :</label>
                                    <!-- ------------ -->
                                    <div class="input-group mb-3">
                                       
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
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
								<div class="box-title"><?php echo e(__('Instructions')); ?></div>
							</div>
					
							<div class="box-body">
								<p><b><?php echo e(__('Follow the instructions carefully before importing the file.')); ?></b></p>
								<p><?php echo e(__('The columns of the file should be in the following order.')); ?></p>
					
								<table class="table table-striped">
									<thead>
										<tr>
											<th><?php echo e(__('Column No')); ?></th>
											<th><?php echo e(__('Column Name')); ?></th>
                                            <th><?php echo e(__('Required')); ?></th>
											<th><?php echo e(__('Description')); ?></th>
										</tr>
									</thead>
					
									<tbody>
										<tr>
											<td>1</td>
											<td><b>product_id</b></td>
                                            <td><b><?php echo e(__('Yes')); ?></b></td>
											<td>Enter product id here</td>	
										</tr>

										<tr>
											<td>2</td>
											<td> <b>image</b> </td>
											<td><b><?php echo e(__('Yes')); ?></b></td>
                                            <td>Name your image eg: example.jpg <b>(Images can be uploaded using Media Manager / Simple Products Gallery Tab. )</b> .</td>
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
<!-- ----------- -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
    $(function () {
        "use strict";
        var table = $('#d_products').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: '<?php echo e(route("simple-products.index")); ?>',
            language: {
                searchPlaceholder: "Search Products..."
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable : false
                },
                {
                    data: 'image',
                    name: 'image',
                    searchable: false,
                    orderable : false
                },
                {
                    data: 'id',
                    name: 'simple_products.id'
                },
                {
                    data: 'product_name',
                    name: 'simple_products.product_name'
                },
                {
                    data: 'price',
                    name: 'simple_products.actual_selling_price'
                },
                {
                    data: 'status',
                    name: 'simple_products.status'
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable : false
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
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/simpleproducts/index.blade.php ENDPATH**/ ?>