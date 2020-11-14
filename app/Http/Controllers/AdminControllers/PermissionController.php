<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Controllers\Controller;


class PermissionController extends Controller
{
    //

    public function destroy(\App\Models\Role $role){


      $role->delete();

      return redirect('/admin/roles');
    }

    public function store(){
      $data = \request()->validate([
        'permission_name' => 'required'
      ]);

      $permission = Permission::create(['name' => strtolower($data['permission_name'])]);

      return redirect('admin/permissions');


    }


}
