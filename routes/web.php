<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['role:manager']], function () {

//Admin List Views
  Route::get('/admin', [App\Http\Controllers\AdminControllers\AdminController::class, 'index']);
  Route::get('/admin/users', [App\Http\Controllers\AdminControllers\AdminController::class, 'users']);
  Route::get('/admin/posts', [App\Http\Controllers\AdminControllers\AdminController::class, 'posts']);
  Route::get('/admin/roles', [App\Http\Controllers\AdminControllers\AdminController::class, 'roles']);
  Route::get('/admin/permissions', [App\Http\Controllers\AdminControllers\AdminController::class, 'permissions']);

//Admin Create Form Views
  Route::get('/admin/users/add', [App\Http\Controllers\AdminControllers\AdminController::class, 'createUser']);
  Route::get('/admin/roles/add', [App\Http\Controllers\AdminControllers\AdminController::class, 'createRole']);
  Route::get('/admin/permissions/add', [App\Http\Controllers\AdminControllers\AdminController::class, 'createPermission']);

//Admin Edit Form Views
  Route::get('/admin/users/{user}/edit', [App\Http\Controllers\AdminControllers\AdminController::class, 'editUser']);
  Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\AdminControllers\AdminController::class, 'editPost']);
  Route::get('/admin/roles/{role}/edit', [App\Http\Controllers\AdminControllers\AdminController::class, 'editRole']);
  Route::get('/admin/permissions/{permission}/edit', [App\Http\Controllers\AdminControllers\AdminController::class, 'editPermission']);

//Admin Users CRUD
  Route::post('/admin/users/create', [App\Http\Controllers\AdminControllers\UserController::class, 'store']);
  Route::patch('/admin/users/{user}', [App\Http\Controllers\AdminControllers\UserController::class, 'update']);
  Route::delete('/admin/users/{user}', [App\Http\Controllers\AdminControllers\UserController::class, 'destroy']);

//Admin Posts CRUD
  Route::get('/admin/posts/{post}/approve', [App\Http\Controllers\AdminControllers\PostController::class, 'approvePost']);
  Route::patch('/admin/posts/{post}', [App\Http\Controllers\AdminControllers\PostController::class, 'update']);
  Route::delete('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy']);

//Admin Roles CRUD
  Route::post('/admin/roles/create', [App\Http\Controllers\AdminControllers\RoleController::class, 'store']);
  Route::patch('/admin/roles/{role}', [App\Http\Controllers\AdminControllers\RoleController::class, 'update']);
  Route::delete('/admin/roles/{role}', [App\Http\Controllers\AdminControllers\RoleController::class, 'destroy']);

//Admin Permissions CRUD
  Route::post('/admin/permissions/create', [App\Http\Controllers\AdminControllers\PermissionController::class, 'store']);
  Route::patch('/admin/permissions/{permission}', [App\Http\Controllers\AdminControllers\PermissionController::class, 'update']);
  Route::delete('/admin/permissions/{permission}', [App\Http\Controllers\AdminControllers\PermissionController::class, 'destroy']);



});

//User Profile
  Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index']);
  Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
  Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update']);


//User Posts
  Route::group(['middleware' => ['can:add posts']], function () {
    Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create']);
    Route::post('/post', [App\Http\Controllers\PostController::class, 'store']);
  });

//User Post Comments
Route::post('/posts/{post}/comments/{comment}', [App\Http\Controllers\CommentController::class, 'store']);
