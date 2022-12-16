@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt kê phim</a>
                <div class="card-header">Quản lí Phim</div>
                <div class="d-flex justify-content-between col-6 my-2 ms-2 align-items-center">
                                    <input type="text" name="" id="add-movie-input" title="Thêm nhanh" placeholder="Nhập tmdb ID">
                                    <div class="select">
                                         <select id="select_api">
                                            <option selected="" value="movie">Phim lẻ</option>
                                            <option value="show">Phim dài tập/Show</option>                            
                                        </select>
                                    </div>
                                    <button id="add-movie" class="btn btn-primary">Thêm nhanh thông tin phim</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($movie))
                        {!! Form::open(['route'=>'movie.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                    @else
                        {!! Form::open(['route'=>['movie.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
                    @endif
                        <div class="form-group">
                            {!!Form::label('title','Title',['class'=>'my-2'])!!}
                            {!!Form::text('title',isset($movie)?$movie->title:'',['class'=>'form-control my-2',
                            'placeholder'=>'Nhap vao du lieu...','id'=>'slug','onkeyup'=>'ChangeToSlug()','onchange'=>'ChangeToSlug()'])!!}                     
                        </div>
                        <div class='form-group'>
                            {!!Form::label('slug','Slug',[])!!}
                            {!!Form::text('slug',isset($movie)?$movie->slug:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'convert_slug'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('description','Description',[])!!}
                            {!!Form::textarea('description',isset($movie)?$movie->description:'',['style'=>'resize:none','class'=>'form-control my-2','placeholder'=>'Nhap vao du lieu...','id'=>'description'])!!}        
                        </div>



                        <div class='form-group'>
                            {!!Form::label('time','Time',[])!!}
                            {!!Form::text('runtime',isset($movie)?$movie->runtime:'',['style'=>'resize:none','class'=>'form-control my-2','id'=>'time-movie'])!!}        
                        </div>
                         <div class='form-group'>
                            {!!Form::label('point','Point',[])!!}
                            {!!Form::text('imdb_point',isset($movie)?$movie->imdb_point:'',['style'=>'resize:none','class'=>'form-control my-2','id'=>'imdb-point'])!!}        
                        </div>
                         <div class='form-group'>
                            {!!Form::label('date_release','Date_release',[])!!}
                            {!!Form::date('date_release',isset($movie)?$movie->date_release:'',['style'=>'resize:none','class'=>'form-control my-2','id'=>'date-release'])!!}        
                        </div>
                         <div class='form-group'>
                            {!!Form::label('tmdbID','tmdbID',[])!!}
                            {!!Form::text('tmdb_id',isset($movie)?$movie->tmdb_id:'',['style'=>'resize:none','class'=>'form-control my-2','id'=>'tmdb-id'])!!}        
                        </div>


                        <div class='form-group'>
                            {!!Form::label('Active','Active',[])!!}
                            {!!Form::select('status',['1'=>"Hiển thị", '0'=>'Không'],isset($movie)?$movie->status:'',['class'=>'form-control my-2'])!!}        
                        </div>
                         <div class='form-group'>
                            {!!Form::label('Hot','Hot',[])!!}
                            {!!Form::select('hot',['1'=>"Phim hot", '0'=>'Không'],isset($movie)?$movie->hot:'',['class'=>'form-control my-2'])!!}        
                        </div>

                         <div class='form-group'>
                            {!!Form::label('resolution','Quality',[])!!}
                            {!!Form::select('resolution',['0'=>"HD", '1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD'],isset($movie)?$movie->resolution:'',['class'=>'form-control my-2'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('subtitle','Subtitle',[])!!}
                            {!!Form::select('subtitle',['0'=>"Thuyết Minh", '1'=>'Phụ đề'],isset($movie)?$movie->subtitle:'',['class'=>'form-control my-2'])!!}        
                        </div>

                        <div class='form-group'>
                            {!!Form::label('Category','Category',[])!!}
                            {!!Form::select('category_id',$category,isset($movie)?$movie->category_id:'',['class'=>'form-control my-2'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('Genre','Genre',[])!!}
                            {!!Form::select('genre_id',$genre,isset($movie)?$movie->genre_id:'',['class'=>'form-control my-2'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('Country','Country',[])!!}
                            {!!Form::select('country_id',$country,isset($movie)?$movie->country_id:'',['class'=>'form-control my-2'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('Image','Image',[])!!}
                            {!!Form::file('image',['class'=>'form-control-file my-2'])!!}  
                            @if(isset($movie))
                                 <img width="10%" src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
                            @endif
                            <a href="" id="add-poster" download target="_blank" rel="noopener noreferrer">Tải nhanh poster phim!</a>
                        </div>
                    @if(!isset($movie))
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



