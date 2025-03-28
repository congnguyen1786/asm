<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> - Tin Tức 24h</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-sm py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="<?php echo e(route('home.index')); ?>" class="navbar-brand fw-bold text-primary">Tin Tức 24h</a>
            <form action="<?php echo e(route('news.search')); ?>" method="GET" class="d-flex w-50">
                <input type="text" name="q" class="form-control me-2" placeholder="Tìm kiếm..." value="<?php echo e(request()->q); ?>">
                <button type="submit" class="btn btn-outline-primary">Tìm</button>
            </form>
            <div>
    <?php if(Auth::check()): ?>
        <span class="text-primary me-2">Xin chào, <?php echo e(Auth::user()->name); ?></span>
        <a href="<?php echo e(route('auth.logout')); ?>" class="text-danger">Đăng xuất</a>
    <?php else: ?>
        <a href="<?php echo e(route('auth.login')); ?>" class="text-primary me-2">Đăng nhập</a>
        <a href="<?php echo e(route('auth.register')); ?>" class="text-primary me-2">Đăng ký</a>
    <?php endif; ?>
</div>

        </div>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-white" href="<?php echo e(route('home.index')); ?>">Trang chủ</a></li>
                    <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item"><a class="nav-link text-white" href="<?php echo e(route('news.newsCate', $category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-4">
        <div class="row">
            <section class="col-lg-8">
                <?php echo $__env->yieldContent('content'); ?>
            </section>
            <aside class="col-lg-4">
                <div class="bg-light p-3 rounded">
                    <h3 class="h5 text-primary">Tin xem nhiều</h3>
                    <ul class="list-unstyled">
                        <?php $__currentLoopData = \App\Models\News::orderBy('views', 'desc')->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="mb-2">
                                <a href="<?php echo e(route('news.detail', $news->id)); ?>" class="text-dark"><?php echo e($news->title); ?></a>
                                <span class="text-muted">(<?php echo e($news->views); ?> lượt xem)</span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </aside>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">© 2025 Tin Tức 24h. Mọi quyền được bảo lưu.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\php31\Asignment_1_html\Asignment_1_html\resources\views/layouts/app.blade.php ENDPATH**/ ?>