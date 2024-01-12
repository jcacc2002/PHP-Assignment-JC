<?php
include '../includes/dbh.php';

if (isset($_POST['productId'], $_POST['productName'], $_POST['productDescription'], $_POST['productPrice'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];

    $stmt = $conn->prepare("UPDATE products SET productName=?, productDescription=?, productPrice=? WHERE productId=?");
    $stmt->bind_param("ssdi", $productName, $productDescription, $productPrice, $productId);
    $stmt->execute();

    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Product updated successfully";
    }

    $stmt->close();
} else {
    echo "Invalid request";
}
?>