@extends('admin.layouts.admin')
@section('content')

<script>
document.getElementById("admin-comments-tab").classList.add('active');
</script>


<section class="content">
  <div class="container-fluid">

    <table id="users_table" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Comment ID</th>
          <th>Commenter</th>
          <th>Comment</th>
          <th>Post</th>
          <th>Approved?</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($comments as $comment)
        <tr>
          <td>{{$comment->id}}</td>
          <td><a href="/profile/{{$comment->user->id}}">{{$comment->user->name}}</a></td>
          <td>{{$comment->comment}}</td>
          <td><a href="/post/{{$comment->post->id}}">{{$comment->post->message}}</a></td>
          <td>{{($comment->approved) ? 'Yes' : 'No'}}</td>
          <td>
            <div class="d-flex">

              @if(!$comment->approved)
              <a href="/admin/comments/{{$comment->id}}/approve" class="btn btn-primary mr-1">Approve</a>
              @endif

            <form method="POST" action="/admin/comments/{{$comment->id}}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
