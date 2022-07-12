@extends('master')

<style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;800&display=swap');
    div .form-group{
        font-family: Poppins;
        padding-bottom: 10px;
        margin: 7px;
    }

    label {
        margin: 0 0 0 10px;
        font-size: 19px;
    }

    button.btn{
        background-color: rgb(68, 132, 237);
        font-family: Poppins;
        font-size: 18px;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

@section('content')
    <form action="{{ route('admin.product.update',$products->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <table>

            <tr>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ $products->name }}">
                </div>
            </tr>

            <tr>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="number" class="form-control" name="price" placeholder="Enter your price" value="{{ $products->price }}">
                </div>
            </tr>
    
            <tr>
                <div class="form-group">
                    <label>Giới thiệu</label>
                    <textarea type="text" class="form-control" name="introduce">{{$products->introduce}}</textarea>
                </div>
            </tr>

            <tr>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea type="text" class="form-control" name="content">{{$products->content}}</textarea>
                </div>
            </tr>
            <tr>
                <div class="form-group">
                    <label>Thể loại trang</label>
                    <select class="form-control" name = "id_category">
                        <option value="0" style="text-align: center">--- ROOT ---</option>
                        {{OptionSelects($categorys,0)}}
                    </select>
                </div>
            </tr>
            <tr>
                <div class="form-group">
                    <label>Ảnh hiện tại:</label>
                        @php 
                            foreach ($data_image as $data_imag) {
                                if($data_imag->id_product == $products->id) {
                                    $avatar = $data_imag->src;
                                    $image = asset('images/' . $avatar);
                                    echo '<img width="150px" src="' . $image . '">';
                                }
                            }
                        @endphp
                </div>
            <tr>
                <div class="form-group" id="addimg">
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="src[]">
                </div>
                {{-- <div class="card-footer" style="text-align: center">
                    <input type="button" class="btn btn-info" value="ADD" id="addmore">
                </div> --}}
            </tr>

            <tr>
                <div class="card-footer"  style="text-align: center; padding: 20px">
                    <button type="submit" class="btn btn-info">Sửa</button>
                </div>
            </tr>

        </table>
    </form>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/myscript.js') }}"></script>
@endsection