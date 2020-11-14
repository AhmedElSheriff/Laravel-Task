@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-posts-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">

    <table id="users_table" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Post ID</th>
          <th>User</th>
          <th>Message</th>
          <td>Approved</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->message}}</td>
          <td>{{($post->approved) ? 'Yes' : 'No'}}</td>
          <td>
            <div class="d-flex">
            @if(!$post->approved)
            <a href="/admin/post/{{$post->id}}/approve" class="btn btn-primary mr-1">Approve</a>
            @endif
            <a href="" class="btn btn-secondary mr-1">Edit</a>
            <form method="POST" action="/admin/post/{{$post->id}}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" onclick="return confirm('Are you sure you want to DELETE this role?')">Delete</button>
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
