<?php 
require "dbConnect.php";

$id = str_replace("'", "''", $_POST['idCard']);
$location = str_replace("'", "''", $_POST['location']);
$lat = str_replace("'", "''", $_POST['lat']);
$lng = str_replace("'", "''", $_POST['lng']);

$query = "UPDATE card SET location = '$location', lat = '$lat', lng = '$lng' WHERE id = '$id'";

if(mysqli_query($connect, $query)) {
    echo "1";
} else {
    echo mysqli_error($connect);
}
?>