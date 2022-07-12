<!doctype html>
<html lang="zxx">

<head>
@include('blockhome.head')
</head>

<body>
    <!--::header part start::-->
    @include('blockhome.header_part')
    <!-- Header part end-->
    @yield('content')
    <!--::footer_part start::-->
    @include('blockhome.footer_part')
    <!--::footer_part end::-->

    @include('blockhome.alljs')
</body>

</html>