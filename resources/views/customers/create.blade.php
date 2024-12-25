@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #2C3E50;">Thêm khách hàng</h1>
    <form action="{{ route('customers.store') }}" method="POST" class="p-4 border shadow rounded">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label" style="font-weight: bold; color: #34495E;">Họ và tên</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Nhập tên đầy đủ" style="border-radius: 8px;">
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label" style="font-weight: bold; color: #34495E;">Ngày sinh</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required style="border-radius: 8px;">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label" style="font-weight: bold; color: #34495E;">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" required placeholder="Nhập địa chỉ" style="border-radius: 8px;">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label" style="font-weight: bold; color: #34495E;">Số Điện Thoại</label>
            <input type="number" class="form-control" id="phone" name="phone" required placeholder="Nhập số điện thoại" style="border-radius: 8px;">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label" style="font-weight: bold; color: #34495E;">Email</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Nhập email" style="border-radius: 8px;">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success" style="padding: 10px 20px; font-size: 16px; border-radius: 8px;">Thêm khách hàng</button>
        </div>
    </form>
</div>
@endsection
