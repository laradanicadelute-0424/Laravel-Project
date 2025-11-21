



<?php $__env->startSection('content'); ?>
   <div class="container">
       <div class="grid">
           <form action="<?php echo e(route('posts.update', $post)); ?>" method="POST">
               <?php echo csrf_field(); ?>
               <?php echo method_field('PUT'); ?>
               <div class="mb-3">
                   <label for="formGroupExampleInput" class="form-label">Post Title</label>
                   <input type="text"
                          class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          id="formGroupExampleInput"
                          name="title"
                          value="<?php echo e(old('title', $post->title)); ?>">
                           <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>

               <div class="mb-3">
                   <label for="formGroupExampleInput" class="form-label">Post Content</label>
                   <textarea type="text"
                          class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          id="formGroupExampleInput"
                          name="content">

                          <?php echo e(old('content', $post->content)); ?>

                          
                    </textarea>

                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>

               <div class="mb-3">
                   <button type="submit" class="btn btn-primary">Save</button>
               </div>
           </form>
       </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\my-laravel-project\resources\views/posts/pages/update.blade.php ENDPATH**/ ?>