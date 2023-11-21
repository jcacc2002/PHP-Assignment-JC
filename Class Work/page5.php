<?php 
    include 'includes/header.php';
    include 'includes/functions.php';
?>



    <div class="container">
        <div class="row">
            <div class="col">
                <?php add(1,2); ?>
            </div>
            <div class="col">
                <h1 style="color:red">
                    <?php echo sub(5,3); ?>
                </h1>
            </div>
            <div class="col">
                <p>
                    The subtraction result is <?php echo sub(5,3); ?>. Kill your self.
                </p>
            </div>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>