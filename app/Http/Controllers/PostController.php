<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Auth;
use App\Models\Comment;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return
        $posts = Post::latest()->paginate(5);
        return view('posts.index', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ]
    );
        if(is_null($request->image)){
            $post = new Post;
            $post->title = $validatedData['title'];
            $post->description = $validatedData['description'];
            $post->image_path = '';
            $post->user_id = Auth::id(); 
            $post->save();
            return redirect('home')->with('status', 'your case has been published');
        
    } else{
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        
        $request->image->move(public_path('images'), $newImageName);

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->image_path =$newImageName;
        $post->user_id = Auth::id(); 
        $post->save();
        return redirect('home')->with('status', 'your case has been published');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
         $post = Post::findOrFail($post);// if exist or 404
        //  return view('posts.show', ['post' => $post]);
        $comments = Comment::where('post_id', '=', $post->id)->latest()->paginate(3);
        return view('posts.show', ['post' => $post], ['comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);// if exist or 404
        //  return view('posts.show', ['post' => $post]);
        $comments = Comment::where('post_id', '=', $post->id)->get();
        return view('posts.edit', ['post' => $post], ['comments' => $comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ]
    );
        if(is_null($request->image)){
            $post =  Post::findOrFail($id);
            $post->title = $validatedData['title'];
            $post->description = $validatedData['description'];
            $post->image_path = '';
            $post->user_id = Auth::id(); 
            $post->update();
            return redirect('home')->with('status', 'your case has been updated');
        
    } else{
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        
        $request->image->move(public_path('images'), $newImageName);

        $post =  Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->image_path =$newImageName;
        $post->user_id = Auth::id(); 
        $post->update();
        return redirect('home')->with('status', 'your case has been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::findOrFail($id);
        $post->delete();
        return redirect('home')->with('status', 'your post has been removed');
    }
}