@extends('layouts.app')


@section('title')
        User '{{$user ?? 'login in user'}}'
@endsection


@section('heading')
Selected post - User {{$doctor}}
@endsection



@section('content')


    <h1 class="card-header text-center font-weight-bold"> Patent Case details </h1>
   
    <p>Hospital room for doctor: {{$doctor}} will open soon. </p>


@endsection

