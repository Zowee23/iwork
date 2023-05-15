<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email_address = $_POST["email_address"];

        // Check if the student number already exists in the database
        $sql = "SELECT * FROM `user_account` WHERE `username`='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            // registers new user
            $sql = "INSERT INTO `user_account` (`firstname`, `lastname`, `username`, `password`, `email_address`) VALUES ('$firstname', '$lastname','$username', '$password', '$email_address')";
            if ($conn->query($sql) === TRUE) {
                // Registration successful, redirect to the login page
                header('Location: Landing_Page.php');
                exit();
            } else {
                // Display error message if database query fails
                $error = "Registration failed: " . $conn->error;
            }
        } else {
            // Display error message if student number already exists
            $error = "This student number is already registered." . $conn->error;
        }
}
?>
