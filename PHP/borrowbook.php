<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_nic'])) {
    echo "Please log in to borrow a book.";
    exit();
}


$user_nic = $_SESSION['user_nic'];


echo "Member nic: $user_nic<br>";


$sql_check_member = "SELECT * FROM members WHERE nic_number = ?";
$stmt = $conn->prepare($sql_check_member);
$stmt->bind_param('i', $user_nic);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Error: Member does not exist.";
    exit();
}


$book_id = $_POST['book_id'];
$return_date = $_POST['return_date'];
$borrow_date = date('Y-m-d');


$sql_check_book = "SELECT available_copies FROM books WHERE book_id = ?";
$stmt = $conn->prepare($sql_check_book);
$stmt->bind_param('i', $book_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Error: Book does not exist.";
    exit();
} else {
    $book_data = $result->fetch_assoc();
    if ($book_data['available_copies'] <= 0) {
        echo "Error: No copies available.";
        exit();
    }
}


$sql_insert_borrow = "INSERT INTO borrow_records (nic_number, book_id, borrow_date, return_date) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql_insert_borrow);
$stmt->bind_param('siss', $user_nic, $book_id, $borrow_date, $return_date);

if ($stmt->execute()) {

    $sql_update_book = "UPDATE books SET available_copies = available_copies - 1 WHERE book_id = ?";
    $stmt = $conn->prepare($sql_update_book);
    $stmt->bind_param('i', $book_id);
    $stmt->execute();

    echo "Book borrowed successfully!";
} else {
    echo "Error: Unable to borrow the book. " . $stmt->error;
}

$stmt->close();
$conn->close();

// comment

?>