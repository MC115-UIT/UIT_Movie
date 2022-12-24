 @extends('./layout')
 @section('content')
 <!-- LATEST MOVIES SECTION -->
        @foreach($category  as $key => $cate)
        <div class="section pt-5">
            <div class="container">
                <div class="section-header">
                    {{$cate->title}}
                </div>
                <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
            @if($cate->slug=='phim-le')
                @foreach($movie_le as $key3 =>$movie)
                    <a href="{{route('movie',$movie->slug)}}" class="movie-item">
                    <img src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                           {{$movie->title}}
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span>{{$movie->imdb_point}}</span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span>{{$movie->runtime}} mins</span>
                            </div>
                            <div class="movie-info">
                            @if($movie->resolution==0)
                                <span>HD</span>
                            @elseif($movie->resolution==1)
                                <span>SD</span>
                            @elseif($movie->resolution==2)
                                <span>HDCam</span>
                            @elseif($movie->resolution==3)
                                <span>Cam</span>
                            @elseif($movie->resolution==4)
                                <span>FullHD</span>
                            @elseif($movie->resolution==5)
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

            @else
                @foreach($movie_cate as $key2 =>$movie) 
                @if($movie->category_id==$cate->id) 
                    <a href="{{route('movie',$movie->slug)}}" class="movie-item">
                    <img src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                           {{$movie->title}}
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span>{{$movie->imdb_point}}</span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span>{{$movie->runtime}} mins</span>
                            </div>
                            <div class="movie-info">
                            @if($movie->resolution==0)
                                <span>HD</span>
                            @elseif($movie->resolution==1)
                                <span>SD</span>
                            @elseif($movie->resolution==2)
                                <span>HDCam</span>
                            @elseif($movie->resolution==3)
                                <span>Cam</span>
                            @elseif($movie->resolution==4)
                                <span>FullHD</span>
                            @elseif($movie->resolution==5)
                                <span>Trailer</span>
                            @endif
                            </div>
                            <div class="movie-info">
                                <span>16+</span>
                            </div>
                        </div>
                    </div>
                </a>
                    
                @endif
                
            @endforeach
            @endif
            
                   <!-- END MOVIE ITEM -->
                </div>
            </div>
        </div>
            
        @endforeach
        
       
 
    
    
    <!-- END LATEST MOVIES SECTION -->

   
    <!-- END SPECIAL MOVIE SECTION -->
@endsection