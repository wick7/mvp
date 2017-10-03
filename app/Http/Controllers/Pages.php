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
use Carbon\Carbon;
class Pages extends Controller{

      public function getHome() {

       $user_id =0;

       // $user_id = Auth::user()->id;

         // dd($user_id);




        $posts = Post::orderBy('start','asc') 
        ->where('start', '>=', Carbon::now())
        ->paginate(3);

        return view('pages.home', compact('posts', 'user_id'));






      }
      public function getTerms() {
        // $first = 'Craig';
        // $last = 'Wickersham';
        //
        // $full = $first . ' ' . $last;
        // return view('pages.about')->with("fullname", $full);
        // return view('pages.about')->withFullname($full);
        return view('pages.terms');
      }

      public function getCookies() {

        return view('pages.cookies');
      }

      public function getPrivacy() {

        return view('pages.privacy');
      }

      public function getAttribution() {

        return view('pages.attribution');
      }



}
