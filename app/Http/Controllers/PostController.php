<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Organization;
use Session;
use DateTime;
use Auth;
use Storage;

class PostController extends Controller
{
     public function __construct()
    {
        //Sets the middleware, uses except to spefiy whwere to ignore.
    $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::orderBy('start','desc')->get();
        

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $organizations = Organization::all();

        // return view('posts.create', compact('organizations'));

        // $posts = Post::all();

        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        $this->validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'avatar_photo'=>'image|nullable|max:1999',
            'start'=>'required|date|future_start',
            'end' =>'date',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug'
        ));


        // $start_date = $request->start_time;

        // DateTime::createFromFormat('j-M-Y', '15-Feb-2009');

        // dd($start_date);

        //handle file uploade
        if($request->hasFile('avatar_photo')){
            //Get Filename with the Extention
            $filenameWithExt = $request->file('avatar_photo')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extention = $request->file('avatar_photo')->getClientOriginalExtension();
            //file to store
            $fileNametoStore = $filename.'_'.time().'.'.$extention;
            //uploade image
            // $path = $request->file('post_photo')->storeAs('', $fileNametoStore);
            $path =Storage::putFileAs('public/avatar', $request->file('avatar_photo'), $fileNametoStore);
            // dd($path);

            //places Default file in storage
        } else{
            $fileNametoStore = 'carrotpath_1505454707.png';
        }

        //store in database - no if/else statements needed for L 5.4
        $post = new Post;
        //date and time start
        $post->start = $request->start;
        //date and time end
        $post->end = $request->end;
        $post->avatar_photo = $fileNametoStore;
        $post->org_name = $request->org_name;
        $post->org_site = $request->org_site;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->address_city = $request->address_city;
        // address_street used to store date
        $post->organization_id = $request->org_id;
        // $post->event_date = $request->event_date;
        $post->user_id = Auth::user()->id;
        // slug tag for url Events
        $post->slug = $request->slug;

        $post->save();

        //redirect to the page that displays the blog posts

        Session::flash('success', 'The Event post was successfully saved!');

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //
    //
    //
    //     $post = Post::find($id);
    //
    //     //Organization this post belongs to.
    //     $organization = Organization::find($post->organization_id);
    //     //photos "related" to this post
    //     $photos = $post->photo;
    //
    //
    //     return view('posts.show', compact('post', 'photos', 'organization'));
    //
    // }

    public function show($slug)
    {
        $this->middleware('auth');



      $post = Post::where('slug', '=', $slug)->first();

      // Return the view and include the slug
      return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $this->middleware('auth');

        //find the post in the database and save it as a Variable

        // $post = Post::find($slug);
        // return view('posts.edit')->withPost($post);

        $post = Post::where('slug', $slug)->first();
        return view('posts.edit')->withPost($post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->middleware('auth');

      $this->validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'avatar_photo'=>'image|nullable|max:1999',
            'start'=>'required|date|future_start',
            'end' =>'date'
        ));
 if($request->hasFile('avatar_photo')){
            //Get Filename with the Extention
            $filenameWithExt = $request->file('avatar_photo')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extention = $request->file('avatar_photo')->getClientOriginalExtension();
            //file to store
            $fileNametoStore = $filename.'_'.time().'.'.$extention;
            //uploade image
            // $path = $request->file('post_photo')->storeAs('', $fileNametoStore);
            $path =Storage::putFileAs('public/avatar', $request->file('avatar_photo'), $fileNametoStore);
            // dd($path);

            //places Default file in storage
        } else{
            $fileNametoStore = 'carrotpath_1505454707.png';
        }


      $post = Post::where('slug', $slug)->first();

        $post->start = $request->start;
        //date and time end
        $post->end = $request->end;
        $post->avatar_photo = $fileNametoStore;
        $post->org_name = $request->org_name;
        $post->org_site = $request->org_site;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->address_city = $request->address_city;
        // address_street used to store date
        $post->organization_id = $request->org_id;
        // $post->event_date = $request->event_date;
        $post->user_id = Auth::user()->id;
        // slug tag for url Events
        $post->slug = $slug;

        $post->save();

        //redirect to the page that displays the blog posts

        Session::flash('success', 'The Event post was successfully saved!');

        return redirect()->route('posts.show', $post->slug);
      $post->save();

      //redirect to the page that displays the blog posts

      Session::flash('success', 'The blog post was successfully updated!');

      return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $this->middleware('auth');

        $post = Post::where('slug', $slug)->first();

        $post->delete();

        Session::flash('success', ' The Event post was successfully deleted!');
        return redirect()->route('posts.index');
    }


}
