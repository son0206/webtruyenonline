<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="description" content="{{$meta_desc}}"/>
        <meta name="keywords" content="{{$meta_keywords}}"/>
        <meta name="robots" content="index, follow"> 
        <link rel="canonical" href="{{$url_canonical}}" />

        <!------Share Fb------->
        <meta property="og:type" content="website" />

        <meta property="og:title" content="{{$title}}" />

        <meta property="og:description" content="{{$meta_desc}}" />

        <meta property="og:image" content="{{$og_image}}" />

        <meta property="og:url" content="{{$url_canonical}}" />

        <meta property="og:site_name" content="Sachtruyen247" />

        <link rel="icon" href="{{$link_icon}}" type="image/gif" sizes="16x16">

        <title>{{$title}}</title>
        <!-- Styles -->
       

         <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
         
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style type="text/css">
          h5{
            font-weight: bold;
            line-height: 25px;
          }
          .switch_color{
            background: #181818;
            color: #fff;
          }
          .switch_color_light{
            background: #181818 !important;
            color:#000;
          }
          .noidung_color {
            color:#000;
          }
          
        </style>
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <script src="https://code.responsivevoice.org/responsivevoice.js?key=TZMAq2fn"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div  class="container">
            <!-----------------Menu-------------------->
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0; margin-bottom: 10px; border-radius: 20px; width: 0% !important; background: #0033FF !important;">
              <a class="navbar-brand" href="{{url('/')}}"><img style=" border-radius: 15px; height: 75px;" alt="Logo" src="{{asset('public/uploads/logo/'.$info->logo)}}" width="250px"></a>
              <style type="text/css">
                ul.navbar-nav.mr-auto li a {
                  font-size: 20px;
              }
              .card.mb-3.box-shadow img {
                          height: 250px;
                          border: 3px solid #000;
                          padding: 5px;
                      }
                      .item h5 {
                  margin: 10px 0;
              }
              </style>
              
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div style="background: #0033FF; border-radius: 8px; height: 65px; width:850px; " class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a style="border-radius: 10px; color: #FFFAFA; white-space: nowrap;" class="nav-link" href="{{url('/')}}"><i class="fas fa-home"></i> Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a style="border-radius: 10px; color: #FFFAFA; white-space: nowrap;" class="nav-link" href="{{url('/truyen-tranh')}}"><i class="fas fa-book"></i> Truyện<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="border-radius: 10px; color: #FFFAFA; white-space: nowrap;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list-ul" aria-hidden="true"></i> Danh mục truyện
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            @foreach($danhmuc as $key => $danh)
                            <a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}" style="white-space: nowrap;"><i class="fa fa-list-ul" aria-hidden="true"></i> {{$danh->tendanhmuc}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="border-radius: 10px; color: #FFFAFA; white-space: nowrap;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tags" aria-hidden="true"></i> Thể loại
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            @foreach($theloai as $key => $the)
                            <a class="dropdown-item" href="{{url('the-loai/'.$the->slug_theloai)}}" style="white-space: nowrap;"><i class="fa fa-tags" aria-hidden="true"></i> {{$the->tentheloai}}</a>
                            @endforeach
                        </div>
                    </li>
                    @if(!Session::get('login_publisher'))
                    <li class="nav-item dropdown">
                        <a style="border-radius: 10px; color: #FFFAFA; white-space: nowrap;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user" aria-hidden="true"></i> TK
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <a class="dropdown-item" href="{{route('dang-ky')}}" style="white-space: nowrap;"><i class="fa fa-users" aria-hidden="true"></i> Đăng ký</a>
                            <a class="dropdown-item" href="{{route('dang-nhap')}}" style="white-space: nowrap;"><i class="fa fa-user" aria-hidden="true"></i> Đăng nhập</a>
                            <a class="dropdown-item" href="{{route('login')}}" style="white-space: nowrap;"><i class="fa fa-list-ul" aria-hidden="true"></i> Đăng truyện</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a style="border-radius: 10px; color: #FFFAFA; white-space: nowrap;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user" aria-hidden="true"></i> {{Session::get('username') ?? 'lo'}} TK
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                          
                            <a class="dropdown-item" href="{{route('yeu-thich')}}" style="white-space: nowrap;"><i class="fa fa-user" aria-hidden="true"></i> Truyện yêu thích</a>
                            <a class="dropdown-item" href="{{route('dang-xuat')}}" style="white-space: nowrap;"><i class="fa fa-user" aria-hidden="true"></i> Đăng xuất</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
            
            </nav>
            
            <marquee style="color: red;" behavior="scroll" direction="left">Truyện HD là một trang web truyện online rất thích hợp cho những người yêu thích sự đơn giản và tiện lợi. Đây là một nơi lý tưởng để thỏa mãn đam mê đọc truyện, đặc biệt là truyện ngôn tình, trong những ngày bạn cảm thấy cần một chút thay đổi hoặc đơn giản là muốn giải trí. Trang web này mang đến những phút giây thư giãn đáng giá bởi giao diện của nó được thiết kế dễ nhìn và dễ sử dụng. Bạn có thể dễ dàng tìm kiếm các tác phẩm, và danh mục truyện ở đây rất đa dạng về thể loại.</marquee>
            <div class="row">
              
              <div class="col-md-12">
              <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="POST">
                @csrf
                  <input style=" border-radius: 5px;"class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa"  placeholder="Tìm kiếm tác giả,truyện...." aria-label="Search">
                  
                  <div id="search_ajax"></div>
                 
                  
                  <button style=" background-color:#00DD00; color:#000;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
         
                  <div>
                    <style>
             .form-inline {
                    display: flex;
                    justify-content: center; /* Căn giữa form */
                    width: 100%; /* Chiều rộng 100% */
                    max-width: 600px; /* Chiều rộng tối đa */
                    margin: 0 auto; /* Căn giữa theo chiều ngang */
                }

                .form-inline .form-control {
                    width: 80%; /* Chiều rộng 100% cho ô nhập liệu */
              }

                .custom-select {
                width: 100px;
                border: 1px solid #54FF9F;
                border-radius: 15px;
                appearance: none;
                background-color: #E0EEEE;
                color: #FF0000;
                font-size: 10px;
                cursor: pointer;
                position: absolute;
                top: 10px;  /* Điều chỉnh khoảng cách từ cạnh trên */
                right: 10px;  /* Điều chỉnh khoảng cách từ cạnh phải */
              }
                  
                
                    </style>
                    
                    
                    <select class="custom-select mr-sm-2" id="switch_color">
                      <option value="xam">Nền Xám</option>
                      <option value="den"> Nền Đen</option>
                    
                    
                    </select>
                  </div>
                  

                </form>
              

              </div>
            </div>
            <br></br>
            <style>
              .alert {
                  padding: 15px;
                  margin-bottom: 20px;
                  border: 1px solid transparent;
                  border-radius: 4px;
              }
              .alert-success {
                  color: #3c763d;
                  background-color: #dff0d8;
                  border-color: #d6e9c6;
              }
          </style>
      </head>
      <body>
          <!-- Các phần khác của body -->
      
          @if (session('status'))
              <div class="alert alert-success" id="status-alert">
                  {{ session('status') }}
              </div>
          @endif
      
          <!-- Các phần khác của body -->
      
          <!-- JavaScript để tự động ẩn thông báo sau 2 giây -->
          <script>
              $(document).ready(function() {
                  setTimeout(function() {
                      $("#status-alert").fadeOut("slow");
                  }, 2000); // 2000 milliseconds = 2 seconds
              });
          </script>
            <!-----------------Slide-------------------->
            @yield('slide')
            <!-----------------Sach moi-------------------->
            @yield('content')


          <footer class="text-muted">
          <div class="container">
            <p class="float-right">
              <a style=" border-radius: 5px; background:#1877f2;color:#fff;" href="#"> Nút Trở Lên </a>
            </p>
            <p>{{$info->tieude_footer}}</p>
            <p>Tất cả người dùng được yêu cầu tuân thủ nghiêm ngặt luật pháp và quy định quốc gia có liên quan khi xuất bản nội dung. Chúng tôi từ chối mọi nội dung không hợp thuần thong mỹ tục, bạo lực, bất hợp pháp khác và sẽ huỷ chúng ngay khi phát hiện.
              Bản quyền của các tác phẩm trên trang này (tiểu thuyết, bình luận, hình ảnh v.v.) thuộc về tác giả gốc. Trang này chỉ cung cấp chức năng tải lên, lưu trữ và hiển thị.
              Các tác phẩm, bình luận, nội dung hoặc hình ảnh đều do thành viên đăng tải. Nếu làm ảnh hưởng đến cá nhân hay tổ chức nào, khi được yêu cầu, chúng tôi sẽ xác minh và gỡ bỏ ngay lập tức.</p>
            <p style=" color:#f30707;">Mạng xã hội :     <button style=" border-radius: 15px; background:#1877f2;color:#fff;" onclick="shareMovie()"><i class="fas fa-share-alt"></i> Chia sẻ </button>
              <br></br>
              <a style=" border-radius: 5px;" href="#">Truyen HD ra đời mang sứ mệnh kết nối cộng đồng yêu thích truyện.</a>
          </div>
            </footer>



        </div>
        

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          show_wishlist();
          function show_wishlist(){
              if(localStorage.getItem('wishlist_truyen') != null){
                  var data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                  data.reverse();
                  for(let i = 0; i < data.length; i++){
                      var title = data[i].title;
                      var img = data[i].img;
                      var id = data[i].id;
                      var url = data[i].url;
  
                      $('#yeuthich').append(`
                          <div class="row mt-2 wishlist-item" data-id="` + id + `">
                              <div class="col-md-5">
                                  <img class="img img-responsive" width="100%" class="card-img-top" src="` + img + `" alt="` + title + `">
                              </div>
                              <div class="col-md-7 sidebar">
                                  <a href="` + url + `">
                                      <p>` + title + `</p>
                                  </a>
                                  <input type="checkbox" class="remove-wishlist-item" data-id="` + id + `"> Remove
                              </div>
                          </div>
                      `);
                  }
              }
          }
  
          $(document).on('click', '.btn-thich_truyen', function(){
              $('.fa.fa-heart').css('color','#fac');
              const id = $('.wishlist_id').val();
              const title = $('.wishlist_title').val();
              const img = $('.card-img-top').attr('src');
              const url = $('.wishlist_url').val();
              const item = {
                  'id': id,
                  'title': title,
                  'img': img,
                  'url': url
              };
              if(localStorage.getItem('wishlist_truyen') == null){
                  localStorage.setItem('wishlist_truyen', '[]');
              }
              var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
              var matches = $.grep(old_data, function(obj){
                  return obj.id == id;
              });
              if(matches.length){
                  alert('Truyện đã có trong danh sách yêu thích');
              } else {
                  if(old_data.length <= 10){
                      old_data.push(item);
                  } else {
                      alert('Đã đạt tới giới hạn lưu truyện yêu thích.');
                  }
                  localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
                  alert('Đã lưu vào danh sách truyện yêu thích.');
                  $('#yeuthich').empty();
                  show_wishlist();
              }
          });
  
          $(document).on('change', '.remove-wishlist-item', function(){
              const id = $(this).data('id');
              var data = JSON.parse(localStorage.getItem('wishlist_truyen'));
              var new_data = data.filter(function(item){
                  return item.id != id;
              });
              localStorage.setItem('wishlist_truyen', JSON.stringify(new_data));
              $(this).closest('.wishlist-item').remove();
          });
  
          if(localStorage.getItem('switch_color') !== null){
              const data = localStorage.getItem('switch_color');
              const data_obj = JSON.parse(data);
              $(document.body).addClass(data_obj.class_1);
              $('.album').addClass(data_obj.class_2);
              $('.card-body').addClass(data_obj.class_1);
              $('ul.mucluctruyen > li > a').css('color','#fff');
              $('.sidebar > a').css('color','#fff');
              $("select option[value='den']").attr("selected", "selected");
          }
  
          $("#switch_color").change(function(){
              $(document.body).toggleClass('switch_color');
              $('.album').toggleClass('switch_color_light');
              $('.card-body').toggleClass('switch_color');
              $('.noidungchuong').addClass('noidung_color');
              $('ul.mucluctruyen > li > a').css('color','#fff');
              $('.sidebar > a').css('color','#fff');
              if($(this).val() == 'den'){
                  var item = {
                      'class_1':'switch_color',
                      'class_2':'switch_color_light'
                  };
                  localStorage.setItem('switch_color', JSON.stringify(item));
              } else if($(this).val() == 'xam'){
                  localStorage.removeItem('switch_color');
                  $('ul.mucluctruyen > li > a').css('color','#000');
              }
          });
      });
  </script>
    <script type="text/javascript">
      $(document).ready(function(){

           var color = $('#change-color :selected').val();
                        var font = $('#change-font :selected').val();
                        var lineheight = $('#change-lineheight :selected').val();
                      

          if (localStorage.getItem("chapter_style") === null) {

             $('.noidungchuong').css({'background':'#fff','line-height':'40px','font-size':'25px','font-family':'"Palatino Linotype","Arial"'});
          }else if(localStorage.getItem("chapter_style") !== null){

           
                           const data = localStorage.getItem('chapter_style');
                           const data_obj = JSON.parse(data);

                             $("select option[value='"+data_obj.color+"']").attr("selected","selected");
                            $("select option[value='"+data_obj.font+"']").attr("selected","selected");
                            $("select option[value='"+data_obj.lineheight+"']").attr("selected","selected");

                 $('.noidungchuong').css({'background':'#'+data_obj.color,'line-height':data_obj.lineheight+'px','font-family':data_obj.font,'font-size':data_obj.font_size});          

          }
         
          
           $('#change-color,#change-font,#change-lineheight').on('change',function(){

                        var color = $('#change-color :selected').val();
                        var font = $('#change-font :selected').val();
                        var lineheight = $('#change-lineheight :selected').val();

                        //localstorage
                      
                        

                        
                             localStorage.setItem('chapter_style', '[]');
                               var newItem = {
                                'color':color,
                                'font' :font,
                                'lineheight': lineheight,
                                'font_size':25

                              }
                              localStorage.setItem('chapter_style', JSON.stringify(newItem));
                        
                     
                         
                        
                          
                          // var old_data = JSON.parse(localStorage.getItem('chapter_style'));

                           const data = localStorage.getItem('chapter_style');
                           const data_obj = JSON.parse(data);
                         
                          
                           if(color!='' || font!='' || lineheight!=''){
                               $('.noidungchuong').css({'background':'#'+data_obj.color,'line-height':data_obj.lineheight+'px','font-family':data_obj.font,'font-size':data_obj.font_size});
                           }

              });

                var $affectedElements = $('.noidungchuong');

                   $('.size-increment').click(function(){
                       changeFontSize(2);

                   })
                    $('.size-decrement').click(function(){
                       changeFontSize(-2);

                   })
                    $(".size-orig").click(function(){
                     $affectedElements.each( function(){
                        var $this = $(this);
                        $this.css( "font-size" , $('.size-orig').data('orig_size') );
                         // Get the existing data
                      
                       
                       
                      });
                    if(localStorage.getItem("chapter_style") === null){
                      var newItem = {
                              'color': color,
                              'font' : font,
                              'lineheight': lineheight,
                              'font_size': parseInt($('.size-orig').data('orig_size'))
                          }
                    }else if(localStorage.getItem("chapter_style") !== null){
                      const data = localStorage.getItem('chapter_style');
                      const data_obj = JSON.parse(data);
                      var newItem = {
                              'color': data_obj.color,
                              'font' : data_obj.font,
                              'lineheight': data_obj.lineheight,
                              'font_size': parseInt($('.size-orig').data('orig_size'))
                          }
                    }

                      // Save back to localStorage
                      localStorage.setItem('chapter_style', JSON.stringify(newItem));
                   
                  })
                  function changeFontSize(direction){
                      $affectedElements.each( function(){
                          var $this = $(this);
                          $this.css( "font-size" , parseInt($this.css("font-size"))+direction );

                      // Get the existing data
                      
                      

                      });
                       if(localStorage.getItem("chapter_style") === null){
                        var newItem = {
                              'color': color,
                              'font' : font,
                              'lineheight': lineheight,
                              'font_size':  parseInt($affectedElements.css("font-size"))+direction
                          }
                        }else if(localStorage.getItem("chapter_style") !== null){
                            const data = localStorage.getItem('chapter_style');
                            const data_obj = JSON.parse(data);
                            var newItem = {
                                    'color': data_obj.color,
                                    'font' : data_obj.font,
                                    'lineheight': data_obj.lineheight,
                                    'font_size': parseInt($affectedElements.css("font-size"))+direction
                                }
                    }
                      

                      // Save back to localStorage
                      localStorage.setItem('chapter_style', JSON.stringify(newItem));
                   
                  }

                 
          
              })
                       
                      </script>
    <script type="text/javascript">
      $('#keywords').keyup( function() {
          var keywords = $(this).val();

            if(keywords != '')
              {

               var _token = $('input[name="_token"]').val();

               $.ajax({

                url:"{{url('/timkiem-ajax')}}",
                method:"POST",
                data:{keywords:keywords, _token:_token},
                success:function(data){
                 $('#search_ajax').fadeIn();  
                  $('#search_ajax').html(data);
                }

               });

              }else{

                $('#search_ajax').fadeOut();  
              }
          });

          $(document).on('click', '.li_timkiem_ajax', function(){  
              $('#keywords').val( $(this).text() );  
              $('#search_ajax').fadeOut();  
          }); 
      </script>

       <script type="text/javascript">
                          show_tranh();
                          function show_tranh(){
                              var showtranh = $('.showtranh').val();
                              var slug_chapter = $('.slug_chapter').val();
                              var _token = $('input[name="_token"]').val();

                              if(showtranh=='showtranh'){
                               
                                $.ajax({
                                    url:'{{url('/show-tranh')}}',
                                    method:"POST",
                                    data:{slug_chapter:slug_chapter,_token:_token},
                                    beforeSend: function(){
                                      $("#loader").show();
                                    },
                                    success:function(data){
                                       $('#show_tranh').html(data);
                                      $("#loader").hide();
                                    }

                                });
                              }
                          }
                      </script>
    <script type="text/javascript">
      $('.xemmucluc').click(function(){
          $('html, body').animate({
              scrollTop: $(".mucluctruyen").offset().top
          }, 1000);
      });
    </script>

       <script type="text/javascript">
           $('.owl-carousel').owlCarousel({
                loop:false,
                margin:10,
                dot:true,
                // nav:true,
                responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
       </script>
     
       <script type="text/javascript">
         $('.select-chapter').on('change',function(){

            $('.waiting').text('Đang chuyển chương vui lòng chờ xíu....');
           
            var url = $(this).val();


            if(url){


              window.location = url;
              
            }
            return false;
         });

         current_chapter();

         function current_chapter(){
            var url  = window.location.href; 

            $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
         }
       </script>
       <script type="text/javascript">
         $(".xemmucluc").click(function() {
            $('html, body').animate({
                scrollTop: $(".mucluctruyen").offset().top
            }, 1000);
        });
       </script>
       <script type="text/javascript">
       	const $dropdown = $(".dropdown");
			const $dropdownToggle = $(".dropdown-toggle");
			const $dropdownMenu = $(".dropdown-menu");
			const showClass = "show";

			$(window).on("load resize", function() {
			  if (this.matchMedia("(min-width: 768px)").matches) {
			    $dropdown.hover(
			      function() {
			        const $this = $(this);
			        $this.addClass(showClass);
			        $this.find($dropdownToggle).attr("aria-expanded", "true");
			        $this.find($dropdownMenu).addClass(showClass);
			      },
			      function() {
			        const $this = $(this);
			        $this.removeClass(showClass);
			        $this.find($dropdownToggle).attr("aria-expanded", "false");
			        $this.find($dropdownMenu).removeClass(showClass);
			      }
			    );
			  } else {
			    $dropdown.off("mouseenter mouseleave");
			  }
			});
       </script>
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
      function themyeuthich() {
          var title = $('.btn-yeuthichtruyen').data('fa_title');
          var image = $('.btn-yeuthichtruyen').data('fa_image');
          var publisher_id = $('.btn-yeuthichtruyen').data('fa_publisher_id');
          var _token = $('input[name="_token"]').val();
  
          $.ajax({
              url:'{{ route('themyeuthich')}}',
              method:"POST",
              data:{title:title,image:image,publisher_id:publisher_id,_token:_token}, // Thay đổi |_token| thành |token|
              success:function(data) {
                if(data=='Fail'){
                  alert('Truyện đã có trong mục yêu thích.');
                }else{
                  alert('Thêm truyện yêu thích thành công.');
                }
              }
          });
      }
  </script>
  
    

      <!-- Global site tag (gtag.js) - Google Analytics -->
      {!!$info->google_analytics!!}

    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=6125793717446054&autoLogAppEvents=1" nonce="Awt2q2di"></script>




<script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://iclickcdn.com/tag.min.js',4232051,document.body||document.documentElement)</script>
   <script data-ad-client="ca-pub-8704329899201751" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </body>

</html>
