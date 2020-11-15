@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-roles-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">


    <form action="/admin/permissions/{{$permission->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <div class="col-8 offset-2">
                <label for="name" class="col-md-4 col-form-label">{{ __('Permission Name') }}</label>

                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ?? $permission->name ?? ''}}" autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>





        <div class="form-group row pt-4">
            <div class="col-8 offset-2">
                <button type="submit" class="btn btn-primary">
                    Edit Role
                </button>
            </div>
        </div>
    </form>

  </div><!-- /.container-fluid -->
</section>


@endsection
