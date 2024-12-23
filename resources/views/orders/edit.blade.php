@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Chỉnh sửa đơn hàng #{{ $order->id }}</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="customer_id" class="form-label">Khách hàng:</label>
            <select name="customer_id" id="customer_id" class="form-select" required>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Ngày đặt hàng:</label>
            <input type="date" name="order_date" id="order_date" value="{{ $order->order_date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="0" {{ !$order->status ? 'selected' : '' }}>Đang xử lý</option>
                <option value="1" {{ $order->status ? 'selected' : '' }}>Hoàn thành</option>
            </select>
        </div>

        <h3 class="mt-4">Chọn sản phẩm:</h3>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-6 mb-3">
                    <div class="form-check">
                        <input 
                            type="checkbox" 
                            class="form-check-input" 
                            id="product_{{ $product->id }}" 
                            name="products[{{ $product->id }}][product_id]" 
                            value="{{ $product->id }}"
                            {{ $order->order_details->pluck('product_id')->contains($product->id) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="product_{{ $product->id }}">{{ $product->name }}</label>
                    </div>
                    <input 
                        type="number" 
                        class="form-control mt-2" 
                        name="products[{{ $product->id }}][quantity]" 
                        placeholder="Số lượng" 
                        min="1"
                        value="{{ $order->order_details->firstWhere('product_id', $product->id)?->quantity }}"
                    >
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-4">Cập nhật đơn hàng</button>
        </div>
    </form>
</div>
@endsection
