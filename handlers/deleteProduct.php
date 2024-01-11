<?php
session_start();
include '../includes/dbh.php'; 



if (isset($_POST['productID'])) {
    $productID = $_POST['productID'];

    // Prepare a statement to delete the product
    $stmt = $conn->prepare("DELETE FROM products WHERE productId = ?");
    $stmt->bind_param("i", $productID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Product deleted successfully";
    } else {
        echo "Error: Could not delete the product";
    }

    $stmt->close();
}


header('Location: ../products.php'); 
exit();
?>