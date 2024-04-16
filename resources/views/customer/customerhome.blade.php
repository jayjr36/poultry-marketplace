@extends('layout')

@section('content')
    <!-- Navigation Bar -->
    <div class="container-fluid" style=" display: flex;
    flex-direction: column;
    height: 100vh;
    overflow: hidden;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand mx-auto" href="#">Poultry Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link"target="m-frame" href="{{ route('customer.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="m-frame" href="{{ route('posts.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="m-frame"
                            href="{{ route('user.cart', ['userId' => Auth::user()->id]) }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="m-frame" href="{{ route('contact.show') }}">Contact Us</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn-dark nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
                <div class="text-right">
                    @if (auth()->check())
                        <span class="text-white">{{ auth()->user()->balance }}Tshs</span>
                    @endif
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        BALANCE
                    </button>


                </div>
            </div>
        </nav>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Balance</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update.balance') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="balance">Enter Amount:</label>
                                <input type="number" class="form-control" id="balance" name="balance">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <iframe frameborder="0" name="m-frame" src="{{ route('customer.home') }}" width="100%"
            style=" flex: 1;
        border: none;"></iframe>
    </div>
@endsection
