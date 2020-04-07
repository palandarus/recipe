<?php
include('dbconnect.php');
$query = "INSERT INTO recipe (name, icon, image, user_id, cost)
       VALUES ('" . $_POST["name"] . "', '" . $_POST["iconname"] . "', '" . $_POST["imagename"] . "', '" . $_SESSION['id'] . "','" . $_POST["cost"] . "')";
$result = mysqli_query($connect, $query);
if ($result) {
    echo 'Yes';
} else echo 'No';
?>