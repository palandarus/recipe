<?php
require_once 'dbconnect.php';

$action = $_POST["action"];

function chCost($connect){
    $query = "UPDATE recipe SET cost = '" . $_POST["newcost"] . "' WHERE id= '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo 'Yes';
    } else echo 'Yes';
}

function addrecipe($connect)
{
    $query = "INSERT INTO recipe (name, icon, image,  cost) VALUES ('" . $_POST["name"] . "', '" . $_POST["icon"] . "', '" . $_POST["image"] . "', '" . $_POST["cost"] . "')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo 'Yes';
    } else echo 'No';
}

function login($connect){
    $query = "  
      SELECT * FROM users  
      WHERE username = '" . $_POST["username"] . "'  
      AND password = '" . $_POST["password"] . "'  
      ";

    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $username = $_POST['username'];
        $roleId = (int)$result->fetch_row()[4];
        $userId = (int)$result->fetch_row()[0];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $roleId;
        $_SESSION['id'] = $userId;
        $userInfo = array($username, $roleId, $userId);
        echo json_encode($userInfo);
    } else echo "No";


}

function logout(){
    $_SESSION['username'] = -1;
    $_SESSION['role'] = -1;
    $_SESSION['id'] = -1;
    unset($_SESSION["username"]);
    unset($_SESSION["role"]);
    unset($_SESSION["id"]);
    echo 'Yes';
}

/*if (isset($_POST["action"])) {
    if ($_POST["action"] == add_recipe) {
        addrecipe();
    } else if ($_POST["action"] == logout) {

        $_SESSION['username'] = -1;
        $_SESSION['role'] = -1;
        $_SESSION['id'] = -1;
        unset($_SESSION["username"]);
        unset($_SESSION["role"]);
        unset($_SESSION["id"]);
        echo 'Yes';
    }
    if ($_POST["action"] == login) {
        $query = "
      SELECT * FROM users
      WHERE username = '" . $_POST["username"] . "'
      AND password = '" . $_POST["password"] . "'
      ";

        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $username = $_POST['username'];
            $roleId = (int)$result->fetch_row()[4];
            $userId = (int)$result->fetch_row()[0];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $roleId;
            $_SESSION['id'] = $userId;
            $userInfo=array($username, $roleId, $userId);
            echo json_encode($userInfo);
        } else echo "No";


    }
}*/

function init($connect)
{
    $sqlquery = "SELECT * FROM `recipe` LEFT JOIN category ON recipe.category_id=category.id_category ORDER BY category.category_name, recipe.recipe_name";
    $result = mysqli_query($connect, $sqlquery);
    if (mysqli_num_rows($result) > 0) {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else echo "0 results";
}


switch ($action) {
    case 'init':
        init($connect);
        break;
    case 'add_recipe':
        addrecipe($connect);
        break;
    case 'logout':
        logout();
        break;
    case 'login':
        login($connect);
        break;
    case 'chCost':
        chCost($connect);
        break;
}


?>