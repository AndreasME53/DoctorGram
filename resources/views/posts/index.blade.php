@extends('layouts.app')

@section('title')
        HomePage
@endsection

@section('content')

<link href="/css/styles.css" rel="stylesheet">
    @if (Auth::check())
    <form action="{{ url('addpost') }}" method="POST">
        @csrf
        <div class="addPost">
            <h5>Create a Case</h5>
            <textarea class="form-control" name="body" rows="3" required></textarea>
            <button type="submit" class="btn btn-primary btn-lg">Send</button>
        </div>
    </form>
    @else
    <div class="addPost">
        <h5>Log in or register to be able to send posts</h5>
    </div>
    @endif

  
@foreach ($posts as $post)

<div class="card shodow-ld">
    <div>        
        <img class="postPicIndex" src="/img/medic.png">
    </div>
    <div class="postUsername:"><h3>
        Dr. {{ App\Models\User::find($post->user_id)->name }} </h3>
    </div>

    <div><h5>{{$post->title }}</h5></div>

{{--
    <p style="margin-left: 5px;">{{ $post->description }}</p>--}}


</div>
  <div class="d-flex justify-content-between align-items-center">
    <div class="btn-group">
      <a class="btn btn-sm btn-outline-primary" href="/case/{{$post->id}}" role="button">View</a>
      <a class="btn btn-sm btn-outline-secondary" href="#" role="button">Edit</a>
    </div>
    <small class="text-muted">{{ $post->created_at }}</small>
  </div>
@endforeach
@endsection

{{--
<div><a href="{{ route('post.show', ['id' => $post->id ]) }}">
    {{ App\Models\Doctor::find($post->doctor_id)->lastName }} 
</div>
--}}

