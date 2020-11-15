<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Controllers\Controller;


class RoleController extends Controller
{
    //


    public function destroy(Role $role){


      $role->delete();

      return redirect('/admin/roles');
    }

    public function store(){
      $data = \request()->validate([
        'name' => 'required'
      ]);

      $role = Role::create(['name' => strtolower($data['name'])]);

      return redirect('admin/roles');


    }

    public function update(Role $role){

      $roleInfo = \request()->validate([
        'name' => 'required',
      ]);

      $data = \request('permissions') ?? [];


      $rolePermissions = $role->getAllPermissions();

/////////   Check if permission is not already saved to the role in the DB and assign it    ///////
      foreach($data as $permission){
        if(!in_array($permission, (array) $rolePermissions)){
          $role->givePermissionTo($permission);
        }
      }

/////////   Check if permission if the DB has permissions which are not in the last selected permissions and remove it   ///////

      foreach($rolePermissions as $rolePermission){
        if(!in_array($rolePermission['name'], $data)){
          $role->revokePermissionTo($rolePermission['name']);
        }
      }

      $role->update($roleInfo);

      return redirect('/admin/roles');

    }


}
