<section class="banner_main">
    <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Welcome to Our Hotel</h1>
                    <p>Experience luxury and comfort</p>
                    <div class="button_section">
                        <a href="{{ url('our_rooms') }}" class="btn btn-primary">Our Rooms</a>
                        <a href="{{ url('contact_us') }}" class="btn btn-outline-light">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Luxury Accommodations</h1>
                    <p>Discover our premium rooms and suites</p>
                    <div class="button_section">
                        <a href="{{ url('our_rooms') }}" class="btn btn-primary">View Rooms</a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Special Activities</h1>
                    <p>Explore our unique services and activities</p>
                    <div class="button_section">
                        <a href="{{ url('hotels_services') }}" class="btn btn-primary">View Services</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>