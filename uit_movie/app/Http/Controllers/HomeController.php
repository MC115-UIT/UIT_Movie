<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $c_category=Category::all()->count();
        $c_genre=Genre::all()->count();
        $c_country=Country::all()->count();
        $c_movie=Movie::all()->count();


        return view('home',compact('c_category','c_genre','c_country','c_movie'));
    }
}
