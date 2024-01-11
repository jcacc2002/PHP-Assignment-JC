<?php
session_start();
include '../includes/dbh.php';

if (!isset($_SESSION['userID'])) {
    header('Location: signin.php');
    exit();
}

if (isset($_POST['productID'])) {
    $userID = $_SESSION['userID'];
    $productID = $_POST['productID'];

    // Check if the product is already in the wishlist
    $stmt = $conn->prepare("SELECT * FROM wishlists WHERE userID = ? AND productID = ?");
    $stmt->bind_param("ii", $userID, $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Insert a new wishlist item
        $insertStmt = $conn->prepare("INSERT INTO wishlists (userID, productID) VALUES (?, ?)");
        $insertStmt->bind_param("ii", $userID, $productID);
        $insertStmt->execute();
        $insertStmt->close();
    }

    $stmt->close();
    header('Location: ../wishlist.php'); // Redirect to wishlist page
    exit();
}
?>