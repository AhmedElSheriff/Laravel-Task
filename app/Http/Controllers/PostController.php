<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct(){
      $this->middleware('auth');
  }


    public function create(){
      return view('post.create');
    }

    public function store(){
      $data = \request()->validate([
        "message" => 'required'
      ]);

      auth()->user()->post()->create($data);

      flash('Your post is pending and waiting for approval');

      return redirect('/profile/' . auth()->user()->id);
    }
}
