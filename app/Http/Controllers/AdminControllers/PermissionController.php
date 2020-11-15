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

    public function destroy(Permission $permission){


      $permission->delete();

      return redirect('/admin/permissions');
    }

    public function update(Permission $permission){

      $data = \request()->validate([
        'name' => 'required'
      ]);

      $permission->update($data);

      return redirect('/admin/permissions');
    }


    public function store(){

      $data = \request()->validate([
        'name' => 'required'
      ]);


      $permission = Permission::create(['name' => strtolower($data['name'])]);

      return redirect('admin/permissions');


    }


}
