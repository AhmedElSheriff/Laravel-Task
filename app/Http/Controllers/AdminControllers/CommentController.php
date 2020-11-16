<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class CommentController extends Controller
{
    //

    public function destroy(\App\Models\Comment $comment){
      $comment->delete();

      return redirect('/admin/comments');
    }

    public function approveComment(\App\Models\Comment $comment){

      $comment->update(['approved' => 1]);

      return redirect('/admin/comments');

    }

}
