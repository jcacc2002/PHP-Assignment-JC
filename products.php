<?php
    session_start();
    include 'includes/header.php';
    include 'includes/dbh.php'; 

    $categoryName = "Products"; // Default title
    

    if (isset($_GET['categoryId'])) {
        $categoryId = intval($_GET['categoryId']); 

        // Query to fetch the category name
    $stmt = $conn->prepare("SELECT categoryName FROM categories WHERE categoryID = ?");
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
        $categoryName = $category['categoryName']; // Set the category name for the title
    }
        
    
        // Query to fetch products based on categoryId
        $stmt = $conn->prepare("SELECT productId, productName, productImage FROM products WHERE categoryID = ?");
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        $result = $stmt->get_result();

        
    ?>
    
    <h1 class="text-center mt-3 mb-4"><?php echo htmlspecialchars($categoryName); ?></h1>
    
    <!-- Product Cards -->
    <div class="container mt-4">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <!-- Product Card -->
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($row['productImage']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['productName']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['productName']); ?></h5>
                                <a href="product.php?productId=<?php echo htmlspecialchars($row['productId']); ?>" class="btn btn-primary mb-2">View Details</a>
                                <form action="handlers/addToWishlist.php" method="post">
                                    <input type="hidden" name="productID" value="<?php echo htmlspecialchars($row['productId']); ?>">
                                    <button type="submit" class="btn btn-success">Add to Wishlist</button>
                                </form>
                                <form action="handlers/addToCart.php" method="post">
                                    <input type="hidden" name="productID" value="<?php echo htmlspecialchars($row['productId']); ?>">
                                    <input type="number" name="productQuantity" value="1" min="1">
                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Card -->
                    <?php
                }
            } else {
                echo "No products found in this category.";
            }
            ?>
        </div>
    </div>
    <!-- End Product Cards -->
    
    <?php
    } else {
        echo "No category selected.";
    }
    
    include 'includes/footer.php';
    ?>