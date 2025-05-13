<footer>
   <style>
      /* Styles généraux du footer */
       :root {
         --primary-blue: #2c3e50;
         --secondary-blue: #34495e;
         --accent-gold: #f39c12;
         --light-text: #ecf0f1;
         --dark-text: #2c3e50;
      }

      .footer {
         background: var(--primary-blue);
         color: var(--light-text);
         padding: 40px 0 0;
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      .footer h3 {
         color: var(--accent-gold);
         margin-bottom: 20px;
         font-size: 1.4em;
         border-bottom: 2px solid var(--accent-gold);
         padding-bottom: 8px;
         display: inline-block;
      }

      .footer ul li {
         margin-bottom: 12px;
         display: flex;
         align-items: center;
         transition: transform 0.3s;
      }

      .footer ul li:hover {
         transform: translateX(5px);
      }

      .footer ul li i {
         color: var(--accent-gold);
         margin-right: 12px;
         width: 20px;
      }

      .footer a {
         color: var(--light-text);
         text-decoration: none;
         transition: color 0.3s;
      }

      .footer a:hover {
         color: var(--accent-gold);
      }

      /* Menu actif */
      .link_menu li.active a {
         color: var(--accent-gold);
         font-weight: 600;
      }

      /* Newsletter */
      .bottom_form {
         display: flex;
         margin-bottom: 25px;
         box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      }

      .enter {
         flex: 1;
         padding: 12px;
         border: none;
         border-radius: 4px 0 0 4px;
         font-size: 0.9em;
      }

      .sub_btn {
         background: var(--accent-gold);
         color: var(--primary-blue);
         border: none;
         padding: 0 20px;
         font-weight: 600;
         cursor: pointer;
         transition: all 0.3s;
      }

      .sub_btn:hover {
         background: #e67e22;
      }

      /* Icônes sociales */
      .social_icon {
         display: flex;
         gap: 20px;
      }

      .social_icon a {
         color: var(--light-text);
         font-size: 1.3em;
         transition: all 0.3s;
      }

      .social_icon a:hover {
         color: var(--accent-gold);
         transform: translateY(-3px);
      }

      /* Copyright */
      .copyright {
         background: var(--secondary-blue);
         padding: 20px 0;
         margin-top: 40px;
      }

      .copyright p {
         margin: 0;
         text-align: center;
         color: var(--accent-gold);
         font-size: 0.9em;
      }
   </style>

   <div class="footer">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <h3>Contact US</h3>
               <ul class="conta">
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                  <li><i class="fa fa-mobile" aria-hidden="true"></i>0524313309</li>
                  <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">aihmarrakech@gmail.com</a></li>
               </ul>
            </div>
            <div class="col-md-4">
               <h3>Menu Link</h3>
               <ul class="link_menu">
                  <li class="{{ request()->is('/') ? 'active' : '' }}">
                     <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="{{ request()->is('our_rooms') ? 'active' : '' }}">
                     <a href="{{ url('our_rooms') }}">Our Rooms</a>
                  </li>
                  <li class="{{ request()->is('hotel_gallary') ? 'active' : '' }}">
                     <a href="{{ url('hotel_gallary') }}">Gallery</a>
                  </li>
                  <li class="{{ request()->is('contact_us') ? 'active' : '' }}">
                     <a href="{{ url('contact_us') }}">Contact Us</a>
                  </li>
               </ul>
            </div>
            <div class="col-md-4">
               <h3>News letter</h3>
               <form class="bottom_form">
                  <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                  <button class="sub_btn">subscribe</button>
               </form>
               <ul class="social_icon">
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
               </ul>
            </div>
         </div>
      </div>
      <div >
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">                       
                  <p>© Made with : Abdelghafour.</p>                                                                                          
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>