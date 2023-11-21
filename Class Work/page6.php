<?php 
    include 'includes/header.php';
    include 'includes/functions.php';
?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
                //String Functions - strlen
                $string = "I want to die and I want it to happen ASAP.";
                echo strlen($string);
                ?>
        </div>
        <div class="col">
            <?php
                $fileName = "bigballs.jpg";
                //echo strlen($fileName);
                $fileNameLength = strlen($fileName);

                $extPos = $fileNameLength - 3;
                //String Functions - substr
                $fileType = substr($fileName, $extPos);
                echo $fileType;
            ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>