<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    
    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
                @if(Auth::user())
                <div class="container">
                        @include('layouts.navbar')
                </div>
                @endif
            @yield('content')

        </main>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https:////cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript">
            $(document).ready( function () {
                $('.movie-table').DataTable();
            });
            function ChangeToSlug()
                {
                    

                    var slug;
                 
                    //Lấy text từ thẻ input title 
                    slug = document.getElementById("slug").value;
                    slug = slug.toLowerCase();
                    //Đổi ký tự có dấu thành không dấu
                        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                        slug = slug.replace(/đ/gi, 'd');
                        //Xóa các ký tự đặt biệt
                        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                        //Đổi khoảng trắng thành ký tự gạch ngang
                        slug = slug.replace(/ /gi, "-");
                        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                        slug = slug.replace(/\-\-\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-/gi, '-');
                        //Xóa các ký tự gạch ngang ở đầu và cuối
                        slug = '@' + slug + '@';
                        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                        //In slug ra textbox có id “slug”
                    document.getElementById('convert_slug').value = slug;
                }

    </script>
    <script type="text/javascript"">
        $(document).ready(function(){
            var api_key='9b8a6f760a02dd0e4b94362a42f14fb6';
            $("#add-movie").click(function(){

                if($("#add-movie-input").val()==""){

                    alert("Vui lòng Nhập dữ liệu");
                }
                else{
                        var imdbID=$("#add-movie-input").val();
                        var select = $('#select_api').find(":selected").val();
                        var Url = "https://api.themoviedb.org/3/movie/"+imdbID+"?api_key="+api_key+"&language=vi";
                        if(select=="show"){
                            Url = "https://api.themoviedb.org/3/tv/"+imdbID+"?api_key="+api_key+"&language=vi";
                        }
                        
                    $.ajax({
                    url: Url,
                    dataType:'json',
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    processData: false,
                    cache: false,
                    success: function (respone) {

                        console.log(respone)
                        // alert(respone["original_title"]);
                        //var jsonobj = JSON.parse(sup);
                     
                        if(select=="show"){
                            $("#slug").val(respone["original_name"]);
                        }
                        else{
                                  $("#slug").val(respone["original_title"]);
                        }
                      
                        $("#time-movie").val(respone["runtime"]);
                        $("#date-release").val(respone["release_date"]);
                        $("#tmdb-id").val(respone["id"]);
                        $("#imdb-point").val(parseFloat(respone["vote_average"]).toFixed(1));
                        $("#description").val(respone["overview"]);
                        $("#add-poster").attr('href',"https://image.tmdb.org/t/p/w500/" + respone["poster_path"]); 

                        // url_credit = "https://api.themoviedb.org/3/movie/"+imdbID+"/credits?api_key="+api_key+"&language=en-US";

                        // $.ajax({

                        //    url : url_credit,
                        //    dataType:'json',
                        //     type: "GET",
                        //     contentType: "application/json; charset=utf-8",
                        //      processData: false,
                        //     cache: false,
                        //     success: function (respone_credit){

                        //     console.log(respone_credit['crew'])

                        //     var l_director = new  Array();
                        //     var l_writing = new Array()

                        //         $.each(respone_credit["crew"], function(index){
                        //                 if(respone_credit["crew"][index]['job']=="Director"){

                                                
                        //                         l_director.push(respone_credit["crew"][index]['name']);
                                       
                        //                 }
                        //                 if(respone_credit["crew"][index]['job']=="Novel" || respone_credit["crew"][index]['job']=="Story"){ 

                                       
                        //                         l_writing.push(respone_credit["crew"][index]['name']);
                        //                 }
                        //         })

                        //         console.log(l_director.join(', '))
                        //         console.log(l_writing.join(', '))


                        //     },
                        //      error: function (xhr) {
                        //         alert('Không tìm thấy thông tin');
                        //     }
                        // })
                       
                    },
                    error: function (xhr) {
                        alert('Phim không tồn tại');
                    }
                    });
                }
            });
        });
</script>
<script type="text/javascript">
    $('.select-movie').change(function(){
        var id = $(this).find(':selected').val();
        $.ajax({

            url:"{{route('select-movie')}}",
            method:"GET",
            data:{id:id},
            success: function(data){
                $('#show_movie').html(data);
            }
        })

    })
</script>
   <!--  <script type="text/javascript">
       $(document).ready(function(){
             $('#sort_position').sortable({
            connectWith: "#sort_position",
            placeholder:'ui-state-highlight',
            axis: 'y',
            cursor: 'move',
            containment: 'parent',
            tolerance: 'pointer',
            items: "> tr",
            update:function(event, ui){
                var array_id=[];
                $('#sort_position tr').each(function(){
                    array_id.push($(this).attr('id'));
                })
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name='csrf-token']').attr('content')
                    },
                    url:"{{route('resorting')}}",
                    method:"POST",
                    data:{array_id:array_id},
                    success:function(data){
                        alert('Sắp xếp thứ tự thành công');
                    }
                })
            }
        })
       });
    </script>
       -->

</body>
</html>
