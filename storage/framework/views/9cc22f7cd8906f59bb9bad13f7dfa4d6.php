
<?php $__env->startSection('title', 'Đăng nhập'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="h5 mb-0">Đăng nhập</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('auth.postLogin')); ?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                    </form>
                    <p class="text-center mt-3">
                        Chưa có tài khoản? <a href="<?php echo e(route('auth.register')); ?>" class="text-primary">Đăng ký ngay</a> | 
                        <a href="#" class="text-primary">Quên mật khẩu?</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP3\school\Asignment_1_html\resources\views/auth/login.blade.php ENDPATH**/ ?>