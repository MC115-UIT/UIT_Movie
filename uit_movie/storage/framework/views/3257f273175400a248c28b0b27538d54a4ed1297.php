

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
                        <th scope="col">Description</th>
                       
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Category</th> 
                        <th scope="col">Genre</th> 
                        <th scope="col">Country</th> 
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
                        <td><?php echo e($movie->description); ?></td>
                        <td>
                            <?php if($movie->status): ?>
                                Hien thi
                            <?php else: ?>
                                Khong hien thi
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($movie->category->title); ?></td>
                        <td><?php echo e($movie->genre->title); ?></td>
                        <td><?php echo e($movie->country->title); ?></td>
                        <td class="d-flex">
                            <?php echo Form::open(['method'=>'DELETE','route'=>['movie.destroy',$movie->id],'onsubmit'=>'return confirm("Xoa hay khong xoa")']); ?>

                                <?php echo Form::submit('Xoa',['class'=>'btn btn-danger']); ?>

                            <?php echo Form::close(); ?>

                            <a href="<?php echo e(route('movie.edit',$movie->id)); ?>" class="btn btn-warning ms-2">Sua</a>
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