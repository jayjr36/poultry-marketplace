<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use Illuminate\Http\Request;

class CartController extends Controller
{
public function saveCart(Request $request)
{
    $cartItems = $request->input('cartItems');
    $totalPrice = 0;

    foreach ($cartItems as $cartItem) {
        $itemTotalPrice = $cartItem['price'] * $cartItem['quantity'];
        $totalPrice += $itemTotalPrice;

        Cart::create([
            'title' => $cartItem['title'],
            'description' => $cartItem['description'],
            'price' => $cartItem['price'],
            'quantity' => $cartItem['quantity'],
            'total_price' => $itemTotalPrice, 
        ]);
    }
    return response()->json(['success' => true]);
}
}
