@extends('layout')

@section('content')
    <div class="container">
        <h2>Request Withdrawal</h2>
        <form action="{{ route('request.withdrawal') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" min="0.01" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
@endsection
