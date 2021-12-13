@extends('layouts.app')

@section('content')

  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
       Add A Post
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


      <form name="post-form" id="post-form" method="POST" action="{{url('posts.store')}}">
       @csrf

        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="" placeholder="Title" value="{{ old('name')}}" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea class="form-control" style="height:150px" name="description" required="" placeholder="Description" value="{{ old('description')}}"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">You may add an image: jpeg,png,jpg,gif,svg</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="photo">
            <label class="custom-file-label" for="customFile">Choose image</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>



    </div>
  </div>
</div>  
@endsection
