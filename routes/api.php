<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });    
    //Auth
    Route::post('/logout', 'AuthController@logout');
    //Ulasan Blogs
    Route::post('/createUlasanBlogs/{blogid}', 'API\UlasanBlogsController@createUlasanBlogs');
    Route::patch('/updateUlasanBlogs/{ulasanblogid}', 'API\UlasanBlogsController@updateUlasanBlogs');
    Route::post('/createBalasUlasanBlogs/{ulasanblogid}', 'API\UlasanBlogsController@createBalasUlasanBlogs');
    Route::patch('/updateBalasUlasanBlogs/{balasulasanblogid}', 'API\UlasanBlogsController@updateBalasUlasanBlogs');
});

//Home
Route::get('/home', 'API\HomeController@index');
Route::post('/subscribe', 'API\HomeController@subscribe');


//Blogs
Route::get('/blogs', 'API\BlogsController@blogs');
Route::get('/blogs/{id}', 'API\BlogsController@categoryBlogs');
Route::get('/posts/{url}', 'API\BlogsController@blogPost');

//Contact
Route::get('/contact','API\ContactController@contact');
Route::post('/message','API\ContactController@message');

//Auth
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

