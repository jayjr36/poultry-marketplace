<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function requestWithdrawal(Request $request)
    {
        $user = auth()->user(); // Assuming the seller is logged in
        $withdrawalRequest = new WithdrawalRequest();
        $withdrawalRequest->user_id = $user->id;
        $withdrawalRequest->amount = $request->amount;
        $withdrawalRequest->save();

        return redirect()->back()->with('success', 'Withdrawal request submitted successfully.');
    }

    public function showWithdrawalRequests()
    {
        $withdrawalRequests = WithdrawalRequest::with('user')->get();

        return view('admin.withdrawal_requests', compact('withdrawalRequests'));
    }

    public function approveWithdrawal($id)
    {
        $withdrawalRequest = WithdrawalRequest::findOrFail($id);
        $withdrawalRequest->status = 'approved';
        $withdrawalRequest->save();

        // Deduct amount from user's balance
        $user = $withdrawalRequest->user;
        $user->balance -= $withdrawalRequest->amount;
        $user->save();

        return redirect()->back()->with('success', 'Withdrawal request approved.');
    }

    public function rejectWithdrawal($id)
    {
        $withdrawalRequest = WithdrawalRequest::findOrFail($id);
        $withdrawalRequest->status = 'rejected';
        $withdrawalRequest->save();

        return redirect()->back()->with('success', 'Withdrawal request rejected.');
    }
}
