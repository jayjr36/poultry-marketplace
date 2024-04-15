<!-- resources/views/carts/index.blade.php -->

@extends('layout')

@section('content')
   
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Carts for User: {{ $user->name }}</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td>{{ $cart->title }}</td>
                                <td>{{ $cart->description }}</td>
                                <td>{{ $cart->price }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->total_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection