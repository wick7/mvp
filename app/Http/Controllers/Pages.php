<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use Illuminate\Http\Request;
use App\Post;
use Session;
use Auth;

class Pages extends Controller{

      public function getHome() {

       $user_id =0;

       // $user_id = Auth::user()->id;

         // dd($user_id);




        $posts = Post::paginate(3);

        return view('pages.home', compact('posts', 'user_id'));






      }
      public function getAbout() {
        // $first = 'Craig';
        // $last = 'Wickersham';
        //
        // $full = $first . ' ' . $last;
        // return view('pages.about')->with("fullname", $full);
        // return view('pages.about')->withFullname($full);
        return view('pages.about');
      }

      public function getContact() {
        // $first = 'Craig';
        // $last = 'Wickersham';
        //
        // $full = $first . ' ' . $last;
        // return view('pages.about')->with("fullname", $full);
        // return view('pages.contact')->withFullname($full);
        return view('pages.contact');
      }
}
