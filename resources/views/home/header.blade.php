  <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="{{url('/')}}"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                          <ul class="navbar-nav mr-auto">
                                  <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                 </li>
                                 <li class="nav-item {{ request()->is('our_rooms') ? 'active' : '' }}">
                                     <a class="nav-link" href="{{ url('our_rooms') }}">Our Rooms</a>
                                 </li>
                                 <li class="nav-item {{ request()->is('hotel_gallary') ? 'active' : '' }}">
                                     <a class="nav-link" href="{{ url('hotel_gallary') }}">Gallery</a>
                                 </li>                               
                                 <li class="nav-item {{ request()->is('contact_us') ? 'active' : '' }}">
                                     <a class="nav-link" href="{{ url('contact_us') }}">Contact Us</a>
                                 </li>
                                           @if(Auth::check() && Auth::user()->usertype=='admin')
                                         
                                             <li class="nav-item">
                                             <a class="nav-link home-link" href="{{url('/home')}}">Dashboard</a>
                                             </li>
                                          @endif
                                 
                                  @if (Route::has('login'))
                
                                  @auth
                                       <x-app-layout>

                                       </x-app-layout>    
                                 @else
                                          <li class="nav-item" style="padding-right:10px">
                                             <a class="btn btn-outline-success" href="{{'login'}}">login</a>
                                                </li>
                                 @if (Route::has('register'))
                                           <li class="nav-item">
                                             <a class="btn btn-outline-primary" href="{{'register'}}">Register </a>
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