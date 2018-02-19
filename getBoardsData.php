<?php

require "dbConnect.php";

$email = str_replace("'", "''", $_GET['email']);

class Board {
    function __construct($id,$name,$is_owner) {
        $this->id = $id;
        $this->name = $name;
        $this->is_owner = $is_owner;
    }
}

$arrayBoards = array();

$query = "SELECT * FROM users WHERE email = '$email'";
$users = mysqli_query($connect, $query);
if(mysqli_num_rows($users) > 0) {
    while($row = mysqli_fetch_assoc($users)) {
        $id = $row['id'];
        $query1 = "SELECT * FROM boards_users WHERE idUser = '$id'";
        $users_boards = mysqli_query($connect, $query1);
        if(mysqli_num_rows($users_boards) > 0) {
            while($row1 = mysqli_fetch_assoc($users_boards)) {
                $is_ownwer = $row1['is_owner'];
                $idBoard = $row1['idBoard'];
                $query2 = "SELECT * FROM boards WHERE id = '$idBoard'";
                $boards = mysqli_query($connect, $query2);
                if(mysqli_num_rows($boards) > 0) {
                    while($row2 = mysqli_fetch_assoc($boards)) {
                        array_push($arrayBoards, new Board($row2['id'],$row2['name'],$is_ownwer));
                    }
                }
            }
        }
    }
}

echo json_encode($arrayBoards);
?>