@extends('layouts.app')

@section('title')
        Dr. '{{$user ?? 'login in user'}}'
@endsection

@section('content')

    @foreach ($posts as $post)
        
        <div class="postContent"><a href="{{ route('post.show', ['id' => $post->id ]) }}">
            <div>
                <img class="postLogoPic" src="/img/apple.png">
            </div>
            <div class="postUsername">{{ App\Models\Doctor::find($post->post_author)->name }} </div>
            <div class="postDate">{{ $post->created_at }}</div>
            <h3 style="clear: left; margin-left: 5px;">{{ App\Models\Doctor::find($post->post_content) }}</h3>

    
            <p style="margin-left: 5px;">{{ $post->post_content }}</p>
    

        </div>
    @endforeach
@endsection