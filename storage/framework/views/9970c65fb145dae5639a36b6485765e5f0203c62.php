
<?php $__env->startSection('title',__('SMS Settings | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'SMS Settings';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'SMS Settings';
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
                    <h5 class="box-title"><?php echo e(__('SMS Channels')); ?></h5>
                </div>
                <div class="card-body">
                    <!-- main content start -->
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__('Enable :')); ?><span class="text-danger">*</span></label>
                        <br>
                        <label class="switch">
                            <input class="sms_enable" id="login_unicode"
                                <?php echo e($config->sms_channel == 1 ? "checked" : ""); ?> type="checkbox">
                            <span class="knob"></span>
                        </label>
                    </div>

                    <div id="mainsmsbox" style="display: <?php echo e($config->sms_channel == 1 ? "block" : "none"); ?>;">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Please select sms channel :')); ?><span
                                    class="text-danger">*</span></label>
                            <select data-placeholder="Please select sms channel"
                                class="msg_channel form-control select2" name="DEFAULT_SMS_CHANNEL" id="msg_channel">
                                <option value="">Please select sms channel</option>
                                <option <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'twillo' ? 'selected' : ''); ?> value="twillo">
                                    Twillo</option>
                                <option <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'msg91' ? 'selected' : ''); ?> value="msg91">
                                    MSG-91</option>
                                <?php if(Module::has('MimSms') && Module::find('MimSms')->isEnabled()): ?>
                                <option <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'mim' ? 'selected' : ''); ?> value="mim">MimSMS
                                </option>
                                <?php endif; ?>
                                <?php if(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled()): ?>
                                <option <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'exabytes' ? 'selected' : ''); ?> value="exabytes">
                                    Exabytes</option>
                                <?php endif; ?>
                            </select>
                        </div>



                        <div style="display: <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'twillo' ? 'block' : 'none'); ?>;"
                            id="twilloBox">

                            <div class="row">
                                <div class="col-md-12  ">
                                    <div class="p-2 mb-2 bg-success rounded text-white">
                                        <i class="fa fa-info-circle"></i> <?php echo e(__('Important note :')); ?>

                                        <ul>
                                            <li><?php echo e(__('Twillo Only send SMS if user did not opt for DND Services.')); ?></li>
                                            <li>
                                                <?php echo e(__("Twillo trail will send sms only to verified no.")); ?>

                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>



                            <form action="<?php echo e(route('change.twilo.settings')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('TWILIO SID :')); ?><span
                                                    class="text-danger">*</span></label>
                                            <input <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'twillo' ? 'required' : ''); ?>

                                                name="TWILIO_SID" type="text" value="<?php echo e(env('TWILIO_SID')); ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('TWILIO AUTH TOKEN :')); ?><span
                                                    class="text-danger">*</span></label>
                                            <input <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'twillo' ? 'required' : ''); ?>

                                                name="TWILIO_AUTH_TOKEN" type="text"
                                                value="<?php echo e(env('TWILIO_AUTH_TOKEN')); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('TWILIO NUMBER :')); ?><span
                                                    class="text-danger">*</span></label>
                                            <input <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'twillo' ? 'required' : ''); ?>

                                                name="TWILIO_NUMBER" type="text" value="<?php echo e(env('TWILIO_NUMBER')); ?>"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i>
                                                <?php echo e(__("Reset")); ?></button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-check-circle"></i> <?php echo e(__("Save")); ?></button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div style="display: <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'msg91' ? 'block' : 'none'); ?>;"
                            id="msg91Box">
                            <div class="row">
                                <div class="col-md-12  ">
                                    <div class="p-2 mb-2 bg-success rounded text-white">
                                        <i class="fa fa-info-circle"></i> <?php echo e(__('Important note :')); ?>

                                        <ul>
                                            <li>
                                                <?php echo e(__("MSG91 Only send SMS if user did not opt for DND Services.")); ?>

                                            </li>
                                            <li>
                                                <?php echo e(__("If msg not delivering to customer than make sure he/she updated phonecode in his/her profile.")); ?>

                                            </li>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <form action="<?php echo e(route('sms.update.settings')); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group eyeCy">
                                            <label class="text-dark"><?php echo e(__('MSG91 Auth Key :')); ?><span
                                                    class="text-danger">*</span></label>

                                            <input id="MSG91_AUTH_KEY" type="password" placeholder="enter secret key"
                                                class="form-control" name="MSG91_AUTH_KEY"
                                                value="<?php echo e(env('MSG91_AUTH_KEY')); ?>">
                                            <span toggle="#password-field"
                                                class="fa fa-fw fa-eye field_icon toggle-password"></span>

                                        </div>
                                    </div>

                                </div>

                                <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h4><?php echo e(ucfirst( $row->key)); ?> <?php echo e(__('SMS Settings :')); ?></h4>
                                <hr>

                                <input type="hidden" name="keys[<?php echo e($row->id); ?>]" value="<?php echo e($row->key); ?>">

                                <div class="row">
                                    <?php if($row->key != 'orders'): ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label
                                                class="text-dark"><?php echo e(__('Message Text (MUST WITH PLACEHOLDER ##OTP##)')); ?><span
                                                    class="text-danger">*</span>:</label>
                                            <input placeholder="eg. Your OTP code for login is ##OTP##" type="text"
                                                min="1" max="60" class="form-control"
                                                value="<?php echo e($row->message ? $row->message : ""); ?>"
                                                name="message[<?php echo e($row->id); ?>]">
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('Enter SENDER ID: (Max char length 6)')); ?>

                                                <span class="text-danger">*</span></label>
                                            <input placeholder="eg. SMSIND" maxlength="6" type="text"
                                                class="form-control"
                                                value="<?php echo e($row->sender_id ? $row->sender_id : ""); ?>"
                                                name="sender_id[<?php echo e($row->id); ?>]">
                                        </div>
                                    </div>

                                    <?php if($row->key != 'orders'): ?>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><?php echo e(__('MSG91 OTP Code Expiry (In Minutes) :')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                value="<?php echo e($row->otp_expiry ? $row->otp_expiry : ""); ?>"
                                                name="otp_expiry[<?php echo e($row->id); ?>]">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('MSG91 OTP Code Length (Max:6) :')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" min="4" max="6" class="form-control"
                                                value="<?php echo e($row->otp_length ? $row->otp_length : 4); ?>"
                                                name="otp_length[<?php echo e($row->id); ?>]">
                                        </div>
                                    </div>

                                    <?php endif; ?>

                                    <div class="col-md-4">

                                        <div class="form-group eyeCy">
                                            <label class="text-dark"><?php echo e(__('MSG91 Flow ID :')); ?> <span
                                                    class="text-danger">*</span></label>

                                            <input id="flow_id" type="password" placeholder="enter secret key"
                                                class="form-control" name="flow_id[<?php echo e($row->id); ?>]"
                                                value="<?php echo e($row->flow_id); ?>">
                                            <span toggle="#password-field"
                                                class="fa fa-fw fa-eye field_icon toggle-password1"></span>

                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('Enable emoji in Msg :')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <br>
                                            <label class="switch">
                                                <input id="login_unicode" <?php echo e($row->unicode == 1 ? "checked" : ""); ?>

                                                    type="checkbox" name="unicode[<?php echo e($row->id); ?>]">
                                                <span class="knob"></span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-group">
                                    <label class="text-dark" for=""><?php echo e(__('Enable MSG91')); ?> </label>
                                    <br>
                                    <label class="switch">
                                        <input id="msg91_enable" <?php echo e($configs->msg91_enable == 1 ? "checked" : ""); ?>

                                            type="checkbox" name="msg91_enable">
                                        <span class="knob"></span>
                                    </label>
                                    <br>
                                    <small class="text-muted">
                                        <i class="fa fa-question-circle"></i> Toggle to activate the MSG-91.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i>
                                        <?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba"><i
                                            class="fa fa-check-circle"></i> Save settings</button>
                                </div>
                            </form>
                        </div>

                        <?php if(Module::has('MimSms') && Module::find('MimSms')->isEnabled()): ?>
                        <div style="display: <?php echo e(env('DEFAULT_SMS_CHANNEL') == 'mim' ? 'block' : 'none'); ?>;"
                            id="mimSMSBox">
                            <form action="<?php echo e(route("mim.keys.save")); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('MIM SMS API Key :')); ?> <span
                                            class="text-danger">*</span></label>
                                    <input value="<?php echo e(env("MIM_SMS_API_KEY")); ?>" type="text" class="form-control"
                                        required name="MIM_SMS_API_KEY">
                                </div>

                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('MIM SMS SENDER ID :')); ?> <span
                                            class="text-danger">*</span></label>
                                    <input value="<?php echo e(env("MIM_SMS_SENDER_ID")); ?>" type="text" class="form-control"
                                        required name="MIM_SMS_SENDER_ID">
                                </div>

                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('Enable OTP Confirmation on Login / Register :')); ?>

                                        <span class="text-danger">*</span></label>
                                    <br>
                                    <label class="switch">
                                        <input name="MIM_SMS_OTP_ENABLE" class="MIM_SMS_OTP_ENABLE"
                                            id="MIM_SMS_OTP_ENABLE"
                                            <?php echo e(env("MIM_SMS_OTP_ENABLE") == 1 ? "checked" : ""); ?> type="checkbox">
                                        <span class="knob"></span>
                                    </label>
                                </div>

                                <!-- create and reset button -->
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i>
                                        <?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba"><i
                                            class="fa fa-check-circle"></i> <?php echo e(__('Save settings')); ?></button>
                                </div>

                            </form>
                        </div>
                        <?php endif; ?>

                        <?php if(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled()): ?>
                            <?php echo $__env->make('exabytes::admin.smssettings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                    </div>
                    <!-- main content end -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
    integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
    crossorigin="anonymous"></script>
<script>
    "use Strict";

    $('.msg_channel').on('change', function () {

        var val = $(this).val();

        if (val == 'twillo') {

            $('#twilloBox').show();
            $('#msg91Box').hide();
            $('#mimSMSBox').hide();
            $('#exabytesBox').hide();

        } else if (val == 'msg91') {

            $('#twilloBox').hide();
            $('#msg91Box').show();
            $('#mimSMSBox').hide();
            $('#exabytesBox').hide();

        } else if (val == 'mim') {

            $('#mimSMSBox').show();
            $('#twilloBox').hide();
            $('#msg91Box').hide();
            $('#exabytesBox').hide();

        }
        else if (val == 'exabytes') {

            $('#mimSMSBox').hide();
            $('#twilloBox').hide();
            $('#msg91Box').hide();
            $('#exabytesBox').show();

        }

        axios.post('<?php echo e(route("change.channel")); ?>', {
            channel: val
        }).then(res => {
            console.log(res.data);
        }).catch(err => console.log(err));

    });

    $(".sms_enable").on('change', function () {
        if ($(this).is(":checked")) {
            $('#mainsmsbox').show();
            axios.post('<?php echo e(route("change.channel")); ?>', {
                enable: 1
            }).then(res => {
                console.log(res.data);
            }).catch(err => console.log(err));
        } else {
            $('#mainsmsbox').hide();
            axios.post('<?php echo e(route("change.channel")); ?>', {
                enable: 0
            }).then(res => {
                console.log(res.data);
            }).catch(err => console.log(err));
        }
    });

    $(document).on('click', '.toggle-password', function () {

        $(this).toggleClass("fa-eye fa-eye-slash");

        var input = $("#MSG91_AUTH_KEY");
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');

    });

    $(document).on('click', '.toggle-password1', function () {

        $(this).toggleClass("fa-eye fa-eye-slash");

        var input = $("#flow_id");
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');

    });
</script>
<!-- script to hide and show password eye end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/sms/settings.blade.php ENDPATH**/ ?>