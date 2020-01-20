<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // id sent from form
    if (isset($_POST['A_ID'])) {
        global $A_ID;
        $A_ID = $_POST['A_ID'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Adi Nomberg, Stav Bar, Lital Menashe"/>
    <meta name="Hiking trip" content="information about hiking trip"/>
    <meta name="keywords" content="trip, hiking, information" />
    <link rel="shortcut icon" href="../imgs/icon-logo.png">
    <title>Hiking Trip</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/activities.css">
    <link rel="stylesheet" type="text/css" href="../css/hikingTrip.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
<div class="hiking-trip-background">
    <header>
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
                <li class="main_nav_item active"><a href="activitySearch.php">Activities</a></li>
                <li class="main_nav_item"><a href="contactUs.html">Contact Us</a></li>
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
    </header>
    <main>
        <h1 class="main-header"> Hiking Trip </h1>
</div>

<?php
$conn = mysqli_connect("localhost", "root", "", "MyTrip");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$defaultSQL = "SELECT * FROM hiking_trips WHERE H_ID=$A_ID";

$result = $conn->query($defaultSQL);

if ($result->num_rows > 0) {

// output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<h1 class="destination-header"> ' . $row["Name"] . ' </h1>
    <section class="tags">
    <p class="tags"> <i class="material-icons">flight</i><br> <b>Destination:</b><br> ' . $row["Destination"] . ' <br></p>
    <p class="tags">  <i class="material-icons">category</i><br> <b> Category:</b><br> ' . $row["Category"] . ' <br></p>
    <p class="tags"> <i class="material-icons">cloud</i> <b><br> Recommended season:</b><br> ' . $row["Season"] . ' <br></p>
    </section>

    <div class="div-favorite">
    <button type="submit" class="favorite-button" name="favorites-submit" value="submitted" href=".pages"><i class="material-icons star">star</i>Add To Your Favorites</button>
    </div>
    <section>
    <h3> Trail information: </h3>
    <b> Trail type: </b>' . $row["Trail_type"] . ' <br>
    <i class="material-icons"> directions_walk </i>  <b> Difficulty: </b>' . $row["Difficulty"] . ' <br>
    <b> Extension: </b>' . $row["Extension"] . ' <br>
    <i class="material-icons">av_timer</i> <b> Time average: </b>' . $row["Time_average"] . ' <br>
    </section>

    <section>
    <h3>Trail Info: </h3>
    <article>

        <p> ' . $row["Trail_info"] . '
        </p>
        
    </article>
    </section>

    <img class="activitie-img" src="' . $row["Img"] . '" title="' . $row["Name"] . '" alt="' . $row["Name"] . '" />';
    }
}
else {
    echo "No results";
}
$conn->close();
?>
</main>
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
</body>
</html>