<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'TasksController@getTasks')->name('tasks');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tasks', 'TasksController@getTasks')->name('tasks');
Route::post('/tasks', 'TasksController@postTasks')->name('postTasks');
Route::delete('/tasks/{tasks_id}', 'TasksController@deleteTasks')->name('deleteTasks')->where('tasks_id', '[0-9]+');
