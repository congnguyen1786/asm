
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(isset($query)): ?>
        <h1 class="h4 text-primary mb-3">Kết quả tìm kiếm: "<?php echo e($query); ?>"</h1>
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
                                <small class="text-muted"><?php echo e($item->created_at->diffForHumans()); ?> | <?php echo e($item->views); ?> lượt xem</small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php else: ?>
        <!-- Tin nổi bật -->
        <section class="mb-4">
            <h1 class="h4 text-primary mb-3">Tin nổi bật</h1>
            <div class="row">
                <?php $__currentLoopData = $featuredNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($index == 0): ?>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <img src="<?php echo e($news->image); ?>" class="card-img-top" alt="Tin nổi bật">
                                <div class="card-body">
                                    <h2 class="card-title h5"><a href="<?php echo e(route('news.detail', $news->id)); ?>" class="text-dark text-decoration-none"><?php echo e($news->title); ?></a></h2>
                                    <p class="card-text text-muted"><?php echo e($news->description); ?></p>
                                    <small class="text-muted"><?php echo e($news->created_at->diffForHumans()); ?> | <?php echo e($news->views); ?> lượt xem</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                    <?php else: ?>
                                <li class="mb-3">
                                    <h2 class="h6"><a href="<?php echo e(route('news.detail', $news->id)); ?>" class="text-dark text-decoration-none"><?php echo e($news->title); ?></a></h2>
                                    <small class="text-muted"><?php echo e($news->created_at->diffForHumans()); ?> | <?php echo e($news->views); ?> lượt xem</small>
                                </li>
                    <?php endif; ?>
                    <?php if($index == 2): ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <!-- Tin mới nhất -->
        <section>
            <h1 class="h4 text-primary mb-3">Tin mới nhất</h1>
            <div class="row">
                <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="<?php echo e($news->image); ?>" class="card-img-top" alt="Tin mới">
                            <div class="card-body">
                                <h2 class="card-title h6"><a href="<?php echo e(route('news.detail', $news->id)); ?>" class="text-dark text-decoration-none"><?php echo e($news->title); ?></a></h2>
                                <small class="text-muted"><?php echo e($news->created_at->diffForHumans()); ?> | <?php echo e($news->views); ?> lượt xem</small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP3\school\Asignment_1_html\resources\views/home.blade.php ENDPATH**/ ?>