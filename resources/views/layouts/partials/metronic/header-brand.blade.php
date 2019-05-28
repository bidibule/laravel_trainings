<!-- begin:: Brand -->
<div class="kt-header__brand kt-grid__item" id="kt_header_brand">
    <div class="kt-header__brand-logo">
        <a href="?page=index">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-2.png')}}" class="kt-header__brand-logo-default')}}"/>
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-2-sm.png')}}" class="kt-header__brand-logo-sticky')}}"/>
        </a>
    </div>
    @can('accessAdminpanel')
    <div class="kt-header__brand-nav">
        <div class="dropdown">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Admin panel</button>
            <div class="dropdown-menu dropdown-menu-md">
                <ul class="kt-nav kt-nav--bold kt-nav--md-space">
                    <li class="kt-nav__item">
                        <a class="kt-nav__link active" href="{{ route('admin.dashboard') }}">
                            <span class="kt-nav__link-icon"><i class="la la-bar-chart"></i></span>
                            <span class="kt-nav__link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="kt-nav__separator"></li>
                    <li class="kt-nav__item">
                        <a class="kt-nav__link active" href="{{ route('admin.trainings.index') }}">
                            <span class="kt-nav__link-icon"><i class="la la-certificate"></i></span>
                           <span class="kt-nav__link-text">Trainings</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a class="kt-nav__link" href="{{ route('admin.users.index') }}">
                            <span class="kt-nav__link-icon"><i class="la la-users"></i></span>
                           <span class="kt-nav__link-text">Users</span>
                        </a>
                    </li>
                    <li class="kt-nav__separator"></li>
                    <li class="kt-nav__item">
                        <a class="kt-nav__link" href="{{ route('admin.groups.index') }}">
                            <span class="kt-nav__link-icon"><i class="la la-sitemap"></i></span>
                            <span class="kt-nav__link-text">Groups</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a class="kt-nav__link" href="{{ route('admin.categories.index') }}">
                            <span class="kt-nav__link-icon"><i class="la la-tags"></i></span>
                            <span class="kt-nav__link-text">Categories</span>
                        </a>
                    </li>
                    <li class="kt-nav__separator"></li>
                    <li class="kt-nav__item">
                            <a class="kt-nav__link" href="{{ route('admin.trainings.index') }}">
                                <span class="kt-nav__link-icon"><i class="la la-book"></i></span>
                                <span class="kt-nav__link-text">Visitor log</span>
                            </a>
                        </li>
                   
                </ul>
            </div>
        </div>
    </div>
    @endcan
</div>
<!-- end:: Brand -->