@extends('layouts.app')


@section('title')
        User '{{$user ?? 'login in user'}}'
@endsection


@section('heading')
Selected post - User {{$user_id}}
@endsection



@section('content')


    <h1 class="card-header text-center font-weight-bold"> Patent Case details </h1>
   
    <p>Hospital room for doctor: {{$user_id}} will open soon. </p>


@endsection

