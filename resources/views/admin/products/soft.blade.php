@extends('admin.layouts.master')
@section('content')

<table class="table">
            <!-- <a href="{{ route('product.index') }}" class="btn btn-info">Quay Lại</a> -->
            <h1 style="color:rgb(110, 41, 41)" >Danh sách Tìm kiếm </h1>
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
            </tr>
            </thead>
            <tbody>
                @foreach($softs as $key => $soft)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $soft->name }}</td>
                <td>
                     <form action="{{ route('product.softdeletes', $soft->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-success">Xoá</button>
                                                <a href="{{ route('product.restoredelete', $soft->id) }}"
                                                    id="{{ $soft->id }}" class="btn btn-danger deleteIcon">Khôi Phục</a>
                                        </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection

