<?php
session_start();
include 'includes/header.php';
include 'includes/dbh.php'; 

if (!isset($_SESSION['userID'])) {
    echo "Please log in to edit your details.";
    exit();
}

$userID = $_SESSION['userID'];

// Fetch user details
$stmt = $conn->prepare("SELECT username, emailAddress, firstName, lastName, userAddress, phoneNumber FROM users WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$userDetails = $result->fetch_assoc();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch new details from the form
    $username = $_POST['username'];
    $email = $_POST['email']; 
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userAddress = $_POST['userAddress']; 
    $phoneNumber = $_POST['phoneNumber'];

    // Update user details in the database
    $updateStmt = $conn->prepare("UPDATE users SET username=?, emailAddress=?, firstName=?, lastName=?, userAddress=?, phoneNumber=? WHERE userID=?");
    $updateStmt->bind_param("ssssssi", $username, $email, $firstName, $lastName, $userAddress, $phoneNumber, $userID);
    $updateStmt->execute();
    $updateStmt->close();
}

$stmt->close();
?>

<h1 class="text-center mt-3 mb-4">Edit Details</h1>

<!-- Update Details -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="editdetails.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($userDetails['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($userDetails['emailAddress']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" name="firstName" value="<?php echo htmlspecialchars($userDetails['firstName']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Surname</label>
                    <input type="text" class="form-control" name="lastName" value="<?php echo htmlspecialchars($userDetails['lastName']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="userAddress">Address</label>
                    <input type="text" class="form-control" name="userAddress" value="<?php echo htmlspecialchars($userDetails['userAddress']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" name="phoneNumber" value="<?php echo htmlspecialchars($userDetails['phoneNumber']); ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Details</button>
            </form>
        </div>
    </div>
</div>
<!-- End Update Details -->

<?php include 'includes/footer.php'; ?>