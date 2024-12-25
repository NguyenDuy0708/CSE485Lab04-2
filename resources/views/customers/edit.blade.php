@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Chỉnh sửa khách hàng</h1>
    <form action="{{ route('customers.update', $reader-> id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Học tên </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $reader->name }}" required>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Ngày sinh</label>
            <input type="text" class="form-control" id="birthday" name="birthday" value ="{{ $reader->birthday }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $reader->address }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số Điện Thoại</label>
            <input type="number" class="form-control" id="phone" name="phone" value ="{{ $reader->phone }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
