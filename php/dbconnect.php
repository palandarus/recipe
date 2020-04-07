<?php
$server_name="itcrown.ru";
//$server_name="antivrecipes.com";
//$server_name="127.0.0.1";
$server_login="u0382881_recipes";
$server_password="UzUs2MnBD8QGLIfM";
$server_dbname="u0382881_recipes";
$connect=connect($server_name, $server_login, $server_password, $server_dbname);

function connect($server_name, $server_login, $server_password, $server_dbname){
    session_start();
    $con = mysqli_connect($server_name, $server_login , $server_password, $server_dbname);

    /* change character set to utf8 */
    if (!$con->set_charset("utf8")) {
//        printf("Error loading character set utf8: %s\n", $con->error);
    } else {
//        printf("Current character set: %s\n", $con->character_set_name());
        $con->character_set_name();
    }

    if(!$con){
        die("Connection lost"+mysqli_connect_error());
    }
    else return $con;
}
