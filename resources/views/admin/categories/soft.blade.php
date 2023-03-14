@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<table class="table">
    <!-- <a href="{{route('category.index')}}" class="btn btn-success">Quay Lại</a> -->
    <h3 style="color:crimson">Danh sách </h>
    <thead>
        <tr>
            <th colspan="4">ID</th>
            <th colspan="4">Tên </th>
            <th colspan="4">Tuỳ chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach($softs as $key => $soft)
        <tr>
            <th colspan="4">{{ ++$key }}</th>
            <td colspan="4">{{ $soft->name }}</td>
            <td>
          
                <form action="{{ route('category.softdeletes', $soft->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('category.restoredelete', $soft->id) }}"                 
                    id="{{ $soft->id }}" class="btn btn-danger deleteIcon">Khôi Phục</a>
                    <button type="submit" class="btn btn-success">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</main>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

</script>
@endsection