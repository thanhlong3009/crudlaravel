<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
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

Route::get('/', function () {
    return view('welcome');
});
//
//Route::get('/home', function () {
//    return view('layouts.app');
//});
//
//Route::get('/about', function () {
//    return view('about');
//});
//
//Route::get('/task', function() {
//    $tasks = Task::all();
//    return view('tasks.tasks')->with('tasks', $tasks);
//});
////
////\
////
//Route::get('/first','FirstController@first');

//get la lay xuong, post la gui len
    Route::get('/task', 'TaskController@index');

    Route::get('/task/create', 'TaskController@viewCreate');

    Route::post('/create', 'TaskController@create');

    Route::delete('/delete/{id}', 'TaskController@delete');

    Route::get('task/show/{id}', 'TaskController@show');

    Route::get('/task/update/{task}', 'TaskController@viewUpdate');

    Route::post('/update/{task}', 'TaskController@update');


    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


