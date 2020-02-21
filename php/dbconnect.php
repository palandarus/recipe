<?php
$server_name="itcrown.ru";
$server_login="u0382881_recipes";
$server_password="UzUs2MnBD8QGLIfM";
$server_dbname="u0382881_recipes";
$connect=connect($server_name, $server_login, $server_password, $server_dbname);

function connect($server_name, $server_login, $server_password, $server_dbname){
    session_start();
    $con = mysqli_connect($server_name, $server_login , $server_password, $server_dbname);
    if(!$con){
        die("Connection lost"+mysqli_connect_error());
    }
    else return $con;
}
