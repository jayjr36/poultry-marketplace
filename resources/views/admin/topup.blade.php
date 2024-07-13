<!-- resources/views/admin/topup.blade.php -->

@extends('layout')

@section('content')
<div class="container col-7">
    <h2>Top Up User Balance</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.topup') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Select User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">-- Select User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Top Up</button>
    </form>
</div>
@endsection
