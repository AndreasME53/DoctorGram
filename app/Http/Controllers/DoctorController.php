<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Patient;
use App\Models\UserDetail;

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
        $userdetail = User::find($id)->userdetail;
        dump($userdetail);   //for debugging
        return view('users.show', ['doctor' => $doctor], ['patients' => $patients], ['details' => $userdetail]);

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
