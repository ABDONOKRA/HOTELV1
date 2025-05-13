<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style type="text/css">
        label {
            display: inline-block;
            width: 410px;
        }
        input {
            width: 100%;
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

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Rooms</h2>
                        <p style="margin: 25px auto;font-size: 1.3em; color: #2d3748; line-height: 1.8; max-width: 800px; font-family: 'Georgia', serif; font-weight: 400;letter-spacing: 0.3px;text-align: center;">
                            Nos chambres offrent un cadre confortable et moderne, parfaitement adapté aux séjours de loisirs ou d'affaires.
                            Chaque chambre est équipée d'un lit spacieux, d'une salle de bain privative, de la climatisation, 
                            d'un accès Wi-Fi gratuit, d'une télévision à écran plat et d'un espace de travail. Profitez d'un 
                            séjour agréable dans un environnement calme et soigné.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding:20px" class="room_img">
                            <img style="height:300px;width:800px" src="/room/{{$room->image}}" alt="#"/>
                        </div>
                        <div class="bed_room">
                            <h2>{{$room->room_title}}</h2>
                            <p style="padding:10px">Description : {{$room->description}}</p>
                            <h4 style="padding:10px">Free Wifi : {{$room->wifi}}</h4>
                            <h4 style="padding:10x">Room Type : {{$room->room_type}}</h4>
                            <h4 style="padding:10px">Price : {{$room->price}}</h4>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-4">
                    <h1 style="font-size: 40px;">Book Room</h1>
                    <div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                {{session()->get('message')}}
                            </div>
                        @endif
                    </div>
                    
                    @if($errors)
                        @foreach($errors->all() as $errors)
                            <li style="color:red">{{$errors}}</li>
                        @endforeach
                    
                        <form action="{{url('/add_booking',$room->id)}}" method="post">
                            @csrf                                  
                            <div>
                                <label>Name</label>
                                <input type="text" name="name"  
                                    @if(Auth::id())
                                        value="{{Auth::user()->name}}"
                                    @endif>
                            </div>
                    @endif                  
                    
                    <div>
                        <label>Email</label>
                        <input type="email" name="email"  
                            @if(Auth::id())
                                value="{{Auth::user()->email}}"
                            @endif>
                    </div>

                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone" 
                            @if(Auth::id())
                                value="{{Auth::user()->phone}}"
                            @endif >
                    </div>

                    <div>
                        <label>Start Date</label>
                        <input type="date" name="startDate" id="startDate">
                    </div>

                    <div>
                        <label>End Date</label>
                        <input type="date" name="endDate" id="endDate">
                    </div>

                    <div style="padding-top:20px;">
                        <input type="submit" style="background-color:skyblue;" class="btn btn-primary" value="Book Room">
                    </div>
                        </form>
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
        (function() {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if(month < 10)
                month = '0' + month.toString();

            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate); 
        })();
    </script>  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>   
</body>
</html>