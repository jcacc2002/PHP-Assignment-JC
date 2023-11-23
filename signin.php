<?php
    include 'includes/header.php';
?>

<h1 class="text-center mt-3 mb-4">Sign In</h1>

<!-- Sign In -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form>
                <div class="form-group">
                    <label for="emailUsername">Email/Username</label>
                    <input type="text" class="form-control" id="emailUsername" placeholder="Enter email or username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
        </div>
    </div>
</div>
<!-- End Sign In -->


<?php
    include 'includes/footer.php';
?>