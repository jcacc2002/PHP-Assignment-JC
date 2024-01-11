<?php
session_start();
include 'includes/header.php';
include 'includes/dbh.php';

if (!isset($_SESSION['userID'])) {
    echo "Please log in to view your wishlist.";
    exit();
}

$userID = $_SESSION['userID'];

// Fetch wishlist items for the logged-in user
$stmt = $conn->prepare("SELECT p.productName, p.productImage, p.productID FROM products p JOIN wishlists w ON p.productId = w.productID WHERE w.userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
?>

<h1 class="text-center mt-3 mb-4">Wishlist</h1>

<div class="container mt-4">
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- Product Card -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo htmlspecialchars($row['productImage']); ?>" class="card-img" alt="<?php echo htmlspecialchars($row['productName']); ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['productName']); ?></h5>
                                    <form action="handlers/removeFromWishlist.php" method="post">
                                        <input type="hidden" name="productID" value="<?php echo htmlspecialchars($row['productID']); ?>"> <!-- Assuming you have productID in your $row -->
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product Card -->
                <?php
            }
        } else {
            echo "<p>Your wishlist is empty.</p>";
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>