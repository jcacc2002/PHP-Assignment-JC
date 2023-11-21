<?php 
    include 'includes/header.php';
    include 'includes/functions.php';
?>

<?php

    // Declaring arrays.
    $numbers = array(1,2,3,4,5);
    $numbers2 = [1,2,3,4,5];

    // Outputting all values of an array.
    print_r($numbers);
    echo '<br/>';
    print_r($numbers2);
    echo '<br/>';
    
    // Outputting value from array, based on position.
    echo 'First number in the list is '.$numbers[0].'<br/>';
    // Modifying value in array.
    $numbers[0] = 100;
    echo "First number in the list is {$numbers[0]}<br/>";

    // Modifying a value in the array at a specific position, irrespective of data type.
    $numbers[4] = 'hello';
    print_r($numbers);
    echo '<br/>';

    // Adding a new value to the array.
    $numbers[] = 'bla bla';
    print_r($numbers);
    echo '<br/>';

    // Removing a value from the array.
    unset($numbers[3]);
    print_r($numbers);
    echo '<br/>';
    $numbers[3] = "hello";
    print_r($numbers);
    echo '<br/>';

?>

<?php include 'includes/footer.php'; ?>