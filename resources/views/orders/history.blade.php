@extends('layouts.layout')

@section('title', 'Lịch sử mua hàng của ' . $customer->name)

@section('content')
<div class="bg-white shadow-md rounded p-4">
    <h1 class="text-xl font-bold mb-4">Lịch sử mua hàng: {{ $customer->name }}</h1>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID Đơn hàng</th>
                <th class="px-4 py-2">Ngày đặt hàng</th>
                <th class="px-4 py-2">Tổng giá trị</th>
                <th class="px-4 py-2">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="bg-gray-100">
                <td class="border px-4 py-2">{{ $order->id }}</td>
                <td class="border px-4 py-2">{{ $order->order_date }}</td>
                <td class="border px-4 py-2">{{ $order->total }}</td>
                <td class="border px-4 py-2">{{ $order->status ? 'Hoàn thành' : 'Đang xử lý' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
