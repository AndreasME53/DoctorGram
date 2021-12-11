@extends('layouts.app')


@section('title')

        Dr. '{{$user ?? 'login in user'}}'

@endsection


@section('heading')

        Doctors

@endsection



@section('content')


    <h1 class="card-header text-center font-weight-bold"> The Doctors of DoctorGram</h1>
   <p>The are Doctors:</p>
    <ol>
        @foreach ($doctors as $doctor)
                <li><a href="{{ route('doctors.show', ['id' => $doctor->id ]) }}">Dr. {{ $doctor->firstName . " " . $doctor->lastName}}</li>
        @endforeach
    </ol>


@endsection

