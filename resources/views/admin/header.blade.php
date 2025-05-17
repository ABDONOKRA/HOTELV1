 <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
                <a href="/" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase">
                        <strong class="text-primary">ARIH</strong><strong>Hotel</strong>
          </div>
                    <div class="brand-text brand-sm">
                        <strong class="text-primary">A</strong><strong>H</strong>
                  </div>
                </a>
                <button class="sidebar-toggle">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                        {{ ucfirst(Request::segment(1)) }}
                    </li>
                </ol>
            </nav>

            <div class="right-menu list-inline no-margin-bottom">    
                <!-- Search -->
                <div class="list-inline-item">
                    <div class="search-form">
                        <input type="text" placeholder="Search..." class="form-control search-input">
                        <i class="fa fa-search search-icon"></i>
              </div>
            </div>

                <!-- Notifications -->
                <div class="list-inline-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-danger">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notifications">
                        <div class="dropdown-header">
                            <strong>Notifications</strong>
                            <span class="badge badge-info">3 New</span>
                  </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-envelope mr-2"></i> New booking request
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                  </div>
                </div>

                <!-- Profile -->
                <div class="list-inline-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('admin/img/avatar-1.jpg') }}" alt="Admin" class="rounded-circle" width="32">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-user mr-2"></i> Profile
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fa fa-sign-out mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
          </div>
        </div>
      </nav>
    </header>

<style>
.header {
    background: #2d3035;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 999;
    width: 100%;
    padding: 0;
}

.navbar {
    padding: 0.5rem 1.5rem;
}

.navbar > .container-fluid {
    padding-right: 0;
    padding-left: 0;
}

.navbar-brand {
    padding: 0;
}

.sidebar-toggle {
    background: transparent;
    border: none;
    color: #fff;
    font-size: 1.2rem;
    padding: 0.5rem;
    cursor: pointer;
    transition: color 0.3s ease;
}

.sidebar-toggle:hover {
    color: #007bff;
}

.breadcrumb {
    margin: 0;
    background: transparent;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: #ffffff80;
}

.breadcrumb-item {
    color: #ffffff80;
}

.breadcrumb-item.active {
    color: #fff;
}

.search-form {
    position: relative;
}

.search-input {
    background: #34373d;
    border: 1px solid #444;
    color: #fff;
    padding-right: 2.5rem;
    transition: all 0.3s ease;
}

.search-input:focus {
    background: #3a3f44;
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.search-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #ffffff80;
}

.notifications {
    min-width: 280px;
    padding: 0;
}

.dropdown-header {
    background: #34373d;
    padding: 1rem;
    border-bottom: 1px solid #444;
}

.dropdown-item {
    color: #fff;
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #444;
}

.dropdown-item:hover {
    background: #3a3f44;
    color: #fff;
}

.dropdown-footer {
    text-align: center;
    font-weight: 500;
}

.badge {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
}

.nav-link {
    padding: 0.5rem;
    color: #ffffff80;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #fff;
}

.rounded-circle {
    border: 2px solid #ffffff30;
}
</style>