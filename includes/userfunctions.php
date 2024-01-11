<?php
function handleUserSignup() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli('localhost', 'root', '', 'mablesistersdb');
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Data validation
        $username = $conn->real_escape_string($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';  // Temporarily store the plain password
        $email = $conn->real_escape_string($_POST['email'] ?? '');
        $firstName = $conn->real_escape_string($_POST['firstName'] ?? '');
        $surname = $conn->real_escape_string($_POST['surname'] ?? '');  // Changed from 'lastName'
        $address = $conn->real_escape_string($_POST['address'] ?? '');  // Changed from 'userAddress'
        $phoneNumber = $conn->real_escape_string($_POST['phoneNumber'] ?? '');
    
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        // Prepare SQL statement with placeholders
        $stmt = $conn->prepare("INSERT INTO users (username, emailAddress, password, firstName, lastName, userAddress, phoneNumber) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }
    
        $stmt->bind_param("sssssss", $username, $email, $hashed_password, $firstName, $surname, $address, $phoneNumber);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
        $conn->close();
    }
}
?>