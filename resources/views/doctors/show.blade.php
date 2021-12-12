@extends('layouts.app1')


@section('title')

        Dr.  {{$doctor->firstName . " " . $doctor->lastName}}

@endsection

@section('content')

<div class="container"> 
    <ul class="card-header nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class = "col"> <h1 class="text-center font-weight-bold"> Dr. {{$doctor->lastName . " " . $doctor->firstName}} Details</h1> </li>

        <li class="nav-item col-end text-end"><div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ url()->previous() }}">Back to post</a></button></li>
    </ul>
</div>

    

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