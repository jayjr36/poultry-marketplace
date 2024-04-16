<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        $couriers = Courrier::all();
        return view('admin.allcouriers', compact('couriers'));
    }
    public function create()
    {
        return view('admin.courier');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'license' => 'required',
         // 'license' => 'required|license|unique:couriers',
            'phone' => 'required',
        ]);
        Courrier::create($request->all());
        return redirect()->route('courier.create')->with('success', 'Courier registered successfully.');
    }
}