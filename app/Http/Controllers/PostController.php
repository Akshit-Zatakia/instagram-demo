<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //create a post
    public function create(){
        return View('posts.create');
    } 
    
    public function store(){
        //Below is used to validate the form input types
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'], 
        ]);

        //set path for image
        $imagePath = request('image')->store('uploads','public');

        //adjust the image size using intervention/images
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(500,500);
        $image->save();
        

        //This will give current user's id to add post on that particular user only (igonore the error)
        //We cant use this because we want image in our way : auth()->user()->posts()->create($data);
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
        
        //return to post page
        return redirect('/profile/'. auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts/show',[
            'post' => $post,
        ]);
    }
}
