@extends('layouts.app')


@section('title')

       - Dr.  {{ App\Models\User::find($post->user_id)->name }} 

@endsection

@section('content')

<link href="/css/styles.css" rel="stylesheet">
<div class="addPost card-body">
<div class="card shadow-ld">
    <div>
        
        <img class="postPicShow" src="/img/medic.png">
    </div>
    <div class="container addPost card-body"> 
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class = "col">  Dr. {{ App\Models\User::find($post->user_id)->name }}</li>

            <li class="nav-item col-end text-end"><div class="d-flex justify-content-between align-items-center">
                {{-- <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('users.show', ['id' => $post->user_id ]) }}">View doctors detail's</a></button></li> --}}
                <a class="btn btn-sm btn-outline-primary" href="/doctors/{{$post->user_id}}" role="button">view doctor's details</a></li>
        </ul>
    </div>
    </div>
    <div class="postDate">{{ $post->created_at }}</div>
    <div><h3>{{$post->title }}</h3></div>
    
    @if ($post->photo)

    @else

    @endif

    <p style="margin-left: 5px;">{{ $post->description }}</p>
    <div >
        <div>
            <form action="/new/{{ $post->id }}/comment" method="POST">
                @csrf
                <label for="body">Enter your comment</label>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description:</label>
                    <textarea class="form-control" style="height:100px" name="description" required="" placeholder="Description" value="{{ old('description')}}"></textarea>
                  </div>
                <button type="submit" class="btn btn-sm btn-outline-primary">Add comment</button>
            </form>
        </div>
        <div class="btn-group">
          @if (Auth::id() == App\Models\User::find($post->user_id)->id)
          <a class="btn btn-sm btn-outline-secondary" href="#" role="button">Edit</a>@endif 
        </div>
      </div>
</div>

@foreach ($comments as $comment) 
<div class="card shodow-ld">
        <div class=" commentBox ">
            <div>
                <img class="postPicShow" src="/img/medic.png">
            </div>
                <div class="commentUsername">Commented by: Dr. {{ App\Models\User::find($comment->user_id)->name }}</div>
                <div class="postDate text-end">{{ App\Models\User::find($comment->user_id)->created_at }}</div>
                <hr>
                <div style="margin-left: 5px;">{{ ($comment->description) }}</div>
                @if ($comment->user_id == Auth::id())
                    <button type="submit" class="btn btn-outline-secondary">Edit comment</button>
                    <button type="submit" class="btn btn-outline-danger">Delete comment</button>
                @endif
        </div>
    </div>
    @endforeach
</div>
@endsection
