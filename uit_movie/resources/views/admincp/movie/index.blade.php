@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary my-3">Thêm phim</a>
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
                    @foreach($list as $key => $movie)
                    <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$movie->title}}</td>
                         <td><a href="{{route('add-episode',[$movie->id])}}" class="btn btn-warning btn-sm">Thêm tập phim</a>
                            @foreach($movie->episode as $key => $ep)
                            <span class="badge badge-dark"><a href="" style="color:#fff">{{$ep->episode}}</a></span>
                            @endforeach
                         </td>
                         <td>{{$movie->episode_count}}/{{$movie->sotap}} Tập</td>
                        <td><img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt=""></td>
                        <td>{{$movie->slug}}</td>
                        <!-- <td>{{$movie->description}}</td> -->
                       
                         <td>
                            <select id="{{$movie->id}}" class="status_select">
                                @if($movie->status==0)
                                   <option value="1">Hiển thị</option>
                                   <option selected value="0">Không hiển thị</option>
                                @else
                                    <option selected value="1">Hiển thị</option>
                                   <option  value="0">Không hiển thị</option>
                                @endif 
                            </select>
                        </td>

                        <td>
                           <!--  @if($movie->resolution==0)
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
                            @endif -->
                            @php
                                $options = array('0'=>'HD','1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD','5'=>'Trailer')
                            @endphp
                            <select id="{{$movie->id}}" class="resolution-select">
                                @foreach($options as $key => $res)
                                    <option {{$movie->resolution==$key ? 'selected' : ''}} value="{{$key}}" >{{$res}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select id="{{$movie->id}}" class="phimhot_select">
                                @if($movie->hot==0)
                                   <option value="1">Hot</option>
                                   <option selected value="0">Không</option>
                                @else
                                    <option selected value="1">Hot</option>
                                   <option  value="0">Không</option>
                                @endif 
                            </select>
                        </td>
                         
                        <td>
                            <select id="{{$movie->id}}" class="sub_select">
                                @if($movie->subtitle==0)
                                   <option value="1">Phụ đề</option>
                                   <option selected value="0">Thuyết minh</option>
                                @else
                                    <option selected value="1">Phụ đề</option>
                                   <option  value="0">Thuyết minh</option>
                                @endif 
                            </select>
                        </td>
                           
                        
                         <td>{{$movie->sotap}}</td>
                         <td>
                            @if($movie->thuocphim=='phimle')
                                Phim lẻ 1 tập
                            @else
                                Phim nhiều tập
                            @endif
                         </td>

                        <td>
                            <!-- {{$movie->category->title}} -->

                            {!!Form::select('category_id',$category,isset($movie)?$movie->category_id:'',['class'=>'form-control my-2 category_select','id'=>$movie->id])!!}     
                        </td>
                        <!-- <td>{{$movie->genre->title}}</td> -->
                        <td>
                        @foreach($movie->movie_genre as $gen)
                            
                            <span class="badge bg-dark">{{$gen->title}}</span>

                        @endforeach
                        </td>
                        <td>
                             {!!Form::select('country_id',$country,isset($movie)?$movie->country_id:'',['class'=>'form-control my-2 country_select','id'=>$movie->id])!!}    
                        </td>
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

