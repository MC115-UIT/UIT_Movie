@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lí danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($category))
                        {!! Form::open(['route'=>'category.store','method'=>'POST'])!!}
                    @else
                        {!! Form::open(['route'=>['category.update',$category->id],'method'=>'PUT'])!!}
                    @endif
                        <div class="form-group">
                            {!!Form::label('title','Title',['class'=>'my-2'])!!}
                            {!!Form::text('title',isset($category)?$category->title:'',['class'=>'form-control my-2',
                            'placeholder'=>'Nhap vao du lieu...','id'=>'slug','onkeyup'=>'ChangeToSlug()'])!!}                     
                        </div>
                        <div class='form-group'>
                            {!!Form::label('slug','Slug',[])!!}
                            {!!Form::text('slug',isset($category)?$category->slug:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'convert_slug'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('description','Description',[])!!}
                            {!!Form::textarea('description',isset($category)?$category->description:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'description'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('Active','Active',[])!!}
                            {!!Form::select('status',['1'=>"Hien thi", '0'=>'Khong'],isset($category)?$category->status:'',['class'=>'form-control my-2'])!!}        
                        </div>
                    @if(!isset($category))
                        {!!Form::submit('Them du lieu',['class'=>'btn btn-success my-2'])!!}
                    @else
                        {!!Form::submit('Cap nhat',['class'=>'btn btn-success my-2'])!!}
                    @endif
                    {!!Form::close()!!}
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
                <tbody id="sort_position">
                    @foreach($list as $key => $cate)
                    <tr id="{{$cate->id}}">
                        <th scope="row">{{$key}}</th>
                        <td>{{$cate->title}}</td>
                        <td>{{$cate->description}}</td>
                        <td>{{$cate->slug}}</td>
                        <td>
                            @if($cate->status)
                                Hien thi
                            @else
                                Khong hien thi
                            @endif
                        </td>
                        <td class="d-flex">
                            {!!Form::open(['method'=>'DELETE','route'=>['category.destroy',$cate->id],'onsubmit'=>'return confirm("Xoa hay khong xoa")'])!!}
                                {!!Form::submit('Xoa',['class'=>'btn btn-danger'])!!}
                            {!!Form::close()!!}
                            <a href="{{route('category.edit',$cate->id)}}" class="btn btn-warning">Sua</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
