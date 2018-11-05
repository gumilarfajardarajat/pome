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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'API\UserController@details');
	Route::resource('project','API\ProjectController',[
		'except' => ['create','edit']
	]);
	Route::get('project/nip/{nip}', 'API\ProjectController@getProjectByNip');
	Route::get('task/nip/{nip}', 'API\TaskController@getTaskByNip');
	Route::get('task/project_structure/{id}', 'API\TaskController@getTaskByProjectStructure');
	Route::resource('task','API\TaskController',[
		'except' => ['create','edit']
	]);
	Route::resource('invoice','API\InvoiceController',[
		'except' => ['create','edit']
	]);
	Route::resource('team','API\TeamController',[
		'except' => ['create','edit']
	]);
	Route::resource('step','API\StepController',[
		'except' => ['create','edit']
	]);
	Route::resource('payment','API\PaymentController',[
		'except' => ['create','edit']
	]);							

});

