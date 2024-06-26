<h3 class="title_truyen">TRUYỆN XU HƯỚNG </h3>
<style type="text/css">
    .owl-carousel .item {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
    }

    .owl-carousel .item img {
        width: 100%;
        height: 180px; /* Chiều cao cố định cho ảnh */
        object-fit: cover; /* Đảm bảo ảnh không bị kéo dãn */
        border-radius: 8px; /* Bo tròn viền */
        border: 5px solid #3399ff; /* Viền xung quanh ảnh */
        padding: 3px; /* Đệm ngoài */
    }

    .owl-carousel .item .info_truyen {
        margin-bottom: 10px;
    }

    .owl-carousel .item h5 {
        background-color: #FFFF00;
        color: black;
        padding: 5px;
        text-align: center;
        margin-bottom: 10px;
    }

    .owl-carousel .item .badge {
        margin-right: 5px;
    }

    .owl-carousel .item .btn-xemtruyen {
        margin-top: 10px;
    }

    .owl-carousel .item .btn-xemtruyen a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #FF6347;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }

    .owl-carousel .item .btn-xemtruyen a:hover {
        background-color: #FF4500;
    }
    .fa-eye {
        background-color: #FFFF00; /* Màu nền */
        color: black; /* Màu chữ */
        padding: 5px; /* Đệm bên trong */
        border-radius: 50%; /* Bo tròn */
        margin-left: 5px; /* Khoảng cách với phần tử trước */
        font-size: 1rem; /* Kích thước biểu tượng */
        transition: transform 0.3s ease-in-out; /* Hiệu ứng chuyển đổi */
    }

    .fa-eye:hover {
        transform: scale(1.2); /* Phóng to khi hover */
    }

    h5 {
        text-align: center; /* Căn giữa nội dung */
        margin-top: 10px; /* Khoảng cách với phần tử trên */
    }
</style>

<div class="owl-carousel owl-theme mb-5">
    @foreach($slide_truyen as $key => $slide)
    <div class="item">
        <div class="info_truyen">
            @if($slide->loaitruyen=='truyentranh')
            <span class="badge badge-info loaitruyen">Truyện tranh</span>
            @else
            <span class="badge badge-danger loaitruyen">Truyện đọc</span>
            @endif
        </div>
        <img src="{{asset('public/uploads/truyen/'.$slide->hinhanh)}}" alt="{{$slide->tentruyen}}">
        <h5>{{$slide->tentruyen}}</h5>
        @foreach($slide->thuocnhieudanhmuctruyen->take(1) as $thuocdanh)
        <!-- Chỉ hiển thị một danh mục mới nhất -->
        <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
        @endforeach
        @foreach($slide->thuocnhieutheloaitruyen->take(1) as $thuocloai)
        <!-- Chỉ hiển thị một thể loại mới nhất -->
        <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
        @endforeach
        <div class="btn-xemtruyen">
            <a href="{{url('xem-truyen/'.$slide->slug_truyen)}}" >Xem truyện</a>
            <br></br>
            <p>Lượt xem : {{$slide->views}}<i class="fas fa-eye"></i></p>
            
        </div>
    </div>
    @endforeach
</div>
