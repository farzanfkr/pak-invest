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
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Auth::routes();

//route::get('/register','Auth\RegisterController@showRegistrationForm')->name('registerForm');
//route::post('/register','Auth\RegisterController@register')->name('register');
//route::get('/login','Auth\LoginController@showLoginForm')->name('loginForm');
//route::post('/login','Auth\LoginController@login')->name('login');

// project
route::get('/project','ProjectController@index')->name('project.index');
route::get('/project/create','ProjectController@create')->name('project.create');
route::post('/project','ProjectController@store')->name('project.store');
route::get('/project/{id}','ProjectController@show')->name('project.show');
route::post('/project/{id}/investor','ProjectController@storeInvestor');
route::get('/project/{id}/edit','ProjectController@edit')->name('project.edit');
route::put('/project/{title}','ProjectController@update')->name('project.update');
route::delete('/project/{Project}','ProjectController@delete')->name('project.delete');

// user
route::get('/users','UserController@index')->name('user.index');
route::get('/user/create','UserController@create')->name('user.create');
route::post('/user','UserController@store')->name('user.store');
route::get('/user/{id}','UserController@show')->name('user.show');
route::get('/user/{id}/edit','UserController@edit')->name('user.edit');
route::put('/user/{User}','UserController@update')->name('user.update');
route::delete('/user/{User}','UserController@delete')->name('user.delete');
