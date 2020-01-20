

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search an Activity</title>
    <meta name="author" content="Adi Nomberg, Stav Bar, Lital Menashe"/>
    <meta name="description" content="Search for your favourite activities to put in your trip itinerary"/>
    <meta name="keywords" content="Trips, Planning, Search, Activity, Attractions, Restaurants, Hiking Trails" />
    <link rel="shortcut icon" href="../imgs/icon-logo.png">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/activitySearch.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body class="activity-body">
<div class="activity_background">
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
    <section class="main-search-activity">
        <h1 class="activity-header"> Search an Activity </h1>
        <form method="GET" action="" class="search-form">
            <div class="name-search">
                <label for="acitvity-name-search"> Search by name: </label>
                <input type="text" name="acitvity-name-search" id="acitvity-name-search" placeholder="Activity name..."/>
            </div>
            <br/>
            <label for="acitvity-destination"> Destination: </label>
            <input list="acitvity-destination-search" name="acitvity-destination" id="acitvity-destination" placeholder="Country name..."/>
            <datalist id="acitvity-destination-search">
                <option value="Argentina"></option>
                <option value="Australia"></option>
                <option value="Belgium"></option>
                <option value="Canada"></option>
                <option value="Denmark"></option>
                <option value="Ecuador"></option>
                <option value="Egypt"></option>
                <option value="France"></option>
                <option value="Greece"></option>
                <option value="Hungary"></option>
                <option value="Israel"></option>
                <option value="Japan"></option>
                <option value="Korea"></option>
                <option value="Latvia"></option>
                <option value="Mexico"></option>
                <option value="New Zealand"></option>
                <option value="Oman"></option>
                <option value="Peru"></option>
                <option value="Portugal"></option>
                <option value="Qatar"></option>
                <option value="Russia"></option>
                <option value="South Africa"></option>
                <option value="Spain"></option>
                <option value="Tanzania"></option>
                <option value="United States"></option>
                <option value="Vietnam"></option>
                <option value="Yemen"></option>
                <option value="Zimbabwe"></option>&nbsp;
            </datalist>
            <label for="acitvity-season-search"> &nbsp Season: </label>
            <select id="acitvity-season-search" name="Season">
                <option value="All Year Round" selected>All Year Round</option>
                <option value="Summer">Summer</option>
                <option value="Winter">Winter</option>
                <option value="Fall">Fall</option>
                <option value="Spring">Spring</option>&nbsp;
            </select>
            <label for="acitvity-category-search"> &nbsp Category: </label>
            <select id="acitvity-category-search" name="Category">
                <option value="All Categories" selected>All Categories</option>
                <option value="Adventure trip">Adventure trip</option>
                <option value="City">City trip</option>
                <option value="Relax">Relaxing vacation</option>
            </select>
            </br><input type="submit" name="form-submit" value="Search" class="search-but"/>
        </form>
    </section>
</div>
<section class="activity-results">

        <h2 class="results-header">Search Results:</h2>
        <ul name="search-results-list" style="list-style-type:none">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "MyTrip");

            // Check connection
            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $defaultSQL = "SELECT * FROM hiking_trips";
            if (filter_input(INPUT_GET, "form-submit")) {
                $name = filter_var($_GET['acitvity-name-search'], FILTER_SANITIZE_STRING);
                $destination = filter_var($_GET['acitvity-destination'], FILTER_SANITIZE_STRING);
                $season = $_GET['Season'];
                $category = $_GET['Category'];


                // start constructing the WHERE clause for the query
                $WHERE="WHERE";

                if ((strlen($name) != 0) && (strlen($destination) != 0) && ($season == 'All Year Round') && ($category == 'All Categories')){
                    $WHERE .= " Name LIKE '%$name%' AND Destination='$destination'";
                }
                else if((strlen($name) != 0) && (strlen($destination) == 0)){
                    $WHERE .= " Name LIKE '%$name%'";
                    if(($season != 'All Year Round') || ($category != 'All Categories')){
                        $WHERE .= " AND";
                    }
                }
                else if ((strlen($name) == 0) && (strlen($destination) != 0)){
                    $WHERE .= " Destination='$destination'";
                    if(($season != 'All Year Round') || ($category != 'All Categories')){
                        $WHERE .= " AND";
                    }
                }

                if (($season != 'All Year Round') && ($category == 'All Categories') ) {
                    $WHERE .= " Season='$season'";
                }

                else if (($season == 'All Year Round') && ($category != 'All Categories')) {
                    $WHERE .= " Category='$category'";
                }

                else if (($season != 'All Year Round') && ($category != 'All Categories')){
                    $WHERE .= " Season='$season' AND Category='$category'";
                }

                // if none of the conditions matched
                if($WHERE=="WHERE"){
                    $WHERE="";
                }


                $costumSQL = "SELECT * FROM hiking_trips $WHERE";

                $result = $conn->query($costumSQL);


            }

            else{
                $result = $conn->query($defaultSQL);
            }



            if ($result->num_rows > 0) {


                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<li>
                <div class="activity-back">
                    <ul name="activity-in-results" style="list-style-type:none" class="activity-details">
                        <li name="name-of-activity">
                            <label class="contain">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <h3><a class="link-to-activity">
                            <form action="hikingTrip.php" method="post">
                         <input type="hidden" name="A_ID" value="' . $row["H_ID"] . '"/>  
                        <input type="submit" class="link-to-activity" value="' . $row["Name"] . '"/>
                        </form></a></h3>
                        </li>
                        <li name="destination-of-activity">
                            Destination: ' . $row["Destination"] . '
                        </li>
                        <li name="season-of-activity">
                            Season: ' . $row["Season"] . '
                        </li>
                        <li name="category-of-activity">
                            Category: ' . $row["Category"] . '
                        </li>
                        <li name="picture-of-activity" class="activity-pic">
                            <img src="' . $row["Img"] . '" title="' . $row["Name"] . '" width="150px" alt="' . $row["Name"] . '"/>
                        </li>
                    </ul>
                </div>
            </li>';
                }
            }
            else {
                echo "No results";
            }
            $conn->close();
            ?>

        </ul>
        <div class="div-favorite">
            <button type="submit" name="favorites-submit" value="submitted" formaction="" class="favorite-button"><i class="material-icons star">star</i>Add to Favorite Activities</button>
        </div>
</section>
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