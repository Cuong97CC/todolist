<?php 
require "dbConnect.php";

$id = str_replace("'", "''", $_POST['idCard']);
$date = str_replace("'", "''", $_POST['date']);
$time = str_replace("'", "''", $_POST['time']);

$query = "UPDATE card SET date = '$date', time = '$time' WHERE id = '$id'";

if(mysqli_query($connect, $query)) {
    echo "1";
} else {
    echo mysqli_error($connect);
}
?>