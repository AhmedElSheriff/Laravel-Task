<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    //

    public function index(){

      return view('admin/index');

    }

    public function users(){
      $users = \App\Models\User::all();


      return view('admin.users.users', [
        'users' => $users,
      ]);

    }

    public function roles(){

      $roles = Role::all();

      return view('admin.roles.roles', [
        'roles' => $roles,
      ]);
    }

    public function createRole(){
      return view('admin.roles.create');
    }

    public function editRole($roleID){
      $role = Role::find($roleID);
      $permissions = Permission::all();

      return view('admin.roles.edit', [
        'role' => $role,
        'permissions' => $permissions,
      ]);
    }

    public function editUser(\App\Models\User $user){

      $roles = Role::all();

      return view('admin.users.edit', [

        'user' => $user,
        'roles' => $roles,
      ]);
    }


    public function permissions(){
      $permissions = Permission::all();
      return view('admin.permissions.permissions',[
        'permissions' => $permissions,
      ]);
    }

    public function createPermission(){
      return view('admin.permissions.create');
    }


    public function posts(){
      $posts = \App\Models\Post::all();

      return view('admin.posts.posts', [
        'posts' => $posts,
      ]);
    }

    public function approvePost(\App\Models\Post $post){
      $post->update(['approved' => 1]);

      return redirect('/admin/posts');
    }
}
