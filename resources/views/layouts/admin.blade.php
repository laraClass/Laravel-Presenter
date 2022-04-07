<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>




    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet"  >
    <link href="{{ asset('admin/css/bootstrap.rtl.min.css') }}" rel="stylesheet"  >


    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/css/dashboard.css') }}" rel="stylesheet"  >

    @yield('style')
</head>
<body>

@include('admins.partials.header')

<div class="container-fluid">
    <div class="row">
        @include('admins.partials.nav')
        <main class="col-md-9 ms-sm-auto col-lg-8">

            @yield('content')


        </main>
    </div>
</div>


<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"   ></script>

<script src="{{ asset('admin/js/feather.min.js') }}"  ></script>
<script src="{{ asset('admin/js/dashboard.js') }}"></script>

@yield('scripts')

</body>
</html>
