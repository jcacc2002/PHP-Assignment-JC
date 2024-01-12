<?php
session_start();
include '../includes/dbh.php';

if (!isset($_SESSION['userID'])) {
    header('Location: ../signin.php');
    exit();
}

$userId = $_SESSION['userID'];

// Fetch the user's address
$addressQuery = $conn->prepare("SELECT userAddress FROM users WHERE userID = ?");
$addressQuery->bind_param("i", $userId);
$addressQuery->execute();
$addressResult = $addressQuery->get_result();

if ($addressResult->num_rows > 0) {
    $user = $addressResult->fetch_assoc();
    $deliveryAddress = $user['userAddress'];

    if (empty($deliveryAddress)) {
        echo "Your delivery address is not set. Please update your profile.";
        exit();
    }
} else {
    echo "User not found.";
    exit();
}

// Calculate the order total
$orderTotal = 0;
$cartQuery = $conn->prepare("SELECT productID, productQuantity FROM cart WHERE userID = ?");
$cartQuery->bind_param("i", $userId);
$cartQuery->execute();
$cartResult = $cartQuery->get_result();

while ($cartItem = $cartResult->fetch_assoc()) {
    $productQuery = $conn->prepare("SELECT productPrice FROM products WHERE productID = ?");
    $productQuery->bind_param("i", $cartItem['productID']);
    $productQuery->execute();
    $productResult = $productQuery->get_result();
    $product = $productResult->fetch_assoc();

    $orderTotal += $product['productPrice'] * $cartItem['productQuantity'];
}

// Insert the order into userorders
$insertOrder = $conn->prepare("INSERT INTO userorders (deliveryAddress, orderTotal, userID) VALUES (?, ?, ?)");
$insertOrder->bind_param("sdi", $deliveryAddress, $orderTotal, $userId);
$insertOrder->execute();

if ($insertOrder->error) {
    echo "Error: " . $insertOrder->error;
    exit();
}

$orderId = $conn->insert_id;

// Reset the result pointer to the beginning for re-use
$cartResult->data_seek(0);

// Insert items from cart into orderitems
while ($cartItem = $cartResult->fetch_assoc()) {
    $insertItem = $conn->prepare("INSERT INTO orderitems (orderID, productID, quantity) VALUES (?, ?, ?)");
    $insertItem->bind_param("iii", $orderId, $cartItem['productID'], $cartItem['productQuantity']);
    $insertItem->execute();

    if ($insertItem->error) {
        echo "Error: " . $insertItem->error;
        $insertItem->close();
        exit();
    }
    $insertItem->close();
}


$insertOrder->close();
$cartQuery->close();
$productQuery->close();

header('Location: ../orders.php');
exit();
?>