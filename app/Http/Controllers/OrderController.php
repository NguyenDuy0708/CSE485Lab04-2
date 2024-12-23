<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order_detail;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();    
        return view('orders.create', compact('customers', 'products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $orders = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);
        foreach ($request->products as $product) {
            Order_detail::create([
                'order_id' => $orders->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ]);
        }
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo thành công!');
    }
    public function edit(Order $order)
    {
        $products = Product::all(); 
        $customers = Customer::all();

        return view('orders.edit', compact('orders', 'products', 'customers'));
    }
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        $order->update([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        $order->orderDetails()->delete(); 

        foreach ($request->products as $product) {
            Order_detail::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được cập nhật thành công!');
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xóa thành công!');
    }
}
