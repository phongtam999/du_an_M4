@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <div class="page-inner">
                        <header class="page-title-bar">
                            <nav aria-label="breadcrumb">
                                {{-- <a href="{{ route('product.index') }}" class="w3-button w3-red">Quay Lại</a> --}}
                            </nav>
                            <h3 class="offset-3">Chỉnh Sửa Quyền</h3>
                        </header>
                        <hr>
                        <div class="panel-body">
                            <!-- <form role="form" class="form-horizontal " action="{{ route('group.store') }}"
                                method="POST">
                                @csrf
                                <div class="form-group has-warning">
                                    <label class="col-lg-2">Tên Thể Loại</label>
                                    {{-- <label class="col-lg-3 control-label">Name</label> --}}
                                    <div class="col-lg-8">
                                        <input type="text" value="{{ old('name') }}" name="name" placeholder=""
                                            class=" @error('name') is-invalid @enderror form-control ">
                                        @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                        <button class="w3-button w3-blue" type="submit">Chỉnh Sửa Thể Loại</button>
                                        <a href="{{ route('group.index') }}" class="w3-button w3-red"
                                            type="submit">Hủy</a>
                                    </div>
                                </div>
                            </form> -->
                            <form action="{{ route('group.update', [$group->id]) }}" method="post">

                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tên Loại Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $group->name }}"
                                        placeholder="Nhập Tên Loại Sản Phẩm" class="form-control">
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Thêm Vào</button>
                                    <a href="{{ route('group.index') }}" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection