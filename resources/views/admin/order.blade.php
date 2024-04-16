@extends('layout')

@section('content')
    <div class="container-fluid bg-dark text-white py-4 d-flex" style="height: 200vh;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center">ORDERS</h1>
                <div class="table-responsive">
                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->id }}</td>
                                    <td>{{ $cart->title }}</td>
                                    <td>{{ $cart->description }}</td>
                                    <td>{{ $cart->price }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ $cart->total_price }}</td>
                                    <td>{{ $cart->user_name }}</td>
                                    <td>{{ $cart->user_phone }}</td>
                                    <td>{{ $cart->status }}</td>
                                    <td>
                                        @if ($cart->status != 'confirmed')
                                            <form action="{{ route('update.status', $cart->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Confirm</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                </div>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>


@endsection
