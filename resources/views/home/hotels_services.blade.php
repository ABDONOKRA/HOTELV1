<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services & Activités - Royal Mansour</title>
    @include('home.css')
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        
        .page-banner {
            height: 60vh;
            background-size: cover;
            background-position: center;
            position: relative;
            margin-bottom: 0;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
        }

        .page-banner-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            width: 100%;
            z-index: 1;
        }

        .page-banner-content h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .section-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            color: #333;
            font-size: 2.5em;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .section-title p {
            color: #666;
            font-size: 1.1em;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Activities Section */
        .activities-section {
            background-color: #fff;
        }

        .activity-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 30px;
            background: #fff;
        }

        .activity-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .activity-img {
            height: 250px;
            object-fit: cover;
        }

        .activity-content {
            padding: 25px;
        }

        .activity-title {
            font-size: 1.5em;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 15px;
        }

        .activity-details {
            margin: 15px 0;
            color: #4a5568;
        }

        .activity-price {
            color: #2c5282;
            font-size: 1.3em;
            font-weight: 600;
            margin: 15px 0;
        }

        /* Spa Section */
        .spa-section {
            background-color: #f7f8f9;
            position: relative;
        }

        .spa-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(to bottom right, #fff 0%, #fff 50%, #f7f8f9 50%, #f7f8f9 100%);
        }

        .spa-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            background: #fff;
        }

        .spa-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .spa-img {
            height: 300px;
            object-fit: cover;
        }

        .spa-content {
            padding: 30px;
        }

        .spa-title {
            font-size: 1.8em;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 15px;
        }

        .spa-description {
            color: #4a5568;
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .spa-details {
            display: flex;
            align-items: center;
            margin: 15px 0;
            color: #4a5568;
        }

        .spa-price {
            color: #2c5282;
            font-size: 1.5em;
            font-weight: 600;
            margin: 20px 0;
        }

        .btn-book-activity {
            background: #2f855a;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-book-activity:hover {
            background: #276749;
            color: white;
            transform: translateY(-2px);
        }

        .btn-book-spa {
            background: #805ad5;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-book-spa:hover {
            background: #6b46c1;
            color: white;
            transform: translateY(-2px);
        }

        .difficulty-badge {
            padding: 6px 12px;
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

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    
    <header>
        @include('home.header')
    </header>

    <!-- Page Banner -->
    <div class="page-banner" style="background-image: url('{{asset('images/banner1111.jpg')}}');">
        <div class="page-banner-content">
            <h1>Services & Activités</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Accueil</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Services & Activités</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Activities Section -->
    <section class="activities-section">
        <div class="section-container">
            <div class="section-title">
                <h2>Nos Activités</h2>
                <p>Découvrez nos activités passionnantes conçues pour rendre votre séjour inoubliable. Des aventures en plein air aux expériences culturelles enrichissantes.</p>
            </div>
            <div class="row">
                @foreach($activities as $activity)
                    @if($activity->type == 'activity')
                        <div class="col-lg-4 col-md-6">
                            <div class="activity-card">
                                <img src="{{asset($activity->image)}}" class="activity-img" alt="{{ $activity->name }}">
                                <div class="activity-content">
                                    <span class="difficulty-badge difficulty-{{ strtolower($activity->difficulty) }}">
                                        {{ $activity->difficulty }}
                                    </span>
                                    <h3 class="activity-title">{{ $activity->name }}</h3>
                                    <div class="activity-details">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="far fa-clock me-2"></i>
                                            <span>{{ $activity->duration_in_hours }} heures</span>
                                        </div>
                                        @if($activity->elevation)
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fas fa-mountain me-2"></i>
                                                <span>Dénivelé : {{ $activity->elevation }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="activity-price">{{ $activity->price }}€ <span class="fs-6">par personne</span></div>
                                    <a href="{{ route('activity.details', $activity->id) }}" class="btn btn-book-activity w-100">
                                        <i class="fas fa-hiking me-2"></i>Réserver cette activité
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Spa Section -->
    <section class="spa-section">
        <div class="section-container">
            <div class="section-title">
                <h2>Spa & Bien-être</h2>
                <p>Offrez-vous un moment de détente absolue dans notre spa luxueux. Des soins traditionnels aux thérapies modernes pour votre bien-être.</p>
            </div>
            <div class="row">
                @foreach($activities as $activity)
                    @if($activity->type == 'spa')
                        <div class="col-lg-6">
                            <div class="spa-card">
                                <img src="{{asset($activity->image)}}" class="spa-img" alt="{{ $activity->name }}">
                                <div class="spa-content">
                                    <h3 class="spa-title">{{ $activity->name }}</h3>
                                    <p class="spa-description">{{ $activity->description }}</p>
                                    <div class="spa-details">
                                        <i class="far fa-clock me-2"></i>
                                        <span>{{ $activity->duration_in_hours }} heures de soin</span>
                                    </div>
                                    <div class="spa-price">{{ $activity->price }}€ <span class="fs-6">par personne</span></div>
                                    <a href="{{ route('activity.details', $activity->id) }}" class="btn btn-book-spa w-100">
                                        <i class="fas fa-spa me-2"></i>Réserver ce soin
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    @include('home.footer')
    
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>