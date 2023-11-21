<?php
    include 'includes/header.php';
?>

<!-- Update Details -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter new username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter new email" required>
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Enter new first name" required>
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" id="surname" placeholder="Enter new surname" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter new address" required>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Enter new phone number" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Details</button>
            </form>
        </div>
    </div>
</div>
<!-- End Update Details -->


<?php
    include 'includes/footer.php';
?>