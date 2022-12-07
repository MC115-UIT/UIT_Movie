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
                <a href="#" class="logo ms-3">
                    <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
                </a>
                <ul class="nav-menu" id="nav-menu">
                    <li><a href="#">Home</a></li>
                    <!-- <li><a href="#">Genre</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">Series</a></li> -->
                    @foreach($category as $key => $cate)
                        <li class="mega"><a title="{{$cate->title}}" href="{{route('category',$cate->slug)}}">{{$cate->title}}</a></li>
                    @endforeach
                    <li><a href="#">About</a></li>
                    <li class="search-box">
                        <input type="search" name="" id="search-input" placeholder="Search movie">
                        <i class='bx bx-search-alt'></i>
                    </li>
                    <li class="mt-2">
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
    <!-- END NAV -->

    <!-- HERO SECTION -->
    <div class="movie-page">
        @yield('content')
    </div>

    
    <!-- END PRICING SECTION -->

    <!-- FOOTER SECTION -->
    <footer class="section footer-layout">
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

</body>

</html>