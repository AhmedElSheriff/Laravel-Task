@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>
        <div class="col-md-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>
                    {{$user->name}}
                </h1>



            </div>




            <div class="pt-4 font-weight-bold">
                {{$user->profile->title ?? 'Default Title'}}
            </div>

            <div>{{$user->profile->description ?? 'Default Description'}}</div>

            <div class="pt-4 font-weight-bold">
                <a href="{{$user->profile->url}}">{{$user->profile->url ?? 'Default URL'}}</a>
            </div>

            @can('update', $user->profile)

                <div class="d-flex align-items-baseline justify-content-between">
                    <div class="pt-3">
                      <a href="/profile/{{$user->id}}/edit" class="btn btn-secondary">Edit Profile</a>

                    </div>

                    @can('add posts')
                    <div>
                      <a href="/post/create" class="btn btn-secondary">Add New Post</a>
                    </div>
                    @endcan
                </div>
            @endcan
        </div>
    </div>
@include('flash::message')
    <div class="row pt-4">

        <div class="col-md-12 pb-3">

            <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="{{$user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width: 50px;">
                </div>
                <div>
                    <div class="font-weight-bold">
                        <a href="#">
                            <span class="text-dark">
                                {{$user->name}}
                            </span>
                        </a>
                    </div>
                </div>
            </div>

                </div>

                <div class="card-body">

                  <div class="row post-container" id="{{$post->id}}">
                    <div class="col-md-12">
                      {{ $post->message }}
                    </div>


                    <!-- Comments -->

                    @foreach($post->comments as $comment)
                    <!-- Start Comments Layout -->
                    <div class="col-md-12 pt-4 pb-4">
                      <div class="card">


                          <div class="card-body">

                            <div class="d-flex align-items-center">
                              <div class="pr-3">
                                <img src="{{$comment->user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width: 50px;">

                              </div>

                                  <div class="font-weight-bold">
                                      <a href="#"><span class="text-dark">{{$comment->user->name}}</span></a>
                                  </div>
                            </div>

                            <hr>


                            {{ $comment->comment }}
                          </div>

                      </div>
                    </div>

                    <!-- End Comments Layout -->
                    @endforeach
                    </div>
                    @can('add comment')
                    <div class="d-flex pt-4">
                      <!-- Start Comments Input -->
                    <div class="col-md-12">
                      <!-- <input class="comment-input" type="text" style="width: 100%"> -->
                      <send-comment post-id="{{$post->id}}"></send-comment>
                    </div>

                  </div>
                  @endcan
                  <!-- End Comments Input -->

                </div>
            </div>
        </div>

    </div>
@endsection
