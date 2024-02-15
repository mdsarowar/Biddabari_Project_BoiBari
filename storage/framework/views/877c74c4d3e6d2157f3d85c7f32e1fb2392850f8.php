<!--for complete order cancel-->
<?php $__currentLoopData = $comOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $fcorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<!-- Full Order Update Modal -->
<div  data-backdrop="static" data-keyboard="false" class="modal fade" id="fullorderupdate<?php echo e($fcorder->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="width90 modal-dialog model-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
        	<?php echo e(__('UPDATE ORDER:')); ?> <b>#<?php echo e($inv_cus->order_prefix.$fcorder->getorderinfo->order_id); ?></b>
        </h4>
      </div> 
      <div class="modal-body">

       	<h4><b><?php echo e(__("Order Summary")); ?></b></h4>
			<hr>
			<div class="row">
				<div class="col-md-3"><b><?php echo e(__("Customer name")); ?></b></div>
				<div class="col-md-3"><b><?php echo e(__("Cancel Order Date")); ?></b></div>
				<div class="col-md-3"><b><?php echo e(__("Cancel Order Total")); ?></b></div>
				<div class="col-md-3"><b><?php echo e(__("REFUND Transcation ID /REF. ID")); ?></b></div>

					<?php
						$realamount = $fcorder->getorderinfo->order_total;
					?>

				<div class="col-md-3"><?php echo e($user = App\User::find($fcorder->getorderinfo->user_id)->name); ?></div>
				<div class="col-md-3"><?php echo e(date('d-m-Y @ h:i A',strtotime($fcorder->created_at))); ?></div>
				<div class="col-md-3">
					<p><?php echo e(__("Order Total :")); ?> <i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i> <?php echo e($realamount); ?></p>
					
					<?php if($fcorder->getorderinfo->handlingcharge != 0): ?>
						<p><?php echo e(__("Handling Charge :")); ?> <i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i> <?php echo e($fcorder->getorderinfo->handlingcharge); ?></p>
					<?php endif; ?>
					<?php if($fcorder->amount != $realamount): ?>
						<p><?php echo e(__("Refunded Amount :")); ?> <i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i> <?php echo e($fcorder->amount); ?></p>
					<?php endif; ?>

					
				</div>
				<div class="col-md-3"><b><?php echo e($fcorder->txn_id); ?></b></div>
				
				<div class="margin-top-15 col-md-3">
					<p><b><?php echo e(__('REFUND Method:')); ?></b></p>
					
						

						<?php if($fcorder->getorderinfo->payment_method !='COD' && $fcorder->method_choosen != 'bank'): ?>
						
								<?php echo e(ucfirst($fcorder->method_choosen)); ?> (<?php echo e($fcorder->getorderinfo->payment_method); ?>)
							<?php elseif($fcorder->method_choosen == 'bank'): ?>
								<?php echo e(ucfirst($fcorder->method_choosen)); ?>

							<?php else: ?>
								<?php echo e(__("No Need for COD Orders")); ?>

							<?php endif; ?>
					
				</div>

				<div class="margin-top-15 col-md-6">
					<p><b><?php echo e(__("Cancelation Reason:")); ?></b></p>
					<blockquote>
						<?php echo e($fcorder->comment); ?>

					</blockquote>
				</div>
			<form id="singleorderform" action="<?php echo e(route('full.can.order',$fcorder->id)); ?>" method="POST">
				<div class="col-md-12">
					<div class="row">
						<div class="margin-top-15 col-md-4">
					
					<label for=""><?php echo e(__("UPDATE TXN ID OR REF. NO:")); ?></label>
					<input type="text" name="transaction_id" class="form-control" value="<?php echo e($fcorder->txn_id); ?>" class="form-control">
					<br>
					
					<label><?php echo e(__("Amount :")); ?></label>
					<div class="input-group">
						 <div class="input-group-addon"><i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i></div>
					<input <?php echo e($fcorder->method_choosen == 'bank' ? "" : "readonly"); ?> placeholder="0.00" type="text" name="amount" class="form-control" value="<?php echo e($fcorder->amount); ?>" class="form-control">
					</div>
					<small class="help-block">
						
						(<?php echo e(__("UPDATE AMOUNT IF CHANGES OR TRANSCATION FEE IS CHARGED")); ?>)

					</small>
					
			   
				</div>

				<div class="margin-top-15 col-md-4">
					<label for=""><?php echo e(__("UPDATE REFUND STATUS:")); ?></label>
					
					<?php if($fcorder->getorderinfo->payment_method !='COD'): ?>
					<select onchange="updatefullorder('<?php echo e($fcorder->id); ?>')" name="refund_status" class="full_refund_status<?php echo e($fcorder->id); ?> form-control">
						<option <?php echo e($fcorder->is_refunded == 'completed' ? "selected" : ""); ?> value="completed"><?php echo e(__("Completed")); ?></option>
						<option <?php echo e($fcorder->is_refunded == 'pending' ? "selected" : ""); ?> value="pending"><?php echo e(__('Pending')); ?></option>
					</select>
					<?php else: ?>
					<select readonly onchange="updatefullorder('<?php echo e($fcorder->id); ?>')" name="refund_status" class="full_refund_status<?php echo e($fcorder->id); ?> form-control">
						<option <?php echo e($fcorder->is_refunded == 'completed' ? "selected" : ""); ?> value="completed"><?php echo e(__('Completed')); ?></option>
						
					</select>
					<?php endif; ?>

					<br>
					
					<label><?php echo e(__("Transcation Fee:")); ?></label>
					<div class="input-group">
						 <div class="input-group-addon"><i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i></div>
					<input <?php echo e($fcorder->method_choosen == 'bank' ? "" : "readonly"); ?> placeholder="0.00" type="text" name="txn_fee" class="form-control" value="<?php echo e($fcorder->txn_fee); ?>" class="form-control">
				</div>
					<small class="help-block">
						
						(<?php echo e(__("UPDATE TRANSCATION FEE IF CHARGED")); ?>)

					</small>
					
					
						
					
				</div>
				<?php if($fcorder->method_choosen == 'bank'): ?>
					<?php
						$bank = App\Userbank::where('id','=',$fcorder->bank_id)->first();
					?>
				<div class="col-md-4">
					<?php if(isset($bank)): ?>
					<label>Refund <?php echo e(ucfirst($fcorder->is_refunded)); ?> In <?php echo e($bank->user->name); ?>'s Account Following are details:</label>
					

					<div class="well">
						
						<p><b><?php echo e(__("A/C Holder Name:")); ?> </b><?php echo e($bank->acname); ?></p>
						<p><b><?php echo e(__("Bank Name:")); ?> </b><?php echo e($bank->bankname); ?></p>
						<p><b><?php echo e(__("Account No:")); ?> </b><?php echo e($bank->acno); ?></p>
						<p><b><?php echo e(__("IFSC Code:")); ?> </b><?php echo e($bank->ifsc); ?></p>


					</div>
					<?php else: ?>
						<p><?php echo e(__("User Deleted bank ac")); ?></p>
					<?php endif; ?>
				</div>
				<?php endif; ?>

					</div>
				</div>
			</div>
			<?php if($fcorder->getorderinfo->discount !=0): ?>
			<div class="callout callout-success">
				<?php echo e(__('Customer Apply')); ?> <b><?php echo e($fcorder->getorderinfo->coupon); ?></b> <?php echo e(__('on this order.')); ?>

			</div>
			<?php endif; ?>
			<h4><b><?php echo e(__("Items")); ?> (<?php echo e(count($fcorder->inv_id)); ?>)</b></h4>
			

			<?php if(is_array($fcorder->inv_id)): ?>
				<?php $__currentLoopData = $fcorder->inv_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invEx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<?php
					    $inv = App\InvoiceDownload::withTrashed()->find($invEx);
						$orivar = App\AddSubVariant::withTrashed()->find($inv->variant_id);
						$varcount = count($orivar->main_attr_value);
						$i=0;
					?>

			<div class="row">
				<div class="col-md-6">

					<div class="row">
						<div class="col-md-2">
							<?php if($orivar->variantimages): ?>
								<img class="pro-img" src="<?php echo e(url('variantimages/'.$orivar->variantimages['main_image'])); ?>">
							<?php else: ?>
								<img class="pro-img" src="<?php echo e(Avatar::create($orivar->products->name)); ?>">	
							<?php endif; ?>
						</div>
						<div class="col-md-6">
							<a class="color111 margin-top-15" target="_blank" title="Click to view"><b><?php echo e($orivar->products->name); ?></b>

					<small>
					(<?php $__currentLoopData = $orivar->main_attr_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $orivars): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $i++; ?>

                        <?php
                          $getattrname = App\ProductAttributes::where('id',$key)->first()->attr_name;
                          $getvarvalue = App\ProductValues::where('id',$orivars)->first();
                        ?>

                        <?php if($i < $varcount): ?>
                          <?php if(strcasecmp($getvarvalue->unit_value, $getvarvalue->values) != 0 && $getvarvalue->unit_value != null): ?>
                            <?php if($getvarvalue->proattr->attr_name == "Color" || $getvarvalue->proattr->attr_name == "Colour" || $getvarvalue->proattr->attr_name == "color" || $getvarvalue->proattr->attr_name == "colour"): ?>
                            <?php echo e($getvarvalue->values); ?>,
                            <?php else: ?>
                            <?php echo e($getvarvalue->values); ?><?php echo e($getvarvalue->unit_value); ?>,
                            <?php endif; ?>
                          <?php else: ?>
                            <?php echo e($getvarvalue->values); ?>,
                          <?php endif; ?>
                        <?php else: ?>
                          <?php if(strcasecmp($getvarvalue->unit_value, $getvarvalue->values) != 0 && $getvarvalue->unit_value != null): ?>
                          
                             <?php if($getvarvalue->proattr->attr_name == "Color" || $getvarvalue->proattr->attr_name == "Colour" || $getvarvalue->proattr->attr_name == "color" || $getvarvalue->proattr->attr_name == "colour"): ?>
                    <?php echo e($getvarvalue->values); ?>

                    <?php else: ?>
                      <?php echo e($getvarvalue->values); ?><?php echo e($getvarvalue->unit_value); ?>

                      <?php endif; ?>
                          <?php else: ?>
                            <?php echo e($getvarvalue->values); ?>

                          <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    )

                    </small></a>
					<br>
                    <small class="margin-left-15"><b><?php echo e(__("Sold By:")); ?></b> <?php echo e($orivar->products->store->name); ?>

                    </small>
                    <br>
                     <small class="margin-left-15"><b><?php echo e(__("Qty:")); ?></b> <?php echo e($inv->qty); ?>

                     </small>
						</div>
					</div>
					
					
			
			
				</div>

				<div class="margin-top-15 col-md-2">
					<i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i>
					<?php if($fcorder->getorderinfo->discount != 0): ?>
						<?php if($fcorder->getorderinfo->distype == 'product'): ?>

							<?php if($inv->discount !=0 || $inv->discount !=''): ?>
								<b><?php echo e(($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping)-$fcorder->getorderinfo->discount); ?></b> &nbsp;
								<strike><i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i> <?php echo e($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping); ?></strike>

							<?php else: ?>
								<?php echo e($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping); ?>

							<?php endif; ?>

						<?php elseif($fcorder->getorderinfo->distype == 'cart'): ?>
								
							<b><?php echo e(($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping)-$inv->discount); ?></b> &nbsp;
								<strike><i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i> <?php echo e($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping); ?></strike>

						<?php elseif($fcorder->getorderinfo->distype == 'category'): ?>
							<?php if($inv->discount !=0 || $inv->discount !=''): ?>
								<b><?php echo e(($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping)-$inv->discount); ?></b> &nbsp;
								<strike><i class="<?php echo e($fcorder->getorderinfo->paid_in); ?>"></i> <?php echo e($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping); ?></strike>
							<?php else: ?>
								<b><?php echo e(($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping)-$inv->discount); ?></b>
							<?php endif; ?>
						<?php endif; ?>
					<?php else: ?>
						<?php echo e($inv->price*$inv->qty+$inv->tax_amount+$inv->shipping); ?>

					<?php endif; ?>
				</div>
			
				
			
				<?php echo csrf_field(); ?>
				

				<div class="col-md-2">
					<label>
						<?php echo e(__("(UPDATE ORDER STATUS)")); ?>

					</label>
			<select name="order_status[]" class="single_order_status<?php echo e($fcorder->id); ?> form-control">
						<?php if($fcorder->is_refunded == 'pending'): ?>
						<option selected value="Refund Pending"><?php echo e(__("Refund Pending")); ?></option>
						<?php elseif($fcorder->is_refunded == 'completed'): ?>
						<option <?php echo e($inv->status == 'refunded' ? "selected" : ""); ?> value="refunded"><?php echo e(__("Refunded")); ?></option>
						<option <?php echo e($inv->status == 'returned' ? "selected" : ""); ?> value="returned"><?php echo e(__("Returned")); ?></option>
						<?php endif; ?>
					</select>
					
				</div>

				
			</div>

			<hr>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn btn-primary">
			<?php echo e(__("Save changes")); ?>

		</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- Track Refund Modal for full cancel modal -->
<div class="modal fade" id="ordertrackfull<?php echo e($fcorder->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="width60 modal-dialog model-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel"><?php echo e(__("Track REFUND FOR ORDER")); ?> <b>#<?php echo e($inv_cus->order_prefix.$fcorder->getorderinfo->order_id); ?></b> | <?php echo e(__("TXN ID :")); ?> <b><?php echo e($fcorder->txn_id); ?></b></h4>
	      </div>
	      <div class="modal-body">
	       	 <div id="refundAreafull<?php echo e($fcorder->id); ?>">
	       	 	
	       	 </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
	        <button onclick="trackrefundFullCOrder('<?php echo e($fcorder->id); ?>')" type="button" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> <?php echo e(__('REFRESH')); ?></button>
	      </div>
	    </div>
	  </div>
</div>
	
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/fullordermodal.blade.php ENDPATH**/ ?>