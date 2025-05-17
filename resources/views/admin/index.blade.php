<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    <!-- Header -->
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar -->
      @include('admin.sidebar')
      
      <!-- Page Content -->
      <div class="page">
        @include('admin.body')
        @include('admin.footer')
      </div>
    </div>
  </body>
</html>