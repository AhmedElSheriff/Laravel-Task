@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-roles-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">


    <form action="/admin/role/create" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form-group row">
            <div class="col-8 offset-2">
                <label for="role_name" class="col-md-4 col-form-label">{{ __('Role Name') }}</label>

                <input id="role_name" type="text" class="form-control{{ $errors->has('role_name') ? ' is-invalid' : '' }}" name="role_name" value="{{ old('role_name') }}" autocomplete="role_name" autofocus>

                @error('role_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="form-group row pt-4">
            <div class="col-8 offset-2">
                <button type="submit" class="btn btn-primary">
                    Add New Role
                </button>
            </div>
        </div>
    </form>

  </div><!-- /.container-fluid -->
</section>


@endsection
