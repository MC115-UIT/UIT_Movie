

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="<?php echo e(route('movie.create')); ?>" class="btn btn-primary my-3">Thêm phim</a>
            <table class="table table-responesive movie-table" id="movie-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                         <th scope="col">Add Episode</th>
                         <th scope="col">Total Episode</th>
                        <th scope="col">Image</th>
                         <th scope="col">Slug</th>
                        <!-- <th scope="col">Description</th> -->
                       
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Quality</th>
                                                <th scope="col">Hot</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Eposides</th>
                        <th scope="col">Type of Movie</th>
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
                         <td><a href="<?php echo e(route('add-episode',[$movie->id])); ?>" class="btn btn-warning btn-sm">Thêm tập phim</a>
                            <?php $__currentLoopData = $movie->episode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge badge-dark"><a href="" style="color:#fff"><?php echo e($ep->episode); ?></a></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </td>
                         <td><?php echo e($movie->episode_count); ?>/<?php echo e($movie->sotap); ?> Tập</td>
                        <td><img width="20%" src="<?php echo e(asset('uploads/movie/'.$movie->image)); ?>" alt=""></td>
                        <td><?php echo e($movie->slug); ?></td>
                        <!-- <td><?php echo e($movie->description); ?></td> -->
                       
                         <td>
                            <select id="<?php echo e($movie->id); ?>" class="status_select">
                                <?php if($movie->status==0): ?>
                                   <option value="1">Hiển thị</option>
                                   <option selected value="0">Không hiển thị</option>
                                <?php else: ?>
                                    <option selected value="1">Hiển thị</option>
                                   <option  value="0">Không hiển thị</option>
                                <?php endif; ?> 
                            </select>
                        </td>

                        <td>
                           <!--  <?php if($movie->resolution==0): ?>
                                HD
                            <?php elseif($movie->resolution==1): ?>
                                SD
                            <?php elseif($movie->resolution==2): ?>
                                HDCam
                            <?php elseif($movie->resolution==3): ?>
                                Cam
                            <?php elseif($movie->resolution==4): ?>
                                FullHD
                            <?php elseif($movie->resolution==5): ?>
                                Trailer
                            <?php endif; ?> -->
                            <?php
                                $options = array('0'=>'HD','1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD','5'=>'Trailer')
                            ?>
                            <select id="<?php echo e($movie->id); ?>" class="resolution-select">
                                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($movie->resolution==$key ? 'selected' : ''); ?> value="<?php echo e($key); ?>" ><?php echo e($res); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                        <td>
                            <select id="<?php echo e($movie->id); ?>" class="phimhot_select">
                                <?php if($movie->hot==0): ?>
                                   <option value="1">Hot</option>
                                   <option selected value="0">Không</option>
                                <?php else: ?>
                                    <option selected value="1">Hot</option>
                                   <option  value="0">Không</option>
                                <?php endif; ?> 
                            </select>
                        </td>
                         
                        <td>
                            <select id="<?php echo e($movie->id); ?>" class="sub_select">
                                <?php if($movie->subtitle==0): ?>
                                   <option value="1">Phụ đề</option>
                                   <option selected value="0">Thuyết minh</option>
                                <?php else: ?>
                                    <option selected value="1">Phụ đề</option>
                                   <option  value="0">Thuyết minh</option>
                                <?php endif; ?> 
                            </select>
                        </td>
                           
                        
                         <td><?php echo e($movie->sotap); ?></td>
                         <td>
                            <?php if($movie->thuocphim=='phimle'): ?>
                                Phim lẻ 1 tập
                            <?php else: ?>
                                Phim nhiều tập
                            <?php endif; ?>
                         </td>

                        <td>
                            <!-- <?php echo e($movie->category->title); ?> -->

                            <?php echo Form::select('category_id',$category,isset($movie)?$movie->category_id:'',['class'=>'form-control my-2 category_select','id'=>$movie->id]); ?>     
                        </td>
                        <!-- <td><?php echo e($movie->genre->title); ?></td> -->
                        <td>
                        <?php $__currentLoopData = $movie->movie_genre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <span class="badge bg-dark"><?php echo e($gen->title); ?></span>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                             <?php echo Form::select('country_id',$country,isset($movie)?$movie->country_id:'',['class'=>'form-control my-2 country_select','id'=>$movie->id]); ?>    
                        </td>
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