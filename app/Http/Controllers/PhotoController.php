<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Photo;
use App\Post;
use Storage;
use Illuminate\Http\File;


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
    		// $path = $request->file('post_photo')->storeAs('', $fileNametoStore); 
    		$path =Storage::putFileAs('public/photo', $request->file('post_photo'), $fileNametoStore);
    		// dd($path);
    		
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
        return redirect()->route('posts.show', ['id' => $post->post_id]);

    }
    public function edit($id)
    {
        $post = Photo::find($id);
        return view('photos.Edit')->withPost($post);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'description'=>'required',
            'title'=>'required'
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
            // $path = $request->file('post_photo')->storeAs('', $fileNametoStore); 
            $path =Storage::putFileAs('public/photo', $request->file('post_photo'), $fileNametoStore);
            // dd($path);
            
        } 
        

        
        //Change Photo 
        $post = Photo::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_photo = $fileNametoStore;
        if($request->hasFile('post_photo')){
            $post->post_photo = $fileNametoStore;
        }
        $post->save();
        return redirect()->route('posts.show', ['id' => $post->post_id]);
    }
    public function destroy($id)
    {
       $post = Photo::find($id);
       // dd(intval($post->user_id));
       //dd($post->user_id);

       //Checks to see if correct admin is deleating picture 
       if(intval(Auth::user()->id) !== intval($post->user_id)){
        // home route for testing change to more appropriate later 
            return redirect('/')->with('error', 'Unauthorized action');
       } 
       $post->delete();
       Storage::delete('public/photo/'.$post->post_photo);
       return back()->with('success', 'Photo Gone!');
    }
}
