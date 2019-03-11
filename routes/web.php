<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadsController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/threads','ThreadsController@index');
Route::post('/threads','ThreadsController@store');
Route::get('/threads/create','ThreadsController@create');
Route::get('/threads/{channel}/{thread}','ThreadsController@show'); 
//Route::resource('threads','ThreadsController');
Route::post('/threads/{channel}/{thread}/replies','RepliesController@store');

Route::get('/threads/{channel}','ThreadsController@index');