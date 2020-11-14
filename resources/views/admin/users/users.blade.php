@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-users-tab").classList.add('active');
</script>

<section class="content">
  <div class="container-fluid">

    <table id="users_table" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>


          <td>
            <div class="justify-content-between">
            <button type="button" class="btn btn-primary" style="display:none;">View</button>
            <a href="/admin/users/{{$user->id}}/edit" type="button" class="btn btn-secondary">Edit</a>
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
