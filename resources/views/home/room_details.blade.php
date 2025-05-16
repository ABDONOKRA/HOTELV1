<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style type="text/css">
        .room-details-container {
            background-color: #f8f9fa;
            padding: 120px 0 40px 0;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }
        .room-image {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .room-image:hover {
            transform: scale(1.02);
        }
        .room-info {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .room-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 2.5rem;
        }
        .room-description {
            color: #34495e;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 25px;
        }
        .room-feature {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            transition: transform 0.2s ease;
        }
        .room-feature:hover {
            transform: translateX(5px);
            background: #e9ecef;
        }
        .room-feature i {
            margin-right: 10px;
            color: #3498db;
        }
        .booking-form {
            background: white;
            border-radius: 15px;
            padding: 30px !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .booking-form h2 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 600;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #3498db;
            box-shadow: none;
        }
        .form-label {
            color: #2c3e50;
            font-weight: 500;
        }
        .btn-book {
            background: #3498db;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-book:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        .reserved-dates {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .reserved-dates h3 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 25px;
        }
        .table {
            margin-bottom: 0;
        }
        .table th {
            background: #f8f9fa;
            color: #2c3e50;
            font-weight: 600;
            border: none;
        }
        .table td {
            vertical-align: middle;
            color: #34495e;
            border-color: #f1f1f1;
        }
        .badge {
            padding: 8px 12px;
            font-weight: 500;
        }
        .alert {
            border-radius: 10px;
            padding: 15px 20px;
        }
        header {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        .loader_bg {
            z-index: 1001;
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

    <div class="room-details-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="room-image-container">
                        <img style="height:400px;width:100%; object-fit:cover" src="/room/{{$room->image}}" alt="#" class="room-image"/>
                    </div>
                    <div class="room-info">
                        <h1 class="room-title">{{$room->room_title}}</h1>
                        <p class="room-description">{{$room->description}}</p>
                        
                        <div class="room-features">
                            <div class="room-feature">
                                <i class="fas fa-wifi"></i>
                                <span>Free Wifi: {{$room->wifi}}</span>
                            </div>
                            <div class="room-feature">
                                <i class="fas fa-bed"></i>
                                <span>Room Type: {{$room->room_type}}</span>
                            </div>
                            <div class="room-feature">
                                <i class="fas fa-tag"></i>
                                <span>Price: ${{$room->price}} per night</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="booking-form">
                        <h2 class="text-center">Book Your Stay</h2>
                        
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                {{session()->get('message')}}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                {{session()->get('error')}}
                            </div>
                        @endif
                        
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        
                        <form action="{{url('/add_booking',$room->id)}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required 
                                    @if(Auth::id())
                                        value="{{Auth::user()->name}}"
                                    @endif>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required
                                    @if(Auth::id())
                                        value="{{Auth::user()->email}}"
                                    @endif>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Phone</label>
                                @php
                                    if(Auth::check()) {
                                        $user = Auth::user();
                                        $phone = $user->phone;
                                        echo "<!-- Debug: User phone = " . ($phone ?? 'null') . " -->";
                                    }
                                @endphp
                                <input type="tel" class="form-control" name="phone" required pattern="[0-9+\-\s]+"
                                    @if(Auth::check() && Auth::user()->phone)
                                        value="{{ Auth::user()->phone }}"
                                    @endif
                                    placeholder="Enter your phone number">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Check-in Date</label>
                                <input type="date" class="form-control" name="startDate" id="startDate" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Check-out Date</label>
                                <input type="date" class="form-control" name="endDate" id="endDate" required>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-book">
                                    Request Booking
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="reserved-dates p-4">
                        <h3 class="text-center">Reserved Dates</h3>
                        @php
                            $allBookings = $room->bookings()
                                ->whereIn('status', ['confirmed', 'waiting'])
                                ->orderBy('start_date')
                                ->get();
                        @endphp
                        
                        @if($allBookings->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Check-in Date</th>
                                            <th class="text-center">Check-out Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allBookings as $booking)
                                            <tr>
                                                <td class="text-center">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</td>
                                                <td class="text-center">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</td>
                                                <td class="text-center">
                                                    @if($booking->status == 'confirmed')
                                                        <span class="badge bg-danger">Reserved</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($booking->start_date)->diffInDays(\Carbon\Carbon::parse($booking->end_date)) }} nights
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-muted mt-3 mb-0 text-center">
                                Please select dates that don't overlap with existing reservations.
                            </p>
                        @else
                            <div class="alert alert-success text-center mb-0">
                                <i class="fas fa-calendar-check me-2"></i>
                                No reservations found for this room. All dates are currently available!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer -->        
    @include('home.footer')
    <!-- end footer -->
    
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Get today's date
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            var minDate = yyyy + '-' + mm + '-' + dd;

            // Set minimum date for both inputs
            document.getElementById('startDate').setAttribute('min', minDate);
            document.getElementById('endDate').setAttribute('min', minDate);

            // Update end date minimum when start date is selected
            document.getElementById('startDate').addEventListener('change', function() {
                document.getElementById('endDate').setAttribute('min', this.value);
                if (document.getElementById('endDate').value < this.value) {
                    document.getElementById('endDate').value = this.value;
                }
            });
        });
    </script>  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>   
</body>
</html>