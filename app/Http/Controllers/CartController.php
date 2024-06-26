<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use App\Models\User;
use App\Models\Courrier;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::all();
        $couriers = Courrier::all();
       // $carts = Cart::paginate(10);
        return view('admin.order', compact('carts', 'couriers'));
    }


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
        }
        if ($user->balance >= $totalPrice) {
            $user->balance -= $totalPrice;
            $user->save();

            foreach ($cartItems as $cartItem) {
                $seller = User::find($cartItem['seller_id']);
                if ($seller) {
                    $seller->balance += $cartItem['price'] * $cartItem['quantity'];
                    $seller->save();
                }else{
                    print('seller_id not found');
                }

                Cart::create([
                    'user_id' => $userId,
                    'user_name' => $user->name,
                    'user_phone' => $user->phone,
                    'title' => $cartItem['title'],
                    'description' => $cartItem['description'],
                    'price' => $cartItem['price'],
                    'quantity' => $cartItem['quantity'],
                    'total_price' => $cartItem['price'] * $cartItem['quantity'],
                ]);
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }
    } catch (\Exception $e) {
        \Log::error('Error saving cart items: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to save cart items'], 500);
    }
}


    public function indexByUser($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Fetch carts with courier relationship eagerly loaded
        $carts = Cart::where('user_id', $userId)
                     ->with('courier') // Eager load courier relationship
                     ->get();
    
        return view('customer.customerorder', compact('carts', 'user'));
    }

    public function show($id)
    {
        $cart = Cart::find($id);
        if (!$cart) {
            return response()->json(['error' => 'Cart not found'], 404);
        }
        return response()->json(['cart' => $cart]);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Cart::findOrFail($id);
        $order->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function assignCourier(Request $request, $id)
{
    $order = Cart::findOrFail($id);
    $order->courier_id = $request->courier_id;
    $order->save();

    return redirect()->back()->with('success', 'Courier assigned successfully.');
}

}