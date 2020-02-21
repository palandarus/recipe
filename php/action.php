<?php
require_once 'dbconnect.php';
$action=$_POST["action"];
switch ($action){
    case 'init':
        init($connect);
        break;
}

if (isset($_POST["username"])) {
    $query = "  
      SELECT * FROM users  
      WHERE username = '" . $_POST["username"] . "'  
      AND password = '" . $_POST["password"] . "'  
      ";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['role'] = (int)$result->fetch_row()[4];
        $_SESSION['id'] = (int)$result->fetch_row()[0];
        echo 'Yes';
    } else {
        echo 'No';
    }
}
if (isset($_POST["action"])) {
    if ($_POST["action"] == add_recipe) {
        $query = "INSERT INTO recipe (name, icon, image,  cost) VALUES ('" . $_POST["name"] . "', '" . $_POST["icon"] . "', '" . $_POST["image"] . "', '" . $_POST["cost"] . "')";
        $result = mysqli_query($connect, $query);
        if ($result) {
            echo 'Yes';
        } else echo 'No';
    }
    unset($_SESSION["username"]);
}
function init($connect){
    $sqlquery="SELECT * FROM recipe";
    $result=mysqli_query($connect,$sqlquery);
    if(mysqli_num_rows($result)>0){
        $out=array();
        while($row=mysqli_fetch_assoc($result)){
            $out[$row["id"]]=$row;
        }
        echo json_encode($out);
    }
    else echo "0 results";
}
?>