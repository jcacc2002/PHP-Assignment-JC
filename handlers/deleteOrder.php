<?php
session_start();
include '../includes/dbh.php';

if (!isset($_SESSION['userID'])) {
    header('Location: signin.php');
    exit();
}

$userId = $_SESSION['userID'];

if (isset($_POST['orderID'])) {
    $orderId = $_POST['orderID'];

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Delete order items first
        $deleteItems = $conn->prepare("DELETE FROM orderitems WHERE orderID = ?");
        $deleteItems->bind_param("i", $orderId);
        $deleteItems->execute();

        // Then delete the order
        $deleteOrder = $conn->prepare("DELETE FROM userorders WHERE orderID = ? AND userID = ?");
        $deleteOrder->bind_param("ii", $orderId, $userId);
        $deleteOrder->execute();

        // Commit transaction
        $conn->commit();

        header('Location: ../orders.php');
        exit();
    } catch (mysqli_sql_exception $exception) {
        $conn->rollback();
        echo "Error: Unable to delete order.";
    }
} else {
    header('Location: ../orders.php');
    exit();
}
?>