<?php 
    include 'includes/header.php';
    include 'includes/functions.php';
?>

    <h1>Advanced Array Work</h1>

<?php

    $numbers = [5,10,12,25];
    echo "<p>Number of elements in numbers array: ".count($numbers)."</p>";


    // Move pointer to the start of the array and return the value.
    $first = reset($numbers);
    echo "<p>NEXT: {$first}.</p>";

    // Move array pointer to the next position and return value.
    $next = next($numbers);
    echo "<p>NEXT: {$next}.</p>";
    $next = next($numbers);
    echo "<p>NEXT: {$next}.</p>";

    // Move array pointer to the previous position and return value. Checking previous of the first position gives nothing.
    $prev = prev($numbers);
    echo "<p>PREV: {$prev}</p>";
    $prev = prev($numbers);
    echo "<p>PREV: {$prev}</p>";
    $prev = prev($numbers);
    echo "<p>PREV: {$prev}</p>";

    // Move pointer to the end of the array and return the value.
    $end = end($numbers);
    echo "<p>END: {$end}</p>";
    

    // New array for new example.
    $newArray = [10,20,30];
    
    echo "<p>";
    print_r($newArray);
    echo "</p>";
    
    // Add multiple values in one go.
    array_push($newArray, 40, 50);
    print_r($newArray);
    echo "<br/>";
    
    // Remove a value, but return it into a variable.
    $pop = array_pop($newArray);
    echo "<p>POP: {$pop}</p>";
    print_r($newArray);
    echo "<br/>";
    
    // Shift removes the first value, shifting all the others by one spot. 
    $shift = array_shift($newArray);
    print_r($newArray);
    echo "<br/>";
    echo "<p>SHIFT: {$shift}</p>";
    
    // Unshift adds a new value at the start of the array, 'unshifting' all the others by one spot in the other direction.
    array_unshift($newArray, 50);
    print_r($newArray);
    echo "<br/>";
    
    
    $odd = [1,3,5,7];
    $even = [2,4,6,8];
    // Create a new array with values from 2 other arrays. Original arrays are not modified.
    $all = array_merge($odd, $even);
    
    print_r($odd);
    echo "<br/>";
    print_r($even);
    echo "<br/>";
    print_r($all);
    echo "<br/>";
    
    // Sort values in an array in ascending order.
    sort($all);
    print_r($all);
    echo "<br/>";
    
    // Sort values in an array in descending order.
    rsort($all);
    print_r($all);
    echo "<br/>";
    
    $lastArray = [10, 20, 30, 40, 50];

    // Slice takes a copy of part of an array, starting at a specified position, without modifying the original array.
    $filter = array_slice($lastArray, 3);
    print_r($filter);
    echo "<br/>";
    print_r($lastArray);
    echo "<br/>";
    
    // Splice take a copy of part of the original array, removing the part from it.
    $filter = array_splice($lastArray, 2, 2);
    print_r($filter);
    echo "<br/>";
    print_r($lastArray);
    echo "<br/>";
    
    // Explode splits a string into an array based on a specified delimiter
    $fruits = "apple, orange, kiwi";
    $fruit_list = explode(",", $fruits);
    echo "<br/><br/>";

    // Implode joins an array into a string, adding a soecified delimiter between each value
    $name_list = ["Jean", "Peter", "Jesus"];
    $names = implode(", ", $name_list);
    echo "<p>The names in the list are {$names}."

    ?>

<?php include 'includes/footer.php'; ?>