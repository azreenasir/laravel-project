<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('search', 'SearchController@post')->name('search.posts');

Route::middleware('auth')->group(function(){

    Route::get('posts', 'PostController@index')->name('posts.index')->withoutMiddleware('auth');
    Route::get('posts/create', 'PostController@create')->name('posts.create');
    Route::post('posts/store', 'PostController@store');
    Route::get('posts/{post:slug}/edit', 'PostController@edit');
    Route::patch('posts/{post:slug}/edit', 'PostController@update');
    Route::delete('posts/{post:slug}/delete', 'PostController@destroy');
    Route::get('posts/{post:slug}', 'PostController@show')->name('posts.show')->withoutMiddleware('auth');
});

Route::get('categories/{category:slug}', 'CategoryController@show')->name('categories.show');

Route::get('tags/{tag:slug}', 'TagController@show')->name('tags.show');

Route::view('contact', 'contact');
Route::view('about', 'about');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
