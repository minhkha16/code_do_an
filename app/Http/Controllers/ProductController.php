<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{
    public function index () {
        $truy_van = DB::table('products')->get();
        $data_image = DB::table('image_product')->get();
        $categorys = DB::table('category')->get();
        return view('admin.product.index',['products' => $truy_van,'data_image' => $data_image,'categorys' => $categorys]);
    }

    public function create () {
        $category = DB::table('category')->get();
        return view('admin.product.create', ['categorys'=>$category]);
    }

    // public function edit ($id) {
    //     $truy_van = DB::table('products')->where('id', $id)->first();
    //     $data_image = DB::table('image_product')->get();
    //     return view('admin.product.edit',['id'=>$id, 'products'=>$truy_van], ['data_image' => $data_image]);
    // }

    public function edit($id){
        $datas= DB::table('image_product')->get();
        $truy_van= DB::table('products')->where('id',$id)->first();
        $categorys = DB::table('category')->get();
        return view('admin.product.edit',['products'=> $truy_van,'data_image'=>$datas, 'categorys'=>$categorys]);
    }

    public function update (Request $request, $id) {
    //code của team {
        $data = $request->except('_token');
        
        if(!empty($request->src)){
            $data_old = DB::table('products')->where('id', $id)->first();
            DB::table('image_product')->where('id_product', $id)->first();
            $url_image_old_path = public_path('images/'. $data_old->src);
            if(file_exists($url_image_old_path)){
                unlink($url_image_old_path);
            }
            
            dd($image_change_name = time().'.'.$request->src->extension());
            $request->src->move(public_path('images'), $image_change_name);
            $data['src'] = $image_change_name;
        }
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('admin.product.index');
    
    }


    public function store (ProductRequest $request) {
        $data = $request->only('name','id_category', 'content','introduce','price');
        $product_id = DB::table('products')->insertGetId($data);
        $data_images= $request->src;
        foreach ($data_images as $image) {
            $imageName = time().'.'.$image->getClientOriginalName();  
            $image->move(public_path('images'), $imageName);
            $data_product_image['src']= $imageName;
            $data_product_image['id_product'] = $product_id;
            DB::table('image_product')->insert($data_product_image);
        }
        return redirect()->route('admin.product.index');
    }

    
    public function delete ($id) {
        DB::table('image_product')->where('id_product', $id)->delete();

        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('admin.product.index');
    }


    //Hiển thị giỏ hàng.
    
    //search
    public function search (Request $request) {
        $search = $request->name;
        $rong = '';
        if($search == ''){
            $rong = '';
        }else{
            $data = DB::table('products')->where('name', 'LIKE', '%'.$search.'%')->get();
            foreach ($data as $dt){
                $rong .= '<li>'.$dt->name.'</li>';
            }
        }
            return $rong;
    }
}
