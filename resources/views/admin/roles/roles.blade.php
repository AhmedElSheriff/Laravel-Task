@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-roles-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">
    <div class="d-flex justify-content-center pb-4 pt-4">
      <a href="/admin/roles/add" type="button" class="btn btn-primary">Add Role</a>
    </div>

    <table id="users_table" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Role ID</th>
          <th>Name</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($roles as $role)
        <tr>
          <td>{{$role->id}}</td>
          <td>{{$role->name}}</td>
          <td>
            <div class="justify-content-between">
            <button type="button" class="btn btn-primary" style="display:none;">View</button>
            <a href="/admin/roles/{{$role->id}}/edit" type="button" class="btn btn-secondary">Edit</a>
            <a href="#" class="btn btn-danger">Delete</a>

            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div><!-- /.container-fluid -->
</section>


@endsection
