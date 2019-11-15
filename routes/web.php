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

Route::get('/', 'Pages\HomepageController@show');

Route::get('/blogs/{p?}/{q?}', 'Pages\BlogsController@show')->where([
    'p' => '[0-9]+',   // page number
    'q' => '[0-9]+'    // quantity of posts on a page
]);

Route::get('/blogs/update/{p?}/{q?}', 'Ajax\PostListController@show')->where([
    'p' => '[0-9]+',   // page number
    'q' => '[0-9]+'    // quantity of posts on a page
]);


Route::get('/post/{id}', 'Pages\PostController@show')->where([
    'id' => '[0-9]+'
]);