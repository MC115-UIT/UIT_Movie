

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>
        UIT Movie Xem phim chất lượng cao
    </title>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
      <meta name="msapplication-config" content="/static/favicons/browserconfig.xml">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <title>Black Adam - Black Adam (2022) | Xem phim</title> -->
      <!-- <meta name="description" content="Dwayne Johnson sẽ góp mặt trong tác phẩm hành động - phiêu lưu mới của New Line Cinema, mang tên BLACK ADAM. Đây là bộ phim đầu tiên trên màn ảnh rộng khai thác"> -->
      <!-- <meta property="og:url" content="https://xemphimm.com/movie/black-adam~26790"> -->
      <meta property="og:title" content="Black Adam - Black Adam (2022) | Xem phim">
      <meta property="og:description" content="{{$movie_slug->description}}">
      <meta property="og:image" content="https://image.tmdb.org/t/p/w780/pFlaoHTZeyNkG83vxsAJiGzfSsa.jpg">
      <meta property="og:type" content="video.movie">
      <meta property="og:locale" content="vi_VN">

      <noscript data-n-css="true"></noscript>
    
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
          <!-- APP CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
               <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('./css/movie_detail.css')}}">
    <link rel="stylesheet" href="{{asset('./css/grid.css')}}">
   <link rel="stylesheet" href="{{asset('./css/app.css')}}">


</head>

<body>
     <!-- NAV -->
     <div class="nav-wrapper">
        <div class="container-fluid ">
            <div class="nav">
                <a href="#" class="logo ms-3">
                    <i class='bx bx-movie-play bx-tada main-color'></i>U<span class="main-color">I</span>T MOVIE
                </a>
                <ul class="nav-menu" id="nav-menu">
                   <div class="search-container form-group">
                    <form action="{{route('tim-kiem')}}" method="GET" class="d-flex form-search">
                        <li class="search-box mb-2">
                                    <input type="text" name="search" id="search-input" placeholder="Search movie" >
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
                    <li><a href="#">About</a></li>
               
                    <!-- <li>
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
    <!--Movie details-->

      <div id="__next">
         <div class="">
           <div class="backdrop" style="background-image:url(https://image.tmdb.org/t/p/original/{{$movie_info['backdrop_path']}})"></div>

             <section class="section">
               <div class="container shiftup mb-auto">
                  <div class="tt-details columns is-variable is-8">
                     <div class="column is-one-quarter-tablet">
                        <p class="cover has-text-centered"> <img src="{{asset('uploads/movie/'.$movie_slug->image ?? 'cat9180.jpg')}}" alt=""></p>
                        @if(isset($episode_first))
                        @if($movie_slug->resolution==5)
                           <a class="watch watch-trailer button is-danger is-medium is-fullwidth" href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                 <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path>
                              </svg>
                                   Xem trailer
                          
                           </a>
                           @else
                              
                           <a class="watch button is-danger is-medium is-fullwidth" href="{{url('home/watch/'.$movie_slug->slug.'/ep-'.$episode_first->episode)}}">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                 <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path>
                              </svg>
                                  Xem phim
                          
                           </a>
                           @endif 

                        @else
                            <a class="watch watch-trailer button is-danger is-medium is-fullwidth" href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                 <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path>
                              </svg>
                                   Xem trailer
                          
                           </a>
                        @endif
                           

                       
                     </div>
                     <div class="column main">
                        <h1 class="title is-2">{{$movie_slug->title}}</h1>
                        <h2 class="subtitle is-4">
                           @if($movie_check==1)
                              {{$movie_info['original_name']}}
                           @else
                              {{$movie_info['title']}}
                           @endif
                            (<a href="#">{{date('Y', strtotime($movie_slug->date_release))}}</a>)
                        </h2>
                        <div class="meta"><span>{{$movie_slug->runtime}} phút</span></div>
                        <div class="meta">
                           <span class="imdb-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                 <path d="M44 13H4c-2.2 0-4 1.8-4 4v16c0 2.2 1.8 4 4 4h40c2.2 0 4-1.8 4-4V17c0-2.2-1.8-4-4-4z" fill="#ffc107"></path>
                                 <path d="M28.102 18h-3.704v13.102h3.704c2 0 2.796-.403 3.296-.704.602-.398.903-1.097.903-1.796v-7.903c0-.898-.403-1.699-.903-2-.796-.5-1.097-.699-3.296-.699zm.699 10.3c0 .598-.7.598-1.301.598V20c.602 0 1.3 0 1.3.602zM33.8 18v13.3h2.802s.199-.902.398-.698c.398 0 1.5.597 2.2.597.698 0 1.1 0 1.5-.199.6-.398.698-.7.698-1.3v-7.802c0-1.097-1.097-1.796-2-1.796-.898 0-1.796.597-2.199.898v-3zm3.598 4.2c0-.4 0-.598.403-.598.199 0 .398.199.398.597v6.602c0 .398 0 .597-.398.597-.2 0-.403-.199-.403-.597zM22.7 31.3V18h-4.4l-.8 6.3-1.102-6.3h-4v13.3h2.903v-7.402l1.3 7.403h2l1.297-7.403v7.403zM7.602 18h3.097v13.3H7.602z" fill="#263238"></path>
                              </svg>
                           </span>
                           <span class="has-text-weight-bold">{{$movie_slug->imdb_point}}</span>
                        </div>
                        <div class="level genres justify-content-center" style="display:block">
                           <div class="d-flex justify-content-between align-items-center">
                           <div class="level-left">
                              <div class="level-item">
                                 @php
                                    $current_url=Request::url();
                                 @endphp
                                 <a href="https://www.facebook.com/sharer/sharer.php?u={{$current_url}}" class="fb-share button is-link" target="_blank">
                                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                       <path d="M448 80v352c0 26.5-21.5 48-48 48h-85.3V302.8h60.6l8.7-67.6h-69.3V192c0-19.6 5.4-32.9 33.5-32.9H384V98.7c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9H184v67.6h60.9V480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"></path>
                                    </svg> 
                                    Chia sẻ
                                 </a>
                              </div>
                              <div class="level-item">
                                 <div class="dropdown is-hoverable">
                                       @php
                                          $current_url_save=Request::url();
                                       @endphp
                                       <div class="fb-save" hidden 
                                       data-uri="{{$current_url_save}}"></div>
                                    <div class="dropdown-trigger btn-save-fb">
                                       
                                       <button class="collection-btn button is-info is-outlined unadded ">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                             <path d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"></path>
                                          </svg>
                                                Bộ sưu tập
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="level-right">
                              <div class="level-item buttons">
                                 @foreach($movie_slug->movie_genre as $gen)
                            
                                     <a class="button is-link is-small is-rounded is-inverted is-outlined" href="{{route('genre',$gen->slug)}}">{{$gen->title}}</a>

                                 @endforeach                                 
                                 
                           </div>
                        </div>
                     </div>
                        <dl class="horizontal-dl">
                           <dt>Đạo diễn</dt>
                           <dd class="csv">
                          
                            @foreach($movie_credits['crew'] as $key => $credit)
                                 @if($credit['job']=="Director")
                                    <a target="_blank" rel="noopener noreferrer" href="https://www.google.com/search?q={{$credit['name']}}" style="text-decoration:none">{{$credit['name']}}</a>&nbsp
                                 @endif
                           @endforeach

                           </dd>
                           <dt>Kịch bản</dt>
                           <dd class="csv">
                          
                                 @foreach($movie_credits['crew'] as $key => $credit)
                                    @if($credit['job']=="Novel" or $credit['job']=="Story" )
                                       <a target="_blank" rel="noopener noreferrer" href="https://www.google.com/search?q={{$credit['name']}}" style="text-decoration:none">{{$credit['name']}}</a>&nbsp
                                    @endif
                                  @endforeach


                           </dd>
                           <dt>Quốc gia</dt>
                           <dd class="csv"><a href="{{route('country',$movie_slug->country->slug)}}">{{$movie_slug->country->title}}</a></dd>
                           <dt>Khởi chiếu</dt>
                           <dd>{{date('d-m-Y', strtotime($movie_slug->date_release))}}</dd>
                           <dt>Số tập :</dt>
                           <dd class="bg-warning bg-gradient p-2 align-items-center justify-content-center" style="width : 50px; color : black; font-weight: bold">{{$episode_current_list_count}}/{{$movie_slug->sotap}}</dd>
                           <dt class="mt-3">Đánh giá</dt>
                           <dd class="list-inline rating align-items-center">
                                 @for($count=1; $count<=5; $count++)

                                                    @php

                                                      if($count<=$rating){ 
                                                        $color = 'color:#ffcc00;'; 
                                                      }
                                                      else {
                                                        $color = 'color:#ccc;';
                                                      }
                                                    
                                                    @endphp
                                                  
                                                    <span title="star_rating" 

                                                    id="{{$movie_slug->id}}-{{$count}}" 
                                                    
                                                    data-index="{{$count}}"  
                                                    data-movie_id="{{$movie_slug->id}}" 
                                                    data-rating="{{$rating}}" 
                                                    class="rating" 
                                                    style="cursor:pointer; {{$color}} 

                                                    font-size:30px;">&#9733;</span>

                                 @endfor
                                 <span class="total_rating pb-3"> ({{$count_total}} lượt)</span>
                           </dd>
                        </dl>
                        <div class="intro has-text-grey-light">{{$movie_slug->description}}</div>
                        <h3 class="section-header">Diễn viên</h3>
                        <div class="cast"> 
                           <div class="slick-slider slick-initialized" dir="ltr">
                              <!-- <div class="slick-arrow slick-prev slick-disabled" style="display:block">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path>
                                 </svg>
                              </div> -->
                              <div class="slick-list">
                                 <div class="slick-track movie-cast carousel-nav-center owl-carousel" style="width: auto; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                    @foreach($movie_credits['cast'] as $key => $credit)
                                    <div data-index="{{$key}}" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width: 166px;">
                                       <div>
                                          <div class="item" tabindex="-1" style="width:100%;display:inline-block">
                                             <a class="image" target="_blank" rel="noopener noreferrer" href="https://www.google.com/search?q={{$credit['name']}}">
                                          <figure><img src="https://image.tmdb.org/t/p/original/{{$credit['profile_path']}}" alt="{{$credit['name']}}"></figure>
                                             </a>
                                             <p><a class="name" target="_blank" rel="noopener noreferrer" href="https://www.google.com/search?q={{$credit['name']}}">{{$credit['name']}}</a></p>
                                             <p class="character">{{$credit['character']}}</p>
                                          </div>
                                       </div>
                                    </div>
                                     @endforeach
                                 </div>
                                     
                           </div>
                        </div>
                        <h3 class="section-header">Trailer</h3>
                        <div class="trailers">
                           <div class="slick-slider slick-initialized" dir="ltr">
                             
                              <div class="slick-list">
                                 <div class="slick-track movie-trailer carousel-nav-center owl-carousel" style="width: auto; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                 
                                 @foreach($movie_videos['results'] as $key => $trailer)
                                 
                                    <div data-index="{{$key}}" class="slick-slide" tabindex="-1" aria-hidden="true" style="outline: none; width: 248px;">
                                       <div>
                                          <div class="item" tabindex="-1" style="width:100%; height: 100% ;display:inline-block">
                                             <a type="button" class="clip" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/{{$trailer['key']}}" data-bs-target="#myModal">
                                                      <img style="max-height: 100%; max-width: 100%; object-fit: contain" src="https://img.youtube.com/vi/{{$trailer['key']}}/hqdefault.jpg">
                                                       <div class="icon">
                                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                         <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path>
                                                      </svg>

                                                   </div>
                                                
                                             </a>
                                            
                                          </div>
                                       </div>
                                    </div>
                                 @endforeach
                                       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                               <div class="modal-dialog" role="document">
                                                 <div class="modal-content">
                                                   <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
                                                     </button>        
                                                     <!-- 16:9 aspect ratio -->
                                                     <div class="ratio ratio-16x9">
                                                      <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                                                   </div>
                                                     
                                                   </div>

                                                 </div>
                                               </div>
                                          </div> 
                                 </div>   
                           </div>
                        </div>
                        <h3 class="section-header">Phim tương tự</h3>
                        <div class="related-titles">
                           <div class="slick-slider slick-initialized" dir="ltr">
                              <div class="slick-list">
                                 <div class="slick-track movie-related carousel-nav-center owl-carousel" style="width: auto; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                 @foreach($movie_related as $key => $movie)

                                 <div data-index="{{$key}}" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width: 199px;">
                                       <div>
                                          <div class="item" tabindex="-1" style="width:100%;display:inline-block">
                                             <a class="cover" href="{{route('movie',$movie->slug)}}">
                                                <img src="{{asset('uploads/movie/'.$movie->image)}}"" alt="{{$movie->title}}" title="{{$movie->title}}">
                                             </a>
                                             <h3 class="name">
                                                <a href="{{route('movie',$movie->slug)}}">{{$movie->title}}</a>
                                             </h3>
                                          </div>
                                       </div>
                                 </div>
                                 @endforeach
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <div id="modal-root"></div>
         </div>
         <div class="Toastify"></div>
          
      </div>
   <grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
        <!-- END HERO SECTION -->
        <footer class="section mt-auto">
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
                                <p><b>Flix</b></p>
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
   
            <!-- FOOTER SECTION -->
  
    <!-- END FOOTER SECTION -->

    <!-- COPYRIGHT SECTION -->
 <div class="copyright">
        Copyright 2021 </a>
    </div>

    <!-- END COPYRIGHT SECTION -->

    <!-- SCRIPT -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- OWL CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <!-- APP SCRIPT -->
    <script src="{{asset('./js/app.js')}}"></script>
      <!-- font-awesome -->

      <script src="https://kit.fontawesome.com/79572b7f20.js" crossorigin="anonymous"></script>
      <!-- <script>
         $(.'watch-trailer').click(function(e){
   
               e.prevenDefault();
               var aid = $(this).attr("href");
               $('html,body').animate({scrollTop : $(aid).offset().top},'slow')
            })
      </script>> -->
      <script type="text/javascript">
         $(document).ready(function(){
            $('.watch-trailer').on('click',function(e){
               
                // e.prevenDefault();
                
                $('html,body').animate({scrollTop : $('.trailers').offset().top -100},500)
            })
     })
            
    </script>
    <script type="text/javascript">
        
          function remove_background(movie_id)
           {
            for(var count = 1; count <= 5; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ccc');
            }
          }

          //hover chuột đánh giá sao
         $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
          // alert(index);
          // alert(movie_id);
            remove_background(movie_id);
            for(var count = 1; count<=index; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ffcc00');
            }
          });
         //nhả chuột ko đánh giá
         $(document).on('mouseleave', '.rating', function(){
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
            var rating = $(this).data("rating");
            remove_background(movie_id);
            //alert(rating);
            for(var count = 1; count<=rating; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ffcc00');
            }
           });

          //click đánh giá sao
          $(document).on('click', '.rating', function(){
             
                var index = $(this).data("index");
                var movie_id = $(this).data('movie_id');
            
                $.ajax({
                 url:"{{route('add-rating')}}",
                 method:"post",
                 data:{index:index, movie_id:movie_id},
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                 success:function(data)
                 {

                  if(data == 'done')
                  {

                     toastr.success("Bạn đã đánh giá "+index +" trên 5");
                   location.reload();
                   
                  }else if(data =='exist'){
                      
                     toastr.warning('Bạn đã đánh giá phim này rồi,cảm ơn bạn nhé');

                  }
                  else
                  {
                   
                     toastr.error("Lỗi đánh giá");

                  }
                  
                 }
                });
              
              
                
          });

     
      </script>
   <div id="fb-root"></div>
   <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="fZJJWcOd"></script>
        $(document).ready(function() {

            $(".collection-btn").one('click',function(){

                $('.btn-save-fb').empty();
                $('.fb-save').click();
                $('.btn-save-fb').append('<button class="collection-btn button btn-warning is-info is-outlined unadded "><i class="fa-solid fa-check"></i><!-- -->Đã lưu vào Facebook</button></div>')
            })
        })
    </script>  

</body>
</html>

