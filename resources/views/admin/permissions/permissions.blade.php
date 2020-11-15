@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-permissions-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">
    <div class="d-flex justify-content-center pb-4 pt-4">
      <a href="/admin/permissions/add" type="button" class="btn btn-primary">Add Permission</a>
    </div>

    <table id="users_table" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Permission ID</th>
          <th>Name</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($permissions as $permission)
        <tr>
          <td>{{$permission->id}}</td>
          <td>{{$permission->name}}</td>
          <td>
            <div class="d-flex">
            <button type="button" class="btn btn-primary" style="display:none;">View</button>
            <a href="/admin/permissions/{{$permission->id}}/edit" type="button" class="btn btn-secondary mr-1">Edit</a>
            <form action="/admin/permissions/{{$permission->id}}" method="post">
              @csrf
              @method('DELETE')

              <button href="" onclick="return confirm('Are you sure?')" class="btn btn-danger mr-1">Delete</button>
            </form>


            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div><!-- /.container-fluid -->
</section>


@endsection
