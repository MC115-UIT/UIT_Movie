<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Country;
use Carbon\Carbon;


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
        $list=Movie::with('category','country','genre')->orderBy('id','DESC')->get();

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


        return view('admincp.movie.form',compact('genre','category','country'));
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
        $movie->genre_id=$data['genre_id'];
        $movie->country_id=$data['country_id'];
                $movie->hot=$data['hot'];
        $movie->resolution=$data['resolution'];

        $movie->runtime=$data['runtime'];
        $movie->date_release=$data['date_release'];
        $movie->tmdb_id=$data['tmdb_id'];
        $movie->imdb_point=$data['imdb_point'];
        $movie->date_create=Carbon::now('Asia/Ho_Chi_Minh');
        $movie->date_update=Carbon::now('Asia/Ho_Chi_Minh');

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
        return redirect()->back();
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

       
        $movie=Movie::find($id);
        return view('admincp.movie.form',compact('genre','category','country','movie'));
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
        $movie->genre_id=$data['genre_id'];
        $movie->country_id=$data['country_id'];
        $movie->hot=$data['hot'];
        $movie->resolution=$data['resolution'];
        $movie->date_update=Carbon::now('Asia/Ho_Chi_Minh');


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
        $movie->save();
        return redirect()->back();
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

        // Movie::find($id)->delete();
        $movie=Movie::find($id);
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        } 
        $movie->delete(); 
        return redirect()->back();
    }
    public function api_moive(){
        
    }
}
