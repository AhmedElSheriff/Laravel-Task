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

      $users = \App\Models\User::all();
      $posts = \App\Models\Post::all();
      $roles = Role::all();
      $permissions = Permission::all();


      return view('admin/index', compact('users', 'posts', 'roles', 'permissions'));

    }

    public function users(){
      $users = \App\Models\User::orderBy('id', 'DESC')->get();


      return view('admin.users.users', [
        'users' => $users,
      ]);

    }

    public function posts(){
      $posts = \App\Models\Post::orderBy('id', 'DESC')->get();

      return view('admin.posts.posts', [
        'posts' => $posts,
      ]);
    }

    public function comments(){
      $comments = \App\Models\Comment::orderBy('id', 'DESC')->get();

      return view('admin.comments.comments', [
        'comments' => $comments,
      ]);
    }



    public function roles(){

      $roles = Role::orderBy('id', 'DESC')->get();

      return view('admin.roles.roles', [
        'roles' => $roles,
      ]);
    }

    public function permissions(){
      $permissions = Permission::orderBy('id', 'DESC')->get();
      return view('admin.permissions.permissions',[
        'permissions' => $permissions,
      ]);
    }


    public function createUser(){
      $roles = Role::all();
      return view('admin.users.create', [
        'roles' => $roles,
      ]);
    }

    public function editUser(\App\Models\User $user){

      $roles = Role::all();

      return view('admin.users.edit', [

        'user' => $user,
        'roles' => $roles,
      ]);
    }

    public function editPost(\App\Models\Post $post){
      return view('admin.posts.edit', [
        'post' => $post,
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

    public function createPermission(){
      return view('admin.permissions.create');
    }

    public function editPermission(Permission $permission){

      return view('admin.permissions.edit', [
        'permission' => $permission,
      ]);

    }


}
