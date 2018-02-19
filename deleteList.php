<?php 
require "dbConnect.php";

$id = str_replace("'", "''", $_POST['idList']);

$query = "DELETE FROM cardslist WHERE id = '$id'";
$query1 = "DELETE FROM card WHERE idList = '$id'";

if(mysqli_query($connect, $query) && mysqli_query($connect, $query1)) {
    echo "1";
} else {
    echo mysqli_error($connect);
}
?>