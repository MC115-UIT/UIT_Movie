<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use Flasher\Toastr\Prime\ToastrFactory;


class CountryController extends Controller
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

        $list=Country::all();
        return view('admincp.country.index',compact('list','c_category','c_genre','c_country','c_movie'));
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
        return view('admincp.country.form',compact('c_category','c_genre','c_country','c_movie'));
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
                'title'=>'required|unique:categories|max:255',
                'slug'=>'required|unique:categories|max:255',
                'description'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.unique'=>'Tên quốc gia đã có xin điền tên khác',
                'slug.unique'=>'Slug quốc gia đã có xin điền slug khác',
                'title.required'=>'Tên quốc gia phải có',
                'slug.required'=>'Slug quốc gia phải có',
                'description.required'=>'Mô tả phải có',
                'status.required'=>'Trạng thái hiển thị phải có',
            ]
        );
        $country=new Country();
        $country->title=$data['title'];
        $country->description=$data['description'];
        $country->status=$data['status'];
        $country->slug=$data['slug'];
        $country->save();
                 $flasher->addSuccess('Thêm quốc gia thành công!');

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
        //  $c_category=Category::all()->count();
    $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();
        
        $country = Country::find($id);
        $list=Country::all();
        return view('admincp.country.form',compact('list','country','c_category','c_genre','c_country','c_movie'));
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
                'title'=>'required',
                'slug'=>'required',
                'description'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.required'=>'Tên quốc gia phải có',
                'slug.required'=>'Slug quốc gia phải có',
                'description.required'=>'Mô tả phải có',
                'status.required'=>'Trạng thái hiển thị phải có',
            ]
        );
        $country=Country::find($id);
        $country->title=$data['title'];
        $country->description=$data['description'];
        $country->status=$data['status'];
        $country->slug=$data['slug'];
        $country->save();
                 $flasher->addSuccess('Cập nhật quốc gia thành công!');

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

        Country::find($id)->delete();
                 $flasher->addSuccess('Xóa quốc gia thành công!');

        return redirect()->back();
    }
}
