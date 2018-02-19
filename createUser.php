<?php 
require "dbConnect.php";

$email = str_replace("'", "''", $_POST['email']);
$name = str_replace("'", "''", $_POST['name']);
$query = "SELECT * FROM users WHERE email = '$email'";

$data = mysqli_query($connect, $query);

if (mysqli_num_rows($data) == 0) {
    $query1 = "INSERT INTO users VALUES (null, '$name', '$email')";
    if(mysqli_query($connect, $query1)) {
        echo "1";
    } else {
        echo mysqli_error($connect);
    }
} else {
    $query2 = "UPDATE users SET name = '$name' WHERE email = '$email'";
    if(mysqli_query($connect, $query2)) {
        echo "99";
    } else {
        echo mysqli_error($connect);
    }
}
?>