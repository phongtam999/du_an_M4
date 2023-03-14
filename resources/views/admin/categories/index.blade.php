@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<h2 class="offset-4">Danh sách loại sản phẩm</h2>
<div class="container">
    <table class="table">
        <div class="col-6">
                        @csrf
                        <div class="row" style="margin-bottom: 10px;">
                        <!-- <button type="submit" class="btn btn-success" onclick="return confirm('Chuyển vào thùng rác')">Thùng rác</button> -->
                        @if (Auth::user()->hasPermission('Category_create'))
                <a class="btn btn-warning" href="{{ route('category.create') }}">Thêm</a>
            @endif
                        </div>
                        <form class="navbar-form navbar-left" action="{{route('category.search')}}" method="GET">

                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th adta-breakpoints="xs">Thao Tác</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($categories as $key => $item)
            <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $item->name }}</td>
                <td>
                    <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('category.edit',[$item->id])}}" class="btn btn-warning">Sửa</a>
                        <button type="submit" class="btn btn-danger" >Xoá</button>
                        <!-- <a href="{{route('category.edit',[$item->id])}}" class="btn btn-primary">Xoá</a> -->
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->appends(request()->query()) }}
</div>


@endsection