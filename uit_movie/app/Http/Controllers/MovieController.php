<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Country;
use App\Models\Movie_Genre;
use App\Models\Episode;

use Carbon\Carbon;
use File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list=Movie::with('category','country','movie_genre','genre')->orderBy('id','DESC')->get();

        $path = public_path()."/json/";

        if(!is_dir($path)){
            mkdir($path,0777,true);

        } 
        File::put($path.'movies.json',json_encode($list));


        return view('admincp.movie.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=Category::pluck('title','id');
        $genre=Genre::pluck('title','id');
        $country=Country::pluck('title','id');

        $list_genre=Genre::all();
        return view('admincp.movie.form',compact('genre','category','country','list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->all();
        $movie=new Movie();
        $movie->title=$data['title'];
        $movie->description=$data['description'];
        $movie->status=$data['status'];
        $movie->slug=$data['slug'];
        $movie->category_id=$data['category_id'];
        // $movie->genre_id=$data['genre_id'];
        $movie->country_id=$data['country_id'];
                $movie->hot=$data['hot'];
        $movie->resolution=$data['resolution'];
        $movie->sotap=$data['sotap'];
        $movie->runtime=$data['runtime'];
        $movie->date_release=$data['date_release'];
        $movie->tmdb_id=$data['tmdb_id'];
        $movie->imdb_point=$data['imdb_point'];
        $movie->date_create=Carbon::now('Asia/Ho_Chi_Minh');
        $movie->date_update=Carbon::now('Asia/Ho_Chi_Minh');
        $movie->thuocphim=$data['thuocphim'];

        $movie->genre_id=$data['genre'][0];


        $get_image=$request->file('image');



        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/',$new_image);
            $movie->image=$new_image;
        }
        else{
            $movie->image="";
        }
        $movie->save();
        $movie->movie_genre()->attach($data['genre']);
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
        $category=Category::pluck('title','id');
        $genre=Genre::pluck('title','id');
        $country=Country::pluck('title','id');
         $list_genre=Genre::all();
       
        $movie=Movie::find($id);

        $movie_genre=$movie->movie_genre;
        return view('admincp.movie.form',compact('genre','category','country','movie','list_genre','movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=$request->all();
        $movie=Movie::find($id);
        $movie->title=$data['title'];
        $movie->description=$data['description'];
        $movie->status=$data['status'];
        $movie->slug=$data['slug'];
        $movie->category_id=$data['category_id'];
        // $movie->genre_id=$data['genre_id'];
        $movie->country_id=$data['country_id'];
        $movie->hot=$data['hot'];
        $movie->resolution=$data['resolution'];
        $movie->date_update=Carbon::now('Asia/Ho_Chi_Minh');
        $movie->sotap=$data['sotap'];
        $movie->thuocphim=$data['thuocphim'];


        $movie->runtime=$data['runtime'];
        $movie->date_release=$data['date_release'];
        $movie->tmdb_id=$data['tmdb_id'];
        $movie->imdb_point=$data['imdb_point'];

        $get_image=$request->file('image');


        if($get_image){
            if(file_exists('uploads/movie/'.$movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }else{
                 $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/',$new_image);
            $movie->image=$new_image;
            }
        }
        

            $movie->genre_id=$data['genre'][0];
        
        $movie->save();
                $movie->movie_genre()->sync($data['genre']);

        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        // Movie::find($id)->delete()
        
        $movie=Movie::find($id);
        
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        Movie_Genre::whereIn('movie_id',[$movie->id])->delete();

        Episode::whereIn('movie_id',[$movie->id])->delete();
        $movie->delete(); 
        return redirect()->back();
    }
    public function api_moive(){
        
    }
}
