<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function(){
    return view('home');
});

Route::get('posts', 'PostController@index');
Route::get('posts/{post:slug}', 'PostController@show');

Route::view('contact', 'contact');
Route::view('about', 'about');