<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){

        $blogs = Blog::latest()->paginate(4);
        $sliderblogs = Blog::latest()->take(5)->get();

        return view('theme.index',compact('blogs','sliderblogs'));

    }
    public function category($id){

        $blogs = Blog::where('category_id',$id)->paginate(4);
        $categoryname = Category::find($id)->name;

        return view('theme.category',compact('blogs','categoryname'));

    }

    public function contact(){

        return view('theme.contact');


    }


    public function loginn(){

        return view('theme.login');

    }

    public function registerr(){

        return view('theme.register');

    }
}
