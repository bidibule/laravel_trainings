<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
                google: {
"families":[
"Poppins:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;                }            });
    </script>
    <!--end::Fonts -->
    
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('assets/vendors/global/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/demo2/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <!--end::Layout Skins -->
    
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico')}}" />

    <!-- Custom CSS -->
    <link href="{{ asset('custom/css/custom.css')}}" rel="stylesheet" type="text/css" />

    @yield('header_css')
    
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="kt-page--loading-enabled kt-page--loading kt-page--fluid kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent  kt-page--loading">
    @include('layouts.partials.metronic.layout-page-loader')
    @include('layouts.partials.metronic.header-base-mobile')
    <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">
                        
                    @include('layouts.partials.metronic.header-base')
                    
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                        <div class="kt-container kt-body kt-grid kt-grid--ver" id="kt_body">
                                
                            @include('layouts.partials.metronic.content-base')

                        </div>
                    </div>
                    @include('layouts.partials.metronic.footer-base')
                </div>
            </div>
        </div>
    <!-- end:: Page -->
    @include('layouts.partials.metronic.layout-quick-panel')
    @include('layouts.partials.metronic.layout-scrolltop')


    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
      var KTAppOptions = {
"colors":{
"state":{
"brand":"#374afb",
"light":"#ffffff",
"dark":"#282a3c",
"primary":"#5867dd",
"success":"#34bfa3",
"info":"#36a3f7",
"warning":"#ffb822",
"danger":"#fd3995"},
"base":{
"label":[
"#c5cbe3",
"#a1a8c3",
"#3d4465",
"#3e4466"],
"shape":[
"#f0f3ff",
"#d9dffa",
"#afb4d4",
"#646c9a"]}}};    
</script>   
    <!-- end::Global Config -->
    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('assets/vendors/global/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/demo2/scripts.bundle.js')}}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
    
    <!--begin::Global App Bundle(used by all pages) -->
    <script src="{{ asset('assets/app/bundle/app.bundle.js')}}" type="text/javascript"></script>
    <!--end::Global App Bundle -->
    @yield('footer_scripts')
</body>
<!-- end::Body -->

</html>