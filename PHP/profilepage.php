<?php

session_start();

if (!isset($_SESSION['user_nic'])) {

    echo "<script>alert('Login Error')</script>";

    exit();
}

require 'db_connect.php';

$nic_number = $_SESSION['user_nic'];

$get_user_details_SQL = "SELECT * from members where nic_number = '$nic_number'";
$result_users = $conn->query($get_user_details_SQL);

if ($result_users->num_rows > 0) {

    while ($row = $result_users->fetch_assoc()) {
        $firstname = $row["first_name"];
        $lastname = $row["last_name"];
        $email = $row["email"];
        $address = $row["address"];
        $birthday = $row["birthday"];
        $contact = $row["contact_number"];
        $password = $row["password"];
    }
} else {
    echo "No data";
}

if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    header("Location: ../userlogin.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/profilepage.css">
    <link rel="icon" href="img/logo.ico" type="image/ico">
    <title>Profile</title>
</head>

<body>
    <section id="sidebar" class="sidebar">

        <div class="user-info">
            <div class="user-info-wrapper">
                <a href="#"><img src="../img/user.png" alt="user" /></a>
                <a href="#">
                    <p><?php echo htmlspecialchars($_SESSION['first_name']) . " " . htmlspecialchars($_SESSION['last_name']); ?>
                    </p>
                </a>
            </div>
        </div>
        <ul class="side-menu">
            <li><a href="#" class="active"><i class='bx bxs-cog icon'></i>Account Settings</a></li>
            <div class="divider"></div>
            <li><a href="#" class="menu-link"><i class="bx bxs-user icon"></i>Account</a></li>
            <li><a href="#" class="menu-link"><i class="bx bxs-lock icon"></i>Password</a></li>
            <li><a href="#" class="menu-link"><i class="bx bxs-bell icon"></i>Notifications</a></li>
            <div class="divider"></div>
            <li><a href="#" class="menu-link"><i class="bx bxs-cog icon"></i> Settings</a></li>
            <li class="logout"><a href="?logout=true" onclick="return confirmLogout();"><i
                        class="bx bxs-log-out icon"></i>
                    Logout</a></li>
        </ul>
    </section>

    <main>
        <div id="main" class="main-content">
            <section class="generel-section">
                <form action="update.php" method="post">
                    <h2>Account Setting</h2>
                    <div class="content">

                        <div class="inputbox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="text" id="first_name" name="first_name" value="<?php echo $firstname; ?>">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="text" id="last_name" name="last_name" value="<?php echo $lastname; ?>">
                            <label for="last_name">Last Name</label>
                        </div>

                        <div class="inputbox">
                            <ion-icon name="location-outline"></ion-icon>
                            <input type="text" id="address" name="address" value="<?php echo $address; ?>">
                            <label for="address">Address</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="call-outline"></ion-icon>
                            <input type="tel" id="contact_number" name="contact" value="<?php echo $contact; ?>">
                            <label for="contact_number">Contact Number</label>
                        </div>

                        <div class="inputbox">
                            <input type="date" name="birthday" value="<?php echo $birthday; ?>">
                            <label for="birthday">Birthday</label>
                        </div>


                        <div class="btn-constrainer">
                            <button type="button" class="btn-cancel"><a href="dashboard.php">Cancel</a></button>
                            <div class="right-button">
                                <button type="submit" name="update_account" class="btn-update">Update</button>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="delete.php" method="post" name="delete-button">
                    <div class="btn-constrainer-delete">
                        <button type="submit" name="delete_account" class="btn-delete"
                            onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                            Delete Account
                        </button>
                    </div>
                </form>
            </section>


            <section id="password-section" class="password-section" style="display: none;">
                <form action="updatepassword.php" method="post">
                    <h2>Password Settings</h2>
                    <div class="content">
                        <div class="inputbox">
                            <ion-icon name="eye-off-outline" id="eyeicon" class="eyeicon"></ion-icon>
                            <input type="password" id="confirm_password" name="current_password" required>
                            <label for="confirm_password">Current Password</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="eye-off-outline" id="eyeicon" class="eyeicon"></ion-icon>
                            <input type="password" id="password" name="new_password" required>
                            <label for="password">New Password</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="eye-off-outline" id="eyeicon" class="eyeicon"></ion-icon>
                            <input type="password" id="confirm_password" name="confirm_password" required>
                            <label for="confirm_password">Confirm Password</label>
                        </div>
                    </div>
                    <div class="btn-constrainer">
                        <button type="button" class="btn-cancel"><a href="dashboard.php">Cancel</a></button>
                        <button type="submit" class="btn-update">Update</button>
                    </div>
                    <div class="extra-info">
                        <p>If you forgot your password, <a href="#">click here</a> to reset it.</p>
                    </div>
                </form>
            </section>


            <section id="notiffication-section" class="notiffication-section" style="display: none;">
                <form>
                    <h2 class="mb-4">Notifications Settings</h2>
                    <div class="card-body">
                        <h4 class="mb-4">Activity</h4>
                        <div class="form-group">
                            <label class="switcher">
                                <input type="checkbox" class="switcher-input" checked />
                                <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                </span>
                                <span class="switcher-label">Email me when new book publish</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="switcher">
                                <input type="checkbox" class="switcher-input" checked />
                                <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                </span>
                                <span class="switcher-label">Email me when new book publish</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="switcher">
                                <input type="checkbox" class="switcher-input" checked />
                                <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                </span>
                                <span class="switcher-label">Email me when new book publish</span>
                            </label>
                        </div>
                        <h4 class="mb-4">System</h4>
                        <div class="form-group">
                            <label class="switcher">
                                <input type="checkbox" class="switcher-input" checked />
                                <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                </span>
                                <span class="switcher-label">Email me when new book publish</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="switcher">
                                <input type="checkbox" class="switcher-input" checked />
                                <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                </span>
                                <span class="switcher-label">Email me when new book publish</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="switcher">
                                <input type="checkbox" class="switcher-input" checked />
                                <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                </span>
                                <span class="switcher-label">Email me when new book publish</span>
                            </label>
                        </div>
                        <div class="btn-constrainer">
                            <button class="btn-cancel"><a href="dashboard.php">Cancel</a></button>
                            <button class="btn-update">Update</button>
                        </div>
                    </div>
                </form>
            </section>
            </header>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="../JS/profilepage.js"></script>
    <script src="../JS/togglePassword.js"></script>

</body>

</html>