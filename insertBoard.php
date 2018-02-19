<?php 
require "dbConnect.php";

$email = str_replace("'", "''", $_POST['email']);
$name = str_replace("'", "''", $_POST['nameBoard']);

$query = "INSERT INTO boards VALUES (null, '$name')";
mysqli_query($connect, $query);
$query1 = "SELECT * FROM users WHERE email = '$email'";
$query2 = "SELECT MAX(id) AS id FROM boards";
$idBoard = 0;

$dataId = mysqli_query($connect, $query2);
$row = mysqli_fetch_assoc($dataId);
$idBoard = $row['id'];
$users = mysqli_query($connect, $query1);
while($row1 = mysqli_fetch_assoc($users)) {
    $idUser = $row1['id'];
    $query3 = "SELECT * FROM boards_users WHERE idBoard = '$idBoard' AND idUser = '$idUser'";
    $data = mysqli_query($connect, $query3);
    if(mysqli_num_rows($data) == 0) {
        $query4 = "INSERT INTO boards_users VALUES (null, '$idBoard', '$idUser', 1)";
        if(mysqli_query($connect, $query4)) {     
        } else {
            echo mysqli_error($connect);
        }
    }
}

echo "id:".$idBoard;
?>