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
        $posts = Post::latest()->get();
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

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        
        $request->image->move(public_path('images'), $newImageName);

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->image_path =$newImageName;
        $post->user_id = Auth::id(); 
        $post->save();
        return redirect('home');
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
        $comments = Comment::where('post_id', '=', $post->id)->get();
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
        
        return view('posts.edit', compact('id'));
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
            'description' => 'required|max:255',
            'photo' => 'nullable|binary',
        ]
    );


        $post = new Post;
        $post->title = $request-> $validatedData['title'];
        $post->description = $request-> $validatedData['description'];
        $post->photo = $request->$validatedData['photo'];
        $a->doctor_id = $id; 
        $post->save();
        return redirect('home')->with('status', 'your case has been published');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $result=$post->delete();
        return redirect('home')->with('status', 'your post has been removed');
    }
}