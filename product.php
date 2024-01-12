<?php
include 'includes/header.php';
include 'includes/dbh.php'; 
session_start();

if (isset($_GET['productId'])) {
    $productId = intval($_GET['productId']); 

    $stmt = $conn->prepare("SELECT productName, productDescription, productPrice, productImage FROM products WHERE productId = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo htmlspecialchars($product['productImage']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['productName']); ?>">
                </div>
                <div class="col-md-6">
                    <!-- Display mode -->
                    <h2 id="productNameDisplay"><?php echo htmlspecialchars($product['productName']); ?></h2>
                    <p id="productDescriptionDisplay"><?php echo htmlspecialchars($product['productDescription']); ?></p>
                    <p id="productPriceDisplay">Price: €<?php echo htmlspecialchars($product['productPrice']); ?></p>

                    <!-- Edit mode -->
                    <input type="text" id="productNameEdit" value="<?php echo htmlspecialchars($product['productName']); ?>" style="display:none;">
                    <textarea id="productDescriptionEdit" style="display:none;"><?php echo htmlspecialchars($product['productDescription']); ?></textarea>
                    <input type="number" id="productPriceEdit" value="<?php echo htmlspecialchars($product['productPrice']); ?>" style="display:none;">

                    <!-- Edit and Save buttons -->
                    <button onclick="toggleEdit()" id="editButton" class="btn btn-info">Edit</button>
                    <button onclick="updateProduct(<?php echo $productId; ?>)" id="saveButton" class="btn btn-primary" style="display:none;">Save</button>
                    
                    <!-- Existing Add to Cart and Delete forms/buttons -->
                    <form action="handlers/addToCart.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="productID" value="<?php echo htmlspecialchars($productId); ?>">
                        <input type="number" name="productQuantity" value="1" min="1">
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                    <form action="handlers/deleteProduct.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="productID" value="<?php echo htmlspecialchars($productId); ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Product not found";
    }

    $stmt->close();
} else {
    echo "No product specified";
}
?>


<!-- Comment Section -->
<div class="row mt-4 px-3">
        <div class="col-md-12">
            <!-- Empty Comment Form -->
            <div class="row mt-4 px-3 mb-4">
                <div class="col-md-12">
                    <h4>Add Your Comment</h4>
                    <form action="handlers/addReview.php" method="post">
                        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" name="comment" rows="3" placeholder="Your Comment" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <select class="form-control" name="rating">
                                <option value="1">1/5</option>
                                <option value="2">2/5</option>
                                <option value="3">3/5</option>
                                <option value="4">4/5</option>
                                <option value="5">5/5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>
            <!-- End Empty Comment Form -->
            

        <!-- After the comment form in product.php -->
        <div class="col-md-12">
            <h4>Customer Reviews</h4>
            <?php
            $reviewStmt = $conn->prepare("SELECT r.reviewID, r.rating, r.comment, u.username FROM reviews r JOIN users u ON r.userID = u.userID WHERE r.productID = ?");
            $reviewStmt->bind_param("i", $productId);
            $reviewStmt->execute();
            $reviewResult = $reviewStmt->get_result();

            if ($reviewResult->num_rows > 0) {
                foreach ($reviewResult as $review) {
                    ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($review['username']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($review['comment']); ?></p>
                            <p>Rating: <?php echo htmlspecialchars($review['rating']); ?>/5</p>
                            <!-- Edit and Delete buttons -->
                            <a href="handlers/editReview.php?reviewID=<?php echo $review['reviewID']; ?>" class="btn btn-primary">Edit</a>
                            <a href="handlers/deleteReview.php?reviewID=<?php echo $review['reviewID']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No reviews yet.</p>";
            }
            $reviewStmt->close();
            ?>
        </div>






        </div>
    </div>
    <!-- End Comment Section -->


<?php
include 'includes/footer.php';
?>

<script>
function toggleEdit() {
    var displayElements = document.querySelectorAll('#productNameDisplay, #productDescriptionDisplay, #productPriceDisplay, #editButton');
    var editElements = document.querySelectorAll('#productNameEdit, #productDescriptionEdit, #productPriceEdit, #saveButton');

    displayElements.forEach(el => el.style.display = el.style.display === 'none' ? 'block' : 'none');
    editElements.forEach(el => el.style.display = el.style.display === 'none' ? 'block' : 'none');
}

function updateProduct(productId) {
    var productName = document.getElementById('productNameEdit').value;
    var productDescription = document.getElementById('productDescriptionEdit').value;
    var productPrice = document.getElementById('productPriceEdit').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('productNameDisplay').textContent = productName;
            document.getElementById('productDescriptionDisplay').textContent = productDescription;
            document.getElementById('productPriceDisplay').textContent = 'Price: €' + productPrice;
            toggleEdit();
        }
    };
    xhttp.open("POST", "handlers/updateProduct.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("productId=" + productId + "&productName=" + productName + "&productDescription=" + productDescription + "&productPrice=" + productPrice);
}
</script>














