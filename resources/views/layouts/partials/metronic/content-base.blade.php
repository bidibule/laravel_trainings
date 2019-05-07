<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    @includeIf('layouts.subheaders.subheader-'.str_replace(".","-",Route::currentRouteName()))
    <!-- begin:: Content -->
    <div class="kt-content kt-grid__item kt-grid__item--fluid">
        @yield('content')
    </div>
    <!-- end:: Content -->
</div>