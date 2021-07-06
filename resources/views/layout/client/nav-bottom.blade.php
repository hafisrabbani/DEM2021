<nav class="navbar navbar-dark bg-info navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none">
    <ul class="navbar-nav nav-justified w-100">
      <li class="nav-item">
        <a href="/" class="nav-link notif fa fa-home">
        </a>
      </li>
      <li class="nav-item">
        <a href="/bid" class="nav-link notif fa fa-gavel">
        </a>
      </li>
      <li class="nav-item">
        <a href="/donate" class="nav-link notif fa fa-hand-holding-usd">
        </a>
      </li>
      <li class="nav-item">
        <a href="/bill" class="nav-link notif fa fa-bell">
          @if ($notif!==0)
            <span class="fa fa-comment"></span>
            <span class="num">{{ $notif }}</span>
          @endif
        </a>
      </li>
      <li class="nav-item">
        <a href="/logout" class="nav-link notif fa fa-user">
        </a>
      </li>
    </ul>
  </nav>