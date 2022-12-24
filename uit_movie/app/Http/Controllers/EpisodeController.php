<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use Carbon\Carbon;
use Flasher\Toastr\Prime\ToastrFactory;


class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $list_episode = Episode::with('movie')->orderBy('id','DESC')->get();
         $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();
        return view('admincp.episode.index',compact('list_episode','c_category','c_genre','c_country','c_movie'));
    }
    public function add_episode($id){
        $movie=Movie::find($id);
        $list_episode = Episode::with('movie')->where('movie_id',$id)->orderBy('episode','DESC')->get();

         $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();
        return view('admincp.episode.add_episode',compact('list_episode','movie','c_category','c_genre','c_country','c_movie'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie=Movie::orderBy('id','DESC')->pluck('title','id');
        $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();

        return view('admincp.episode.form',compact('list_movie','c_category','c_genre','c_country','c_movie'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $flasher=app('flasher.toastr');

          $data =$request ->validate(
            [   
                'movie_id'=>'required',
                'link'=>'required',
                'episode'=>'required',
            ],
            [
                
                'movie_id.required'=>'Id phim phải có',
                'link.required'=>'Link tập phim phải có',
                'episode.required'=>'Tập phim phải có',
                
            ]
        );

         $episode_check=Episode::with('movie')->where('episode',$data['episode'])->where('movie_id',$data['movie_id'])->count();

         if($episode_check>0){

            return redirect()->back();
         }else{
                 $ep=new Episode();
                $ep->movie_id=$data['movie_id'];
                $ep->linkphim=$data['link'];
                $ep->episode=$data['episode'];
                
                $ep->created_at=Carbon::now('Asia/Ho_Chi_Minh');
                $ep->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
                         $flasher->addSuccess('Thêm tập phim thành công!');

                $ep->save();

         }

       
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
         $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();
        $list_movie=Movie::orderBy('id','DESC')->pluck('title','id');
        $episode=Episode::find($id);

        return view('admincp.episode.form',compact('episode','list_movie','c_category','c_genre','c_country','c_movie'));
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
                $flasher=app('flasher.toastr');

        $data =$request ->validate(
            [   
                'movie_id'=>'required',
                'link'=>'required',
                'episode'=>'required',
            ],
            [
                
                'movie_id.required'=>'Id phim phải có',
                'link.required'=>'Link tập phim phải có',
                'episode.required'=>'Tập phim phải có',
                
            ]
        );
        $ep=Episode::find($id);
        $ep->movie_id=$data['movie_id'];
        $ep->linkphim=$data['link'];
        $ep->episode=$data['episode'];
        
        $ep->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $ep->updated_at=Carbon::now('Asia/Ho_Chi_Minh');

        $ep->save();
                 $flasher->addSuccess('Cập nhật tập phim thành công!');

        return redirect()->route('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $flasher=app('flasher.toastr');

        $ep = Episode::find($id)->delete();
        //
                 $flasher->addSuccess('Xóa tập phim thành công!');

        return redirect()->to('episode');
    }
    public function select_movie(){

        $id=$_GET['id'];
        $movie=Movie::find($id);

        $output='<option>---Chọn tập phim---</option>';
        for($i=1; $i<=$movie->sotap;$i++){

            $output.='<option value="'.$i.'">'.$i.'</option>';
        }
        echo $output;

    }
}
