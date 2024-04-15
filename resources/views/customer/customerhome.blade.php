@extends('layout')

@section('content')

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand mx-auto" href="#">Poultry Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index') }}">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">About Us</a>
      </li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn-dark nav-link" type="submit">Logout</button>
      </form>      
      </li>
    </ul>
  </div>
</nav>


<!-- Main Content -->
<div class="container-fluid bg-dark" style="height: 600px">
  <div class="row py-5">
    <div class="col-md-7 justify-content-center bg-secondary">
      <h1>Hey there, poultry pals! </h1>
      <h3>Step into our virtual coop <br> and discover a world of <br> feathered wonders! </h3>
      <h3>From colorful hens to <br> majestic cocks, we have <br> something for every <br> poultry enthusiast.</h3>
      <a href="#" class="btn btn-primary">Get started</a>
    </div>
    <div class="col-md-4 d-flex justify-content-center align-items-center">
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">

        <img src="{{ asset('images/img1.jpg') }}" class="card-img-top" alt="Image">
  
        </div>
      </div>
    </div>
    
  </div>
</div>

@endsection