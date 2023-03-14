@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<div class="container">
    <table class="table" style="text-align:center"><br>
        <h3 style="text-align:center;color:green">Danh Sách Sản Phẩm</h3>
        <!-- <a href="" class="hreft"></a> -->
        <div class="col-6">
            <form class="navbar-form navbar-left" action="{{route('product.search')}}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-info">Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <a href="{{route('product.add')}}" class="btn btn-info">Thêm Sản Phẩm </a>
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Mô Tả</th>
                    <th scope="col">Loại Sản Phẩm</th>
                    <th scope="col">Lượt Theo Dõi</th>
                    <th scope="col">Hình Ảnh</th>
                    <th adta-breakpoints="xs">Thao Tác</th>
                </tr>
            </thead>
            <tbody id="myTable" >
                @foreach ($products as $key => $product)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->folow }}</td>
                    <td>
                        <img src="{{ asset('public/assets/product/' . $product->image) }}" style="width: 50px;height: 50px;" >
                    </td>
                    <td>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            <a class="btn btn-warning" href="{{ route('product.show', $product->id) }}">Xem</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Sửa</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Chuyển vào thùng rác')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table {{ $products->appends(request()->query()) }}
 </div>
    @endsection