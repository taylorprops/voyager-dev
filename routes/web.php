<?php

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
	$posts = TCG\Voyager\Models\Post::all();
    return view('welcome2', compact('posts'));
});

Route::get('post/{slug}', function($slug){
	$post = TCG\Voyager\Models\Post::where('slug', '=', $slug)->firstOrFail();
	// WITH VS COMPACT - https://stackoverflow.com/questions/44963889/with-vs-compact-in-laravel
	//return view('post', compact('post'));
	return view('post')->with('post',$post);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
