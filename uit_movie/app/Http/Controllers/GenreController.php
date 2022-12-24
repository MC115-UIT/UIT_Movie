<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use Flasher\Toastr\Prime\ToastrFactory;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();

        $list=Genre::all();
        return view('admincp.genre.index',compact('list','c_category','c_genre','c_country','c_movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();
        return view('admincp.genre.form',compact('c_category','c_genre','c_country','c_movie'));
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
                'title'=>'required|unique:genres|max:255',
                'slug'=>'required|unique:genres|max:255',
                'description'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.unique'=>'Tên thể loại đã có xin điền tên khác',
                'slug.unique'=>'Slug thể loại đã có xin điền slug khác',
                'title.required'=>'Tên thể loại phải có',
                'slug.required'=>'Slug thể loại phải có',
                'description.required'=>'Mô tả phải có',
                'status.required'=>'Trạng thái hiển thị phải có',
            ]
        );
        $genre=new Genre();
        $genre->title=$data['title'];
        $genre->description=$data['description'];
        $genre->status=$data['status'];
        $genre->slug=$data['slug'];
        $genre->save();
                 $flasher->addSuccess('Thêm thể loại thành công!');

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
        $genre = Genre::find($id);
        $list=Genre::all();
        return view('admincp.genre.form',compact('list','genre','c_category','c_genre','c_country','c_movie'));
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
                'status'=>'required',
            ],
            [
                'title.required'=>'Tên thể loại phải có',
                'slug.required'=>'Slug thể loại phải có',
                'description.required'=>'Mô tả phải có',
                'status.required'=>'Trạng thái hiển thị phải có',
            ]
        );
        $genre=Genre::find($id);
        $genre->title=$data['title'];
        $genre->description=$data['description'];
        $genre->status=$data['status'];
        $genre->slug=$data['slug'];
        $genre->save();
                 $flasher->addSuccess('Cập nhật thể loại thành công!');

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
                $flasher=app('flasher.toastr');

        Genre::find($id)->delete();
                 $flasher->addSuccess('Xóa thể loại thành công!');

        return redirect()->back();
    }
}
