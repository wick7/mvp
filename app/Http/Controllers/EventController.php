<?php


//POSSIBLY NOT NEEDED

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getSingle($slug) {

      // Grab slug from DB
      $post = Post::where('slug', '=', $slug)->first();

      // Return the view and include the slug
      // return view('event.single')->withPost($post);
    }
}
