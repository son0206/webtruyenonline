@extends('../layout')

@section('slide')

  @include('pages.slide')

@endsection

@section('content')



<h3 >TRUYỆN MỚI CẬP NHẬT</h3>

            <div class="album py-2 bg-light">

            <div class="container">



             <div class="row">
              
              @foreach($truyen as $key => $value)
              <style>
                .col-md-3 {
    padding: 0 15px; /* Điều chỉnh lề cho mỗi cột */
}

.card {
    height: 100%; /* Chiều cao của thẻ card là 100% của phần tử cha */
    display: flex; /* Sử dụng flexbox trong card để căn chỉnh các phần tử bên trong */
    flex-direction: column; /* Dàn trang các phần tử bên trong theo chiều dọc */
}

.card-body {
    flex: 1; /* Căn chỉnh card body để lấp đầy không gian còn trống */
    padding: 1rem;
}

.card-text {
    font-size: 14px;
    line-height: 1.5;
    flex: 1; /* Cho phép card text mở rộng để lấp đầy không gian còn trống */
}

.card-img-top {
    width: 100%;
    height: auto;
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}

.btn-group {
    margin-top: auto; /* Đặt nút ở cuối card */
}

              </style>
              <div class="col-md-3">

                <div class="card mb-3 box-shadow">

                   <div class="info_truyen">
                            @if($value->loaitruyen=='truyentranh')
                            <span class="badge badge-info loaitruyen">Truyện tranh</span>   
                            @else
                            <span class="badge badge-danger loaitruyen">Truyện đọc</span>   
                            @endif  
                        </div>

                  <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" >
                  
                  <div class="card-body">

                      <h5>{{$value->tentruyen}}</h5>

                    <p class="card-text">
                      @php
                        $tomtat = substr($value->tomtat,0,100);
                      @endphp
                      {{$tomtat.'....'}}
                      
                    </p>
                    @foreach($value->thuocnhieudanhmuctruyen->take(2) as $thuocdanh)
                      <a href="{{ url('danh-muc/'.$thuocdanh->slug_danhmuc) }}"><span class="badge badge-dark">{{ $thuocdanh->tendanhmuc }}</span></a>
                  @endforeach

                  @foreach($value->thuocnhieutheloaitruyen->take(2) as $thuocloai)
                      <a href="{{ url('the-loai/'.$thuocloai->slug_theloai) }}"><span class="badge badge-info">{{ $thuocloai->tentheloai }}</span></a>
                  @endforeach
                    <div class="d-flex justify-content-between align-items-center">

                      <div class="btn-group">

                        <a  style="background-color: #FF3300; color:rgb(238, 236, 236);" href="{{url('xem-truyen/'.$value->slug_truyen)}}"  class="btn btn-sm btn-outline-secondary">Xem truyện</a>
                        <script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://iclickcdn.com/tag.min.js',4232051,document.body||document.documentElement)</script>
                        <a  style="background-color: #fffc63; color:rgb(9, 2, 0);" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i>{{$value->views}}</a>
                        
                  
          
                      </div>

                     

                    </div>

                  </div>

                



                </div>

              </div>

            @endforeach

            </div>

          {{--   <a class="btn btn-success"  href="">Xem tất cả</a> --}}

          </div>
          <br></br>

        {{$truyen->links('pagination::bootstrap-4')}}

        </div>



    @endsection