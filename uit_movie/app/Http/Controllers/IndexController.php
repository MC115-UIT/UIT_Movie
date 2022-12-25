<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Http\Controllers\ApiTmdbController;
use App\Models\Rating;
use DB;

class IndexController extends Controller
{
    //return home page 
    public function home(){
        $category=Category::orderBy('id','DESC')->where('status',1)->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();

        $phim_moi=Category::where('slug','phim-moi')->first();
        $movie_new=Movie::where('category_id',$phim_moi->id)->where('hot',1)->orderBy('date_update','DESC')->get();
        $movie_hot=Movie::where('hot',1)->orderBy('date_update','DESC')->get();

        $movie_cate=Movie::orderBy('date_update','DESC')->get();
        $movie_le=Movie::where('thuocphim','phimle')->get();

        return view('pages.home',compact('category','genre','country','movie_hot','movie_new','movie_cate','movie_le'));
    }
    public static function getYear($date){
        $year = date('Y', strtotime($date));
        return $year;
    }

    public function filter(){


         $get_category = $_GET['category'];
        $get_genre = $_GET['genre'];
        $get_country = $_GET['country'];
        $get_year = $_GET['year'];
        $get_runtime = $_GET['runtime'];
        $get_order = $_GET['order'];
        if($get_category==0 && $get_genre==0 && $get_country==0 && $get_year==0 && $get_runtime==0 && $get_order==0){

                return redirect()->back();

        }
        else{

            $category=Category::orderBy('id','DESC')->where('status',1)->get();
            $genre=Genre::orderBy('id','DESC')->get();
            $country=Country::orderBy('id','DESC')->get();

            $movie=Movie::withCount('episode');

            if($get_category !=null && $get_category!=0){
                $movie=$movie->where('category_id','=',$get_category);
            }
            if($get_genre!=null && $get_genre!=0){



                $movie_genre=Movie_Genre::where('genre_id',$get_genre)->get();

                $many_genre=[];

                foreach($movie_genre as $key => $movi){

                    $many_genre[]=$movi->movie_id;
                }

        
                $movie = $movie->whereIn('id',$many_genre);

            }
            if($get_country!=null && $get_country!=0){
                $movie=$movie->where('country_id','=',$get_country);
            }
            if($get_year!=null && $get_year!=0){
                if($get_year==-2012){
                        

                     $movie=$movie->whereYear('date_release','<',$get_year);

                }else{
                     $movie=$movie->whereYear('date_release','=',$get_year);
                }

            }
            if($get_runtime!=null && $get_runtime!=0){
                if($get_runtime==1){
                        $movie=$movie->where('runtime','<',30);
                }elseif($get_runtime==2){
                        $movie=$movie->where('runtime','>=',30)->where('runtime','<=',60);
                }elseif($get_runtime==3){
                        $movie=$movie->where('runtime','>=',60)->where('runtime','<=',90);

                }elseif($get_runtime==4){
                        $movie=$movie->where('runtime','>=',90)->where('runtime','<=',120);

                }elseif($get_runtime==5){
                        $movie=$movie->where('runtime','>=',120)->where('runtime','<=',150);

                }elseif($get_runtime==6){
                        $movie=$movie->where('runtime','>=',150)->where('runtime','<=',180);

                }elseif($get_runtime==7){
                        $movie=$movie->where('runtime','>=',180);
                }

            }
            if($get_order!=null && $get_order!=0){
                if($get_order=='updated'){
                        $movie=$movie->orderBy('date_update','DESC');
                }elseif($get_order=='publishDate'){
                    $movie=$movie->orderBy('date_release','DESC');
                }elseif($get_order=='rating'){
                     $movie=$movie->orderBy('imdb_point','DESC');

                }

            }
              $phim_moi=Category::where('slug','phim-moi')->first();
        $movie_new=Movie::where('category_id',$phim_moi->id)->where('hot',1)->orderBy('date_update','DESC')->get();
        $movie_hot=Movie::where('hot',1)->orderBy('date_update','DESC')->get();

      
            $movie=$movie->where('status',1)->paginate(20);

        return view('pages.filter',compact('category','genre','country','movie','movie_hot','movie_new'));
        }
    }


 
    public function timkiem(){
    

     if(isset($_GET['search']) && $_GET['search'] !=""){

        $search=$_GET['search'];
        $movie=Movie::where('title','LIKE','%'.$search.'%')->paginate(20);

      // orderBy('ngaycapnhat','DESC')
            $category=Category::orderBy('id','DESC')->where('status',1)->get();
            $genre=Genre::orderBy('id','DESC')->get();
            $country=Country::orderBy('id','DESC')->get();

                         $phim_moi=Category::where('slug','phim-moi')->first();
        $movie_new=Movie::where('category_id',$phim_moi->id)->where('hot',1)->orderBy('date_update','DESC')->get();
        $movie_hot=Movie::where('hot',1)->orderBy('date_update','DESC')->get();


        return view('pages.search',compact('category','genre','country','movie','movie_hot','movie_new'));

        }
        else{
            return redirect()->to('/');
        }
    }

     public function category($slug){
         $category=Category::orderBy('id','DESC')->where('status',1)->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();
        $slug_check=$slug;
        $cate_slug=Category::where('slug',$slug)->first();

        $movie_cate = Movie::where('category_id',$cate_slug->id)->where('status',1)->paginate(20);

        $phim_moi=Category::where('slug','phim-moi')->first();
        $movie_new=Movie::where('category_id',$phim_moi->id)->where('hot',1)->orderBy('date_update','DESC')->get();
        $movie_hot=Movie::where('hot',1)->orderBy('date_update','DESC')->get();

        $phimle=Movie::where('thuocphim','phimle')->get();
        $phimbo=Movie::where('thuocphim','phimbo')->get();




        return view('pages.category',compact('category','genre','country','cate_slug','movie_cate','movie_hot','movie_new','phimle','phimbo','slug_check'));
        
    }
     public function genre($slug){
        $category=Category::orderBy('id','DESC')->where('status',1)->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();

        $genre_slug=Genre::where('slug',$slug)->first();

        $movie_genre=Movie_Genre::where('genre_id',$genre_slug->id)->get();

        $many_genre=[];

        foreach($movie_genre as $key => $movi){

            $many_genre[]=$movi->movie_id;
        }
         $phim_moi=Category::where('slug','phim-moi')->first();
        $movie_new=Movie::where('category_id',$phim_moi->id)->where('hot',1)->orderBy('date_update','DESC')->get();
        $movie_hot=Movie::where('hot',1)->orderBy('date_update','DESC')->get();



        $movie = Movie::whereIn('id',$many_genre)->where('status',1)->paginate(20);


        return view('pages.genre',compact('category','genre','country','genre_slug','movie','movie_hot','movie_new'));
        
    }
     public function country($slug){
          $category=Category::orderBy('id','DESC')->where('status',1)->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();

        $country_slug=Country::where('slug',$slug)->first();

        $movie_country = Movie::where('country_id',$country_slug->id)->where('status',1)->paginate(20);


          $phim_moi=Category::where('slug','phim-moi')->first();
        $movie_new=Movie::where('category_id',$phim_moi->id)->where('hot',1)->orderBy('date_update','DESC')->get();
        $movie_hot=Movie::where('hot',1)->orderBy('date_update','DESC')->get();

        return view('pages.country',compact('category','genre','country','country_slug','movie_country','movie_hot','movie_new'));
            }
     public function movie($slug){

        $category=Category::orderBy('id','DESC')->where('status',1)->get();
                $genre=Genre::orderBy('id','DESC')->get();
                $country=Country::orderBy('id','DESC')->get();

                // $movie_slug=Movie::where('slug',$slug)->first();

             $movie_slug=Movie::with('category','country','genre','movie_genre')->where('slug',$slug)->where('status',1)->first();


                $movie_info=ApiTmdbController::getInfoMovie($movie_slug->tmdb_id);

                $movie_credits=ApiTmdbController::getCredits($movie_slug->tmdb_id);

                $movie_videos = ApiTmdbController::getVideos($movie_slug->tmdb_id);

                $movie_check = ApiTmdbController::checkTVshow($movie_slug->tmdb_id);


                $movie_related = Movie::with('category','country','genre')->where('category_id',$movie_slug->category_id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

                $episode_first=Episode::with('movie')->where('movie_id',$movie_slug->id)->orderBy('episode','ASC')->take(1)->first();

        $episode_current_list = Episode::with('movie')->where('movie_id',$movie_slug->id)->get();
        $episode_current_list_count = $episode_current_list->count();

        $rating=Rating::where('movie_id',$movie_slug->id)->avg('rating');
        $rating=round($rating);
        $count_total=Rating::where('movie_id',$movie_slug->id)->count();

                // $movie_related_info = ApiTmdbController::getInfoMovie($movie_related->tmdb_id);


                
    return view('pages.movie',compact('category','genre','country','movie_slug' ,'movie_info','movie_credits','movie_videos','movie_check','movie_related','episode_current_list_count','episode_first','rating','count_total'));
    }
    public function add_rating(Request $request){

        $data = $request->all();

        $ip_address = $request->ip();


        $rating_count = Rating::where('movie_id',$data['movie_id'])->where('ip_address',$ip_address)->count();
        if($rating_count > 0){

            echo "exist";

        }else{

            $rating = new Rating();
            $rating->movie_id=$data['movie_id'];
            $rating->ip_address=$ip_address;
            $rating->rating=$data['index'];
            $rating->save();
            echo "done";
        }
    }


     public function watch($slug,$ep){

        if(isset($ep)){

            $tap = substr($ep, 3,10);

        }else{

            $tap=1;
        }

        $category=Category::orderBy('id','DESC')->where('status',1)->get();
        $genre=Genre::orderBy('id','DESC')->get();
        $country=Country::orderBy('id','DESC')->get();


    $movie=Movie::with('category','genre','country','movie_genre','episode')->where('slug',$slug)->where('status',1)->first();
        $episode_list = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->get();
  $movie_related = Movie::with('category','country','genre')->where('category_id',$movie->category_id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();



        // $current_episode = Episode::where('movie_id',$movie->id)->where('episode',$ep)->first();

        return view('pages.watch',compact('category','genre','country','movie','tap','episode_list','movie_related'));
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
