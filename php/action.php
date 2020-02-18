<?php
include ('dbconnect.php');
//session_start();
//$connect = mysqli_connect("localhost", "recipes_root", "UzUs2MnBD8QGLIfM", "recipes");
if(isset($_POST["username"]))
{
    $query = "  
      SELECT * FROM users  
      WHERE username = '".$_POST["username"]."'  
      AND password = '".$_POST["password"]."'  
      ";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['role'] = (int)$result->fetch_row()[4];
        $_SESSION['id'] = (int)$result->fetch_row()[0];
        echo 'Yes';
    }
    else
    {
        echo 'No';
    }
}
if(isset($_POST["action"]))
{
    unset($_SESSION["username"]);
}
?>