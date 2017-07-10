<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use DateTime;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //validate
        $this->validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required'
        ));

        //store in database - no if/else statements needed for L 5.4
        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->address_city = $request->address_city;
        $post->start = new DateTime();
        $post->end = new DateTime();
        $post->user_id = Auth::user()->id;


        $post->save();

        //redirect to the page that displays the blog posts

        Session::flash('success', 'The blog post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        //photos "related" to this post
        $photos = $post->photo;
        return view('posts.show', compact('post', 'photos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a Variable

        $post = Post::find($id);
        return view('posts.edit')->withPost($post);

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
      $this->validate($request, array(
          'title' => 'required|max:255',
          'description' => 'required'
      ));

      $post = Post::find($id);

      $post->title = $request->input('title');
      $post->address_city = $request->input('address_city');
      $post->description = $request->input('description');

      $post->save();

      //redirect to the page that displays the blog posts

      Session::flash('success', 'The blog post was successfully updated!');

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', ' The blog post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
