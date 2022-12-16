<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;

class ApiTmdbController extends Controller
{
    // private $api_key;

    //  public function __construct()
    // {
    //     $this->api_key ='9b8a6f760a02dd0e4b94362a42f14fb6' ;
    // }
    //
    public static function getInfoMovie($id_tmdb){

      $api_key ='9b8a6f760a02dd0e4b94362a42f14fb6' ;
            // $opts = [
            //     "http" => [
            //         "method" => "GET",
            //         "header" => "Accept-language: vi\r\n" .
            //             "Cookie: foo=bar\r\n"
            //     ]
            // ];

            // // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
            // $context = stream_context_create($opts);
        // $opts = array('http' => array('header' => 'Accept-Charset: UTF-8, *;q=0'));
        // $context = stream_context_create($opts);
        $moive=Movie::where('tmdb_id',$id_tmdb)->first();

        $movie_check = Category::where('id',$moive->category_id)->first();
        $rUrl = "https://api.themoviedb.org/3/movie/{$id_tmdb}?api_key={$api_key}&language=vi";
        if($movie_check->slug=="phim-bo"){

            $rUrl = "https://api.themoviedb.org/3/tv/{$id_tmdb}?api_key={$api_key}&language=vi";
        }


        $data = json_decode(file_get_contents($rUrl), true,JSON_UNESCAPED_UNICODE);

        return $data;
    }
    public static function getCredits($id_tmdb){

              $api_key ='9b8a6f760a02dd0e4b94362a42f14fb6' ;


               $moive=Movie::where('tmdb_id',$id_tmdb)->first();

        $movie_check = Category::where('id',$moive->category_id)->first();
         $rUrl = "https://api.themoviedb.org/3/movie/{$id_tmdb}/credits?api_key={$api_key}&language=en_US";
        if($movie_check->slug=="phim-bo"){

            $rUrl = "https://api.themoviedb.org/3/tv/{$id_tmdb}/credits?api_key={$api_key}&language=en_US";
        }


        $data = json_decode(file_get_contents($rUrl), true,JSON_UNESCAPED_UNICODE);

        return $data;

    }

     public static function getVideos($id_tmdb){

              $api_key ='9b8a6f760a02dd0e4b94362a42f14fb6' ;



        $moive=Movie::where('tmdb_id',$id_tmdb)->first();

        $movie_check = Category::where('id',$moive->category_id)->first();
        $rUrl = "https://api.themoviedb.org/3/movie/{$id_tmdb}/videos?api_key={$api_key}&language=en_US";
        if($movie_check->slug=="phim-bo"){

             $rUrl = "https://api.themoviedb.org/3/tv/{$id_tmdb}/videos?api_key={$api_key}&language=en_US";
        }

        

        $data = json_decode(file_get_contents($rUrl), true,JSON_UNESCAPED_UNICODE);

        return $data;

    }
    public static function checkTVshow($id_tmdb){

           $moive=Movie::where('tmdb_id',$id_tmdb)->first();

        $movie_check = Category::where('id',$moive->category_id)->first();

        if($movie_check->slug=="phim-bo"){

             return 1;
        }
        return 0;
    }
}

