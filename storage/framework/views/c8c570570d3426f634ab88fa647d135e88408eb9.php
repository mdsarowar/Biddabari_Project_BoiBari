
<?php $__env->startSection('title',__('Canceled Orders |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Canceled Orders';
  $data['title0'] = 'Order & Invoices';
  $data['title1'] = 'Canceled Orders';
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
						<h5 class="card-title"><?php echo e(__('Canceled Orders')); ?></h5>
					</div>
					<div class="col-md-2">
						<div class="wrapper-tooltip">
                            <button type="button" class="btn btn-primary-rgba"><i class="fa fa-info-circle float-right"></i></button>
                            <div class="tooltip">
								<ul>
									<li><?php echo e(__("COD Orders are only viewable !")); ?></li>
									<li>
										<?php echo e(__("For Prepaid canceled orders with refund method choosen Bank You can View Details IF refund is complete.")); ?>

									</li>
									<li>
										<?php echo e(__('For Prepaid canceled orders with refund method choosen orignal you can track refund status LIVE from respective Payment gateway & Update TXN/REF ID.')); ?>

									</li>
								</ul>
							</div>
                        </div>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<div class="card m-b-30">
										
						<ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab-line" data-content="<?php echo e(__("If order have only 1 item than its count in single canceled orders.")); ?>"  data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-truck mr-2"></i>
									<?php echo e(__("Single Canceled Orders")); ?>  <?php if($partialcount>0): ?><span class="badge badge-danger"><span id="pcount"><?php echo e($partialcount); ?></span> New <?php endif; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab-line" data-content="<?php echo e(__('If order have more than 1 item than its count in Bulk canceled orders.')); ?>" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-truck mr-2"></i>
									<?php echo e(__("Bulk Canceled Orders")); ?> <?php if($fullcount>0): ?><span class="badge badge-danger"><span id="fcount"><?php echo e($fullcount); ?></span> <?php echo e(__("New")); ?> <?php endif; ?></a>
							</li>
							
						</ul>

						<div class="tab-content" id="defaultTabContentLine">
							<div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
								<table id="full_detail_table" class="w-100 table table-bordered">
									<thead>

										<th>
											#
										</th>

										<th>
											<?php echo e(__("Order TYPE")); ?>

										</th>

										<th>
											<?php echo e(__("ORDER ID")); ?>

										</th>

										<th>
											<?php echo e(__('REASON for Cancellation')); ?>

										</th>

										<th>
											<?php echo e(__("REFUND METHOD")); ?>

										</th>

										<th>
											<?php echo e(__("CUSTOMER")); ?>

										</th>

										<th>
											<?php echo e(__("REFUND STATUS")); ?>

										</th>

									</thead>

									<tbody>
										<?php $__currentLoopData = $cOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($key+1); ?></td>
												<td>

													<?php if($order->order->payment_method != 'COD'): ?>
														<label class="badge badge-success">
															<?php echo e(__("PREPAID")); ?>

														</label>
													<?php else: ?>
														<label class="badge badge-primary">
															<?php echo e(__('COD')); ?>

														</label>
													<?php endif; ?>

												</td>
												<td>
													<?php if($order->read_at == NULL): ?>
														<b>#<?php echo e($inv_cus->order_prefix.$order->order->order_id); ?></b>
													<?php else: ?>
														#<?php echo e($inv_cus->order_prefix.$order->order->order_id); ?>

													<?php endif; ?>
													<br>
													<small class="text-center">
														<?php if($order->method_choosen == 'bank' || $order->order->payment_method == 'COD'): ?>
															<a onclick="readorder('<?php echo e($order->id); ?>')"  class="cpointer" data-toggle="modal" data-target="#orderupdate<?php echo e($order->id); ?>">
																<?php echo e(__("UPDATE ORDER")); ?>

															</a>
														<?php else: ?>

															<a role="button" class="cpointer" onclick="readorder('<?php echo e($order->id); ?>')"  data-toggle="modal" data-target="#orderupdate<?php echo e($order->id); ?>">
																<?php echo e(__("UPDATE ORDER")); ?>

															</a> | <a onclick="trackrefund('<?php echo e($order->id); ?>')" class="cpointer" role="button"><?php echo e(__("TRACK REFUND")); ?></a>
														<?php endif; ?>
													</small>
												</td>
												<td>
													<?php echo e($order->comment); ?>

												</td>
												<td>
													<?php if($order->method_choosen == 'bank'): ?>
														<?php echo e(ucfirst($order->method_choosen)); ?>

													<?php elseif($order->method_choosen == 'orignal'): ?>
														<?php echo e(ucfirst($order->method_choosen)); ?> (<?php echo e(ucfirst($order->order->payment_method)); ?>)
													<?php else: ?>
													<?php echo e(__("No need for COD Orders")); ?>

													<?php endif; ?>
												</td>
												<td>
													<?php
														$name = App\User::find($order->order->user_id)->name;
													?>

													<?php if(isset($name)): ?>
													<?php echo e($name); ?>

													<?php else: ?>

													<?php echo e(__("No Name")); ?>


													<?php endif; ?>
												</td>

												<td>
													<?php if($order->is_refunded == 'pending'): ?>
														<label class="badge badge-danger"><?php echo e(ucfirst($order->is_refunded)); ?></label>
													<?php else: ?>
														<label class="badge badge-success"><?php echo e(ucfirst($order->is_refunded)); ?></label>
													<?php endif; ?>
												</td>

												<!--trackmodel-->



											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
							</div>
										
							<div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
								<table id="full_detail_table2" class="w-100 table table-striped table-bordered">
									<thead>
										<th>
											#
										</th>
										<th>
											<?php echo e(__("Order TYPE")); ?>

										</th>
										<th>
											<?php echo e(__("Order ID")); ?>

										</th>
										<th>
											<?php echo e(__("REASON for Cancellation")); ?>

										</th>
										<th>
											<?php echo e(__("REFUND METHOD")); ?>

										</th>
										<th>
											<?php echo e(__("CUSTOMER")); ?>

										</th>
										<th>
											<?php echo e(__("REFUND STATUS")); ?>

										</th>
									</thead>

									<tbody>
										<?php $__currentLoopData = $comOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $fcorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($key+1); ?></td>
												<td>

														<?php if($fcorder->getorderinfo->payment_method != 'COD'): ?>
															<label class="label label-success"><?php echo e(__("PREPAID")); ?></label>
														<?php else: ?>
															<label class="label label-primary"><?php echo e(__("COD")); ?></label>
														<?php endif; ?>
												</td>
												<td>
													<?php if($fcorder->read_at == NULL): ?>
													<b>#<?php echo e($inv_cus->order_prefix.$fcorder->getorderinfo->order_id); ?></b>
													<?php else: ?>
														#<?php echo e($inv_cus->order_prefix.$fcorder->getorderinfo->order_id); ?>

													<?php endif; ?>
													<br>
														<small class="text-center">
															<?php if($fcorder->method_choosen == 'bank' || $fcorder->getorderinfo->payment_method == 'COD'): ?>
																<a onclick="readfullorder('<?php echo e($fcorder->id); ?>')"  class="cpointer" data-toggle="modal" data-target="#fullorderupdate<?php echo e($fcorder->id); ?>">
																	<?php echo e(__("UPDATE ORDER")); ?>

																</a>
															<?php else: ?>
																<a onclick="readfullorder('<?php echo e($fcorder->id); ?>')" class="cpointer" data-toggle="modal" data-target="#fullorderupdate<?php echo e($fcorder->id); ?>"><?php echo e(__("UPDATE ORDER")); ?></a> | <a class="cpointer" onclick="trackrefundFullCOrder('<?php echo e($fcorder->id); ?>')"><?php echo e(__('TRACK REFUND')); ?></a>
															<?php endif; ?>
														</small>
												</td>
												<td>
													<?php echo e($fcorder->comment); ?>

												</td>
												<td>
														<?php if($fcorder->method_choosen == 'bank'): ?>
															<?php echo e(ucfirst($fcorder->method_choosen)); ?>

														<?php elseif($fcorder->method_choosen == 'orignal'): ?>
															<?php echo e(ucfirst($fcorder->method_choosen)); ?> (<?php echo e(ucfirst($fcorder->getorderinfo->payment_method)); ?>)
														<?php else: ?>
														<?php echo e(__('No need for COD Orders')); ?>

														<?php endif; ?>
												</td>
												<td>
													<?php echo e($fcorder->user->name); ?>

												</td>

												<td>
														<?php if($fcorder->is_refunded == 'pending'): ?>
															<label class="badge badge-primary"><?php echo e(ucfirst($fcorder->is_refunded)); ?></label>
														<?php else: ?>
															<label class="badge badge-success"><?php echo e(ucfirst($fcorder->is_refunded)); ?></label>
														<?php endif; ?>
												</td>


												<!-- END Full Order Update Modal -->
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
    </div>
  </div>
</div>

				  
							
					
    
                

								
									
									
									
								
									

								
								

                        
                  

<!-- Single Refund Modal -->
<?php echo $__env->make('admin.order.singleordermodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--END-->

<!-- FULL Refund Modal -->
<?php echo $__env->make('admin.order.fullordermodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--END-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
    <script>var baseUrl = "<?= url('/') ?>";</script>
	<script src="<?php echo e(url('js/order.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/canorderindex.blade.php ENDPATH**/ ?>