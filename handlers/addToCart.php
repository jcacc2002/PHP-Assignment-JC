<?php
session_start();
include '../includes/dbh.php'; 

if (!isset($_SESSION['userID'])) {
    // Redirect to login page if the user is not logged in
    header('Location: ../signin.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productID'], $_POST['productQuantity'])) {
    $userID = $_SESSION['userID']; 
    $productID = $_POST['productID'];
    $productQuantity = $_POST['productQuantity'];

    // Check if the product is already in the cart
    $stmt = $conn->prepare("SELECT * FROM cart WHERE userID = ? AND productID = ?");
    $stmt->bind_param("ii", $userID, $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the existing cart item
        $stmt = $conn->prepare("UPDATE cart SET productQuantity = productQuantity + ? WHERE userID = ? AND productID = ?");
        $stmt->bind_param("iii", $productQuantity, $userID, $productID);
    } else {
        // Insert a new cart item
        $stmt = $conn->prepare("INSERT INTO cart (userID, productID, productQuantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $userID, $productID, $productQuantity);
    }

    $stmt->execute();
    $stmt->close();

    // Redirect to cart page or give feedback
    header("Location: ../shoppingcart.php");
    exit();
}
?>