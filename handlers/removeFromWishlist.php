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

    $stmt = $conn->prepare("DELETE FROM wishlists WHERE userID = ? AND productID = ?");
    $stmt->bind_param("ii", $userID, $productID);
    $stmt->execute();
    $stmt->close();

    header('Location: ../wishlist.php');
    exit();
}
?>