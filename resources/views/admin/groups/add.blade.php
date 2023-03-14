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
                            <h3 class="offset-5">Tạo Nhóm Nhân Viên</h3>
                        </header>
                        <hr>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal " action="{{ route('group.store') }}"
                                method="POST">
                                @csrf
                                <div class="form-group has-warning">
                                    <label class="col-lg-2">Tên Nhóm Nhân Viên</label>
                                    {{-- <label class="col-lg-3 control-label">Name</label> --}}
                                    <div class="col-lg-8">
                                        <input type="text" value="{{ old('name') }}" name="name" placeholder=""
                                            class=" @error('name') is-invalid @enderror form-control ">
                                        @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                        <button class="btn btn-info" type="submit">Thêm </button>
                                        <a href="{{ route('group.index') }}" class="btn btn-danger"
                                            type="submit">Hủy</a>
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