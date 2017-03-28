<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'FrontendController@index');
Route::get('portfolio','FrontendController@portfolio');
Route::get('about','FrontendController@about');
Route::get('video','FrontendController@video');
Route::get('contact','FrontendController@contact');
Route::auth();

Route::get('home', 'HomeController@index');
Route::get('portfolio_backend','PortfolioController@index');
Route::post('addImageSlider','HomeController@addImageSlider');
Route::post('updateImageSlider','HomeController@updateImageSlider');
Route::post('deleteImage','HomeController@deleteImage');
Route::post('profile_add_images','PortfolioController@create');
Route::post('delete_prof_image','PortfolioController@destroy');
Route::post('edit_prof_image','PortfolioController@edit');
Route::get('video_backend','VideoController@index');
Route::post('video_add_url','VideoController@create');
Route::post('delete_prof_image_video','VideoController@destroy');
Route::post('edit_prof_image_video','VideoController@edit');
Route::post('video_header','VideoController@video_header');

//About Tab
//Route::get('about_backend' , 'AboutController@index');
Route::resource('about_backend', 'AboutController');
Route::post('update','AboutController@update');
Route::post('destroy','AboutController@destroy');

//contact
Route::resource('contact_backend', 'ContactusController');
Route::post('update','ContactusController@update');
Route::post('destroy','ContactusController@destroy');

