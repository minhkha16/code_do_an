<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data= DB::table('user')->get();
        return view('admin.user.index',['admins'=> $data]);
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        $data= $request->except('_token','password_confirmtion');
        $data['password'] = bcrypt($request->password); 
        DB::table('user')->insert($data);
        return redirect()->route('admin.user.index')->with('success','create successfully')->with('success','create successfully');
    }
    public function edit($id){
        $data= DB::table('user')->where('id',$id)->first();
        $edit_myself = null;
        if (Auth::user()->id == $id) {
            $edit_myself = true;
        } else {
            $edit_myself = false;
        }
        if(Auth::user()->id != 1 && ($id == 1 || ($data->level == 1 && $edit_myself == false))){
            return '<script>
            alert("Bạn không đủ quyền hạn để sửa thành viên này")
            </script>'.redirect()->route('admin.user.index');
        }
        return view('admin.user.edit',['edit'=> $data]);
    }
    public function update(Request $request,$id){
        $data= $request->except('_token','password');
        if(!empty($request->password)){
            $data['password'] = bcrypt($request->password);
        }
        DB::table('user')->where('id',$id)->update($data);
        return redirect()->route('admin.user.index')->with('success','edit successfully');
    }
    public function delete($id){
        $data= DB::table('user')->where('id',$id)->first();
        if(($id == 1) || (Auth::user()->id != 1 && $data->level == 1)){
            return '<script>
            alert("Bạn không đủ quyền hạn để sửa thành viên này")
            </script>'.redirect()->route('admin.user.index');
        }
        DB::table('user')->where('id','=',$id)->delete();
        return redirect()->route('admin.user.index');
    }
}
