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
    <div class="hero-section">
        <!-- HERO SLIDE -->
        <div class="hero-slide">
            <div class="owl-carousel carousel-nav-center" id="hero-carousel">
                <!-- SLIDE ITEM -->
                <div class="hero-slide-item">
                    <img src="{{asset('./images/black-banner.png')}}" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                Black Panther
                            </div>
                            <div class="movie-infos top-down delay-2">
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
                            <div class="item-content-description top-down delay-4">
                                   Chiến binh Báo Đen: Wakanda bất diệt là một bộ phim siêu anh hùng của Hoa Kỳ công chiếu năm 2022, dựa trên nhân vật Black Panther của Marvel Comics, được sản xuất bởi Marvel Studios và phân phối bởi Walt Disney Studios Motion Pictures.
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="#" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Watch now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SLIDE ITEM -->
                <!-- SLIDE ITEM -->
                <div class="hero-slide-item">
                    <img src="{{asset('./images/supergirl-banner.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                Supergirl
                            </div>
                            <div class="movie-infos top-down delay-2">
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
                            <div class="item-content-description top-down delay-4">
                                   Chiến binh Báo Đen: Wakanda bất diệt là một bộ phim siêu anh hùng của Hoa Kỳ công chiếu năm 2022, dựa trên nhân vật Black Panther của Marvel Comics, được sản xuất bởi Marvel Studios và phân phối bởi Walt Disney Studios Motion Pictures.
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="#" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Watch now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SLIDE ITEM -->
                <!-- SLIDE ITEM -->
                <div class="hero-slide-item">
                    <img src="{{asset('./images/wanda-banner.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                Wanda Vision
                            </div>
                            <div class="movie-infos top-down delay-2">
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
                            <div class="item-content-description top-down delay-4">
                                   Chiến binh Báo Đen: Wakanda bất diệt là một bộ phim siêu anh hùng của Hoa Kỳ công chiếu năm 2022, dựa trên nhân vật Black Panther của Marvel Comics, được sản xuất bởi Marvel Studios và phân phối bởi Walt Disney Studios Motion Pictures.
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="#" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Watch now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SLIDE ITEM -->
            </div>
        </div>
        <!-- END HERO SLIDE -->
        <!-- TOP MOVIES SLIDE -->
        <div class="top-movies-slide">
            <div class="owl-carousel" id="top-movies-slide">
                <!-- MOVIE ITEM -->
                <div class="movie-item">
                    <img src="{{asset('./images/series/supergirl.jpg')}}" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            Supergirl
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
                </div>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <div class="movie-item">
                    <img src="{{asset('./images/movies/captain-marvel.png')}}" alt="">
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
                </div>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <div class="movie-item">
                    <img src="{{asset('./images/cartoons/demon-slayer.jpg')}}" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            Infinity Train
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
                </div>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <div class="movie-item">
                    <img src="{{asset('./images/movies/blood-shot.jpg')}}" alt="">
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
                </div>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <div class="movie-item">
                    <img src="{{asset('./images/series/wanda.png')}}" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            Wanda Vision
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
                </div>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <div class="movie-item">
                    <img src="{{asset('./images/movies/bat-man.jpg')}}" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            The Dark Knight
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
                </div>
                <!-- END MOVIE ITEM -->
            </div>
        </div>
        <!-- END TOP MOVIES SLIDE -->
    </div>
    <!-- END HERO SECTION -->

    <div class="section-film">
        <div class="columns is-multiline is-mobile title_filters__2FjQh d-flex mt-0 mx-auto justify-content-between pb-0">
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field">
                       <label class="label">Loại phim:</label>
                       <div class="control">
                          <div class="select">
                             <select>
                                <option selected="" value="">- Tất cả -</option>
                                <option value="movie">Phim Lẻ</option>
                                <option value="show">Phim Bộ</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field">
                       <label class="label">Thể loại:</label>
                       <div class="control">
                          <div class="select">
                             <select>
                                <option selected="" value="">- Tất cả -</option>
                                <option value="am-nhac">Âm nhạc</option>
                                <option value="bi-an">Bí ẩn</option>
                                <option value="chien-tranh">Chiến tranh</option>
                                <option value="chien-tranh-chinh-tri">
                                   Chiến tranh &amp; Chính trị
                                </option>
                                <option value="chinh-kich">Chính kịch</option>
                                <option value="gia-dinh">Gia đình</option>
                                <option value="giat-gan">Giật gân</option>
                                <option value="hai">Hài</option>
                                <option value="hanh-dong">Hành động</option>
                                <option value="hanh-dong-phieu-luu">
                                   Hành động &amp; Phiêu lưu
                                </option>
                                <option value="hoat-hinh">Hoạt hình</option>
                                <option value="kinh-di">Kinh dị</option>
                                <option value="ky-ao">Kỳ ảo</option>
                                <option value="lang-man">Lãng mạn</option>
                                <option value="lich-su">Lịch sử</option>
                                <option value="noi-chuyen">Nói chuyện</option>
                                <option value="phieu-luu">Phiêu lưu</option>
                                <option value="phim-dai-ky">Phim dài kỳ</option>
                                <option value="tai-lieu">Tài liệu</option>
                                <option value="thuc-te">Thực tế</option>
                                <option value="tin-tuc">Tin tức</option>
                                <option value="toi-pham">Tội phạm</option>
                                <option value="tre-em">Trẻ em</option>
                                <option value="truyen-hinh">Truyền hình</option>
                                <option value="vien-tay">Viễn Tây</option>
                                <option value="vien-tuong">Viễn tưởng</option>
                                <option value="vien-tuong-than-thoai">
                                   Viễn tưởng &amp; Thần thoại
                                </option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field">
                       <label class="label">Quốc gia:</label>
                       <div class="control">
                          <div class="select">
                             <select>
                                <option selected="" value="">- Tất cả -</option>
                                <option value="US">Mỹ</option>
                                <option value="KR">Hàn Quốc</option>
                                <option value="GB">Anh</option>
                                <option value="FR">Pháp</option>
                                <option value="CA">Canada</option>
                                <option value="HK">Hồng Kông</option>
                                <option value="JP">Nhật Bản</option>
                                <option value="CN">Trung Quốc</option>
                                <option value="TW">Đài Loan</option>
                                <option value="IN">Ấn Độ</option>
                                <option value="TH">Thái Lan</option>
                                <option value="AU">Úc</option>
                                <option value="VN">Việt Nam</option>
                                <option value="DE">Đức</option>
                                <option value="SE">Thụy Điển</option>
                                <option value="IT">Ý</option>
                                <option value="HU">Hungary</option>
                                <option value="IE">Ai-len</option>
                                <option value="MT">Malta</option>
                                <option value="NZ">New Zealand</option>
                                <option value="RU">Nga</option>
                                <option value="IS">Iceland</option>
                                <option value="FI">Phần Lan</option>
                                <option value="MW">Ma-la-uy</option>
                                <option value="CO">Colombia</option>
                                <option value="DK">Đan Mạch</option>
                                <option value="BE">Bỉ</option>
                                <option value="ES">Tây Ban Nha</option>
                                <option value="AR">Argentina</option>
                                <option value="NL">Hà Lan</option>
                                <option value="NO">Na Uy</option>
                                <option value="SG">Singapore</option>
                                <option value="PL">Ba Lan</option>
                                <option value="MY">Malaysia</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="NP">Nepal</option>
                                <option value="BG">Bulgaria</option>
                                <option value="KH">Campuchia</option>
                                <option value="PH">Philippines</option>
                                <option value="TR">Thổ Nhĩ Kỳ</option>
                                <option value="MA">Morocco</option>
                                <option value="BR">Brazil</option>
                                <option value="MX">Mexico</option>
                                <option value="CZ">Séc</option>
                                <option value="RO">Rumani</option>
                                <option value="PS">Palestine</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="ZA">Nam Phi</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field">
                       <label class="label">Năm:</label>
                       <div class="control">
                          <div class="select">
                             <select>
                                <option selected="" value="">- Tất cả -</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="-2012">Trước 2012</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field">
                       <label class="label">Thời lượng:</label>
                       <div class="control">
                          <div class="select">
                             <select>
                                <option selected="" value="">- Tất cả -</option>
                                <option value="0-30">Dưới 30 phút</option>
                                <option value="30-60">30&#x27; - 1 tiếng</option>
                                <option value="60-90">1 - 1.5 tiếng</option>
                                <option value="90-120">1.5 - 2 tiếng</option>
                                <option value="120-150">2 - 2.5 tiếng</option>
                                <option value="150-180">2.5 - 3 tiếng</option>
                                <option value="180-0">Trên 3 tiếng</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="column is-6-mobile mx-auto p-3">
                    <div class="field">
                       <label class="label">Sắp xếp:</label>
                       <div class="control">
                          <div class="select">
                             <select>
                                <option selected="" value="updated">
                                   Ngày cập nhật
                                </option>
                                <option value="publishDate">Ngày phát hành</option>
                                <option value="rating">Điểm đánh giá</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
            </div>
        @yield('content')
    </div>

    <!-- PRICING SECTION -->
    <div class="section">
        <div class="container">
            <div class="pricing">
                <div class="pricing-header">
                    Fl<span class="main-color">i</span>x pricing
                </div>
                <div class="pricing-list">
                    <div class="row">
                        <div class="col-4 col-md-12 col-sm-12">
                            <div class="pricing-box">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        Basic
                                    </div>
                                    <div class="pricing-price">
                                        Free
                                    </div>
                                </div>
                                <div class="pricing-box-content">
                                    <p>Originals</p>
                                    <p>Swich plans anytime</p>
                                    <p><del>65+ top Live</del></p>
                                    <p><del>TV Channels</del></p>
                                </div>
                                <div class="pricing-box-action">
                                    <a href="#" class="btn btn-hover">
                                        <span>Register now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-12 col-sm-12">
                            <div class="pricing-box hightlight">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        Premium
                                    </div>
                                    <div class="pricing-price">
                                        $35.99 <span>/month</span>
                                    </div>
                                </div>
                                <div class="pricing-box-content">
                                    <p>Originals</p>
                                    <p>Swich plans anytime</p>
                                    <p><del>65+ top Live</del></p>
                                    <p><del>TV Channels</del></p>
                                </div>
                                <div class="pricing-box-action">
                                    <a href="#" class="btn btn-hover">
                                        <span>Register now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-12 col-sm-12">
                            <div class="pricing-box">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        VIP
                                    </div>
                                    <div class="pricing-price">
                                        $65.99 <span>/month</span>
                                    </div>
                                </div>
                                <div class="pricing-box-content">
                                    <p>Originals</p>
                                    <p>Swich plans anytime</p>
                                    <p><del>65+ top Live</del></p>
                                    <p><del>TV Channels</del></p>
                                </div>
                                <div class="pricing-box-action">
                                    <a href="#" class="btn btn-hover">
                                        <span>Register now</span>
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