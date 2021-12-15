@extends('layouts.app')


@section('title')

     - Patient:  {{$patient->firstName . " " . $patient->lastName}}

@endsection

@section('content')

<div class="container"> 
    <ul class="card-header nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class = "col"> <h1 class="text-center font-weight-bold"> Patient: {{$patient->lastName . " " . $patient->firstName}}</h1> </li>

        <li class="nav-item col-end text-end"><div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ url()->previous() }}">Back to doctors information</a></button></li>
    </ul>
</div>

    

    <ul>
        <li>First Name: {{$patient->firstName}}</li>
        <li>Last Name: {{$patient->lastName}}</li>
        <li>Contact Number: {{$patient->phoneNumber}}</li>
        <li>Address: {{$patient->address}}</li>
        <li>Symptoms: {{$patient->symptom}}</li>
        <li>insurenceNumber: {{$patient->insurenceNumber}}</li>
        <li>Date Of Birth : {{$patient->date_of_birth ?? 'Unknown'}}</li>
    </ul>


@endsection

