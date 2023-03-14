@extends('admin.layouts.master')
@section('content')

<h4 style="color: red">Chi Tiết Sản Phẩm</h4>
<div class="container">
    <div class="col-12 col-lg-12 d-flex">
        <div class="card border shadow-none w-100">
            <div class="card-body">
                <div class="table-responsive pt-3">
                    <table>
                        <thead>
                            <tr>
                                <th> {{$productshow->id}} </th>
                            </tr>
                            <tr>
                                <th>Tên sản phẩm :{{$productshow->name}} </th>
                            </tr>
                            <tr>
                                <th>Giá :{{$productshow->price}} </th>
                            </tr>
                            <tr>
                                <th>Số lượng :{{$productshow->amount}} </th>
                            </tr>
                            <tr>
                                <th>Mô tả :{{$productshow->description}} </th>
                            </tr>
                            <tr>
                                <th>Thể loại :{{$productshow->category->name}} </th>
                            </tr>
                            <tr>
                                <th>Lượt Theo Dõi :{{$productshow->folow}} </th>
                            </tr>
                            <tr>
                                <th>Ảnh :<img src="{{ asset('/public/assets/product/' . $productshow->image) }}" alt="" style="width: 550px"> </th>
                            </tr>
                        </thead>
                    </table>
                    <a class="btn btn-primary px-4" href="{{ route('product.index') }}" class="w3-button w3-red">Quay Lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection