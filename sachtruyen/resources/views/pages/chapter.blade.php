@extends('../layout')

{{-- @section('slide')

  @include('pages.slide')

@endsection --}}

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
  /* Định dạng các nút tập trước và tập sau */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    text-decoration: none; /* Loại bỏ gạch chân mặc định trên các liên kết */
    display: inline-block;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
}

/* Định dạng nút khi bị vô hiệu hóa (isDisabled) */
.btn-primary.isDisabled {
    opacity: 0.65;
    pointer-events: none; /* Ngăn không cho người dùng tương tác với nút */
}

/* Định dạng các lựa chọn trong dropdown */
.custom-select {
    display: inline-block;
    width: 100%;
    max-width: 100%;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

/* Định dạng các lựa chọn trong dropdown khi được chọn */
.custom-select:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Định dạng các phần tử p chứa nút tập trước và tập sau */
.col-md-5 .form-group p {
    margin-bottom:; /* Loại bỏ margin dưới cùng của đoạn văn bản */
    margin-top: 5rem; /* Khoảng cách từ trên xuống giữa các đoạn văn bản */
}
    .comment-section {
        margin-top: 20px;
    }

    .comment-section h4 {
        margin-bottom: 20px;
        color: #007bff;
    }

    .comment-section .form-group label {
        font-weight: bold;
    }

    .comment-section .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .comment-section .alert {
        margin-bottom: 20px;
    }

    .comment {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .comment strong {
        font-size: 1.1em;
        color: #343a40;
    }

    .comment p {
        margin: 10px 0;
    }

    .comment small {
        color: #6c757d;
    }

    .login-prompt {
        margin-top: 20px;
        font-size: 1.1em;
    }

    .login-prompt a {
        color: #007bff;
        text-decoration: underline;
    }

    .comment.hidden {
        display: none;
    }
</style>


<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>

    {{-- <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>

    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>

    <li class="breadcrumb-item"><a href="{{url('xem-truyen/'.$chapter->truyen->slug_truyen)}}">{{$chapter->truyen->tentruyen}}</a></li>

    <li class="breadcrumb-item active" aria-current="page">{{$chapter->tieude}}</li> --}}

  </ol>

</nav>



<div class="row">
 
	<div class="col-md-12">

		<h4 class="title_truyen">{{$chapter->truyen->tentruyen}}</h4>

    <button style=" border-radius: 15px; background:#1877f2;color:#fff;" onclick="shareMovie()"><i class="fas fa-share-alt"></i> Chia sẻ </button>
 <br></br>
		<div class="col-md-5">



            <style type="text/css">

              .isDisabled {

                color: currentColor;

                 pointer-events: none;

                opacity: 0.5;

                text-decoration: none;

              }

            .noidungchuong {
          padding: 10px;
          background: #fff;
          /*line-height: 40px !important;*/
         /* font-size: 25px !important;*/
         /* font-family: "Palatino Linotype","Arial","Times New Roman",sans-serif !important;*/
      }

            </style>


              
                                  <div  class="form-group">
                                 


                                  <label for="exampleInputEmail1"></label>
                  
                                  <p class="mt-5"><a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$chapter->truyen->slug_truyen.'/'.$previous_chapter)}}">Tập Trước</a></p>



                                  <select name="select-chapter" class="custom-select select-chapter">

                                    @foreach($all_chapter as $key => $chap)

                                    <option value="{{url('xem-chapter/'.$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>

                                    @endforeach

                                  </select>



                                   <p class="mt-4"><a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}} "   href="{{url('xem-chapter/'.$chapter->truyen->slug_truyen.'/'.$next_chapter)}}">Tập Sau</a></p>

                                  </div>



                            </div>

                  <div class="col-md-6">
                       <div class="form-group">
                        <label for="exampleFormControlSelect2">Màu sắc</label>
                        <select class="form-control" id="change-color">
                          <option value="fff">Mặc định</option>
                          <option value="ddd">Màu tối</option>
                          <option value="f4f4f4">Xám nhạt</option>
                          <option value="e9ebee">Xanh nhạt</option>
                          <option value="E1E4F2">Xanh đậm</option>
                          <option value="F4F4E4">Vàng nhạt</option>
                          <option value="EAE4D3">Màu sepia</option>
                          <option value="FAFAC8">Vàng đậm</option>
                          <option value="EFEFAB">Vàng ố</option> 
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Font chữ</label>
                        <select class="form-control" id="change-font">

                          <option value="Palatino Linotype">Palatino Linotype</option>
                          <option value="Bookerly">Bookerly</option>
                          <option value="Segoe UI">Segoe UI</option>
                          <option value="Patrick Hand">Patrick Hand</option>
                          <option value="Times New Roman">Times New Roman</option>
                          <option value="Verdana">Verdana</option>
                          <option value="Tahoma">Tahoma</option>
                          <option value="Arial">Arial</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Chiều cao dòng</label>
                        <select class="form-control" id="change-lineheight">
                          <option value="40">40</option>
                          <option value="60">60</option>
                          <option value="80">80</option>
                          <option value="100">100</option>
                          <option value="120">120</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Kích thước chữ</label>
                        <input type="hidden" class="fontsize">
                        <button type="button" class="btn btn-primary  size-increment">Tăng</button>
                        <button type="button" data-orig_size="25px" class="btn btn-info size-orig">Ban đầu</button>
                        <button type="button" class="btn btn-secondary size-decrement">Giảm</button>
                      </div>
                  </div>

                  <div class="noidungchuong" style="">

                  {!! $chapter->noidung !!}



                       



                  </div>
                  <div class="container comment-section">
                    <h3>Bình luận</h3>
            
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    @if(Session::get('login_publisher'))
                        <form method="POST" action="{{ route('comment.store', $chapter->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="content">Thêm bình luận:</label>
                                <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    @else
                        <p class="login-prompt">Bạn cần <a href="{{ route('dang-nhap') }}">đăng nhập</a> để thêm bình luận.</p>
                    @endif
            
                    <h4>Tất cả bình luận</h4>
                    @php
                        $comments = $chapter->comments->sortByDesc('created_at');
                        $commentCount = $comments->count();
                    @endphp
                    @foreach ($comments as $index => $comment)
                        <div class="comment {{ $index >= 3 ? 'hidden' : '' }}">
                            <strong>{{ $comment->publisher->Username }}</strong> nói:
                            <p>{{ $comment->content }}</p>
                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                    @endforeach
            
                    @if ($commentCount > 3)
                        <button id="show-more-btn" class="btn btn-secondary" onclick="toggleComments()">Xem thêm</button>
                    @endif
              </div>
          </div>
                          <div class="col-md-5">
                            <div  class="form-group">

                               <p> <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$chapter->truyen->slug_truyen.'/'.$previous_chapter)}}">Tập Trước</a></p>
                            
                              <select name="select-chapter" class="custom-select select-chapter">

                                @foreach($all_chapter as $key => $chap)

                                <option value="{{url('xem-chapter/'.$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>

                                @endforeach

                              </select>



                               <p class="mt-4"><a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}} "   href="{{url('xem-chapter/'.$chapter->truyen->slug_truyen.'/'.$next_chapter)}}">Tập Sau</a></p>

                              </div>
                         </div>
</div>


                

                   <h3>Lưu và chia sẻ truyện :  </h3>

                      <!--   <div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                         
                          <div class="row">
                            <div class="col-md-12"> 
                              <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>
                            </div>
                          </div> -->

                          <script>
                            function shareMovie() {
                                if (navigator.share) {
                                    navigator.share({
                                        title: document.title,
                                        url: window.location.href
                                    }).then(() => {
                                        console.log('Thanks for sharing!');
                                    }).catch((error) => {
                                        console.error('Something went wrong sharing the movie', error);
                                    });
                                } else {
                                    var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href);
                                    window.open(shareUrl, '_blank');
                                }
                            }
                        </script>
                      <script>
                        function toggleComments() {
                            const hiddenComments = document.querySelectorAll('.comment.hidden');
                            const visibleComments = document.querySelectorAll('.comment:not(.hidden)');
                            const showMoreBtn = document.getElementById('show-more-btn');
                
                            if (hiddenComments.length > 0) {
                                hiddenComments.forEach(comment => comment.classList.remove('hidden'));
                                showMoreBtn.textContent = 'Thu gọn';
                            } else {
                                visibleComments.forEach((comment, index) => {
                                    if (index >= 3) {
                                        comment.classList.add('hidden');
                                    }
                                });
                                showMoreBtn.textContent = 'Xem thêm';
                            }
                        }
                    </script>


	</div>



</div>



@endsection