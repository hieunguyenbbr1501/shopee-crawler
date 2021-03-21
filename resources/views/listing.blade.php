@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('keyword.search.list') }}" id="searchForm" class="w-100">
                <div class="row">
                    <div class="input-group col-6">
                        <input type="text" name="keyword" class="form-control"
                               aria-label="Text input with dropdown button">
                    </div>
                    <div>
                        <input type="hidden" name="category" id="input-category">
                    </div>
                    <div>
                        <input type="hidden" name="sorting" id="input-sorting">
                    </div>

                    <div class="input-group col-2">
                        <select class="form-select form-control" id="category" onchange="onCategoryChange()"
                                aria-label="Ngành hàng">
                            <option selected>Ngành hàng</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2 input-group">
                        <select class="form-select form-control" id="sorting" onchange="onSortingChange()"
                                aria-label="Sắp xếp">
                            <option selected>Sắp xếp</option>
                            <option value="priceDesc">Giá: Cao đến thấp</option>
                            <option value="priceAsc">Giá: Thấp đến cao</option>
                            <option value="volumeDesc">Lượng tìm kiếm: Cao đến thấp</option>
                            <option value="volumeAsc">Lượng tìm kiếm: Thấp đến cao</option>
                        </select>
                    </div>

                </div>
            </form>
        </div>
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
                        <td><a href="{{ route('keyword.detail', $keyword->name) }}">{{ $keyword->name }}</a></td>
                        <td>{{ number_format($keyword->volume) }}</td>
                        <td>{{ number_format($keyword->price) }}đ</td>
                        <td>
                            <a href="{{ route('category.detail', $keyword->category->id) }}">{{ $keyword->category->name }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/listing.js') }}"></script>
@endsection
