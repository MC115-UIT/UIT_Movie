<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Http\Controllers\ApiTmdbController;
use DB;

class IndexController extends Controller
{
    //return home page 
    public function home(){
        $category=Category::orderBy('id','DESC')->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();

        return view('pages.home',compact('category','genre','country'));
    }


     public function category($slug){
         $category=Category::orderBy('id','DESC')->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();

        $cate_slug=Category::where('slug',$slug)->first();

        $movie_cate = Movie::where('category_id',$cate_slug->id)->where('status',1)->paginate(20);



        return view('pages.category',compact('category','genre','country','cate_slug','movie_cate'));
        
    }
     public function genre(){
        $category=Category::orderBy('id','DESC')->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();

        $genre_slug=Genre::where('slug',$slug)->first();

        $movie_genre = Movie::where('genre_id',$genre_slug->id)->where('status',1)->paginate(20);


        return view('pages.genre',compact('category','genre','country','genre_slug','movie_genre'));
        
    }
     public function country(){
          $category=Category::orderBy('id','DESC')->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();

        $country_slug=Country::where('slug',$slug)->first();

        $movie_country = Movie::where('country_id',$country_slug->id)->where('status',1)->paginate(20);



        return view('pages.country',compact('category','genre','country','country_slug','movie_country'));
            }
     public function movie($slug){

        $category=Category::orderBy('id','DESC')->get();
                $genre=Genre::orderBy('id','DESC')->get();
                $country=Country::orderBy('id','DESC')->get();

                // $movie_slug=Movie::where('slug',$slug)->first();

             $movie_slug=Movie::with('category','country','genre')->where('slug',$slug)->where('status',1)->first();


                $movie_info=ApiTmdbController::getInfoMovie($movie_slug->tmdb_id);

                $movie_credits=ApiTmdbController::getCredits($movie_slug->tmdb_id);

                $movie_videos = ApiTmdbController::getVideos($movie_slug->tmdb_id);

                $movie_check = ApiTmdbController::checkTVshow($movie_slug->tmdb_id);

                $movie_related = Movie::with('category','country','genre')->where('category_id',$movie_slug->category_id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

                // $movie_related_info = ApiTmdbController::getInfoMovie($movie_related->tmdb_id);
                
    return view('pages.movie',compact('category','genre','country','movie_slug' ,'movie_info','movie_credits','movie_videos','movie_check','movie_related'));
    }


     public function watch(){

        return view('pages.watch');
    }
     public function episode(){

        return view('pages.episode');
    }
    public function login(){

        return view('pages.login');
    }
     public function signup(){

        return view('pages.signup');
    }

}
