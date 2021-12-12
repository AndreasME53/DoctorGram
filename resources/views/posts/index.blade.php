@extends('layouts.app1')

@section('title')
        Dr. '{{$user ?? 'login in user'}}'
@endsection

@section('content')



  
@foreach ($posts as $post)

<div class="card shodow-ld">
    <div>
        
        <img class="postLogoPic" src="/img/medic.png">
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
      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('post.show', ['id' => $post->id ]) }}">View</a></button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
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

