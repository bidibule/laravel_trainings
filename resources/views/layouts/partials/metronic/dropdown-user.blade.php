<!--begin: Head -->
<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('assets/media/misc/bg-1.jpg')}}">
    <div class="kt-user-card__avatar">
        <img class="kt-hidden" alt="Pic" src="{{ asset('assets/media/users/300_25.jpg')}}" />
        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ ucfirst(substr(auth()->user()->name,0,1)) }}</span> 
    </div>
    <div class="kt-user-card__name"> {{ auth()->user()->name }} </div>
    <!--<div class="kt-user-card__badge"> <span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span> </div>-->
</div>
<!--end: Head -->
<!--begin: Navigation -->
<div class="kt-notification">
    <a href="{{ route('member.profile') }}" class="kt-notification__item">
        <div class="kt-notification__item-icon"> <i class="flaticon2-calendar-3 kt-font-success"></i> </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">My Profile</div>
            <div class="kt-notification__item-time"> Account settings and more </div>
        </div>
    </a>
    <div class="kt-notification__custom">
        <form id="logout" method="POST" action="{{ route('logout') }}" >
        @csrf
        <a href="#" onclick="document.getElementById('logout').submit();" class="btn btn-label-brand btn-sm btn-bold">Sign Out</a>
        </form>
    </div>
</div>
<!--end: Navigation -->