<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//lesson 34
Route::get('/admins-only', function(){
  if (Gate::allows('visitAdminPages')){
    return 'Only admins should be able to see this page.';
  }
  return 'Only admins, not allowed to see this page.';
});

// User related routes
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('auth');
Route::get('/manage-avatar', [UserController::class, 'showAvatarForm'])->middleware('auth');
Route::post('/manage-avatar', [UserController::class, 'storeAvatar'])->middleware('auth');

Route::post('/create-follow/{user:username}', [FollowController::class, 'createFollow'])->middleware('auth');;
Route::post('/create-follow/{user:username}', [FollowController::class, 'removeFollow'])->middleware('auth');;
// Blog post related routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('auth');
Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('auth');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost'])->middleware('auth');
Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware('can:delete,post');


Route::get('/post/{post}/edit', [PostController::class, 'showEditForm'])->middleware('can:update,post');

Route::put('/post/{post}', [PostController::class, 'actuallyUpdate'])->middleware('can:update,post');

//viewSinglePost

Route::get('/profile/{nameConnector:username}', [UserController::class, 'profile']);
