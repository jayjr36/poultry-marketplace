<!-- resources/views/courier/index.blade.php -->

@extends('layout')

@section('content')
<div  class="container-fluid bg-dark text-white" style="height: 150vh;">
        <h1>All Couriers</h1>
        <div class="col-md-10">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>License</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($couriers as $courier)
                <tr>
                    <td>{{ $courier->name }}</td>
                    <td>{{ $courier->license }}</td>
                    <td>{{ $courier->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
