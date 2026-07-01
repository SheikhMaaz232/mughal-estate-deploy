<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('description', 'Login to your account'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/oneui.min.css')); ?>">
<?php $__env->stopPush(); ?>


<div id="page-container">
    <main id="main-container">
        <?php
        $photoUrl = asset('/media/photos/photo28@2x.jpg');
    ?>

    <div class="bg-image" style="background-image: url('<?php echo e($photoUrl); ?>');">            <div class="row g-0 bg-primary-dark-op">

          
          <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
            <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
              <div class="w-100">
                <a class="link-fx fw-semibold fs-2 text-white" href="<?php echo e(url('/')); ?>">
                  Icon Villas
                </a>
                <p class="text-white-75 me-xl-8 mt-2">
                  Welcome to Icon Villas Accounting and Financial System.
                </p>
              </div>
            </div>
            
          </div>
          

          
          <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-extra-light">
            <div class="p-3 w-100 d-lg-none text-center">
              <a class="link-fx fw-semibold fs-3 text-dark" href="<?php echo e(url('/')); ?>">
                OneUI
              </a>
            </div>

            <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
              <div class="w-100">
                
                <div class="text-center mb-5">
                    <img src="<?php echo e(asset('media/photos/icon-villas-logo.png')); ?>" alt="Villas Logo" style="height: 50px;">

                  
                  <h1 class="fw-bold mb-2">Sign In</h1>
                  
                </div>
                

                
                <div class="row g-0 justify-content-center">
                  <div class="col-sm-8 col-xl-4">
                    <form class="js-validation-signin" action="<?php echo e(route('login')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      
                      <div class="mb-4">
                        <input type="text" name="email" class="form-control form-control-lg form-control-alt py-3" placeholder="Email" value="<?php echo e(old('email')); ?>" required autofocus>
                      </div>

                      
                      <div class="mb-4">
                        <input type="password" name="password" class="form-control form-control-lg form-control-alt py-3" placeholder="Password" required>
                      </div>

                      
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                          <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block mb-1" href="<?php echo e(route('password.request')); ?>">
                            Forgot Password?
                          </a>
                        </div>
                        <div>
                          <button type="submit" class="btn btn-lg btn-alt-primary">
                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Sign In
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                
              </div>
            </div>

            
            
          
        </div>
      </div>
    </main>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/lib/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/op_auth_signin.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/oneui.app.min.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof One !== 'undefined') {
                One.helpers('core-browser');
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mughal-for-deploy\resources\views/auth/login.blade.php ENDPATH**/ ?>