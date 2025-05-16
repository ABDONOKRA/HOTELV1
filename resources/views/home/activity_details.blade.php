<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('home.css')
    <title>{{ $activity->name }} - Réservation</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- JS Bootstrap (avec Popper inclus) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .main-layout {
            padding-top: 90px; /* Add padding to account for fixed header */
        }
        
     

        .booking-section {
            padding-top: 30px;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
        }

        .breadcrumb-item a {
            color: #2f855a;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #4a5568;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .activity-highlights i {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f7fafc;
            border-radius: 50%;
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

    <div class="container booking-section">
        <!-- Activity Title Section -->
        <div class="row mb-4">
            <div class="col-12">
             
                <h1 class="display-4 mb-3">{{ $activity->name }}</h1>
                @if($activity->type == 'activity')
                    <span class="badge bg-{{ $activity->difficulty == 'Facile' ? 'success' : 'warning' }} mb-2">
                        {{ $activity->difficulty }}
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <!-- Activity Details -->
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset($activity->image) }}" class="card-img-top" alt="{{ $activity->name }}" style="height: 400px; object-fit: cover;">
                    <div class="card-body">
                        <div class="activity-highlights mb-4">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-clock fa-2x me-3 text-primary"></i>
                                        <div>
                                            <small class="text-muted d-block">Durée</small>
                                            <strong>{{ $activity->duration_in_hours }} heures</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-users fa-2x me-3 text-primary"></i>
                                        <div>
                                            <small class="text-muted d-block">Capacité</small>
                                            <strong>{{ $activity->capacity }} personnes max</strong>
                                        </div>
                                    </div>
                                </div>
                                @if($activity->type == 'activity' && $activity->elevation)
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-mountain fa-2x me-3 text-primary"></i>
                                        <div>
                                            <small class="text-muted d-block">Dénivelé</small>
                                            <strong>{{ $activity->elevation }}</strong>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-tag fa-2x me-3 text-primary"></i>
                                        <div>
                                            <small class="text-muted d-block">Prix</small>
                                            <strong class="text-success">{{ $activity->price }}€</strong> /personne
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="mb-3">Description</h4>
                        <p class="card-text lead">{{ $activity->description }}</p>

                        @if($activity->type == 'activity')
                        <div class="what-to-bring mt-4">
                            <h4 class="mb-3">Ce qu'il faut apporter</h4>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i> Chaussures adaptées</li>
                                <li><i class="fas fa-check text-success me-2"></i> Bouteille d'eau</li>
                                <li><i class="fas fa-check text-success me-2"></i> Protection solaire</li>
                                <li><i class="fas fa-check text-success me-2"></i> Appareil photo</li>
                            </ul>
                        </div>
                        @endif

                        @if($activity->type == 'spa')
                        <div class="additional-info mt-4">
                            <h4 class="mb-3">Informations complémentaires</h4>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i> Peignoir et serviettes fournis</li>
                                <li><i class="fas fa-check text-success me-2"></i> Accès aux vestiaires</li>
                                <li><i class="fas fa-check text-success me-2"></i> Thé et rafraîchissements offerts</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">
                            <i class="fas fa-calendar-check me-2 text-primary"></i>
                            Réserver {{ $activity->type == 'activity' ? 'cette activité' : 'ce soin' }}
                        </h3>
                        
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        @auth
                            <form action="{{ route('activity.book', $activity->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom complet</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" 
                                           @if(Auth::check() && Auth::user()->phone)
                                               value="{{ Auth::user()->phone }}"
                                           @endif
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

                                <div class="mb-3">
                                    <label for="number_of_people" class="form-label">Nombre de personnes</label>
                                    <input type="number" class="form-control" id="number_of_people" name="number_of_people" 
                                           min="1" max="{{ $activity->capacity }}" required>
                                </div>

                                <div class="mb-4">
                                    <h4>Total estimé: <span id="total_price">0</span>€</h4>
                                </div>

                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-check me-2"></i>Confirmer la réservation
                                </button>
                            </form>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-lock text-muted mb-3" style="font-size: 48px;"></i>
                                <h4>Connexion requise</h4>
                                <p class="text-muted">Veuillez vous connecter pour effectuer une réservation.</p>
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                                </a>
                                @if (Route::has('register'))
                                    <p class="mt-3 mb-0">
                                        Pas encore de compte ? 
                                        <a href="{{ route('register') }}">Créer un compte</a>
                                    </p>
                                @endif
                            </div>
                        @endauth
                    </div>
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

    <script>
        document.getElementById('number_of_people').addEventListener('change', function() {
            const price = {{ $activity->price }};
            const people = this.value;
            document.getElementById('total_price').textContent = (price * people).toFixed(2);
        });
    </script>
</body>
</html> 