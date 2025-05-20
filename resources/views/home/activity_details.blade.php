<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('home.css')
    <title>{{ $activity->name }} - Activity Details</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- JS Bootstrap (avec Popper inclus) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .main-layout {
            padding-top: 90px;
        }
        .activity-image {
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
        .activity-description {
            font-size: 1.1em;
            line-height: 1.8;
            color: #4a5568;
        }
        .activity-features {
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
        .difficulty-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
        }
        .difficulty-easy {
            background-color: #c6f6d5;
            color: #276749;
        }
        .difficulty-moderate {
            background-color: #fefcbf;
            color: #975a16;
        }
        .difficulty-hard {
            background-color: #fed7d7;
            color: #c53030;
        }
    </style>
</head>
<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#"/></div>
    </div>

    <!-- header -->
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

                <img src="{{ asset('activities/' . $activity->image) }}" alt="{{ $activity->name }}" class="activity-image mb-4">
                
                <span class="difficulty-badge difficulty-{{ strtolower($activity->difficulty) }}">
                    {{ $activity->difficulty }}
                </span>
                
                <h1 class="mb-4">{{ $activity->name }}</h1>
                
                <div class="activity-description">
                    {{ $activity->description }}
                </div>

                <div class="activity-features">
                    <h3 class="mb-3">Détails de l'activité</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="far fa-clock me-2"></i> Durée: {{ $activity->duration_in_hours }} heures</p>
                            @if($activity->elevation)
                                <p><i class="fas fa-mountain me-2"></i> Dénivelé: {{ $activity->elevation }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-users me-2"></i> Activité de groupe</p>
                            <p><i class="fas fa-tag me-2"></i> Prix: <span class="price-tag">{{ $activity->price }}€</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="booking-form">
                    <h2 class="mb-4">Réserver cette activité</h2>
                    
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

                    <form action="{{ route('activity.book', $activity->id) }}" method="POST">
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
                            <i class="fas fa-hiking me-2"></i>Réserver maintenant
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('home.footer')

    <!-- Javascript files in correct order -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html> 