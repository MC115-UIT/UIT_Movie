@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary my-3">Thêm phim</a>
            <table class="table table-responesive movie-table">
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
                    @foreach($list as $key => $movie)
                    <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$movie->title}}</td>
                        <td><img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt=""></td>
                        <td>{{$movie->slug}}</td>
                        <!-- <td>{{$movie->description}}</td> -->
                        <td>
                            @if($movie->status)
                                Hiển thị
                            @else
                                Không hiển thị
                            @endif
                        </td>

                        <td>
                            @if($movie->resolution==0)
                                HD
                            @elseif($movie->resolution==1)
                                SD
                            @elseif($movie->resolution==2)
                                HDCam
                            @elseif($movie->resolution==3)
                                Cam
                            @elseif($movie->resolution==4)
                                FullHD
                            @elseif($movie->resolution==5)
                                Trailer
                            @endif
                        </td>
                         <td>
                            @if($movie->subtitle==0)
                                Thuyết minh
                            @else
                                Phụ đề
                            @endif
                        </td>
                         <td>{{$movie->sotap}}</td>
                         <td>
                            @if($movie->thuocphim=='phimle')
                                Phim lẻ 1 tập
                            @else
                                Phim nhiều tập
                            @endif
                         </td>

                        <td>{{$movie->category->title}}</td>
                        <!-- <td>{{$movie->genre->title}}</td> -->
                        <td>
                        @foreach($movie->movie_genre as $gen)
                            
                            <span class="badge bg-dark">{{$gen->title}}</span>

                        @endforeach
                        </td>
                        <td>{{$movie->country->title}}</td>
                        <td>{{$movie->date_create}}</td>
                        <td>{{$movie->date_update}}</td>

                        <td class="d-flex">
                            {!!Form::open(['method'=>'DELETE','route'=>['movie.destroy',$movie->id],'onsubmit'=>'return confirm("Xóa hay không xóa")'])!!}
                                {!!Form::submit('Xóa',['class'=>'btn btn-danger'])!!}
                            {!!Form::close()!!}
                            <a href="{{route('movie.edit',$movie->id)}}" class="btn btn-warning ms-2">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

