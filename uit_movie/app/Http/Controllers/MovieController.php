<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Country;
use App\Models\Movie_Genre;
use App\Models\Episode;
use Flasher\Toastr\Prime\ToastrFactory;

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
        $list=Movie::with('category','country','movie_genre','genre')->withCount('episode')->orderBy('id','DESC')->get();

        $path = public_path()."/json/";
        $category=Category::pluck('title','id');
        $country=Country::pluck('title','id');
        if(!is_dir($path)){
            mkdir($path,0777,true);

        } 
        File::put($path.'movies.json',json_encode($list));

         $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();


        return view('admincp.movie.index',compact('list','category','country','c_category','c_genre','c_country','c_movie'));
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
          $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();
        return view('admincp.movie.form',compact('genre','category','country','list_genre','c_category','c_genre','c_country','c_movie'));
    }
    public function category_select(Request $request){

      
        $data = $request->all();

        $category_id = $data['category_id'];
        $movie_id = $data['movie_id'];

        $movie = Movie::find($movie_id);
        $movie->category_id=$category_id;

        $movie->save();
       

        return redirect()->back();
       
    }
    public function country_select(Request $request){

      
        $data = $request->all();

        $country_id = $data['country_id'];
        $movie_id = $data['movie_id'];

        $movie = Movie::find($movie_id);
        $movie->country_id=$country_id;

        $movie->save();
       

        return redirect()->back();
       
    }
      public function  phimhot_select(Request $request){

      
        $data = $request->all();

        $hot = $data['hot_value'];
        $movie_id = $data['movie_id'];

        $movie = Movie::find($movie_id);
        $movie->hot=$hot;

        $movie->save();
       

        return redirect()->back();
       
    }
     public function  sub_select(Request $request){

      
        $data = $request->all();

        $sub_value = $data['sub_value'];
        $movie_id = $data['movie_id'];

        $movie = Movie::find($movie_id);
        $movie->subtitle=$sub_value;

        $movie->save();
       

        return redirect()->back();
       
    }
    public function  status_select(Request $request){

      
        $data = $request->all();

        $status_value = $data['status_value'];
        $movie_id = $data['movie_id'];

        $movie = Movie::find($movie_id);
        $movie->status=$status_value;

        $movie->save();
       

        return redirect()->back();
       
    }
    public function  resolution_select(Request $request){

      
        $data = $request->all();

        $res_value = $data['res_value'];
        $movie_id = $data['movie_id'];

        $movie = Movie::find($movie_id);
        $movie->resolution=$res_value;

        $movie->save();
       

        return redirect()->back();
       
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
                $flasher=app('flasher.toastr');

          $data =$request ->validate(
            [   
                'title'=>'required|unique:movies|max:255',
                'slug'=>'required|unique:movies|max:255',
                'description'=>'required|max:255',
                'sotap'=>'required|max:5',
                'runtime'=>'required|max:255',
                'imdb_point'=>'required|max:255',
                'date_release'=>'required',
                'genre'=>'required',
                                'image'=>'required'


                
            ],
            [
                'title.unique'=>'Tên phim đã có xin điền tên khác',
                'slug.unique'=>'Slug phim  đã có xin điền slug khác',
                'title.required'=>'Tên phim phải có',
                'slug.required'=>'Slug phim phải có',
                'description.required'=>'Mô tả phải có',
                'sotap.required'=>'Số tập phim phải có',
                'runtime.required'=>'Thời gian phim phải có',
                'imdb_point.required'=>'Điểm imdb phim phải có',
                'date_release.required'=>'Ngày ra mắt phải có',
                'genre.required'=>'Thể loại phim phải có',
                                'image.required'=>'Poster phim phải có'

            ]
        );
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

                 $flasher->addSuccess('Thêm phim thành công!');

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

         $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();

         $list_genre=Genre::all();
       
        $movie=Movie::find($id);

        $movie_genre=$movie->movie_genre;
        return view('admincp.movie.form',compact('genre','category','country','movie','list_genre','movie_genre','c_category','c_genre','c_country','c_movie'));
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
        $flasher=app('flasher.toastr');

        $data =$request ->validate(
            [   
                'title'=>'required|max:255',
                'slug'=>'required|max:255',
                'description'=>'required|max:255',
                'sotap'=>'required|max:5',
                'runtime'=>'required|max:255',
                'imdb_point'=>'required|max:255',
                'date_release'=>'required',
                'genre'=>'required',
                'image'=>'required'


                
            ],
            [
                'title.unique'=>'Tên phim đã có xin điền tên khác',
                'slug.unique'=>'Slug phim  đã có xin điền slug khác',
                'title.required'=>'Tên phim phải có',
                'slug.required'=>'Slug phim phải có',
                'description.required'=>'Mô tả phải có',
                'sotap.required'=>'Số tập phim phải có',
                'runtime.required'=>'Thời gian phim phải có',
                'imdb_point.required'=>'Điểm imdb phim phải có',
                'date_release.required'=>'Ngày ra mắt phải có',
                'genre.required'=>'Thể loại phim phải có',
                'image.required'=>'Poster phim phải có'

            ]
        );
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

         $flasher->addSuccess('Cập nhật phim thành công!');
        

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
                $flasher=app('flasher.toastr');

        $movie=Movie::find($id);
        
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        Movie_Genre::whereIn('movie_id',[$movie->id])->delete();

        Episode::whereIn('movie_id',[$movie->id])->delete();
        $movie->delete(); 
                 $flasher->addSuccess('Xóa phim thành công!');

        return redirect()->back();
    }
    public function api_moive(){
        
    }
}
