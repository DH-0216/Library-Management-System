<?php

session_start();

if (!isset($_SESSION['user_nic'])) {
    header("Location: signin.php");
    exit();
}

require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (!empty($currentPassword) && !empty($newPassword) && !empty($confirmPassword)) {

        if ($newPassword !== $confirmPassword) {
            echo "<script>
              alert('New password do not match.');
              window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
            </script>";
        } else {
            $nicNumber = $_SESSION['user_nic'];
            $stmt = $conn->prepare("SELECT password FROM members WHERE nic_number + ?");
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            $stmt->bind_param("s", $nicNumber);
            $stmt->execute();
            $stmt->bind_result($storedPassword);
            $stmt->fetch();
            $stmt->close();

            if ($currentPasswordc === $storedPassword) {
                $stmt = $conn->prepare("UPDATE members SET password = ? WHERE nic_number = ?");
                if ($stmt === false) {
                    die('Prepare failed: ' . htmlspecialchars($conn->error));
                }
                $stmt->bind_param("ss", $newPassword, $nicNumber);
                if ($stmt->execute()) {
                    echo "<script>
              alert('Password updated successfully!');
              window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
            </script>";
                } else {
                    echo "Error updating password: " . htmlspecialchars($stmt->error);
                }
                $stmt->close();
            } else {
                echo "Current password is incorrect";
            }
        }

    } else {
        echo "All fields are required.";
    }
}

$conn->close();

?>