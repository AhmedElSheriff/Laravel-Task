@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-users-tab").classList.add('active');
</script>

<section class="content">
  <div class="container-fluid">

    <div class="d-flex justify-content-center pb-4 pt-4">
      <a href="/admin/users/add" type="button" class="btn btn-primary">Add User</a>
    </div>


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
            <div class="d-flex">
            <button type="button" class="btn btn-primary" style="display:none;">View</button>
            <a href="/admin/users/{{$user->id}}/edit" type="button" class="btn btn-secondary mr-1">Edit</a>
            <form action="/admin/users/{{$user->id}}" method="post">
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
