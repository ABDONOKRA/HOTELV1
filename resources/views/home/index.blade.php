<!DOCTYPE html>
<html lang="en">
   <head>

@include('home.css')

<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- JS Bootstrap (avec Popper inclus) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
   html {
      scroll-behavior: smooth;
   }
   
   .section-padding {
      padding-top: 90px;
      margin-top: -90px;
   }
</style>




     </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
       

@include('home.header')




      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->

      <section id="home">
         @include('home.slider')
      </section>




      <!-- end banner -->
      <!-- about -->
     
      <section id="about" class="section-padding">
         @include('home.about')
      </section>

      <!-- hotels section -->
      <section id="hotels" class="section-padding">
      @include('home.hotels_section')
   </section>

   <section id="our_room" class="section-padding">
      @include('home.room')
   </section>

      <!-- end our_room -->
      <!-- gallery -->

      <section id="gallery" class="section-padding">
         @include('home.galary')
      </section>




      <!-- end gallery -->
      <!-- blog -->
    
      <!-- end blog -->
      <!--  contact -->
     
      <section id="contact" class="section-padding">
         @include('home.contact')
      </section>



      <!-- end contact -->
      <!--  footer -->
     



     @include('home.footer')
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>