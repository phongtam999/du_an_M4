@extends('admin.layouts.master')
@section('content')
<h4 style="text-align:center ;font-size:x-large">Thêm Loại Sản Phẩm</h4>
<div class="container">
  <div class="col-12 col-lg-12 d-flex">
    <div class="card border shadow-none w-100">
      <div class="card-body">
        <form class="row g-3" action="{{route('category.store')}}" method='POST'>
          @csrf
          <div class="col-12">
            <strong class="offset">Tên</strong>
            <input type="text" class="form-control" name="name">
            @error('name')
            <div class="text text-danger">{{ $message}}</div>
            @enderror
          </div>
          <div class="col-12">
            <div class="d-grid"><br>
              <button class="btn btn-primary" type="submit">Thêm</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection