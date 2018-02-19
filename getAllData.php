<?php

require "dbConnect.php";

$email = str_replace("'", "''", $_GET['email']);

class Board {
    function __construct($id,$name, array $lists, $is_owner) {
        $this->id = $id;
        $this->name = $name;
        $this->lists = $lists;
        $this->is_owner = $is_owner;
    }
}

class CardList {
    function __construct($id,$name,$idBoard, array $cards) {
        $this->id = $id;
        $this->name = $name;
        $this->idBoard = $idBoard;
        $this->cards = $cards;
    }
}

class Card {
    function __construct($id,$name,$description,$date,$time,$location,$lat,$lng,$idList) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->date = $date;
        $this->time = $time;
        $this->location = $location;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->idList = $idList;
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
                $is_owner = $row1['is_owner'];
                $idBoard = $row1['idBoard'];
                $query2 = "SELECT * FROM boards WHERE id = '$idBoard'";
                $boards = mysqli_query($connect, $query2);
                if(mysqli_num_rows($boards) > 0) {
                    while($row2 = mysqli_fetch_assoc($boards)) {
                        $arrayLists = array();
                        $query3 = "SELECT * FROM cardslist WHERE idBoard = '$idBoard'";
                        $lists = mysqli_query($connect, $query3);
                        while($row3 = mysqli_fetch_assoc($lists)) {
                            $arrayCards = array();
                            $idList = $row3['id'];
                            $query4 = "SELECT * FROM card WHERE idList= '$idList'";
                            $cards = mysqli_query($connect, $query4);
                            while($row4 = mysqli_fetch_assoc($cards)) {
                                array_push($arrayCards, new Card($row4['id'],$row4['name'],$row4['description'],$row4['date'],$row4['time'],$row4['location'],$row4['lat'],$row4['lng'],$row4['idList']));
                            }
                            array_push($arrayLists, new CardList($row3['id'],$row3['name'],$row3['idBoard'],$arrayCards));
                        }
                        array_push($arrayBoards, new Board($row2['id'],$row2['name'],$arrayLists,$is_owner));
                    }
                }
            }
        }
    }
}

echo json_encode($arrayBoards);
?>