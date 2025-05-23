<!-- Hotels Section -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="title">Our Featured Hotels</h2>
        <p class="text-muted" style="font-size: 1.35rem; font-family: 'Georgia', 'Times New Roman', Times, serif; line-height: 2; text-align: center;">Découvrez notre sélection exclusive d'hôtels de luxe, soigneusement choisis pour vous offrir un confort exceptionnel, des services haut de gamme, et une expérience inoubliable que vous soyez en bord de mer, en plein centre-ville ou au cœur des montagnes.</p>
    </div>

    <div class="row g-4">
        <!-- Hotel 1 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm hover-effect">
                <img src="images/hotel12.jpg" class="card-img-top" alt="Luxury Hotel" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: 700;">ALMAMOUNIA HOTEL</h5>
                    <div class="mb-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                    </div>
                    <p class="card-text">Experience ultimate luxury in the heart of the city. Features include a rooftop pool, spa, and gourmet restaurants.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-wifi me-2"></i> Free Wi-Fi</li>
                        <li><i class="fa fa-swimming-pool me-2"></i> Pool Access</li>
                        <li><i class="fa fa-utensils me-2"></i> Restaurant</li>
                    </ul>
                    <a href="{{ route('home.hotels_services') }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <!-- Hotel 2 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm hover-effect">
                <img src="images/hotel11.jpg" class="card-img-top" alt="Beach Resort" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: 700;">ESSAIDY HOTEL</h5>
                    <div class="mb-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star-half text-warning"></i>
                    </div>
                    <p class="card-text">Beachfront paradise with private beach access, water sports, and world-class spa treatments.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-umbrella-beach me-2"></i> Private Beach</li>
                        <li><i class="fa fa-spa me-2"></i> Spa Services</li>
                        <li><i class="fa fa-water me-2"></i> Water Sports</li>
                    </ul>
                    <a href="{{ route('home.hotels_services') }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <!-- Hotel 3 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm hover-effect">
                <img src="images/hotel13.jpg" class="card-img-top" alt="Mountain Resort" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: 700;">ARIH HOTEL</h5>
                    <div class="mb-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                    </div>
                    <p class="card-text">Nestled in the mountains, offering scenic views, hiking trails, and cozy accommodations.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-mountain me-2"></i> Mountain Views</li>
                        <li><i class="fa fa-hiking me-2"></i> Hiking Trails</li>
                        <li><i class="fa fa-fire me-2"></i> Fireplace</li>
                    </ul>
                    <a href="{{ route('home.hotels_services') }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-effect {
    transition: transform 0.3s ease-in-out;
}

.hover-effect:hover {
    transform: translateY(-5px);
}

.card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
}

.card-img-top {
    transition: transform 0.3s ease-in-out;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}

.btn-primary {
    background-color: #1c1c1c;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #333;
}

.title {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    color: #1c1c1c;
}
</style> 