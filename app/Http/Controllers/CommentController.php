<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:255',
        ]
    );


    $comment = new Comment;

    $comment->post_id = $post->id;
    $comment->user_id = Auth::id();
    $comment->description = $validatedData['description'];
    $comment->save();

    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);// if exist or 404

        //  return view('posts.show', ['post' => $post]);
        // $comments = Comment::where('post_id', '=', $post->id)->get();
        return view('comments.edit', ['comment' => $comment]);
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
        $validatedData = $request->validate([
            'description' => 'required|max:255',
        ]
    );


    $comment = Comment::find($id);

    // $comment->post_id = $post->id;
    // $comment->user_id = Auth::id();
    $comment->description = $validatedData['description'];
    $comment->update();

    return redirect('/case/'.$comment->post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        $comment = Comment::find($comment);
        $comment->delete();
        return back();
    }
}
