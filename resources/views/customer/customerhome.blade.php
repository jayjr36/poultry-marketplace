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
        <a class="nav-link" href="{{ route('user.cart', ['userId' => Auth::user()->id]) }}">Orders</a>
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
    <div class="text-right">
      <a href="{{ route('add.balance') }}" class="btn btn-success">Balance</a>
  </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container-fluid bg-dark" style="height: 100vh;">
  <div class="row py-5 h-100">
    <div class="col-md-7 justify-content-center bg-dark d-flex align-items-center">
      <div class="text-center text-md-left text-light">
        <h1 class="display-4">Hey there, poultry pals!</h1>
        <h3 class="mb-4">Step into our virtual coop <br> and discover a world of <br> feathered wonders!</h3>
        <h3>From colorful hens to <br> majestic cocks, we have <br> something for every <br> poultry enthusiast.</h3>
        <a href="#" class="btn btn-primary btn-lg mt-4">Get started</a>
      </div>
    </div>
    <div class="col-md-5 d-flex justify-content-center align-items-center">
      <div class="d-flex flex-column align-items-center position-relative">
          <img src="{{ asset('images/img1.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Image" style="max-width: 100%; ;">
          <img src="{{ asset('images/img1.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Image" style="max-width: 100%; transform: rotate(0deg); margin-top: -20px;">
          <img src="{{ asset('images/img1.jpg') }}" class="img-fluid rounded-circle" alt="Image" style="max-width: 100%; transform: rotate(0deg); margin-top: -40px;">
      </div>
  </div>
  
  </div>
  
  
  </div>
</div>


@endsection