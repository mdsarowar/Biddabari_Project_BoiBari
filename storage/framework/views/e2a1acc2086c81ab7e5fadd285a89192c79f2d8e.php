<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(__('500 | Server Error')); ?></title>
     <!-- Bootstrap core CSS -->
  <link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" crossorigin="anonymous">
    <style>
        .authenticate-bg {
            background: url('<?php echo e(url('images/authentication-bg.svg')); ?>');
            background-size: contain;
            background-position: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>

<div id="containerbar" class="containerbar authenticate-bg">
    <!-- Start Container -->
    <div class="container">
        
        <div class="p-5 auth-box error-box">
            <!-- Start row -->
             <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-8 col-lg-6">
                    <div class="text-center">
                        <img src="<?php echo e(url('/images/internal-server.svg')); ?>" class="img-fluid error-image" alt="500">
                        <br><br>
                        <h4 class="error-subtitle mb-4">500 | Internal Server Error</h4>
                        <p class="mb-4">The server encountered an internal error or misconfiguration and was unable to complete your request.</p> 
                        <div class="form-group">
                            
                            <label>Error Log:</label>
                            <textarea rows="3" cols="10" class="bg-danger text-white form-control"><?php echo e($exception->getMessage()); ?></textarea>                           

                        </div>
                        <a href="<?php echo e(url('/')); ?>" class="btn btn-primary font-16"><i class="feather icon-home mr-2"></i> Go back to Dashboard</a>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Container -->
</div>    
</body>
</html><?php /**PATH D:\xampp\htdocs\boibari\resources\views/errors/500.blade.php ENDPATH**/ ?>