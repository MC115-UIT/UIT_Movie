 @extends('./layout')
 @section('content')
 <!-- LATEST MOVIES SECTION -->
    <div class="section ms-2 pt-3">
        <div class="container-fluid">
            <div class="section-header ms-2">
                Filter
            </div>
            <div class=" movie-cards justify-content-between align-items-center ps-2">
                <!-- MOVIE ITEM -->
                @foreach($movie as $key => $mov)
                <a href="{{route('movie',$mov->slug)}}" class="movie-item movie-card">
                    <img src="{{asset('uploads/movie/'.$mov->image)}}" alt="">
                    <div class="movie-content">
                        <div class="movie-item-title">
                            {{$mov->title}}
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span>{{$mov->imdb_point}}</span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span>{{$mov->runtime}} mins</span>
                            </div>
                            <div class="movie-info">
                            @if($mov->resolution==0)
                                <span>HD</span>
                            @elseif($mov->resolution==1)
                                <span>SD</span>
                            @elseif($mov->resolution==2)
                                <span>HDCam</span>
                            @elseif($mov->resolution==3)
                                <span>Cam</span>
                            @elseif($mov->resolution==4)
                                <span>FullHD</span>
                            @elseif($mov->resolution==5)
                                <span>Trailer</span>
                            @endif
                                
                            </div>
                            <div class="movie-info">
                                <span>16+</span>
                            </div>
                        </div>
                    </div>
                </a>
               
                @endforeach
               
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
               
                <!-- END MOVIE ITEM -->
            </div>
        </div>
    </div>
    
    <!-- END LATEST MOVIES SECTION -->

   
    <!-- END SPECIAL MOVIE SECTION -->
@endsection