<?php

/*
|--------------------------------------------------------------------------
| Application Routes                                                      |
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|--------------------------------------------------------------------------
| End Of Explanation                                                      |
|--------------------------------------------------------------------------
*/



Route::get('/','HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post' ,'uses'=>'AdminPostsController@post']);

//Middleware applied on the Contoller so we can exclude the store.
Route::resource('admin/comments', 'PostCommentController');

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('admin/users', 'AdminUsersController');

});

Route::group(['middleware'=>'author'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/categories', 'AdminCategoriesController');

    Route::resource('admin/media', 'AdminMediasController');

    Route::resource('admin/comment/replies', 'CommentRepliesController');

});


Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});