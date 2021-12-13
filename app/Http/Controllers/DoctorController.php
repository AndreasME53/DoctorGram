<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::all();
        return view('doctors.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        return view('doctors.create', ['user' => $user]);
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
            'description' => 'required|max:255',
            'photo' => 'nullable|image',
        ]
    );


        $post = new Post;
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->photo =$validatedData['photo'];
        $post->doctor_id = 9; 
        $post->save();
        return redirect('post/form')->with('status', 'your case has been published');

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
        $doctor =  Doctor::findOrFail($id);// if exist or 404
        //dump($doctor);   for debugging
        return view('doctors.show', ['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
