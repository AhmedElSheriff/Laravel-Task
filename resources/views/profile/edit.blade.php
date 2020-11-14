@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 offset-4 circle">
            <div class="col-md-3 p-5">
                <img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="height: 200px;">
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>

                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') ?? $user->profile->title ?? ''}}" autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>

                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') ?? $user->profile->description ?? '' }}" autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="url" class="col-md-4 col-form-label">{{ __('URL') }}</label>

                    <input id="url" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url') ?? $user->profile->url ?? ''}}" autocomplete="url" autofocus>

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>

                    <input type="file"  class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" name="image">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update Profile') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
