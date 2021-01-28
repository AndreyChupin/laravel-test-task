<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->user;
        return view('orders.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'exists:users,id',
            'product_name' => 'required',
            'quantity' => 'integer'
        ]);
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->product_name = $request->product_name;
        if ($request->note === '') {
            $order->quantity = 1;
        } else {
            $order->quantity = (int)$request->quantity;
        }
        $order->status = '0';
        if ($request->note !== '') {
            $order->note = $request->note;
        }
        $order->save();
        return redirect()->route('users.show', ['user' => $request->user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->product_name = $request->input('product_name');
        $order->quantity = $request->input('quantity');
        $order->status = $request->input('status');
        $order->note = $request->input('note');
        $order->save();

        return redirect()->route('users.show', ['user' => $order->user_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $user_id = $order->user_id;
        $order->delete();
        return back();
    }
}
