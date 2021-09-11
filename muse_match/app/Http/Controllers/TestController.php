<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\Post;

class TestController extends Controller
{
    public function test(Request $request) {
      $fav_counts = array();
      $posts = Post::all();
      foreach($posts as $post) {
        $fav = DB::table('favs')->where('post_id', $post->id)->first();
        array_push($fav_counts, $fav->fav_count);
      }
      return view('test.test', ['fav_counts' => $fav_counts]);
    }
    //
}
