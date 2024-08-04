
<?php

// check if the cookies are set and all okay. if cookies are not set user will redirect back to the login page
  if(!isset($_COOKIE['fname'], $_COOKIE['lname'], $_COOKIE['user_nic'])){
    
    echo "<script>alert('Login Error')</script>";
    header("Location: userlogin.html", true, 302);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />


  <link rel="stylesheet" href="css/dashboard.css" />
  <title>Dashboard</title>
</head>

<body>
  <div id="side-bar" class="side-bar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><ion-icon name="close-outline"></ion-icon></a>
    <div class="user-info">
      <a href="update_profile.php"><img src="img/user.png" alt="user" /></a>
      <a href="#">
        <p><?php echo $_COOKIE['fname']," ", $_COOKIE['lname'];   ?></p>
      </a>
    </div>
    <div class="menu">
      <div class="menu-feild"> <a href="#"> Dashboard</a></div>
      <div class="menu-feild"> <a href="#"> Customers</a></div>
      <div class="menu-feild"> <a href="#">Projects</a></div>
      <div class="menu-feild"> <a href="#"> Orders</a></div>
      <div class="menu-feild"> <a href="#">Inventory</a></div>
      <div class="menu-feild"> <a href="#">Accounts</a></div>
      <div class="menu-feild"></div><a href="#">Tasks</a>
    </div>

    <div class="bottom-menu">
      <div class="menu-feild"><a href="#"><ion-icon name="settings-outline"></ion-icon>Setting</a></div>
      <div class="menu-feild"><a href="?action=runFunction"><ion-icon name="log-out-outline"></ion-icon>Log Out</a></div>
    </div>
  </div>

  <div id="main" class="main-content">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()"><ion-icon name="menu-outline"></ion-icon></span>

    <header>
      <h2>
        Dashboard
      </h2>

      <div class="search-wrapper">
        <ion-icon name="search-outline"></ion-icon>
        <input type="search" placeholder="Search here" />
      </div>

      <div class="user-wrapper">
        <a href="update_profile.php"> <img src="img/user.png" width="40px" height="40px" alt="" /></a>
        <a href="#">
          <div>
<!-- ADD Firstname and Lastname of the user to the dashboard -->
            <h4> <?php echo $_COOKIE['fname']," ", $_COOKIE['lname'];   ?></h4>
            <small>Super admin</small>
          </div>
        </a>

      </div>
    </header>

    <main>
      <h1>Books</h1>
      <div class="cards">
        <div class="card-single">
          <div class="card-header">
            <img src="img/Game of thrones.jpg" alt="Game of thrones">
            <p>Simple Test</p>
            <ion-icon class="like-btn" name="bookmark-outline" id="like-btn"></ion-icon>
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
                    <a href="#" style="color: rgb(79, 153, 213)"><ion-icon name="logo-twitter"></ion-icon></a>
                  </li>
                  <li>
                    <a href="#" style="color: rgb(34, 173, 34)"><ion-icon name="logo-whatsapp"></ion-icon></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>


        <div class="card-single">
          <div class="card-header">
            <img src="img/Lord of the Rings.jpeg " alt="Lord of the Rings">
            <p>Simple Test</p>
            <ion-icon class="like-btn" name="bookmark-outline" id="like-btn2"></ion-icon>
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
                    <a href="#" style="color: rgb(79, 153, 213)"><ion-icon name="logo-twitter"></ion-icon></a>
                  </li>
                  <li>
                    <a href="#" style="color: rgb(34, 173, 34)"><ion-icon name="logo-whatsapp"></ion-icon></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>



        <div class="card-single">
          <div class="card-header">
            <img src="img/Harry Potter.jpeg" alt="Harry Potter">
            <p>Simple Test</p>
            <ion-icon class="like-btn" name="bookmark-outline" id="like-btn3"></ion-icon>
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
                    <a href="#" style="color: rgb(79, 153, 213)"><ion-icon name="logo-twitter"></ion-icon></a>
                  </li>
                  <li>
                    <a href="#" style="color: rgb(34, 173, 34)"><ion-icon name="logo-whatsapp"></ion-icon></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>




        <div class="card-single">
          <div class="card-header">
            <img src="img/ONYX STORM.jpg" alt="ONYX STORM">
            <p>Simple Test</p>
            <ion-icon class="like-btn" name="bookmark-outline" id="like-btn4"></ion-icon>
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
                    <a href="#" style="color: rgb(79, 153, 213)"><ion-icon name="logo-twitter"></ion-icon></a>
                  </li>
                  <li>
                    <a href="#" style="color: rgb(34, 173, 34)"><ion-icon name="logo-whatsapp"></ion-icon></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>



        <div class="card-single">
          <div class="card-header">
            <img src="img/lf.webp" alt="ONYX STORM">
            <p>Simple Test</p>
            <ion-icon class="like-btn" name="bookmark-outline" id="like-btn4"></ion-icon>
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
                    <a href="#" style="color: rgb(79, 153, 213)"><ion-icon name="logo-twitter"></ion-icon></a>
                  </li>
                  <li>
                    <a href="#" style="color: rgb(34, 173, 34)"><ion-icon name="logo-whatsapp"></ion-icon></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>





      </div>
    </main>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="dashboard.js"></script>

</body>

<?php

if (isset($_GET['action']) && $_GET['action'] == 'runFunction') {
  unset($_COOKIE['fname'], $_COOKIE['lname'], $_COOKIE['user_nic']);
  logout();
}

 function logout(){
  


  echo "

  <script>

    alert('Logging out..')

    window.location.href = 'userlogin.html';

  </script>

  ";

 }

?>

</html>