<?php
require_once 'dbconnect.php';
mb_internal_encoding("UTF-8");

$action = $_POST["action"];

function chCost($connect)
{
    $query = "UPDATE recipe SET recipe_name = '" . $_POST["name"] . "' cost = '" . $_POST["newcost"] . "' WHERE id= '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo 'Yes';
    } else echo 'Yes';
}
function delRecipe($connect)
{
    $query = "DELETE FROM `recipe` WHERE id= '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo 'Yes';
    } else echo 'No';
}

function addrecipe($connect)
{



        $iconuploaddir = '../img/recipe_icons/';
        $lciconuploaddir = '../img/recipe_icons/';
        $imageuploaddir = '../img/recipes/';
        $uploadiconfile = $iconuploaddir . basename($_FILES['iconfile']['name']);
        $uploadlciconfile = $lciconuploaddir . basename($_FILES['lciconfile']['name']);
        $uploadimagefile = $imageuploaddir . basename($_FILES['imagefile']['name']);

        if (move_uploaded_file($_FILES['iconfile']['tmp_name'], $uploadiconfile) && move_uploaded_file($_FILES['lciconfile']['tmp_name'], $uploadlciconfile) && move_uploaded_file($_FILES['imagefile']['tmp_name'], $uploadimagefile)) {
            $query = "INSERT INTO recipe (recipe_name, icon, lcicon, image, category_id,  cost) VALUES ('" . $_POST["name"] . "', '" . $_POST["iconname"] . "', '" . $_POST["lciconname"] . "','" . $_POST["imagename"] . "', '" . $_POST["category_id"] . "','" . $_POST["cost"] . "')";
            $result = mysqli_query($connect, $query);
            if ($result)  echo 'Yes';
            else echo 'No';
        } else {
            echo 'No';
        }



}

function login($connect)
{
    $query = "  
      SELECT * FROM users  
      WHERE username = '" . $_POST["username"] . "'  
      AND password = '" . $_POST["password"] . "'  
      ";

    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $username = $_POST['username'];
        $user = $result->fetch_row();
        $roleId = $user[4];
        $userId = $user[0];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $roleId;
        $_SESSION['id'] = $userId;
        $userInfo = array($username, $roleId, $userId);
        echo json_encode($userInfo);
    } else echo "No";


}

function logout()
{
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
    $sqlquery = "SELECT * FROM `recipe` LEFT JOIN category ON recipe.category_id=category.id_category ORDER BY category.id_category, recipe.recipe_name";
    $result = mysqli_query($connect, $sqlquery);
    if (mysqli_num_rows($result) > 0) {
        $out = array();
        $temp=1;
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$temp] = $row;
            $temp++;
        }
//        $res=mb_detect_encoding($out);
        echo json_encode($out);
        /*switch (json_last_error()) {
            case JSON_ERROR_NONE:
                echo ' - No errors';
                break;
            case JSON_ERROR_DEPTH:
                echo ' - Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                echo ' - Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                echo ' - Syntax error, malformed JSON';
                break;
            case JSON_ERROR_UTF8:
                echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
            default:
                echo ' - Unknown error';
                break;
        }

        echo PHP_EOL;*/
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
    case 'delRecipe':
        delRecipe($connect);
        break;
}


?>