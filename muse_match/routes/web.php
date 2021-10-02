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



Route::get('/', $postNamespace . 'no_user_index');

Route::get('/', $postNamespace . 'fav_update_index');

Route::get('#', $postNamespace . 'fav_update_index');

Route::get('posts', $postNamespace . 'index')->middleware('checkLogin');

Route::get('posts', $postNamespace . 'fav_update_posts')->middleware('checkLogin');

Route::get('user-top', $personNamespace . 'user_top')->middleware('checkLogin');

Route::get('new', $personNamespace . 'user_new');

Route::post('new-top', $personNamespace . 'user_new_post')->middleware('checkData');

Route::get('login', $personNamespace . 'user_login');

Route::post('login-top', $personNamespace . 'user_login_post')->middleware('checkLoginData');

Route::get('pr-update', $personNamespace . 'pr_update')->middleware('checkLogin');

Route::post('pr-update-top', $personNamespace . 'pr_update_post')->middleware('checkLogin');

Route::get('update', $personNamespace . 'user_update')->middleware('checkLogin');

Route::post('user-update-top', $personNamespace . 'user_update_post')->middleware('checkLogin');

////////////////////募集文投稿/////////////////////
Route::get('post-new', $postNamespace . 'post_new')->middleware('checkLogin');

Route::post('new-posts', $postNamespace . 'post_new_post')->middleware('checkLogin');

Route::get('noUser/post-single-{id?}', $postNamespace . 'noUser_single_post');

Route::get('post-single-{id?}', $postNamespace . 'single_post');

Route::post('post-single-{id?}', $postNamespace . 'fav_update');

Route::get('user-page/{person_id?}', $postNamespace . 'user_page');

Route::get('noUser/user-page/{person_id?}', $postNamespace . 'noUser_page');

Route::get('test', $personNamespace . 'test');