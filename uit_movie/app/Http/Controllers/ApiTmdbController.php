<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTmdbController extends Controller
{
    //
    public function getInfoMovie($id_tmdb){

        $api_key='9b8a6f760a02dd0e4b94362a42f14fb6';
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

        $rUrl = "https://api.themoviedb.org/3/movie/{$id_tmdb}?api_key={$api_key}&language=vi";

        $data = json_decode(file_get_contents($rUrl), true,JSON_UNESCAPED_UNICODE);

        return $data['overview'];
    }
}

