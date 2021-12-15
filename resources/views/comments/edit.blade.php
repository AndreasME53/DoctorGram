@extends('layouts.app')


@section('title')

       {{-- - Dr.  {{ App\Models\User::find($post->user_id)->name }}  --}}

@endsection

@section('content')

<form action="/comment/{{ $comment->id }}/update" method="POST">
    @csrf
    @method('PUT')
    <label for="exampleInputEmail1">Enter a comment</label>
    <div class="form-group">
        <textarea class="form-control" style="height:50px" name="description" required="" placeholder="Description" >{{ $comment->description }}</textarea>
      </div>
    <button type="submit" class="btn btn-sm btn-outline-primary">Update comment</button>
</form>
@endsection