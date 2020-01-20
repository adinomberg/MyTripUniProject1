<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "MyTrip");
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // email and password sent from form
    if(empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script> alert('your email or password is invalid'); window.location.href='loginOrSignup.php'</script>";
    }
    else {
        $myemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $myemail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $mypassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        if (empty($myemail) || empty($mypassword)) {
            echo "<script> alert('your email or password is invalid'); window.location.href='loginOrSignup.php'</script>";
        } else {
            // Attempt select query execution
            $sql = "SELECT Email FROM Users WHERE Email = '$myemail' and Password = '$mypassword'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $active = $row['active'];

            $count = mysqli_num_rows($result);

            // If result matched $myemail and $mypassword, table row must be 1 row

            if ($count == 1) {
                $_SESSION['login_user'] = $myemail;

                header("location: MyTrip.php");
            } else {
                echo "<script> alert('your email or password is invalid'); window.location.href='loginOrSignup.php'</script>";
            }
        }
    }
}
?>