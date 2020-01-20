<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In or Sign Up</title>
    <meta name="author" content="Adi Nomberg, Stav Bar, Lital Menashe"/>
    <meta name="description" content="Log into your account or create a new account in MyTrip"/>
    <meta name="keywords" content="Trips, Planning, Login, Signup, account"/>
    <link rel="shortcut icon" href="../imgs/icon-logo.png">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/loginOrSignup.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body class="loginsignup-body">
<div class="loginsignup_background">
    <!-- Navigation -->
    <nav>
        <ul class="main_nav_list">
            <li class="main_nav_item_logo"><a href="../index.html"><img class="logo_image" src="../imgs/logo.png" alt="mytrip-logo"/></a></li>
            <li class="main_nav_item"><a href="../index.html">Home</a></li>
            <li class="main_nav_item"><a href="about.html">About Us</a></li>
            <li class="main_nav_item-Equipment"><a href="equipmentListSearch.php" class="dropbtn">Equipment Lists</a>
                <div class="equipment-dropdown">
                    <a href="equipmentListSearch.php" class="equipment-dropdown-item">Search Equipment List</a>
                    <a href="addEquipmentList.html" class="equipment-dropdown-item">Add Equipment List</a>
                </div>
            </li>
            <li class="main_nav_item"><a href="activitySearch.php">Activities</a></li>
            <li class="main_nav_item"><a href="contactUs.html">Contact Us</a></li>
            <li class="main_nav_item-user"> <?php
                if(isset($_SESSION['login_user'])) {
                    $user = $_SESSION['login_user'];
                    $db = mysqli_connect("localhost", "root", "", "MyTrip");
                    // Check connection
                    if ($db === false) {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $sql = "SELECT FirstName FROM users WHERE EMail='$user'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $name = $row['FirstName'];
                    echo "Welcome $name";
                }?> </li>
            <li class="main_nav_item login"><button type="button" class="but_login"><i class="material-icons login-icon">person_pin</i></button></li>
            <li class="main_nav_item plan"><a href="MyTrip.php"><button type="button" class="but_plan">Plan Your Trip!</button></a></li>
        </ul>
        <div class="arrow-up"></div>
        <div class="login-form">
            <form method="post" action="login-form.php">
                <div class="email-container-login">
                    <input type="text" name="email" class="email-login" placeholder="Email"/>
                </div>
                <div class="password-container-login">
                    <input type="password" name="password" class="password-login" placeholder="Password"/>
                </div>
                <input type="submit" name="submit-login" value="Log In" class="login-but"/>
                <div class="login-sent">
                    Don't have an account yet? Sign up <a class="here-link" href="loginOrSignup.php">HERE</a>.
                </div>
            </form>
        </div>
    </nav>
    <section class="main-loginorsignup">
        <section class="main-login">
            <h2 class="login-header"> Sign in </h2>
            <form method="POST" action="login-form.php" class="login-form2">
                <div class="email-container-login2">
                    <label for="email-login"> Email: </label>
                    <input type="text" name="email" id="email-login"/>
                </div>
                <div class="password-container-login2">
                    <label for="password-login"> Password: </label>
                    <input type="password" name="password" id="password-login"/>
                </div>
                <input type="submit" name="submit-login" value="Log In" class="login-but2"/>
                <div class="change-password" id="change-pass"> Want to update your password? Change it <a class="here-link" onmousedown="changePassword()">HERE</a>. </div>
            </form>
            <div class="forgot-password">
                <form method="post" action="changePassword.php" class="hidden-password-form" id="hidden-password-form">
                    <div class="email-container-login2">
                        <label for="email-login"> Email: </label>
                        <input type="text" name="email" id="email-login"/>
                    </div>
                    <div class="password-container-login2">
                        <label for="password-login"> Old Password: </label>
                        <input type="password" name="old-password" id="password-login"/>
                    </div>
                    <div class="password-container-login2">
                        <label for="password-login"> New Password: </label>
                        <input type="password" name="new-password" id="password-login"/>
                    </div>
                    <input type="submit" name="submit-login" value="Change" class="login-but"/>
                </form>
            </div>
        </section>
        <section class="main-signup">
            <h2 class="signup-header"> Don't have an account? </h2>
            <h3 class="signup-second-head"> Sign up - it's free. </h3>
            <form method="POST" action="signup-form.php" class="signup-form">
                <div class="first-name-container-signup">
                    <label for="first-name-signup"> First name: </label>
                    <input type="text" name="firstName" id="first-name-signup"/>
                </div>
                <div class="last-name-container-signup">
                    <label for="last-name-signup"> Last name: </label>
                    <input type="text" name="lastName" id="last-name-signup"/>
                </div>
                <div class="email-container-signup">
                    <label for="email-signup"> Email: </label>
                    <input type="text" name="email" id="email-signup"/>
                </div>
                <div class="password-container-signup">
                    <label for="password-signup"> Password: </label>
                    <input type="password" name="pass" id="password-signup"/>
                </div>
                <input type="submit" name="submit-signup" value="Sign Up" class="signup-but"/>
            </form>
        </section>
    </section>
</div>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-col col1">
            <h2 class="footer-headline">MyTrip</h2>
            <p> A free online trip planner that can help you build a personalized itinerary for your next vacation. </p>
        </div>
        <div class="footer-col col2">
            <ul class="list-footer">
                <li class=""><h2 class="footer-headline">Information</h2></li>
                <li class=""><a class="footer-link" href="about.html">About</a></li>
                <li class=""><a class="footer-link" href="contactUs.html">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-col col3">
            <ul class="list-footer">
                <li class=""><h2 class="footer-headline">Have a Question?</h2></li>
                <li><span class="icon icon-map-marker"></span><i class="material-icons footer-icon">location_on</i><span class="footer-text"> 1 Ben-Gurion Ave, Beer-Sheva, Israel</span></li>
                <li><span class="icon icon-phone"></span><i class="material-icons footer-icon">phone</i><span class="footer-text"> +972-8-646-1600</span></a></li>
                <li><span class="icon icon-envelope"></span><i class="material-icons footer-icon">email</i><span class="footer-text"> info@mytrip.com</span></a></li>
            </ul>
        </div>

        <p class="copyright">
            <i class="material-icons footer-icon">copyright</i>MyTrip  All rights reserved | This website is made with <i class="material-icons footer-icon">favorite</i> by Adi Nomberg, Lital Menashe, Stav Bar
        </p>
    </div>
</footer>
<script src="../js/loginForm.js"></script>
<script src="../JS/forgotPassword.js"></script>
</body>
</html>