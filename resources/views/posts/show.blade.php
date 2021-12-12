@extends('layouts.app1')


@section('title')

        Dr.  {{ App\Models\Doctor::find($post->doctor_id)->lastName }} {{ App\Models\Doctor::find($post->doctor_id)->firstName }} 

@endsection

@section('content')


<div class="card shadow-lxx">
    <div>
        
        <img class="postLogoPic" src="/img/medic.png">
    </div>
    <div class="container"> 
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class = "col">  Dr. {{ App\Models\Doctor::find($post->doctor_id)->lastName }} {{ App\Models\Doctor::find($post->doctor_id)->firstName }} </li>

            <li class="nav-item col-end text-end"><div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('doctor.show', ['id' => $post->doctor_id ]) }}">View doctors detail's</a></button></li>
        </ul>
    </div>
    
    </div>
    <div class="postDate">{{ $post->created_at }}</div>
    <div><h3>{{$post->title }}</h3></div>
    
   
    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
    @if ($post->photo)

    @else

    @endif

    <p style="margin-left: 5px;">{{ $post->description }}</p>

    <div class="d-flex justify-content-between align-items-center">
        <div class=" btn-group">
          <button type="button" class="  btn btn-sm btn-outline-secondary"><a href="{{ route('post.show', ['id' => $post->id ]) }}">View patient detail's</a></button>
        </div>


</div>

@endsection
