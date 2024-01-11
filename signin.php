<?php
session_start(); 
include 'includes/header.php';
include 'includes/dbh.php';

$message = ''; // Variable to hold messages for the user

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    // Validate credentials 
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Credentials are correct
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['userID'] = $user['userID'];

            
            header("Location: index.php"); 
            exit();
        } else {
            $message = "Incorrect password.";
        }
    } else {
        $message = "User not found.";
    }
    $stmt->close();
}
?>

<h1 class="text-center mt-3 mb-4">Sign In</h1>

<!-- Sign In -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if ($message): ?>
                <p class="alert alert-warning"><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="signin.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter email or username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
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