@extends('shop.layoutshop.master')
@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th>Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Tổng Phụ</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0 ?>
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        <?php $total += $details['price'] * $details['quantity'] ?>
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $details['name']}}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-9">
                        <img src="{{ asset('public/assets/product/' . $details['image']) }}" alt="" width="120px">
                    </div>
                </div>
            </td>
            <td data-th="Price">{{ number_format($details['price'])}}.VNĐ</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
            </td>
            <td data-th="Subtotal" class="text-center">{{ number_format($details['price'] * $details['quantity']) }}.VNĐ</td>
            <td class="actions" data-th="">
                <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg></button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Tổng Cộng:{{$total}}</strong></td>
        </tr>
        <tr>
            <td><a href="{{route('shop')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Tiếp Tục Mua Sắm</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"></td>
        </tr>
    </tfoot>
</table>
@endsection
@section('scripts')
<script type="text/javascript">
            $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
                $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
                });
            });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Bạn Có Chắc Không?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection