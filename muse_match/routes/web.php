<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

$personNamespace = 'App\Http\Controllers\PersonController@';
$postNamespace = 'App\Http\Controllers\PostController@';
$followNamespace = 'App\Http\Controllers\FollowController@';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


////////////////非会員用ページ
Route::get('/', $postNamespace . 'no_user_index');

//////////////////////会員用投稿一覧
Route::get('posts', $postNamespace . 'index');

//////////////////ユーザー情報
Route::get('user-top', $personNamespace . 'user_top');

///////////新規登録
Route::get('new', $personNamespace . 'user_new');

Route::post('new-top', $personNamespace . 'user_new_post');

//////////////ログイン
Route::get('login', $personNamespace . 'user_login');

Route::post('login-top', $personNamespace . 'user_login_post');

///////////////////自己ＰＲ登録
Route::get('pr-update', $personNamespace . 'pr_update');

Route::post('pr-update-top', $personNamespace . 'pr_update_post');

/////////////////////ユーザー情報更新
Route::get('update', $personNamespace . 'user_update');

Route::post('user-update-top', $personNamespace . 'user_update_post');

////////////////////募集文投稿/////////////////////
Route::get('post-new', $postNamespace . 'post_new');

Route::post('new-posts', $postNamespace . 'post_new_post');

////////////////個別投稿ページ
Route::get('post-single-{id?}', $postNamespace . 'single_post');

Route::post('post-single-{id?}', $postNamespace . 'fav_update');

//////////////////////投稿からユーザーページへ
Route::get('user-page/{person_id?}', $postNamespace . 'user_page');
