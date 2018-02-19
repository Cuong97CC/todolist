<?php 
require "dbConnect.php";

$id = str_replace("'", "''", $_POST['idCard']);

$query = "DELETE FROM card WHERE id = '$id'";

if(mysqli_query($connect, $query)) {
    echo "1";
} else {
    echo mysqli_error($connect);
}
?>