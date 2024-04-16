<!-- resources/views/carts/index.blade.php -->

@extends('layout')

@section('content')
   
    <div class="container-fluid py-5 bg-dark text-white" style="height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="text-center">Purchased Items: {{ $user->name }}</h1>
                <div class="table-responsive bg-dark">
                    <table class="table table-bordered border-white bg-dark text-white">
                        <thead class="bg-dark text-white">
                            <tr >
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td>{{ $cart->id}}</td>
                                <td>{{ $cart->title }}</td>
                                <td>{{ $cart->description }}</td>
                                <td>{{ $cart->price }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->total_price }}</td>
                                <td>{{ $cart->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection
