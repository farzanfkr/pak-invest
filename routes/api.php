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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//basic authentication
Route::get('test',['middleware'=>'auth.basic','uses'=>function(){
    return response()->json('hiii',200);
}]);

Route::resource('project','API\UserController',['except'=>'create , edit']);

route::resource('user','API\ProjectController',['except'=>'create , edit']);
route::get('user/my-projects','API\ProjectController@myProject')->name('myProject.show');
route::get('user/my-investment','API\ProjectController@myInvestment')->name('myInvestment.show');

route::post('/project/{id}/investment','API\ProjectController@storeInvestor');
