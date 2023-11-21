<?php
    include 'includes/header.php';
?>

<?php
    $firstName = 'Jean';
    $age = 20;
    $ageGroup1 = 20;
    $ageGroup2 = 50;
    $ageGroup3 = 90;
    $color = "";
    if($age <= $ageGroup1){
        $color = "green";
    }
    elseif($age <= $ageGroup2){
        $color = "orange";
    }
    elseif($age <= $ageGroup3){
        $color = "red";
    }
    else{
        $color = "grey";
    }

    $ageOutput = "<span style='color:{$color}'>{$age}</span>";

echo "<h3>{$firstName} is {$ageOutput} years old.</h3>";

    // echo '<h1>'.$firstName.'</h1>';     CTRL+/ will comment a selection
    // echo "<h1>{$firstName}</h1>";
?>



<?php
    include 'includes/footer.php';
?>