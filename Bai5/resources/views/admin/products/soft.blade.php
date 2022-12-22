@extends('admin.layouts.main')
@section('content')
        <table class="table">
            <a href="{{ route('products.index') }}" class="btn btn-info">Back</a>
            <h1 style="color:rgb(110, 41, 41)" >Danh sách Tìm kiếm </h1>
            <thead>
            <tr>
                <th colspan="4">STT</th>
                <th colspan="4">Tên</th>
                <th colspan="4">Giá</th>
                <th colspan="4">Thể loại</th>
                <th colspan="4">Ảnh</th>
            </tr>
            </thead>
            <tbody>
                @foreach($softs as $key => $soft)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $soft->name }}</td>
                <td colspan="4">{{ $soft->price }}</td>
                <td colspan="4">{{ $soft->category_id }}</td>
                <td>
                    <img src="{{ asset('admin/uploads/'. $soft->image) }}" alt="" style="width: 150px">
                  </td>
                <td>
                    <a href="{{route('products.deleteforever',[$soft->id])}}" class="btn btn-secondary">Xóa vĩnh viễn</a>
                    <a href="{{route('products.restore',[$soft->id])}}" class="btn btn-warning" >Khôi phục</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection