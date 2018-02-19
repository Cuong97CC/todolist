<?php 
require "dbConnect.php";

$email = str_replace("'", "''", $_POST['email']);
$id = str_replace("'", "''", $_POST['idBoard']);

$qr = "SELECT * FROM users WHERE email = '$email'";
$users = mysqli_query($connect, $qr);
while($row = mysqli_fetch_assoc($users)) {
    $idUser = $row['id'];
    $qr1 = "DELETE FROM boards_users WHERE idBoard = '$id' AND idUser = '$idUser'";
    if(mysqli_query($connect, $qr1)) {
        $qr2 = "SELECT * FROM boards_users WHERE idBoard = '$id'";
        $data = mysqli_query($connect, $qr2);
        if(mysqli_num_rows($data) == 0) {
            $query = "DELETE FROM boards WHERE id = '$id'";
            
            $subQuery = "SELECT * FROM cardslist WHERE idBoard = '$id'";
            $dataLists = mysqli_query($connect, $subQuery);
            $idLists = "";
            while($row = mysqli_fetch_assoc($dataLists)) {
                $idLists = $idLists.str_replace("'", "''", $row['id']).",";
            }
            $idLists = substr($idLists, 0, strlen($idLists)-1);
            
            $query1 = "DELETE FROM cardslist WHERE idBoard = '$id'";
            if(trim($idLists) != "") {
                $query2 = "DELETE FROM card WHERE idList IN ($idLists)";
                if(mysqli_query($connect, $query) && mysqli_query($connect, $query1) && mysqli_query($connect, $query2)) {
                } else {
                    echo mysqli_error($connect);
                }
            } else {
                if(mysqli_query($connect, $query) && mysqli_query($connect, $query1)) {
                } else {
                    echo mysqli_error($connect);
                }
            }
        }
    } else {
        echo mysqli_error($connect);
    }
}
echo "1";
?>