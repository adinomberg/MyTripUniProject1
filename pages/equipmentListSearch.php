<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Adi Nomberg, Stav Bar, Lital Menashe"/>
    <meta name="description" content="Search an equipment list"/>
    <meta name="keywords" content="Trips, Planning, Equipment, Adventures" />
    <title>Search Equipment List </title>
    <link rel="shortcut icon" href="../imgs/icon-logo.png">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../CSS/EquipmentListSearch.css">
    <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<div class="EL_background">
    <!-- Navigation -->
    <nav>
        <ul class="main_nav_list">
            <li class="main_nav_item_logo"><a href="../index.html"><img class="logo_image" src="../imgs/logo.png" alt="mytrip-logo"/></a></li>
            <li class="main_nav_item"><a href="../index.html">Home</a></li>
            <li class="main_nav_item"><a href="about.html">About Us</a></li>
            <li class="main_nav_item-Equipment active"><a href="equipmentListSearch.php" class="dropbtn">Equipment Lists</a>
                <div class="equipment-dropdown">
                    <a href="equipmentListSearch.php" class="equipment-dropdown-item">Search Equipment List</a>
                    <a href="addEquipmentList.html" class="equipment-dropdown-item">Add Equipment List</a>
                </div>
            </li>
            <li class="main_nav_item"><a href="activitySearch.php">Activities</a></li>
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

    <!-- Equipment List -->

    <main>

        <h1 class="search-headline"> Search an Equipment List </h1>

        <form method="GET" action="">
            <div class="search-line">
                <label for="list-destination" class="search-label"> Destination: </label>
                <input list=“list-destination-search”  id="list-destination" name="destination" placeholder="Select a Destination">
                <datalist id=“list-destination-search”>
                    <option value="Argentina"></option>
                    <option value="Australia"></option>
                    <option value="Belgium"></option>
                    <option value="Canada"></option>
                    <option value="Denmark"></option>
                    <option value="Egypt"></option>
                    <option value="England"></option>
                    <option value="France"></option>
                    <option value="Greece"></option>
                    <option value="Hungary"></option>
                    <option value="India"></option>
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
                    <option value="Zimbabwe"></option>
                </datalist>


                &nbsp
                <label for="list-season-search" class="search-label"> Season: </label>
                <select id="list-season-search" name="Season">
                    <option value="All Year Round" selected>All Year Round</option>
                    <option value="Summer">Summer</option>
                    <option value="Winter">Winter</option>
                    <option value="Fall">Fall</option>
                    <option value="Spring">Spring</option>
                </select>
                &nbsp
                <label for="list-category-search" class="search-label"> Category: </label>
                <select id="list-category-search" name="Category">
                    <option value="All Categories" selected>All Categories</option>
                    <option value="Adventure trip">Adventure trip</option>
                    <option value="City trip">City trip</option>
                    <option value="Relaxing vacation">Relaxing Vacation</option>
                </select>
                &nbsp
                <input type="submit" name="form-submit" value="search" class="search-but">
            </div>
        </form>

        <p class="goto-ownlist"> Have your own list? Add it <a class="goto-ownlist-link" href="addEquipmentList.html"> Here </a></p>
</div>

<section class="search-results">
    <form method="GET" action="">
        <h2 class="results-headline"> Search Results </h2>

        <?php
            $conn = mysqli_connect("localhost", "root", "", "MyTrip");

            // Check connection
            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }


            $defaultSQL = "SELECT EL_ID, Name, Destination, Category, Season FROM equipment_lists";
            if (filter_input(INPUT_GET, "form-submit")) {
                $destination = filter_var($_GET['destination'], FILTER_SANITIZE_STRING);
                $category = $_GET['Category'];
                $season = $_GET['Season'];


                // start constructing the WHERE clause for the query
                $WHERE="WHERE";

                if ((strlen($destination) != 0) && ($season == 'All Year Round') && ($category == 'All Categories')){
                    $WHERE .= " Destination LIKE '%$destination%'";
                }
                else if (strlen($destination) != 0){
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

                //if none of the conditions matched
                if($WHERE=="WHERE"){
                    $WHERE="";
                }


                $costumSQL = "SELECT EL_ID, Name, Destination, Category, Season FROM equipment_lists $WHERE";

                $result = $conn->query($costumSQL);

        //  }
        }

        else{
        $result = $conn->query($defaultSQL);
        }


        if ($result->num_rows > 0) {

        // output data of each row
        while ($row = $result->fetch_assoc()) {
        echo '<div class="result-list">
        <label class="contain">
            <input type="checkbox">
            <span class="checkmark"></span>
        </label>
        <h3 class="list-headline">'.$row["Name"].'</h3>
        <div class="list-type">
            '.$row["Destination"].' | '.$row["Season"].' | '.$row["Category"].'
        </div>
        <ul class="el" onmousedown="change(this)">';

            $listID = $row["EL_ID"];
            // query for pulling out items from the lists
            $itemsInListSQL = "SELECT I.Name FROM items_in_list AS IL JOIN items AS I ON IL.Item_ID=I.Item_ID WHERE IL.List_ID=$listID";
            $itemsResult = $conn->query($itemsInListSQL);


            $itemsArr = array();
            while($row2 = $itemsResult->fetch_row()){
            $itemsArr[] = $row2[0];
            }

            // present only the first 3 items of the list, after clicking on the dots show the rest of the items in the list
            echo '<li> '.$itemsArr[0].' </li>
            <li> '.$itemsArr[1].' </li>
            <li> '.$itemsArr[2].' </li>
            <li class="continue"> ... </li>
            <div class="hidden-list">';
                $newItemsArr = array_slice($itemsArr,3);
                foreach($newItemsArr as $item){
                echo '<li> '.$item.' </li>';
                }
                echo '</div>
        </ul>
    </div>
        </br>';
        }
        }
        else {
        echo "No results";
        }
        $conn->close();
        ?>

        <div class="div-favorite">
            <button type="submit" name="favorites-submit" value="submitted" formaction="" class="favorite-button"><i class="material-icons star">star</i>Add to Favorite Equipment Lists</button>
        </div>
    </form>
</section>

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
<script src="../JS/EquipmentListSearch.js"></script>
</body>
</html