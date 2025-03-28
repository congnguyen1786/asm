
<?php $__env->startSection('title', $news->title); ?>
<?php $__env->startSection('content'); ?>
    <article class="card shadow-sm">
        <img src="<?php echo e($news->image); ?>" class="card-img-top" alt="Tin tức">
        <div class="card-body">
            <h1 class="card-title h2 mb-3"><?php echo e($news->title); ?></h1>
            <p class="text-muted mb-3">Ngày đăng: <?php echo e($news->created_at->format('d/m/Y')); ?> | <?php echo e($news->views); ?> lượt xem</p>
            <div class="content mb-4">
                <?php echo $news->content; ?>

            </div>
        </div>
        <div class="card-footer">
            <h3 class="h4 text-primary mb-3">Bình luận</h3>
            <div class="mb-3">
                <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <strong><?php echo e($comment->user->name); ?></strong> <small class="text-muted">(<?php echo e($comment->created_at->diffForHumans()); ?>)</small>
                            <p><?php echo e($comment->content); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted">Chưa có bình luận nào.</p>
                <?php endif; ?>
            </div>
            <form action="<?php echo e(route('news.comment.store', $news->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <textarea class="form-control" name="content" placeholder="Viết bình luận..." rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>

        </div>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\php31\Asignment_1_html\Asignment_1_html\resources\views/news/detail.blade.php ENDPATH**/ ?>