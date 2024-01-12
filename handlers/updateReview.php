<?php
session_start();
include '../includes/dbh.php';

if (isset($_POST['reviewID'], $_POST['comment'], $_POST['rating']) && isset($_SESSION['userID'])) {
    $reviewID = $_POST['reviewID'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $userID = $_SESSION['userID'];

    $stmt = $conn->prepare("UPDATE reviews SET comment = ?, rating = ? WHERE reviewID = ? AND userID = ?");
    $stmt->bind_param("siii", $comment, $rating, $reviewID, $userID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Review updated successfully";
    } else {
        echo "Error updating review";
    }

    $stmt->close();
    header('Location: ../product.php');
    exit();
}
?>