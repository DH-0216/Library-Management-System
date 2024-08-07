<?php
session_start();

require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] =='POST') {
   


$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT first_name, last_name, nic_number, password FROM members WHERE email = ? ";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
}


$stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

if ($result->num_rows> 0) {
        $row = $result->fetch_assoc();
    if ($password == $row['password']) {

            $_SESSION['email'] = $email;
            $_SESSION['user_nic'] = $row['nic_number'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];

            header("Location: dashboard.php");
            exit();
    }else{
           echo "<script>
            alert('Invaild Password. Please try again');
            window.location.href = '../userlogin.html';
            </script>";
    } 
} else {
        echo "<script>
            alert('User not registered. Please sign up');
            window.location.href = '../signup.html';
            </script>";
}
}

$stmt->close();
$conn->close();

?>