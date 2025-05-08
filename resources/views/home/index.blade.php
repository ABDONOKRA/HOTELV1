<!DOCTYPE html>
<html lang="en">
   <head>

@include('home.css')

<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- JS Bootstrap (avec Popper inclus) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>




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



     @include('home.slider')




      <!-- end banner -->
      <!-- about -->
     
   @include('home.about')


      <!-- end about -->
      <!-- our_room -->
      
   @include('home.room')




      <!-- end our_room -->
      <!-- gallery -->
     

@include('home.galary')




      <!-- end gallery -->
      <!-- blog -->
    
      <!-- end blog -->
      <!--  contact -->
     
   @include('home.contact')



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