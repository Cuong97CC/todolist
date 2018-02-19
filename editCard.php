<?php 
require "dbConnect.php";

$id = str_replace("'", "''", $_POST['idCard']);
$name = str_replace("'", "''", $_POST['nameCard']);
$description = str_replace("'", "''", $_POST['description']);

$query = "UPDATE card SET name = '$name', description = '$description' WHERE id = '$id'";

if(mysqli_query($connect, $query)) {
    echo "1";
} else {
    echo mysqli_error($connect);
}
?>