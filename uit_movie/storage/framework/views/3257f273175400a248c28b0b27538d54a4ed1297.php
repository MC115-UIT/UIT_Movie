

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="<?php echo e(route('movie.create')); ?>" class="btn btn-primary my-3">Thêm phim</a>
            <table class="table movie-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                         <th scope="col">Slug</th>
                        <!-- <th scope="col">Description</th> -->
                       
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Quality</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Category</th> 
                        <th scope="col">Genre</th> 
                        <th scope="col">Country</th> 
                        <th scope="col">DateCreate</th> 
                        <th scope="col">DateUpdate</th> 

                        <th scope="col">Manage</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($key); ?></th>
                        <td><?php echo e($movie->title); ?></td>
                        <td><img width="20%" src="<?php echo e(asset('uploads/movie/'.$movie->image)); ?>" alt=""></td>
                        <td><?php echo e($movie->slug); ?></td>
                        <!-- <td><?php echo e($movie->description); ?></td> -->
                        <td>
                            <?php if($movie->status): ?>
                                Hiển thị
                            <?php else: ?>
                                Không hiển thị
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if($movie->resolution==0): ?>
                                HD
                            <?php elseif($movie->resolution==1): ?>
                                SD
                            <?php elseif($movie->resolution==2): ?>
                                HDCam
                            <?php elseif($movie->resolution==3): ?>
                                Cam
                            <?php elseif($movie->resolution==4): ?>
                                FullHD
                            <?php endif; ?>
                        </td>
                         <td>
                            <?php if($movie->subtitle==0): ?>
                                Thuyết minh
                            <?php else: ?>
                                Phụ đề
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($movie->category->title); ?></td>
                        <td><?php echo e($movie->genre->title); ?></td>
                        <td><?php echo e($movie->country->title); ?></td>
                        <td><?php echo e($movie->date_create); ?></td>
                        <td><?php echo e($movie->date_update); ?></td>

                        <td class="d-flex">
                            <?php echo Form::open(['method'=>'DELETE','route'=>['movie.destroy',$movie->id],'onsubmit'=>'return confirm("Xóa hay không xóa")']); ?>

                                <?php echo Form::submit('Xóa',['class'=>'btn btn-danger']); ?>

                            <?php echo Form::close(); ?>

                            <a href="<?php echo e(route('movie.edit',$movie->id)); ?>" class="btn btn-warning ms-2">Sửa</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\UIT_movie\uit_movie\resources\views/admincp/movie/index.blade.php ENDPATH**/ ?>