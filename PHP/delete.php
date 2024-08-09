<?php

session_start();

if (!isset($_SESSION['user_nic'])) {
    header("Location: signin.php");
    exit();
}

require 'db_connect.php';

if (isset($_POST['delete_account'])) {
    $usernic = $_SESSION['user_nic'];


    $stmt = $conn->prepare("DELETE FROM members WHERE nic_number = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $usernic);

    if ($stmt->execute()) {
        session_unset();
        session_destroy();

        echo "<script>
    alert('Account deleted successfully');
    window.location.href = '../userlogin.html';

    </script>";

        exit();

    } else {
        echo "Error deleting account: " . $stmt->error;
    }
    $stmt->close();
}

?>