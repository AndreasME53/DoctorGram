@extends('layouts.app')


@section('title')

        Dr.  {{ App\Models\User::find($post->user_id)->name }} 

@endsection

@section('content')

<link href="/css/styles.css" rel="stylesheet">
<div class="card shadow-ld">
    <div>
        
        <img class="postPicShow" src="/img/medic.png">
    </div>
    <div class="container"> 
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class = "col">  Dr. {{ App\Models\User::find($post->user_id)->name }}</li>

            <li class="nav-item col-end text-end"><div class="d-flex justify-content-between align-items-center">
                {{-- <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('users.show', ['id' => $post->user_id ]) }}">View doctors detail's</a></button></li> --}}
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ url('/home') }}">Back</a></button></li>
        </ul>
    </div>
    </div>
    <div class="postDate">{{ $post->created_at }}</div>
    <div><h3>{{$post->title }}</h3></div>
    
    @if ($post->photo)

    @else

    @endif

    <p style="margin-left: 5px;">{{ $post->description }}</p>

</div>

@endsection
