@extends('layouts.app')

@section('title')
        Dr. '{{$user ?? 'login in user'}}'
@endsection

@section('content')

<link href="/css/styles.css" rel="stylesheet">
    @if (Auth::check())
    <div class="addPost">
        <div class="card-header nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <h5>Below are the posts</h5>
        </div>
    </div>
    @else
    <div class="card-header nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <h5>Log in or register to be able to send posts</h5>
    </div>
    @endif

  
@foreach ($posts as $post)

<div class="card shodow-ld">
    <div>        
        <img class="postPicIndex" src="/img/medic.png">
    </div>
    <div class="postUsername:"><h3>
        Dr.{{ App\Models\Doctor::find($post->doctor_id)->lastName }} {{ App\Models\Doctor::find($post->doctor_id)->firstName }} </h3>
    </div>

    <div><h5>{{$post->title }}</h5></div>

{{--
    <p style="margin-left: 5px;">{{ $post->description }}</p>--}}


</div>
  <div class="d-flex justify-content-between align-items-center">
    <div class="btn-group">
      <a class="btn btn-sm btn-outline-primary" href="{{ route('post.show', ['id' => $post->id ]) }}" role="button">View</a>
      <a class="btn btn-sm btn-outline-secondary" href="{{ route('posts.create', ['id' => $post->id ]) }}" role="button">Edit</a>
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

