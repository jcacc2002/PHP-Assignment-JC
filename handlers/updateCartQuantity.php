<?php
session_start();
include '../includes/dbh.php';

if (!isset($_SESSION['userID'])) {
    header('Location: ../signin.php');
    exit();
}

if (isset($_POST['productID']) && isset($_POST['productQuantity'])) {
    $userID = $_SESSION['userID'];
    $productID = $_POST['productID'];
    $productQuantity = max(1, intval($_POST['productQuantity']));

    // Update cart quantity
    $stmt = $conn->prepare("UPDATE cart SET productQuantity = ? WHERE userID = ? AND productID = ?");
    $stmt->bind_param("iii", $productQuantity, $userID, $productID);
    $stmt->execute();
    $stmt->close();

    header('Location: ../shoppingcart.php');
    exit();
} else {
    // Redirect or show error
    header('Location: ../shoppingcart.php');
    exit();
}
?>