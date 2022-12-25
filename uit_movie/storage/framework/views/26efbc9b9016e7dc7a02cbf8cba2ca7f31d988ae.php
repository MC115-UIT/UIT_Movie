

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="<?php echo e(route('movie.index')); ?>" class="btn btn-primary">Liệt kê phim</a>
                <div class="card-header">Quản lí Phim</div>
                 <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?><li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="d-flex justify-content-between col-6 my-2 ms-2 align-items-center" style="display: flex ;background-color: white; justify-content: between;">
                                    <input type="text" name="" id="add-movie-input" title="Thêm nhanh" placeholder="Nhập tmdb ID">
                                    <div class="select" style=" height : 100%">
                                         <select id="select_api" >
                                            <option selected="" value="movie">Phim lẻ</option>
                                            <option value="show">Phim dài tập/Show</option>                            
                                        </select>
                                    </div>
                                    <button id="add-movie" class="btn btn-primary">Thêm nhanh thông tin phim</button>
                </div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(!isset($movie)): ?>
                        <?php echo Form::open(['route'=>'movie.store','method'=>'POST','enctype'=>'multipart/form-data']); ?>

                    <?php else: ?>
                        <?php echo Form::open(['route'=>['movie.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data']); ?>

                    <?php endif; ?>
                        <div class="form-group">
                            <?php echo Form::label('title','Title',['class'=>'my-2']); ?>

                            <?php echo Form::text('title',isset($movie)?$movie->title:'',['class'=>'form-control my-2',
                            'placeholder'=>'Nhap vao du lieu...','id'=>'slug','onkeyup'=>'ChangeToSlug()','onchange'=>'ChangeToSlug()']); ?>                     
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('slug','Slug',[]); ?>

                            <?php echo Form::text('slug',isset($movie)?$movie->slug:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'convert_slug']); ?>        
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('description','Description',[]); ?>

                            <?php echo Form::textarea('description',isset($movie)?$movie->description:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'description']); ?>        
                        </div>


                          <div class='form-group'>
                            <?php echo Form::label('sotap','Eposides',[]); ?>

                            <?php echo Form::text('sotap',isset($movie)?$movie->sotap:'',['style'=>'resize:none','class'=>'form-control my-2']); ?>        
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('thuocphim','Type of Movie',[]); ?>

                            <?php echo Form::select('thuocphim',['phimle'=>'Phim lẻ 1 tập','phimbo'=>'Phim nhiều tập'],isset($movie)?$movie->thuocphim:'',['style'=>'resize:none','class'=>'form-control my-2']); ?>        
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('time','Time',[]); ?>

                            <?php echo Form::text('runtime',isset($movie)?$movie->runtime:'',['style'=>'resize:none','class'=>'form-control my-2','id'=>'time-movie']); ?>        
                        </div>
                         <div class='form-group'>
                            <?php echo Form::label('point','Point',[]); ?>

                            <?php echo Form::text('imdb_point',isset($movie)?$movie->imdb_point:'',['style'=>'resize:none','class'=>'form-control my-2','id'=>'imdb-point']); ?>        
                        </div>
                         <div class='form-group'>
                            <?php echo Form::label('date_release','Date_release',[]); ?>

                            <?php echo Form::date('date_release',isset($movie)?$movie->date_release:'',['style'=>'resize:none','class'=>'form-control my-2','id'=>'date-release']); ?>        
                        </div>
                         <div class='form-group'>
                            <?php echo Form::label('tmdbID','tmdbID',[]); ?>

                            <?php echo Form::text('tmdb_id',isset($movie)?$movie->tmdb_id:'',['style'=>'resize:none','class'=>'form-control my-2','id'=>'tmdb-id']); ?>        
                        </div>


                        <div class='form-group'>
                            <?php echo Form::label('Active','Active',[]); ?>

                            <?php echo Form::select('status',['1'=>"Hiển thị", '0'=>'Không'],isset($movie)?$movie->status:'',['class'=>'form-control my-2']); ?>        
                        </div>
                         <div class='form-group'>
                            <?php echo Form::label('Hot','Hot',[]); ?>

                            <?php echo Form::select('hot',['1'=>"Phim hot", '0'=>'Không'],isset($movie)?$movie->hot:'',['class'=>'form-control my-2']); ?>        
                        </div>

                         <div class='form-group'>
                            <?php echo Form::label('resolution','Quality',[]); ?>

                            <?php echo Form::select('resolution',['0'=>"HD", '1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD','5'=>'Trailer'],isset($movie)?$movie->resolution:'',['class'=>'form-control my-2']); ?>        
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('subtitle','Subtitle',[]); ?>

                            <?php echo Form::select('subtitle',['0'=>"Thuyết Minh", '1'=>'Phụ đề'],isset($movie)?$movie->subtitle:'',['class'=>'form-control my-2']); ?>        
                        </div>

                        <div class='form-group'>
                            <?php echo Form::label('Category','Category',[]); ?>

                            <?php echo Form::select('category_id',$category,isset($movie)?$movie->category_id:'',['class'=>'form-control my-2']); ?>        
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('Genre','Genre',[]); ?><br>
                            <!-- <?php echo Form::select('genre_id',$genre,isset($movie)?$movie->genre_id:'',['class'=>'form-control my-2']); ?> -->
                            <?php $__currentLoopData = $list_genre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($movie)): ?>
                                       <?php echo Form::checkbox('genre[]',$gen->id,  isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false); ?>

                                <?php else: ?>
                                    <?php echo Form::checkbox('genre[]',$gen->id,  ); ?>

                                <?php endif; ?>
                                
                                <?php echo Form::label('genre',$gen->title); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('Country','Country',[]); ?>

                            <?php echo Form::select('country_id',$country,isset($movie)?$movie->country_id:'',['class'=>'form-control my-2']); ?>        
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('Image','Image',[]); ?>

                            <?php echo Form::file('image',['class'=>'form-control-file my-2']); ?>  
                            <?php if(isset($movie)): ?>
                                 <img width="10%" src="<?php echo e(asset('uploads/movie/'.$movie->image)); ?>" alt="">
                            <?php endif; ?>
                            <a href="" id="add-poster" download target="_blank" rel="noopener noreferrer">Tải nhanh poster phim!</a>
                        </div>
                    <?php if(!isset($movie)): ?>
                        <?php echo Form::submit('Thêm dữ liệu',['class'=>'btn btn-success my-2']); ?>

                    <?php else: ?>
                        <?php echo Form::submit('Cập nhật',['class'=>'btn btn-success my-2']); ?>

                    <?php endif; ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\UIT_movie\uit_movie\resources\views/admincp/movie/form.blade.php ENDPATH**/ ?>