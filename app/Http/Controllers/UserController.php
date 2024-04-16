<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.adminhome');
    }
    public function updateBalance(Request $request)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        if (!$user) {
            return back()->with('error', 'User not found');
        }

        $user->balance += $request->input('balance');
        $user->save();

        return back()->with('success', 'Balance updated successfully');
    }

    public function showBalanceForm()
    {
        return view('customer.add_balance');
    }
}
