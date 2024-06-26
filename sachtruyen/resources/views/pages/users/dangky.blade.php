@extends('../layout')

{{-- @section('slide')

  @include('pages.slide')

@endsection --}}

@section('content')

  

<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>

    <li class="breadcrumb-item active" aria-current="page">Đăng ký khách hàng </li>

  </ol>

</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))

<div class="alert alert-success" role="alert">

    {{ session('status') }}

</div>

@endif

<form method="POST" action="{{'register-publisher'}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Họ và tên</label>
        <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
       
      </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Tên tài khoản</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
       
      </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Số điện thoại </label>
        <input type="text" name="sdt"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." >
        
    <div class="form-group">
      <label for="exampleInputEmail1">Email </label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mật Khẩu </label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
      <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Kiểm tra lỗi</label>
    </div>
    <button type="submit" class="btn btn-primary">Đăng ký </button>
  </form>




            

           


    @endsection

    