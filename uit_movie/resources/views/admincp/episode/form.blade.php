@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{route('episode.index')}}" class="btn btn-primary">Liệt kê danh sách tập phim</a>
                <div class="card-header">Quản lí tập phim</div>
               
                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($episode))
                        {!! Form::open(['route'=>'episode.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                    @else
                        {!! Form::open(['route'=>['episode.update',$episode->id],'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
                    @endif
                        
                      
                        <div class='form-group'>
                            {!!Form::label('movie','Phim',[])!!}
                            {!!Form::select('movie_id',['0'=>'Chọn phim','Phim'=>$list_movie],isset($episode)?$episode->movie_id:'',['class'=>'form-control my-2 select-movie'])!!}        
                        </div>
                        <div class='form-group'>
                            {!!Form::label('link','Link tập phim',[])!!}
                            {!!Form::text('link',isset($episode)?$episode->linkphim:'',['style'=>'resize:none','class'=>'form-control my-2'])!!}        
                        </div>

                         <div class='form-group'>
                            <!-- {!!Form::label('eposide','Episode',[])!!}
                            {!!Form::text('eposide',isset($episode)?$episode->episode:'',['style'=>'resize:none','class'=>'form-control my-2'])!!}     -->
                              @if(!isset($episode))
                                {!!Form::label('episode','Tập phim',[])!!}
                                <select name="eposide" class="form-control" id="show_movie">
                                

                                </select>
                        
                             @else
                                {!!Form::label('episode','Tập phim',[])!!}
                                {!!Form::text('episode',isset($episode)?$episode->episode:'',['style'=>'resize:none','class'=>'form-control my-2',isset($episode) ? 'readonly' : ''])!!}    
                       
                             @endif



                            

                        </div>
                       
                    @if(!isset($episode))
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



