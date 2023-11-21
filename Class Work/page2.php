<?php
    include 'includes/header.php';
?>

<?php
    $num1 = 30;
    $num2 = 10;
    $sum = $num1 + $num2;
    $sub = $num1 - $num2;

    $output = '<h3>'.$num1.'+'.$num2.'='.$sum.'</h3>';
    echo $output;
    $output = '<h3>'.$num1.'-'.$num2.'='.$sub.'</h3>';
    echo $output;
?>



<?php
    include 'includes/footer.php';
?>