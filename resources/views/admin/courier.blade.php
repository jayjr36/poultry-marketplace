<!-- resources/views/courier/create.blade.php -->

@extends('layout')

@section('content')
<div  class="container-fluid bg-dark  d-flex" style="height: 100vh;">
    <div class="container col-6 bg-dark text-white">
        <h2>Register Courier</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('courier.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="license">License Number</label>
                <input type="license" class="form-control" id="license" name="license" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="row px-5 py-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
           
        </form>
    </div>
</div>
@endsection
