<?php
 namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use AppHttpControllersPostController;
use AppHttpControllersUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);

Route::resource('/', PostController::class)->names([
  'index' => 'posts.index',
  'create' => 'posts.create',
  'store' => 'posts.store',
  'show' => 'posts.show',
  
]);
Route::resource('/', UserController::class)->names([
'user'=> 'users.index',
'create' => 'users.create',
'store' => 'users.store',

]);
      
Route::post('/login', [UserController::class, 'login'])->name('login');

// Route::get('update', [PostController::class, 'update']);




