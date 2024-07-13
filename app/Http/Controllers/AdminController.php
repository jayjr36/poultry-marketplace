<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function showTopUpForm()
    {
        $users = User::all();
        return view('admin.topup', compact('users'));
    }

    public function topUpBalance(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer|min:1',
        ]);

        $user = User::find($request->user_id);
        $user->balance = $user->balance + $request->amount;
        $user->save();

        return redirect()->back()->with('success', 'Balance updated successfully');
    }
}
