
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li class="nav-main-heading">  <a href="{{ route('member.trainings.index') }}"><span class="sidebar-mini-hidden">My trainings</span></a></li>
    @can('accessAdminpanel')
        <li class="nav-main-heading"><span class="sidebar-mini-hidden">Admin</span></li>
        <li>
            <a href="{{ route('admin.dashboard') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}"><i class="si si-people"></i><span class="sidebar-mini-hide">Users</span></a>
        </li>
        <li>
            <a href="{{ route('admin.trainings.index') }}"><i class="si si-graduation"></i><span class="sidebar-mini-hide">Trainings</span></a>
        </li>
        <li>
            <a href="{{ route('admin.groups.index') }}"><i class="si si-grid"></i><span class="sidebar-mini-hide">Groups</span></a>
        </li>
        @endcan
    </ul>
</div>
