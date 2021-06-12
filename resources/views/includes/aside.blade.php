<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Gestion de demande</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name  }} </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
       <div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item">
        <div class="search-title">
          <b class="text-light"></b>N<b class="text-light"></b>o<b class="text-light"></b> <b class="text-light"></b>e<b class="text-light"></b>l<b class="text-light"></b>e<b class="text-light"></b>m<b class="text-light"></b>e<b class="text-light"></b>n<b class="text-light"></b>t<b class="text-light"></b> <b class="text-light"></b>f<b class="text-light"></b>o<b class="text-light"></b>u<b class="text-light"></b>n<b class="text-light"></b>d<b class="text-light"></b>!<b class="text-light"></b>
        </div>
        <div class="search-path">
          
        </div>
      </a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      @if(Auth::user()->isAdmin())
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link @if(Request::is('home')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Acceuil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('directeur/materiels') }}" class="nav-link @if(Request::is('directeur/materiels*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Gérer les fournitures') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('directeur/chefs') }}" class="nav-link @if(Request::is('directeur/chefs*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Gérer les chefs') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('directeur/techniciens') }}" class="nav-link @if(Request::is('directeur/techniciens*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Gérer les techniciens') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('directeur/incidents') }}" class="nav-link @if(Request::is('directeur/incidents*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Gérer les incidents') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('directeur/demandes') }}" class="nav-link @if(Request::is('directeur/demandes*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Traiter les demandes') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
        @endif

        @if(Auth::user()->isChef())
          <li class="nav-item">
            <a href="{{ url('chef/demandes') }}" class="nav-link @if(Request::is('chef/demandes*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les demandes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('chef/incidents') }}" class="nav-link @if(Request::is('chef/incidents*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les incidents
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('chef/materiels') }}" class="nav-link @if(Request::is('chef/materiels*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les fournitures
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
        @endif
        @if(Auth::user()->isResponsable())
          <li class="nav-item">
            <a href="{{ url('responsable/demandes') }}" class="nav-link @if(Request::is('responsable/demandes*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Traiter les demandes') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
        @endif
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>