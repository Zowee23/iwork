<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if student number and password are not empty
    if (empty($username) || empty($password)) {
        $error = "Please enter your user and password." . $conn->error;
    }
    else {
        // Check if the student number and password is correct
        $sql = "SELECT * FROM user_account WHERE `username`='$username' AND `password`='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            session_start();
            $_SESSION["username"] = $username;
            header('Location: Home_Page.php'); // Redirect to the home page
            exit();
        } else {
            // Login failed
            $error = "Incorrect username or password." . $conn->error;
        }
    } 
}
?>