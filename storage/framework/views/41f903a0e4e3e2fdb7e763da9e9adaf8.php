
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(isset($query)): ?>
        <h1 class="h4 text-warning mb-4">Kết quả tìm kiếm cho: "<?php echo e($query); ?>"</h1>
        <?php if($news->isEmpty()): ?>
            <div class="alert alert-info">Không tìm thấy kết quả nào. Vui lòng thử lại với từ khóa khác.</div>
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <?php if($item->image): ?>
                                        <img src="<?php echo e($item->image); ?>" class="img-fluid rounded-start" alt="<?php echo e($item->title); ?>" loading="lazy">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/no-image.jpg')); ?>" class="img-fluid rounded-start" alt="Không có hình ảnh">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h3 class="card-title h5">
                                            <a href="<?php echo e(route('news.detail', $item->id)); ?>" class="text-dark text-decoration-none">
                                                <?php echo e($item->title); ?>

                                            </a>
                                        </h3>
                                        <p class="card-text text-muted"><?php echo e(\Str::limit($item->description, 120)); ?></p>
                                        <small class="text-muted">
                                            <?php echo e($item->created_at->diffForHumans()); ?> | <?php echo e($item->views); ?> lượt xem
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <!-- Featured News -->
        <section class="mb-5">
            <h2 class="h4 text-primary mb-4">Tin nổi bật</h2>
            <div class="row">
                <?php $__currentLoopData = $featuredNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <?php if($news->image): ?>
                                <img src="<?php echo e($news->image); ?>" class="card-img-top" alt="<?php echo e($news->title); ?>" loading="lazy">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/no-image.jpg')); ?>" class="card-img-top" alt="Không có hình ảnh">
                            <?php endif; ?>
                            <div class="card-body">
                                <h3 class="card-title h5">
                                    <a href="<?php echo e(route('news.detail', $news->id)); ?>" class="text-dark text-decoration-none">
                                        <?php echo e($news->title); ?>

                                    </a>
                                </h3>
                                <p class="card-text text-muted"><?php echo e(\Str::limit($news->description, 100)); ?></p>
                                <small class="text-muted">
                                    <?php echo e($news->created_at->diffForHumans()); ?> | <?php echo e($news->views); ?> lượt xem
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <!-- Latest News -->
      <section>
    <h2 class="h4 text-primary mb-4">Tin mới nhất</h2>
    <div class="row">
        <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card shadow-sm border-0 hover-shadow">
                    <a href="<?php echo e(route('news.detail', $news->id)); ?>" class="text-decoration-none">
                        <img src="<?php echo e($news->image ?: asset('images/default-news.jpg')); ?>" 
                             class="card-img-top rounded-top" 
                             alt="<?php echo e($news->title); ?>" 
                             loading="lazy">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title h6">
                            <a href="<?php echo e(route('news.detail', $news->id)); ?>" class="text-dark text-decoration-none">
                                <?php echo e(Str::limit($news->title, 60)); ?>

                            </a>
                        </h4>
                        <small class="text-muted d-block">
                            <?php echo e($news->created_at->diffForHumans()); ?> | <?php echo e(number_format($news->views)); ?> lượt xem
                        </small>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\php31\Asignment_1_html\Asignment_1_html\resources\views/home.blade.php ENDPATH**/ ?>