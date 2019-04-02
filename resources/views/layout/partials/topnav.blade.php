<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Ankaroo</a>
  
  Welcome back, {{ auth()->user()->email }}
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <form id="logout" method="POST" action="{{ route('logout') }}" >
        @csrf
        <a class="nav-link" href="#" onClick="document.getElementById('logout').submit();">Sign out</a>
      </form>
    </li>
  </ul>
</nav>