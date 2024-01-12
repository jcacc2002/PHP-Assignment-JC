<?php
include 'includes/header.php';
include 'includes/dbh.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header('Location: signin.php');
    exit();
}

$userId = $_SESSION['userID'];

// Fetch orders
$ordersQuery = $conn->prepare("SELECT * FROM userorders WHERE userID = ?");
$ordersQuery->bind_param("i", $userId);
$ordersQuery->execute();
$ordersResult = $ordersQuery->get_result();

?>

<h1 class="text-center mt-3 mb-4">Your Orders</h1>

<div class="container">
    <?php
    if ($ordersResult->num_rows > 0) {
        while ($order = $ordersResult->fetch_assoc()) {
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Order ID: ' . htmlspecialchars($order['orderID']) . '</h5>';
            echo '<p>Order Total: €' . htmlspecialchars($order['orderTotal']) . '</p>';
            echo '<p>Delivery Address: ' . htmlspecialchars($order['deliveryAddress']) . '</p>';
            
            // Fetch and display order items
            $itemsQuery = $conn->prepare("SELECT productName, quantity FROM orderitems JOIN products ON orderitems.productID = products.productID WHERE orderID = ?");
            $itemsQuery->bind_param("i", $order['orderID']);
            $itemsQuery->execute();
            $itemsResult = $itemsQuery->get_result();
            
            echo '<ul>';
            while ($item = $itemsResult->fetch_assoc()) {
                echo '<li>' . htmlspecialchars($item['productName']) . ' (Quantity: ' . htmlspecialchars($item['quantity']) . ')</li>';
            }
            
            echo '<form action="handlers/deleteOrder.php" method="post">';
            echo '<input type="hidden" name="orderID" value="' . htmlspecialchars($order['orderID']) . '">';
            echo '<button type="submit" class="btn btn-danger">Delete Order</button>';
            echo '</form>';

            echo '</ul>';
            echo '</div>';
            echo '</div>';

        }
    } else {
        echo "<p class='text-center'>You have no orders.</p>";
    }
    ?>
</div>

<?php
include 'includes/footer.php';
?>