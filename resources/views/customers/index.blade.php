@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Quản lý khách hàng</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Thêm Độc Giả</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Ngày Sinh</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($readers as $reader)
            <tr>
                <td>{{ $reader->id }}</td>
                <td>{{ $reader->name }}</td>
                <td>{{ $reader->birthday }}</td>
                <td>{{ $reader->address }}</td>
                <td>{{ $reader->phone }}</td>
                <td>{{ $reader->email }}</td>
                <td>
                    <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('readers.destroy', $reader->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " oneclick ="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
