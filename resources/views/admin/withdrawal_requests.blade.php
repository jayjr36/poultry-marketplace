@extends('layout')

@section('content')
    <div class="container">
        <h2>Withdrawal Requests</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount(Tsh)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdrawalRequests as $request)
                    <tr>
                        <td>{{ $request->user->name }}</td>
                       
                        <td>{{ $request->amount }}</td>
                        <td>{{ ucfirst($request->status) }}</td>
                        <td>
                            @if ($request->status == 'pending')
                                <form action="{{ route('admin.approve.withdrawal', $request->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('admin.reject.withdrawal', $request->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
