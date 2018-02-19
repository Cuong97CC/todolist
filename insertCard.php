<?php 
require "dbConnect.php";

$name = str_replace("'", "''", $_POST['nameCard']);
$description = str_replace("'", "''", $_POST['description']);
$idList = str_replace("'", "''", $_POST['idList']);

$query = "INSERT INTO card VALUES (null, '$name', '$description', '', '', '', '', '', '$idList')";

if(mysqli_query($connect, $query)) {
    $query1 = "SELECT MAX(id) AS id FROM card";
    $maxId = mysqli_query($connect, $query1);
    $row = mysqli_fetch_assoc($maxId);
    echo "id:".$row['id'];
} else {
    echo mysqli_error($connect);
}
?>