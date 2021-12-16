@extends('layouts.app')


@section('title')

       - Dr.  {{ App\Models\User::find($post->user_id)->name }} 

@endsection

@section('content')

<link href="/css/styles.css" rel="stylesheet">
<div class="addPost card-body">

<div class="card shadow-ld">
  @if(session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
@endif
<div class="card">
  <div class="card-header text-center font-weight-bold">
    Edit Case
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


 {{-- just need this to work--}}

 

<form action="/case/{{$post->id}}/update" enctype="multipart/form-data" method="POST">
@csrf
@method('PUT')
<div class="form-group">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" id="title" name="title" class="form-control" required="" placeholder="Title" value="{{$post->title}}" >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea  type="text"  class="form-control" id="description" style="height:50px" name="description" required="">{{$post->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Enter a new image: jpeg,png,jpg</label>
        <div >
          @if ($post->image_path != null)      
    <div class = "m-auto">
        <div class="text-center w-40 h-30 ">
            <img src="{{ asset('images/' . $post->image_path)}}" class="w-4 h-30 mb-8 shadow-sm" alt="">
        </div>
    </div>@endif
</div>

          <input type="file" id="image" name="image">
          <input hidden type="file" id="same" name="same" value={{$post->image_path}}>
        </div>
      </div>
    <div class = " container text-left "><div class="col-1"> </div><hr><button type="submit" class="btn btn-outline-primary btn-md">SAVE YOUR EDIT</button></div>
    
    
</form>


{{-- <form method="POST" action="{{route('posts.destroy', $post->id)}}">
  @csrf
  @method('DELETE')
    <a type="submit" class="btn btn-sm btn-outline-danger"  role="button">Delete Post</a>
</form> --}}
<div class = " container text-right "><button class="btn btn-md btn-outline-danger" onclick="event.preventDefault(); document.getElementById('deletepost').submit();">DELETE YOUR POST</button></div></div>
<form id="deletepost" method="POST" action="/case/{{$post->id}}/delete">
  @csrf
  @method('DELETE')
    {{-- <a type="submit" class="btn btn-sm btn-outline-danger"  role="button">Delete Post</a> --}}
</form>


 {{-- just need this to work--}}

</div>

    <hr>
    <hr>
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
        </div>
    </div>
    @endforeach
</div>
@endsection
