<?php
// Start the session
session_start();

// Database configuration
require 'db_connect.php';

// Get user input
$email = $_POST['email'];
$password = $_POST['password']; // Plain text password

// SQL query to check if the user exists
$sql = "SELECT first_name, last_name, nic_number, password FROM members WHERE email = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($password == $row['password']) {
        // Password is correct, sign in successful
        $_SESSION['email'] = $email;
        $_SESSION['user_nic'] = $row['nic_number'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];

         

        // Redirect to the dashboard page
        header("Location: dashboard.php");
        exit();
    } else {
        // Password is incorrect
        echo "Invalid password. Please try again.";
    }
} else {
    // User does not exist
    echo "User not registered. Please sign up.";
    // Redirect to the sign-up page
    // header("Location: register.html");
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
