<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_nic'])) {
    // If not logged in, redirect to the sign-in page
    echo "<script>alert('Login Error')</script>";
    // header("Location: userlogin.html");
    exit();
}

// Database configuration
$servername = "localhost";
$rowname = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $rowname, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user details
$nic_number = $_SESSION['user_nic'];


$get_user_details_SQL = "SELECT * from members where nic_number ='$nic_number'";
$result_users = @$conn->query($get_user_details_SQL);

if($result_users->num_rows > 0){

    while($row = $result_users->fetch_assoc()){
        $firstname = $row["first_name"];
        $lastname = $row["last_name"];
        $email = $row["email"];
        $address = $row["address"];
        $birthday = $row["birthday"];
        $contact = $row["contact_number"];
        $password = $row["password"];
    }
}
else{
    echo "No data";
}

?>


<!--Website: wwww.codingdung.com-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/update_profile.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>



<body>

  

    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a> -->
                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a> -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
    <form action="update.php", method="POST">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="fname" class="form-control mb-1" value="<?php echo $firstname; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="lname" class="form-control" value="<?php echo $lastname; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text"  name="email" class="form-control mb-1" value="<?php echo $email; ?>">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="addrs" class="form-control" value="<?php echo $address; ?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" name="contact" class="form-control" value="<?php echo $contact; ?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="<?php echo $birthday; ?>">
                                </div>

                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        
                    
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" name="submit" class="btn btn-primary"> Save </button>&nbsp;
            <button type="button" class="btn btn-default" id="cancel">Cancel</button>
        </div>
    </form>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

<script>
   $(document).ready(function() {
    // Attach a click event listener to the button
    $('#cancel').click(function() {
        // Navigate to another page
        window.location.href = 'dashboard.php';
    });
});
</script>

</html>
