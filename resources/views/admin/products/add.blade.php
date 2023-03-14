@extends('admin.layouts.master')
@section('content')

<h4 style="color: red">Thêm Sản Phẩm</h4>
<div class="container">
    <div class="col-12 col-lg-12 d-flex">
        <div class="card border shadow-none w-100">
            <div class="card-body">
                <form class="row g-3" action="{{route('product.store')}}" method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label class="form-label">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên...>
                        @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Giá:</label>
                        <input type="text" class="form-control" name="price" placeholder="Nhập giá...">
                        @error('price')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Số Lượng:</label>
                        <input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng...">
                        @error('quantity')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Mô Tả:</label>
                        <input type="text" class="form-control" name="description" placeholder="...">
                        @error('description')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Thể loại:</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">--Vui Lòng Chọn--</option>
                            @foreach ($categories as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Lượt Theo Dõi:</label>
                        <input type="text" class="form-control" name="folow" placeholder="...">
                        @error('folow')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Hình Ảnh</label>
                        <input accept="image/*" type='file' id="imgInp" name="image" /><br><br>
                        <img type="hidden" width="90px" height="90px" id="blah"
                             alt="" /> <br>
                             
                        @error('image')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Thêm Sản Phẩm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection