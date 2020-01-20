<?php
session_start();
if(!isset($_SESSION['login_user']) && empty($_SESSION['login_user'])){
    header("location: loginOrSignup.php"); // redirect to login page if user details is not set in sessions
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Adi Nomberg, Stav Bar, Lital Menashe"/>
    <meta name="My Trip" content="plan your trip"/>
    <meta name="keywords" content="My Trip, information, plan, schedule" />
    <link rel="shortcut icon" href="../imgs/icon-logo.png">
    <title>My Trip</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/MyTrip.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
<div class="grid-container">
    <div class="MyTrip-background">
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
                    <li class="main_nav_item"><a href="activitySearch.php">Activities</a></li>
                    <li class="main_nav_item"><a href="contactUs.html">Contact Us</a></li>
                    <li class="main_nav_item-user"> <?php $user = $_SESSION['login_user'];
                        $db = mysqli_connect("localhost", "root", "", "MyTrip");
                        // Check connection
                        if($db === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }

                        $sql= "SELECT FirstName FROM users WHERE Email='$user'";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $name=$row['FirstName'];
                        echo "Welcome $name"; ?> </li>
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

            <h1 class="main-header"> Plan Your Own Trip!</h1>

    </div>

    <section class="trip-main-info">
        <h1> My Trip Around the world</h1>
        <h3>10/08/17 - 21/02/19</h3>
    </section>

    <section class="trip_form">
        <form method=“GET” action=“trip-form.php”>
            <h4 class="form-header"> Start planning, select destination and date </h4>
            <br/>
            <input list="destination-of-trip" class="destination_input" name="Destination of Trip" placeholder="Enter destination (Country)"/>
            <datalist id="destination-of-trip">
                <option value="Worldwide" selected></option>
                <option value="Australia"></option>
                <option value="Belgium"></option>
                <option value="Canada"></option>
                <option value="Denmark"></option>
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
                <option value="Qatar"></option>
                <option value="Russia"></option>
                <option value="Spain"></option>
                <option value="Tanzania"></option>
                <option value="United States"></option>
                <option value="Vietnam"></option>
                <option value="Yemen"></option>
                <option value="Zimbabwe"></option>&nbsp;
            </datalist>
            <br/>
            <label for="start-date"> Start: </label>
            <input id="start-date" type="date" class="start_date_input"/>
            <br/>
            <label for="end-date"> End: </label>
            <input id="end-date" type="date" class="end_date_input"/>
            <br/>
            <button type="submit" name="form-submit" value="submitted" formaction="" class="form-but" id="aaa">Start Planning</button>
        </form>
    </section>


    <section class="flex-container">
        <section class="calendar">
            <h3> <i class="material-icons">calendar_today</i>  My Schedule </h3>
            <div class="my-calendar">
                <div class="month">
                    <ul>
                        <li class="prev">&#10094;</li>
                        <li class="next">&#10095;</li>
                        <li>
                            August<br>
                            <span style="font-size:18px">2017</span>
                        </li>
                    </ul>
                </div>

                <ul class="weekdays">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                </ul>

                <ul class="days">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li>8</li>
                    <li>9</li>
                    <li><span class="active">10</span></li>
                    <li>11</li>
                    <li>12</li>
                    <li>13</li>
                    <li>14</li>
                    <li>15</li>
                    <li>16</li>
                    <li>17</li>
                    <li>18</li>
                    <li>19</li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li>30</li>
                    <li>31</li>
                </ul>
            </div>
        </section>
        <section class="lists">
            <section class="favorite-activities-list">
                <h3><i class="material-icons">favorite</i> My Favorite Activities <a href="activitySearch.php"><button class="add" type="button" title="add Favorite Activities"><i class="material-icons add">add_circle</i></button></a></h3>
                <ul class="favorite-activities-list">

                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "MyTrip");

                    // Check connection
                    if($conn === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $UserEmail = $_SESSION['login_user'];

                    $SQL = "SELECT A.H_ID, A.Name FROM favorite_activities AS FA JOIN hiking_trips as A ON FA.A_ID=A.H_ID WHERE FA.U_Email='$UserEmail'";

                    $result = $conn->query($SQL);


                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="favorite-activities-list"><a>'. $row["Name"] .'</a>
                            <a target="_self"><span class="close trash" id=' . $row["H_ID"] . ' >x</span></a></li>';

                        }
                        // delete activity in ajax code

                    }
                    else {
                        echo '<li class="favorite-activities-list"><a>No results</a></li>';
                    }
                    $conn->close();
                    ?>

                </ul>
            </section>

            <section class="equipment-list">
                <h3><i class="material-icons">list</i>My Equipment List <a href="equipmentListSearch.php"><button class="add" type="button" title="add Equipment List"><i class="material-icons add">add_circle</i></button></a></h3>
                <ul class="equipment-list">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "MyTrip");

                    // Check connection
                    if($conn === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $UserEmail = $_SESSION['login_user'];

                    $SQL1 = "SELECT EL_ID FROM favorite_equipment_lists WHERE U_Email='$UserEmail'";
                    $result2 = $conn->query($SQL1);

                    if ($result2->num_rows > 0) {
                        // equipment list id of each row
                        while ($row3 = $result2->fetch_assoc()) {

                            $listID = $row3["EL_ID"];
                            $SQL2 = "SELECT I.Name FROM items_in_list AS IL JOIN items AS I ON IL.Item_ID=I.Item_ID WHERE IL.List_ID=$listID";
                            $result2 = $conn->query($SQL2);

                            if ($result2->num_rows > 0) {
                                // output data of each row
                                while ($row2 = $result2->fetch_assoc()) {
                                    echo '<li class="equipment-list">' . $row2["Name"] . '</li>';

                                }

                            } else {
                                echo '<li class="favorite-activities-list"><a>No results</a></li>';
                            }
                        }
                    }
                    $conn->close();
                    ?>

                </ul>
            </section>
        </section>
    </section>
    <section class="notes">
        <h3><i class="material-icons">note</i>My Notes</h3>
        <div class="text"> <textarea id="notepad" placeholder="Start typing ..."></textarea></div>
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
</div>
<script src="../js/loginForm.js"></script>
<script src="../js/dateToday.js"></script>
<script type="text/javascript" language="JavaScript" ">
    $(function(){
        $(document).on('click','.trash',function(){
        var del_id= $(this).attr('id');
        var $ele = $(this).parent().parent();
        $.ajax({
        type:'POST',
        url:'delete.php',
        data:{'del_id':del_id},
        success: function(data){
        if(data=="YES"){
        $ele.fadeOut().remove();
        }else{
        alert("can't delete the row")
    }
}
});
});
});
</script>
<script src="../JS/MyTrip.js"></script>
</body>
</html>