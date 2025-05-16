<!-- header inner -->
<div class="header">
   <div class="container">
      <div class="row">
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
               <div class="center-desk">
                  <div class="logo">
                     <a href="{{ route('home.index') }}"><img src="{{ asset('images/logo.png') }}" alt="#" /></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <nav class="navigation navbar navbar-expand-md navbar-dark">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExample04">
                  <ul class="navbar-nav me-auto mb-2 mb-md-0">
                     <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.index') }}">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link {{ request()->is('our_rooms') ? 'active' : '' }}" href="{{ url('our_rooms') }}">Our Rooms</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link {{ request()->is('hotels_services') ? 'active' : '' }}" href="{{ url('hotels_services') }}">Services & Activities</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link {{ request()->is('hotel_gallary') ? 'active' : '' }}" href="{{ url('hotel_gallary') }}">Gallery</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact_us') ? 'active' : '' }}" href="{{ url('contact_us') }}">Contact Us</a>
                     </li>
                     @auth
                        @if(Auth::user()->usertype=='admin')
                           <li class="nav-item">
                              <a class="nav-link" href="#">Dashboard</a>
                           </li>
                        @else
                           <li class="nav-item">
                              <a class="nav-link {{ request()->is('my-reservations') ? 'active' : '' }}" href="{{ route('my.reservations') }}">
                                 <i class="far fa-calendar-alt"></i> Mes Réservations
                              </a>
                           </li>
                        @endif
                     @endauth
                  </ul>

                  <ul class="navbar-nav">
                     @if (Route::has('login'))
                        @auth
                           <x-app-layout>
                           </x-app-layout>
                        @else
                           <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">Login</a>
                           </li>
                           @if (Route::has('register'))
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">Register</a>
                              </li>
                           @endif
                        @endauth
                     @endif
                  </ul>
               </div>
            </nav>
         </div>
      </div>
   </div>
</div>