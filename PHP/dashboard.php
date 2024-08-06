<?php

session_start();

if (!isset($_SESSION['email'], $_SESSION['user_nic'])) {
    echo "<script>alert('Login Error')</script>";
    header("Location: ../userlogin.html");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Dashboard</title>
</head>

<body>

    <section id="sidebar">
        <div class="user-info">
            <div class="user-info-wrapper">
                <a href="#"><img src="../img/user.png" alt="user" /></a>
                <a href="#">
                    <p><?php echo htmlspecialchars($_SESSION['first_name']) . " " . htmlspecialchars($_SESSION['last_name']); ?></p>
                </a>
            </div>
        </div>

        <ul class="side-menu">
            <li><a href="#" class="active"><i class='bx bxs-dashboard icon'></i>Dashboard</a></li>
            <div class="divider"></div>
            <li>
                <a href="#"><i class='bx bxs-inbox icon'></i>Elements<i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Alert</a></li>
                    <li><a href="#">Alert</a></li>
                    <li><a href="#">Alert</a></li>
                    <li><a href="#">Alert</a></li>
                </ul>
            </li>
            <li><a href="#"><i class='bx bxs-collection icon'></i>collection</a></li>
            <li><a href="#"><i class='bx bxs-doughnut-chart icon'></i>Overveiw</a></li>
            <li><a href="#"><i class='bx bxs-bookmarks icon'></i>Bookmarks</a></li>
            <div class="divider"></div>
            <li> <a href="#"><i class='bx bxs-cog icon'></i>Setting</a></li>
            <li class="logout"> <a href="?action=runFunction"><i class='bx bxs-log-out icon'></i>Logout</a></li>

        </ul>
    </section>

    <section id="content">
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search here">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>
            <a href="#" class="nav-link">
                <i class='bx bxs-bell icon' type='solid'></i>
                <span class="badge">5</span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bxs-message-square-dots icon' type='solid'></i>
                <span class="badge">8</span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <a href="#"><img src="../img/user.png" alt="User">
                    <a href="#">
                        <div class="name-role">
                            <h4 class="name"><?php echo htmlspecialchars($_SESSION['first_name']) . " " . htmlspecialchars($_SESSION['last_name']); ?></h4>
                            <small class="role">member</small>
                        </div>
                    </a>
                    <ul class="profile-link">
                        <li><a href="../profilepage.html"><i class='bx bxs-user-circle icon' type='solid'></i>Profile</a></li>
                        <li class="logout"><a href="?action=runFunction"><i class='bx bxs-user-circle icon' type='solid'></i>Logout</a>
                        </li>
                    </ul>

                </a>
            </div>
        </nav>

        <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
            <div class="info-data">
                <div class="card">
                    <div class="card-single">
                        <div class="card-header">
                            <img src="../img/Game of thrones.jpg" alt="Game of thrones">
                            <p>Simple Test</p>
                            <i class='bx bx-bookmark like-btn'></i>
                        </div>
                        <div class="card-content">
                            <h2>Game of thrones</h2>
                            <p>simple test 3</p>
                        </div>
                        <div class="card-footer">
                            <p style="background-color: #e48e2c;">category</p>
                            <div class="btn-group">
                                <button>Borrow</button>
                                <div class="share">
                                    <button class="share-btn">
                                        <ion-icon name="share-social-outline"></ion-icon>
                                    </button>
                                    <ul class="popup">
                                        <li>
                                            <a href="#" style="color: rgb(79, 153, 213)"><i
                                                    class="bx bxl-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: rgb(34, 173, 34)"><i
                                                    class="bx bxl-whatsapp"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-single">
                        <div class="card-header">
                            <img src="../img/Lord of the Rings.jpeg " alt="Lord of the Rings">
                            <p>Simple Test</p>
                            <i class='bx bx-bookmark like-btn'></i>
                        </div>
                        <div class="card-content">
                            <h2>Lord of the Rings</h2>
                            <p>simple test 3</p>
                        </div>
                        <div class="card-footer">
                            <p style="background-color: #e48e2c;">category</p>
                            <div class="btn-group">
                                <button>Borrow</button>
                                <div class="share">
                                    <button class="share-btn">
                                        <ion-icon name="share-social-outline"></ion-icon>
                                    </button>
                                    <ul class="popup">
                                        <li>
                                            <a href="#" style="color: rgb(79, 153, 213)"><i
                                                    class="bx bxl-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: rgb(34, 173, 34)"><i
                                                    class="bx bxl-whatsapp"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card-single">
                        <div class="card-header">
                            <img src="../img/Harry Potter.jpeg" alt="Harry Potter">
                            <p>Simple Test</p>
                            <i class='bx bx-bookmark like-btn'></i>
                        </div>
                        <div class="card-content">
                            <h2>Harry Potter</h2>
                            <p>simple test 3</p>
                        </div>
                        <div class="card-footer">
                            <p style="background-color: #e48e2c;">category</p>
                            <div class="btn-group">
                                <button>Borrow</button>
                                <div class="share">
                                    <button class="share-btn">
                                        <ion-icon name="share-social-outline"></ion-icon>
                                    </button>
                                    <ul class="popup">
                                        <li>
                                            <a href="#" style="color: rgb(79, 153, 213)"><i
                                                    class="bx bxl-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: rgb(34, 173, 34)"><i
                                                    class="bx bxl-whatsapp"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="card-single">
                        <div class="card-header">
                            <img src="../img/ONYX STORM.jpg" alt="ONYX STORM">
                            <p>Simple Test</p>
                            <i class='bx bx-bookmark like-btn'></i>
                        </div>
                        <div class="card-content">
                            <h2>ONYX STORM</h2>
                            <p>simple test 3</p>
                        </div>
                        <div class="card-footer">
                            <p style="background-color: #e48e2c;">category</p>
                            <div class="btn-group">
                                <button>Borrow</button>
                                <div class="share">
                                    <button class="share-btn">
                                        <ion-icon name="share-social-outline"></ion-icon>
                                    </button>
                                    <ul class="popup">
                                        <li>
                                            <a href="#" style="color: rgb(79, 153, 213)"><i
                                                    class="bx bxl-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: rgb(34, 173, 34)"><i
                                                    class="bx bxl-whatsapp"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card-single">
                        <div class="card-header">
                            <img src="../img/The Games God Plays.webp" alt="The Games God Plays">
                            <p>Simple Test</p>
                            <i class='bx bx-bookmark like-btn'></i>
                        </div>
                        <div class="card-content">
                            <h2>The Games God Plays</h2>
                            <p>simple test 3</p>
                        </div>
                        <div class="card-footer">
                            <p style="background-color: #e48e2c;">category</p>
                            <div class="btn-group">
                                <button>Borrow</button>
                                <div class="share">
                                    <button class="share-btn">
                                        <ion-icon name="share-social-outline"></ion-icon>
                                    </button>
                                    <ul class="popup">
                                        <li>
                                            <a href="#" style="color: rgb(79, 153, 213)"><i
                                                    class="bx bxl-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: rgb(34, 173, 34)"><i
                                                    class="bx bxl-whatsapp"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-single">
                        <div class="card-header">
                            <img src="../img/Don Quixote.jpeg" alt="Don Quixote">
                            <p>Simple Test</p>
                            <i class='bx bx-bookmark like-btn'></i>
                        </div>
                        <div class="card-content">
                            <h2>Don Quixote</h2>
                            <p>simple test 3</p>
                        </div>
                        <div class="card-footer">
                            <p style="background-color: #e48e2c;">category</p>
                            <div class="btn-group">
                                <button>Borrow</button>
                                <div class="share">
                                    <button class="share-btn">
                                        <ion-icon name="share-social-outline"></ion-icon>
                                    </button>
                                    <ul class="popup">
                                        <li>
                                            <a href="#" style="color: rgb(79, 153, 213)"><i
                                                    class="bx bxl-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: rgb(34, 173, 34)"><i
                                                    class="bx bxl-whatsapp"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Recennt Books</h3>

                    </div>
                </div>
                <div class="content-data">
                    <div class="head">
                        <h1>Chatbox</h1>
                        <div class="menu">
                            <i class='bx bx-dots-horizontal-rounded icon'></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-box">
                        <p class="day"><span>Today</span></p>
                        <div class="msg">
                            <img src="../img/admin.svg.png" alt="admin">
                            <div class="chat">
                                <div class="profile">
                                    <span class="username">User</span>
                                    <span class="time">11:30</span>
                                </div>
                                <p>Hi</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">11:31</span>
                                </div>
                                <p>Hello</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Typing...">
                            <button type="submit" class="btn-send"><i class='bx bxs-send icon'
                                    type='solid'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../JS/dashboard.js"></script>
</body>

<?php

if (isset($_GET['action']) && $_GET['action'] == 'runFunction') {
    unset($_SESSION['user_nic']);
    unset($_SESSION['last_name']);
    unset($_SESSION['first_name']);

    logout();
}

function logout(){
    echo "
    <script>
    
    alert('Logging out..')

    window.location.href = '../userlogin.html';
    </script>

    ";

}


?>

</html>