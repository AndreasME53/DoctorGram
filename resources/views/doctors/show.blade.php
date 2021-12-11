@extends('layouts.app')


@section('title')

        Dr.  {{$doctor->firstName . " " . $doctor->lastName}}

@endsection

@section('content')


    <h1 class="card-header text-center font-weight-bold"> Doctor's Details</h1>

    <ul>
        <li>"Name:" {{$doctor->firstName}}</li>
        <li>"Surname:" {{$doctor->lastName}}</li>
        <li>"Contact Number:" {{$doctor->phoneNumber}}</li>
        <li>"Address:" {{$doctor->address ?? 'Unknown'}}</li>
        <li>"List of Patents:" 
            <ol>
                <li>"Temp1:" {{$doctor->firstName}}</li>
                <li>"Temp2:" {{$doctor->firstName}}</li>
                <li>"Temp3:" {{$doctor->firstName}}</li>

            </ol>
        </li>
        
    </ul>


@endsection