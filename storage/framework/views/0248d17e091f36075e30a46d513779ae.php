

<?php $__env->startSection('content'); ?>
<div class="container">

    
    
    <?php if($post): ?>
        <article class="post-detail">
            
            <h1 class="mb-3"><?php echo e($post->title); ?></h1>

        
            <p class="text-muted mb-4">
                Published by     
                <a href="<?php echo e(route('users.posts.index', $post->user)); ?>">
                    <strong><?php echo e($post->user->name); ?></strong>
                </a>

                <time datetime="<?php echo e($post->created_at->toISOString()); ?>">
                    <?php echo e($post->created_at->format('F d, Y \a\t h:i A')); ?>

                </time>
            </p>


            <div class="post-content mb-5">
                <?php if(isset($post->content_is_html) && $post->content_is_html): ?>
                    <?php echo $post->content; ?> 
                <?php else: ?>
                    <?php echo e($post->content); ?>

                <?php endif; ?>
            </div>

            <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary">← Back to all posts</a>

        </article>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            Post not found.
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\my-laravel-project\resources\views/posts/pages/show.blade.php ENDPATH**/ ?>