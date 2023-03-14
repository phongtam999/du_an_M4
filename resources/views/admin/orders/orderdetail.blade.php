@extends('admin.layouts.master')
@section('content')
<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">

                <div class="pagetitle">
                    <h3 style="color:chartreuse">Chi Tiết Đơn Hàng</h3>
                    <!-- <a href="{{route('dashboard')}}" class="btn btn-danger">Trang Chủ</a>
                    <a href="{{route('order.index')}}" class="btn btn-primary">Đơn Hàng</a> -->
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Giá(VND)</th>
                            <th scope="col">Tổng Tiền(VND)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach($items as $key =>$item)
                        @php $total += $item->total @endphp
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->total) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    Tổng Tiền của đơn hàng: {{number_format($total)}} vnd
                </table>
            </div>

        </div>

    </div>

</section>


@endsection