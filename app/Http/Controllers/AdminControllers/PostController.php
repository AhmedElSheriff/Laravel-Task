<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Controllers\Controller;


class PostController extends Controller
{

  public function approvePost(\App\Models\Post $post){
    $post->update(['approved' => 1]);

    return redirect('/admin/posts');
  }

  public function update(\App\Models\Post $post){

    $data = \request()->validate([
      'message' => 'required',
    ]);

    $post->update($data);

    return redirect('/admin/posts');
  }



}
