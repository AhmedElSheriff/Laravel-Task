@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-roles-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">


    <form action="/admin/users/create" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6 offset-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')  }}"  autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6 offset-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')  }}"  autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6 offset-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-3">
                <label for="roles" class="col-md-4 col-form-label">{{ __('User Roles') }}</label>
                <select multiple name="roles[]" id="roles" class="w-100 height-400px">
                  @foreach($roles as $role)
                  <option>

                  {{$role->name}}
                  </option>
                  @endforeach

                </select>

            </div>
        </div>


        <div class="form-group row pt-4">
            <div class="col-8 offset-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">
                    Create User
                </button>
            </div>
        </div>
    </form>

  </div><!-- /.container-fluid -->
</section>


@endsection
