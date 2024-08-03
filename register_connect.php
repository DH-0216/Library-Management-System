<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $first_name = filter_input(INPUT_POST, 'first_name' );
    $last_name = filter_input(INPUT_POST, 'last_name' );
    $nic_number= filter_input(INPUT_POST, 'nic_number');
    $address = filter_input(INPUT_POST, 'address');
    $email = filter_input(INPUT_POST, 'email');
    $contact_number = filter_input(INPUT_POST, 'contact_number');
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : null;

    if ($password !== $confirm_password) {
        die("Password do not match.");
    }

    if ($first_name && $last_name && $nic_number && $address && $email && $contact_number && $password && $confirm_password &&  $birthday) {
        
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname= "library";

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