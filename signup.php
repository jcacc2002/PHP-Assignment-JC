<?php
    include 'includes/header.php';
    include 'includes/userfunctions.php';
    //include 'includes/dbh.php';
?>

<h1 class="text-center mt-3 mb-4">Sign Up</h1>

<!-- Sign Up -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="signup.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter E-mail" required>
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" name="surname" placeholder="Enter Surname" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" name="phoneNumber" placeholder="Enter Phone Number" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
</div>
<!-- End Sign Up -->



<?php
    handleUserSignup();
    include 'includes/footer.php';
?>