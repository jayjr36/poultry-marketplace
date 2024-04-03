@extends('layout')

@section('content')

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Your Company Name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Main Content -->
<div class="container">
  <div class="row mt-5">
    <div class="col-md-6">
      <h1>Welcome to Our Store!</h1>
      <p>Explore our wide range of products and find exactly what you need.</p>
      <a href="#" class="btn btn-primary">Shop Now</a>
    </div>
    <div class="col-md-6">
      <!-- Include any other content you want to display on the landing page -->
    </div>
  </div>
</div>

@endsection