<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Drinks Order</title>

    <!-- Custom CSS -->
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/assets/alert/alertify.min.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/themes/default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/themes/semantic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/themes/bootstrap.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />







</head>

<body class="grocery-theme">

    <body>
        @include('templates.clients.layouts.header')
        @yield('content')

        <!--========= JS Here =========-->
        <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/smoothproducts.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery-rating.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jQuery.style.switcher.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
        <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
        <script src="{{ asset('frontend/assets/js/firebase.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/js.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- js confirm -->
        <link href="{!! asset('jsconfirm/jquery-confirm.min.css') !!}" rel="stylesheet">
        <script src="{!! asset('jsconfirm/jquery-confirm.min.js') !!}"></script>

        @include('templates.clients.layouts.footer')

        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <script src="https://sp.zalo.me/plugins/sdk.js"></script>
        <div class="zalo-chat-widget" data-oaid="22237114426800699" data-welcome-message="Rất vui khi được hỗ trợ bạn!"
            style="z-index: 9999" data-autopopup="0" data-width="" data-height=""></div>
        <script>
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }
        </script>
        @include('templates.clients.js.js')
        @include('templates.clients.js.notification')
    </body>

</html>