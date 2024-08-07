<?php

session_start();

if (!isset($_SESSION['user_nic'])) {
    header("Location: signin.php");
    exit();
}

require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $birthday = $_POST['birthday'];

    if (!empty($firstname) && !empty($lastname) && !empty($address) && !empty($email) && !empty($contact) && !empty($birthday)){

        $stmt = $conn->prepare("UPDATE members SET first_name = ?, last_name = ?, address = ?, email = ?, contact_number = ?, birthday = ? WHERE nic_number = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("sssssss", $firstname, $lastname, $address, $email, $contact, $birthday, $_SESSION['user_nic']);

        if ($stmt->execute()) {
            $_SESSION['first_name'] = $firstname;
            $_SESSION['last_name'] = $lastname;

            echo "<script>
              alert('Record updated successfully');
              window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
            </script>";
            } else {
            echo "Error updating record: " . $conn->error;
        }

        $stmt->close();
        } else{
            echo "All fields are required. ";
        }
    }

$conn->close();

?>