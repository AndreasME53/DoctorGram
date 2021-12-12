@extends('layouts.app1')


@section('title')

        Dr.  {{$doctor->firstName . " " . $doctor->lastName}}

@endsection

@section('content')


    <h1 class="card-header text-center font-weight-bold"> Dr. {{$doctor->lastName . " " . $doctor->firstName}} Details</h1>

    <ul>
        <li>Name: {{$doctor->firstName}}</li>
        <li>Surname: {{$doctor->lastName}}</li>
        <li>Contact Number: {{$doctor->phoneNumber}}</li>
        <li>Hospital Employed at: {{$doctor->hospital_name ?? 'Unknown'}}</li>
        <li>Address: {{$doctor->hospital_address ?? 'Unknown'}}</li>
        <li>Specialized in : {{$doctor->field ?? 'Unknown'}}</li>
        <li>List of Patents: 
            <ol>
                <li>Temp1: {{$doctor->firstName}}</li>
                <li>Temp2: {{$doctor->firstName}}</li>
                <li>Temp3: {{$doctor->firstName}}</li>

            </ol>
        </li>
        
    </ul>


@endsection