@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<!-- <style>
    img#avt {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
    }
</style> -->
<section class="wrapper">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">
                    <h3 class="offset-6">Sản phẩm</h3>
                    <a href="{{ route('user.add') }}" class="btn btn-primary">Đăng ký tài khoản user</a>
                </header>
                <hr>
                <div>
                    <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
                        <thead>
                            <tr>
                                <th data-breakpoints="xs">STT</th>
                                <th>Ảnh Đại Diện</th>
                                <th>Tên</th>
                                <th>Điện Thoại</th>
                                <th>Chức vụ</th>
                                <th data-breakpoints="xs">Tùy Chỉnh</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($users as $key => $user)
                            <tr data-expanded="true" class="item-{{ $user->id }}">
                                <td>{{ ++$key }}</td>
                                <td><a href="{{ route('user.show', $user->id) }}"><img id="avt" style="width: 100px;height: 100px;" src=" {{ asset('storage/images/' . $user->image) }}" alt=""></a></td>
                                <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->group->name }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
                                    <a href="{{ route('user.destroy', $user->id) }}" id="{{ $user->id }}" class="btn btn-danger sm deleteIcon">Xóa</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->appends(request()->query()) }}
                </div>
            </div>
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</section>
@endsection