<?php
// profile update DB file

require 'db_connect.php';
// database updates

if($_SERVER['REQUEST_METHOD']=='POST'){
    
      $fname = $_POST["fname"];
      $lastname = $_POST["lname"];
      $email = $_POST["email"];
      $address = $_POST["addrs"];
      $birthday = $_POST["birthday"];
      $contact = $_POST["contact"];

      $usernic = $_COOKIE['user_nic'];

      

      //echo $fname, $lastname, $email, $address, $birthday, $contact;

      $sqlupdate = "UPDATE members SET first_name  = '$fname', last_name  = '$lastname', email = '$email', address = '$address', birthday = '$birthday', contact_number = '$contact' WHERE nic_number = '$usernic'";
        
      $result_update = @$conn->query($sqlupdate);


      if ($result_update === TRUE) {
        echo "Record updated successfully";
        
        // setting new cookie values for fname and lastname (this is for display dashboard fname and lname)
        setcookie("fname", $fname, time()+ 3600);
        setcookie("lname", $lastname, time()+ 3600);

        echo "<script>
              alert('Record updated successfully');
              window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
            </script>";
        exit();
        
        } else {
            echo "Error updating record: " . $conn->error;
          }
          
    $conn->close();
          
    
  
      
}


?>