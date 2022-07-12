<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="./fontawesome-free-6.0.0-web/css/all.css">
@extends('master')


@section('content')

    <div class="card-body">
        <table cellpadding=50% style="border:20px; width:100%" class="table table-bordered">
                <tr>
                    <th style="width:500px; text-align:center">Danh sách thể loại</th>
                    <th style="width:500px; text-align:center">Parent</th>
                    <th style="width:300px; text-align:center">Sửa</th>
                    <th style="width:300px; text-align:center">Xóa</th>
                </tr> 
                <tr>
                    {{recursiveTable($categorys)}}
                </tr>

        </table>
    </div>

@endsection

