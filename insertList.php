<?php 
require "dbConnect.php";

$name = str_replace("'", "''", $_POST['nameList']);
$idBoard = str_replace("'", "''", $_POST['idBoard']);

$query = "INSERT INTO cardslist VALUES (null, '$name', '$idBoard')";

if(mysqli_query($connect, $query)) {
    $query1 = "SELECT MAX(id) AS id FROM cardslist";
    $maxId = mysqli_query($connect, $query1);
    $row = mysqli_fetch_assoc($maxId);
    echo "id:".$row['id'];
} else {
    echo mysqli_error($connect);
}
?>