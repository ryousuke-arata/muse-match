<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Follow;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function no_user_index(Request $request)
    {
        $url = $request->url();
        $posts = Post::all();
        $fav_counts = Post::indexFavGet($posts);
        return view('muse.index', ['posts' => $posts, 'url' => $url, 'fav_counts' => $fav_counts]);
    }

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

    public function post_new_post(PostRequest $request)
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
        $session = session()->get('login_user');
        return view('post.post-single', ['url' => $url, 'post' => $post, 'session' => $session]);
    }

    public function noUser_single_post(Request $request, $id)
    {
        $url = $request->url();
        $post = Post::where('id', $id)->first();
        return view('post.post-single', ['url' => $url, 'post' => $post]);
    }
///////////////////////////////////////////////////////////

    public function fav_update(Request $request, $id)
    {
        $url = $request->url();
        Post::favUpdate($request);
        $session = session()->get('login_user');
        $post = Post::where('id', $id)->first();
        return view('post.post-single', ['url' => $url, 'post' => $post, 'session' => $session]);
    }

    public function fav_update_index(Request $request) {
        $url = $request->url();
        Post::favUpdate($request);
        $posts = Post::get();
        return view('muse.index', ['url' => $url, 'posts' => $posts]);
    }

    public function fav_update_posts(Request $request) {
        $url = $request->url();
        $session = session()->get('login_user');
        Post::favUpdate($request);
        $posts = Post::where('person_id', '<>', $session->id)->get();
        return view('muse.index', ['url' => $url, 'posts' => $posts, 'session' => $session]);
    }

//////////////////////募集文表示ページからユーザーページへアクセス/////////////////////////////
    public function user_page(Request $request, $person_id)
    {
        $session = session()->get('login_user');
        $url = $request->url();
        $user = Post::userPageGet($person_id);
        $posts = Post::userPostsGet($person_id);
        return view('user.user-top', ['user' => $user, 'session' => $user, 'posts' => $posts, 'url' => $url]);
    }

    public function noUser_page(Request $request, $person_id)
    {
        $url = $request->url();
        $user = Post::userPageGet($person_id);
        $posts = Post::userPostsGet($person_id);
        return view('user.user-top', ['user' => $user, 'posts' => $posts, 'url' => $url]);
    }
///////////////////////////////////////////////////////////////////////////////

public function fav_index(Request $request) {
    $post = Post::where('id', $request->id)->increment('fav_count');
    return view('upload.upload', ['redirect' => $request->url]);
}
    //
}
