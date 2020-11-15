@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-roles-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">


    <form action="/admin/roles/{{$role->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <div class="col-8 offset-2">
                <label for="name" class="col-md-4 col-form-label">{{ __('Role Name') }}</label>

                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ?? $role->name ?? ''}}" autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="form-group row">
            <div class="col-8 offset-2">
                <label for="permissions" class="col-md-4 col-form-label">{{ __('Role Permissions') }}</label>
                <select multiple name="permissions[]" id="permissions" class="w-100 height-400px">
                  @foreach($permissions as $permission)

                  @if($role->hasPermissionTo($permission->name))
                  <option selected>
                  @else
                  <option>
                  @endif
                    {{$permission->name}}
                  </option>

                  @endforeach
                </select>

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
