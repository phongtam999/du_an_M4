@extends('admin.layouts.master')
@section('content')
<main class="page-content">
    <!-- <a  class="btn btn-warning" href="">Xuất</a> -->
<section class="wrapper">
    <div class="pagetitle">
      <h3 style="color:blueviolet">Đơn Hàng</h3>
      <hr>
    </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Ngày Đặt Hàng</th>
            <th scope="col">Tổng Tiền</th>
            <th scope="col">Chi Tiết</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->customer->name}}</td>
            <td>{{$item->customer->email}}</td>
            <td>{{$item->customer->phone}}</td>
            <td>{{$item->customer->address}}</td>
            <td>{{$item->date_at}}</td>
            <td>{{number_format($item->total)}}</td>
            <td>  
              
                <a class="btn btn-info" href="{{route('order.detail',$item->id)}}">Chi tiết</a>  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $items->appends(request()->query()) }}
</section>
</main>
@endsection