<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .center {
            margin: auto;
            width: 90%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }
        .th_color {
            background: skyblue;
            color: black;
        }
        .th_deg {
            padding: 10px;
        }
        /* Added for better visibility on dark backgrounds */
        .table, .table th, .table td {
            color: #f8f9fa !important;
        }
    </style>
</head>
<body>
    @include('admin.header')
    
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        
        <div class="page-content">
            <h2 class="h2_font" style="color: white;">Activity Bookings</h2>
            
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            
            <div class="center">
                <table class="table table-bordered">
                    <tr class="th_color">
                        <th class="th_deg">Activity</th>
                        <th class="th_deg">Customer</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Date</th>
                        <th class="th_deg">Time</th>
                        <th class="th_deg">People</th>
                        <th class="th_deg">Status</th>
                        <th class="th_deg">Total Price</th>
                        <th class="th_deg">Actions</th>
                    </tr>
                    
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->activity->name }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->booking_date->format('Y-m-d') }}</td>
                        <td>{{ $booking->booking_time->format('H:i') }}</td>
                        <td>{{ $booking->number_of_people }}</td>
                        <td>
                            <span class="badge {{ $booking->status == 'confirmed' ? 'bg-success' : ($booking->status == 'cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>{{ $booking->total_price }}€</td>
                        <td>
                            @if($booking->status == 'pending')
                                <a href="{{ route('admin.activity_booking.confirm', $booking->id) }}" class="btn btn-success btn-sm">Confirm</a>
                                <a href="{{ route('admin.activity_booking.cancel', $booking->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                            @endif
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