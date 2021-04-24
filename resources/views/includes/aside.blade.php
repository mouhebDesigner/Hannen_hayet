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
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nom  }} {{ Auth::user()->prenom }} </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item">
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
            <a href="{{ url('/categories') }}" class="nav-link @if(Request::is('categories*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Gérer les catégories') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/materiels') }}" class="nav-link @if(Request::is('materiels*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Gérer les fournitures') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
        @endif

          @if(Auth::user()->isChef())
            <li class="nav-item">
              <a href="{{ url('/demandes') }}" class="nav-link @if(Request::is('demandes*')) active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  {{ __('Gérer les demandes') }}
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