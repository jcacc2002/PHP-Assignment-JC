<?php
session_start();
include '../includes/dbh.php';

if (isset($_POST['productId'], $_POST['comment'], $_POST['rating'])) {
    $productId = $_POST['productId'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $userId = $_SESSION['userID'];

    $stmt = $conn->prepare("INSERT INTO reviews (userID, productID, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $userId, $productId, $rating, $comment);
    $stmt->execute();

    if ($stmt->error) {
        // Handle error
    }

    $stmt->close();
    header("Location: ../product.php?productId=" . $productId); // Redirect back to the product page
    exit();
}
?>