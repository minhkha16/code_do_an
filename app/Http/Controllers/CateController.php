<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
class CateController extends Controller
{
    public function create() {
        $data = DB::table('category')->get();
        
        return view('admin.category.create',['categorys' => $data]);
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token');
        
        $data['created_at'] = new \DateTime();

        DB::table('category')->insert($data);
        return redirect()->route('admin.category.index');
    }

    public function index() {
        $data = DB::table('category')->get();
        $datas = DB::table('category')->get();
        return view('admin.category.index',['category' => $data,'categorys' => $datas]);
    }

    public function update(Request $request,$id){
        $data = $request-> except('_token');
        DB::table('category')->where('id',$id)->update($data);
        return redirect()->route('admin.category.index');
    }

    public function edit($id){
        $data = DB::table('category')->where('id', $id)->first();
        $datas = DB::table('category')->get();
        return view('admin.category.edit',['edit'=>$data,'category'=> $datas]);
    }

    public function delete ($id) {
        $deletes= DB::table('category')->get();
        $detele_product = DB::table('products')->get();
        $tk = true;
        foreach($detele_product as $delete){
            if($delete->id_category == $id){
                $tk = false;
            }else {
                $tk = true;
            }
        }
        foreach($deletes as $delete){
            if($delete->parent == $id){
                $kt = false;
            }else {
                $kt = true;
            }
        }
        if ($kt && $tk){
            DB::table('products')->where('id_category',$id)->delete();
            DB::table('category')->where('id',$id)->delete();
            return redirect()->route('admin.category.index');
        }else{
            return '<script>
            alert("Bạn không thể xóa thể loại này vì nó còn chứa thể loại khác hoặc sản phẩm")
            </script>'. redirect()->route('admin.category.index');
        }
    }
}
