<?php
session_start();
include '../includes/dbh.php';

if (isset($_GET['reviewID']) && isset($_SESSION['userID'])) {
    $reviewID = $_GET['reviewID'];
    $userID = $_SESSION['userID'];

    $stmt = $conn->prepare("DELETE FROM reviews WHERE reviewID = ? AND userID = ?");
    $stmt->bind_param("ii", $reviewID, $userID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Review deleted successfully";
    } else {
        echo "Error deleting review";
    }

    $stmt->close();
    header('Location: ../product.php');
    exit();
}
?>