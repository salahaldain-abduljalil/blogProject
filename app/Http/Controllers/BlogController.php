<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\storeBlogRequest;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('theme.blogs.create',compact('categories'));
        }



    /**
     * Store a newly created resource in storage.
     */
    public function store(storeBlogRequest $request)
    {

        $data = $request->validated();

        //uploading image first step get image
        $image = $request->image;
        //change its current name
        $newname = time().'-'.$image->getclientOriginalName();
        //move it to my project
        $image->storeAs('blogs',$newname,'public');
        //save the new image to my DB
        $data['image'] = $newname;
        $data['user_id'] = Auth::user()->id;
        //current user id

        Blog::create($data);
        return back()->with('blogstatus','has been created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog',compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }

}
