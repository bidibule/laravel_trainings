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
            <a class="nav-link" href="{{  route('admin.users.index') }}">
              <span data-feather="file"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route('admin.groups.index') }}">
              <span data-feather="file"></span>
              Groups
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route('admin.trainings.index') }}">
              <span data-feather="file"></span>
              Trainings
            </a>
          </li>
        </ul>

      
      </div>
    </nav>