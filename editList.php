<?php 
require "dbConnect.php";

$id = str_replace("'", "''", $_POST['idList']);
$name = str_replace("'", "''", $_POST['nameList']);

$query = "UPDATE cardslist SET name = '$name' WHERE id = '$id'";

if(mysqli_query($connect, $query)) {
    echo "1";
} else {
    echo mysqli_error($connect);
}
?>