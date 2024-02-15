
<?php $__env->startSection('title',__('Wallet Setting | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Wallet Setting';
  $data['title0'] = 'Wallet';
  $data['title1'] = 'Wallet Setting';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="card mb-5">
    <div class="card-body">
      <div class="row">
        <div class="form-group col-md-12">
          <label><?php echo e(__("Enable Wallet:")); ?> </label>
          <br>
          <label class="switch">
              <input <?php echo e($wallet == 1 ? "checked" : ""); ?> type="checkbox" class="wallet_enable" name="wallet_enable">
              <span class="knob"></span>
          </label>
          <br>
          <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("It will activate the wallet on portal")); ?>

          </small>
        </div>
        <div class="wallet-dashboard <?php echo e($wallet == 0 ? "hide" : ""); ?>">
          <h5 class="ml-md-3"><?php echo e(__("Wallet States:")); ?></h5>
           
           
          <div class="row ml-1 mr-1">
            
            

            <div class="col-lg-12 col-xl-4 col-12">
              <div class="card m-b-30 bg-success-rgba shadow-sm">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-9">
                              <h4><?php echo e($states['activeuser']); ?></h4>
                              <p class="font-14 mb-0"><?php echo e(__('Active Wallet Users')); ?></p>
                              
                          </div>
                          <div class="col-md-3 col-3">
                           <i class="text-success iconsize feather icon-bar-chart-line- "></i>
                          </div>
                          <div class="col-md-12 col-12">
                            <small class="text-muted">(<?php echo e(__("Counted active wallet users ONLY")); ?>)</small>
                          </div>
                          
                         
                        </div>
                        
                         
                        
                      </div>
                  </div>
            </div>
            <div class="col-md-4">
              <div class="card m-b-30 bg-danger-rgba shadow-sm">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-9">
                              <h4><?php echo e($states['totaluser']); ?></h4>
                              <p class="font-14 mb-0"><?php echo e(__('Total Wallet Users')); ?></p>
                            
                          </div>
                          <div class="col-md-3 col-3">
                             <i class="text-danger iconsize feather icon-users"></i>
                          </div>
                          <div class="col-md-12">
                            <small class="text-muted">(<?php echo e(__('Counted active and deactive wallet users')); ?>)</small>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card m-b-30 bg-warning-rgba shadow-sm">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-7">
                              <h4><?php echo e($states['wallettxn']); ?></h4>
                              <p class="font-14 mb-0"><?php echo e(__("Wallet Transcations")); ?></p>
                            
                          </div>
                          <div class="col-5 text-right">
                            <i class=" text-warning iconsize feather icon-bar-chart-line"></i>
                        
                          </div>
                          <div class="col-md-12">
                            <small class="text-muted">(<?php echo e(__("No of user wallet transcations made on")); ?> <?php echo e(config('app.name')); ?>)</small>
                          </div>
        
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card m-b-30 bg-primary-rgba shadow-sm">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-7">
                              <h4 class=" <?php echo e($states['overallwalletbalance'] < 0 ? "text-danger" : ""); ?>"><i class="<?php echo e($defCurrency->currency_symbol); ?>"></i> <?php echo e($states['overallwalletbalance']); ?></h4>
                              <p class="font-14 mb-0">
                                <?php echo e(__("Overall Wallet balance")); ?>

                              </p>
                            
                          </div>
                          <div class="col-5 text-right">
                            <i class="text-primary iconsize feather icon-credit-card"></i>
                        
                          </div>
                          <div class="col-md-12">
                            <small class="text-muted">(<?php echo e(__("Overall wallet balance of active wallet users")); ?>)</small>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card m-b-30 bg-info-rgba shadow-sm">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h4><?php echo e($states['walletorders']); ?></h4>
                              <p class="font-14 mb-0">
                                <?php echo e(__("Total Wallet Orders")); ?>

                              </p>
                       
                          </div>
                          <div class="col-4 text-right">
                            <i class="text-info iconsize feather icon-shopping-cart"></i>
                        
                          </div>
                          <div class="col-md-12">
                            <small class="text-muted">(<?php echo e(__("Total no. of orders made by wallet")); ?>)</small>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
           
            <div class="col-lg-12">
              <hr>
              <h5 class="card-title"><?php echo e(__("Order Wallet Report:")); ?></h5>
              <div class="table-responsive">
                <table id="wallet_logs_table" class="w-100 table table-bordered table-striped">
                  <thead>
                      <th>#</th>
                      <th><?php echo e(__("TXN ID")); ?></th>
                      <th><?php echo e(__("Note")); ?></th>
                      <th><?php echo e(__("Type")); ?></th>
                      <th><?php echo e(__("Amount")); ?></th>
                      <th><?php echo e(__("Balance")); ?></th>
                      <th><?php echo e(__("Transcation Date")); ?></th>
                      <th><?php echo e(__("Transcation Time")); ?></th>
                  </thead>
                </table>
              </div>
            </div>
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
      var table = $('#wallet_logs_table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '<?php echo e(route("admin.wallet.settings")); ?>',
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false},
              {data : 'wallet_txn_id', name : 'wallet_txn_id'},
              {data : 'note', name : 'note'},
              {data : 'type', name : 'type'},
              {data : 'amount', name : 'amount'},
              {data : 'balance', name : 'balance'},
              {data : 'txndate', name : 'txndate'},
              {data : 'txntime', name : 'txntime'},
          ],
          dom : 'lBfrtip',
          buttons : [
            'csv','excel','pdf','print'
          ],
          order : [[0,'DESC']]
      });
      
});

    $('.wallet_enable').on('change', function () {
        var status;
        if ($(this).is(':checked')) {
            status = 1;
            $('.wallet-dashboard').removeClass("hide");
        } else {
            status = 0;
            $('.wallet-dashboard').addClass("hide");
        }


        $.ajax({
            type: 'GET',
            url: '<?php echo e(route("admin.update.wallet.settings")); ?>',
            data: {
                wallet_enable: status
            },
            success: function (data) {
                if (data.code == 200) {

                    swal({
                        title: "Success ",
                        text: data.msg,
                        icon: 'success'
                    });


                } else {

                    swal({
                        title: "error",
                        text: data.msg,
                        icon: 'error'
                    });


                }
            },
            error: function (jqXHR, exception) {
                console.log(jqXHR);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
                    
  
       


        
         
        
  
                  
                   
  
  
  
  


          
         

            
            
              
            
             
              
          
           
      

    
                  
          
                  
    
    
          
                  
    
    
                  
                  
                
    
                
                                      


          

            
          
              




            

            
            
            
  
                 
  
               
  
          
    
             
            

          



<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/wallet/setting.blade.php ENDPATH**/ ?>