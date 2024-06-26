@extends('../layout')

@section('content')
<style>
    .breadcrumb {
        background-color: #f8f9fa;
        padding: 8px 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .breadcrumb-item a {
        color: #007bff;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border-radius: 8px 8px 0 0;
    }

    .card-body {
        padding: 15px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .table th {
        background-color: #007bff;
        color: #fff;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
    }

    .img-thumbnail {
        max-width: 100px;
        height: auto;
    }

    .btn-action {
        padding: 5px 10px;
        font-size: 14px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: #fff;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Truyện yêu thích</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Danh sách truyện yêu thích
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên truyện</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tài khoản</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($favorites as $key => $favo)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$favo->title}}</td>
                                    <td><img class="img-thumbnail" src="{{asset('public/uploads/truyen/'.$favo->image)}}"></td>
                                    <td>{{$favo->publisher->Username}}</td>
                                    <td>
                                        <a href="{{route('xoayeuthich', [$favo->id])}}" class="btn btn-danger btn-action">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
