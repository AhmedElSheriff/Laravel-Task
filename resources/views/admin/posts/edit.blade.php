@extends('admin.layouts.admin')

@section('content')

<script>
document.getElementById("admin-posts-tab").classList.add('active');
</script>


<div class="container">

    <form action="/admin/posts/{{$post->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group row">
            <div class="col-8 offset-2">
                <label for="message" class="col-md-4 col-form-label">{{ __('Message') }}</label>

                <input id="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') ?? $post->message ?? '' }}" autocomplete="message" autofocus>

                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="form-group row pt-4">
            <div class="col-8 offset-2">
                <button type="submit" class="btn btn-primary">
                    Update Post
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
