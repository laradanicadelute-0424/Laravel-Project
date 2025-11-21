



<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Posts by: <span class="text-primary"><?php echo e($user->name); ?></span></h2>

    <?php if($posts->count()): ?>
        
        <div class="row">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-8 offset-md-2 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                           
                            <h5 class="card-title d-flex justify-content-between align-items-center">
                                <a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e($post->title); ?></a>
                            </h5>

                            <p class="card-text text-muted">
                                <?php echo e(Str::limit($post->content, 150)); ?>

                            </p>

                            <p class="card-subtitle small text-secondary">
                                Published on: 
                                <?php echo e($post->created_at->format('M d, Y')); ?>

                            </p>

                          <?php if(auth()->guard()->check()): ?>
                                    <?php if(Auth::id() == $post->user_id): ?>

                                        <a href="<?php echo e(route('posts.edit', $post)); ?>" class="btn btn-sm btn-outline-primary me-2" title="Edit Post">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a> 
                                            
                                        <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Post">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    <?php endif; ?>
                        <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <?php echo e($posts->links()); ?>

        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            <?php echo e($user->name); ?> has not published any posts yet.
        </div>
    <?php endif; ?>
    
    <div class="mt-5 text-center">
        <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-outline-secondary">← Back to All Posts</a>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\my-laravel-project\resources\views/posts/pages/user-posts.blade.php ENDPATH**/ ?>