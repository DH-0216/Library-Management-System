<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $nic_number= filter_input(INPUT_POST, 'nic_number', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $contact_number = filter_input(INPUT_POST, 'contact_number', FILTER_SANITIZE_STRING);
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : null;

    // output received values
    echo "first_name: " . htmlspecialchars($first_name) . "<br>";
    echo "last_name: " . htmlspecialchars($last_name) . "<br>";
    echo "nic_number: " . htmlspecialchars($nic_number) . "<br>";
    echo "address: " . htmlspecialchars($address) . "<br>";
    echo "email: " . htmlspecialchars($email) . "<br>";
    echo "contact_number: " . htmlspecialchars($contact_number) . "<br>";
    echo "password: " . htmlspecialchars($password) . "<br>";
    echo "confirm_password: " . htmlspecialchars($confirm_password) . "<br>";
    echo "birthday: " . htmlspecialchars($birthday) . "<br>";


    if ($password !== $confirm_password) {
        die("Password do not match.");
    }

    if ($first_name && $last_name && $nic_number && $address && $email && $contact_number && $password && $confirm_password &&  $birthday) {
        
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname= "user_registration";

        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO members(first_name, last_name, nic_number, address, email, contact_number, password, birthday) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiss", $first_name, $last_name, $nic_number, $address, $email, $contact_number, $password, $birthday);

    if ($stmt->execute()) {
        echo "Data add successfully!";
    }else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

}else {
    echo "Invalid input.";
}

}else {
    echo"Invalid request method.";
}
?>