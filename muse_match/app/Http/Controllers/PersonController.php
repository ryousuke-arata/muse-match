<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PrRequest;
use App\Http\Requests\UpdateRequest;

class PersonController extends Controller
{
    ////////ユーザー登録
    public function user_new(Request $request)
    {
        $url = $request->url();
        $session = session()->get('login_user');
        return view('user.user-new', ['url' => $url, 'session' => $session]);
    }

    public function user_new_post(PersonRequest $request)
    {
        $url = $request->url();
        $person = new Person;
        Person::createSave($request, $person);
        $user = session()->get('login_user');
        return view('user.user-top', ['user' => $user,'session' => $user, 'posts' => null, 'url' => $url, 'fav_counts' => null]);
    }
    ///////////////////////////

    //////////////////ログイン
    public function user_login(Request $request) 
    {
        $url = $request->url();
        session()->forget('login_user');
        return view('user.user-login', ['url' => $url]);
    }

    public function user_login_post(LoginRequest $request)
    {
        $url = $request->url();
        $data = Person::loginUser($request);
        $user = session()->get('login_user');
        $posts = $data->posts;
        $fav_counts = Person::loginFavCount($request);
        return view('user.user-top', ['user' => $user, 'session' => $user, 'posts' => $posts, 'url' => $url, 'fav_counts' => $fav_counts]);
    }
    //////////////////

    ////////////経歴・自己PR//////////////////////////
    public function pr_update(Request $request)
    {
        $session = session()->get('login_user');
        return view('user.pr', ['session' => $session, 'url' => $request->url()]);
    }

    public function pr_update_post(PrRequest $request)
    {
        Person::dataUpdate($request);
        $user = session()->get('login_user');
        $posts = Person::postsGet($user);
        $fav_counts = Person::loginFavCount($user);
        return view('user.user-top', ['user' => $user, 'session' => $user, 'url' => $request->url(), 'posts' => $posts,'fav_counts' => $fav_counts]);
    }
    ///////////////////////

    ////////////ユーザー情報更新
    public function user_update(Request $request)
    {
        $session = session()->get('login_user');
        return view('user.user-update', ['url' => $request->url(), 'session' => $session]);
    }

    public function user_update_post(UpdateRequest $request)
    {
        Person::dataUpdate($request);
        $user = session()->get('login_user');
        $posts = Person::postsGet($user);
        $fav_counts = Person::loginFavCount($user);
        return view('user.user-top', ['user' => $user, 'session' =>$user, 'url' => $request->url(), 'posts' => $posts, 'fav_counts' => $fav_counts]);
    }
    ////////////

    public function user_top(Request $request)
    {
        $user = session()->get('login_user');
        $posts = Person::postsGet($user);
        return view('user.user-top', ['user' => $user, 'session' =>$user, 'url' => $request->url(), 'posts' => $posts]);
    }
    
    public function test() {
        $data = Person::where('id', 'ryosan')->where('mail', 'ryosuke.arata')->exists();
        return view('test.test', ['data' => $data]);
    }
}
