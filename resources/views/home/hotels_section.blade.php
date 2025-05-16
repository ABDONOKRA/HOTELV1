<div class="hotel-section">
    <div class="container">
        <div class="titlepage" style="text-align: center; margin-bottom: 50px;">
            <h2>Nos Hôtels</h2>
            <p style="margin: 25px auto; font-size: 1.3em; color: #2d3748; line-height: 1.8; max-width: 800px; font-family: 'Georgia', serif; font-weight: 400; letter-spacing: 0.3px; text-align: center;">
                Découvrez nos hôtels partenaires offrant un cadre exceptionnel et un service haut de gamme. 
                Chaque établissement a été soigneusement sélectionné pour vous garantir un séjour mémorable.
            </p>
        </div>

        <div class="row">
            <!-- Hôtel 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <figure><img src="images/room5.jpg" alt="Hôtel Royal Mansour" style="width:100%; height:200px; object-fit: cover;"></figure>
                    </div>
                    <div class="hotel-info">
                        <h3>Royal Mansour</h3>
                        <div class="stars">★★★★★</div>
                        <p class="description">Un palace emblématique de Marrakech, alliant luxe traditionnel et modernité. Chaque suite est une véritable résidence privée avec patio.</p>
                        <div class="price">À partir de 800€/nuit</div>
                        <a href="{{ route('hotels_services') }}" class="btn btn-primary">Voir détails</a>
                    </div>
                </div>
            </div>

            <!-- Hôtel 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <figure><img src="images/room5.jpg" alt="La Mamounia" style="width:100%; height:200px; object-fit: cover;"></figure>
                    </div>
                    <div class="hotel-info">
                        <h3>La Mamounia</h3>
                        <div class="stars">★★★★☆</div>
                        <p class="description">Joyau architectural avec jardins luxuriants et spa exceptionnel. Une expérience unique au cœur de la ville ocre.</p>
                        <div class="price">À partir de 600€/nuit</div>
                        <a href="{{ route('hotels_services') }}" class="btn btn-primary">Voir détails</a>
                    </div>
                </div>
            </div>

            <!-- Hôtel 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <figure><img src="images/room5.jpg" alt="Riad Farnatchi" style="width:100%; height:200px; object-fit: cover;"></figure>
                    </div>
                    <div class="hotel-info">
                        <h3>Riad Farnatchi</h3>
                        <div class="stars">★★★★★</div>
                        <p class="description">Riad intime et raffiné avec seulement 9 suites. Service personnalisé et décoration marocaine contemporaine.</p>
                        <div class="price">À partir de 450€/nuit</div>
                        <a href="{{ route('hotels_services') }}" class="btn btn-primary">Voir détails</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hotel-section {
    padding: 60px 0;
    background-color: #f9f9f9;
}

.hotel-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    transition: transform 0.3s ease;
}

.hotel-card:hover {
    transform: translateY(-5px);
}

.hotel-info {
    padding: 20px;
}

.hotel-info h3 {
    color: #2c3e50;
    margin-top: 0;
    font-size: 1.4em;
}

.stars {
    color: #FFD700;
    margin: 5px 0;
    font-size: 1.1em;
}

.description {
    color: #666;
    margin-bottom: 15px;
    font-size: 1em;
    line-height: 1.6;
}

.price {
    color: #4a90e2;
    font-weight: bold;
    margin-bottom: 15px;
    font-size: 1.1em;
}

.btn-primary {
    background-color: #4a90e2;
    color: white;
    padding: 8px 20px;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #3a7bc8;
}
</style>