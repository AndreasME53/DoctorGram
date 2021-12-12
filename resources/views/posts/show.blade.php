@extends('layouts.app1')


@section('title')

        Dr.  {{ App\Models\Doctor::find($post->doctor_id)->lastName }} {{ App\Models\Doctor::find($post->doctor_id)->firstName }} 

@endsection

@section('content')


<div class="postContent">
    <div>
        
        <img class="postLogoPic" src="/img/medic.png">
    </div>
    <div class="postUsername:"> Dr.
        {{ App\Models\Doctor::find($post->doctor_id)->lastName }} {{ App\Models\Doctor::find($post->doctor_id)->firstName }} 
    </div>
    <div class="postDate">{{ $post->created_at }}</div>
    <div><h3>{{$post->title }}</h3></div>


    <p style="margin-left: 5px;">{{ $post->description }}</p>


</div>


@endsection

