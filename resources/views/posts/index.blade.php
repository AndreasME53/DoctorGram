@extends('layouts.app')
@section('title')
- HomePage
@endsection
@section('content')
<link href="/css/styles.css" rel="stylesheet">
@if (Auth::check())

<div class="card">
<div class="addPost card-body">
   <div class="addPost card-body">
      @if(session('status'))
      <div class="alert alert-success">
         {{ session('status') }}
      </div>
      @endif
      <div class="card">
         <div class="card-header text-center font-weight-bold">
            Create a Case
         </div>
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <form action="{{ url('/new/case') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" id="title" name="title" class="form-control" required="" value="{{ old('title')}}" >
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" style="height:50px" name="description" required="" value="{{ old('description')}}"></textarea>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">You may add an image: jpeg,png,jpg</label>
                  <div >
                     <input type="file" name="image">
                  </div>
               </div>
               <button type="submit" class="btn btn-primary btn-md">Send</button>
            </div>
         </form>
      </div>
      <hr>
      <hr>
      @else
      <div class="addPost">
         <h5>Log in or register to be able to send posts</h5>
      </div>
      @endif
      <div class='card'>
      @foreach ($posts as $post)
      <div class='card'>
      <div class="card shodow-ld">
         <div>        
            <img class="postPicIndex" src="/img/medic.png">
         </div>
         <div class="postUsername:">
            <h3>
              Posted by: Dr. {{ App\Models\User::find($post->user_id)->name }} 
            </h3>
         </div>
         <div>
            <h5>{{$post->title }}</h5>
         </div>
         {{--
         <p style="margin-left: 5px;">{{ $post->description }}</p>
         --}}
      </div>
      <div class="d-flex justify-content-between align-items-center">
         <div class="btn-group">
            <a class="btn btn-sm btn-outline-primary" href="/case/{{$post->id}}" role="button">View</a>
            @if (Auth::id() == App\Models\User::find($post->user_id)->id)
            {{-- just need this to work--}}
            <a onclick="event.preventDefault(); document.getElementById('edit-post').submit();" class="btn btn-sm btn-outline-secondary" href="#" role="button">Edit</a>
            {{-- just need this to work--}}
            <form id="edit-post" action="/case/{{ $post->id }}/edit" method="GET" style="display: none;"></form>
            @endif 
         </div>
         <small class="text-muted">{{ $post->created_at }}</small>
      </div><div class ="col-sm">
          <p></p>
      </div>
      </div>
      
      @endforeach
   </div></div>
   
</div>
</div><div class="container col-md-6">
      <div class="paginator">
         {{ $posts->links() }}
      </div>
   </div>
@endsection
{{--
<div><a href="{{ route('post.show', ['id' => $post->id ]) }}">
   {{ App\Models\Doctor::find($post->doctor_id)->lastName }} 
</div>
--}}