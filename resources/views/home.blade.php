@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{ route('keyword.search.list') }}" method="get">
                            <input type="select" name="keyword" class="form-control" placeholder="Nhập từ khóa...">
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
