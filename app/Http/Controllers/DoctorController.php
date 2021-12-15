<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Patient;
use App\Models\UserDetail;

use Auth;

class DoctorController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $doctor =  User::findOrFail($id);// if exist or 404
        $patients = User::find($id)->patients;
        return view('users.show', ['doctor' => $doctor], ['patients' => $patients]);

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
        {
            $validatedData = $request->validate([
                'phoneNumber' => 'required|max:255',
                'field' => 'required|max:255',
            ]
        );
    
    
        $doctor = UserDetail::find($id);

        if($doctor==null) {
            $doctor = new UserDetail;
            //$comment->post_id = $post->id;
            $doctor->user_id = Auth::id();
            $doctor->phoneNumber = $validatedData['phoneNumber'];
            $doctor->field = $validatedData['field'];
            $doctor->save();
        } else {
        //$comment->post_id = $post->id;
        //$doctor->user_id = Auth::id();
        $doctor->phoneNumber = $validatedData['phoneNumber'];
        $doctor->field = $validatedData['field'];
        $doctor->update();
    
        }


       
        return redirect('/doctors/'.$doctor->id);

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
        //
    }


    // To get all patients of a user
    public function getPatients($user_id)
    {
        return User::find($user_id)->patients;
    }

    // To get all users by patient
    public function getUsers($patient_id)
    {
        return Patient::find($patient_id)->users;
    }

}
