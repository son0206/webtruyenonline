<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Role::create(['name'=>'admin2']);
        //Permission::create(['name' => 'publish articles']);

        $user = User::orderBy('id','DESC')->get();
        return view('admincp.user.index')->with(compact('user'));
    }

    //
    public function assignRole($id)
    {
      $user = User::find($id);
      $name_roles = $user->roles->first()->name;
      $all_column_roles = $user->roles->first();
      $role = Role::orderBy('id','DESC')->get();
      return view('admincp.user.assign_roles')->with(compact('role','user','all_column_roles','name_roles'));
    }
    //
    public function phanvaitro($id)
{
    $user = User::find($id);
    
    if($user->roles->isNotEmpty()) {
        $name_roles = $user->roles->first()->name;
        $all_column_roles = $user->roles->first();
    } else {
        $name_roles = null;
        $all_column_roles = null;
    }

    $permission = Permission::orderBy('id','DESC')->get();
    $role = Role::orderBy('id','DESC')->get();
    
    return view('admincp.user.phanvaitro',compact('user','role','all_column_roles','name_roles','permission'));
}
    ///
    public function phanquyen($id)
{
    $user = User::find($id);
    
  
    $name_roles = $user->roles->first()->name;
    $permission = Permission::orderBy('id','DESC')->get();
    
    $get_permission_via_role = $user->getPermissionsViaRoles();
  
    
    return view('admincp.user.phanquyen',compact('user','name_roles','permission','get_permission_via_role'));
}

    //
    public function insert_roles(Request $request,$id)
    {
    $data = $request->all();
    $user = User::find($id);
    $user->syncRoles($data['role']);
    $role_id = $user->roles->first()->id;
        //$user->removeRoles($data['role']);
        //$user->assignRoles($data['role']);
        return redirect()->back()->with('status','thêm quyền user thành công');
    }
    ///
    public function insert_permission(Request $request,$id)
    {
    $data = $request->all();
    $user = User::find($id);
    $role_id = $user->roles->first()->id;
    /// cap quyen
    $role = Role::find($role_id);
    $user->syncPermissions($data['permission']);
        //$user->removeRoles($data['role']);
        //$user->assignRoles($data['role']);
        return redirect()->back()->with('status','thêm vai trò user thành công');
    }
////
    public function insert_per_permission(Request $request)
    {
        $data = $request->all();
        $permission = new Permission();
        $permission->name = $data['permission'];
        $permission->save();
        return redirect()->back()->with('status','thêm quyền thành công');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->password = Hash::make($data['password']);
        $user->email= $data['email'];
        $user->name= $data['name'];
        $user->save();
        return redirect()->back()->with('status','thêm  user thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
