<?php 
    include 'includes/header.php';
    include 'includes/functions.php';
?>

<h1>Loops!</h1>


<?php
    // For Loop
    // Start counter at a value (example: 0)
    // Every iteration, check if value reaches a predefined limit
    // execute the code within the loop
    // Increment the counter
    for( $i = 0; $i < 5; $i++ ){
        echo"<p>Counter is: {$i}</p>";
    }
    
    // Looping over an array, stopping at the final value within the array itself.
    $products = ["Laptop", "PS5", "Nintendo Switch"];
    echo "<ul>";
    for( $i = 0; $i < count($products); $i++ ){
        echo "<li>{$products[$i]}</li>";
    }
    echo "</ul>";

    // Foreach value found in the array, give the value a temporary name ($product), and make it available within the loop
    foreach($products as $product){
        echo "<p>{$product}</p>";
    }


    $heroes = [
        "Tony Stark" => "Iron Man",
        "Peter Parker" => "Spider-Man",
        "Miles Morales" => "Black Spider-Man"
    ];

    // Foreach loop over an associative array, creating a temporary key-value pair to access each one in the array
    foreach ($heroes as $name => $hero){
        echo "<p>{$name} is known as {$hero}.</p>";
    }


        // While Loops
        $counter = 1;
        // While a criteria is satisfied, repeat the content of the loop. Make sure to have a way that the criteria is eventually satisfied.
        while($counter < 11){
            echo "<p>Looping! Counter is currently: {$counter}.</p>";
            $counter+=1;
        }

        echo "<h5> printing ODD numbers only!</h5>";
        $counter = 0;
        while($counter < 10){
            $counter += 1;
            // Modulus operator is used to check the remainder of a division
            if ($counter % 2 == 0){
                // This counter is only used if the counter is even, as the remainder if 0
                // Continue stops the current iteration, continuing at the start of the loop
                continue;
            }
            echo "<p>{$counter}</p>";
        }

        echo "<h5>Printing until 6</h5>";
        $counter = 0;
        while ($counter < 100){
            $counter += 1;
            if ($counter == 6){
                echo "You have reached your final destination. Count: {$counter}.";
                // Break stops the loop completely
                break;
            }
        }

?>


<?php include 'includes/footer.php'; ?>