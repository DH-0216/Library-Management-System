<?php

// import DB connection .php file
require 'db_connect.php';

// if the sign in form method is POST && submit button is clicked this will trigger
if($_SERVER['REQUEST_METHOD']=='POST')
{
    
    $username = $_POST['email'];
    $password = $_POST['password'];

    //echo $username;

    // sql query to check and get user firstname, lastname and nic number in the database
    $select_user_sql = "SELECT first_name, last_name, nic_number from members where email='$username' AND password='$password' ";
    $result = @$conn->query($select_user_sql);

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
            $firstname = $row["first_name"];
            $lastname = $row["last_name"];
            $nic_number = $row["nic_number"];
        }

        //store nic number in cookie for later usage (time*3600 = cookie will expire in one hour)
        setcookie("user_nic", $nic_number, time()+ 3600);
        setcookie("fname", $firstname, time()+ 3600);
        setcookie("lname", $lastname, time()+ 3600);

        // redirect dsahboard page if password is correct
        header("Location: dashboard.php", true, 302);

        
    }
    else{
        echo "No data";
        // redirect login page if password is not correct
        header("Location: userlogin.php", true, 302);
    }

}

?>