<?php
    include 'includes/header.php';
?>

<!-- Payment Form Content -->
<div class="container mt-4">
    <!-- Payment Form -->
    <form>
        <h2 class="text-center mb-4">Enter Card Details</h2>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
            </div>
            <div class="form-group col-md-6">
                <label for="expiryDate">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" placeholder="123">
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <button type="button" class="btn btn-primary">Start Order</button>
        </div>
    </form>
    <!-- End Payment Form -->
</div>
<!-- End Payment Form Content -->


<?php
    include 'includes/footer.php';
?>