<?php

require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $nic_number = $_POST['nic_number'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $birthday = $_POST['birthday'];

    if ($password !== $confirm_password) {
        die("Password do not match.");
    }

    if ($first_name && $last_name && $nic_number && $address && $email && $contact_number && $password && $confirm_password && $birthday) {

        
        $stmt = $conn->prepare("INSERT INTO members(first_name, last_name, nic_number, address, email, contact_number, password, birthday) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssiss", $first_name, $last_name, $nic_number, $address, $email, $contact_number, $password, $birthday);

        if ($stmt->execute()) {
           echo "<script>
              alert('Registration Success');
              window.location.href = '../userlogin.html';
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

    } else {
        echo "Invalid input.";
    }

} else {
    echo "Invalid request method.";
}
?>