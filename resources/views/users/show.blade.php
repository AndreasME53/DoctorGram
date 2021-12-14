@extends('layouts.app')


@section('title')

     -   Dr.  {{$doctor->name}}

@endsection

@section('content')

<div class="container"> 
    <ul class="card-header nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class = "col"> <h1 class="text-center font-weight-bold"> Dr. {{$doctor->name}}</h1> </li>

        <li class="nav-item col-end text-end"><div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ url()->previous() }}">Back</a></button></li>
    </ul>
</div>


    @if (Auth::id() == $doctor->id)
    <div class="container " >
        <div class="addPost card-body">
        
            @if(session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif
            <div class="card">
              <div class="card-header text-center font-weight-bold">
                Edit Your Details:
              </div>
          
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
    
    
        <form action="{{ url('/new/case') }}" method="POST">
            @csrf
        

        <ul>
            <li>Name: </li><input type="text" name="name" class="form-control" required="" placeholder="Title" value="{{ $doctor->name}}" >
            <li>Contact Number:</li> <input type="text" name="phoneNumber" class="form-control" required="" placeholder="Please enter your contact number" value="{{$doctor->phoneNumber}}" >
            {{--<li>Hospital Employed at: </li><input type="text" name="hospital_name" class="form-control" required="" placeholder="Please enter the hospital you work at" value="{{$doctor->hospital_name}}" ></li>
            <li>Address:</li><input type="text" name="hospital_address" class="form-control" required="" placeholder="Please enter the hospital address you work at" value="{{$doctor->phoneNumber}}" >--}}
            <li>Specialized in :</li><input type="text" name="field" class="form-control" required="" placeholder="Please enter your field" value="{{$doctor->field }}" >
            <li>List of Assigned Patents: 
                <ol>
                    @foreach ($patients as $patient) 
                    <li hidden>{{$p_id = App\Models\Patient::find($patient->id)->id}}</li>
                    <li><a href="/patients/{{ $p_id}}"> {{App\Models\Patient::find($patient->id)->firstName }} {{App\Models\Patient::find($patient->id)->lastName}}</a></li>
                   
                    @endforeach
                    @if($patients == [] )<li>No paitents assigned</li>@endif
                </ol>
                
    
            </li>
            
        </ul>

            </form></div>
        @else

        <ul>
            <li>Name: {{$doctor->name}}</li>
            <li>Contact Number: {{App\Models\User::find($doctor->id)->phoneNumber ?? 'Unknown'}}</li>
            <li>Specialized in : {{$details->field ?? 'Unknown'}}</li>
            <li>List of Assigned Patents: 
                <ol>
                    @foreach ($patients as $patient) 
                    <li hidden>{{$p_id = App\Models\Patient::find($patient->id)->id}}</li>
                    <li><a href="/patients/{{ $p_id}}"> {{App\Models\Patient::find($patient->id)->firstName }} {{App\Models\Patient::find($patient->id)->lastName}}</a></li>
                   
                    @endforeach
                    @if($patients == [] )<li>No paitents assigned</li>@endif
                </ol>
                
    
            </li>
            
        </ul>

        @endif

@endsection

