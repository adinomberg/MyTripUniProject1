<?php
error_reporting(0);
$db = mysqli_connect("localhost", "root", "", "MyTrip");
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // email and password sent from form
    if(empty($_POST['email']) || empty($_POST['old-password']) || empty($_POST['new-password'])) {
        echo "<script> alert('your email or password is invalid'); window.location.href='loginOrSignup.php'</script>";
    }
    else {
        $myemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $myemail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $myoldpassword = filter_var($_POST['old-password'], FILTER_SANITIZE_STRING);
        $mynewpassword = filter_var($_POST['new-password'], FILTER_SANITIZE_STRING);

        if (empty($myemail) || empty($myoldpassword) || empty($mynewpassword)) {
            echo "<script> alert('your email or password is invalid'); window.location.href='loginOrSignup.php'</script>";
        } else {
            // Attempt select query execution
            $sql = "SELECT Email FROM Users WHERE Email = '$myemail' and Password = '$myoldpassword'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $active = $row['active'];

            $count = mysqli_num_rows($result);

            // If result matched $myemail and $myoldpassword, table row must be 1 row

            if ($count == 1) {

                $update="UPDATE Users SET Password='$mynewpassword' WHERE email='$myemail'";
                $updateResult = mysqli_query($db, $update);
                if ($updateResult){
                    echo "<script> alert('password changed successfully'); window.location.href='loginOrSignup.php'</script>";
                }

            } else {
                echo "<script> alert('your email or password is invalid'); window.location.href='loginOrSignup.php'</script>";
            }
        }
    }
}
?>