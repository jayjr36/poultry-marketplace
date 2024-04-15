@extends('layout')

@section('content')
<!-- add_balance.blade.php -->
<div id="balanceDialog" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Balance</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Add balance form -->
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
@endsection