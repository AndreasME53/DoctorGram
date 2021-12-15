@extends('layouts.app')

@section('title')
        - HomePage
@endsection

@section('content')

<link href="/css/styles.css" rel="stylesheet">
    @if (Auth::check())
<div class="container " >
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
                <input type="text" id="title" name="title" class="form-control" required="" placeholder="Title" value="{{ old('name')}}" >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" style="height:50px" name="description" required="" placeholder="Description" value="{{ old('description')}}"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">You may add an image: jpeg,png,jpg</label>
                <div >
                  <input type="file" name="image">
                </div>
              </div>
            <button type="submit" class="btn btn-primary btn-md">Send</button>
            </div>
            
    </form></div><hr><hr>
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


      @if (Auth::id() == App\Models\User::find($post->user_id)->id)


 {{-- just need this to work--}}
      <a class="btn btn-sm btn-outline-secondary" href="/case/{{$post->id}}/edit" role="button">Edit</a>
 {{-- just need this to work--}}
      
 
      
      @endif 

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

