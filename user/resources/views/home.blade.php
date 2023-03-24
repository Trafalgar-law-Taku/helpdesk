@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }} 

                        <br><br>

                        @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('error'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
<br><br>
<div class="row">
    @php
 $email = Auth::user()->email ;   
@endphp
    <div class="col-sm-6" >
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Your Pending applications</h5>
              <h6 class="card-subtitle mb-2 text-muted">  {{ Auth::user()->name }}</h6>
              @php $count = App\Models\operations::where('email', '=', $email  )->where("Gm","=","Pending")->count() 


@endphp
           <h2>{{$count}}</h2>
           
           
          
        </div>
          </div>
    </div>
    <div class="col-sm-4" >
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Your Approved applications</h5>
                <h6 class="card-subtitle mb-2 text-muted">  {{ Auth::user()->name }}</h6>
                @php $countno = App\Models\operations::where('email', '=', $email  )->where("Gm","=","yes")->count() 
  
  
  @endphp
             <h2>{{$countno }}</h2>
             
             
            
          </div>
            </div>
          </div>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>
@foreach ( App\Models\User::where('email', '=', $email  )->get() as $i)
    
@php

$name = $i->name ;
$supervisor_email = $i->supervisor_email ;
$number= $i->number ;
$department= $i->department;
$date= date("Y-m-d") ;


@endphp

@endforeach
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Apply For Leave</div>

                    <div class="card-body">
                        <form action="{{route('save')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="name" value="{{ $name}}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input type="hidden" name="uemail" value="{{ $supervisor_email}}">
                            <input type="hidden" name="number" value="{{ $number}}">
                            <input type="hidden" name="department" value="{{ $department }}">
                            <input type="hidden" name="signature" value="{{ $name}}">
                            <input type="hidden" name="date" value="{{ $date}}">


                            <div class="form-group">
                                <label for="exampleInputEmail1">Leave Type</label>
                                <select required type="email" name="type" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    <option >Choose</option>
                                    <option value="Vacation">Vacation</option>
                                    <option value="Sick"> Sick</option>
                                    <option value="Martenity"> Martenity</option>
                                    <option value="Compassionate">Compassionate/Special </option>
                                    <option value="Encashment">Encashment </option>
                                </select>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">From</label>
                                        <input required  name="from" type="date" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">To</label>
                                        <input required  name="to" type="date" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email">

                                    </div>
                                </div>
                            </div>



                            <br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea class="form-control" name="address" rows=5 cols=50 maxlength=250 required >
                                </textarea>

                            </div>
<br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Attach Note</label>
                                <input type="file" class="form-control" name="note" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                                <p>in case of Sick Leave</p>

                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
