@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <style>
                    .card-header {
    background-color: #3498db; /* Màu nền */
    color: #fff; /* Màu chữ */
    padding: 15px; /* Khoảng cách lề bên trong */
    font-size: 18px; /* Cỡ chữ */
    text-align: center; /* Căn giữa nội dung */
    border-radius: 8px; /* Bo tròn viền */
    margin-bottom: 20px; /* Khoảng cách với phần nội dung dưới */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Đổ bóng */
}
                </style>
                <div class="card-header">Xin chào bạn , Chúng ta hãy cùng chung tay để đưa đến những câu truyện hay cho người đọc nhé ...</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                    <p>Nếu bạn có thắc mắc gì hãy liên hệ với chúng tôi nhé , mọi thắc mắc sẽ được giải đáp ...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
