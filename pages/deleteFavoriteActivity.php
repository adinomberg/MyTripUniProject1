<?php
$conn = mysqli_connect("localhost", "root", "", "MyTrip");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$a_id = $_POST['del_id'];
$qry = "DELETE FROM favorite_activities WHERE A_ID='$a_id'";
$result = $conn->query($qry);
if(isset($result)) {
    echo "YES";
} else {
    echo "NO";
}
?>