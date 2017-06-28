<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Photo;
use App\Post;


class PhotoController extends Controller
{
	 public function index()
    {
        $posts = Photo::all();
        return view('photo.index')->withPosts($posts);
    }

      public function create($id)
    {
		$post_id = $id;
        return view('photos.Create', compact('post_id'));
    }

   public function store(Request $request,$id)
    {
    	$this->validate($request,[
    		'description'=>'required',
    		'title'=>'required',
    		'post_photo'=>'image|nullable|max:1999'
    		]);
    	//handle file uploade 
    	if($request->hasFile('post_photo')){
    		//Get Filename with the Extention 
    		$filenameWithExt = $request->file('post_photo')->getClientOriginalName();
    		// Get Just Filename 
    		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    		// Get Just ext
    		$extention = $request->file('post_photo')->getClientOriginalExtension();
    		//file to store 
    		$fileNametoStore = $filename.'_'.time().'.'.$extention;
    		//uploade image 
    		$path = $request->file('post_photo')->storeAs('public/photo', $fileNametoStore); 
    	} else{
    		$fileNametoStore = 'noimage.jpg';
    	}

    	
		//create Photo 
    	$post = new Photo;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_photo = $fileNametoStore;
        $post->user_id = Auth::user()->id;
        $post->post_id = $id;
        $post->save();

    }
}
