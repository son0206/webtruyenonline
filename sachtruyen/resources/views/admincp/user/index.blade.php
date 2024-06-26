@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10-center">
            <div class="card">
                <div class="card-header">Liệt kê User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-responsive">
                      <thead>
                        
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tên User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Password</th>
                          <th scope="col">Vai trò(Role) </th>
                          <th scope="col">Quyền(Permissions)</th>
                          <th scope="col">Quản lý </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($user as $key =>$u)
                        <tr>
                          <th scope="row">{{$key}}</th>
                          <th scope="row">{{$u->name}}</th>
                          <th scope="row">{{$u->email}}</th>
                          <th scope="row">{{$u->password}}</th>
                          <th scope="row">
                            @foreach($u->roles as $key =>$role)
                  
                            <h5><span class="badge badge-primary">{{$role->name}}</span></h5>
                            @endforeach
                          </th>
                          <th scope="row">
                            @foreach($u->permissions as $key =>$permission)
                            <h5><span class="badge badge-primary"> {{$permission->name}}</span></h5>
                           
                            @endforeach
                          </th>
                          <th scope="row">
                            <a href="{{url('phan-vaitro/'.$u->id)}}" class="btn btn-success">Phân vai trò </a>
                            <br></br>
                            <a href="{{url('phan-quyen/'.$u->id)}}" class="btn btn-danger">Phân quyền  </a>
                            <br></br>
                            
                          </th>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
