<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<<<<<<< HEAD
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>Admin</title>
=======


    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
>>>>>>> 2a8540a8c58e0b0f43ac8a2ea60393f0b04431e3
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@300;400;500;600;700&family=Mukta:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<<<<<<< HEAD
=======

>>>>>>> 2a8540a8c58e0b0f43ac8a2ea60393f0b04431e3
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{!! asset('admin_asset/img/icons/icon-48x48.png') !!}" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


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
<<<<<<< HEAD
=======

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('products.show')}}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">San Pham</span>
                        </a>
                    </li>
>>>>>>> 2a8540a8c58e0b0f43ac8a2ea60393f0b04431e3

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('products.show') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">San Pham</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.admin.coupon') }}">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                            <span class="align-middle">Khuyến Mãi</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.shipping') }}">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <span class="align-middle">Vận Chuyển</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Đơn hàng
                    </li>
                    <li class="sidebar-item list_order">

                        <a class="sidebar-link" href="{{ route('get.order','all') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="align-middle">Tất cả <span class="count-order all">{{$all ?? 0}}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-item list_order">

                        <a class="sidebar-link" href="{{ route('get.order', 'receive') }}">
                            <i class="fa fa-spinner" aria-hidden="true"></i>
                            <span class="align-middle">Tiếp nhận <span
                                    class="count-order receive">{{$receive ?? 0}}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.order', 'process') }}">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            <span class="align-middle">Đang xử lí <span
                                    class="count-order process">{{$process ?? 0}}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.order', 'success') }}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <span class="align-middle">Hoàn thành<span
                                    class="count-order success">{{$success ?? 0}}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.order', 'cancel') }}">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                            <span class="align-middle">Đã huỷ <span
                                    class="count-order cancel">{{$cancel ?? 0}}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Tin liên hệ
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.contact') }}">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span class="align-middle">Liên hệ</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Trang tĩnh
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.slide') }}">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                            <span class="align-middle">Slide</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.static') }}">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            <span class="align-middle">Website</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.banner') }}">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            <span class="align-middle">Banner</span>
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
        <div class="main">
            @include('templates.admins.nav-horizontal')
            <div class="product-admin main">
                @yield('content')
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======


>>>>>>> 2a8540a8c58e0b0f43ac8a2ea60393f0b04431e3
    <script src="{!! asset('admin_asset/js/app.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/popper.min.js') !!}"></script>
    {{-- <script src="{!! asset('admin_asset/fontawesome-free-6.1.1-web/js/fontawesome.min.js') !!}"></script> --}}
    <script src="{!! asset('admin_asset/bootstrap-5.1.3-dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/jquery-3.6.0.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/jqueryValidation.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/custom_js.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{!! asset('admin_asset/toastr/toastr.min.js') !!}"></script>
<<<<<<< HEAD
    <link href="{!! asset('jsconfirm/jquery-confirm.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('jsconfirm/jquery-confirm.min.js') !!}"></script>
=======



    <link href="{!! asset('jsconfirm/jquery-confirm.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('jsconfirm/jquery-confirm.min.js') !!}"></script>
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script> --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Chrome", "Firefox", "IE"],
                    datasets: [{
                        data: [4306, 3801, 1689],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });
    </script> --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script> --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var markers = [{
                    coords: [31.230391, 121.473701],
                    name: "Shanghai"
                },
                {
                    coords: [28.704060, 77.102493],
                    name: "Delhi"
                },
                {
                    coords: [6.524379, 3.379206],
                    name: "Lagos"
                },
                {
                    coords: [35.689487, 139.691711],
                    name: "Tokyo"
                },
                {
                    coords: [23.129110, 113.264381],
                    name: "Guangzhou"
                },
                {
                    coords: [40.7127837, -74.0059413],
                    name: "New York"
                },
                {
                    coords: [34.052235, -118.243683],
                    name: "Los Angeles"
                },
                {
                    coords: [41.878113, -87.629799],
                    name: "Chicago"
                },
                {
                    coords: [51.507351, -0.127758],
                    name: "London"
                },
                {
                    coords: [40.416775, -3.703790],
                    name: "Madrid "
                }
            ];
            var map = new jsVectorMap({
                map: "world",
                selector: "#world_map",
                zoomButtons: true,
                markers: markers,
                markerStyle: {
                    initial: {
                        r: 9,
                        strokeWidth: 7,
                        stokeOpacity: .4,
                        fill: window.theme.primary
                    },
                    hover: {
                        fill: window.theme.primary,
                        stroke: window.theme.primary
                    }
                },
                zoomOnScroll: false
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });
    </script> --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script> --}}




    <div class="modal_t">
        <div class="modal_overlay"></div>
        <div class="modal_body">
            <div class="modal_close">
                <i class="fa fa-times"></i>
            </div>
            <header class="modal_header">
                Chọn danh mục
            </header>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" /></th>
                        <th>STT</th>
                        <th>Tên</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td style="font-size: 16px; text-transform: uppercase; font-weight: 600;">
                            <img class="img-type"
                                src="http://localhost/website_ban_nuoc/public/uploads/type/tra-trai-cay62.png">
                            Cà Phê
                        </td>
                    </tr>
                </tbody>
            </table>
            <footer class="modal_footer">
                <a href="" id="listPromotion" class="btn primary">Lưu</a>
            </footer>
        </div>
    </div>
    <script>
    const close = document.querySelector('.modal_close');
    const modal = document.querySelector('.modal_t');
    const modalBody = document.querySelector('.modal_t .modal_body');

>>>>>>> 2a8540a8c58e0b0f43ac8a2ea60393f0b04431e3

    close.addEventListener("click", () => {
        modal.classList.remove('showModal_t')
    })

    modal.addEventListener("click", () => {
        modal.classList.remove('showModal_t')
    })
    modalBody.addEventListener("click", (e) => {
        e.stopPropagation();
    })
    </script>
</body>

</html>