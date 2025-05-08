<section class="banner_main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicateurs -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/banner1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- Texte optionnel -->
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img class="d-block w-100" src="images/banner2.jpg" alt="Second slide">
            </div>
            
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img class="d-block w-100" src="images/banner3.jpg" alt="Third slide">
            </div>
        </div>

        <!-- Contrôles -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Formulaire de réservation -->
    <div class="booking_ocline">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="book_room">
                        <h1>Book a Room Online</h1>
                        <form class="book_now">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <span>Arrival</span>
                                        <img class="date_cua" src="images/date.png" alt="Calendar icon">
                                        <input class="online_book" type="date" name="arrival_date" required>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label>
                                        <span>Departure</span>
                                        <img class="date_cua" src="images/date.png" alt="Calendar icon">
                                        <input class="online_book" type="date" name="departure_date" required>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="book_btn">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>