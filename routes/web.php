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
  Route::get('/admin', [App\Http\Controllers\AdminControllers\AdminController::class, 'index']);
  Route::get('/admin/users', [App\Http\Controllers\AdminControllers\AdminController::class, 'users']);
  Route::get('/admin/roles', [App\Http\Controllers\AdminControllers\AdminController::class, 'roles']);
  Route::get('/admin/permissions', [App\Http\Controllers\AdminControllers\AdminController::class, 'permissions']);
  Route::get('/admin/roles/add', [App\Http\Controllers\AdminControllers\AdminController::class, 'createRole']);
  Route::get('/admin/permissions/add', [App\Http\Controllers\AdminControllers\AdminController::class, 'createPermission']);
  Route::get('/admin/roles/{role}/edit', [App\Http\Controllers\AdminControllers\AdminController::class, 'editRole']);
  Route::get('/admin/users/{user}/edit', [App\Http\Controllers\AdminControllers\AdminController::class, 'editUser']);
  Route::patch('/admin/roles/{role}', [App\Http\Controllers\AdminControllers\RoleController::class, 'update']);
  Route::patch('/admin/users/{user}', [App\Http\Controllers\AdminControllers\UserController::class, 'update']);
  Route::post('/admin/role/create', [App\Http\Controllers\AdminControllers\RoleController::class, 'store']);
  Route::post('/admin/permission/create', [App\Http\Controllers\AdminControllers\PermissionController::class, 'store']);
  Route::get('/admin/posts', [App\Http\Controllers\AdminControllers\AdminController::class, 'posts']);
  Route::get('/admin/post/{post}/approve', [App\Http\Controllers\AdminControllers\AdminController::class, 'approvePost']);
  Route::delete('/admin/role/{role}', [App\Http\Controllers\AdminControllers\RoleController::class, 'destroy']);

});



Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update']);

Route::group(['middleware' => ['can:add posts']], function () {
  Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create']);

});



Route::post('/post', [App\Http\Controllers\PostController::class, 'store']);
