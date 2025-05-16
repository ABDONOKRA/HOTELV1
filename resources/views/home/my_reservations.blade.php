<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.css')

      <!-- CSS Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

      <!-- JS Bootstrap (avec Popper inclus) -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

      <title>Mes Réservations</title>

      <style>
         .main-layout {
            padding-top: 90px;
         }
         .reservation-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
         }
         
         .reservation-card {
            transition: transform 0.2s;
         }
         
         .reservation-card:hover {
            transform: translateY(-5px);
         }

         .status-badge {
            position: absolute;
            top: 10px;
            right: 10px;
         }

         .reservation-details {
            font-size: 0.95rem;
         }

         .reservation-date {
            color: #666;
         }

         .empty-state {
            text-align: center;
            padding: 40px 20px;
         }

         .empty-state i {
            font-size: 48px;
            color: #cbd5e0;
            margin-bottom: 20px;
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

      <!-- Reservations Section -->
      <div class="container py-5">
         <div class="row mb-4">
            <div class="col-12">
               <h1 class="mb-3">Mes Réservations</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Mes Réservations</li>
                  </ol>
               </nav>
            </div>
         </div>

         @if(count($reservations) > 0)
            <div class="row">
               @foreach($reservations as $reservation)
                  <div class="col-md-6 col-lg-4 mb-4">
                     <div class="card reservation-card h-100">
                        @if($reservation['image'])
                           <img src="{{ $reservation['type'] === 'room' ? asset('room/' . $reservation['image']) : asset($reservation['image']) }}" class="card-img-top" alt="{{ $reservation['name'] }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body position-relative">
                           <span class="badge bg-success status-badge">{{ ucfirst($reservation['status']) }}</span>
                           
                           <h5 class="card-title mb-3">
                              {{ $reservation['name'] }}
                              <small class="d-block text-muted mt-1">
                                 {{ $reservation['type'] === 'room' ? 'Chambre' : 'Activité' }}
                              </small>
                           </h5>
                           
                           <div class="reservation-details">
                              <p class="mb-2">
                                 <i class="far fa-calendar me-2"></i>
                                 <span class="reservation-date">{{ \Carbon\Carbon::parse($reservation['booking_date'])->format('d/m/Y') }}</span>
                                 @if($reservation['type'] === 'activity')
                                    à {{ $reservation['booking_time'] }}
                                 @endif
                              </p>
                              
                              @if($reservation['type'] === 'room' && isset($reservation['end_date']))
                                 <p class="mb-2">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <span class="reservation-date">Jusqu'au {{ \Carbon\Carbon::parse($reservation['end_date'])->format('d/m/Y') }}</span>
                                 </p>
                              @endif
                              
                              @if($reservation['number_of_people'] > 0)
                                 <p class="mb-2">
                                    <i class="fas fa-users me-2"></i>
                                    {{ $reservation['number_of_people'] }} {{ $reservation['number_of_people'] > 1 ? 'personnes' : 'personne' }}
                                 </p>
                              @endif
                              
                              @if($reservation['total_price'])
                                 <p class="mb-2">
                                    <i class="fas fa-tag me-2"></i>
                                    Prix total: {{ $reservation['total_price'] }}€
                                 </p>
                              @endif
                              
                              @if($reservation['special_requests'])
                                 <div class="mt-3">
                                    <h6 class="mb-2">Demandes spéciales:</h6>
                                    <p class="small text-muted">{{ $reservation['special_requests'] }}</p>
                                 </div>
                              @endif
                           </div>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                           <button class="btn btn-outline-danger btn-sm" onclick="cancelReservation({{ $reservation['id'] }}, '{{ $reservation['type'] }}')">
                              <i class="fas fa-times me-2"></i>Annuler
                           </button>
                           <a href="{{ $reservation['details_url'] }}" class="btn btn-outline-primary btn-sm float-end">
                              <i class="fas fa-eye me-2"></i>Voir les détails
                           </a>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         @else
            <div class="empty-state">
               <i class="far fa-calendar-times mb-3"></i>
               <h3>Aucune réservation trouvée</h3>
               <p class="text-muted">Vous n'avez pas encore de réservation. Découvrez nos chambres et activités !</p>
               <div class="mt-3">
                  <a href="{{ url('our_rooms') }}" class="btn btn-primary me-2">
                     <i class="fas fa-bed me-2"></i>Nos Chambres
                  </a>
                  <a href="{{ url('hotels_services') }}" class="btn btn-primary">
                     <i class="fas fa-concierge-bell me-2"></i>Nos Activités
                  </a>
               </div>
            </div>
         @endif
      </div>

      <!-- footer -->
      @include('home.footer')

      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>

      <script>
         function cancelReservation(id, type) {
            if(confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')) {
               fetch(`/cancel-reservation/${id}`, {
                  method: 'POST',
                  headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}',
                     'Accept': 'application/json',
                     'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({ type: type })
               })
               .then(response => response.json())
               .then(data => {
                  if(data.success) {
                     window.location.reload();
                  } else {
                     alert(data.message || 'Une erreur est survenue lors de l\'annulation de la réservation.');
                  }
               })
               .catch(error => {
                  console.error('Error:', error);
                  alert('Une erreur est survenue lors de l\'annulation de la réservation.');
               });
            }
         }
      </script>
   </body>
</html> 