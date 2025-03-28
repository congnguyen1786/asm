<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> - Tin Tức Việt Nam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <!-- Header -->
    <header class="bg-light border-bottom py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <a href="<?php echo e(route('home.index')); ?>" class="navbar-brand fw-bold text-primary">Tin Tức Việt Nam</a>
                </div>
                <div class="col-md-6">
                    <form action="<?php echo e(route('news.search')); ?>" method="GET" class="d-flex">
                        <input type="text" name="q" class="form-control me-2" placeholder="Tìm kiếm tin tức..." value="<?php echo e(request()->q); ?>">
                        <button type="submit" class="btn btn-primary">Tìm</button>
                    </form>
                </div>
                <div class="col-md-3 text-end">
                    <a href="<?php echo e(route('auth.login')); ?>" class="text-primary">Đăng nhập</a> | 
                    <a href="<?php echo e(route('auth.register')); ?>" class="text-primary">Đăng ký</a> | 
                    <a href="<?php echo e(route('auth.logout')); ?>" class="text-primary">Đăng xuất</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Chuyển đổi menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home.index')); ?>">Trang chủ</a></li>
                    <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('news.newsCate', $category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung chính -->
    <div class="container my-4">
        <div class="row">
            <article class="col-lg-8">
                <?php echo $__env->yieldContent('content'); ?>
            </article>
            <aside class="col-lg-4 bg-light p-3 rounded">
                <h3 class="h5 text-primary mb-3">Tin xem nhiều</h3>
                <ul class="list-unstyled">
                    <?php $__currentLoopData = \App\Models\News::orderBy('views', 'desc')->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="mb-2"><a href="<?php echo e(route('news.detail', $news->id)); ?>" class="text-dark"><?php echo e($news->title); ?></a> (<?php echo e($news->views); ?> lượt xem)</li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </aside>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>© 2025 Tin Tức Việt Nam. Mọi quyền được bảo lưu.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\PHP3\school\Asignment_1_html\resources\views/layouts/app.blade.php ENDPATH**/ ?>