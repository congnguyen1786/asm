
<?php $__env->startSection('title', ucfirst($category)); ?>
<?php $__env->startSection('content'); ?>
    <h1 class="h4 text-primary mb-3"><?php echo e(ucfirst($category)); ?></h1>
    <?php if(request()->has('q')): ?>
        <h2 class="h5 mb-3">Kết quả tìm kiếm: "<?php echo e(request()->q); ?>"</h2>
        <?php if($news->isEmpty()): ?>
            <p class="text-muted">Không tìm thấy kết quả nào.</p>
        <?php else: ?>
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo e($item->image); ?>" class="img-fluid rounded-start" alt="Tin tức">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title h5"><a href="<?php echo e(route('news.detail', $item->id)); ?>" class="text-dark text-decoration-none"><?php echo e($item->title); ?></a></h2>
                                <p class="card-text text-muted"><?php echo e($item->description); ?></p>
                                <small class="text-muted">Ngày đăng: <?php echo e($item->created_at->format('d/m/Y')); ?> | <?php echo e($item->views); ?> lượt xem</small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php else: ?>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($index == 0): ?>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <img src="<?php echo e($item->image); ?>" class="card-img-top" alt="Tin tức">
                            <div class="card-body">
                                <h2 class="card-title h5"><a href="<?php echo e(route('news.detail', $item->id)); ?>" class="text-dark text-decoration-none"><?php echo e($item->title); ?></a></h2>
                                <p class="card-text text-muted"><?php echo e($item->description); ?></p>
                                <small class="text-muted">Ngày đăng: <?php echo e($item->created_at->format('d/m/Y')); ?> | <?php echo e($item->views); ?> lượt xem</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                <?php else: ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?php echo e($item->image); ?>" class="img-fluid rounded-start" alt="Tin tức">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title h6"><a href="<?php echo e(route('news.detail', $item->id)); ?>" class="text-dark text-decoration-none"><?php echo e($item->title); ?></a></h2>
                                    <small class="text-muted">Ngày đăng: <?php echo e($item->created_at->format('d/m/Y')); ?> | <?php echo e($item->views); ?> lượt xem</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-muted">Chưa có tin nào trong danh mục này.</p>
            <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\php31\Asignment_1_html\Asignment_1_html\resources\views/news/category.blade.php ENDPATH**/ ?>