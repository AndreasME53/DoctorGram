@extends('layouts.app')
@section('title Welcome')

@section('content')


    <div>
        <h4 class="display-2 text-center font-weight-bold">Welcome to DoctorGram!</h4>
        <h4 class="text-center">DoctorGram is a website for doctors to post cases and get other doctors to assistance.</h4>
        @if (Auth::user())
        <h4 class="text-center">You are login :)</h4>
        @else
        <h4 class="text-center"> You may <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register<a></h4>
        @endif
            <div class ="card shodow-md">        
                <img src="/img/medic.png">
            </div>
    </div>


@endsection