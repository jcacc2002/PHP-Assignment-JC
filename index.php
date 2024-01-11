<?php
    include 'includes/header.php';
    include 'includes/dbh.php';
    session_start();
?>


<!-- Top Sellers -->
<div class="container mt-4">
    <h1 class="text-center mb-4">Top Sellers</h1>
</div>


<!-- Carousel -->
<div id="topSellersCarousel" class="carousel slide" data-ride="carousel" style="max-width: 400px; margin: auto;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images\After-School_Jacket_(Black).png" class="d-block w-100" alt="After-School Jacket (Black)">
            <div class="carousel-caption d-none d-md-block">
                <h5>After-School Jacket (Black)</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images\Checkered_School_Skirt_(Dark_Gray).png" class="d-block w-100" alt="Checkered School Skirt (Dark Gray)">
            <div class="carousel-caption d-none d-md-block">
                <h5>Checkered School Skirt (Dark Gray)</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images\Double_Nose_Tissues.png" class="d-block w-100" alt="Double Nose Tissues">
            <div class="carousel-caption d-none d-md-block">
                <h5>Double Nose Tissues</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images\Labelle_Socks_(Midnight).png" class="d-block w-100" alt="Labelle Socks (Midnight)">
            <div class="carousel-caption d-none d-md-block">
                <h5>Labelle Socks (Midnight)</h5>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#topSellersCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#topSellersCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- End Carousel -->


<?php
    include 'includes/footer.php';
?>