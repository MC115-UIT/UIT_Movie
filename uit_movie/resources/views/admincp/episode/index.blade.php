@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('episode.create')}}" class="btn btn-primary my-3">Thêm tập phim</a>
            <table class="table movie-table" id="movie-table">
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

