@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('tags.create')}}" class="btn btn-success">Add tags</a>
</div>

<div class="card card-default">
    <div class="card-header">tags</div>
    <div class="card-body">
     @if($tags->count() > 0)
     <table class="table">
      <thead>
          <th>Name</th>
          <th>Posts Count</th>
          <th></th>
      </thead>
      <tbody>
          @foreach ($tags as $tag)
          <tr>
              <td>{{ $tag->name}}</td>
              <td>
                0
                {{-- {{$tag->post->count()}} --}}
              </td>
              <td>
                  <button class="btn btn-danger btn-sm float-end" onclick="handleDelete({{ $tag->id }})"> Delete </button> 
                  <a href="{{route('tags.edit', $tag->id)}}" class=" mr-2 btn btn-sm btn-primary float-end">Edit</a>
              </td>
                  
          </tr>
          @endforeach
      </tbody>
  </table>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog">
<form action="" method="POST" id="deletetagForm">
  @csrf
  @method('DELETE')
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete tag</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold">
          Are you sure you want to delete this tag ?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go back</button>
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </div>
    </div>
</form>
</div>
</div>
@else
<h2 class="text-center">No tags yet</h2>
@endif
    </div>
</div>

@endsection

@section('scripts')
<script>
    function handleDelete(id) {
        let form = document.getElementById('deletetagForm');
        form.action = `/tags/${id}`;
        $('#deleteModal').modal('show');
    }
</script>

@endsection