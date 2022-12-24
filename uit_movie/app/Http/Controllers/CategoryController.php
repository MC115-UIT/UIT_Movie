<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use Flasher\Toastr\Prime\ToastrFactory;

class CategoryController extends Controller
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

        $list=Category::orderBy('id','ASC')->get();
        return view('admincp.category.index',compact('list','c_category','c_genre','c_country','c_movie'));
        
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
        return view('admincp.category.form',compact('c_category','c_genre','c_country','c_movie'));
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
                'title.unique'=>'Tên danh mục đã có xin điền tên khác',
                'slug.unique'=>'Slug danh mục đã có xin điền slug khác',
                'title.required'=>'Tên danh mục phải có',
                'slug.required'=>'Slug danh mục phải có',
                'description.required'=>'Mô tả phải có',
                'status.required'=>'Trạng thái hiển thị phải có',
            ]
        );
        $category=new Category();
        $category->title=$data['title'];
        $category->description=$data['description'];
        $category->status=$data['status'];
        $category->slug=$data['slug'];

        $category->save();
                 $flasher->addSuccess('Thêm danh mục thành công!');

        return redirect()->route('category.index');


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

        $category = Category::find($id);
        $list=Category::orderBy('id','ASC')->get();
        return view('admincp.category.form',compact('list','category','c_category','c_genre','c_country','c_movie'));
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
               
                'title.required'=>'Tên danh mục phải có',
                'slug.required'=>'Slug danh mục phải có',
                'description.required'=>'Mô tả phải có',
                'status.required'=>'Trạng thái hiển thị phải có',
            ]
        );
        $category=Category::find($id);
        $category->title=$data['title'];
        $category->description=$data['description'];
        $category->status=$data['status'];
        $category->slug=$data['slug'];
        $category->save();
                 $flasher->addSuccess('Cập nhật danh mục thành công!');

       return redirect()->route('category.index');
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

        Category::find($id)->delete();
                 $flasher->addSuccess('Xóa danh mục thành công!');

        return redirect()->back();
    }
    public function resorting(Request $request){

        $data = $request->all();
        foreach($data['array_id'] as $key=>$value){
            $category=Category::find($value);

            $category->position=$key;
            $category->save();
        }
    }
}
