 
 <?php $__env->startSection('content'); ?>
 <!-- LATEST MOVIES SECTION -->
        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="section pt-5">
            <div class="container">
                <div class="section-header">
                    <?php echo e($cate->title); ?>

                </div>
                <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
            <?php if($cate->slug=='phim-le'): ?>
                <?php $__currentLoopData = $movie_le; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key3 =>$movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('movie',$movie->slug)); ?>" class="movie-item">
                    <img src="<?php echo e(asset('uploads/movie/'.$movie->image)); ?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                           <?php echo e($movie->title); ?>

                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo e($movie->imdb_point); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo e($movie->runtime); ?> mins</span>
                            </div>
                            <div class="movie-info">
                            <?php if($movie->resolution==0): ?>
                                <span>HD</span>
                            <?php elseif($movie->resolution==1): ?>
                                <span>SD</span>
                            <?php elseif($movie->resolution==2): ?>
                                <span>HDCam</span>
                            <?php elseif($movie->resolution==3): ?>
                                <span>Cam</span>
                            <?php elseif($movie->resolution==4): ?>
                                <span>FullHD</span>
                            <?php elseif($movie->resolution==5): ?>
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
                <?php $__currentLoopData = $movie_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 =>$movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php if($movie->category_id==$cate->id): ?> 
                    <a href="<?php echo e(route('movie',$movie->slug)); ?>" class="movie-item">
                    <img src="<?php echo e(asset('uploads/movie/'.$movie->image)); ?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                           <?php echo e($movie->title); ?>

                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo e($movie->imdb_point); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo e($movie->runtime); ?> mins</span>
                            </div>
                            <div class="movie-info">
                            <?php if($movie->resolution==0): ?>
                                <span>HD</span>
                            <?php elseif($movie->resolution==1): ?>
                                <span>SD</span>
                            <?php elseif($movie->resolution==2): ?>
                                <span>HDCam</span>
                            <?php elseif($movie->resolution==3): ?>
                                <span>Cam</span>
                            <?php elseif($movie->resolution==4): ?>
                                <span>FullHD</span>
                            <?php elseif($movie->resolution==5): ?>
                                <span>Trailer</span>
                            <?php endif; ?>
                            </div>
                            <div class="movie-info">
                                <span>16+</span>
                            </div>
                        </div>
                    </div>
                </a>
                    
                <?php endif; ?>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            
                   <!-- END MOVIE ITEM -->
                </div>
            </div>
        </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
       
 
    
    
    <!-- END LATEST MOVIES SECTION -->

   
    <!-- END SPECIAL MOVIE SECTION -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('./layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\UIT_movie\uit_movie\resources\views/pages/home.blade.php ENDPATH**/ ?>