@extends('admin.layouts.master')
@section('content')

<h4 style="color: red">Sửa Loại Sản Phẩm</h4>
<div class="container">
    <div class="col-12 col-lg-12 d-flex">
        <div class="card border shadow-none w-100">
            <div class="card-body">
                <form class="row g-3" action="{{route('category.update',[$categories->id])}}" method='POST'>
                    @method('PUT')
                    @csrf
                    <div class="col-12">
                        <label class="form-label">Tên</label>
                        <input type="text" class="form-control" name="name" value="{{$categories->name}}">
                        @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Cập Nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection