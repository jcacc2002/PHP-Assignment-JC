<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title></title>
</head>

<body>

<?php
include 'includes/dbh.php';

$query = "SELECT categoryID, categoryName FROM categories";  
$categories = $conn->query($query);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Able Sisters Co.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="signup.php">Sign Up</a>
                    <a class="dropdown-item" href="signin.php">Sign In</a>
                    <a class="dropdown-item" href="editdetails.php">Edit Details</a>
                    <a class="dropdown-item" href="orders.php">My Orders</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="handlers/logout.php">Logout</a> 
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if ($categories->num_rows > 0): ?>
                        <?php while ($category = $categories->fetch_assoc()): ?>
                            <a class="dropdown-item" href="products.php?categoryId=<?php echo htmlspecialchars($category['categoryID']); ?>">
                                <?php echo htmlspecialchars($category['categoryName']); ?>
                            </a>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="dropdown-item">No categories available</p>
                    <?php endif; ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shoppingcart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="wishlist.php">Wishlist</a>
            </li>
        </ul>
    </div>
</nav>


