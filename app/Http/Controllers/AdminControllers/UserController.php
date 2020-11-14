<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function store(){
      $data = \request()->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
      ]);

      $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);


      $user = \App\Models\User::find(\App\Models\User::create($data)->id);


      $roles = \request('roles') ?? [];
      foreach($roles as $role){

        $user->assignRole($role);
      }

      return redirect('/admin/users');

    }

    public function update(\App\Models\User $user){
      $data = \request()->validate([
        'name' => 'required',
        'email' => 'required',
      ]);

      $roles = \request('roles') ?? [];


      $userSaveRoles =  $user->getRoleNames();

/////   Assign Role to user   //////
      foreach($roles as $role){
        if(!in_array($role, (array) $userSaveRoles)){

            $user->assignRole($role);
        }
      }

      foreach($userSaveRoles as $userSaveRole){
        if(!in_array($userSaveRole, $roles)){

            $user->removeRole($userSaveRole);

        }
      }

      return redirect('/admin/users');

    }

    public function destroy(\App\Models\User $user){
      $user->delete();

      return redirect('/admin/users');
    }


}
