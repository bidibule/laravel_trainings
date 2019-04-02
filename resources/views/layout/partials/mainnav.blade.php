 <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route('users.index') }}">
              <span data-feather="file"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{  route('groups.index') }}">
                <span data-feather="file"></span>
                Groups
              </a>
            </li>
        </ul>

      
      </div>
    </nav>