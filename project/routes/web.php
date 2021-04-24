<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function(){
    return view('home');
});

Route::get('posts/{slug}', 'PostController@show');

Route::view('contact', 'contact');
Route::view('about', 'about');