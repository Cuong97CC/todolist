<?php

require "dbConnect.php";

$idCard = str_replace("'", "''", $_GET['idCard']);

$query = "SELECT * FROM card WHERE id = '$idCard'";

$data = mysqli_query($connect, $query);

class Card {
    function __construct($id,$name,$description,$date,$time,$location,$lat,$lng) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->date = $date;
        $this->time = $time;
        $this->location = $location;
        $this->lat = $lat;
        $this->lng = $lng;
    }
}

$arrayCard = array();

while($row = mysqli_fetch_assoc($data)) {
    array_push($arrayCard, new Card($row['id'],$row['name'],$row['description'],$row['date'],$row['time'],$row['location'],$row['lat'],$row['lng']));
}

echo json_encode($arrayCard);
?>