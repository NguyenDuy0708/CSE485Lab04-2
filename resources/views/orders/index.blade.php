@extends('layouts.layout')

@section('content')
    <h1>Danh sách đơn hàng</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Tạo đơn hàng mới</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Ngày đặt</th>
                <th>Sản phẩm</th>
                <th>Trạng thái</th>               
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>
                        <ul>
                            @foreach ($order->order_details as $detail)
                                <li>{{ $detail->product->name }} ({{ $detail->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->status ? 'Hoàn thành' : 'Đang xử lý' }}</td>
                    
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</button>
                        </form>
                        <a href="{{ route('customers.history', $order->customer->id) }}">Xem lịch sử</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
