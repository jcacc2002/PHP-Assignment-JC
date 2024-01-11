<?php
session_start();
include '../includes/dbh.php'; 

if (!isset($_SESSION['userID'])) {
    // Redirect if user is not logged in
    header('Location: ../signin.php');
    exit();
}

if (isset($_POST['productID'])) {
    $userID = $_SESSION['userID'];
    $productID = $_POST['productID'];

    // Prepare a statement to remove the item from the cart
    $stmt = $conn->prepare("DELETE FROM cart WHERE userID = ? AND productID = ?");
    $stmt->bind_param("ii", $userID, $productID);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the shopping cart page
    header('Location: ../shoppingcart.php');
    exit();
}
?>