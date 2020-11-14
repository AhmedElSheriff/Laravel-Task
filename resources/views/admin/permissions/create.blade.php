@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-permissions-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">


    <form action="/admin/permission/create" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form-group row">
            <div class="col-8 offset-2">
                <label for="permission_name" class="col-md-4 col-form-label">{{ __('Permission Name') }}</label>

                <input id="permission_name" type="text" class="form-control{{ $errors->has('permission_name') ? ' is-invalid' : '' }}" name="permission_name" value="{{ old('permission_name') }}" autocomplete="permission_name" autofocus>

                @error('permission_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="form-group row pt-4">
            <div class="col-8 offset-2">
                <button type="submit" class="btn btn-primary">
                    Add New Permission
                </button>
            </div>
        </div>
    </form>

  </div><!-- /.container-fluid -->
</section>


@endsection
