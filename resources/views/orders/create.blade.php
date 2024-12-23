@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tạo đơn hàng mới</h1>
        <form action="{{ route('orders.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="customer_id" class="form-label">Khách hàng:</label>
                <select name="customer_id" id="customer_id" class="form-select" required>
                    <option value="" disabled selected>Chọn khách hàng</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Vui lòng chọn khách hàng.
                </div>
            </div>

            <div class="mb-3">
                <label for="order_date" class="form-label">Ngày đặt hàng:</label>
                <input type="date" name="order_date" id="order_date" class="form-control" required>
                <div class="invalid-feedback">
                    Vui lòng chọn ngày đặt hàng.
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái:</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="0">Đang xử lý</option>
                    <option value="1">Hoàn thành</option>
                </select>
                <div class="invalid-feedback">
                    Vui lòng chọn trạng thái.
                </div>
            </div>

            <h3 class="mt-4">Chọn sản phẩm:</h3>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="products[{{ $product->id }}][product_id]" 
                                           value="{{ $product->id }}" id="product_{{ $product->id }}">
                                    <label class="form-check-label" for="product_{{ $product->id }}">
                                        {{ $product->name }}
                                    </label>
                                </div>
                                <div class="mt-2">
                                    <input type="number" name="products[{{ $product->id }}][quantity]" 
                                           class="form-control" placeholder="Số lượng" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Tạo đơn hàng</button>
            </div>
        </form>
    </div>

    <script>
        // Bootstrap validation
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection
