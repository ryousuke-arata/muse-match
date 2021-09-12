<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Follow;

class PostController extends Controller
{
    ////////////////非会員用の投稿一覧ページ
    public function no_user_index(Request $request)
    {
        $url = $request->url();
        $posts = Post::all();
        $fav_counts = Post::indexFavGet($posts);
        $data = array($posts, $fav_counts);
        return view('muse.index', ['posts' => $posts, 'url' => $url, 'fav_counts' => $fav_counts]);
    }
    ///////////////////////////////////

    ////////////////会員用の投稿一覧ページ
    public function index(Request $request)
    {
        $url = $request->url();
        $session = session()->get('login_user');
        $posts = Post::where('person_id', '<>', $session->id)->get();
        $fav_counts = Post::indexFavGet($posts);
        $data = array($posts, $fav_counts);
        return view('muse.index', ['session' => $session,'posts' => $posts, 'url' => $url, 'fav_counts' => $fav_counts]);
    }

//////////////////////募集文投稿/////////////////////////////
    public function post_new(Request $request)
    {
        $url = $request->url();
        $session = session()->get('login_user');
        return view('post.post-new', ['session' => $session, 'url' => $url]);
    }

    public function post_new_post(Request $request)
    {
        $session = session()->get('login_user');
        $url = $request->url();
        $post = Post::newPost($request);
        return view('post.post-single', ['post' => $post, 'url' => $url, 'session' => $session]);
    }
///////////////////////////////////////////////////////////

//////////////////////募集文表示/////////////////////////////
    public function single_post(Request $request, $id)
    {
        $url = $request->url();
        $post = Post::where('id', $id)->first();
        $fav = DB::table('favs')->where('post_id', $id)->first();
        return view('post.post-single', ['url' => $url, 'post' => $post,'fav' => $fav]);
    }
///////////////////////////////////////////////////////////

////////////////////いいね更新
    public function fav_update(Request $request, $id)
    {
        $url = $request->url();
        $post = Post::where('id', $id)->first();
        $fav = Post::favUpdate($request, $id);
        return view('post.post-single', ['url' => $url, 'post' => $post, 'fav' => $fav]);
    }

//////////////////////募集文表示ページからユーザーページへアクセス/////////////////////////////
public function user_page(Request $request, $person_id)
{
    $session = session()->get('login_user');
    $url = $request->url();
    $user = Post::userPageGet($person_id);
    $posts_info = Post::userPostsGet($person_id);
    return view('user.user-top', ['session' => $user, 'posts' => $posts_info['posts'], 'url' => $url, 'fav_counts' => $posts_info['favs']]);
}
///////////////////////////////////////////////////////////////////////////////
    //
}
