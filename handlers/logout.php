<?php
session_start();
session_unset(); // remove all session variables
session_destroy(); // destroy the session

header('Location: ../signin.php'); // Redirect to sign-in page or home page
exit();
?>