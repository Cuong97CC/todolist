<?php

require "dbConnect.php";

$idB = str_replace("'", "''", $_GET['idBoard']);

$query = "SELECT * FROM cardslist WHERE idBoard = '$idB'";

$data = mysqli_query($connect, $query);

class CardList {
    function __construct($id,$name,$idBoard, array $cards) {
        $this->id = $id;
        $this->name = $name;
        $this->idBoard = $idBoard;
        $this->cards = $cards;
    }
}

class Card {
    function __construct($id,$name,$idList) {
        $this->id = $id;
        $this->name = $name;
        $this->idList = $idList;
    }
}

$arrayLists = array();

while($row = mysqli_fetch_assoc($data)) {
    $idList = str_replace("'", "''",$row['id']);
    $query1 = "SELECT * FROM card WHERE idList = '$idList'";
    $data1 = mysqli_query($connect, $query1);
    $arrayCards = array();
    while($row1 = mysqli_fetch_assoc($data1)) {
        array_push($arrayCards, new Card($row1['id'],$row1['name'],$idList));
    }
    array_push($arrayLists, new CardList($row['id'],$row['name'],$row['idBoard'],$arrayCards));
}

echo json_encode($arrayLists);
?>