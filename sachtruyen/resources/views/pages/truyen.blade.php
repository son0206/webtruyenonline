@extends('../layout')

{{-- @section('slide')
  @include('pages.slide')
@endsection --}}

@section('content')
<style>
    /* CSS cho phần mục lục truyện */
    .infotruyen {
        list-style: none;
        padding: 0;
    }

    .infotruyen li {
        font-size: 16px;
        color: #000;
    }

    .mucluctruyen li a {
        color: #000;
        font-size: 16px;
    }

    .tomtat-truyen {
        padding: 20px;
        margin: 20px 0;
        line-height: 1.5;
        font-size: 17px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #fff;
    }

    .btn-custom {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 12px;
        transition: transform 0.2s; /* Hiệu ứng chuyển động */
    }

    .btn-custom-red {
        background-color: #f44336;
    }

    .btn-custom-blue {
        background-color: #008CBA;
    }

    .btn-custom:hover {
        transform: scale(1.1); /* Phóng to nút lên 110% khi di chuột vào */
    }

    .button-container {
        display: flex;
        align-items: center;
    }

    .button-container .ml-2 {
        margin-left: 10px;
    }

    /* CSS cho phần từ khóa tìm kiếm */
    .tagcloud05 ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .tagcloud05 ul li {
        display: inline-block;
        margin: 0 0 .3em 1em;
        padding: 0;
    }

    .tagcloud05 ul li a {
        position: relative;
        display: inline-block;
        height: 30px;
        line-height: 30px;
        padding: 0 1em;
        background-color: #3498db;
        border-radius: 0 3px 3px 0;
        color: #fff;
        font-size: 13px;
        text-decoration: none;
        transition: .2s;
    }

    .tagcloud05 ul li a::before {
        position: absolute;
        top: 0;
        left: -15px;
        content: '';
        width: 0;
        height: 0;
        border-color: transparent #3498db transparent transparent;
        border-style: solid;
        border-width: 15px 15px 15px 0;
        transition: .2s;
    }

    .tagcloud05 ul li a::after {
        position: absolute;
        top: 50%;
        left: 0;
        z-index: 2;
        display: block;
        content: '';
        width: 6px;
        height: 6px;
        margin-top: -3px;
        background-color: #fff;
        border-radius: 100%;
    }

    .tagcloud05 ul li span {
        display: block;
        max-width: 100px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .tagcloud05 ul li a:hover {
        background-color: #555;
        color: #fff;
    }

    /* CSS cho phần chương truyện */
    .mucluctruyen {
        list-style: none;
        padding: 0;
    }

    .mucluctruyen li {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .mucluctruyen li a {
        color: #000;
    }

    /* CSS cho phần truyện tranh mới cập nhật */
    .col-md-3.sidebar {
        padding: 0;
    }

    .card.mb-3.box-shadow {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .card.mb-3.box-shadow:hover {
        transform: scale(1.05);
    }

    .title_truyen {
        border-radius: 5px;
        background: #7e8084;
        color: #fff;
        text-align: center;
        font-size: 18px;
        margin-bottom: 15px;
        padding: 10px;
    }

    /* CSS chung */
    .btn-group {
        margin-top: auto;
    }

    .card-img-top {
        border-radius: 8px 8px 0 0;
    }

    .card-text {
        line-height: 1.4;
    }

	
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    @foreach($truyen->thuocnhieudanhmuctruyen as $key => $breadcrumb_danh)
   	 <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$breadcrumb_danh->slug_danhmuc)}}">{{$breadcrumb_danh->tendanhmuc}}</a></li>
    @endforeach
    <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
  </ol>
</nav>

<div class="row">
	<div class="col-md-9">
		<div class="row">
			@php 
			$mucluc = count($chapter);
			@endphp 
			<div class="col-md-5">
				 <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="{{$truyen->tentruyen}}">
			</div>

			<div class="col-md-7">
				
				
				<ul class="infotruyen">
					<div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count" data-size="small">
						<a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
					</div>
					<!---------------Lấy biến wishlist------------------------->
					<input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_title">
					<input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
					<input type="hidden" value="{{$truyen->id}}" class="wishlist_id">
					<!---------------End Lấy biến wishlist------------------------->
					
					<li>Tên truyện : {{$truyen->tentruyen}}</li>
					<li>Ngày đăng : {{$truyen->created_at->diffForHumans()}}</li>
					<li>Loại truyện : 
						@if($truyen->loaitruyen=='truyentranh')
							<span class="text-danger">Truyện tranh</span>
						@else
							<span class="text-primary">Truyện đọc</span>
						@endif
					</li>
					<li>Tác giả : {{$truyen->tacgia}}</li>
					<li>Danh mục truyện :
					 @foreach($truyen->thuocnhieudanhmuctruyen as $thuocdanh)
                        <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
                        @endforeach
                    </li>
                    <li>Thể loại truyện : 
                        @foreach($truyen->thuocnhieutheloaitruyen as $thuocloai)
                        <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
                    </li>
                    @endforeach
					<li>Số chapter : {{$mucluc}}</li>
					<li>Số lượt xem : {{$truyen->views}}</li>
					<li><a class="xemmucluc" style="cursor: pointer;">Xem mục lục</a></li>
					
					@if($truyen->loaitruyen!='truyentranh')
						@if($chapter_dau)
						<script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://iclickcdn.com/tag.min.js',4232051,document.body||document.documentElement)</script>
						<li>
							<div class="button-container">
								<a href="{{url('xem-chapter/'.$chapter_dau->truyen->slug_truyen.'/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc Truyện</a>
								<form class="ml-2">
									@csrf
									<button type="button" onclick="return themyeuthich()"
										data-fa_publisher_id="{{ Session::get('publisher_id')}}"
										data-fa_title="{{$truyen->tentruyen}}"
										data-fa_image="{{$truyen->hinhanh}}"
										class="btn btn-danger btn-yeuthichtruyen">
									<i class="fa fa-heart" aria-hidden="true"></i> Thích truyện</button>
								</form>
							</div>
						</li>
						
						<li><a href="{{url('xem-chapter/'.$chapter_moinhat->truyen->slug_truyen.'/'.$chapter_moinhat->slug_chapter)}}" class="btn btn-success mt-2">Đọc chương mới nhất</a></li>
						@else
						<li><a class="btn btn-danger">Hiện tại chưa có chương để đọc</a></li>
						@endif
					@else
						@if($chapter_dau)
						<script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://iclickcdn.com/tag.min.js',4232051,document.body||document.documentElement)</script>
						<li><a href="{{url('xem-truyen-tranh/'.$chapter_dau->truyen->slug_truyen.'/'.$chapter_dau->slug_chapter)}}" class="btn btn-danger">Xem Truyện Tranh</a></li>
						<div class="waiting"></div>
						@else
						<li><a class="btn btn-danger">Hiện tại chưa có chương để xem</a></li>
						@endif
					@endif
				</ul>
			</div>
		</div>

		<div class="col-md-12 tomtat-truyen">
			<p id="story-text">{!! $truyen->tomtat !!}</p>
			<button class="btn-custom" onclick="readStory()"><i class="fas fa-book-open"></i></button>
			<button class="btn-custom btn-custom-red" onclick="pauseStory()"><i class="fas fa-pause-circle"></i></button>
			<button class="btn-custom btn-custom-blue" onclick="resumeStory()"><i class="fas fa-play-circle"></i></button>

		</div>

		<script>
			function readStory() {
				var storyText = document.getElementById('story-text').innerText;
				responsiveVoice.speak(storyText, "Vietnamese Female");
			}
			function pauseStory() {
				responsiveVoice.pause();
			}
			function resumeStory() {
				responsiveVoice.resume();
			}
		</script>

		<hr>	

		

		<p>Từ khóa tìm kiếm : 
			@php 
			$tukhoa = explode(",",$truyen->tukhoa);
			@endphp

			<div class="tagcloud05">
				<ul>
					@foreach($tukhoa as $key => $tu)
					<li><a href="{{url('tag/'. \Str::slug($tu) )}}"><span>{{$tu}}</span></a></li>
					@endforeach
				</ul>
			</div>
		</p>

		<h4>Danh sách chương</h4>

		<ul class="mucluctruyen">
			@if($mucluc>0)
				@foreach($chapter as $key => $chap)
					@if($chap->loaichapter!='truyentranh')
				<li><a href="{{url('xem-chapter/'.$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
					@else
				<li><a href="{{url('xem-truyen-tranh/'.$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>	
					@endif
				@endforeach	
			@else
				<li>Đang cập nhật...</li>
			@endif
		</ul>
		
		<div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>

		<h4>Sách cùng danh mục</h4>

		<div class="row">
		 @foreach($cungdanhmuc as $key => $cungdanh)
		 		@foreach($cungdanh->nhieutruyen as $value)
		 			@if($value->id != $truyen->id)
              <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                  <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="{{$value->tentruyen}}">
                  <div class="card-body">
					<h5 class="title_truyen">{{ $value->tentruyen }}</h5>
					<p class="card-text">
						@php
							$tomtat = substr($value->tomtat, 0, 150);
						@endphp
						{{ $tomtat.'....' }}
					</p>
					
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Xem truyện</a>
                        <a class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i> {{$value->views}}</a>
                      </div>
                      <small class="text-muted"></small>
                    </div>
                  </div>
                </div>
              </div>
              	@endif
               @endforeach
            @endforeach
		</div>
	</div>

	<div class="col-md-3">
	
		<h3 style="border-radius: 5px; background:#7e8084;color:#fff;text-align: center;" class="title_truyen">Truyện tranh mới cập nhật</h3>
		@foreach($truyentranh_sidebar as $key => $tranh)
		<div class="row mt-2">
				<div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="{{asset('public/uploads/truyen/'.$tranh->hinhanh)}}" alt="{{$tranh->tentruyen}}"></div>
				<div class="col-md-7 sidebar">
					<a href="{{url('xem-truyen/'.$tranh->slug_truyen)}}">
					<p>{{$tranh->tentruyen}}</p>
					<p><i class="fas fa-eye"></i> {{$tranh->views}}</p>
					</a>
				</div>
		</div>
		@endforeach
	</div>
</div>

@endsection
