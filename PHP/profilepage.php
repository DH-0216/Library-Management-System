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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/profilepage.css">
    <title>Document</title>
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
            <li class="logout"><a href="?action=runFunction" onclick="return confirmLogout();"><i class="bx bxs-log-out icon"></i>
                    Logout</a></li>
        </ul>
    </section>

    <main>
        <div id="main" class="main-content">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()"></span>
            <header>
                <section class="generel-section">
                    <form>
                        <div class="account-header">
                            <h1 class="account-title">General</h1>
                        </div>
                        <div class="account-edit">
                            <div class="input-container">
                                <label>First Name</label>
                                <input type="text" placeholder="First Name" value="<?php echo $firstname; ?>" />
                            </div>
                            <div class="input-container">
                                <label>Last Name</label>
                                <input type="text" placeholder="Last Name" value="<?php echo $lastname; ?>" />
                            </div>

                            <div class="input-container">
                                <label>Email</label>
                                <input type="email" placeholder="Email" value="<?php echo $email; ?>" />
                            </div>
                            <div class="input-container">
                                <label>Phone Number</label>
                                <input type="text" placeholder="Phone Number" value="<?php echo $contact; ?>" />
                            </div>

                            <div class="input-container">
                                <label class="form-label">Birthday</label>
                                <input type="text" value="<?php echo $birthday; ?>">
                            </div>



                            <div class="input-container">
                                <label>Address</label>
                                <input type="text" placeholder="Address" value="<?php echo $address ?>">
                            </div>
                        </div>

                        <div class="btn-constrainer">
                            <button class="btn-cancel"><a href="dashboard.php">Cancel</a></button>
                            <button class="btn-update">Update</button>
                        </div>
                    </form>
                </section>
                <section id="password-section" class="password-section" style="display: none;">
                    <form>
                        <h2 class="mb-4">Password Settings</h2>
                        <div class="account-edit">
                            <div class="input-container">
                                <label>Old Password</label>
                                <input type="password" placeholder="Old Password" />
                            </div>
                            <div class="input-container">
                                <label>New Password</label>
                                <input type="password" placeholder="New Password" />
                            </div>
                            <div class="input-container">
                                <label>Confirm New Password</label>
                                <input type="password" placeholder="Confirm New Password" />
                            </div>
                        </div>
                        <div class="btn-constrainer">
                            <button class="btn-cancel"><a href="dashboard.php">Cancel</a></button>
                            <button class="btn-update">Update</button>
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


    <script src="../JS/profilepage.js"></script>

</body>

</html>