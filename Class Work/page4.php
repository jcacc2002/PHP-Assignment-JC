<?php include 'includes/header.php'; ?>






<!-- .container will create <div class="container"> -->

<div class="container">
    <div class="row">
        <div class="col">
            <?php 
                // Switch Statements
                $favCol = "purple";

                switch($favCol){
                    case 'purple':
                        echo '<h3>You are sad and depressed.</h3>';
                        break;
                    case 'blue':
                        echo '<h3>You are fat and ugly.</h3>';
                        break;
                    case 'red':
                        echo '<h3>You are pressed and angry.</h3>';
                        break;
                    default:
                    echo '<h3>You are stupid and retarded. I don\'t make the rules.</h3>'; 
                    //  \' will show the ' in a string rather than closing the quote. You may also use ".
                    break;
                }
            ?>
        </div>
        <div class="col">
            <?php

                // If condition checking multiple variables
                $valueSaved = true;
                $age = 30;

                if($valueSaved == false){   //2= when checking for something
                    echo '<h3>You did not save your age.</h3>';
                }
                //elseif($valueSaved == true){
                //    if($age < 30){
                //        echo '<h3>You are still young.</h3>';
                //    }
                //}
                elseif($valueSaved == true && $age < 30){
                    echo '<h3>You are still young.</h3>';
                }
                elseif( $valueSaved == true &&  //&& = And
                        $age >= 30 &&
                        $age < 50){
                    echo '<h3>You are getting there.</h3>';
                }
                else{
                    echo '<h3>Start finalising your will bbg.</h3>';
                }

            ?>

        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>