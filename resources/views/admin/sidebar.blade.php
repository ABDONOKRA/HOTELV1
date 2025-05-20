<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center p-4">
                  <div class="avatar">
                        <img src="{{ asset('admin/img/avatar-6.jpg') }}" alt="Admin" class="img-fluid rounded-circle">
                        <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="title ml-3">
                        <h1 class="h5 mb-1">Mohamed Ait Tijan</h1>
                        <p class="mb-0 text-sm text-muted">Administrator</p>
                  </div>
            </div>

            <!-- Sidebar Navigation Menu-->
            <div class="sidebar-menu">
                  <h6 class="sidebar-heading px-4 mt-4 mb-3 text-muted">
                        <span>Main Navigation</span>
                  </h6>

                  <ul class="list-unstyled">

                        <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                              <a href="{{route('home.index')}}" class="sidebar-link">
                                    <i class="fa fa-home"></i>
                                    <span>Home</span>
                              </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                              <a href="{{route('admin.index')}}" class="sidebar-link">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Dashboard</span>
                              </a>
                        </li>
                        <li class="sidebar-item">
                              <a href="#roomsSubmenu" data-toggle="collapse" aria-expanded="false" class="sidebar-link">
                                    <i class="fa fa-bed"></i>
                                    <span>Hotel Rooms</span>
                                    <i class="fa fa-chevron-down ml-auto"></i>
                              </a>
                              <ul class="collapse list-unstyled {{ Request::is('create_room', 'view_room') ? 'show' : '' }}" id="roomsSubmenu">
                                    <li>
                                          <a href="{{ url('create_room') }}" class="sidebar-link pl-5">
                                                <i class="fa fa-plus-circle"></i>
                                                <span>Add Room</span>
                                          </a>
                                    </li>
                                    <li>
                                          <a href="{{ url('view_room') }}" class="sidebar-link pl-5">
                                                <i class="fa fa-list"></i>
                                                <span>View Rooms</span>
                                          </a>
                                    </li>
                              </ul>
                        </li>

                        <li class="sidebar-item {{ Request::is('bookings') ? 'active' : '' }}">
                              <a href="{{ url('bookings') }}" class="sidebar-link">
                                    <i class="fa fa-calendar"></i>
                                    <span>Bookings</span>
                              </a>
                        </li>

                        <li class="sidebar-item {{ Request::is('view_gallary') ? 'active' : '' }}">
                              <a href="{{ url('view_gallary') }}" class="sidebar-link">
                                    <i class="fa fa-images"></i>
                                    <span>Gallery</span>
                              </a>
                        </li>

                        <li class="sidebar-item {{ Request::is('all_messages') ? 'active' : '' }}">
                              <a href="{{ url('all_messages') }}" class="sidebar-link">
                                    <i class="fa fa-envelope"></i>
                                    <span>Messages</span>
                                    <span class="badge badge-danger ml-auto">3</span>
                              </a>
                        </li>

                        <h6 class="sidebar-heading px-4 mt-4 mb-3 text-muted">
                              <span>Activities & Services</span>
                        </h6>

                        <li class="sidebar-item" >
                              <a href="#activitiesSubmenu" data-toggle="collapse" aria-expanded="false" class="sidebar-link">
                                    <i class="fa fa-hiking"></i>
                                    <span>Activities & Spa</span>
                                    <i class="fa fa-chevron-down ml-auto"></i>
                              </a>
                              <ul class="collapse list-unstyled {{ Request::is('create_activity', 'view_activities', 'activity_bookings', 'spa_bookings') ? 'show' : '' }}" id="activitiesSubmenu">
                                    <li>
                                          <a href="{{ url('create_activity') }}" class="sidebar-link pl-5">
                                                <i class="fa fa-plus-circle"></i>
                                                <span>Add Activity/Spa</span>
                                          </a>
                                    </li>
                                    <li>
                                          <a href="{{ url('view_activities') }}" class="sidebar-link pl-5">
                                                <i class="fa fa-list"></i>
                                                <span>View Activities</span>
                                          </a>
                                    </li>
                                    <li>
                                          <a href="{{ url('activity_bookings') }}" class="sidebar-link pl-5">
                                                <i class="fa fa-calendar-check"></i>
                                                <span>Activity Bookings</span>
                                          </a>
                                    </li>
                                    <li>
                                          <a href="{{ url('spa_bookings') }}" class="sidebar-link pl-5">
                                                <i class="fa fa-spa"></i>
                                                <span>Spa Bookings</span>
                                          </a>
                                    </li>
                              </ul>
                        </li>
                  </ul>
            </div>
      </nav>

      <style>
.d-flex.align-items-stretch {
    width: 100%;
    min-height: 100vh;
    position: relative;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #2d3035;
    color: #fff;
    transition: all 0.3s;
    box-shadow: 3px 0 10px rgba(0,0,0,0.1);
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    display: flex;
    flex-direction: column;
}

.sidebar-header {
    background: #34373d;
    border-bottom: 1px solid #444;
    flex-shrink: 0;
}

.sidebar-menu {
    flex-grow: 1;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #444 #2d3035;
}

/* Custom scrollbar styling for webkit browsers */
.sidebar-menu::-webkit-scrollbar {
    width: 6px;
}

.sidebar-menu::-webkit-scrollbar-track {
    background: #2d3035;
}

.sidebar-menu::-webkit-scrollbar-thumb {
    background-color: #444;
    border-radius: 3px;
}

.page-content {
    margin-left: 250px;
    width: calc(100% - 250px);
}

.sidebar-header .avatar {
    position: relative;
    width: 50px;
    height: 50px;
}

.sidebar-header .avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border: 2px solid #ffffff30;
}

.status-indicator {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #2d3035;
}

.sidebar-heading {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #8a8d93;
}

.sidebar-item {
    position: relative;
    margin: 0.25rem 1rem;
}

.sidebar-link {
    padding: 0.75rem 1rem;
    color: #ffffff80;
    display: flex;
    align-items: center;
    text-decoration: none;
    border-radius: 0.375rem;
    transition: all 0.3s ease;
}

.sidebar-link i {
    width: 1.25rem;
    margin-right: 0.75rem;
    font-size: 0.875rem;
}

.sidebar-link:hover,
.sidebar-item.active .sidebar-link {
    color: #fff;
    background: #34373d;
}

.sidebar-item .collapse {
    margin-top: 0.25rem;
}

.sidebar-item .collapse .sidebar-link {
    padding-left: 3rem;
    font-size: 0.875rem;
}

.sidebar-item .fa-chevron-down {
    transition: transform 0.3s ease;
}

.sidebar-item .collapse.show + .sidebar-link .fa-chevron-down {
    transform: rotate(180deg);
}

.badge {
    padding: 0.35em 0.65em;
    font-size: 0.75em;
    font-weight: 600;
    border-radius: 0.375rem;
}

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
}
</style>
