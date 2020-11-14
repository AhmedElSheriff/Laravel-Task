<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

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
}
