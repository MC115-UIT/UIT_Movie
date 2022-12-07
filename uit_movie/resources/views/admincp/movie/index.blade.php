@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary my-3">Thêm phim</a>
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
                    @foreach($list as $key => $movie)
                    <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$movie->title}}</td>
                        <td><img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt=""></td>
                        <td>{{$movie->slug}}</td>
                        <td>{{$movie->description}}</td>
                        <td>
                            @if($movie->status)
                                Hien thi
                            @else
                                Khong hien thi
                            @endif
                        </td>
                        <td>{{$movie->category->title}}</td>
                        <td>{{$movie->genre->title}}</td>
                        <td>{{$movie->country->title}}</td>
                        <td class="d-flex">
                            {!!Form::open(['method'=>'DELETE','route'=>['movie.destroy',$movie->id],'onsubmit'=>'return confirm("Xoa hay khong xoa")'])!!}
                                {!!Form::submit('Xoa',['class'=>'btn btn-danger'])!!}
                            {!!Form::close()!!}
                            <a href="{{route('movie.edit',$movie->id)}}" class="btn btn-warning ms-2">Sua</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

