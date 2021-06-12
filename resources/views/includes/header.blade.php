<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown show">
        
        
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
            {{ Auth::user()->unreadNotifications->count() }}
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          
          
          
          @foreach (Auth::user()->unreadNotifications as $notification) 
          @if(Auth::user()->isAdmin())
            <a href="{{ url('directeur/demandes') }}" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 
              {{  App\Models\Demande::find($notification->data['id'])->materiel->nom }}

              <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
            </a>
            @else 
            <a href="{{ url('chef/demandes') }}" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 
              {{  App\Models\Demande::find($notification->data['id'])->materiel->nom }} accepté

              <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
            </a>

            @endif
          @endforeach
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Déconnecté') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
      
    </ul>
  </nav>