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

Route::get('/', function () {return view('welcome');});

Route::get('/chat', function () {return view('chat');});

Route::get('/home/search/{name}',  [App\Http\Controllers\HomeController::class, 'search']);
Route::get('/home/mode', [App\Http\Controllers\HomeController::class, 'mode']);


Route::post('/home/update/image/{user}',  [App\Http\Controllers\ProfileController::class, 'update_image']);
Route::patch('/home/update/name/{user}',  [App\Http\Controllers\ProfileController::class, 'update_name']);
Route::patch('/home/update/status/{user}',  [App\Http\Controllers\ProfileController::class, 'update_status']);

Route::post('/home/send',  [App\Http\Controllers\MessageController::class, 'send']);
Route::get('/home/throw',  [App\Http\Controllers\MessageController::class, 'throwEvent']);
// Route::post('/home/test',  [App\Http\Controllers\MessageController::class, 'test']);

Route::get('/home/getMessages/{reciver_id}',  [App\Http\Controllers\MessageController::class, 'getMessages']);
Route::POST('/home/readMessage/{profile}',  [App\Http\Controllers\MessageController::class, 'readMessage']);
Route::get('/home/deleteMessages/{friend}',  [App\Http\Controllers\MessageController::class, 'deleteMessages']);

Route::get('/home/follow/{profile}',  [App\Http\Controllers\FollowController::class, 'follow']);
Route::get('/home/checkFollow/{profile}',  [App\Http\Controllers\FollowController::class, 'checkFollow']);
Route::post('/home/unfriend/{profile}',  [App\Http\Controllers\FollowController::class, 'unfriend']);

Route::post('/home/Online/{id}', [App\Http\Controllers\UserOnlineController::class, 'online']);
Route::post('/home/Offline/{id}', [App\Http\Controllers\UserOnlineController::class, 'offline']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
