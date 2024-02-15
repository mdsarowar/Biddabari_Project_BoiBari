
<?php $__env->startSection('title',__('Retured Orders |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Retured Orders';
  $data['title0'] = 'Order & Invoices';
  $data['title1'] = 'Retured Orders';
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
						<h5 class="card-box"><?php echo e(__('Retured Orders')); ?></h5>
					</div> 
				
				
					<div class="card-body">
						<ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab-line" data-content="<?php echo e(__("If order have only 1 item than its count in single canceled orders.")); ?>"  data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-truck mr-2"></i>
									<?php echo e(__("Return Completed")); ?> <?php if($countC>0): ?> <span class="badge"><?php echo e($countC); ?><?php endif; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab-line" data-content="<?php echo e(__('If order have more than 1 item than its count in Bulk canceled orders.')); ?>" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-truck mr-2"></i> <?php echo e(__("Pending Returns")); ?> <?php if($countP>0): ?> <span class="badge"> <?php echo e($countP); ?> <?php endif; ?></a>
							</li>
							
						</ul>
						<div class="tab-content" id="defaultTabContentLine">
							<div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
								<div class="table-responsive">
									<table id="full_detail_table2" class="table table-striped table-bordered">
										<thead>
										
											<th>
												#
											</th>
											<th>
												<?php echo e(__("Order ID")); ?>

											</th>
											<th>
												<?php echo e(__("Item")); ?>

											</th>
											<th>
												<?php echo e(__('Refunded Amount')); ?>

											</th>
											<th>
												<?php echo e(__("Refund Status")); ?>

											</th>
				
										</thead>
										<tbody>
											<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									
												<?php if(isset($order->getorder->order) && $order->status != 'initiated'): ?>
												<tr>
													<td>
														<?php echo e($key+1); ?>

													</td>
													<td><b>#<?php echo e($inv_cus->order_prefix.$order->getorder->order->order_id); ?></b>
															<br>
															<small>
																<a title="<?php echo e(__("View Refund Detail")); ?>" href="<?php echo e(route('return.order.detail',$order->id)); ?>"><?php echo e(__("View Detail")); ?></a> 
															</small>
													</td>
													<td>
														<?php if(isset($order->getorder->variant)): ?>
															<b>
																<?php echo e($order->getorder->variant->products->name); ?> (<?php echo e(variantname($order->getorder->variant)); ?>)
															</b>
														<?php endif; ?>

														<?php if(isset($order->getorder->simple_product)): ?>
															<b>
																<?php echo e($order->getorder->simple_product->product_name); ?>

															</b>
														<?php endif; ?>
															
													</td>
													<td>
														<i class="<?php echo e($order->getorder->order->paid_in); ?>"></i><?php echo e($order->amount); ?>

													</td>
													<td>
														<label class="label label-success">
															<?php echo e(ucfirst($order->status)); ?>

														</label>
													</td>
												</tr>
												<?php endif; ?>
													
												
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
										</tbody>
									</table>                  
								</div><!-- table-responsive div end -->
							</div><!-- card body end -->
					
							<div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
		
								<div class="table-responsive">
									<table id="full_detail_table" class="w-100 table table-striped table-bordered">
										<thead>
											<th>
												#
											</th>
											<th>
												<?php echo e(__("Order TYPE")); ?>

											</th>
											<th>
												<?php echo e(__("OrderID")); ?>

											</th>
											<th>
												<?php echo e(__("Pending Amount")); ?>

											</th>
											<th>
												<?php echo e(__("Requested By")); ?>

											</th>
											<th>
												<?php echo e(__("Requested on")); ?>

											</th>
										</thead>
										
										<tbody>
											<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if(isset($order->getorder->order) && $order->status == 'initiated'): ?>
													<tr>
														<td><?php echo e($key+1); ?></td>
														<td>
															<?php if($order->getorder->order->payment_method != 'COD'): ?>
																<label class="label label-success">
																	<?php echo e(__("PREPAID")); ?>

																</label>
															<?php else: ?>
																<label class="label label-primary">
																	<?php echo e(__("COD")); ?>

																</label>
															<?php endif; ?>
														</td>
														<td><b>#<?php echo e($inv_cus->order_prefix.$order->getorder->order->order_id); ?></b>
															<br>
															<small>
																<a href="<?php echo e(route('return.order.show',$order->id)); ?>"><?php echo e(__("UPDATE ORDER")); ?></a>
															</small>
														</td>
														<td>
															<i class="<?php echo e($order->getorder->order->paid_in); ?>"></i><?php echo e($order->amount); ?>

														</td>
														<td>
															<?php echo e($order->user->name); ?>

														</td>
														<td>
															<?php echo e(date('d-M-Y | h:i A',strtotime($order->created_at))); ?>

														</td>
														
													</tr>
												<?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
    <script>var baseUrl = "<?= url('/') ?>";</script>
	<script src="<?php echo e(url('js/order.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/returnorder/index.blade.php ENDPATH**/ ?>