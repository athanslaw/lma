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

//Route::post('/user/register',array('uses'=>'UserRegistration@postRegister'));

// set header
Route::get('/cookie',function(){
   return response("Hello", 200)->header('Content-Type', 'text/html')
   ->header('X-Header-One', 'Header Value')
   ->header('X-Header-Two', 'Header Value');
});

Route::get('/user/register','UsersController@signup');
Route::get('/', 'Pages@index');
Route::post('/user/signup', 'UsersController@register');
Route::post('/user/signin', 'UsersController@signin');
Route::get('/login', 'UsersController@login');
Route::get('/myprofile', ['middleware'=>['authSession','authVerified'], 'uses'=>'UsersController@myprofile']);
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/user/view', 'UsersController@getUsers');
Route::get('/verified', 'UsersController@verified');
Route::get('/preference/make', ['middleware'=>['authSession','authVerified'], 'uses'=>'Preference@makepreference']);
Route::post('/preference/submitpreference', ['middleware'=>['authSession','authVerified'], 'uses'=>'Preference@submitpreference']);
Route::get('/preference/view', ['middleware'=>['authSession','authVerified'], 'uses'=>'Preference@viewpreference']);
Route::get('/preference/edit/{id}', ['middleware'=>['authSession','authVerified'], 'uses'=>'Preference@edit']);
Route::get('/profile/update', ['middleware'=>'authSession', 'uses'=>'UsersController@profile_update']);
Route::post('/profile/edit', ['middleware'=>'authSession', 'uses'=>'UsersController@profile_edit']);

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
