@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lí thể loại</div>
                 @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}<li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($genre))
                        {!! Form::open(['route'=>'genre.store','method'=>'POST'])!!}
                    @else
                        {!! Form::open(['route'=>['genre.update',$genre->id],'method'=>'PUT'])!!}
                    @endif
                        <div class="form-group">
                            {!!Form::label('title','Title',['class'=>'my-2'])!!}
                            {!!Form::text('title',isset($genre)?$genre->title:'',['class'=>'form-control my-2',
                            'placeholder'=>'Nhap vao du lieu...','id'=>'slug','onkeyup'=>'ChangeToSlug()'])!!}                     
                        </div>
                        <div class='form-group'>
                            {!!Form::label('slug','Slug',[])!!}
                            {!!Form::text('slug',isset($category)?$category->slug:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'convert_slug'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('description','Description',[])!!}
                            {!!Form::textarea('description',isset($genre)?$genre->description:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'description'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('Active','Active',[])!!}
                            {!!Form::select('status',['1'=>"Hiển thị", '0'=>'Không'],isset($genre)?$genre->status:'',['class'=>'form-control my-2'])!!}        
                        </div>
                    @if(!isset($genre))
                        {!!Form::submit('Thêm dữ liệu',['class'=>'btn btn-success my-2'])!!}
                    @else
                        {!!Form::submit('Cập nhật',['class'=>'btn btn-success my-2'])!!}
                    @endif
                    {!!Form::close()!!}
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection
