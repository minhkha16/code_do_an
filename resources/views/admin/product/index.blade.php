<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="./fontawesome-free-6.0.0-web/css/all.css">

@extends('master')

@section('content')
<div class="card-body">
    <form  enctype="multipart/form-data">
    <table border=1 cellspacing=0 cellpadding=8  width="1000px" class="table table-bordered">
            <tr>
                <th style="width:50px; text-align:center">STT</th>
                <th style="width:350px; text-align:center">Hình ảnh</th>
                <th style="width:350px; text-align:center">Tên sản phẩm</th>
                <th style="width:100px; text-align:center">Giá</th>
                <th style="width:100px; text-align:center">Giới thiệu</th>
                <th style="width:130px; text-align:center">Nội dung</th>
                <th style="width:350px; text-align:center">Thể loại</th>
                <th style="width:100px; text-align:center">Sửa</th>
                <th style="width:100px; text-align:center">Xóa</th>
            </tr>


        @forelse($products as $product)
            <tr>
                <td align="center" width="5%">{{ $loop->iteration }}</td>
                <td align="center">
                    {{-- in ra 1 hình --}}
                    {{-- @php 
                        foreach ($data_image as $data_imag) {
                            if($data_imag->id_product == $product->id) {
                                $avatar = $data_imag->src;
                                $image = asset('images/' . $avatar);
                                $html = '<img width="150px" src="';
                                $xhtml = '"';
                                echo $html.$image.$xhtml;
                            }
                        }
                    @endphp --}}


                        {{-- show hết hình trong mảng --}}
                    @php
                        foreach ($data_image as $img) {
                            if($img->id_product == $product->id) {
                                $avatar = $img->src;
                                $image = asset('images/' . $avatar);
                                echo '<img width="150px" src="' . $image . '">';
                            }
                        }
                    @endphp

                </td>
                <td align="center" width="10%">{{ $product->name }}</td>
                <td align="center" width="10%">{{ $product->price }}</td>
                <td align="center" width="15%">{{ $product->introduce }}</td>
                <td align="center" width="10%">{{ $product->content }}</td>
                <td align="center" width="10%">
                    @php
                        foreach ($categorys as $item) {
                            if($product->id_category == $item->id){
                                echo $item->name;
                            }
                        }
                    @endphp
                </td>
                <td align="center"><a href="{{route('admin.product.edit', ['id' => $product->id] )}}"><i class="fa-regular fa-pen-to-square" style="font-size:25px"></i></a></td>
                <td align="center"><a href="{{route('admin.product.delete', ['id' => $product->id] )}}"><i class="fa-solid fa-trash" style="font-size:25px"></i></a></td>
            </tr>

            @empty
                <tr>
                    <td align="center" colspan=8>No data</td>
                </tr>
        @endforelse
    </table>
</form>
</div>
@endsection