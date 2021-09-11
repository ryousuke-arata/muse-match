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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', $postNamespace . 'no_user_index');

Route::get('posts', $postNamespace . 'index');

Route::get('user-top', $personNamespace . 'user_top');

Route::get('new', $personNamespace . 'user_new');

//Route::post('new-login', $userNamespace . 'user_create');

Route::post('new-top', $personNamespace . 'user_new_post');

Route::get('login', $personNamespace . 'user_login');

Route::post('login-top', $personNamespace . 'user_login_post');

Route::get('pr-update', $personNamespace . 'pr_update');

Route::post('pr-update-top', $personNamespace . 'pr_update_post');

Route::get('update', $personNamespace . 'user_update');

Route::post('user-update-top', $personNamespace . 'user_update_post');

////////////////////募集文投稿/////////////////////
Route::get('post-new', $postNamespace . 'post_new');

Route::post('new-posts', $postNamespace . 'post_new_post');

Route::get('post-single-{id?}', $postNamespace . 'single_post');

Route::post('post-single-{id?}', $postNamespace . 'fav_update');

Route::get('user-page/{person_id?}', $postNamespace . 'user_page');

Route::get('test',  'App\Http\Controllers\TestController@test');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
