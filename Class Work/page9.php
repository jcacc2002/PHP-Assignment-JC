<?php 
    include 'includes/header.php';
    include 'includes/functions.php';
?>
<?php
    // Associative arrays
    $students = [
        // Key value pair
        "Interactive Media" => 15,
        "Game Art" => 12
    ];

    print_r($students);
    echo "<br/><br/>";
    
    echo "<p>There are {$students['Interactive Media']} students in Interactive Media.</p>";
    echo "<p>There are {$students['Game Art']} students in Game Art.</p>";
    
    $students["Graphic Design"] = 5;
    echo "<p>There are {$students['Graphic Design']} students in Graphic Design.</p>";
    
    $students["asdf"] = 5;
    if (array_key_exists("asdf", $students)){
        echo "<p> asdf found.</p>";
    }
    else{
        echo "<p> asdf not found.</p>";
    }

    $keys = array_keys($students);
    print_r($keys);
    echo "<br/><br/>";

    $values = array_values($students);
    print_r($values);
    echo "<br/><br/>";
    ?>

<?php include 'includes/footer.php'; ?>