<?php
    include 'includes/header.php';
?>

<!-- Product Details -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="images\Labelle_Socks_(Midnight).png" class="img-fluid" alt="Labelle Socks (Midnight)">
        </div>
        <div class="col-md-6">
            <h2>Labelle Socks (Midnight)</h2>
            <p>These amazing socks were designed by one of our own. Our sister Labelle has been tirelessly working to bring you the best clothes on this island.</p>
            <p>Price: €20.00 (Per Sock)</p>
            <button class="btn btn-success">Add to Cart</button>
            <button class="btn btn-info">Edit</button>
            <button class="btn btn-danger">Delete</button>

        </div>
    </div>
</div>
<!-- End Product Details -->

<!-- Comment Section -->
<div class="row mt-4 px-3">
        <div class="col-md-12">
            <h4>Customer Reviews</h4>
            <!-- Ready Comment -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">darky1213</h5>
                    <p class="card-text">The product is great! I love it.</p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 mr-2">Rating: 4/5</p>
                            <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                        </div>
                        <p class="text-muted">Date Published: November 25, 2023</p>
                    </div>
                </div>
            </div>
            <!-- End Ready Comment -->
            
            <!-- Empty Comment Form -->
            <div class="row mt-4 px-3">
                <div class="col-md-12">
                    <h4>Add Your Comment</h4>
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Your Username">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" rows="3" placeholder="Your Comment"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <select class="form-control" id="rating">
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
        </div>
    </div>
    <!-- End Comment Section -->


<?php
    include 'includes/footer.php';
?>