<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function __construct(){
      $this->middleware('auth');
  }


    public function index(\App\Models\User $user){


      return view('profile.index', compact('user'));
    }

    public function edit(\App\Models\User $user){

      $this->authorize('update', $user->profile);


      return view('profile.edit', compact('user'));
    }

    public function update(){
      $data = \request()->validate([
        'title' => 'required',
        'description' => 'required',
        'url' => 'url',
        'image' => '',
      ]);

      if(\request('image')){

        $image_path = \request('image')->store('profile', 'public');

        $image = \Intervention\Image\Facades\Image::make(public_path("storage/{$image_path}"))->fit(1000, 1000);
        $image->save();

        $data['image'] = $image_path;
      }

      auth()->user()->profile()->update($data);

      return redirect("/profile/" . auth()->user()->id);


    }
}
