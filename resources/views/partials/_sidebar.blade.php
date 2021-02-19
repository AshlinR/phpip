<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<body class="hold-transition sidebar-mini layout-fixed">

<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-default sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="brand-text font-important">{{ config('app.name', 'phpIP') }}</span>
    </a>

  @auth
  @csrf

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar bg-light" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    @guest
    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
    @else
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <!-- Dashboard -->
        <li class="nav-item">
         <a class="nav-link" href= {{ route('home') }}>
           <i class="nav-icon fas fa-tachometer-alt"></i>
           <p>
             Dashboard
           </p>
         </a>
        </li>

        <!-- My Account -->
        <li class="nav-item menu">
         <a href="#" class="nav-link ">
           <i class="nav-icon fas fa-user"></i>
           <p>
             My Account
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i class="fas fa-door-open nav-icon"></i>
               <p>{{ __('Logout') }} {{ Auth::user()->login }}</p>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
               </form>
             </a>
           </li>
         </ul>

        <!-- Matters -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              Matters
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/matter') }}" class="nav-link">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>All</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/matter?display_with=PAT') }}" class="nav-link">
                <i class="fas fa-parking nav-icon"></i>
                <p>Patents</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/matter?display_with=TM') }}" class="nav-link">
                <i class="fas fa-registered nav-icon"></i>
                <p>Trademarks</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/matter?display_with=DES') }}" class="nav-link">
                <i class="fas fa-dice-d6 nav-icon"></i>
                <p>Designs</p>
              </a>
            </li>
            @canany(['admin', 'readwrite'])
            <li class="nav-item">
              <a href="/matter/create?operation=new" class="nav-link">
                <i class="far fa-plus-square nav-icon"></i>
                <p>Add New Matter</p>
              </a>
            </li>
          </ul>
            @endcanany

        @cannot('client')
        @canany(['admin', 'readwrite'])

        <!-- Tasks -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
              Tasks
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/task/list') }}" class="nav-link">
                <i class="fas fa-clock nav-icon"></i>
                <p>Open Tasks</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/fee') }}" class="nav-link">
                <i class="fas fa-archive nav-icon"></i>
                <p>All Tasks</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/rule') }}" class="nav-link">
                <i class="fas fa-ruler nav-icon"></i>
                <p>Task Rules</p>
              </a>
            </li>
          </ul>

        <!-- Actors -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Actors & Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/actor') }}" class="nav-link">
                <i class="fas fa-theater-masks nav-icon"></i>
                <p>Actors</p>
              </a>
            </li>
            @can('admin')
            <li class="nav-item">
              <a href="{{ url('/user') }}" class="nav-link">
                <i class="fas fa-user-tie nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/role') }}" class="nav-link">
                <i class="fas fa-users-cog nav-icon"></i>
                <p>Actor Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/default_actor') }}" class="nav-link">
                <i class="fas fa-user-graduate nav-icon"></i>
                <p>Default Actors</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/actor/create?operation=new" class="nav-link">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Add New Actor</p>
              </a>
            </li>
            @endcan
          </ul>

        <!-- Renewals -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-hand-holding-water"></i>
            <p>
              Renewals
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/renewal') }}" class="nav-link">
                <i class="fas fa-hand-holding-medical nav-icon"></i>
                <p>Manage Renewals</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/fee') }}" class="nav-link">
                <i class="fas fa-hand-holding-usd nav-icon"></i>
                <p>Renewal Fees</p>
              </a>
            </li>
          </ul>

        <!-- Documents -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Documents
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/documents') }}" class="nav-link">
                <i class="fas fa-book-open nav-icon"></i>
                <p>Documents</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/documents/create?operation=new" class="nav-link">
                <i class="fas fa-book-medical nav-icon"></i>
                <p>New Document</p>
              </a>
            </li>
          </ul>

        <!-- Financial -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-coins"></i>
            <p>
              Financial
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/renewal') }}" class="nav-link">
                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                <p>Invoices</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/fee') }}" class="nav-link">
                <i class="fas fa-file-invoice nav-icon"></i>
                <p>Bills</p>
              </a>
            </li>
          </ul>

        <!-- Jurisdictions -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-globe"></i>
            <p>
              Jurisdictions
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/renewal') }}" class="nav-link">
                <i class="fas fa-flag nav-icon"></i>
                <p>Table</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/fee') }}" class="nav-link">
                <i class="fas fa-file-invoice nav-icon"></i>
                <p>Bills</p>
              </a>
            </li>
          </ul>

        <!-- Templates -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Templates
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('admin')

            <li class="nav-item">
              <a href="{{ url('/document') }}" class="nav-link">
                <i class="fas fa-envelope nav-icon"></i>
                <p>Email Template Classes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/template-member') }}" class="nav-link">
                <i class="fas fa-envelope-open-text nav-icon"></i>
                <p>Email Templates</p>
              </a>
            </li>
          </ul>

        @endcanany
        @canany(['admin', 'readwrite'])
        @can('admin')

        <!-- Admin -->
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Admin
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/eventname') }}" class="nav-link">
                <i class="fas fa-calendar-day nav-icon"></i>
                <p>Event Names</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/category') }}" class="nav-link">
                <i class="fas fa-cat nav-icon"></i>
                <p>Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/type') }}" class="nav-link">
                <i class="far fa-folder-open nav-icon"></i>
                <p>Matter Types</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/classifier_type') }}" class="nav-link">
                <i class="fas fa-tags nav-icon"></i>
                <p>Classifier Types</p>
              </a>
            </li>
          </ul>
        @endcan
        @endcan
        @endcanany
        @endcannot
    @endguest
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  @endauth
</aside>
<!-- /.Main Sidebar Container -->
