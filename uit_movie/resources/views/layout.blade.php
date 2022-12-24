<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        UIT Movie Xem phim chất lượng cao
    </title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- APP CSS -->
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
    <link rel="stylesheet" href="{{asset('./css/grid.css')}}">
</head>

<body>

    <!-- NAV -->
    <div class="nav-wrapper">
        <div class="container-fluid ">
            <div class="nav">
                <a href="{{route('home')}}" class="logo ms-3">
                    <i class='bx bx-movie-play bx-tada main-color'></i>U<span class="main-color">I</span>T MOVIE
                </a>
                <ul class="nav-menu" id="nav-menu">
                   <div class="search-container form-group">
                    <form action="{{route('tim-kiem')}}" method="GET" class="d-flex form-search">
                        <li class="search-box mb-2">
                                    <input type="text" name="search" id="search-input" placeholder="Search movie" autocomplete="off">
                                   <button class="btn btn-search" >                                  
                                         <i class='bx bx-search-alt'>
                                         </i>
                                     </button>
          
                        </li>
                    </form>
                         <ul class="list-group" id="result-search" style="display:none; position: absolute;">
                            
                        </ul>
                    </div>
                     <li><a href="{{route('home')}}">Home</a></li>

                     @foreach($category as $key => $cate)
                        <li class="mega"><a title="{{$cate->title}}" href="{{route('category',$cate->slug)}}">{{$cate->title}}</a></li>
                    @endforeach
                    <li><a href="#" class="about">About</a></li>
               
                   <!--  <li>
                        <a href="#" class="btn btn-hover">
                            <span>Sign in</span>
                        </a>
                    </li> -->
                </ul>
                <!-- MOBILE MENU TOGGLE -->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END NAV -->

    <!-- HERO SECTION -->
    <div class="hero-section">
        <!-- HERO SLIDE -->
        <div class="hero-slide">
            <div class="owl-carousel carousel-nav-center" id="hero-carousel">
                <!-- SLIDE ITEM -->
                @foreach($movie_new as $key => $movie)
                    <div class="hero-slide-item">
                        @php
                            $info = App\Http\Controllers\ApiTmdbController::getInfoMovie($movie->tmdb_id)
                        @endphp
                    <img class="backdrop backdrop-layout img-fluid" src="https://image.tmdb.org/t/p/original/{{$info['backdrop_path']}}" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                {{$movie->title}}
                            </div>
                            <div class="movie-infos top-down delay-2">
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
                            <div class="item-content-description top-down delay-4">
                                   {{$movie->description}}
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="{{route('movie',$movie->slug)}}" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Xem ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <!-- END SLIDE ITEM -->
                <!-- SLIDE ITEM -->
                
                <!-- END SLIDE ITEM -->
            </div>
        </div>
        <!-- END HERO SLIDE -->
        <!-- TOP MOVIES SLIDE -->
        <div class="top-movies-slide">
            <div class="owl-carousel" id="top-movies-slide">
                <!-- MOVIE ITEM -->
                @foreach($movie_hot as $key => $mov)
                <a href="{{route('movie',$mov->slug)}}">
                <div class="movie-item">
                    <img src="{{asset('uploads/movie/'.$mov->image)}}" alt="">
                    <div class="movie-item-content">
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
                </div>
            </a>
                @endforeach
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                
                <!-- END MOVIE ITEM -->
            </div>
        </div>
        <!-- END TOP MOVIES SLIDE -->
    </div>
    <!-- END HERO SECTION -->

    <div class="section-film">
        <form method="GET" action="{{ route('filter_movie') }}">
           <div class="columns is-multiline is-mobile title_filters__2FjQh d-flex mt-0 mx-auto justify-content-between pb-0 align-items-center">
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field form-group">
                       <label class="label">Loại phim:</label>
                       <div class="control">
                          <div class="select">
                             <select class="form-control" name="category">
                                <option selected="" value="0">- Tất cả -</option>
                                 @foreach($category as $key => $cate)
                            <option value="{{$cate->id}}" {{ ( isset($_GET['category'])  && $_GET['category']==$cate->id) ? 'selected' : '' }}>{{$cate->title}}</option>
                                @endforeach
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field form-group">
                       <label class="label">Thể loại:</label>
                       <div class="control">
                          <div class="select">
                             <select class="form-control" name="genre">
                                <option selected="" value="0">- Tất cả -</option>
                                 @foreach($genre as $key => $gen)
                                    
                                   
                                    <option value="{{$gen->id}}" {{ ( isset($_GET['genre']) && $_GET['genre']==$gen->id) ? 'selected' : '' }} >{{$gen->title}}</option>
                                @endforeach
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field form-group">
                       <label class="label">Quốc gia:</label>
                       <div class="control">
                          <div class="select">
                             <select class="form-control" name="country">
                                <option selected="" value="0">- Tất cả -</option>
                                @foreach($country as $key => $ct)
                                    <option value="{{$ct->id}}" {{ ( isset($_GET['country'])  && $_GET['country']==$ct->id) ? 'selected' : '' }} >{{$ct->title}}</option>
                                @endforeach
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field form-group">
                       <label class="label">Năm:</label>
                       <div class="control">
                          <div class="select">
                             <select class="form-control" name="year">
                                <option selected="" value="0">- Tất cả -</option>
                                <option value="2022" {{ ( isset($_GET['year'])  && $_GET['year']==2022) ? 'selected' : '' }}>2022</option>
                                <option value="2021" {{ ( isset($_GET['year'])  && $_GET['year']==2021) ? 'selected' : '' }}>2021</option>
                                <option value="2020" {{ ( isset($_GET['year'])  && $_GET['year']==2020) ? 'selected' : '' }}>2020</option>
                                <option value="2019" {{ ( isset($_GET['year'])  && $_GET['year']==2019) ? 'selected' : '' }}>2019</option>
                                <option value="2018" {{ ( isset($_GET['year'])  && $_GET['year']==2018) ? 'selected' : '' }}>2018</option>
                                <option value="2017" {{ ( isset($_GET['year'])  && $_GET['year']==2017) ? 'selected' : '' }}>2017</option>
                                <option value="2016" {{ ( isset($_GET['year'])  && $_GET['year']==2016) ? 'selected' : '' }}>2016</option>
                                <option value="2015" {{ ( isset($_GET['year'])  && $_GET['year']==2015) ? 'selected' : '' }}>2015</option>
                                <option value="2014" {{ ( isset($_GET['year'])  && $_GET['year']==2014) ? 'selected' : '' }}>2014</option>
                                <option value="2013" {{ ( isset($_GET['year'])  && $_GET['year']==2013) ? 'selected' : '' }}>2013</option>
                                <option value="2012" {{ ( isset($_GET['year'])  && $_GET['year']==2012) ? 'selected' : '' }}>2012</option>
                                <option value="-2012" {{ ( isset($_GET['year'])  && $_GET['year']==-2012) ? 'selected' : '' }}>Trước 2012</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field form-group">
                       <label class="label">Thời lượng:</label>
                       <div class="control">
                          <div class="select">
                             <select class="form-control" name="runtime">
                        <option selected="" value="0">- Tất cả -</option>
                        <option value="1" {{ ( isset($_GET['runtime'])  && $_GET['runtime']==1) ? 'selected' : '' }}>Dưới 30 phút</option>
                        <option value="2" {{ ( isset($_GET['runtime'])  && $_GET['runtime']==2) ? 'selected' : '' }}>30&#x27; - 1 tiếng</option>
                        <option value="3" {{ ( isset($_GET['runtime'])  && $_GET['runtime']==3) ? 'selected' : '' }}>1 - 1.5 tiếng</option>
                        <option value="4" {{ ( isset($_GET['runtime'])  && $_GET['runtime']==4) ? 'selected' : '' }}>1.5 - 2 tiếng</option>
                        <option value="5" {{ ( isset($_GET['runtime'])  && $_GET['runtime']==5) ? 'selected' : '' }}>2 - 2.5 tiếng</option>
                        <option value="6" {{ ( isset($_GET['runtime'])  && $_GET['runtime']==6) ? 'selected' : '' }}>2.5 - 3 tiếng</option>
                        <option value="7" {{ ( isset($_GET['runtime'])  && $_GET['runtime']==7) ? 'selected' : '' }}>Trên 3 tiếng</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field form-group">
                       <label class="label">Sắp xếp:</label>
                       <div class="control">
                          <div class="select">
                             <select class="form-control" name="order">
                                <option selected="" value="0">- Mặc định -</option>
                                <option value="updated"{{ ( isset($_GET['order'])  && $_GET['order']=="updated") ? 'selected' : '' }}>
                                   Ngày cập nhật
                                </option>
                                <option value="publishDate" {{ ( isset($_GET['order'])  && $_GET['order']=="publishDate") ? 'selected' : '' }}>Ngày phát hành</option>
                                <option value="rating" {{ ( isset($_GET['order'])  && $_GET['order']=="rating") ? 'selected' : '' }}>Điểm đánh giá</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="form-group mt-4">
                        <input type="submit" class="btn bg-warning bg-gradient btn-filter" value="Lọc phim">
                 </div>
            </div>
        </form>
        @yield('content')
    </div>

    <!-- PRICING SECTION -->
    <div class="section" style="display: block;">
        <div class="container">
            <div class="pricing">
                <div class="pricing-header">
                    U<span class="main-color">I</span>T Movie - About
                </div>
                <div class="pricing-list">
                    <div class="row">
                        <div class="col-4 col-md-12 col-sm-12">
                            <div class="pricing-box">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        Miễn phí
                                    </div>
                                    <div class="pricing-price">
                                        Free
                                    </div>
                                </div>
                                <div class="pricing-box-content">
                                    <p>Xem phim miễn phí</p>
                                    <p>Năm 2022</p>
                                    <p>100+ Movie/Tv Show</p>
                                    <p>Thuyết Minh/VietSub</p>
                                </div>
                                <div class="pricing-box-action">
                                    <a href="#" class="btn btn-hover watch-now">
                                        <span>Xem ngay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-12 col-sm-12">
                            <div class="pricing-box hightlight">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        Chất lượng
                                    </div>
                                    <div class="pricing-price">
                                        <span>Quality</span>
                                    </div>
                                </div>
                                <div class="pricing-box-content">
                                    <p>Nhanh chóng</p>
                                    <p>Cập nhật sớm</p>
                                    <p>Độ phân giải cao</p>
                                    <p>Âm thanh sống động</p>
                                </div>
                                <div class="pricing-box-action">
                                    <a href="#" class="btn btn-hover watch-now">
                                        <span>Xem ngay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-12 col-sm-12">
                            <div class="pricing-box">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        Tốc độ
                                    </div>
                                    <div class="pricing-price">
                                        <span>Speed</span>
                                    </div>
                                </div>
                                <div class="pricing-box-content">
                                    <p>Ổn định</p>
                                    <p>Trọn vẹn</p>
                                    <p>Linh hoạt</p>
                                    <p>Chuyển đổi nhanh chóng</p>
                                </div>
                                <div class="pricing-box-action">
                                    <a href="#" class="btn btn-hover watch-now">
                                        <span>Xem ngay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PRICING SECTION -->

    <!-- FOOTER SECTION -->
    <footer class="section footer-layout" style="display: block">
        <div class="container">
            <div class="row">
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="content">
                        <a href="#" class="logo">
                            <i class='bx bx-movie-play bx-tada main-color'></i>U<span class="main-color">I</span>T Movie
                        </a>
                        <p>
                           UIT Movie mang đến cho các bạn các tập phim bộ, lẻ chiếu rạp mới nhất, hấp dẫn nhất, cập nhật thường, full Vietsub, miễn phí online thường xuyên cùng với đường truyền tốc độ cao, ổn định, đảm bảo trải nghiệm xem phim trọn vẹn chân thực như ở rạp chiếu phim chuyên nghiệp.
                        </p>
                        <div class="social-list">
                            <a href="#" class="social-item">
                                <i class="bx bxl-facebook"></i>
                            </a>
                            <a href="#" class="social-item">
                                <i class="bx bxl-twitter"></i>
                            </a>
                            <a href="#" class="social-item">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-8 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-3 col-md-6 col-sm-6">
                            <div class="content">
                                <p><b>UIT Movie</b></p>
                                <ul class="footer-menu">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">My profile</a></li>
                                    <li><a href="#">Pricing plans</a></li>
                                    <li><a href="#">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 col-sm-6">
                            <div class="content">
                                <p><b>Browse</b></p>
                                <ul class="footer-menu">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">My profile</a></li>
                                    <li><a href="#">Pricing plans</a></li>
                                    <li><a href="#">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 col-sm-6">
                            <div class="content">
                                <p><b>Help</b></p>
                                <ul class="footer-menu">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">My profile</a></li>
                                    <li><a href="#">Pricing plans</a></li>
                                    <li><a href="#">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 col-sm-6">
                            <div class="content">
                                <p><b>Download app</b></p>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('./images/google-play.png')}}" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('./images/app-store.png')}}" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER SECTION -->

    <!-- COPYRIGHT SECTION -->
    <div class="copyright">
        Copyright 2022 </a>
    </div>
    <!-- END COPYRIGHT SECTION -->

    <!-- SCRIPT -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- OWL CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- APP SCRIPT -->
    <script src="{{asset('./js/app.js')}}"></script>

    <script type="text/javascript">
                $(document).ready(function(){
                    $('#search-input').keyup(function(){
                        // alert('eeee');
                        $('#result-search').html('');
                        var search = $("#search-input").val();

                        if(search !=''){
                            $('#result-search').css('display','block');
                            var expression = new RegExp(search,"i");
                                 console.log(expression);

                            $.getJSON('/json/movies.json',function(data){
                                console.log(data);
                                $.each(data, function(key,value){
                                    if(value.title.search(expression) != -1 || value.description.search(expression)!= -1 ){

                                        $('#result-search').append('<li style="cursor:pointer; display: flex; max-height: auto;color: #ffffff; background: transparent; background-color: #2d2e37;" class="list-group-item link-class width="100"  "><img src="/uploads/movie/'+value.image+'" height="100" width="100" class="" /><div style="flex-direction: column; margin-left: 10px;"><h4 width="100%">'+value.title+'</h4><span style="display: -webkit-box; max-height: 8.2rem; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal; -webkit-line-clamp: 5; line-height: 1.6rem;" class="text-muted">|'+value.description+'</span></div></li>')
                                    }
                                });
                            });

                        }else{
                            $('#result-search').css('display','none');
                        }

                    })


                    $('#result-search').on('click','li',function(){
                        var click_text = $(this).text().split('|');

                        $('#search-input').val($.trim(click_text[0]));

                        $('#result-search').html('');   
                        $('#result-search').css('display','none');  

                    })
                })
    </script>
   <script type="text/javascript">
         $(document).ready(function(){
            $('.watch-now').on('click',function(e){
               
                // e.prevenDefault();
                
                $('html,body').animate({scrollTop : $('.hero-slide').offset().top -100},500)
            })
     }) 
            
    </script>
       <script type="text/javascript">
         $(document).ready(function(){
            $('.about').on('click',function(e){
               
                // e.prevenDefault();
                
                $('html,body').animate({scrollTop : $('.pricing-box').offset().top - 150},500)
            })
     }) 
            
    </script>
    


</body>

</html>