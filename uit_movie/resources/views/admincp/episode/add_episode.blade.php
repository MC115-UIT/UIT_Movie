@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lí tập phim</div>
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
                    @if(!isset($episode))
                        {!! Form::open(['route'=>'episode.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                    @else
                        {!! Form::open(['route'=>['episode.update',$episode->id],'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
                    @endif
                        
                       <div class='form-group'>
                            {!!Form::label('movie_title','Phim',[])!!}
                            {!!Form::text('movie_tile',isset($movie)?$movie->title:'',['style'=>'resize:none','class'=>'form-control my-2','readonly'])!!}      
                            {!!Form::hidden('movie_id',isset($movie)?$movie->id:'')!!}  
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
                            
                                {!!Form::selectRange('episode',1,$movie->sotap,$movie->sotap,['class'=>'form-control'])!!}
                        
                             @else
                                {!!Form::label('episode','Tập phim',[])!!}
                                {!!Form::text('episode',isset($episode)?$episode->episode:'',['style'=>'resize:none','class'=>'form-control my-2',isset($episode) ? 'readonly' : ''])!!}    
                       
                             @endif



                            

                        </div>
                       
                    @if(!isset($episode))
                        {!!Form::submit('Thêm tập phim',['class'=>'btn btn-success my-2'])!!}
                    @else
                        {!!Form::submit('Cập nhật',['class'=>'btn btn-success my-2'])!!}
                    @endif
                    {!!Form::close()!!} 
                </div>
            </div>
            
        </div>
        <div class="col-md-12">
            
            <table class="table movie-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Movie title</th>
                        <th scope="col">NO.Episode</th>
                        <th scope="col">Link Episdode</th>                       
                        <th scope="col">Manage</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_episode as $key => $episode)
                    <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$episode->movie->title}}</td>
                        
                        <td>{{$episode->episode}}</td>
                        <td>{{$episode->linkphim}}</td>

                        <td class="d-flex">
                            {!!Form::open(['method'=>'DELETE','route'=>['episode.destroy',$episode->id],'onsubmit'=>'return confirm("Xóa hay không xóa")'])!!}
                                {!!Form::submit('Xóa',['class'=>'btn btn-danger'])!!}
                            {!!Form::close()!!}
                            <a href="{{route('episode.edit',$episode->id)}}" class="btn btn-warning ms-2">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

