<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(\App\Models\Post $post, $comment){

      $data = ['user_id' => auth()->user()->id,
      'post_id' => $post->id,
      'comment' => $comment
      ];

      $user = \App\Models\User::find(auth()->user()->id);


      $commentID = $post->comments()->create($data);
      $commentObj = \App\Models\Comment::find($commentID);


      $userName = ['username' => $user->name];
      $userComment = ['comment' => $commentObj[0]->comment];

      $mergedObj =  (array) $userName + $userComment;
  

      echo json_encode($mergedObj);
    }
}
