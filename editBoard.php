<?php 
require "dbConnect.php";

$id = str_replace("'", "''", $_POST['idBoard']);
$name = str_replace("'", "''", $_POST['nameBoard']);

$query = "UPDATE boards SET name = '$name' WHERE id = '$id'";

if(mysqli_query($connect, $query)) {
    echo "1";
} else {
    echo mysqli_error($connect);
}
?>