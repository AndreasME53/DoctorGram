@extends('layouts.app1')

@section('content')

  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
       Editing a Post
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


    <div class="card-body">


      <form name="post-form" id="post-form" method="POST" action="{{ route('posts.update',$post->id) }}">
       @csrf
       
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $post->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">You may change an image</label>
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
    @if ($post->photo)

    @else

    @endif

          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose image</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>



    </div>
  </div>
</div>  
@endsection