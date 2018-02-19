<?php 
require "dbConnect.php";

$email = str_replace("'", "''", $_POST['email']);
$idBoard = str_replace("'", "''", $_POST['idBoard']);

$query = "SELECT * FROM users WHERE email = '$email'";
$users = mysqli_query($connect,$query);
if(mysqli_num_rows($users) == 0) {
    echo "99";
} else {
    while($row = mysqli_fetch_assoc($users)) {
        $idUser = $row['id'];
        $query1 = "SELECT * FROM boards_users WHERE idBoard = '$idBoard' AND idUser = '$idUser'";
        $data = mysqli_query($connect, $query1);
        if(mysqli_num_rows($data) == 0) {
            $query2 = "INSERT INTO boards_users VALUES (null, '$idBoard', '$idUser', 0)";
            if(mysqli_query($connect,$query2)) {
                echo "1";
            } else {
                echo mysqli_error($connect);
            }
        } else {
            echo "100";
        }
    }
}
?>