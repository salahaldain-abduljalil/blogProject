<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\storeBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



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
        if($blog->user_id == Auth::user()->id){

        $categories = Category::get();
        return view('theme.blogs.edit',compact('categories','blog'));

        }
        abort(403,'you can not access to this page');
    }

    /**
     * Update the my blog resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if($blog->user_id == Auth::user()->id){

        $data = $request->validated();

        if($request->hasfile('image')){

            //delete old image using the storage class.
            Storage::delete("public/blogs/$blog->image");

        //uploading image first step get image
        $image = $request->image;
        //change its current name
        $newname = time().'-'.$image->getclientOriginalName();
        //move it to my project
        $image->storeAs('blogs',$newname,'public');
        //save the new image to my DB
        $data['image'] = $newname;

        }
        $blog->update($data);

        return back()->with('updateblogs','your blog has been updated successfully');

    }
    abort(403,'you can not access to this page');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Storage::delete("public/blogs/$blog->image");
        $blog->delete();
        return back()->with('deleteblogs','your blog has been deleted successfully');

    }



       /**
     * Display my blog
     */
    public function myblog()
    {

        if(Auth::check()){
            $blogs = Blog::where('user_id' ,Auth::user()->id)->paginate(10);
            return view('theme.blogs.myblog',compact('blogs'));

        }
        abort(403,'you can not access to this page');
    }

}
