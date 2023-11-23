<?php
include 'includes/header.php';
?>

<h1 class="text-center mt-3 mb-4">Shopping Cart</h1>

<!-- Shopping Cart -->
<div class="container mt-4">
    <div class="row">
        <!-- Product Card 1 -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="images\After-School_Jacket_(Black).png" class="card-img" alt="After-School Jacket (Black)">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">After-School Jacket (Black)</h5>
                            <div class="form-group">
                                <label for="quantity1">Quantity:</label>
                                <input type="number" class="form-control" id="quantity1" value="1" min="1">
                            </div>
                            <button class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Card 1 -->

        <!-- Product Card 2 -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="images\Double_Nose_Tissues.png" class="card-img" alt="Double Nose Tissues">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Double Nose Tissues</h5>
                            <div class="form-group">
                                <label for="quantity2">Quantity:</label>
                                <input type="number" class="form-control" id="quantity2" value="1" min="1">
                            </div>
                            <button class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Card 2 -->
    </div>

        <!-- Buy Now Button -->
        <div class="row justify-content-center mb-4">
            <a href="paymentmethod.php" class="btn btn-primary">Buy Now</a>
        </div>
        <!-- End Buy Now Button -->
</div>
<!-- End Shopping Cart -->



<?php
    include 'includes/footer.php';
?>