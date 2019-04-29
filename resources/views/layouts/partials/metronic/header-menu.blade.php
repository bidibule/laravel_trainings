<!-- begin: Header Menu -->
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile " >
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="{{ route('admin.dashboard') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Dashboard</span></a>
               
            </li>
            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="{{ route('member.trainings.index') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">My trainings</span></a>
            </li>
        </ul>
    </div>
   
</div>
<!-- end: Header Menu -->