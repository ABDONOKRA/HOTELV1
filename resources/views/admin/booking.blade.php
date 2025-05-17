<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')

 <style type="text/css">
    .table_deg
    {
        border: 2px solid #2d3035;
        margin: auto;
        width: 90%;
        text-align: center;
        magrgin-top: 40px;
    }   
    .th_deg
    {
        background-color: skyblue;
        padding: 8px;
    }
    tr
    {
        border: 3px solid #2d3035;
    }
    td
     {
        padding: 10px;
    }
    </style>
  </head>
  <body>
            @include('admin.header')
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
  
     <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

 <table class="table_deg">
            <tr>
            <th class="th_deg" >Room_id</th> 
            <th class="th_deg" >Customer name</th> 
            <th class="th_deg" >Email</th> 
            <th class="th_deg" >Phone</th> 
            <th class="th_deg" >Arrival Date</th> 
            <th class="th_deg" >Leaving Date</th> 
            <th class="th_deg" >Status</th> 
            <th class="th_deg" >Room Title</th>
            <th class="th_deg" >Price</th>
            <th class="th_deg" >Image</th>
            <th class="th_deg" >Delete</th>
            <th class="th_deg" >Status Update</th>         
            </tr> 
           @foreach($data as $data)

            <tr>    
            <td>  {{$data-> room_id}} </td> 
            <td>  {{$data-> name}} </td> 
            <td>  {{$data-> email}} </td> 
            <td>  {{$data-> phone}} </td> 
            <td>  {{$data-> start_date}} </td> 
            <td>  {{$data-> end_date}} </td> 
            <td>  
            
            @if($data->status == 'approve')

            <span style="color: skyblue;">Approved</span>

            @endif

             @if($data->status == 'rejected')

            <span style="color: red;">Rejected</span>

            @endif
            
             @if($data->status == 'waiting')
            <span style="color: yellow;" >Waiting</span>
            @endif
            </td>
            <td>  {{ $data->room->room_title ?? 'N/A' }}</td>  
            <td>  {{ $data->room->price ?? 'N/A' }} </td>

            <td> 
             @if($data->room && $data->room->image)
            <img style="width: 200px !important" src="/room/{{ $data->room->image }}" alt="Room Image">
            @else
           <span>No image available</span>
            @endif
             </td> 
                <td>
                <a onclick="return confirm('Are You Sure To Delete This');" class="btn btn-danger" href="{{url('delete_booking',$data->id)}}">Delete</a>
                </td>
              <td>
              <span style="padding-bottom :10px;">
              <a class="btn btn-success"   href="{{url('approve_book',$data->id)}}">Approve</a>
              <a class="btn btn-warning"   href="{{url('reject_book',$data->id)}}">Rejected</a>            
              </td>
             </tr>
           @endforeach
          </table>
          </div>
          </div>
          </div>
          @include('admin.footer')
  </body>
</html>