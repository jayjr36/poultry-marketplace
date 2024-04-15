<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
public function save_cart(Request $request)
{
    try {
        $userId = $request->input('userId');
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $cartItems = $request->input('cartItems');
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $itemTotalPrice = $cartItem['price'] * $cartItem['quantity'];
            $totalPrice += $itemTotalPrice;

            Cart::create([
                'user_id' => $userId,
                'user_name' => $user->name,
                'user_phone' => $user->phone,
                'title' => $cartItem['title'],
                'description' => $cartItem['description'],
                'price' => $cartItem['price'],
                'quantity' => $cartItem['quantity'],
                'total_price' => $itemTotalPrice, 
            ]);
        }

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error saving cart items: ' . $e->getMessage());

        // Return error response
        return response()->json(['error' => 'Failed to save cart items'], 500);
    }
}   
}