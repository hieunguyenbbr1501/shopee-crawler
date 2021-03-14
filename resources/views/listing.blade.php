@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Từ khóa</th>
                        <th>Lượng tìm kiếm</th>
                        <th>Giá</th>
                        <th>Ngành hàng</th>
                    </tr>
                    @foreach($keywords as $keyword)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $keyword->name }}</td>
                            <td>{{ number_format($keyword->volume) }}</td>
                            <td>{{ number_format($keyword->price) }}đ</td>
                            <td>{{ $keyword->category->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
