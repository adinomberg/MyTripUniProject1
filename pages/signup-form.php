<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "MyTrip");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(empty($_REQUEST['firstName']) || empty($_REQUEST['lastName']) || empty($_REQUEST['email']) || empty($_REQUEST['pass'])) {
    echo "<script> alert('must fill all fields'); window.location.href='loginOrSignup.php'</script>";
}
else{
    $firstName = filter_var($_REQUEST['firstName'],FILTER_SANITIZE_STRING);
    $lastName = filter_var($_REQUEST['lastName'],FILTER_SANITIZE_STRING);
    $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $email = filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL);
    $pass = filter_var($_REQUEST['pass'],FILTER_SANITIZE_STRING);

    if(empty($firstName) || empty($lastName) || empty($email) || empty($pass)) {
        echo "<script> alert('invalid fields'); window.location.href='loginOrSignup.php'</script>";
    }

    else {
        // Attempt insert query execution
        $sql = "INSERT INTO Users (Email, Password, FirstName, LastName) VALUES ('$email','$pass','$firstName','$lastName')";
        mysqli_query($link, $sql);
        $_SESSION['login_user'] = $email;
        header ('Location: MyTrip.php');
        // Close connection
        mysqli_close($link);
    }

}
?>