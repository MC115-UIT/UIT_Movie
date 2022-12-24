 
 <?php $__env->startSection('content'); ?>
 <!-- LATEST MOVIES SECTION -->
    <div class="section ms-2 pt-3" >
        <div class="container-fluid">
            <div class="section-header ms-2">
                <?php echo e($cate_slug->title); ?>

            </div>
            <div class=" movie-cards justify-content-between align-items-center ps-2 mb-auto">
                <!-- MOVIE ITEM -->
                
                <?php if($slug_check=='phim-le'): ?>
                    <?php $__currentLoopData = $phimle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('movie',$mov->slug)); ?>" class="movie-item movie-card">
                    <img src="<?php echo e(asset('uploads/movie/'.$mov->image)); ?>" alt="">
                    <div class="movie-content">
                        <div class="movie-item-title">
                            <?php echo e($mov->title); ?>

                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo e($mov->imdb_point); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo e($mov->runtime); ?> mins</span>
                            </div>
                            <div class="movie-info">
                            <?php if($mov->resolution==0): ?>
                                <span>HD</span>
                            <?php elseif($mov->resolution==1): ?>
                                <span>SD</span>
                            <?php elseif($mov->resolution==2): ?>
                                <span>HDCam</span>
                            <?php elseif($mov->resolution==3): ?>
                                <span>Cam</span>
                            <?php elseif($mov->resolution==4): ?>
                                <span>FullHD</span>
                            <?php elseif($mov->resolution==5): ?>
                                <span>Trailer</span>
                            <?php endif; ?>
                                
                            </div>
                            <div class="movie-info">
                                <span>16+</span>
                            </div>
                        </div>
                    </div>
                </a>
               
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php elseif($slug_check=='phim-bo'): ?>
                     <?php $__currentLoopData = $phimbo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('movie',$mov->slug)); ?>" class="movie-item movie-card">
                    <img src="<?php echo e(asset('uploads/movie/'.$mov->image)); ?>" alt="">
                    <div class="movie-content">
                        <div class="movie-item-title">
                            <?php echo e($mov->title); ?>

                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo e($mov->imdb_point); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo e($mov->runtime); ?> mins</span>
                            </div>
                            <div class="movie-info">
                            <?php if($mov->resolution==0): ?>
                                <span>HD</span>
                            <?php elseif($mov->resolution==1): ?>
                                <span>SD</span>
                            <?php elseif($mov->resolution==2): ?>
                                <span>HDCam</span>
                            <?php elseif($mov->resolution==3): ?>
                                <span>Cam</span>
                            <?php elseif($mov->resolution==4): ?>
                                <span>FullHD</span>
                            <?php elseif($mov->resolution==5): ?>
                                <span>Trailer</span>
                            <?php endif; ?>
                                
                            </div>
                            <div class="movie-info">
                                <span>16+</span>
                            </div>
                        </div>
                    </div>
                </a>
               
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                     <?php $__currentLoopData = $movie_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('movie',$mov->slug)); ?>" class="movie-item movie-card">
                    <img src="<?php echo e(asset('uploads/movie/'.$mov->image)); ?>" alt="">
                    <div class="movie-content">
                        <div class="movie-item-title">
                            <?php echo e($mov->title); ?>

                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo e($mov->imdb_point); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo e($mov->runtime); ?> mins</span>
                            </div>
                            <div class="movie-info">
                            <?php if($mov->resolution==0): ?>
                                <span>HD</span>
                            <?php elseif($mov->resolution==1): ?>
                                <span>SD</span>
                            <?php elseif($mov->resolution==2): ?>
                                <span>HDCam</span>
                            <?php elseif($mov->resolution==3): ?>
                                <span>Cam</span>
                            <?php elseif($mov->resolution==4): ?>
                                <span>FullHD</span>
                            <?php elseif($mov->resolution==5): ?>
                                <span>Trailer</span>
                            <?php endif; ?>
                                
                            </div>
                            <div class="movie-info">
                                <span>16+</span>
                            </div>
                        </div>
                    </div>
                </a>
               
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                  
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('./layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\UIT_movie\uit_movie\resources\views/pages/category.blade.php ENDPATH**/ ?>