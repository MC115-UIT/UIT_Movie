

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lí quốc gia</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(!isset($country)): ?>
                        <?php echo Form::open(['route'=>'country.store','method'=>'POST']); ?>

                    <?php else: ?>
                        <?php echo Form::open(['route'=>['country.update',$country->id],'method'=>'PUT']); ?>

                    <?php endif; ?>
                        <div class="form-group">
                            <?php echo Form::label('title','Title',['class'=>'my-2']); ?>

                            <?php echo Form::text('title',isset($country)?$country->title:'',['class'=>'form-control my-2',
                            'placeholder'=>'Nhap vao du lieu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']); ?>                     
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('slug','Slug',[]); ?>

                            <?php echo Form::text('slug',isset($category)?$category->slug:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'convert_slug']); ?>        
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('description','Description',[]); ?>

                            <?php echo Form::textarea('description',isset($country)?$country->description:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'description']); ?>        
                        </div>
                        <div class='form-group'>
                            <?php echo Form::label('Active','Active',[]); ?>

                            <?php echo Form::select('status',['1'=>"Hiển thị", '0'=>'Không'],isset($country)?$country->status:'',['class'=>'form-control my-2']); ?>        
                        </div>
                    <?php if(!isset($country)): ?>
                        <?php echo Form::submit('Thêm dữ liệu',['class'=>'btn btn-success my-2']); ?>

                    <?php else: ?>
                        <?php echo Form::submit('Cập nhật',['class'=>'btn btn-success my-2']); ?>

                    <?php endif; ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($key); ?></th>
                        <td><?php echo e($cate->title); ?></td>
                        <td><?php echo e($cate->description); ?></td>
                        <td><?php echo e($cate->slug); ?></td>
                        <td>
                            <?php if($cate->status): ?>
                                Hiển thị
                            <?php else: ?>
                                Không hiển thị
                            <?php endif; ?>
                        </td>
                        <td class="d-flex">
                            <?php echo Form::open(['method'=>'DELETE','route'=>['country.destroy',$cate->id],'onsubmit'=>'return confirm("Xóa hay không xóa")']); ?>

                                <?php echo Form::submit('Xóa',['class'=>'btn btn-danger']); ?>

                            <?php echo Form::close(); ?>

                            <a href="<?php echo e(route('country.edit',$cate->id)); ?>" class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\UIT_movie\uit_movie\resources\views/admincp/country/form.blade.php ENDPATH**/ ?>