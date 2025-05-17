<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $activity->name }} - Spa Service</title>
    @include('home.css')
    
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        .main-layout {
            padding-top: 90px;
        }
        .service-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
        }
        .booking-form {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .service-description {
            font-size: 1.1em;
            line-height: 1.8;
            color: #4a5568;
        }
        .service-features {
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .price-tag {
            font-size: 2em;
            color: #2c5282;
            font-weight: 600;
        }
    </style>
</head>
<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#"/></div>
    </div>
    
    <header>
        @include('home.header')
    </header>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home.hotels_services') }}">Services & Activités</a></li>
                        <li class="breadcrumb-item active">{{ $activity->name }}</li>
                    </ol>
                </nav>

                <img src="{{ asset($activity->image) }}" alt="{{ $activity->name }}" class="service-image mb-4">
                
                <h1 class="mb-4">{{ $activity->name }}</h1>
                
                <div class="service-description">
                    {{ $activity->description }}
                </div>

                <div class="service-features">
                    <h3 class="mb-3">Détails du service</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="far fa-clock me-2"></i> Durée: {{ $activity->duration_in_hours }} heures</p>
                            <p><i class="fas fa-user-friends me-2"></i> Service individuel</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-spa me-2"></i> Soin professionnel</p>
                            <p><i class="fas fa-tag me-2"></i> Prix: <span class="price-tag">{{ $activity->price }}€</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="booking-form">
                    <h2 class="mb-4">Réserver ce soin</h2>
                    
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('spa.book', $activity->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom complet</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" 
                                value="{{ Auth::check() && Auth::user()->phone ? Auth::user()->phone : '' }}" 
                                required pattern="[0-9+\-\s]+">
                        </div>

                        <div class="mb-3">
                            <label for="booking_date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="booking_date" name="booking_date" 
                                min="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="booking_time" class="form-label">Heure</label>
                            <select class="form-control" id="booking_time" name="booking_time" required>
                                <option value="">Choisir une heure</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-spa me-2"></i>Réserver maintenant
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('home.footer')
    
    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html> 