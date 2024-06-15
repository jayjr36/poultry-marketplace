@extends('layout')

@section('content')

<div class="container-fluid bg-dark text-white py-4 d-flex" style="height: 100vh;">
   
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  bg-dark text-white">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <h4>Welcome to the Admin Dashboard!</h4>
                    <p>This dashboard provides you with tools to manage the poultry sales system efficiently.</p>

                </div>
                <div class="card-body">
                    <h3>Total Sales:  <span class="text-white">{{ auth()->user()->balance }}Tshs</span></h3>
                </div>
                </div>
        </div>
    </div>
</div>
@endsection