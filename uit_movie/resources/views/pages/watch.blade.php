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
        <link rel="stylesheet" href="{{asset('./css/watch.css')}}">

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
                    <li><a href="#">About</a></li>
               
                    <li>
                        <a href="#" class="btn btn-hover">
                            <span>Sign in</span>
                        </a>
                    </li>
                </ul>
                <!-- MOBILE MENU TOGGLE -->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
      <main id="main-contents" class="container">
         <section id="content" class="test">
         <!-- ol class="breadcrumbs align-items-center" itemscope="" itemtype="">
            <li itemprop="itemListElement" itemscope="" itemtype="">
               <a href="/" itemprop="item"><span itemprop="name">
               <i class="bx bx-movie-play ">
               UIT-MOVIE</i></span></a>
               <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="">
               <a href="/viet-nam.html" itemprop="item"><span itemprop="name">Phim Việt Nam</span></a>
               <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
               <a href="/phim/Song-Gio.html" itemprop="item"><span itemprop="name">Sóng Gió</span></a>
               <meta itemprop="position" content="3">
            </li>
            <li class="active mt-1">Tập 1</li>
         </ol> -->
         <div class="clearfix wrap-content">
         <iframe width="100%" height="650" src="https://www.youtube.com/embed/j8U06veqxdU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
         </iframe>
         <div class="div-control" style="margin-bottom:80px">
            <div id="fb-like-fanpage" class="fb-like fb_iframe_widget" data-href="https://www.facebook.com/motsub/" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="false" data-colorscheme="dark" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=711081303025670&amp;color_scheme=dark&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fmotsub%2F&amp;layout=standard&amp;locale=vi_VN&amp;sdk=joey&amp;share=false&amp;show_faces=true&amp;size=small&amp;width="><span style="vertical-align: bottom; width: 450px; height: 28px;"><iframe name="f29a4ae9670410c" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v7.0/plugins/like.php?action=like&amp;app_id=711081303025670&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1b87323caaaf28%26domain%3Dmotchill.tv%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fmotchill.tv%252Ff3cc9ca2a751a5c%26relation%3Dparent.parent&amp;color_scheme=dark&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fmotsub%2F&amp;layout=standard&amp;locale=vi_VN&amp;sdk=joey&amp;share=false&amp;show_faces=true&amp;size=small&amp;width=" style="border: none; visibility: visible; width: 450px; height: 28px;" class=""></iframe></span></div>
            <span class="video-btn" id="btn_lightbulb" title="Tắt đèn"><i class="fa fa-lightbulb-o"></i></span>
            <span class="video-btn" id="btn_fullscreen" title="Fullscreen player"><i class="fa fa-expand"></i>Toàn màn hình</span>
            <span class="video-btn active" id="btn_autonext" title="Turn off Auto-next"><i class="fa fa-step-forward"></i></span>
            <span class="video-btn" id="btn_stopads" title="Tắt quảng cáo"><i class="fa fa-eye-slash"></i>Tắt QC</span>              
         </div>
         <div class="level genres">
         <div class="level-left justify-content-between">
            <div class="level-item">
               <a href="https://www.facebook.com/sharer/sharer.php?u=https://xemphim.onl/tv/phantom-pups~26088" class="fb-share button is-link" target="_blank">
                <i class="fa-brands fa-square-facebook"></i> Chia sẻ
               </a>
            </div>
            <div class="level-item">
               <div class="dropdown is-hoverable">
                  <div class="dropdown-trigger">
                     <button class="collection-btn button is-info is-outlined unadded">
                        <i class="fa-solid fa-plus"></i>
                        <!-- -->Bộ sưu tập
                     </button>
                  </div>
               </div>
            </div>
            <div class="level-item">
                <div class="dropdown is-hoverable">
                   <div class="dropdown-trigger">
                      <button class="collection-btn button is-info is-outlined unadded">
                        <i class="fa-solid fa-film"></i>
                         <!-- -->Phim Tương Tự
                      </button>
                   </div>
                </div>
             </div>
         </div>
         <!-- <div class="mp-tips">Mẹo: Chọn phần của tập phim hoặc đổi server dự phòng ở bên dưới</div> -->
         @if($movie->thuocphim=='phimbo')
            <div class="mp-tips mt-3">Mẹo: Chọn phần của tập phim hoặc đổi server dự phòng ở bên dưới</div>

         <ul class="server-backup" id="server-backup"></ul>
         <div class="list-episode">
            @foreach($movie->episode as $key => $episode)
             
                <a class="{{$tap==$episode->episode ? 'current' : ''}}" href="{{url('home/watch/'.$movie->slug.'/ep-'.$episode->episode)}}" title="Tập {{$episode->episode}}">Tập {{$episode->episode}}</a>
            @endforeach                    
         </div>
         @else
            <div class="mt-3"></div>
         @endif
       
         <div class="level-genres">
            <div class="level-left">
               <div class="level-item">
                  <div class="details">
                     <div class="clear"></div>
                     <div class="clear"></div>
                     <div href="/song-gio.html" class="name">
                        <h1 itemprop="name">
                           
                           
                           @if($movie->thuocphim=='phimbo')
                                <a href="{{route('movie',$movie->slug)}}" title="{{$movie->title}}">{{$movie->title}}</a>
                                <span>&nbsp;-&nbsp;</span>
                                <span class="chapter-name"> Tập {{$tap}}</span>
                            @else
                             <a href="{{route('movie',$movie->slug)}}" title="{{$movie->title}}" class="mt-5">{{$movie->title}}</a>
                                <span>&nbsp;-&nbsp;</span>

                                <span class="chapter-name"> 
                                (<a href="#">{{date('Y', strtotime($movie->date_release))}}</a>)
                                </span>
                            @endif
                           
                        </h1>
                        <div class="clear"></div>
                        <h2 class="real-name"><a href="/song-gio.html">{{$movie->title}} </a></h2>
                     </div>
                     <div class="clear"></div>
                     <p class="short-description" style="padding: 5px 8px;margin: 5px 0 20px 0;line-height: 26px;font-size: 16px;color: #BBB;background: #222;"> 
                        {{$movie->description}}
                        [<a style="color: #fff;" href="{{route('movie',$movie->slug)}}" title="{{$movie->title}}">Xem thêm</a>]
                     </p>
                  </div>
               </div>
            </div>
         </div>


         <div class="section">
            <div class="container">
                <div class="section-header">
                    Phim tương tự
                </div>
                <div class="movies-slide carousel-nav-center owl-carousel">
                    <!-- MOVIE ITEM -->
                    <a href="#" class="movie-item">
                        <img src="./images/movies/theatre-dead.jpg" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                Theatre of the dead
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END MOVIE ITEM -->
                    <!-- MOVIE ITEM -->
                    <a href="#" class="movie-item">
                        <img src="./images/movies/transformer.jpg" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                Transformer
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END MOVIE ITEM -->
                    <!-- MOVIE ITEM -->
                    <a href="#" class="movie-item">
                        <img src="./images/movies/resident-evil.jpg" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                Resident Evil
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END MOVIE ITEM -->
                    <!-- MOVIE ITEM -->
                    <a href="#" class="movie-item">
                        <img src="./images/movies/captain-marvel.png" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                Captain Marvel
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END MOVIE ITEM -->
                    <!-- MOVIE ITEM -->
                    <a href="#" class="movie-item">
                        <img src="./images/movies/hunter-killer.jpg" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                Hunter Killer
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END MOVIE ITEM -->
                    <!-- MOVIE ITEM -->
                    <a href="#" class="movie-item">
                        <img src="./images/movies/blood-shot.jpg" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                Bloodshot
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END MOVIE ITEM -->
                    <!-- MOVIE ITEM -->
                    <a href="#" class="movie-item">
                        <img src="./images/movies/call.jpg" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                Call
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END MOVIE ITEM -->
                </div>
            </div>
        </div>
        <div class="section-header mt-5">
                   Bình luận
        </div>
        @php
            $current_url=Request::url();
        @endphp
        <div class="fb-comments" data-href="{{$current_url}}" data-width="100%" data-numposts="10"></div>
        <!-- END LATEST MOVIES SECTION -->
        </main>
    </div>

    <footer class="section footer-layout" >
        <div class="container">
            <div class="row">
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="content">
                        <a href="#" class="logo">
                            <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
                        </a>
                        <p>
                            Chiến binh Báo Đen: Wakanda bất diệt là một bộ phim siêu anh hùng của Hoa Kỳ công chiếu năm 2022, 
                            dựa trên nhân vật Black Panther của Marvel Comics, được sản xuất bởi Marvel Studios và phân phối 
                            bởi Walt Disney Studios Motion Pictures.
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
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="6Y7UFZb5"></script>
</body>
</html>