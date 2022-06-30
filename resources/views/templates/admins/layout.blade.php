<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{!! asset('admin_asset/img/icons/icon-48x48.png') !!}" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    {{-- <link href="{!! asset('admin_asset/fontawesome-free-6.1.1-web/css/fontawesome.min.css') !!}" rel="stylesheet"> --}}
 
 
    <link href="{!! asset('admin_asset/bootstrap-5.1.3-dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin_asset/css/app.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin_asset/css/custom_css.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin_asset/toastr/toastr.min.css') !!}" rel="stylesheet">
    <link href="{{ asset('admin_asset/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/themes/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('showDashboard') }}">
                    <span class="align-middle">Admin Website</span>
                </a>
                <ul class="sidebar-nav">
                    <li class=" sidebar-item active">
                        <a class="sidebar-link " href="{{ route('showDashboard') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('showMaterial') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Nguyen Lieu</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('products.show') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">San Pham</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.order') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Đơn hàng</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('quanlysudungnglieu') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Quản lý nguyên liệu dùng</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('roles.show') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Phân quyền</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="product-admin">
            @yield('content')
        </div>
    </div>
    <script src="{!! asset('admin_asset/js/app.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/popper.min.js') !!}"></script>
    {{-- <script src="{!! asset('admin_asset/fontawesome-free-6.1.1-web/js/fontawesome.min.js') !!}"></script> --}}
    <script src="{!! asset('admin_asset/bootstrap-5.1.3-dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/jquery-3.6.0.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/jqueryValidation.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/custom_js.js') !!}"></script>
    <script src="{!! asset('admin_asset/toastr/toastr.min.js') !!}"></script>
    <link href="{!! asset('jsconfirm/jquery-confirm.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('jsconfirm/jquery-confirm.min.js') !!}"></script>

</body>

</html>
