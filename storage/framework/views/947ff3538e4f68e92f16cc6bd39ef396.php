

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Blog Posts</h2>
        
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">Create Post</a>
        <?php endif; ?>
    </div>

    
    <?php if($posts->count()): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                    <th scope="col">Published On</th>
                </tr>
            </thead>
            <tbody>
              
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($posts->firstItem() + $index); ?></th>
                        
                        <td>
                           <!-- <?php echo e($post->title); ?> -->
                            <a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e($post->title); ?></a>
                        </td>
                        
                      
                        <td>
                            <?php echo e(Str::limit($post->content, 100)); ?>

                        </td>
                        
                        <td>
                            <a href="<?php echo e(route('users.posts.index', $post->user)); ?>">
                                <?php echo e($post->user->name); ?>

                            </a>
                        </td>
                        
                     
                        <td>
                            <?php echo e($post->created_at->format('M d, Y')); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            <?php echo e($posts->links()); ?>

        </div>
    <?php else: ?>
        <p class="text-center">No posts found.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\my-laravel-project\resources\views/posts/pages/index.blade.php ENDPATH**/ ?>