<?php include 'includes/header.php'; ?>


<?php
    $firstName = "Jean";
    $lastName = "Cacciattolo";
    $age = 20;
?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php
                echo '<p>Name: '.$firstName.'</p>';
                echo '<p>Surname: '.$lastName.'</p>';
                echo '<p>Age: '.$age.'</p>';
            ?>
        </div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>