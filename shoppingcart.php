<?php
session_start();
include 'includes/header.php';
include 'includes/dbh.php'; 

if (!isset($_SESSION['userID'])) {
    echo "Please log in to view your cart.";
    exit();
}

$userID = $_SESSION['userID'];

// Fetch cart items for the logged-in user
$stmt = $conn->prepare("SELECT p.productID, p.productName, p.productImage, c.productQuantity FROM products p JOIN cart c ON p.productId = c.productID WHERE c.userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
?>

<h1 class="text-center mt-3 mb-4">Shopping Cart</h1>

<!-- Shopping Cart -->
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
                                    <form action="handlers/updateCartQuantity.php" method="post">
                                        <div class="form-group">
                                            <label>Quantity:</label>
                                            <input type="number" class="form-control" name="productQuantity" value="<?php echo htmlspecialchars($row['productQuantity']); ?>" min="1">
                                        </div>
                                    <input type="hidden" name="productID" value="<?php echo htmlspecialchars($row['productID']); ?>">
                                    <button type="submit" class="btn btn-info">Update Quantity</button>
                                    </form>
                                    <form action="handlers/removeFromCart.php" method="post">
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
            echo "<p>Your cart is empty.</p>";
        }
        ?>
        <!-- Buy Now Button -->
        <div class="row justify-content-center mb-4">
            <form action="handlers/createOrder.php" method="post">
                <button type="submit" class="btn btn-primary">Buy Now</button>
            </form>
        </div>
        <!-- End Buy Now Button -->

    </div>
</div>
<!-- End Shopping Cart -->

<?php
include 'includes/footer.php';
?>