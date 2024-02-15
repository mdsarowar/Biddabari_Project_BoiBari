<?php $__currentLoopData = $cOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="ordertrack<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title" id="myModalLabel">Track REFUND FOR ORDER
					<b>#<?php echo e($inv_cus->order_prefix.$order->order->order_id); ?></b> | TXN ID :
					<b><?php echo e($order->transaction_id); ?></b></h4>

					<button type="button" class="float-right close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div id="refundArea<?php echo e($order->id); ?>">

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
				<button onclick="trackrefund('<?php echo e($order->id); ?>')" type="button" class="btn btn-primary"><i
						class="fa fa-refresh" aria-hidden="true"></i> REFRESH</button>
			</div>
		</div>
	</div>
</div>

<!-- UPDATE ORDER Modal -->
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="orderupdate<?php echo e($order->id); ?>" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"> <?php echo e(__("UPDATE ORDER")); ?>

					<b>#<?php echo e($inv_cus->order_prefix.$order->order->order_id); ?></b></h4>
				<button type="button" class="float-right close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				
			</div>
			<div class="modal-body">
				<h4><b><?php echo e(__("Order Summary")); ?></b></h4>
				<hr>
				<div class="bg-primary-rgba p-3 row">
					<div class="col-md-3"><b><?php echo e(__("Customer name")); ?></b></div>
					<div class="col-md-3"><b><?php echo e(__('Cancel Order Date')); ?></b></div>
					<div class="col-md-3"><b><?php echo e(__("Cancel Order Total")); ?></b></div>
					<div class="col-md-3"><b><?php echo e(__("REFUND Transcation ID /REF. ID")); ?></b></div>

					<?php

						$realamount = round($order->singleorder->qty*$order->singleorder->price+$order->singleorder->tax_amount+$order->singleorder->shipping,2);

					?>

					<div class="col-md-3"><?php echo e($user = App\User::find($order->order->user_id)->name); ?></div>
					<div class="col-md-3"><?php echo e(date('d-m-Y @ h:i A',strtotime($order->created_at))); ?></div>
					<div class="col-md-3">
						<p><?php echo e(__("Order Total:")); ?> <i class="<?php echo e($order->order->paid_in); ?>"></i><?php echo e($realamount); ?></p>

						<?php if($order->order->handlingcharge != 0): ?>
						<p><?php echo e(__("Handling Charge :")); ?> <i class="<?php echo e($order->order->paid_in); ?>"></i>
							<?php echo e($order->singleorder->handlingcharge); ?></p>
						<?php endif; ?>
						<?php if($order->amount != $realamount): ?>
						<p><?php echo e(__('Refunded Amount :')); ?> <i class="<?php echo e($order->order->paid_in); ?>"></i> <?php echo e($order->amount); ?></p>
						<?php endif; ?>
					</div>
					<div class="col-md-3"><b><?php echo e($order->transaction_id); ?></b>
					</div>

					<div class="margin-top-15 col-md-3">
						<p><b><?php echo e(__("REFUND METHOD:")); ?></b></p>

						<?php if($order->order->payment_method !='COD' && $order->method_choosen != 'bank'): ?>
							<?php echo e(ucfirst($order->method_choosen)); ?> (<?php echo e($order->order->payment_method); ?>)
						<?php elseif($order->method_choosen == 'bank'): ?>
							<?php echo e(ucfirst($order->method_choosen)); ?>

						<?php else: ?>
							<?php echo e(__("No Need for COD Orders")); ?>

						<?php endif; ?>

					</div>

					<div class="margin-top-15 col-md-6">
						<p><b><?php echo e(__("Cancelation Reason:")); ?></b></p>
						<blockquote>
							<?php echo e($order->comment); ?>

						</blockquote>
					</div>

					<?php if($order->method_choosen == 'bank'): ?>
						<?php
							$bank = App\Userbank::where('id','=',$order->bank_id)->first();
						?>
					<div class="col-md-4">
						<?php if(isset($bank)): ?>
						<label><?php echo e(__("Refund")); ?> <?php echo e(ucfirst($order->is_refunded)); ?> <?php echo e(__("In")); ?> <?php echo e($bank->user->name); ?> <?php echo e(__("'s Account Following are details:")); ?></label>


						<div class="well">

							<p><b><?php echo e(__('A/C Holder Name:')); ?> </b><?php echo e($bank->acname); ?></p>
							<p><b><?php echo e(__("Bank Name:")); ?> </b><?php echo e($bank->bankname); ?></p>
							<p><b><?php echo e(__("Account No:")); ?> </b><?php echo e($bank->acno); ?></p>
							<p><b><?php echo e(__("IFSC Code:")); ?> </b><?php echo e($bank->ifsc); ?></p>


						</div>
						<?php else: ?>
						<p>
							<?php echo e(__("User Deleted bank ac")); ?>

						</p>
						<?php endif; ?>
					</div>
					<?php endif; ?>



				</div>
				<?php if($order->order->discount != 0): ?>

					<?php if($order->order->distype == 'product'): ?>

						<?php if(isset($cpn) && $cpn->pro_id == $order->singleOrder->variant->products->id): ?>
							<div class="callout callout-success">
								<?php echo e(__("Customer Apply")); ?> <b><?php echo e($order->order->coupon); ?></b> <?php echo e(__("on this order.")); ?>

							</div>
						<?php endif; ?>

					<?php elseif($order->order->distype == 'category'): ?>

						<div class="callout callout-success">
							<?php echo e(__("Customer Apply")); ?> <b><?php echo e($order->order->coupon); ?></b> <?php echo e(__("on this order hence refund amount total is different.")); ?>

						</div>

					<?php elseif($order->order->distype == 'cart'): ?>
						<div class="callout callout-success">
							<?php echo e(__("Customer Apply")); ?> <b><?php echo e($order->order->coupon); ?></b> <?php echo e(__("on this order hence refund amount total is different.")); ?>

						</div>
					<?php endif; ?>

				<?php endif; ?>
				<hr>
				<h4><b>Items</b></h4>

				<?php
					$inv = $order->singleorder;

					$orivar = $order->singleorder->variant;
					
					if(isset($orivar)){
						$varcount = count($orivar->main_attr_value);
					}

					$i=0;
				?>

			<form id="singleorderform" action="<?php echo e(route('single.can.order',$order->id)); ?>" method="POST">
				<div class="row">
					<div class="col-md-1">
						<?php if($order->singleorder->variant): ?>
							<?php if($orivar->variantimages): ?>
								<img class="pro-img" src="<?php echo e(url('variantimages/'.$orivar->variantimages['main_image'])); ?>"
							/>
							<?php else: ?> 
								<img class="pro-img" src="<?php echo e(Avatar::create($orivar->products->name)); ?>"/>
							<?php endif; ?>
						<?php endif; ?>
		
						<?php if($order->singleorder->simple_product): ?>
							<img class="pro-img" src="<?php echo e(url('images/simple_products/'.$order->singleorder->simple_product->thumbnail)); ?>"/>
						<?php endif; ?>
					</div>

					<div class="col-md-4">
						<?php if($order->singleorder->variant): ?>
							<a class="text-primary" target="_blank"
								title="Click to view"><b><?php echo e($orivar->products->name); ?></b>
		
								<small>
									(<?php echo e(variantname($order->singleorder->variant)); ?>)
		
								</small>
							</a>
							<br>
							<small class="margin-left-15"><b><?php echo e(__("Sold By:")); ?></b> 
								<?php echo e($orivar->products->store->name); ?>

							</small>
						<?php endif; ?>
		
						<?php if($order->singleorder->simple_product): ?>
							<a class="color111 margin-top-15" target="_blank"
								title="Click to view">
								<b><?php echo e($order->singleorder->simple_product->product_name); ?></b>
							</a>
							<br>
							<small class="margin-left-15"><b><?php echo e(__("Sold By:")); ?></b> <?php echo e($order->singleorder->simple_product->store->name); ?>

							</small>
						<?php endif; ?>
		
						<br>
						<small class="margin-left-15"><b>Qty:</b> <?php echo e($order->singleorder->qty); ?>

						</small>
					</div>

					<div class="col-md-2">
						<?php if($order->order->discount != 0): ?>
							<?php if($order->order->distype == 'product'): ?>
							
								<?php if($order->singleorder->variant): ?>
									<?php if(isset($cpn) && $cpn->pro_id == $inv->variant->products->id): ?>
										<b><i class="<?php echo e($order->order->paid_in); ?>"></i>
											<?php echo e(round($realamount-$order->order->discount,2)); ?></b> &nbsp;
										<strike><i class="<?php echo e($order->order->paid_in); ?>"></i> <?php echo e($realamount); ?></strike>
									<?php else: ?>
										<b><i class="<?php echo e($order->order->paid_in); ?>"></i> <?php echo e($realamount); ?></b>
									<?php endif; ?>
								<?php endif; ?>

								<?php if($order->singleorder->simple_product): ?>
								
									<?php if(isset($cpn) && $cpn->simple_pro_id == $order->singleorder->simple_product->id): ?>
										<b><i class="<?php echo e($order->order->paid_in); ?>"></i>
											<?php echo e(round($realamount-$order->order->discount,2)); ?></b> &nbsp;
										<strike><i class="<?php echo e($order->order->paid_in); ?>"></i> <?php echo e($realamount); ?></strike>
									<?php else: ?>
										<b><i class="<?php echo e($order->order->paid_in); ?>"></i> <?php echo e($realamount); ?></b>
									<?php endif; ?>

								<?php endif; ?>

							<?php elseif($order->order->distype == 'cart'): ?>

								<b><i class="<?php echo e($order->order->paid_in); ?>"></i>
									<?php echo e(round($realamount-$order->singleOrder->discount,2)); ?>

								</b>&nbsp;
								<strike><i class="<?php echo e($order->order->paid_in); ?>"></i> <?php echo e($realamount); ?></strike>

							<?php endif; ?>
						<?php else: ?>
						<i class="<?php echo e($order->order->paid_in); ?>"></i> <?php echo e($realamount); ?>

						<?php endif; ?>
					</div>

					<div class="col-md-3">
						<label for="">
							<?php echo e(__("UPDATE TXN ID/REF. NO:")); ?>

						</label>
						<input type="text" name="transaction_id" class="form-control"
							value="<?php echo e($order->transaction_id); ?>" class="form-control">
						<br>
			
						
			
					</div>
			
					<?php echo csrf_field(); ?>
					<div class="col-md-2">
			
						<label for="">
							<?php echo e(__("REFUND STATUS:")); ?>

						</label>
						<?php if($order->order->payment_method != 'COD'): ?>
						<select name="refund_status" id="refund_status<?php echo e($order->id); ?>" class="form-control"
							onchange="singlerefundstatus('<?php echo e($order->id); ?>')">
							<option <?php echo e($order->is_refunded == 'completed' ? "selected" : ""); ?> value="completed">
								<?php echo e(__('Completed')); ?>

							</option>
							<option <?php echo e($order->is_refunded == 'pending' ? "selected" : ""); ?> value="pending">
								<?php echo e(__("Pending")); ?>

							</option>
						</select>
						<?php else: ?>
						<select readonly name="refund_status" class="form-control">
			
							<option <?php echo e($order->is_refunded == 'completed' ? "selected" : ""); ?> value="completed">
								<?php echo e(__("Completed")); ?>

							</option>
			
						</select>
						<?php endif; ?>
			
					</div>

					<div class="col-md-3">
						<label><?php echo e(__('Amount')); ?> :</label>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text" id="basic-addon1">
								<i class="<?php echo e($order->order->paid_in); ?>"></i>
							  </span>
							</div>
							<input placeholder="0.00" type="text" name="amount"
								<?php echo e($order->method_choosen == 'bank' ? "" : "readonly"); ?> class="form-control"
								value="<?php echo e($order->amount); ?>" class="form-control">
						</div>

						
						<small class="help-block">
			
							(<?php echo e(__("UPDATE AMOUNT IF CHANGES OR TRANSCATION FEE IS CHARGED")); ?>)
			
						</small>
					</div>
			
					<div class="col-md-3">
						<label>
							(<?php echo e(__("ORDER STATUS")); ?>)
						</label>
						<?php if($order->order->payment_method != 'COD'): ?>
			
						<select name="order_status" id="order_status<?php echo e($order->id); ?>" class="form-control">
							<?php if($order->singleorder->status == 'Refund Pending'): ?>
							<option selected value="Refund Pending">Refund Pending</option>
							<?php elseif($order->singleorder->status == 'refunded' || $order->singleorder->status ==
							'returned'): ?>
							<option <?php echo e($order->singleorder->status == 'refunded' ? "selected" : ""); ?>

								value="refunded"><?php echo e(__('Refunded')); ?></option>
							<option <?php echo e($order->singleorder->status == 'returned' ? "selected" : ""); ?>

								value="returned">
								<?php echo e(__('Returned')); ?>

							</option>
							<?php endif; ?>
						</select>
			
						<?php else: ?>
			
						<select name="order_status" id="order_status<?php echo e($order->id); ?>"
							class="order_status form-control">
							<option <?php echo e($order->singleorder->status == 'canceled' ? "selected" : ""); ?>

								value="canceled">
								<?php echo e(__("Cancelled")); ?>

							</option>
							<option <?php echo e($order->singleorder->status == 'returned' ? "selected" : ""); ?>

								value="returned">
								<?php echo e(__("Returned")); ?>

							</option>
						</select>
			
						<?php endif; ?>
			
					</div>

					<div class="col-md-3">
						<label>
							<?php echo e(__("Transcation Fee:")); ?>

						</label>
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text" id="basic-addon1">
								<i class="<?php echo e($order->order->paid_in); ?>"></i>
							  </span>
							</div>
							<input <?php echo e($order->method_choosen == 'bank' ? "" : "readonly"); ?> placeholder="0.00"
								type="text" name="txn_fee" class="form-control" value="<?php echo e($order->txn_fee); ?>"
								class="form-control">
						</div>
						<small class="help-block">
			
							(<?php echo e(__("UPDATE TRANSCATION FEE IF CHARGED")); ?>)
			
						</small>
			
					</div>

				</div>
				


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger-rgba" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
				<button type="submit" class="btn btn-primary-rgba">
					<?php echo e(__("Save Changes")); ?>

				</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- END Track--><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/singleordermodal.blade.php ENDPATH**/ ?>