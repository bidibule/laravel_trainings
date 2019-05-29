<!DOCTYPE html>
<html lang="en">

<title>@yield('title')</title>
<meta name="description" content="Login page example">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--begin::Fonts -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" media="all">
<script>
    WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
</script>
<!--end::Fonts -->



<!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('assets/css/demo2/pages/general/login/login-1.css') }}" rel="stylesheet" type="text/css">
<!--end::Page Custom Styles -->

<!--begin::Global Theme Styles(used by all pages) -->
<link href="{{ asset('assets/vendors/global/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/demo2/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles -->

<!--begin::Layout Skins(used by all pages) -->
<!--end::Layout Skins -->

<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico')}}" />
</head>
<!-- end::Head -->

<!-- begin::Body -->

<body
    class="kt-page--loading-enabled kt-page--fixed kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent">

    <!-- begin::Page loader -->

    <!-- end::Page Loader -->
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
            <div
                class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                <!--begin::Aside-->
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
                    style="background-image: url({{ asset('assets/media//bg/bg-4.jpg')}})">
                    <div class="kt-grid__item">
                        <a href="#" class="kt-login__logo">
                            <img src="{{ asset('assets/media/logos/logo-4.png')}}">
                        </a>
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                        <div class="kt-grid__item kt-grid__item--middle">
                            <h3 class="kt-login__title">Welcome to Trainee!</h3>
                            <h4 class="kt-login__subtitle">The ultimate Quality Compliance app</h4>
                        </div>
                    </div>
                    <div class="kt-grid__item">
                        <div class="kt-login__info">
                            <div class="kt-login__copyright">
                                © {{ date('Y') }} Ankaroo
                            </div>
                            <div class="kt-login__menu">
                                <a href="#" class="kt-link">Privacy</a>
                                <a href="#" class="kt-link">Legal</a>
                                <a href="#" class="kt-link">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Aside-->

                <!--begin::Content-->
                <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                @yield('content')
                </div>
                <!--end::Content-->
            </div>
        </div>



    </div>

    <!-- end:: Page -->


    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
    </script>
    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('assets/vendors/global/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/demo2/scripts.bundle.js')}}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
    <!-- end::Body -->
</body>

</html>