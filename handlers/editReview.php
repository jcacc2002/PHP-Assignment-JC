<?php
session_start();
include '../includes/dbh.php';

if (isset($_GET['reviewID']) && isset($_SESSION['userID'])) {
    $reviewID = $_GET['reviewID'];

    // Fetch the review details
    $stmt = $conn->prepare("SELECT comment, rating FROM reviews WHERE reviewID = ?");
    $stmt->bind_param("i", $reviewID);
    $stmt->execute();
    $result = $stmt->get_result();
    $review = $result->fetch_assoc();

    // HTML form for editing
    ?>
    <form action="updateReview.php" method="post">
        <input type="hidden" name="reviewID" value="<?php echo $reviewID; ?>">
        <textarea name="comment"><?php echo htmlspecialchars($review['comment']); ?></textarea>
        <input type="number" name="rating" value="<?php echo htmlspecialchars($review['rating']); ?>">
        <button type="submit">Update</button>
    </form>
    <?php
}
?>