<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')




  </head>
  <body>
   
            @include('admin.header')


        @include('admin.sidebar')


   
      <!-- Sidebar Navigation end-->
    
  <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">


                <center>
                    <h1 style="font-size:40px;font-weight: border ;color: white">
                    Gallary
                    </h1>
                      <div class="row">
                        @foreach($gallary as $gallary)
                        <div class="col-md-4">

                        <img style="height: 200px!important ;width: 300px ! important;" src="/gallary/{{$gallary->image}}">
                      
                      <a class="btn btn-primary" href="{{url('delete_gallary',$gallary->id)}}">Delete Image</a>
                      
                      
                
                      
                      
                      
                      </div>

                      @endforeach
                      </div>

                    <form action="{{url('upload_gallary')}}" method="Post" enctype="multipart/form-data"> 

                    @csrf


                    <div style="padding:30px;">
                    <label style="color: white;font-size:bold;"> Upload Image </label>
                    <input type="file" name="image" requered>
                      
                    
                    <input  class="btn btn-success" type="submit" value="Add Image">
                     </div>
            
                    </form></center>










          </div>
           </div>
            </div>
    @include('admin.footer')

  </body>
</html>