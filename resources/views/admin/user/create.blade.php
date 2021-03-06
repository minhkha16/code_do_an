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

@if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<table >
    <form action="{{route('admin.user.store')}}" method="post">
        @csrf
        <tr>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your email">
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter your email">
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <label>password_confirmtion</label>
                <input type="password" class="form-control" name="password_confirmtion" placeholder="Enter your password_confirmtion">
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter your email">
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter your Address">
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <label>level</label>
                <select class="form-control" name="level">
                    <option value="1">admin</option>
                    <option value="2">member</option>
                </select>
            </div>
        </tr>
        <tr>
            <div class="card-footer"  style="text-align: center; padding: 20px">
                <button type="submit" class="btn btn-info">Th??m</button>
            </div>
        </tr>
    </form>
</table>
@endsection