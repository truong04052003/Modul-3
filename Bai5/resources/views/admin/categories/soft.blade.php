@extends('admin.layouts.main')
@section('content')
        <table class="table">
            <a href="{{ route('categories.index') }}" class="btn btn-info">Back</a> <br><br>
            <h1 style="color:rgb(110, 41, 41)" >Thùng rác</h1>
            <thead>
            <tr>
                <th colspan="4">STT</th>
                <th colspan="4">Tên</th>
            </tr>
            </thead>
            <tbody>
                @foreach($softs as $key => $soft)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $soft->name }}</td>
                <td>
                    <img src="{{ asset('admin/uploads/'. $soft->image) }}" alt="" style="width: 150px">
                  </td>
                <td>
                    <a href="{{route('categories.deleteforever',[$soft->id])}}" onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');" class="btn btn-secondary">Xóa vĩnh viễn</a>
                    <a href="{{route('categories.restore',[$soft->id])}}" class="btn btn-warning" >Khôi phục</a>
                </td>   
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection