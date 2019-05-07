<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">@yield('title')</h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        @hasSection('subtitle')
        <span class="kt-subheader__desc">@yield('subtitle')</span>
        @endif
    </div>
</div>